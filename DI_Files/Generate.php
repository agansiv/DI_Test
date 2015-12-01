<?php
include 'index.php';
include 'db_connect.php';
include 'GenericXML.php';
$Gen = new Generic();
$Gen->core('1');
?>
<html>
<style>
</style>
<body>
<div id="barexcel" style ="border-radius: 10px;width: 990px; margin: 20px auto;height:43px;background-color: #FFFFFF;">
<form action="LoadExcel.php" method="post" id="loadform">
Select the Test Case ID : <br><input type ="text" name ="TestCases" >
<input class = "excelload" type="submit" style ="margin-left:2%" value = "Submit">
</form>
</div>
</body>
</html>
