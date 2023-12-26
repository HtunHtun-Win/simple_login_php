<?php
    session_start();
    include "connect.php";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST[ 'email'];
    $address = $_POST[ 'address'];
    $new_pass = $_POST['password'];
    $role = $_POST['role'] ?? "user";
    $update_sql = "update users set name='$name', email='$email', address='$address', role='$role' where id=$id";
    
    // echo $update_sql;
    // updata data
    try{
        if (!$new_pass) {
            $db->query($update_sql);
        } else {
            $new_pass = md5($new_pass);
            $updatePass_sql = "update users set password='$new_pass' where id=$id";
            $db->query($update_sql);
            $db->query($updatePass_sql);
        }
        // update sesson data
        if ($_SESSION['user']['id'] == $id) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['address'] = $address;
        }
        header('location: ../admin-dashboard.php?msg=success');
    }catch(Exception $e){
        header('location: ../admin-dashboard.php?msg=error');
        // echo $e;
    }
?>