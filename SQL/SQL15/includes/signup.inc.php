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
                header("Location: ../index.php?error=emptyfields&uid=".$username);
                //some of cases with filled up existing informations
        }
}
