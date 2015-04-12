<?php
    require_once('functions.php');
    $database = encryptIt('formos1');
    $username = encryptIt('logis');
    $password = encryptIt('YmYaeStUYQ7PLN3A');
    $host = encryptIt('localhost');

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