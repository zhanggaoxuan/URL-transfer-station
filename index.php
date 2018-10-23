<?php
if(!isset($_GET['t'])){
 echo "无效的请求！";
 exit();
}
$urllist=json_decode($json,true);
$url=$_GET['u'];
$token=$_GET['t'];
if(!isset($_GET['k'])){
$key=substr(md5(rand()),28);
}else{
$key=$_GET['k'];
if(strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false){
$myfile = fopen("$token.check", "w");
$txt = $key;
fwrite($myfile, $txt);
fclose($myfile);
header('location:https://qr.alipay.com/c1x0218130dtyyhcsat2yd7');
}else{
echo '<h1>请使用支付宝扫码！</h1>';
exit();
}
}
?>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>红包码</title>
    <script src="hitokoto.js"></script>
	<link rel="stylesheet" href="hitokoto.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script>
    var setting = {
        qrcodeApi: "http://qr.liantu.com/api.php?text="
    }
    </script>
</head>
<body>
  	<div class="windows">
		<div class="content">
			<p class="hitokoto"> </p>
			<p class="from"> </p>
			<div class="progress-con">
				<div class="progress-time" style="left:0%"></div>
			</div>
		</div>
		<div class="button">
			<input type="button" class="sub" value="New">
		</div>
	</div>
	<div><br ><br ><p style="color:#ffffff">↓领取红包后继续↓</p>
    <img id="page-url" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
</div>
    <script>
    function GetUrlPara()
　　{
　　　　var url = document.location.toString();
　　　　var arrUrl = url.split("?");
　　　　var para = arrUrl[1];
　　　　return para;
　　}
    $(function(){
        var str=window.location.href;
      	var str2=GetUrlPara();
		str=str.replace(str2,"");
        document.getElementById("page-url").src = setting.qrcodeApi + urlEncode(str+"<?php echo "t=$token&k=$key";?>");
    });
    function urlEncode(String) {
        return encodeURIComponent(String).replace(/'/g,"%27").replace(/"/g,"%22");	
    }
var interval1= setInterval(function () {
       $.post("./check.php",{
        token:'<?php echo $token;?>',
       	key:'<?php echo $key;?>',
        url:'<?php echo $url;?>'
    },
	function(data,status){
      	var res=JSON.parse(data);
      	if(res.code==1){
            clearInterval(interval1);
          	window.location.href = res.url;
        }
	});}, 1000);//1秒钟循环
    </script>
</body>
</html>
