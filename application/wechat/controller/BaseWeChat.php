<?php
/**
 * Created by PhpStorm.
 * User: xuhongv
 * Date: 2019-02-01
 * Time: 00:38
 */

namespace app\wechat\controller;


use think\Controller;

class BaseWeChat extends Controller
{

    protected $mWeiChatOptions;


    //模拟数据
    protected $devicesList = [
        [
            'name' => '灯具',
            'icon' => 'http://placeholder.qiniudn.com/100x100',
            'des' => '首款无暇光、无频闪的智能灯',
            'actionNet' => '快速开关五次，直到灯具出现呼吸闪烁，表示进入配网模式！',
            'actionNetPic' => 'https://www.xuhongv.com/icon/lightNet.jpg',
        ],
        [
            'name' => '插座',
            'icon' => 'http://placeholder.qiniudn.com/100x100',
            'des' => '让家里全部电器变成智能可控。',
            'actionNet' => '快速开关五次，直到指示灯出现快速闪烁，表示进入配网模式！',
            'actionNetPic' => 'https://www.xuhongv.com/icon/lightNet.jpg',
        ],
        [
            'name' => '浴霸',
            'icon' => 'http://placeholder.qiniudn.com/100x100',
            'des' => '让你的浴室充满温暖。',
            'actionNet' => '快速开关五次，直到蜂鸣器响起四声，表示进入配网模式！',
            'actionNetPic' => 'https://www.xuhongv.com/icon/lightNet.jpg',
        ],
    ];


    public function _initialize()
    {
        $this->mWeiChatOptions = config('wechatConfig');
    }

//这几天弄微信，token验证总是不过。
//经过多方查找，终于找到了问题。
//是因为写代码时打开了页面输出和调试模式。
//经过总结如下：
//注意：关闭debug模式。关闭页面trace信息输出，启用sae引擎
//做到这三步，配置成功没有问题
//config.php文件：
//'SHOW_PAGE_TRACE' =>false, // 显示页面Trace信息

    public function checkClouds()
    {

        if (!request()->get()) {
            return '';
        }
        $weiChatMsg = ((input("get.")));

        //获得参数 signature nonce token timestamp echostr
        $nonce = $weiChatMsg['nonce'];
        $timestamp = $weiChatMsg['timestamp'];
        $token = $this->mWeiChatOptions['token'];
        $signature = $weiChatMsg['signature'];
        //将$nonce, $timestamp, $token这3个字符串按字典序排序后拼接成字符串（放入数组只是为了排序）
        $arr = [$nonce, $timestamp, $token];
        sort($arr, SORT_STRING);
        $str = implode($arr);
        //sha1加密后与signature比对，相同则来自微信，否则是坏人发来的
        $sha1str = sha1($str);
        if ($sha1str != $signature) {
            return '';
        } else {
            return $weiChatMsg['echostr'];

        }
    }


    public function creatMenu()
    {

        $data = [
            'button' => [
                [
                    "type" => "view",
                    "name" => "绑定设备",
                    "url" => $this->mWeiChatOptions['weichatDomain']."/wechat/GuideDeviceTypeList" //点击跳转的界面链接
                ]
            ]
        ];

        try {
            // 实例接口
            $menu = new \WeChat\Menu($this->mWeiChatOptions);
            // 执行创建菜单
            $result =  $menu->create($data);

        } catch (Exception $e) {
            // 异常处理
            echo $e->getMessage();
        }


        return json($result);

    }


}