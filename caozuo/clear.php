<?php
$a=$_POST["clearname"];
$b=$_POST["clearid"];
$c=$_POST["cleardepart"];
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
$conn=@mysqli_connect($host,$servername,$psw,$database);
$sql = "DELETE FROM stafftotal WHERE staffname = '$a' AND staffidcard = '$b'";
mysqli_query($conn,$sql);
$aa="";
$bb="";
if($c=="生产部门"){
	$aa="shengchandepart";
	$bb="shengchanname";
}
else if($c=="包装部门"){
	$aa="baozhuangdepart";
	$bb="baozhuangname";
}
else{
	$aa="zuzhuangdepart";
	$bb="zuzhuangname";
}
$sql = "DELETE FROM stafftotal WHERE staffname = '$a' AND staffidcard = '$b'";
$sql1 = "DELETE FROM $aa WHERE $bb = '$a'";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql);
$response = array(
  'a' => $a,
  'b' => $b,
  'c' => $c,
  'aa' => $aa,
  'bb' => $bb
);
echo json_encode($response);
// 指定 JSON 文件路径
$jsonFilePath = '../layuimini/api/menus.json';
$jsonFilePath1 = '../layuimini/api/menus1-2-1.json';
$jsonFilePath2 = '../layuimini/api/menus1-2-2.json';
$jsonFilePath3 = '../layuimini/api/menus1-2-3.json';
// 读取 JSON 文件内容
$jsonData = file_get_contents($jsonFilePath);
$jsonData1 = file_get_contents($jsonFilePath1);
$jsonData2 = file_get_contents($jsonFilePath2);
$jsonData3 = file_get_contents($jsonFilePath3);
// 将 JSON 内容设为一个空数组
$jsonData = '[]';
$jsonData1 = '[]';
$jsonData2 = '[]';
$jsonData3 = '[]';
// 将空数组写回到 JSON 文件
file_put_contents($jsonFilePath, $jsonData);
file_put_contents($jsonFilePath1, $jsonData1);
file_put_contents($jsonFilePath2, $jsonData2);
file_put_contents($jsonFilePath3, $jsonData3);

require '../menus/menu.php';
require '../menus/menus1-2-1.php';
require '../menus/menus1-2-2.php';
require '../menus/menus1-2-3.php';



?>
