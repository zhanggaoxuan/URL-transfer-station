<?php
$host = 'localhost';
$database = '数据库名';
$username = '数据库用户';
$password = '数据库密码';

$con=mysqli_connect($host,$database,$password,$database); 
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
}


$sql = "SELECT XXXX as `key`,XXXX as url From XXXX";
$retval = mysqli_query($con,$sql);
$row=array();
while ($roww = mysqli_fetch_array($retval,MYSQLI_ASSOC)){
	$count=count($roww);
	for ($i=0;$i<$count;$i++){
		unset($roww[$i]);
	}
	array_push($row,$roww);
}
$data=json_encode($row);

$myfile = fopen("url.json", "w");
fwrite($myfile, $data);
fclose($myfile);
?>
