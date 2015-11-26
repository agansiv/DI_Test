<?php 
include 'index.php';
include 'db_connect.php';
 ?>
<html>
<style>
div.barexcel { background-color:#D0D0D0;border-radius: 10px;width: 650px; margin: 20px auto;height:38px;}
input.excelload {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
}
select {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
}
</style>
<body>
<div id="barexcel" style ="background-color:#D0D0D0;border-radius: 10px;width: 750px; margin: 20px auto;height:38px;">
<form action="temp1.php" method="post" id="carform">
Name: <input class="excelload" type="text" name="name">
E-mails: <input class="excelload" type="text" name="email">
Test : 
<select name="dropdown" form ="carform" >
    <option value="" disabled selected>Select your option</option>
    <option value="SIT">SIT</option>
	<option value="FTE">FTE</option>
	<option value="Perf">Performance</option>
	<option value="REH">Rehearsal</option>
</select>
<input type="submit">
</form>
</div>
</body>
</html>