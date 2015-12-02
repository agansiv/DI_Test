<?php
include 'index.php';
include 'db_connect.php';
#include 'GenericXML.php';
#$Gen = new Generic();
#$Gen->core('1');
?>

<html>
<style>

input.excelload {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
  background-color: #3399FF;
  height:44px;
  
}
select {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
  margin: 0px ;
  height:43px;
}
input.excelloads::-ms-browse {
    background-color: #3399FF;
    border-radius: 10px;
	border: 1px solid #999;
 	height:37px;
	width: 100px
	color: #FFFFFF;
	overflow: hidden;
	
}
 
input.excelloads::-ms-value {
    border-radius: 10px;
	height:37px;
	width: 0px
	color: #FFFFFF;
	border: 1px solid #999;
	background-color: #FFFFFF;
	overflow: hidden;
 
}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
 input.excelloads {
  border-radius: 10px;
  padding:10px;
  background-color: #3399FF;
  height:43px;
  margin-left:3%"
  color: #000000;  
}

}
@-moz-document url-prefix() {
   input.excelloads {
  border-radius: 10px;
  padding:0px;
  background-color: #3399FF;
  height:43px;
  margin-left:3%";
  color: #000000; 
}

</style>
<body>
<div id="GenVal" style ="border-radius: 10px;width: 990px; margin: 30px auto;height:213px; margin-left:30%"; ">
<form action="GenerateFiles.php" method="post" id="loadform" >
    <input required type="radio" name="List" value="Generic"  title="To generate an xml file with all Entities for Generic "/>Generic<br> 
	<input required type="radio" name="List" value="New Donate" title="To generate an xml file with all Entities for New Donate " />New Donate<br>
	<input required type="radio" name="List" value="New Donate" title="To generate an xml file with all Entities for LSD " />LSD<br>
	<input required type="radio" name="List" value="New Donate" title="To generate an xml file with all Entities for Open Market " />Open Market<br>
	<input required type="radio" name="List" value="Regression Scenarios" title="To run all the regression test scenarios " />Regression Scenarios<br>
	<input required type="radio" name="List" value="Sanity" title="To generate an xml file with all Entities,one file for each supplier "/>DI Sanity checks<br>
	<input required type="radio" name="List" value="Performance Load" title="To generate huge amount of records for Load test"/>Performance Load<br>
<br>
<select required name="Envi" form ="loadform" >
    <option value="" disabled selected>Select Environment ...</option>
    <option value="SIT">SIT</option>
	<option value="FTE">FTE</option>
	<option value="Perf">Performance</option>
	<option value="REH">Rehearsal</option>
</select>
<input class = "excelload" type="submit" style ="margin-left:2%" value = "Submit">
</form>

</div>
</body>
</html>
