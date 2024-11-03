<?php
$a=$_POST["demoname"];
$b=$_POST["demodepart"];
$c=$_POST["demojbgz"];
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
$conn=@mysqli_connect($host,$servername,$psw,$database);
$aa="";
$bb="";
if($b=="生产部门"){
	$aa="shengchandepart";
	$bb="shengchanname";
}
else if($b=="包装部门"){
	$aa="baozhuangdepart";
	$bb="baozhuangname";
}
else{
	$aa="zuzhuangdepart";
	$bb="zuzhuangname";
}
$sql = "UPDATE $aa SET jibenwages= '$c' WHERE $bb= '$a' ";
mysqli_query($conn,$sql);
$response = "数据已成功接收：用户名为".$a;
echo $response;
// 指定 JSON 文件路径
$jsonFilePath1 = '../layuimini/api/menus1-2-1.json';
$jsonFilePath2 = '../layuimini/api/menus1-2-2.json';
$jsonFilePath3 = '../layuimini/api/menus1-2-3.json';
// 读取 JSON 文件内容
$jsonData1 = file_get_contents($jsonFilePath1);
$jsonData2 = file_get_contents($jsonFilePath2);
$jsonData3 = file_get_contents($jsonFilePath3);
// 将 JSON 内容设为一个空数组
$jsonData1 = '[]';
$jsonData2 = '[]';
$jsonData3 = '[]';
// 将空数组写回到 JSON 文件
file_put_contents($jsonFilePath1, $jsonData1);
file_put_contents($jsonFilePath2, $jsonData2);
file_put_contents($jsonFilePath3, $jsonData3);

require '../menus/menus1-2-1.php';
require '../menus/menus1-2-2.php';
require '../menus/menus1-2-3.php';
?>