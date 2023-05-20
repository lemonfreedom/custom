<?php

namespace Plugins\SMTP;

use Helpers\Renderer;

class Main
{
    public static $url = "";
    public static $description = "描述信息";
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
    }

    /**
     * 卸载回调
     *
     * @return void
     */
    public static function deactivation()
    {
    }

    /**
     * 插件设置
     *
     * @param Renderer $renderer 渲染器
     * @return void
     */
    public static function config($renderer)
    {
        $renderer->setValue('message', 'HelloWorld!');

        $renderer->setTemplate(function ($data) {
            include __DIR__ . '/config.php';
        });
    }

    public static function renderTab($params, $config)
    {
        include __DIR__ . '/views/tab.php';
    }

    public static function renderContent($params, $config)
    {
        include __DIR__ . '/views/content.php';
    }
}
