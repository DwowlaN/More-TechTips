<?php
    $DBserver = "localhost";
    $DBusername ="root";
    $DBpw = "root";
    $DBname ="moretechtips";

    $conn = mysqli_connect($DBserver, $DBusername, $DBpw, $DBname);

    if (!$conn) {
        die("Failed to connect" . mysqli_connect_error());
    }