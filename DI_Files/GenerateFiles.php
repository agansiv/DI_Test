<?php 
include 'Generate.php';
 
echo '<html>
<body>
<b Style ="color: blue">Environment Selected : </b> '; $Envi= $_POST["Envi"];echo $Envi; echo '<br>
<b Style ="color: blue">File Selected: </b>'; $file = $_POST["List"];echo ($file); echo '<br>
</body>
</html>';
include 'GenericXML.php';
$Gen = new Generic();
$Gen->core('1');
include 'NDXML.php';
$NDo = new NewDonate();
$NDo->ND('1');
include 'LSDXML.php';
$NDo = new LSDs();
$NDo->LSD('1');
include 'OPMXML.php';
$OP = new OpenM();
$OP->OPM('1');
?>