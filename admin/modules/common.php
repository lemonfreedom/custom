<?php
// 定义根目录
define('ROOT_DIR', dirname(__DIR__, 2) . '/');

// 安装检测
if (!@include ROOT_DIR . 'config.php') {
    file_exists(ROOT_DIR . 'install.php') ? header('Location: /install.php') : exit('Missing Config File');
}

// 初始化
\Custom\Common::initialize();

// 请求对象
$request = \Custom\Request::instance();

// 配置对象
$option = \Widgets\Option::alloc();

// 用户对象
$user = \Widgets\User::alloc();
