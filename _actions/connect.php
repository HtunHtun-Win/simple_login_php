<?php
    try{
        $db = mysqli_connect("localhost", "root", "", "login_reg_sys");
    }catch(Exception $e){
        echo "".$e->getMessage()."";
    }
?>