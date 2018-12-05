<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Contact form tutorial</title>
	</head>
	<body>
		<main>
			<p>Send E-Mail</p>
			<form class="contact-form" action ="contactform.php" method="post">
				<input type="text" name="name" placeholder="Full Name" /><br/>
				<input type="text" name="mail" placeholder="Your E-mail" /><br/>
				<input type="text" name="subject" placeholder="Subject" /><br/>
				<textarea name="message" placeholder="Message"></textarea><br/>
				<button type="submit" name="submit">SEND MAIL</button>
			</form>
		</main>
	</body>
</html>
