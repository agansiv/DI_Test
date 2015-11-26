<?php 
include 'Excel.php';
 ?>
<html>
<body>

Welcome <?php echo $_POST["Envi"]; ?><br>
Your email address is: <?php echo $_POST["Supplier"]; ?><br>

</body>
</html>

<?php
//include 'index.php';
//include 'db_connect.php';
//$connect = odbc_connect ("Load", "", "");Works in case required
$excelFile = realpath('C:\xampp\htdocs\DI_Files\test.xls');
$excelDir = dirname($excelFile);
$connect = odbc_connect("Driver={Microsoft Excel Driver (*.xls)};DriverId=790;Dbq=$excelFile;DefaultDir=$excelDir" , '', ''); 
$result = odbc_exec ($connect, "select * from [Sheet1$]");
while($row=odbc_fetch_row($result)){
	echo odbc_result($result, "one")." ".odbc_result($result, "two").nl2br("\r\n");
 } 
?>