<?php
//if user actually click the button
if(isset($_POST['submit'])){
    $file = $_FILES['file']; //'file' : name
        //$_FILES : get all the information from the file that we want to upload using an input from a form
    $fileName = $_FILES['file']['name'] // => $fileName = $file['name']
        //print_r($file); => we can get array of name, type, error and we need specifically name => #_FILES['file']['name']
        //print_r($file) result
        /*
            Array(
                [name]=>hello.jpg
                [type]=> image/jpeg
                [tmp_name]=>C://xamppnew/tmp/php.tmp
                [error]=>0
                [size]=>64851
            )
        */
    $fileTmpName = $_FILES['file']['tmp_name']; 
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    
    //how to allow only specific file type ex) JPEG
    //(EXt : extension)
    $fileEXT = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    /*
        explode (".", $fileName) : devide $fileName by '.'
        strtolower : make capital letter to lowercase
        end($fileExt) : last element of $fileExt
        
        => devide $fileName by . => lowercase the behind part of "." 
    */
    
    
    $allowed = array('jpg','jpeg','png','pdf');
    
    
    /*
    this if statement is going to go ahead and check if any of 'jpg','jpeg', 'png','pdf' is inside the $fineActualExt,
    so if let's say 'jpg' is inside $fileActualExt, then it is allowed 
    */
    if(in_array($fileActualExt, $allowed)){
        //in_arrya(A,B) =>  A,B is the thing that actually we have to check 
        
        //if there is anything error inside the file information
        if($fileError === 0){
            if($fileSize < 1000000){
                //if fileSize is less than 1MB
                
                $fileNameNew = uniqid('',true).".".$fileActualExt;; //for same fileName we attach uniq id in front of each file that we uploaded
                $fileDestination = 'uploads/'.$fileNameNew; //location where we going to upload files
                
                
                //move file from the temporary location ($fileTmpName) to actual location ($fileDestination) 
                move_uploaded_file($fileTmpName, $fileDestination);
                //move_uploaded_File(temporary location, actual location);
                header("Location : index.php?uploadsuccess");
            }else{
                //if fileSize is more than 1MB
                echo "Your file is too big!"
            }
        }else{
            //if there is error msg here, display error
            echo "There was an error uploading file!";
        }
            
    }else{
        //if file type is not one of 'jpg','jpeg','png', 'pdf' errormsg
        echo 'You cannot upload files of this type!';
    }
}

