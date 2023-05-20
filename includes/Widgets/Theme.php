<?php

namespace Widgets;

use Custom\Notice;
use Custom\Widget;
use Helpers\Renderer;

class Theme extends Widget
{
    /**
     * 已启用主题
     *
     * @var array
     */
    private $theme;

    public function init()
    {
        $this->theme = Option::alloc()->get('theme');
    }
    /**
     * 获取主题列表
     *
     * @return array
     */
    public function getThemes()
    {
        User::alloc()->pass('administrator');

        $dirs = glob(ROOT_DIR . 'content/themes/*/');

        $result = [];

        foreach ($dirs as $dir) {
            $name = basename($dir);
            $class = '\\Themes\\' . $name . '\\Main';

            if (class_exists($class)) {
                $activated = Option::alloc()->get('themeName') === $name;
                $result[] = [
                    'name' => $name,
                    'url' => $class::$url ?? '',
                    'description' => $class::$description ?? '',
                    'version' => $class::$version ?? '',
                    'author' => $class::$author ?? '',
                    'authorUrl' => $class::$authorUrl ?? '',
                    'activated' => $activated,
                    'hasConfig' => $activated && count(Option::alloc()->get('themeConfig')) > 0,
                ];
            }
        }

        return $result;
    }

    /**
     * 启用主题
     *
     * @return void
     */
    private function enable()
    {
        User::alloc()->pass('administrator');

        $name = $this->request->get('name', '');

        // if ($name === $this->theme['name']) {
        //     Notice::set(['请勿重复启用'], 'warning');
        //     $this->response->redirect('/admin/theme.php');
        // }

        $class = '\\Themes\\' . $name . '\\Main';

        if (!class_exists($class) || !method_exists($class, 'activation')) {
            Notice::set(['启用失败'], 'warning');
            // $this->response->goBack('/admin/plugin.php');
        }

        // 获取插件设置
        if (class_exists($class, 'config')) {
            $renderer = new Renderer();
            call_user_func([$class, 'config'], $renderer);

            $config = $renderer->getValues();
        }

        Option::alloc()->set('theme', serialize([
            'name' => $name,
            'config' => $config,
        ]));

        Notice::set(['启用成功'], 'success');
        $this->response->goBack();
    }

    /**
     * 主题配置
     *
     * @return void
     */
    public function config()
    {
        User::alloc()->pass('administrator');

        $name = $this->request->get('name', '');
        if ($name !== $this->theme['name']) {
            Notice::set(['主题未启用'], 'warning');
            $this->response->redirect('/admin/plugin.php');
        }

        $class = '\\Themes\\' . $name  . '\\Main';

        // 判断插件是否具备配置功能
        // ----

        $renderer = new Renderer();
        call_user_func([$class, 'config'], $renderer);
        $renderer->render($this->theme['config']);
    }

    public function updateConfig()
    {
        User::alloc()->pass('administrator');

        $name = $this->request->post('name', '');

        if (null === $name) {
            Notice::set(['插件名不能为空'], 'warning');
            $this->response->redirect('/admin/theme.php');
        }

        if ($name !== $this->theme['name']) {
            Notice::set(['主题未启用'], 'warning');
            $this->response->redirect('/admin/plugin.php');
        }

        $data = $this->request->post();

        foreach (array_keys($this->theme['config']) as $key) {
            $this->theme['config'][$key] =  $data[$key] ?? '';
        }

        Option::alloc()->set('theme', serialize($this->theme));

        Notice::set(['更新成功'], 'success');
        $this->response->goBack();
    }

    public function action()
    {
        $this->on($this->params(0) === 'enable')->enable();
        $this->on($this->params(0) === 'enable')->enable();
        // 更新主题配置
        $this->on($this->params(0) === 'update-config')->updateConfig();
    }
}
