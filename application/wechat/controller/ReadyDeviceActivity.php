<?php
/**
 * Created by PhpStorm.
 * User: xuhongv
 * Date: 2019-02-01
 * Time: 19:21
 */

namespace app\wechat\controller;


use think\debug\Console;

class ReadyDeviceActivity extends BaseWeChat
{


    public function index()
    {

        $index = input('get.');

        //严格判断
        if (!is_array($index))
            return '';
        if (!isset($index['index']))
            return '';

        //取得配网信息
        $netMessage = ($this->devicesList)[$index['index']]['actionNet'];
        $actionNetPic = ($this->devicesList)[$index['index']]['actionNetPic'];

        utilsSaveLogs('get net $index[\'index\']:' . $index['index']);
        utilsSaveLogs('get net message:' . $netMessage);

        try {
            // 实例接口
            $wechat = new \WeChat\Script($this->mWeiChatOptions);
            // 执行操作
            $result = $wechat->getJsSign($this->mWeiChatOptions['weichatDomain'] . '/wechat/ready_device_activity/index.html?index=' . $index['index']);
        } catch (Exception $e) {
            // 异常处理
            echo $e->getMessage();
        }

        //重新设置需要调的jsApi
        unset($result['jsApiList']);
        $result['jsApiList'] = [
            'openWXDeviceLib', 'startScanWXDevice', 'onScanWXDeviceResult', 'configWXDeviceWiFi', 'hideMenuItems'
        ];


        $data = json_encode([
            'icon' => $actionNetPic,
            'message' => $netMessage,
            'wechat' => $result,
        ]);

        $this->assign('deviceInfo', $data);
        return $this->fetch();
    }


}