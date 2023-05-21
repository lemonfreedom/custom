<?php

namespace Custom;

use Helpers\Cookie;

class Notice
{
    /**
     * 设置通知
     *
     * @param array $content 通知内容
     * @param string $type 通知类型
     */
    public static function set($content, $type = 'info')
    {
        Cookie::set('notice', json_encode(['type' => $type, 'content' => $content]), time() + 10);
    }
}
