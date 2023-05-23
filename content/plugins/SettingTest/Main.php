<?php

namespace Plugins\SettingTest;

use Custom\Notice;
use Helpers\Renderer;
use Widgets\Option;

class Main
{
    public static $url = "";
    public static $description = "自定义设置测试：系统设置 -> 站点设置 -> 自定义设置测试";
    public static $version = "1.0";
    public static $author = "Noah Zhang";
    public static $authorUrl = "";

    /**
     * 激活插件，注册钩子并执行初始化操作
     *
     * @return void
     */
    public static function activation()
    {
        \Custom\Plugin::factory('admin/setting.php')->tab = __CLASS__ . '::renderTab';
        \Custom\Plugin::factory('admin/setting.php')->content = __CLASS__ . '::renderContent';
        \Custom\Plugin::factory('includes/Widgets/Hook.php')->action = __CLASS__ . '::action';

        $db = \Custom\Db::get();
        $db->insert('options', [
            ['name' => 'test', 'value' => '这是一个测试字段'],
        ]);
    }

    /**
     * 卸载回调
     *
     * @return void
     */
    public static function deactivation()
    {
        $db = \Custom\Db::get();
        $db->delete('options', ['name' => 'test']);
    }

    /**
     * 插件设置
     *
     * @param Renderer $renderer 渲染器
     * @return void
     */
    public static function config($renderer)
    {
    }

    public static function renderTab($config)
    {
        include __DIR__ . '/views/tab.php';
    }

    public static function renderContent($config)
    {
        include __DIR__ . '/views/content.php';
    }

    public static function update($config, $widget)
    {
        Option::alloc()->set('test', $widget->request->post('test'));
        Notice::set(['更新成功'], 'success');
        $widget->response->goBack();
    }

    public static function action($config, $widget)
    {
        if ($widget->params(0) === 'setting-test-update') {
            self::update($config, $widget);
        }
    }
}
