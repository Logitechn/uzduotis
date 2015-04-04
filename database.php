<?php
    define ('DB_NAME', 'www_akademija_task1_aurimas');
    define ('DB_USER', 'root');
    define ('DB_PASSWORD', '');
    define ('DB_HOST', 'localhost'); 

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$link)
    {
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysqli_select_db($link, DB_NAME);
    if (!$db_selected)
    {
        die('Can\'t use ' . DB_NAME . ' : ' . mysqli_error());
    }
    
    function getPlayers()
    {
        global $link;
        $sql= "SELECT * FROM players"; 
        $query= $link->query($sql);
        if ($query != false)
        {
            $result = array(); 
            while ( $row = mysqli_fetch_assoc($query) )
                $result[] = $row;
            return $result;
        }
        return null;
    }
?>

