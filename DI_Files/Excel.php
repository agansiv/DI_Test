<?php 
include 'index.php';
include 'db_connect.php';
 ?>
<html>
<style>
input.excelloads {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
  color: #FFFFFF;
  background-color: #3399FF;
}
input.excelloadss {
  border-radius: 12px;
  padding:10px;
  border: 1px solid #999;
  color: #FFFFFF;
  background-color: #3399FF;
  height:38px;
  margin-left:3%;
}
select {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
  margin: 0px auto;
}
a {
    display: inline-block; 
}
::-ms-browse {
    font-weight: bold;
    background-color: #3399FF;
    border-radius: 12px;
	height:38px;
	color: #FFFFFF;
}
 
input.excelloads::-ms-value {
    border-radius: .5em 0 0 .5em;
	 display :none;
}
</style>
<body>
<div id="barexcel" style ="border-radius: 10px;width: 816px; margin: 20px auto;height:38px;">
<form action="temp1.php" method="post" id="carform">
<select required name="Envi" form ="carform" >
    <option value="" disabled selected>Select Environment ...</option>
    <option value="SIT">SIT</option>
	<option value="FTE">FTE</option>
	<option value="Perf">Performance</option>
	<option value="REH">Rehearsal</option>
</select>
<select required name="Supplier" form ="carform" style ="margin-left:3%" >
    <option value="" disabled selected>Select Suppliers...</option>
    <option value="Generic">Generic</option>
	<option value="New Donate">New Donate</option>
	<option value="LSD">LSD</option>
	<option value="Woods">Woods</option>
</select>
<input class = "excelloads" type="file" id="A1" style ="::-ms-value" >
<input class = "excelload" type="submit" style="float: right;" value = "Submit">
</form>
</div>
</body>
</html>