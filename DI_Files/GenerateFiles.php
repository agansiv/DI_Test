<?php 
include 'Generate.php';
 
echo '<html>
<body>
<b Style ="color: blue">Environment Selected : </b> '; $Envi= $_POST["Envi"];echo $Envi; echo '<br>
<b Style ="color: blue">File Selected: </b>'; $file = $_POST["List"];echo ($file); echo '<br>
</body>
</html>';
?>