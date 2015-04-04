<?php
include_once('datebase.php');
if (empty($_POST['name']) || empty($_POST['surname'])) {
    die('Name and/or surname is required!');
}
$nam = $_POST['name'];
$surn = $_POST['surname'];
$birth = !empty($_POST['birth_years']) ? sprintf("'%s'",$_POST['birth_years']) : 'null';
$number = !empty($_POST['shirt_number']) ? sprintf("'%s'",$_POST['shirt_number']) : 'null';
	
$sql = "INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.")";
//die($sql); // INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('Situation', 'sda', '1959-10-03', '00') 
if (!$link->query($sql)) {
	die('error: ' . mysql_error());

} else{
	echo "<meta http-equiv='refresh' content='0; url=index.php'>"; }



mysqli_close($link);
?>
