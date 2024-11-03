<?php
session_start();
//1、验证码比对
$a=$_POST["username"];
$b=$_POST["password"];
$c=$_POST["captcha"];
if(strtolower($_SESSION["captchaing"])==strtolower($c))
{
	$yzmcode=100;
	$host='localhost';
	$servername='root';
	$psw='111111';
	$database='gongzi';
	$conn=@mysqli_connect($host,$servername,$psw,$database);
	$sql="select * from admin where user='".$a."' and psw='".$b."'";
	$row=mysqli_query($conn,$sql);
	$nums=mysqli_num_rows($row);
	if($nums==1){
		$usercode=100;
	}
	else{
		$usercode=200;
	}
}
else{
	$yzmcode=200;
	$usercode=300;
}
$response = array(
  'yzmcode' => $yzmcode,
  'usercode' => $usercode
);

// 将结果转换为JSON字符串并返回
echo json_encode($response);
//echo $usercode;


//$arr=array('code'=>100,'yzmcode'=>$yzmcode,'usercode'=>$nums,'idcode'=>$idcode);
//echo json_encode($arr);
//$yzmcode=100;
//		require_once("./conn.php");
//		$conn=mysqli_connect($host,$servername,$psw);
//		$yhm=$_POST["username"];
//		$psw=md5($_POST["password"]);
//		$sql="select * from admin where user='".$yhm."' and psw='".$psw."'";
//		$row=mysqli_query($conn,$sql);
//		$nums=mysqli_num_rows($row);//求记录的数量
//		if($nums==1)
//		{
//			$record=mysqli_fetch_object($row);
//			$idcode=$record->id;
//			$_SESSION["userid"]=$record->id;	
//		}
//else
//{
//	$yzmcode=200;
//
//}

?>