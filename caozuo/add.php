<?php
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
$conn=@mysqli_connect($host,$servername,$psw,$database);
$a=$_POST["newname"];
$b=$_POST["newtel"];
$c=$_POST["newdizhi"];
$d=$_POST["newdepart"];
$e=$_POST["newidcard"];
$f=$_POST["newjbgz"];
$i=$_POST["newjbf"];
$j=$_POST["newfk"];
$k=$_POST["newzgz"];
$aa="";
$bb="";
if($d=="生产部门"){
	$aa="shengchandepart";
	$bb="shengchanname";
}
else if($d=="包装部门"){
	$aa="baozhuangdepart";
	$bb="baozhuangname";
}
else{
	$aa="zuzhuangdepart";
	$bb="zuzhuangname";
}
$sql = "INSERT INTO stafftotal (staffname, staffidcard, depart, stafftel, dizhi) VALUES ('" . $a . "', '" . $e . "', '" . $d . "', '" . $b . "', '" . $c . "')";
$sql1= "INSERT INTO " . $aa . " (" . $bb . ",jibenwages, jiaban, fakuan, zongwages) VALUES ('" . $a . "', '" . $f . "', '" . $i . "', '" . $j . "', '" . $k . "')";
mysqli_query($conn,$sql);
mysqli_query($conn,$sql1);
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