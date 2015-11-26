<html>
<style>
h1 {
	text-align: center;
	font-size: 2 em;
	color:blue;
}
form {
	display: inline;
}
input.err {
  border-radius: 10px;
  padding:10px;
  border: 1px solid #999;
  color: #FFFFFF;
  background-color: #3399FF;
}
input.err:hover {
	background-color: #ff3333;
	font-weight:bold;
}
#bar {
    background-color:#D0D0D0;
	border-radius: 10px;
}
</style>
<header>
<h1> DI Test Results </h1>
<header>
<body>
<div id="bar">
<form method="post" action="../../DI_Files/GenericXML.php">
   <input class="err" type="submit" value="Generate XML Files">
</form>
<form method="post" action="../../DI_Files/Excel.php">
   <input class="err" type="submit" value="Generate From Excel">
</form>
<form action="demo_form.asp" method="post" >
   <input class="err" type="submit" value="Results">
</form>
<form method="post" action="../../DI_Files/Table.php">
   <input class="err" type="submit" value="Table">
</form>
<form method="post" action="../../DI_Files/temp.php">
   <input class="err" type="submit" value="Canonical_temp">
</form>
</div>

</body>
</html>