# URL-transfer-station是什么？
URL-transfer-station是一个网址中转站，只有用户在使用手机 支付宝 or 微信 扫描指定二维码后，网页转跳到指定网址的万用API，便于个人站长实现盈利。

### DEMO

[一个支付宝扫码转跳Github的网站](http://api.jx3pvall.com/?u=github)

### 写在前面

如果我的项目对你有所帮助，请不要吝啬你的star，如果在使用时遇到问题或者需要帮助，可以在issues中联系我，我每天都会打开github。

作者目前还在上学，需要你们的star来帮我做一个好看的github名片，以便求职。

## 使用说明

可以以如下的形式对API进行调用：

```
http(s)://网址/index.php?u=网址标识符
```

#### 安装步骤一

将下载的源码放至指定的网址目录即可，修改index.php中的红包码链接:`https://qr.alipay.com/c1x0218130dtyyhcsat2yd7`为自己的。

（index中默认的转跳判定为手机支付宝APP扫码判定）

如何判定微信扫码：将`if(strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false)`修改为`if( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false )`

如何判定微博扫码：将`if(strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false)`修改为`if( strpos($_SERVER['HTTP_USER_AGENT'], 'Weibo') !== false )`

当然，你可以两者一起使用，这样无论是微信扫码还是支付宝扫码均可让电脑端网页转跳。也可以取消判定，只要手机扫码就会转跳。

#### 安装步骤二

修改url.json的数据，其中json数据中key为传入的u值，url为转跳的网址。

如果不在url.json内的网址则转跳404目录（可自行修改转跳页）

### api.php

按提示修改其中的关键项，可以用GET请求让它从Mysql数据库中获取网站的url，并覆盖更新url.json文件。

Mysql语句帮助可见：[Mysql教程](http://www.runoob.com/mysql/mysql-tutorial.html)

如果手动输入url.json的key-value值，则可删除api.php文件

### 说明
使用API资源：

Hitokoto[一言] API，用于动态显示语句

二维码生成API，用于显示动态的地址

引用CDN资源：

jQuery，方便POST回调

## 更新日志
#### 2018.10.30 更新

1.增加del.php用于删除过期文件，并在index.php增加其调用方法。

2.readme.md中增加微博扫码判定语句的帮助。

#### 2018.10.28 更新

1.修改index.php，将其中的token（即URL中的t参数）取消，原key值共用于token值与key值，以防止同一个t值的链接互相干扰。

#### 2018.10.25 更新

1.提供api.php，可以使用GET请求api文件，通过对数据库的搜索来更新url.json

#### 2018.10.23 更新

1.取消访问页面创建check文件，只有在支付宝扫码时才会创建check文件。

2.为防止直接传入url网址给了用户绕过扫码的可能，将网址数据以key-value的模式存储在url.json文件中。
