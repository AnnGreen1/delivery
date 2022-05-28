<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021000119695976",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAuhzAYOhk8bg7tD/Il1Dj3PknYSxnsGTR9TI8BwrcL4z6o+AmkAg8BbHCeFIAnB2M222FXDL0FVujKlzN2ORHGQEQNwuYpBM3aza8RlebJT7S+QbTNTd8GyyNuWyGk29JC2cZTHF03X3/H/HWk9VYVkHWxzemPnxcdg1q0qBPMUox5+TxfZOlvOk6NFrWzOePNZUPEZIJKpxyg37DKmoQwmv62duibjyoMb07ODGYJzRBVPRUambUiTN3eoa6Roqt5vPBw6voQcfSMdCrmvGcUESYBIfb6o5Ad1cMAfmCqRNiGON7PbZeEQpYp2cCeNslpfFFwifTgIStIoE6nQSDQwIDAQABAoIBAFqO/Ojqi5u2io6VbrR6LrXqIkg9RCLnm+YUUHMYzLTyg07UFc+Fwjb/HOJQ/Gz6T/zBWN/ZBz2RPl6xk5QS16mKA+rU4KwNkazAkHIl1J8V57A2qvS9D81lK3zrGryIrOE4hG3W0wendEmF8mQyrm4iUTDUmjbTamYi9zSPvpj7bLBAcu2cHm9UYF74xI6VeQLSSH28FOIXbXEiGjBxmodECFdxFCCfjJikttSSAMkGX3+jFPIxUlJaGGh+WvfoZbHVZSa+F0hgf6IySfaxy6+vgPMYUR+4zfogx7EM6T3JMH2NP1RujPDJtZ0P8ZyaZQzaLNcUL5BiY0Lz9vzCcQECgYEA8bX0if9V+ETAGUrEBBoCbgo/iaFb98podmSO88+F5dQsVEcNDi7KD90YBK/9kHU1Zlf9dE5eYJ1+SJBFWyDAgv+Jjf4h4ZLIPuA47jycQtqzz5t//PytzRDYURZBtRknjSVUL7nCOkZs1K7Z6Zv8IG7KNrxIhP4Dzq0OueN8AIECgYEAxR1e4c4PudIVA2AOEoyqi6wfWMmMayAvv/jCje6GaSO1p7e3MosWrrXyylKJ1jxKO5IyhpKeQ60OGgOLg139X1T8eD+BGVQZzWcTbGhk66BcSJ5C4bsJd6v2QhphBxN8c4cMqKYpSgiNjYzJ9XavRgWzAKi5mD++hIUj0Hm/ocMCgYAP0ntZdS9pewagITbHlfRGw8D4/2kHxWYlKdv5tcHsE4F7WtNN9F4hv7VMyUBt7l46ftQGgwLGjEix80+28WPor1WPx+zr2THme8L+RVVtQue2VVWBeADghZPDaxOOCUF/icwC+8PtEKMbIP7+vck5TkdKYfTVT9Nr+gQWwv9hAQKBgQC+hZn9JX/7urxGy+QuN7psUEzoM78+mBivNBFQwHk4TKS7XI59EwU0j3cB6e+CnDmgBLpDapoAjddwe3aw3fsV1v5EeBUfVzOtXnDeurS5LwGjyxyYNIF9I0BeOkMIZORIggNRS3HjNgskAy39zN6zDrUq8Oqa5xoN2uZ4DgWUowKBgQC6GWunYhwwMrf51JTzYpL4cfBwpSdHYAejd6pg9lOBXGYf+RrBg1IpFsubiqQef648oVhHfomIuyhGimbFD3IFx/uoVZq+9MBltAaNOA9hVPNq8gNSSKRo+nZWUp674nMqoPvofIcAZFYky+lpiHJdnRyN4v2j4YxLOS+Q597F7A==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost:8080/home",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhiXp5VFGGE2UGcN50U3M3vLiyR4fXVXASbrulg/ARKgbX6d5cuY5sRqA8NYvz1XoSxE2Tr3aJsUgemZc5mFdZ98/wMd1C9Sb2nf07Te3/a2YTy/y/bJtqTJVjMrBV/++HNJEEgqXq5EYvvQofIgdArYg0MFws/kC+Lpf/LWo1ypw2CrIM1sDvkjzFKL8vy56l89l0MPiGgCiUDWzQWacChjjNpBKodhNXvzDI42viu2u9n6Tm0fa4ADBJvKnbLHvxz5BKPXbZSoxTAIIv1c9bPM6wcMi+a5MVRSP9gkt0v+NZ6uGRZUoE/VnYmxP25de2Rdade1hwbXCr+B0t8aHMwIDAQAB",

        //日志路径
        'log_path' => "",
);