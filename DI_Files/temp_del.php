<?php
$a="1";
$b="";

if (!empty($a) and   !empty($b)) {
		echo "both are not empty";
} 
elseif (empty($a) and   !empty($b)) {
		echo "Populate B";
}
elseif (!empty($a) and   empty($b)) {
		echo "Populate A";
}
elseif (empty($a) and   empty($b)) {
		echo "Populate both though empty";
	 }
echo "<br>";
echo "Value a ".substr('12345',-2);
echo "<br>";
echo "Value b ".!empty($b);
?>
