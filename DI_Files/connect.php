<?php
# connect to a DSN "mydb" with a user and password "marin" 
$connect = odbc_connect("SIT", "palagi01", "s1mple01");

# query the users table for name and surname
$query = "SELECT  * FROM DI_test_records ";



# perform the query
$result = odbc_exec($connect, $query);



# fetch the data from the database
while(odbc_fetch_row($result)){
  $name = odbc_result($result, 1);
  $surname = odbc_result($result, 2);
  $Title = odbc_result($result, 3);
  $Status = odbc_result($result, 4);
  print("$name  $surname $Title $Status\n");
}
echo "test";


# close the connection
odbc_close($connect);
?>





