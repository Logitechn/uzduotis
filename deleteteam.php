<?php
    require_once('database.php');
    if ( isset($_GET['del']))
    {
        $ID = mysqli_real_escape_string($link, $_GET['del']);
        $sql = "DELETE FROM teams where ID=".$ID;
        $result= $link->query($sql) or die("Failed".mysqli_error($link));
        header("Location:teamslist.php");
        die();
    }