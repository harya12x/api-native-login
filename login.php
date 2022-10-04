<?php

include 'db.php';
$email = $decodedData['email'];
$password = md5($decodedData['password']);
$message = '';
$error = false;
$array;
try {
    $SelectQuery = "SELECT * FROM user Where email = '$email' AND password = '$password' ";
    $Check = $conn->query($SelectQuery);
    if ($Check->num_rows > 0) {
        $array = $Check->fetch_assoc();
        if ($array['password'] != $password) {
            $message = "You insert a wrong password";
            $error = true;
            $array = null;
        }
    } else {
        $message = "No account yet";
        $error = true;
        $array = null;
    }
    $conn->close();
} catch (Exception $e) {
    $message = $e->getMessage();
    die();
}

$result = ['message' => $message, 'result' =>  $array, 'error' => $error];
echo  json_encode($result);
