<?php
    
    include_once 'dbh.php';
    
    //when we sign up, inser these 4 data to database
    $first = $_POST['first'];
    $last = $_POST['last'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO user (first, lst, username, password) 
    VALUES ('$first', '$last', '$uid', '$pwd')";
    mysqli_query($conn, $sql);

    $sql = "SELECT * FROM user WHERE username='$uid' AND first='$first'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while( $row = mysqli_fetch_assoc($result)){
            $userid = $row['id'];
            $sql = "INSERT INTO profileimg (userid, status)
                    VALUES ('$userid', 1)";
            
            /*
            regarding "1"
            in index.php
            if($rowImg['status'] ==0){
                echo "<img src ='uploads/profile".$id.".jpg'>";
            }else{
                echo "<img src='uploads/profiledefault.jpg'>";
            }
            
            => $rowImg == 0 : user already upload custom profile img
            => $rowImg == 1 : user haven't upload custom profile img
            */
            mysqli_query($conn, $sql)
;            /*
            
            */
        }
        
    }else{
        echo "You have an error!";
    }
