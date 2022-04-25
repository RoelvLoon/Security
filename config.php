<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    
    try {
      $pdo = new PDO("mysql:host=$servername;dbname=86604_security", $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>
