<?php
//$connect = odbc_connect("Load", "", "");
 //$connect = odbc_connect("ODBC;Driver={Microsoft Excel Driver (*.xls*)};DSN='Load';DBQ='test.xlsx';READONLY=FALSE;", "", "");
$excelFile = realpath('C:\xampp\htdocs\DI_Files\test.xls');
//$excelFile = realpath('C:/xampp/htdocs/DI_Files/test.xls');
$excelDir = dirname($excelFile);
echo $excelFile;
echo $excelDir;

$connection = odbc_connect("Driver={Microsoft Excel Driver (*.xls)};DriverId=790;Dbq=$excelFile;DefaultDir=$excelDir" , '', ''); 
$result = odbc_exec ($connection, "select * from [Sheet1$]");
while($row=odbc_fetch_row($result)){
	
	//$hea = odbc_field_name($result, 1);
	$one = odbc_result($result, "one");
	$two = odbc_result($result, "two");
	echo "$one \n  \n $two ";
	
}
?>
