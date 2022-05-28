<?php
/*
 * @Author: xycllin 1185353788@qq.com
 * @Date: 2022-05-19 11:02:57
 * @LastEditors: xycllin 1185353788@qq.com
 * @LastEditTime: 2022-05-19 11:06:19
 * @FilePath: \alipay.trade.page.pay-PHP-UTF-8\config.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021000119695976",

		//商户私钥
		'merchant_private_key' => "",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "",

        //日志路径
        'log_path' => "",
);