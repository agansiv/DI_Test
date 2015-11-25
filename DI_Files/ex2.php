<?php
$excelFile = realpath('C:/xampp/htdocs/DI_Files/test.xlsx');
 $connect = new PDO("odbc:Driver={Microsoft Excel Driver (*.xls, *.xlsx, *.xlsm, *.xlsb)};Dbq=$excelFile", "", "");
$query = "select * from [Sheet1$]";
    $sql = $connect->prepare($query);
    $row = $sql->execute();

//while ($row = $sql->fetch(PDO::FETCH_NUM))  {
	while ($row = $sql->fetchAll(PDO::FETCH_COLUMN))  {
	
	//fetchAll(PDO::FETCH_COLUMN);
    echo  $row[0];
    //$con = $row[2];
	//echo $id ;
}
	
?>