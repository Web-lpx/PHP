<?php
$host='localhost';
$servername='root';
$psw='111111';
$database='gongzi';
$conn=@mysqli_connect($host,$servername,$psw,$database);
$sql="select * from stafftotal";
$bb=mysqli_query($conn,$sql);
$cc=mysqli_num_rows($bb);
$jsonData = file_get_contents('../layuimini/api/menus.json');
$data = json_decode($jsonData, true);
$x=0;
while($dd=mysqli_fetch_array($bb)){
	        $data["data"][$x]["num"]=$x;
            $data["data"][$x]["authorityId"]=1;
			$data["data"][$x]["orderNumber"]=1;
			$data["data"][$x]["checked"]=0;
			$data["data"][$x]["isMenu"]=0;
			$data["data"][$x]["parentId"]=-1;
			$data["data"][$x]["name"]=$dd["staffname"];
			$data["data"][$x]["dz"]=$dd["dizhi"];
			$data["data"][$x]["sfz"]=$dd["staffidcard"];
			$data["data"][$x]["dh"]=$dd["stafftel"];
			$data["data"][$x]["bm"]=$dd["depart"];
			++$x;
	}
$editedJsonData = json_encode($data);
file_put_contents('../layuimini/api/menus.json', $editedJsonData);
echo 'Edited JSON data saved successfully.';
?>