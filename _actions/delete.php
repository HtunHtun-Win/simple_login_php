<?php
    session_start();
    include "connect.php";

    if (!isset($_SESSION['user'])) {
        header('location: ../login.php');
    }elseif($_SESSION['user']['role'] == 'admin'){
        $id = $_GET['id'];
        $delSQL = "delete from users where id=$id";
        $db->query($delSQL);
        header("location: ../admin-dashboard.php");
    }else{
        header('location: ../user-dashboard.php'); 
    }

    
?>