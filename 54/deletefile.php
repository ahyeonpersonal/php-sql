<?php
//path that we need to delete
//function that actually go in to path and delete file

$path ="uploads/cat.jpg";//we are going to delete cat.jpg file

//what if we get the error msg, when we can't find the image
if(!unlink($path)){
    echo 'You have an error!';
}else{
    //success msg that we actually delete the file
    echo 'You have deleted your file!';
    header("Location:.index.php?deletesuccess");
}


