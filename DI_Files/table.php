<?php
include 'index.php';
include 'db_connect.php';
$connect = odbc_connect ("Load", "", "");
$result = odbc_exec ($connect, "select * from [Sheet1$]");
//echo odbc_num_fields($result);


//requery for header coulmns 
$result = odbc_exec ($connect, "select * from [Sheet1$]");
echo '
<style>

</style>';
echo '<html>
      <div style="margin:20px; margin-left:3%;">
	  <table border="1"  >
	 <tr>';
 for($i = 1;$i <= odbc_num_fields($result);$i++)
    {
       echo '<td class="header" style="font-weight:bold ">'.odbc_field_name($result, $i).'</td>';
    }
echo '
      </tr> '; 
//requery for actual fields values  
$result2 = odbc_exec ($connect, "select * from [Sheet1$]");
while($row=odbc_fetch_row($result2))
	{
		echo ' <tr> ';
		for($i=1;$i<=odbc_num_fields($result2);$i++)
		{
		echo '<td class="text">'.odbc_result($result2, $i).'</td>';
		}
		echo ' </tr> ';
	}
echo '
       
</table>
</div>
</html>
	  ';

?>
