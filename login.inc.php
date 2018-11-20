<?php

session_start();



if(isset($_POST['submit'])){
    include 'database.php';

    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['password']);

        //error handlers
        //check if imputs are empty
        if(empty($email) || empty($password)){
            header("Location: login.php?login=empty");
            exit();
        }else{
            //check if user exists in db
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($database, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck < 1){
                header("Location: login.php?login=error_email");
                exit();
            }else{
                if($row = mysqli_fetch_assoc($result)){
                    //de-hashing the password
                    //$hashedPwdCheck = password_verify($password, $row['password']);
                    if($password == false){
                        header("Location: login.php?login=error_password");
                        exit();
                    }elseif($password == true){
                        //log in the user

                        $_SESSION['u_email'] = $row['email'];
                        $_SESSION['u_firstname'] = $row['fname'];
                        $_SESSION['u_lastname'] = $row['lname'];


                        header("Location: index.php?login=SUCCESS");
                        exit();
                    }}
                }
            }
        }
else{
   header("Location: index.php?login=error");
    exit();
}
