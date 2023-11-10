<?php

session_start();

require_once "db.php";

$log = $_POST['userEmail'];
$pass = $_POST['userPass'];

$sqlp = "SELECT id, avatar FROM users where email = '$log' and password = '$pass'";

if($result = $pdo->query($sqlp))
{ 
    if($result->rowCount()>0)
    {
        foreach($result as $row){
            $_SESSION['id'] = $row["id"];
            $_SESSION['avatar'] = $row["avatar"];
            header("Location: index.php");
        }
    }
    else
    {

        $_SESSION['id'] = 0;
        session_destroy();
        header("Location: index.php");

    }

}

?>