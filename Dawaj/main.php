<!DOCTYPE HMTL>
<?php
    session_start();
    if(empty($_SESSION["username"])){
        echo "blad";
        exit();
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title> elo</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="container">
                <div class="content">
                    <form action="./scripts/logout.php" method="post">
                        <button type="submit">Wyloguj</button>
                    </form>
                    <table >
                        <tr>
                            <th>id</th>
                            <th>nazwa</th>
                            <th>magazyn</th>
                            <th>ilosc</th>
                        </tr>
                    <?php
                    require_once "./scripts/connect.php";
                    $sql = "SELECT `u`.`id`, `u`.`name`, `u`.`warehouse`,`u`.`quantity` FROM `staff` u ";
                    $result = $conn->query($sql);
                    while($user = $result->fetch_assoc()){
                        echo <<< TABLEUSERS
      <tr>
        <td>$user[id]</td>
        <td>$user[name]</td>
        <td>$user[warehouse]</td>
        <td>$user[quantity]</td>
      </tr>
TABLEUSERS;
                    }
                    echo "</table>";
                    $conn->close();
                    ?>
                </div>
                <div class="add-item">
                    <a href="add_item.php"><button>Dodaj przedmiot</button></a>
                </div>
        </div>
    </body>
</html>
