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
                        exit();
                }else{
                        if(!preg_match("/^[a-zA-Z ]*$/",$first) || !preg_match("/^[a-zA-Z ]*$/",$last)){
                                //Inlvaid first name & last name type : 이름이 옳지 않은 경우 
                                header("Location : ../index.php?signup=char ");
                                exit();
                        }else{
                                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        //Valid name but invalid email : 이름은 옳고 이메일은 옳지 않은 경우
                                        header("Location:../index.php?singup=email&first=$fisrt$last=$last&uid=$uid");
                                        exit();
                                }else{
                                        $sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd)
                                        VALUES ('$first','$last','$email','$uid','$pwd');";
                                        mysqli_query($conn, $sql);
                                        header("Location: ../index.php?signup=success");
                                        exit();
                                }
                        }
                }
        }else{
                header("Location:../index.php?signup=error");
        }        
?>
