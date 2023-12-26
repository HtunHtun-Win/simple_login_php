<?php
    session_start();
    include "connect.php";
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "select * from users where email='$email' and password='$password'";
    try{
        $result = $db->query($sql);
        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if ($user['role'] === 'admin') {
                $_SESSION['user'] = $user;
                header("location: ../admin-dashboard.php");
            } else {
                $_SESSION['user'] = $user;
                header("location: ../user-dashboard.php");
            };
        } else {
            $_SESSION['errMsg'] = "Invalid";
            header("location: ../login.php");
        }
    }catch(Exception $e){
        header("location: ../login.php");
    }
?>