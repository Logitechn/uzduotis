<?php
    require_once('database.php');
    if ( isset($_GET['del']))
    {
        $ID = $_GET['del'];
        $sql = "DELETE FROM players where ID=".$ID;
        $result= $link->query($sql) or die("Failed".mysqli_error());
        header("Location:index.php");
        die();
    }