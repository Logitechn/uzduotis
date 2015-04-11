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
  
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $surn = mysqli_real_escape_string($link, strip_tags($_POST['surname']));
    $birth = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['birth_years'])) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['shirt_number'])) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
    
    //$stmt = mysqli_prepare($link, "INSERT INTO players name=?"." and surname=?". "birth_years=?". "shirt_number=?");
    $sql = "INSERT INTO players (name,surname,birth_years) VALUES(?,?,?)";
    //$stmt = mysqli_prepare($link, $sql);
    //$sql = "INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.")";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('sss', $nam, $surn, $birth);   
    //mysqli_stmt_bind_param($stmt, "sssd", $name, $surname, $birth_years, $shirt_number);
    //mysqli_stmt_execute($stmt);
    $stmt->execute();
    //$stmt->fetch();
    $stmt->close();
    //mysqli_stmt_close($stmt);
    $link->close();
    //mysqli_close($link);
    header("Location:index.php"); 