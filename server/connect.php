<?php

    $connect = mysqli_connect('localhost', 'root', '', 'laba_test');

    if (!$connect) {
        die('Error connect to DataBase');
    }
