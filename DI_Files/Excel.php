<?php
include 'index.php';
include 'db_connect.php';
$connect = odbc_connect ("Load", "", "");
$result = odbc_exec ($connect, "select * from [Sheet1$]");
while($row=odbc_fetch_row($result)){
	echo odbc_result($result, "one")." ".odbc_result($result, "two").nl2br("\r\n");
 } 
?>

