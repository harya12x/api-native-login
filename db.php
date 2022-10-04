<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, x-requested-with ');
header("Content-Type: application/json; charset=utf-8");
try {
    $conn = new mysqli('localhost', 'root', '');
    $conn->select_db('db_pegawai_b');
    $encodedData = file_get_contents('php://input');
    $decodedData = json_decode($encodedData, true);
} catch (PDOException $e) {
    echo 'Error' . $e->getMessage() . '<br>/';
    die();
}
