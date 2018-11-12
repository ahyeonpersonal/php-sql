<?php

    //check if signup form is submitted or not
    if (isset($_POST['submit'])){ //'submit' : name of the button
        
        //database connection
        include_once 'dbh.inc.php';
        
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        //error msg : when user miss one of the form
        //always put the error first, and then think about the success step
        //otherwise, php would proceed next step regardless of error
        if( empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ){
            header("Location: ../index.php?signup=empty");
            exit();
        }else{
            //check if input characters are valid
            if(!preg_match("/^[a-zA-Z]*$/, $first")||!preg_match("/^[a-zA-Z]*$last")){
                header("Location : ../index.php?signup=char");
                exit();
            }else{
                //check if email is valid
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../index.php?signup=email&first=$first&last=$last&uid=$uid");
                //might be only email is wrong =? means that first, last, uid might be correct
                // &first=$first&last=$last&uid=$uid
                exit();
                }else{
                header("Location: ../index.php?signup=success");
                exit();
                }
            
            }
        }
    }else{
        //echo "You did not fill out a form!";
        
        //back to index.php page
        header("Location: ../index.php?signup=error");//add something extra behind the URL
    }
