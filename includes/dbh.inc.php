<?php

    $conn = mysqli_connect("localhost", "root", "", "loginsys");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }