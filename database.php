<?php
    $database = 'formos1';
    $username = 'logis';
    $password = 'YmYaeStUYQ7PLN3A';
    $host = 'localhost';

    $link = new mysqli($host, $username, $password, $database);
    if (mysqli_connect_errno())
    {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $db_selected = mysqli_select_db($link, $database);
    if (!$db_selected)
    {
        die('Can\'t use ' . $database . ' : ' . mysqli_error());
    }