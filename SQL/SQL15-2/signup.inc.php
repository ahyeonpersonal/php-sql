<?php
//if users actually submit signup button or not
//we don't want any random uers access http://localhost/includes/signup.inc.php witout submitting signup

if(isset($_POST['signup-submit'])){
        //if customer click the signup button, connect to database
        require 'dbh.inc.php';

        //grab the database from the user
        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password= $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        //Error handlers

        //Error handlers1) if user input every value(username, email, pwd, pwd-repeat)
        if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
                header("Location: ../signup.php?error=emptyfields&uid=".$username."&email =".$email);
                //incase if users have correct informaton : keep the correct fields
                exit();
                //if user make any mistake signing up, we don't want them to proceed next step,
                //so my exit(), we can let them stop.
        }
        
        //we don't want to send neither username nor email when both of them are wrong
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
                header("Location : ../signup.php?error=invalidmailuid");
                exit();
        }
        // if users put valid email 
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){// check if it is valid email or not
                header("Location:../signup.php?error=invalidmail&uid=".$username);
                exit();
        }
        // if user put valid username
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header("Location: ../signup.php?error=invaliduid&mail=".$email);
                exit();
        }
        
        //password check
        else if ($password !== $passwordRepeat){
                header("Location : ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
                exit();
        }

        //if user name is already exist in the database
        else{
                //connect db and check if there is any same username
                $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
                $stmt = mysqli_stmt_init($conn);
                /*
                we are not going to put '$username' directly in SQL
                ex) $sql = "SELECT uidUsers FROM users WHERE uidUsers= $username";

                because we want to do this in a safe and secure way using something called
                'prepared statements'
                : prepared stgatements is a way for us to run SQL statements inside the database,
                without any person coming to a website and destroying our database by writing code
                inside the input fields
                */
                if(!mysqli_stmt_prepare($stmt, $sql)){
                        //if connect to database or sql connection has an error
                        header("Location : ../signup.php?error=eqlerror");
                        exit();
                }else{
                        // if db connection is successful...
                        mysqli_stmt_bind_param($stmt,"s", $username);
                        //S=string, I = Integer, B= blob, D=double
                        //mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                        
                        mysqli_stmt_execute($stmt);// run this information from the user inside the database
                        //if there is a match : means, there's already same username in database

                        mysqli_stmt_store_result($stmt);
                        //check how many result in $stmt
                        $resultCheck = mysqli_stmt_num_rows($stmt); //it should be 0 or 1
                        if($resultCheck >0){
                                //means there is existing username
                                header("Location : ../signup.php?=usernametaken&mail=".$email);
                                exit();
                        }else{
                                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                        header("Location: ../singup.php?error=sqlerror");
                                        exit();
                                }else{
                                       //password should not be same as user actually type
                                       //password should be 'hassing'-'rehassing'
                                       $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                       
                                       //mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
                                       mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);

                                       mysqli_stmt_execute($stmt);
                                       
                                       header("Location: ../signup.php?signup=success");
                                       exit();
                                }

                        }

                }
                
        }

        //after sending signup information, disconnect to database
        mysqli_stmt_close($stmt); //closing of the statement
        mysqli_close($conn); // closing of the connection to db file

}

else{
//if users access this page without pressing 'submit' button, send them back to signup pgage
        header("Location :../signup.php");
        exit();
}


