<?php
    require_once('database.php');
    require_once('functions.php');
    
    if (empty($_POST['name']) || empty($_POST['surname'])) 
    {
        die('Name and/or surname is required!');
    }
    if (empty($_POST['team'])) 
    {
        die('Select or Create team!');
    }
    if (!empty($_POST['shirt_number']))
    {
        if (!is_numeric($_POST['shirt_number']) || $_POST['shirt_number'] < 0)
        {
            die('Shirt number must be positive and integer number!');
        }
    }
    /*$check="select * from Where name = '$_POST['name']'";
    $rs = mysqli_query($link, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if ($data[0] > 1){
        echo "ssss";
    }*/
    
    $number = 0;
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $surn = mysqli_real_escape_string($link, strip_tags($_POST['surname']));
    $birth = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['birth_years'])) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['shirt_number'])) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
    $teams = mysqli_real_escape_string($link, strip_tags($_POST['team']));
    
    $rows = getPlayers();
    if ($rows)
    {
        foreach ($rows as $row)
        {
            if (($row['name'] == $nam && $row['surname'] == $surn) && $row['team'] == $teams){
                die ('This player are created!');
            }      
        }
    }
    
    /*$result = mysqli_query("Select name From players WHERE name='Aurimas'");
    if (mysqli_num_rows($result) > 0){
        die ('This player exist!');
    }*/
    
        
    $sql = "INSERT INTO players (name,surname,birth_years,shirt_number,team) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.", '".$teams."')";
    
    //$sql="insert into players (name,surname,birth_years,shirt_number,team) Select $nam"
    if (!$link->query($sql)) 
    {
         die('error: ' . mysqli_error($link));
    }else{
        header("Location:index.php"); 
    }
    $link->close();