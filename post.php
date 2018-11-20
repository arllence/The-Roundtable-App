<?php
    //session_start();
    include 'database.php';
    if(isset($_POST['submit'])){
        $user_firstname=$_POST['fname'];
        $user_lastname=$_POST['lname'];
        $user_email=$_POST['email'];
        $user_password=$_POST['pass'];

        $sql="INSERT INTO users (fname,lname,email,password) VALUES('$user_firstname','$user_lastname','$user_email','$user_password')";

        mysqli_query($database,$sql) or die(mysqli_error($database));

        header('Location: index.php');
    }
?>
