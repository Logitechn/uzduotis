<?php
    require_once('functions.php');
    $database = encryptIt('formos1');
    $username = encryptIt('root');
    $password = encryptIt('38933241');
    $host = encryptIt('localhost');
    /*define ('DB_NAME', 'formos1');
    define ('DB_USER', 'root');
    define ('DB_PASSWORD', '38933241');//vp2K2Nj5p4HxCfdw
    define ('DB_HOST', 'localhost'); */

    $link = new mysqli(decryptIt($host), decryptIt($username), decryptIt($password), decryptIt($database));
    if (mysqli_connect_errno())
    {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $db_selected = mysqli_select_db($link, decryptIt($database));
    if (!$db_selected)
    {
        die('Can\'t use ' . decryptIt($database) . ' : ' . mysqli_error());
    }