<?php
    $username = 'root';
    $servername = 'localhost';
    $password = '';
    $dbname = 'crud';    

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        http_response_code(505);
        die('<h1>Falha ao conectar com banco de dados</h1>' . $conn->connect_error);
    }


?>