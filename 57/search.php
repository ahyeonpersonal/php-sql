<?php
    include 'header.php';
?>
<h1>Search Page</h1>

<div class="article-container">
    <?php
        
        //if user actually click the search button
        if(isset($_POST['submit-search'])){
            
            // contain information we types in 'search' box
            //make sure user not to type sql query in 'search' box and keep the data
            //w3c : escape variables for security
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            //$search = mysqli_real_escape_String($conn, 'the actualy thing that user actually typed from the search');

            //now we need to search what user typed in
            $sql = "SELECT * FROM article WHERE 
                    a_title LIKE '%$search%' 
                    OR a_text LIKE '%$search%'
                    OR a_author LIKE '%$search%'
                    OR a_date LIKE '%$search%'";
            //$sql = "SELECT * FROM article WHERE a_title = '$search";
            //since we are looking for some 'part' of title, we don't use a_title = '$search', instead using LIKE

            $result = mysqli_query($conn, $sql);

            //check if we have result
            $queryResult = mysqli_num_rows($result);
            
            //how many results we have
            echo "There are ".$queryResult." results!";

            if($queryResult > 0){
                //if there is any results
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href='article.php?title=".$row['a_title'] ."&date=".$row['a_date'] ."'><div class='article-box'>
						  <h3> ".$row['a_title'] ."</h3>
						  <p> ".$row['a_text'] ."</p>
						  <p> ".$row['a_date'] ."</p>
						  <p>".$row['a_author']."</p>
					     </div></a>";
                }
            }else{
                //if there is no result, 
                echo 'There is no results matching your search';
            }


        }
    ?>
</div>
