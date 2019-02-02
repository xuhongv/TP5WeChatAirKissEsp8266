<?php
/**
 * Created by PhpStorm.
 * User: xuhongv
 * Date: 2019-02-01
 * Time: 00:44
 */

namespace app\wechat\controller;


use function PHPSTORM_META\type;

class GuideDeviceTypeListActivity extends BaseWeChat
{


    public function index()
    {


        //var_dump($this->mWeiChatOptions);

        $data = json_encode($this->devicesList);
        $this->assign('list', $data);
        return $this->fetch('', ['devicesList' => $this->devicesList]);
    }


}