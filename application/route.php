<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//服务器签名校正
Route::rule('wechat/checkSign','wechat/BaseWeChat/checkClouds');
//设备列表
Route::rule('wechat/GuideDeviceTypeList','wechat/GuideDeviceTypeListActivity/index');
//创建菜单
Route::rule('wechat/creatMenu','wechat/BaseWeChat/creatMenu');