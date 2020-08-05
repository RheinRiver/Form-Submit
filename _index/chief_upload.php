<?php
header("Content-type:text/html;charset=utf-8");

$name=$_FILES['userfile']['name'];//名字
$name = iconv('gb2312', 'utf-8', $_FILES['userfile']['name']);
$filePath='../model/'.$_FILES["userfile"]["name"];//文件存储路径
$filePath2='../sum-table/'.$_FILES["userfile"]["name"];//文件存储路径

$filePath = iconv('gb2312', 'utf-8', '../model/'.$_FILES['userfile']['name']);


if(copy($_FILES["userfile"]["tmp_name"],$filePath))
{
	echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	echo "<h1 style='text-align:center'>" . $name . "已上传到模板库!" . "<h1>";
}
else
{
	echo "请重新检查文件是否正确, 1秒后返回";
}
if(!is_file($filePath2))
{
	copy($_FILES["userfile"]["tmp_name"],$filePath2);
}

echo "
<style>
	#footer {
		background-color:black;
		color:white;
		clear:both;
		text-align:center;
		padding:2px; 
	}
</style>
	<div id='footer'>
	<a id='footer' href='javascript:history.go(-1);'>Powered by YH</a>
	</div>
";

?>