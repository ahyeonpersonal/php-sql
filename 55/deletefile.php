<?php


$fileNames = $_POST['filename']; //filename = input name

//replace $filename with all the space with no spaces
$removeSpaces = str_replace(" ","",$fileNames);
// str_replace("thing we need to change", "to replace what", "check what string");
// replace " "(blank), to ""(no blank), in $fileNames string

$allFileNames = explode(".", $removeSpaces);

//print_r($allFileNames);
/*
result 
Array([0]=>cat.jpb [1]=>laptop.jpg)
*/


//what if the file name doesn'e exsit in our folder?
$countAllNames = count($allFileNames); //count the data inside array
for( $i=0; $i<$countAllNames; $i++){
    
    //checking all file from 0 to $countAllNames exist in Array
    if(file_exists("uploads/".$alFileNames[$i])== false){
        //if file doesn't exist so back to index.php
        header("Location:index.php?deleteerror");
        //when file doesn't exist, stop it
        exit();
    }
}

//loop out unlink() files
for($i=0; $i< $countAllNames; $i++){
    
    $path ="uploads/".$allFileNames[$i];

    if(!unlink($path)){
        echo 'You have an error!';
        exit();
    }

}

header("Location: index.php?deletesuccess");

