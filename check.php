<?php
$token=$_POST['token'];
$key=$_POST['key'];
if(file_get_contents("$token.txt")==$key){
$arr = ['code' => 1, 'msg' => '登录成功'];
unlink("./$token.txt");
}
else{
   $arr = ['code' => 500, 'msg' => 'ERROR'];
}
echo json_encode($arr);
exit();
?>