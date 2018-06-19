<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP Form Validation</title>
<!--Link to CSS files-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<!--Bootstrap Javascript files and personal JS files-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Set up if statement for good code to execute -->
	<div class="container">
		<h1 class="text-info">Hello, <?php echo $_POST["first"]; ?> <?php echo $_POST["last"]; ?>.</h1>
		<p><strong>Your email address is:</strong> <?php echo $_POST["email"]; ?></p>
		<p>You are affiliated with the following website: <?php echo $_POST["website"]; ?></p>
		<p>You are affiliated with the following website: <?php echo $_POST["newsletter"]; ?></p>
	</div>
</body>
</html>