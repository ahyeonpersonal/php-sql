<?php

if(isset($_POST['login-submit'])){

    //connect to db
    require 'dbh.inc.php';
    //grab info from login form that user sumbmit
    //give option either username or email
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($sql, $conn);

        if(!mysqli_stmt_prepare($stmt)){
           header("Location:../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_parm($stmt, "ss", $mailduid, $mailduid);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt); //just a raw data get from db
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck =password_verify($password, $row['pwdUsers']);
                //first $password = is what user type
                // $row['pwdUsers'] = is actual password assign user id that saved in database


                //check if user input pw == $row['pwdUsers'] ??
                if($pawdCheck == false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }else if($pwdCheck == true){
                    /* 
                    Sessionbrowser is used for username, favorite color etc
                    Session is last until the user close the browser
                    
                    */
                    
                    session_start(); // to check if session is actually started or not ... go to header.php
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Loation:../index.php?login=success");
                    exit();
                }else{
                    header("Location:../index.php?error=wrongpwd");
                }

            }else{
                header("Location : ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}
