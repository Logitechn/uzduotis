<?php
    require_once('database.php');
    
    if (empty($_POST['name']) || empty($_POST['city']) || empty($_POST['logo'])) 
    {
        die('Name and/or city and/or logo is required!');
    }
   
    $number = 0;
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $city = mysqli_real_escape_string($link, strip_tags($_POST['city']));
    $logo = mysqli_real_escape_string($link, strip_tags($_POST['logo']));
    
    $sql = "INSERT INTO teams (name, city, logo) VALUES ('".$nam."', '".$city."', '".$logo."')";
    if (!$link->query($sql)) 
    {
         die('error: ' . mysqli_error($link));
    }else{
        header("Location:index.php"); 
    }
    $link->close();