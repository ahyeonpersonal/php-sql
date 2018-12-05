<?php

    if(isset($_POST['submit'])){
        //check if user actually submit the button

        //get the user wrote through the input
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $mailFrom = $_POST['mail'];
        $message = $_POST['message'];

        //prepare function called mail
        //mail(email that we want to send mail to(us) ,subject, actual message of the mail )
        
        $mailTo = "diny1209@naver.com";
        $headers = "From: ".$mailFrom;
        $txt = "You have received an e-mail from ".$name.".\n\n".$message;   
        
        mail($mailTo, $subject, $txt, $headers);
        header("Location: index.php?mailsent");
        
    }
