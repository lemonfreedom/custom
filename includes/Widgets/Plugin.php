<?php

namespace Widgets;

use Custom\Notice;
use Custom\Widget;
use Custom\Plugin as CustomPlugin;
use Helpers\Renderer;

class Plugin extends Widget
{
    /**
     * 已启用插件列表
     *
     * @var array
     */
    private $plugins;

    public function init()
    {
        $this->plugins = CustomPlugin::export();
    }

    /**
     * 获取插件列表
     *
     * @return array
     */
    public function getPlugins()
    {
        User::alloc()->pass('administrator');

        $dirs = glob(ROOT_DIR . 'content/plugins/*/');

        $result = [];

        foreach ($dirs as $dir) {
            $info = [];

            $info['name'] = basename($dir);

            $class = '\\Plugins\\' . $info['name'] . '\\Main';
            if (class_exists($class)) {
                $i = $class::info();

                $info['url'] = $i['url'] ?? '';
                $info['description'] = $i['description'] ?? '';
                $info['version'] = $i['version'] ?? '';
                $info['author'] = $i['author'] ?? '';
                $info['author_url'] = $i['author_url'] ?? '';
                $info['activated'] = array_key_exists($class, $this->plugins);

                $result[] = $info;
            }
        }

        return $result;
    }

    /**
     * 启用插件
     *
     * @return void
     */
    private function enable()
    {
        User::alloc()->pass('administrator');

        $plugin = $this->request->get('plugin', '');

        $class = '\\Plugins\\' . $plugin . '\\Main';

        if (!class_exists($class) || !method_exists($class, 'activation')) {
            Notice::set('启用失败', 'warning');
            $this->response->goBack('/admin/plugins.php');
        }

        // 获取插件设置
        if (class_exists($class, 'setting')) {
            $renderer = new Renderer();
            call_user_func([$class, 'setting'], $renderer);

            $settings = $renderer->getValues();
        }

        // 激活插件
        call_user_func([$class, 'activation']);

        CustomPlugin::activation($class, $settings);

        Option::alloc()->set('plugin', serialize(CustomPlugin::export()));

        Notice::set('启用成功', 'success');
        $this->response->goBack();
    }

    /**
     * 禁用插件
     *
     * @return void
     */
    private function disable()
    {
        User::alloc()->pass('administrator');

        $plugin = $this->request->get('plugin', '');

        $class = '\\Plugins\\' . $plugin . '\\Main';

        if (class_exists($class) && method_exists($class, 'deactivation')) {
            call_user_func([$class, 'deactivation']);
        }

        CustomPlugin::deactivation($class);

        Option::alloc()->set('plugin', serialize(CustomPlugin::export()));

        Notice::set('禁用成功', 'success');
        $this->response->goBack();
    }

    public function action()
    {
        $this->on($this->params(0) === 'enable')->enable();
        $this->on($this->params(0) === 'disable')->disable();
    }
}
