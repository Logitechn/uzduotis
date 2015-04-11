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
  
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $surn = mysqli_real_escape_string($link, strip_tags($_POST['surname']));
    $birth = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['birth_years'])) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['shirt_number'])) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
    
    //$sql = "INSERT INTO players name=?"." and surname=?". ",birth_years,shirt_number) VALUES (?,?,?,?)";
    //$sql = $link->prepare("INSERT INTO players (name,surname,birth_years,shirt_number) 
    //VALUES(?,?,?,?)");
    $sql = "INSERT INTO players (name,surname,birth_years,shirt_number) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.")";
    //$stmt = $link->prepare($sql);
    //$sql->bind_param("ssss", $name, $surname, $birth_years, $shirt_number);
    //$stmt->execute(array($name, $surname, $birth_years, $shirt_number));
    //$stmt->fetch();
    if (!$link->query($sql)) 
    {
        die('error: ' . mysql_error());
    }else
    {
        header("Location:index.php"); 
    }
    //$sql->close();
    $link->close();