<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <form action="deletefile.php" method="post">
            <input type="text" name="filename" placeholder="Seperate each name with a comma(,)" style="with:800px;" />
            <!-- some user's input the file list with , and space 
                 ex) cat.jpg, laptop.jpg   
                 so we need to handle Error , with space
            --> 
            <button type='submit' name='submit'>Delete file</button>
        </form>
	</body>
</html>
