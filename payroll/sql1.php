<?php
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
//链接mysql数据库
$conn=@mysqli_connect($host,$servername,$psw);
if(!$conn)
{
	die("mysql数据库连接失败") ;
	echo "111";
}
$pd=mysqli_select_db($conn,$database);
if($pd)
{
	$sql="drop database ".$database;
	mysqli_query($conn,$sql);
}
$sql="create database ".$database;
$aa=mysqli_query($conn,$sql);
if($aa)
{
	echo "ok";
}
mysqli_select_db($conn,$database);
$sql=file_get_contents('sql1.sql');
$sqlarr=explode(";",$sql);
foreach($sqlarr as $value)
{
	mysqli_query($conn,$value);
}
?>