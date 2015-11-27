<?php 
include 'Excel.php';
 
echo '<html>
<body>
<b Style ="color: blue">Environment Selected : </b> '; $Envi= $_POST["Envi"];echo $Envi; echo '<br>
<b Style ="color: blue">Supplier  Selected:</b>'; $Supplier = $_POST["Supplier"]; echo $Supplier; echo '<br>
<b Style ="color: blue">File Selected: </b>'; $file = $_POST["Choose"];echo ($file); echo '<br>
</body>
</html>';
//include 'index.php';
//include 'db_connect.php';
//$connect = odbc_connect ("Load", "", "");Works in case required
echo '<br>';
echo $file;
echo '<br>';
$deffilepath = 'H:\Sprints\DI_Automation';


//$excelFile = realpath('H:\Sprints\DI_Automation\test2.xls');
$excelFile = $deffilepath.'\\'.$file;
echo $excelFile;
//$excelDir = dirname($excelFile);
$excelDir = $deffilepath;
echo '<br>';
echo '<br>';
$connect = odbc_connect("Driver={Microsoft Excel Driver (*.xls)};DriverId=790;Dbq=$excelFile;DefaultDir=$excelDir" , '', ''); 
$result = odbc_exec ($connect, "select * from [Sheet1$]");
while($row=odbc_fetch_row($result)){
	echo odbc_result($result, "one")." ".odbc_result($result, "two").nl2br("\r\n");
 } 
?>