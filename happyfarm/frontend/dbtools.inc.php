<?php

  function create_connection()
  {
    $conn = new mysqli("localhost", "root", "******", "happyfarm");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set UTF-8
     mysqli_set_charset($conn,"utf8");
    return $conn;
  }
?>
