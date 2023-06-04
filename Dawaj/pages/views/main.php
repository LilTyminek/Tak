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
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="menu">
                <?php
                    if(isset($_SESSION["SUCCESS"])){
                        echo $_SESSION["SUCCESS"];
                        unset( $_SESSION["SUCCESS"]);
                    }
                    if(isset($_SESSION["FAILURE"])){
                        echo $_SESSION["FAILURE"];
                        unset( $_SESSION["FAILURE"]);
                    }
                ?>
                        <div class="menudiv">
                            <a href="info.php"><p>Informacje o użytkowniku</p></a>
                        </div>
                        <div class="menudiv users">
                            <a href="./admin/users.php"><p>Użytkownicy</p></a>
                        </div>
                        <div class="menudiv">
                            <a href="../../scripts/logout.php">Wyloguj</a>
                        </div>
                        <div class="l"> </div>
                    </div>
            <div class="search">
                <form method="post">
                    <input type="text" name="search">
                    <input type="submit">
                </form>
                <?php

                ?>
            </div>
            <div class="inv">
                <form method="get">
                    <table >
                        <tr>
                            <th>id</th>
                            <th>nazwa</th>
                            <th>magazyn</th>
                            <th>ilosc</th>
                        </tr>
                        <?php
                        require_once "../../scripts/connect.php";
                        $sql = "SELECT `u`.`id`, `u`.`name`, `u`.`warehouse`,`u`.`quantity` FROM `staff` u WHERE";
                        $sql2= "`u`.`quantity`>0 order by `u`.`id` ASC";
                        //searchbar
                        if(!empty($_POST["search"]) && strlen($_POST["search"])>=3){
                            $find = "\"%".$_POST["search"]."%\"";
                            $wh = "(`u`.`id` like $find || `u`.`name` like $find || `u`.`warehouse` like $find) &&";
                            $sql.=$wh;
                        }
                        $sql.=$sql2;
                        $result = $conn->query($sql);
                        //pagination
                        if(!isset($_POST["page"])){
                            $page_number = 1;
                        }
                        else $page_number=$_POST["page"];
                        $limit = 10;
                        $initial_page = ($page_number-1) * $limit;
                        $total_rows = mysqli_num_rows($result);
                        $total_pages = ceil ($total_rows / $limit);

                        $sqllimit = " LIMIT ".$initial_page.",".$limit;
                        $sql.=$sqllimit;
                        $result = $conn->query($sql);
                        //fetch
                        while($user = $result->fetch_assoc()){
                            echo <<< TABLEUSERS
                                      <tr>
                                        <td class="info"><input type="checkbox" name="checkboxvar[]" value = "$user[id]">$user[id]</td>
                                        <td class="info">$user[name]</td>
                                        <td class="info" >$user[warehouse]</td>
                                        <td class="info">$user[quantity]</td>
                                      </tr>
TABLEUSERS;
                        }
                        echo "</table>";
                        //do dokończenia listy
                        for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                            $_POST["page"]=$page_number;
                            echo '<a href = "index.php?page=' . $page_number . '">' . $page_number . ' </a>';

                        }
                        echo "</br";
                        //$conn->close();
                        ?>

                        <input type="submit" value="Usuń zaznaczone przedmioty" name="delete">
                </form>

                    </div>
            <div class="add-item">
                <form method="post">
                    <input type="submit" value="Dodaj przedmiot" name="add">
                    <input type="submit" value="Zaaktualizuj" name="change">
                    <input type="submit" value="Przenieś">
                </form>
                <?php
                require_once "../../scripts/connect.php";
                if(isset($_POST["add"])){
//                    zapobieganie pustym rekordom
                    echo <<<ADDRECORD
                        <form method="post" action="../../scripts/addrecord.php">
                        <p>Dodaj przedmiot</p>
                            <input type="text" name="ean" placeholder="Podaj ean" autofocus required></br>
                            <input type="text" name="name" placeholder="Podaj nazwe przedmiotu"></br>
                            <input type="text" name="warehouse" placeholder="Podaj magazyn"></br>
                            <input type="number" name="qua" placeholder="Podaj ilosc"></br>
                            <input type="submit" name="addsub">
</form>
ADDRECORD;

                }
                else if(isset($_POST["change"])){
//                    puste rekordy mozliwe tam gdzie "?"
echo <<<CHANGERECORD
                    <form action="../../scripts/changerecord.php" method="post" >
                        <input placeholder="Podaj EAN" name="ean" type="text" autofocus required></br>
                        <input placeholder="Podaj nazwe?" name="name" type="text"></br>
                        <input placeholder="Podaj magazyn?" name="warehouse" type="text"></br>
                        <input type="number" name="qua" placeholder="Podaj ilosc"></br>
                        <input type="submit" name="changesub">
</form>
CHANGERECORD;

                }
                else if(isset($_GET["delete"])){
                    if(isset($_GET['checkboxvar'])){
                        $checkboxvar = $_GET['checkboxvar'];
                        foreach ($checkboxvar as $d){
                            $sql = "UPDATE staff set quantity=0 where id = $d";
                            require_once "./scripts/connect.php";
                            $conn->query($sql);
                            //echo $d."</br>";
                        }
                    }
                }

                $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>
