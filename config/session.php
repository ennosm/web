<?php

function checkSession($levelpengguna) {
    if (!isset($_SESSION['idpengguna']) || $_SESSION['levelpengguna'] !== $levelpengguna) {
        header("Location:../index.php");
        exit();
    }
}

// if (!isset($_SESSION['idpengguna'])) {
//     header('location: login.php');
//     exit();
// }
?>