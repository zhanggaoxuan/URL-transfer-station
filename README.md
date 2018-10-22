# URL-transfer-station是什么？
URL-transfer-station是一个网址中转站，只有用户在使用手机 支付宝 or 微信 扫描指定二维码后，网页才转跳到指定网址的万用API，便于个人站长实现盈利。

## 使用说明

可以以如下的形式对API进行调用：

```
http(s)://网址/index.php?t=唯一标识码&url=扫码后电脑网页转跳的地址
```

安装方法：将下载的源码放至指定的网址目录即可，修改index.php中的红包码链接:`https://qr.alipay.com/c1x0218130dtyyhcsat2yd7`为自己的。

（index中默认的转跳判定为手机支付宝APP扫码判定）

如何判定微信扫码：将`if(strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false)`修改为if `( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false )`

当然，你可以两者一起使用，这样无论是微信扫码还是支付宝扫码均可让电脑端网页转跳。也可以取消判定，只要手机扫码就会转跳。

## 依赖环境
php环境：建议使用php5以上环境，本项目制作环境为php7.2

## 声明
使用API资源：Hitokoto[一言] API，用于动态显示语句。
引用CDN资源：jQUery，方便POST回调

## 项目思路
1.传入 扫码后电脑端转跳的地址：url 与 唯一标识码：t  通过唯一标识码在当前目录下生成 t.check 文件，网页每秒请求check.php来检查t.check。

2.用户在电脑端访问时会产生一个k值，因为访问时未传入k值，所以不会产生扫码判定。

3.根据传入的t和k的值，生成链接到当前页面的url二维码。

4.手机端扫码二维码传入k和t值，产生扫码判定，如果是指定app扫码，app上转跳到相应的页面，并将k值写入到t.check文件中。

5.电脑端回调函数请求check.php返回成功，则产生页面转跳