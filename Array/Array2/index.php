<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
    <?php
      $sql = "SELECT * FROM data";
      $result = mysqli_query($conn, $sql);
      $datas = array();
      
      if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
          $datas[]=$row;;
        }
      }
      
      //print(1)
      //print_r($datas);
      //result : Array([0]=>Array([id]=>1 [text]=> Hi))
      //multi-dimensional array : we have Array inside the other array($data array)
      
      //print(2) : foreach
      // foreach : looping result from array
      foreach($datas[0] as $newdata){
        echo $newdata; //result : 1Hi
      }
      
      //print(3) 
      foreach($datas as $data){
        echo $data['text']," ";
      }
      
      
      //print(4) : echo inside while : not recommended for security reason
      //Seperating the documents from database connection part
      /*
      while ($row = mysqli_fetch_assoc($result)){
        echo $row['text'];
      }
      */
      
    ?>
  </body>
</html>  
