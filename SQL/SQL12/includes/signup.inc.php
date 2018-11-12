<?php

    //check if signup form is submitted or not
    if (isset($_POST['submit'])){ //'submit' : name of the button
        
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
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header("Location: ../index.php?signup=invalidemail");
            }else{
                echo "Sign up the user!";
            }
        }
    
     }else{
        //echo "You did not fill out a form!";
        
        //back to index.php page
        header("Location: ../index.php?signup=error");//add something extra behind the URL
    }
