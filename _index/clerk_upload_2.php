<?php
header("Content-type:text/html;charset=utf-8");
require 'vendor/autoload.php';



//复制本地文件到服务器临时文件夹
$name=$_FILES['userfile']['name'];//名字
$name = iconv('gb2312', 'utf-8', $_FILES['userfile']['name']);

$tempfile = iconv('gb2312', 'utf-8', '../template/'.$_FILES['userfile']['name']);

if(copy($_FILES["userfile"]["tmp_name"],$tempfile))
{
	echo $name . "已提交到汇总表";
	echo "<br><br>";
	echo "您的填写情况如下:";
	echo "<br><br>";
}
/*
if(!is_file('model/'.$name);)
{
	echo '不存在此模板!';
}
*/
//读取本地文件所有数据
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($tempfile);

$sheet = $spreadsheet->getSheet(0);
$local_data = array();
$i = 0;
for($row = 0; $row < 10; $row++)
{
	for($column = "A"; $column <= "J"; $column++)
	{
		$local_data[$i] = $sheet->getCell($column . ($row + 1))->getValue();
		//echo $i+1 . ":" . $local_data[$i] . "<br>";
		$i++;
	}
}

//读取汇总文件所有数据

$sumfile = '../sum-table/'.$_FILES["userfile"]["name"]; //汇总文件路径
$sumfile = iconv('gb2312', 'utf-8', $sumfile);

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($sumfile);

$sheet = $spreadsheet->getSheet(0);

$sum_data = array();
$i = 0;
for($row = 0; $row < 200; $row++)
{
	for($column = "A"; $column <= "J"; $column++)
	{
		$sum_data[$i] = $sheet->getCell($column . ($row + 1))->getValue();
		//echo $i+1 . ":" . $sum_data[$i] . "<br>";
		$i++;		
	}
}

//打印本地汇总数据
echo "
<html>
  <head>
	<style type='text/css'>
	.div1{
		width: 80px;
		height: 20px;
		border: 1px solid black;
	}
	</style>
<table border = '1'>
	<tr>
		<th class = 'div1'></th>
		<th class = 'div1'>A</th>
		<th class = 'div1'>B</th>
		<th class = 'div1'>C</th>
		<th class = 'div1'>D</th>
		<th class = 'div1'>E</th>
		<th class = 'div1'>F</th>
		<th class = 'div1'>G</th>
		<th class = 'div1'>H</th>
		<th class = 'div1'>I</th>
		<th class = 'div1'>J</th>		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>001</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[0];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[1];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[2];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[3];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[4];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[5];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[6];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[7];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[8];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[9];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>002</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[10];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[11];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[12];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[13];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[14];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[15];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[16];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[17];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[18];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[19];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>003</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[20];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[21];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[22];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[23];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[24];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[25];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[26];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[27];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[28];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[29];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>004</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[30];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[31];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[32];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[33];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[34];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[35];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[36];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[37];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[38];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[39];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>005</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[40];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[41];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[42];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[43];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[44];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[45];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[46];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[47];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[48];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[49];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>006</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[50];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[51];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[52];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[53];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[54];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[55];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[56];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[57];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[58];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[59];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>007</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[60];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[61];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[62];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[63];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[64];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[65];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[66];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[67];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[68];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[69];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>008</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[70];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[71];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[72];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[73];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[74];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[75];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[76];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[77];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[78];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[79];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>009</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[80];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[81];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[82];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[83];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[84];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[85];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[86];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[87];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[88];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[89];echo "		
	</tr>
	<tr>
		<td class = 'div1' style='text-align:center'>010</td>
		<td class = 'div1' style='text-align:right'>";echo $local_data[90];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[91];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[92];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[93];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[94];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[95];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[96];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[97];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[98];echo "
		<td class = 'div1' style='text-align:right'>";echo $local_data[99];echo "		
	</tr>

</table>
<br><br>
<div style = 'text-align:center'>
<a id='footer' href='http://localhost:80/filestore2/clerk_index/1.html'>Powered by YH</a>
</div>
";


//将本地文件数据写入汇总表
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();	

$i = 0;
for($row = 0; $row < 200; $row++)
{
	for($column = "A"; $column <= "J"; $column++)
	{
		$sheet->setCellValue($column . ($row + 1), $sum_data[$i]);
		$i++;
	}
}

$i = 0;
for($row = 20; $row < 30; $row++)
{
	for($column = "A"; $column <= "J"; $column++)
	{
		$sheet->setCellValue($column . ($row + 1), $local_data[$i]);
		$i++;
	}
}



$writer = new Xlsx($spreadsheet);
$writer->save($sumfile);


?>