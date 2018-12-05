<?php
	include 'header.php';
?>

<body>
	<h1>Article Page</h1>
	

	<div class="article-container">
		<?php
            $title =  mysqli_real_escape_string($conn, $_GET['title']);
            // why get in $_GET['title']: you can actually see the tile in URL, means title is GET method, not POST method
            $date =  mysqli_real_escape_string($conn, $_GET['date']);

			$sql = "SELECT * FROM article WHERE  a_title = '$title' AND a_date='$date'";
			$result = mysqli_query($conn, $sql);
			
			
		


			//how many result have we got from query over up there
			$queryResults = mysqli_num_rows($result); //for now it might be 2

			if($queryResults > 0){
				// means if we have some results from query
				while($row = mysqli_fetch_assoc($result)){
					echo "<div class='article-box'>
						<h3> ".$row['a_title'] ."</h3>
						<p> ".$row['a_text'] ."</p>
						<p> ".$row['a_date'] ."</p>
						<p>".$row['a_author']."</p>
					</div>";
				}

			}
		?>
	</div>
</body>
</html>
