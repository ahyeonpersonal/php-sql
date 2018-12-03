<?php

//to delete profile image, we need to be logged in
session_start();
include_once 'dbh.inc.php';

//get session id from the user currently logged in
//so we know, which profile we can delete
$sessionid = $_SESSION['id'];

//delete profile image
//we need to pin-point correct image
// becuz we allowed 4types of image



//profile image is saved as profile + user id ex) profile1, profile2, profile3...
//* means something like 1,2,3,,,,100,,,
$filename = "uploads/profile".$sessionid."*";

//this is going to search every list of $filename mathes to "uploads/profile".$sessionid."*"
//in this case, there should be 1 result of $fileinfo
$fileinfo = glob($filename); //seach specific file


//print_r($fileinfo);
/* 
when I print array, i can get several element for now
Array([0]=>uploads/profile1.jpg [2]=>uploads/profile11.jpg [3]=>uploads/profile111.jpg )

coz for now we are looking for * everything!!!!
but always the first one is the one that we are looking for.
For example, if I want to find 11, array would be like
[1]=>uploads/profile11.jpg,   profile 111.jpg, profile 1111.jpg

... So, always the firstone is what I am looking for

*/

//$fileExt = explode(".", $fileinfo);
// for now, we will get all the profileimage list, without file type
// so we need to specify $fileinfo as $fileinfo[0]
$fileExt = explode(".". $fileinfo[0]);

print_r($fileExt);
//result : Array ([0]=>uploads/profile1 [1]=>jpg);
$fileActualExt = $fileExt[1]; //with this, we can get file type ex) jpg, jpeg, png, pdf

$file = "uploads/profile".$sessionid.".".$fileActualExt; //we get the matching profile image name assign to this user

//now we can delete this specific file


//unlink functio is for deleting a file. 
if(!unlink($file)){
    echo "File was not deleted!";
}else{
    //it needs to delete file and head back to front page
    echo 'File was deleted!';
}

//currently, since user has uploaded his/her profile image before, profileimg status is set as 0
// since profile image is deleted, we need to set profileimg status back (1)
$sql = "UPDATE profileimg set status == 1 WHERE userid='$sessionid';";

//updating database
mysqli_query($conn, $sql);
header("Location: index.php?deletesuccess"); //taking back to index.php






