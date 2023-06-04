<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body >
    <div class="login-container">
        <form method="post" >
            <input type="text" placeholder="email" name="email"><br>
            <input type="text" placeholder="password" name="password"><br>
            <a href="register.php">Zarejestruj sie</a><br>
            <button type="submit" class="login-button">Zaloguj</button>
        </form>
    </div>
<?php
    require_once "../scripts/connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT email,password from user_table WHERE `user_table`.`email`= \"$_POST[email]\" && `user_table`.`password`=\"$_POST[password]\"";
        $conn->query($sql);

        if ($conn->affected_rows != 0){
            echo "jest";
            session_start();
            $_SESSION["username"]=$_POST["email"];
            header("location: ./views/main.php");
            exit();
        }
        else{
            echo "nie ma takiego konta";
        }
    }

?>
</body>
</html>