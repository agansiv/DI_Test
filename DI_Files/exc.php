<?php
$connect = odbc_connect("Load", "", "");
 //$connect = odbc_connect("ODBC;Driver={Microsoft Excel Driver (*.xls*)};DSN='Load';DBQ='test.xlsx';READONLY=FALSE;", "", "");
$result = odbc_exec ($connect, "select * from [Sheet1$]");
while($row=odbc_fetch_row($result)){
	
	//$hea = odbc_field_name($result, 1);
	$one = odbc_result($result, "one");
	$two = odbc_result($result, "two");
	echo "$one \n  \n $two ";
	
}
?>
