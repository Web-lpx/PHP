<?php
// 指定 JSON 文件路径
$jsonFilePath = './layuimini/api/menus.json';

// 读取 JSON 文件内容
$jsonData = file_get_contents($jsonFilePath);

// 将 JSON 内容设为一个空数组
$jsonData = '[]';

// 将空数组写回到 JSON 文件
file_put_contents($jsonFilePath, $jsonData);

// 输出结果
echo $jsonData;



?>