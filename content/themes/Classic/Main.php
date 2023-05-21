<?php

namespace Themes\Classic;

use Helpers\Renderer;

class Main
{
    public static $url = "";
    public static $description = "经典主题";
    public static $version = "1.0";
    public static $author = "Noah Zhang";
    public static $authorUrl = "";

    /**
     * 启用主题
     *
     * @return void
     */
    public static function activation()
    {
    }

    /**
     * 主题配置
     *
     * @param Renderer $renderer 渲染器
     * @return void
     */
    public static function config($renderer)
    {
        $renderer->setValue('backgroundColor', '#ffffff');

        $renderer->setTemplate(function ($data) {
            include __DIR__ . '/config.php';
        });
    }
}
