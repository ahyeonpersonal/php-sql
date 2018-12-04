<?php

//incase we don't know what type of file is, we put * (all)
//cat + something

$path = "uploads/cat*";
//so list every file has cat + soemthing
$fileinfo = glob($path);
$fileActualName = $fileinfo[0]; //$fileinfo[0] is what we are looking for

//print_r ($fileinfo);
// resutl : Array ([0]=>uploads/cat.jpg [1]=>uploads/cat2.jpg)
// $path = "uploads/*cat*";
//print result : Array ([0]=>uploads/black cat.jpg [1]=>uploads/cat.jpg [2]=>uploads/cat2.jpg)


if(!unlink($path)){
    echo 'you have an error!';
}else{
    header("Location: index.php?deletesuccess");
}

