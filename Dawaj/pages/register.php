<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="hold-transition register-page">
    <div class="register-container">
        <form method="post">
            <input type="text" placeholder="login" name="login" ><br>
            <input type="text" placeholder="haslo" name="password"><br>
            <button type="submit">Zarejestruj</button>
        </form>
    </div>
    <div><a href="index.php">Mam już konto</a></div>
<?php
    require_once "./scripts/connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        $pass = $_POST["password"];

        $sql = "SELECT * from user_table WHERE `user_table`.`email`= \"$_POST[login]\"";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        if (!empty($user)) {
            echo "jest";
        }
        else{
            $sql = "INSERT INTO `user_table` (`email`,`password`) values ($login,$pass)";
            $conn->query($sql);
            if($result){
                echo "git";

            }
            else echo "nie git";
        }
    }
?>


</body>
</html>