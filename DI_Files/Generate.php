<?php
#include $_SERVER['DOCUMENT_ROOT'].'/index.php';
include 'index.php';
include 'db_connect.php';
$sqlop = new db_connect();
$result = $sqlop->db('SELECT  row_id,fst_name FROM siebel.s_contact where rownum<6');
# fetch the data from the database
while(odbc_fetch_row($result)){
  $name = odbc_result($result, 1);
  $surname = odbc_result($result, 2);
  print("$name \n $surname \n");
}
?>