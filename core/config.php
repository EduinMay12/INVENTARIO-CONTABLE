<?php
    
    //Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventario_contable";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    } 

?>