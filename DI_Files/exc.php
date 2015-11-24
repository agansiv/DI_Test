<?php
$connect = odbc_connect("Excel", "palagi01", "s1mple01");
# query the users table for name and surname
$query = "SELECT  * FROM [Sheet1$] ";
# perform the query
$result = odbc_exec($connect, $query);
while($row=odbc_fetch_row($result)){
	echo odbc_result($result, 2);	
}

$excelFile = realpath('C:/ExcelData.xls');
$excelDir = dirname($excelFile);
$connection = odbc_connect("Driver={Microsoft Excel Driver (*.xls)};DriverId=790;Dbq=$excelFile;DefaultDir=$excelDir" , '', '');
?>
?>