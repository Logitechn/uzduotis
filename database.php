<?php
    define ('DB_NAME', 'formos1');
    define ('DB_USER', 'root');
    define ('DB_PASSWORD', '38933241');
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