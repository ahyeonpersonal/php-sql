<!--when user logged in, we need to run session-->
<?php
    session_start();
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      
      <?php
      
      //check if user is already has account
      $sql = "SELECT * FROM users"; //go to database and check users 
      $result = mysqli_query($conn, $sql);
      
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)){
              //if user is already signed up, has account check if they upload profile
              $id = $row['id']; //id of the user that we just select from mysqli_num_rows($result)
              $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
              $resultImg = mysqli_query($conn, $sqlImg);
              
              //if user upload profile img
              while($rowImg = mysqli_fetch_assoc($resultImg)){
                  echo "<div>";
                    if($rowImg['status'] == 0){
                        echo "<img src='uploads/profile".$id."jpg'/>";
                        //when user upload img, we need to change it as an uniqe id
                        
                    } else{
                        //haven't uploaded img yet, so default img
                        echo "<img src='uploads/profiledefault.jpg'/>";
                    }
                    echo $row['username'];
                  echo "</div>";
              }
          }
      }else{
          echo "There are no users yet!";
      }
      
      
        if(isset($_SESSION['id'])){
            if($_SESSION['id']==1){
                echo 'You are loggedin as an user #1 : Admin';
            }
            
            echo "<form action='upload.php' method='POST' enctype='multipart/form-data'>
                    <input type='file' name='file'>
                    <button type='submit' name='submit'>UPLOAD</button>
                  </form>";
        }else{
            echo "You are not logged in!";
            //signup form for new user
            echo "<form action='login.php' method='post'>
                    <input type='text' name='first' placeholder='First name' />
                    <input type='text' name='last' placeholder='Last name' />
                    <input type='text' name='uid' placeholder='Username' />
                    <input type='password' name='pwd' placeholder='Password' />
                    <button type='submit name='submitSignup'>Signup</button>
                 </form>";
        }
        
      ?>
      
     
  
      <p>Login as user!</p>
      <form action="login.php" method="post">
            <button type="submit" name="submitLogin">Login</button>
      </form>
      
      <p>Logout as user!</p>
      <form action="logout.php" method="post">
        <button type="submit" name="submitLogout">Logout</button>
      </form>
    
    </body>
</html>
