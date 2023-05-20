<?php

namespace Widgets;

use Custom\Widget;

class Base extends Widget
{
    /**
     * 加载主题文件
     *
     * @return void
     */
    public function need($file)
    {
        $config = Option::alloc()->get('themeConfig');
        require ROOT_DIR . 'content/themes/' . Option::alloc()->get('themeName') . '/' . $file . '.php';
    }
}
