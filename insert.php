<?php
    require_once('database.php');
    
    if (empty($_POST['name']) || empty($_POST['surname'])) 
    {
        die('Name and/or surname is required!');
    }
    
    $nam = strip_tags($_POST['name']);
    $surn = strip_tags($_POST['surname']);
    $birth = strip_tags(!empty($_POST['birth_years']) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty($_POST['shirt_number']) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
	
    $sql = "INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.")";
    if (!$link->query($sql)) 
    {
        die('error: ' . mysql_error());
    }else{
        echo "<meta http-equiv='refresh' content='0; url=index.php'>"; 
    }
    
    mysqli_close($link);
