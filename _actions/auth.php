<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header('location: ../login.php');
    }

    function chkLevel($role){
        if (!($role == 'admin')) {
            header('location: ../user-dashboard.php');
        }
    }
?>