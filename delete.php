<?php
    require_once('database.php');
    if ( isset($_GET['del']))
    {
        $ID = mysqli_real_escape_string($link, $_GET['del']);
        $sql = "DELETE FROM players where ID=".$ID;
        $result= $link->query($sql) or die("Failed".mysqli_error());
        header("Location:index.php");
        die();
    }