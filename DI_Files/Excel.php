<?php
include 'index.php';
include 'db_connect.php';
?>
<html>
<style>
a{font-weight: bold;margin: 20px }
#barfile { background-color:#D0D0D0;border-radius: 10px;width: 550px; margin: 20px auto;height:38px;}
/* do not group these rules */
*::-webkit-input-placeholder {
    color: White;
}
*:-moz-placeholder {
    /* FF 4-18 */
    color: White;
}
*::-moz-placeholder {
    /* FF 19+ */
    color: White;
}
*:-ms-input-placeholder {
    /* IE 10+ */
    color: White;
}
</style>
<body>
<div id="barfile">
<form method="GET">
<input type='text' name="Envi" list='listid' align="right" style="margin: 0px " placeholder="Select Environment..." Style= "color: red" >
    <datalist id='listid' >
       <option  value='value1'>
       <option  value='value2'>
    </datalist>
</form>
<input type='text' list='listid1' align="right" placeholder="Select Supplier...">
    <datalist id='listid1'>
       <option  value='value1'>
       <option  value='value2'>
    </datalist>
<select>
    <option value="" disabled selected>Select your option</option>
    <option value="hurr">Durr</option>
</select>
<?php
echo '
<form method="GET">
  <select name="state"> 
    <option value="0"></option> 
    <option value="1">ok</option> 
    <option value="2">not-ok</option> 
  </select> 
</form> ';
echo $_GET['state'];
?>
<form method="post" enctype="multipart/form-data">
<a href="#" onclick="document.getElementById('A1').click(); return false; " />Pick the File </a>
<input type="file" id="A1" style ="visibility: hidden">
</form>
</div>
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
