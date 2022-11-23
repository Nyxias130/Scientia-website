<?php
    /*** mysql hostname ***/
    $hostname = 'mysql-scientia.alwaysdata.net';
    /*** mysql hostname ***/
    $dbname = 'scientia_db';
    /*** mysql username ***/
    $username = 'scientia';
    /*** mysql password ***/
    $password = 'ScientiaMDP!';

    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $GLOBALS['pdo'] = $pdo;
    session_start();
