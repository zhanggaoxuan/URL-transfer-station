<?php
$token=$_POST['token'];
$key=$_POST['key'];
$u=$_POST['url'];
$url="404";
if(file_exists("$token.check")){
   if(file_get_contents("$token.check")==$key){
      $json = file_get_contents('url.json');
      $urllist=json_decode($json,true);
      foreach($urllist as $ul){
         if($ul['key']==$u){
	      $url=$ul['url'];
      }
}
$arr = ['code' => 1, 'msg' => '登录成功','url'=>$url];
unlink("./$token.check");
}
else{
   $arr = ['code' => 500, 'msg' => 'ERROR'];
   unlink("./$token.check");
}
}else{
   $arr = ['code' => 0, 'msg' => 'ERROR'];
}
echo json_encode($arr);
exit();
?>
