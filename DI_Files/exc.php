<?php
 $dd = odbc_connect ("Driver={Microsoft Excel Driver (*.xls)};Dbq='C:\Xampp\htdocs\DI_Files\Test.xlsx';READONLY=FALSE;", "", "");
 $result = odbc_exec ($dd, "select * from [Sheet1$]");
 #odbc_result_all($result, "bgcolor='DDDDDD' cellpadding = '1'");
?>

