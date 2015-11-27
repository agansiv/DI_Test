<?php 
include 'index.php';
include 'db_connect.php';
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
input.excelloads {
  border-radius: 10px;
  padding:10px;
  background-color: #FFFFFF;
  height:43px;
  margin-left:2%;
 
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

}
</style>
<body>
<div id="barexcel" style ="border-radius: 10px;width: 990px; margin: 20px auto;height:43px;background-color: #FFFFFF;">
<form action="LoadExcel.php" method="post" id="loadform">
<select required name="Envi" form ="loadform" >
    <option value="" disabled selected>Select Environment ...</option>
    <option value="SIT">SIT</option>
	<option value="FTE">FTE</option>
	<option value="Perf">Performance</option>
	<option value="REH">Rehearsal</option>
</select>
<select required name="Supplier" form ="loadform" style ="margin-left:3%" >
    <option value="" disabled selected>Select Suppliers...</option>
    <option value="Generic">Generic</option>
	<option value="New Donate">New Donate</option>
	<option value="LSD">LSD</option>
	<option value="Woods">Woods</option>
</select>
<input required class = "excelloads" type="file" id="A1" name = "Choose" >
<input class = "excelload" type="submit" style ="margin-left:2%" value = "Submit">
</form>
</div>
</body>
</html>