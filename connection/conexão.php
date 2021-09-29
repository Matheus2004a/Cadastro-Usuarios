<?php
    $servername = "localhost";
    $username = "root";
    $password = "Mapef@09112004a";
    $dbname = "bd_curso_tecnico";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Conexão falhada: " . mysqli_connect_error());
    }
?>