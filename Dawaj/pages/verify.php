<?php
require_once "scripts/connect.php";
$sql = "SELECT `email`,`password` from user_table";
$result = $conn->query($sql);
$email = $_POST["email"] ?? null;
$pass = $_POST["password"] ?? null;
while($user = $result->fetch_assoc()){
    echo "email: $email pass: $pass";
    echo "email: $user[email] pass: $user[password]";
    if ($email == $user["email"] && $pass == $user["password"]) {
        echo "YES";
        header("location: ./main.php");
        exit;
    }
}
header("location: ../Dawaj");