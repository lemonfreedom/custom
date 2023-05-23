<?php

namespace Custom;

class Plugin
{
    /**
     * 已启用插件列表
     *
     * @var array
     */
    private static $plugins;

    /**
     * 已启用插件句柄列表
     *
     * @var array
     */
    private static $handles;

    /**
     * 插件实例列表
     *
     * @var array
     */
    private static $instances;

    /**
     * 缓存句柄
     *
     * @var string
     */
    private $handle;

    /**
     * 缓存句柄值
     *
     * @var array
     */
    private static $tmp = [];

    public function __construct($handle)
    {
        $this->handle = $handle;
    }

    /**
     * 插件初始化
     */
    public static function init($plugins)
    {
        self::$plugins = $plugins;

        self::$handles = array_reduce($plugins, function ($carry, $handles) {
            return array_merge_recursive($carry, $handles['handles']);
        }, []);
    }

    /**
     * 导出启用插件
     *
     * @return array 启用插件信息
     */
    public static function export()
    {
        return self::$plugins;
    }

    /**
     * 获取实例化插件对象
     *
     * @param string $handle 句柄
     * @return $this
     */
    public static function factory($handle)
    {
        return self::$instances[$handle] ?? (self::$instances[$handle] = new self($handle));
    }

    /**
     * 启用插件
     *
     * @param string $plugin
     * @param array $config 插件设置
     * @return void
     */
    public static function activation($plugin, $config)
    {
        self::$plugins[$plugin]['config'] = $config;
        self::$plugins[$plugin]['handles'] = self::$tmp;
        self::$tmp = [];
    }

    /**
     * 禁用插件
     *
     * @param string $plugin
     * @return void
     */
    public static function deactivation($plugin)
    {
        if (isset(self::$plugins[$plugin])) {
            unset(self::$plugins[$plugin]);
        }
    }

    /**
     * 更新配置
     *
     * @param string $plugin
     * @param array $config 插件配置
     * @return void
     */
    public static function updateConfig($plugin, $config)
    {
        foreach (array_keys(self::$plugins[$plugin]['config']) as $key) {
            self::$plugins[$plugin]['config'][$key] = $config[$key] ?? '';
        }
    }

    /**
     * 设置属性回调
     *
     * @param string $name 钩子名
     * @param string $value 设置属性值
     * @return void
     */
    public function __set($name, $value)
    {
        $name = $this->handle . ':' . $name;

        self::$tmp[$name][] = $value;
    }

    /**
     * 执行插件
     *
     * @param string $name 钩子名
     * @param array $args 参数
     * @return void
     */
    public function __call($name, $args = [])
    {
        $name = $this->handle . ':' . $name;

        if (isset(self::$handles[$name])) {
            foreach (self::$handles[$name] as $callback) {
                preg_match('/Plugins\\\(.*)\\\Main/', $callback, $matches);
                $plugin = $matches[1];
                call_user_func_array($callback, [self::$plugins[$plugin]['config'], ...$args]);
            }
        }
    }
}
