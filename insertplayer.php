<?php
    require_once('database.php');
    require_once('functions-php.php');
    
    if (empty($_POST['name']) || empty($_POST['surname'])) 
    {
        die('Name and/or surname is required!');
    }
    if (empty($_POST['team_name'])) 
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
    
    $number = 0;
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['name']));
    $surn = mysqli_real_escape_string($link, strip_tags($_POST['surname']));
    $birth = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['birth_years'])) ? sprintf("'%s'",$_POST['birth_years']) : 'null');
    $number = strip_tags(!empty(mysqli_real_escape_string($link, $_POST['shirt_number'])) ? sprintf("'%s'",$_POST['shirt_number']) : 'null');
    $team_name = mysqli_real_escape_string($link, strip_tags($_POST['team_name']));
    
    
    $rows = getPlayers();
    if ($rows)
    {
        foreach ($rows as $row)
        {
            if (($row['name'] == $nam) AND ($row['surname'] == $surn)){
                die ('This player is created!');
            }     
        }
    }
    
    $rowss = getTeams();
    if ($rowss)
    {
        foreach ($rowss as $row)
        {
            if($row['teams_name'] == $team_name){
                $team_id = $row['ID'];
            }
        }
 
    }
    
    $sql="INSERT INTO players (name,surname,birth_years,shirt_number,team_ID,team_name) VALUES ('".$nam."', '".$surn."', ".$birth.", ".$number.", '".$team_id."', '".$team_name."')";
    if (!$link->query($sql)) 
    {
         die('error: ' . mysqli_error($link));
    }else{
        header("Location:index.php"); 
    }
    $link->close();