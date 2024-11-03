<?php
// 读取JSON文件内容
$jsonString = file_get_contents('./layuimini/api/menus.json');

// 解析JSON数据
$data = json_decode($jsonString, true);
print_r($data);

// 操作和处理数据
// ...

// 将数据转换为JSON格式
//$jsonData = json_encode($data);

// 写入JSON文件
//file_put_contents('output.json', $jsonData);
?>
