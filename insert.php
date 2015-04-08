<?php
    require_once('database.php');
    
    if (empty($_POST['name']) || empty($_POST['surname'])) 
    {
        die('Name and/or surname is required!');
    }
    if (!empty($_POST['shirt_number']))
    {
        if (!is_numeric($_POST['shirt_number']) || $_POST['shirt_number'] <= 0)
        {
            die('Shirt number must be positive and integer number!');
        }
        
    }
    
    $nam = strip_tags($_POST['name']);
    $surn = strip_tags($_POST['surname']);
    $birth = strip_tags(!empty($_POST['birth_years']) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty($_POST['shirt_number']) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
    
    $sql = "INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.")";
    if (!$link->query($sql)) 
    {
        die('error: ' . mysql_error());
    }else
    {
        header("Location:index.php"); 
    }
    
    mysqli_close($link);