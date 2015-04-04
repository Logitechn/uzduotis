<?php 
	require_once('database.php');
	if ( isset($_GET['del']))
    {
		$ID = $_GET['del'];
		$sql = "DELETE FROM players where ID=".$ID;
		$res= $link->query($sql) or die("Failed".mysql_error());
		header("Location:index.php");
		die();
	}