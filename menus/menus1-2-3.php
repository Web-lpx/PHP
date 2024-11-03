<?php
//链接mysql数据库
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
$conn=@mysqli_connect($host,$servername,$psw,$database);
$sql="select * from zuzhuangdepart";
$bb=mysqli_query($conn,$sql);
$cc=mysqli_num_rows($bb);
// 读取JSON文件内容
$jsonData = file_get_contents('../layuimini/api/menus1-2-3.json');
// 解析JSON数据为PHP数组或对象
$data = json_decode($jsonData, true);
$x=0;
while($dd=mysqli_fetch_array($bb)){
	$data["data"][$x]["num"]=$x;
	$data["data"][$x]["authorityId"]=1;
	$data["data"][$x]["orderNumber"]=1;
	$data["data"][$x]["checked"]=0;
	$data["data"][$x]["isMenu"]=0;
	$data["data"][$x]["parentId"]=-1;
	$data["data"][$x]["name"]=$dd["zuzhuangname"];
	$data["data"][$x]["jbgz"]=$dd["jibenwages"];
	$data["data"][$x]["jbf"]=$dd["jiaban"];
	$data["data"][$x]["fk"]=$dd["fakuan"];
	$data["data"][$x]["zgz"]=$dd["zongwages"];
	++$x;
}
// 将编辑后的数据转换为JSON格式
$editedJsonData = json_encode($data);
// 将编辑后的JSON数据写回到原有的JSON文件
file_put_contents('../layuimini/api/menus1-2-3.json', $editedJsonData);

// 返回成功消息给前端
echo 'Edited JSON data saved successfully.';
?>