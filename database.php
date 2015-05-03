<?php
    $database = 'formos1';
    $username = 'logis';
    $password = 'YmYaeStUYQ7PLN3A';
    $host = 'localhost';

    $link = new mysqli($host, $username, $password, $database);
    if ($link->connect_error)
    {
        die('Could not connect: ' . $link->connect_error());
    }

    $db_selected = mysqli_select_db($link, $database);
    if (!$db_selected)
    {
        die('Can\'t use ' . $database . ' : ' . $link->error($link));
    }