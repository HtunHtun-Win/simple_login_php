<?php
    include "connect.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST[ "address"];
    $password = $_POST[ "password"];
    $cpassword = $_POST["cpassword"];

    if($password == $cpassword){
        // session_start();
        $encPass = md5($password);
        $sql = "insert into users(name, email, address, password) values('$name', '$email', '$address', '$encPass')";
        $db->query($sql);
        header('location: ../login.php');
    }else{
        header("location: ../register.php?msg=error");
    }
?>