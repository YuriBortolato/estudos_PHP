<?php

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'aula';

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    die('Error na conexão: '. $conn->connect_error);
}else

$conn->set_charset('utf8');
