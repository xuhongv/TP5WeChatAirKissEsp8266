### 微信公众号源码框架，实现自定义菜单、配网和绑定设备功能。


[![License](https://poser.pugx.org/topthink/think/license)](https://packagist.org/packages/topthink/think)

`WeChatAirKissEsp8266`基于 TP5 为主框架，以移动web的UI框架`FrozenUI`、`WeChatDeveloper`微信框架为模块，实现微信公众号自定义菜单、配网设备，以及自定义根据业务需求绑定设备在私有云。

 + 针对 access_token 失效增加了自动刷新机制；
 + `WeChatDeveloper` 已历经数个线上项目考验。
 + `FrozenUI` 是一套基于移动端的UI库，轻量、精美、遵从手机 QQ 设计规范。


> 运行环境要求PHP5.4以上，不需要数据库。

<p align="center">
  <img src="/png/tp5Airkiss8266.png.png" width="550px" height="360px" alt="Banner" />
</p>
 

### 目录结构

下面列出主要目录结构如下：

~~~
www  WEB部署目录（或者子目录）
│
├─application         应用目录
│           
│  ├─wechat         模块目录
│  │  ├─controller    模块配置文件
│  │  │  │ 
│  │  │  ├─BaseWeChat.php 微信公众号基类
│  │  │  │ 
│  │  │  ├─GuideDeviceTypeListActivity.php 设备列表配网引导控制器 
│  │  │  │ 
│  │  │  ├─ReadyDeviceActivity.php  设备配网详情以及开始配网控制器 
│  │  │  │ 
│  │  ├─view        视图
│  │  │  │ 
│  │  │  ├─guide_device_type_list_activity 设备列表配网引导
│  │  │  │ 
│  │  │  ├─ready_device_activity 设备配网详情以及开始配网
│  │ 

~~~


#### 集成注意事项：

*   根据自己的微信公众号后台配置信息，在application文件夹下面的 config.php 的最下面修改自己的信息；
    

``` php
  'wechatConfig' => [
        'token' => 'xuhong123',
        'appid' => 'wxaec2f6c8cf161231232145d2',
        'appsecret' => '70b1d304e4ca6f3b842222124251887bef',
        'cache_path' => '/www/wwwroot/www.domain.com/runtime/wechatCache', //access_token保存位置，确认此文件夹可读可写
        'weichatDomain'=>'https://www.domain.com',//JS接口安全域名，调用网页jssdk菜单需要用到。
    ],
```
*   **微信公众号后台验证安全域名的url地址：http://您的域名/wechat/checkSign**
    

### 版权信息

遵循Apache2开源协议发布，并提供免费使用。

版权所有Copyright ©2019  by 徐宏 (https://github.com/xuhongv/TP5WeChatAirKissEsp8266)

All rights reserved。


