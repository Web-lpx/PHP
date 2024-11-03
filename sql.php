<?php
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
//链接mysql数据库
$conn=@mysqli_connect($host,$servername,$psw,$database);
if(!$conn)
{
	die("mysql数据库连接失败") ;
	echo "111";
}
$sql=file_get_contents('sql.sql');
$sqlarr=explode(";",$sql);
foreach($sqlarr as $value)
{
	mysqli_query($conn,$value);
}
?>