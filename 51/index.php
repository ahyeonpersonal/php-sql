<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
        <!-- enctype : specify how the form data should be encoded -->
            <input type="file" name="file" />
            <button type="submit" name="Submit">Upload</button>
        </form>
	</body>
</html>


/*
note : enctype='multipart/form-data' means taht no characters will be encoded. 
That is why tyis type is used while uploading files to server
*/
