<?php

namespace Plugins\HelloWorld;

use Helpers\Renderer;

class Main
{
    public static $url = "";
    public static $description = "在底部输出一行文本";
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
        \Custom\Plugin::factory('admin/modules/footer.php')->end = __CLASS__ . '::render';
    }

    /**
     * 卸载回调方法
     *
     * @return void
     */
    public static function deactivation()
    {
    }

    /**
     * 插件配置
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

    /**
     * 插件方法
     *
     * @param array $params 页面参数
     * @param array $config 插件配置
     * @return void
     */
    public static function render($config)
    {
        echo $config['message'];
    }
}
