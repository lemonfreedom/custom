<?php

namespace {
    // 自动加载
    spl_autoload_register(function ($class) {
        $alias = [
            'Content' => 'content',
            'Themes' => 'content/themes',
            'Plugins' => 'content/plugins',
            'Languages' => 'content/languages',
            'Custom' => 'includes',
            'Helpers' => 'includes/Helpers',
            'Widgets' => 'includes/Widgets',
        ];
        $class = explode('\\', $class);

        $class[0] = $alias[$class[0]] ?? $class[0];

        $file = ROOT_DIR . implode('/', $class) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });

    // 加载公共函数
    require ROOT_DIR . 'includes/functions.php';

    // 内容渲染
    ob_start(function ($content) {
        \Custom\Response::instance()->sendHeaders();
        return $content;
    });
}

namespace Custom {
    class Common
    {
        public static function initialize()
        {
            // 异常处理
            if (!DEBUG) {
                set_exception_handler(function ($e) {
                    \Custom\Response::instance()->clean();
                    ob_end_clean();

                    ob_start(function ($content) {
                        \Custom\Response::instance()->sendHeaders();
                        return $content;
                    });

                    $message = $e->getMessage();
                    $code = $e->getCode() === 0 ? 500 : $e->getCode();
                    \Custom\Response::instance()->setStatus($code);

                    include ROOT_DIR . 'admin/error.php';
                });
            }

            // 数据库初始化
            \Custom\Db::init(DB);

            // 获取选项
            $option = \Widgets\Option::alloc();

            // 语言初始化
            \Custom\I18n::init($option->get('language', ''));

            // 插件初始化
            \Custom\Plugin::init($option->get('plugin', []));
        }
    }
}
