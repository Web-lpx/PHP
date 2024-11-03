<?php
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
$conn=@mysqli_connect($host,$servername,$psw,$database);
$sql="select * from stafftotal";
$bb=mysqli_query($conn,$sql);
//$cc=mysqli_num_rows($bb);
$cc=22;
echo $cc;
?>