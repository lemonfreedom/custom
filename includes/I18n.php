<?php

namespace Custom;

class I18n
{
    /**
     * @var array
     */
    private static $messages = null;

    /**
     * 初始化
     *
     * @param string $locale
     * @return void
     */
    public static function init($locale)
    {
        if (self::$messages === null && $locale !== 'Chinese') {
            $class = '\\Languages\\' . $locale;

            if (class_exists($class)) {
                self::$messages = $class::$messages;
            } else {
                self::$messages = [];
            }
        }
    }

    /**
     * 翻译
     *
     * @param string $text
     * @return string
     */
    public static function translate($text)
    {
        return self::$messages[$text] ?? $text;
    }
}
