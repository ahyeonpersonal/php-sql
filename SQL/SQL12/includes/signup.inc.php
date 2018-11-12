<?php

        if(isset($_POST['submit'])){
                include_once 'dbh.inc.php';

                $first=mysqli_real_escape_string($conn, $_POST['first']);
                $last=mysqli_real_escape_string($conn,$_POST['last']);
                $email=mysqli_real_escape_string($conn,$_POST['email']);
                $uid=mysqli_real_escape_string($conn,$_POST['uid']);
                $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

                 //always put the error first, and then think about the success step
                //otherwise, php would proceed next step regardless of error
                if( empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ){
                        header("Location: ../index.php?signup=empty");
                }else{
                        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        header("Location: ../index.php?signup=invalidemail");
                        }else{
                        echo "Your've been signed up :->";
                        }
                }
                
                
        
                $sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd)
                        VALUES ('$first','$last','$email','$uid','$pwd');";
                mysqli_query($conn, $sql);

                header("Location: ../index.php?signup=success");
        }else{
                header("Location:../index.php?signup=error");
        }        
?>
