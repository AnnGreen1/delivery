<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021000119695976",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAkuAgaoe0JphBdctqBvlSFHeIeFSYMOHjhanIVY3GCKgYZf3YRIPRox+xgyt8OG9L8ocMeutFH0r7kinUpsBG64QQDbOxnIkLETqxXG7cZ+8F8K9x/9sPR3Ylz8YrATkDp4fUvPu3eVj+mn57tgCWe1iD3zsI+7RANdTzE0OEaeGFrAbvD6k4KrbVfOJ8jHtXyyFVJlgVdE2Uc/K71GG9sSiCPir5Fs1xyVtUrU2MyeLfgmSu2iFcslrnGUoAugNDtIDWX8p580Rbr9OpDNCZ9UtXbZioNdMUylC++oP/v3W7lFIu4jaKAHTbTjs73A9TWvpWYuwpUo07G9qfYqPdRQIDAQABAoIBAEKl96+/sq0MzC+SxaMygd+Nuly4LnOIHYGq4KCJ/AIznRazEO9OTdPS7u9RzUWio3kDdVNV7YDcurnBx6B/ge8fd1VwZDlfKql/07nZCKUVHsHwKy/qDM3lvBTDnQIqCBF+nre/Fau4CZi7qpGVRLPmH7kthc8KJVUIM+Fa8vxETNGMvFjJe5Rj0If5SyImGmv/Gr41OWPalh70UTCJ+JIoTdHfbwwpzZUMDb3/YpGOU0Eeo+4NuVZW8NI6P0ap9TpfxYFStaAIaJ2ZC0bblMwEgunYBfSnMtAS1gKGbmk7KX8HFFhlEUMAwlpX2Na/lIyNonU1yJsN7eQfs7v7p8UCgYEAzx3t7PKdzRNR4pMrm4iXkcnI4XgZk1O7klcNhpfqBvWoSjqywGTPgPFSByOB15s5Qqo8FD1yKKCK3XCXByxY6xanmn2Yg/eEjLwLNLIiwDMdJ9cEpsTuvdZOF25Z725/lEjuxEEY1cotEyIBv9RbYt1hzW9JVxvWFxhJGjbi/W8CgYEAtYpkMYF+1ZFPKYIU2qH4GeZwtkwIgPbl6+Pwhsqw+75TT1TrH+7Rp1bsubM+RQ1S5SHlxyLsjQSP7BsB1JcmUGswbXu8+/FIByn3U86vTL31sNIG745OD9aZXdc9z8Hp6jniA7SRK0WTuHqkzTnyC5IoyGvmQnL8TuiEK4lC3osCgYAZGjCHAlS70TagdmPXovNz2Pf+07aN050tPF3ITUsw8r8l1/1oMg+wOg9ODDCleAu1l7pWXagjYmnSMt4rIWXZgFJp+ATvIaWwBO56wYhSsR88f+PxbnbdDUdDsb02trbBuyEtKhKffrR92CZMIKm+zsQWyQEjjJ0jCW96vOJAAwKBgQCWFMcoNkpI/UxYoHXlGaomn1/nFYyiMXt7PIIIrWELfhkZqLaJO8KPeUlTbF+6bn1teEyiCLlPC8qAAwPMYPkH2tW6bWWbU6mcYpFZ87Dw3MpVWAzr1tWqOluoPN2Y+FMNlLTJI2owP+ETzjCYiaMU9cxJhQpjPPRht9AsvdlOaQKBgCwLCUHxOu/MG1bLmX0ngXI8S18XfBTR+3HfYmO+3ELiH3g8Bc1rTW7OVLO9SxqR2azRMEPOxu8zm3gaFDbJj8NUIZ8+3H+IkclfUQz4vWhLLrX5dIztxTPSAExqCnteptfftLcMPZzG3ZTcXM2lDA9kNpZd1etve1UvAqsDyCQm",
		
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
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhiXp5VFGGE2UGcN50U3M3vLiyR4fXVXASbrulg/ARKgbX6d5cuY5sRqA8NYvz1XoSxE2Tr3aJsUgemZc5mFdZ98/wMd1C9Sb2nf07Te3/a2YTy/y/bJtqTJVjMrBV/++HNJEEgqXq5EYvvQofIgdArYg0MFws/kC+Lpf/LWo1ypw2CrIM1sDvkjzFKL8vy56l89l0MPiGgCiUDWzQWacChjjNpBKodhNXvzDI42viu2u9n6Tm0fa4ADBJvKnbLHvxz5BKPXbZSoxTAIIv1c9bPM6wcMi+a5MVRSP9gkt0v+NZ6uGRZUoE/VnYmxP25de2Rdade1hwbXCr+B0t8aHMwIDAQAB",

        //日志路径
        'log_path' => "",
);