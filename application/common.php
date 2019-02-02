<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件



/**
 *
 *  统一保存日志数据
 * @param string $data 要保存的数据
 * @param int $level 等级： 1-> error 、2 -> warn、 3 ->debug、 4-> info
 */
function utilsSaveLogs($data = '', $level = 4)
{

    $items = debug_backtrace();
    $errfile = $items[0]["file"];
    $errline = $items[0]["line"];

    if ($level == 1) {
        error_log("[Error]" . $errfile . ', Line : ' . $errline);
        error_log("[Error]" . $data);
    } elseif ($level == 2) {
        error_log("[Warn]" . $errfile . ', Line : ' . $errline);
        error_log("[Warn]" . $data);
    } elseif ($level == 3) {
        error_log("[Debug]" . $errfile . ', Line : ' . $errline);
        error_log("[Debug]" . $data);
    } elseif ($level == 4) {
        error_log("[Info]" . $errfile . ', Line : ' . $errline);
        error_log("[Info]" . $data);
    }
}
