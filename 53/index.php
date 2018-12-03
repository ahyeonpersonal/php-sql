<?php
  session_start();
  include_once 'inludes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      
      $sql = "SELECT * FROM user";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          
          $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
          $resultImg = mysqli_query($conn, $sqlImg);
          while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            
            echo "<div>";
              
              if ($rowImg['status'] == 0) {
                
                
                
                // echo "<img src='uploads/profile".$id.".jpg?'".mt_rand()."'>";
                /*
                for now, it seems like only 'jpg' file type is available.
                so if I upload 'png' ,'jpeg','pdf' iamge can't be displayed
                we need to update this part
                */


                /* updated part for 3others file type jpeg, png, pdf */
                /* if you don't understand this part, check deleteprofile.php */
                $filename = "uploads/profile".$sessionid."*";
                $fileinfo = glob($filename);
                $fileExt = explode(".", $fileinfo);
                $fileActualExt = $fileExt[1];

                

                echo "<img src='uploads/profile".$id.".".$fileActualExt."?".mt_rand()."'>";
                
              }
              
              else {
                echo "<img src='uploads/profiledefault.jpg'>";
              }
              
              echo "<p>".$row['username']."</p>";
            echo "</div>";
          }
        }
      }
      else {
        echo "There are no users!";
      }

      
      if (isset($_SESSION['id'])) {
        echo "You are logged in!";
        
        echo '<form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file">
          <button type="submit" name="submit">UPLOAD FILE</button>
        </form>';

        //delete profile image
        echo '<form action="deleteprofile.php" method="post">
             <button type="submit" name="submit">Delete Profile Image</button>
             </form>';
      }
      else {
        echo "You are not logged in!";
        echo '<form action="signup.inc.php" method="post">
            <input type="text" name="first" placeholder="First name">
            <input type="text" name="last" placeholder="Last name">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Signup</button>
            </form>';
      }
    ?>

    
    <form action="signup.inc.php" method="post">
      <input type="text" name="first" placeholder="First name">
      <input type="text" name="last" placeholder="Last name">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">
      <button type="submit" name="submit">Signup</button>
    </form>

    
    <p>Login as user!</p>
    <form action="login.inc.php" method="post">
      <button type="submit" name="submit">Login</button>
    </form>

    <!--Here we allow users to log out-->
    <p>Logout as user!</p>
    <form action="logout.inc.php" method="post">
      <button type="submit" name="submit">Logout</button>
    </form>
  </body>
</html>
