<?php
    require_once('database.php');
    
    if (empty($_POST['name']) || empty($_POST['surname'])) 
    {
        die('Name and/or surname is required!');
    }
    if (!empty($_POST['shirt_number']))
    {
        if (!is_numeric($_POST['shirt_number']) || $_POST['shirt_number'] < 0)
        {
            die('Shirt number must be positive and integer number!');
        }
        
    }
    $number = 0;
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $surn = mysqli_real_escape_string($link, strip_tags($_POST['surname']));
    $birth = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['birth_years'])) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['shirt_number'])) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
    
    $sql = "INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.")";
    if (!$link->query($sql)) 
    {
         die('error: ' . mysqli_error($link));
    }else{
        header("Location:index.php"); 
    }
    $link->close();