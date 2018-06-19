<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GitHub for Web Designers</title>
<!--Link to CSS files-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<!--Bootstrap Javascript files and personal JS files-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<?php
		// define variables and set to empty values
		$firstErr = $lastErr = $emailErr = $newsletterErr = $websiteErr = "";
		$first = $last = $email = $newsletter = $website = " ";
         
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["first"])) {
               $firstErr = "First name is required";
            } else {
			   $first = testInput($_POST["first"]);
			   // Validate first name input
				if (!preg_match("/^[a-zA-Z ]*$/", $first)) {
				$firstErr = "Only letters and white space allowed"; 
				}
			}
			if (empty($_POST["last"])) {
				$lastErr = "Last name is required";
			 } else {
				$last = testInput($_POST["last"]);
				// Validate last name input
				if (!preg_match("/^[a-zA-Z ]*$/", $last)) {
				$lastErr = "Only letters and white space allowed"; 
			}
			 }
            if (empty($_POST["email"])) {
			   $emailErr = "Email is required";
            } else {
               $email = testInput($_POST["email"]);
			   // check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
				}	
            }
            if (empty($_POST["website"])) {
			   $website = "";
            } else {
			   // Validate email entry
				$website = testInput($_POST["website"]);
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/
            }%=~_|]/i",$website)) {
				$websiteErr = "Invalid URL, please include http:// or https://"; 
			}
			}
            
            if (empty($_POST["newsletter"])) {
               $newsletterErr = "Please select an option.";
            } else {
               $newsletter = testInput($_POST["newsletter"]);
			}
		}
		
         function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
			return $data;
		 }
?>
<body>
	<?php include 'navbar.php'; ?>
	<div class="container">
		<h1 class="text-info"><span aria-hidden="true" data-icon="&#xE087;" class="github-icon"></span> GitHub for Web Designers</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="row">
				<div class="col-sm-3">
					<label for="first">First Name <span class="text-danger">*</span></label>
				</div>
				<div class="col-sm-9">
					<input type="text" name="first">
					<span class="error"><?php echo $firstErr;?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="last">Last Name <span class="text-danger">*</span></label>
				</div>
				<div class="col-sm-9">
				<input type="text" name="last">
				<span class="error"><?php echo $lastErr;?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="last">Website <span class="text-danger">*</span></label>
				</div>
				<div class="col-sm-9">
				<input type="text" name="website">
				<span class="error"><?php echo $websiteErr;?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="email">Email <span class="text-danger">*</span></label>
				</div>
				<div class="col-sm-9">
					<input type="text" name="email">
					<span class="error"><?php echo $emailErr;?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="newsletter">Would you like to sign up for our newsletter? <span class="text-danger">*</span></label> 
				</div>
				<div class="col-sm-9">
					<input type="radio" name="newsletter" value="yes"> Yes
                  	<input type="radio" name="newsletter" value="no"> No
					  <span class="error"><?php echo $newsletterErr;?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					&nbsp;
				</div>
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-6">
							<input type="submit" name="submit" value="Submit" class="btn btn-info">
						</div>
					<div class="col-sm-6">
						<input type="reset" class="btn btn-info">
					</div>
				</div>
				
			</div>
				
			</div>
		</form>
	</div>

	<?php if (isset($_POST['form'])) { ?>
		<div class="container">
			<h1 class="text-info">Hello, <?php echo $first; ?> <?php echo $last; ?>.</h1>
			<p><strong>Your email address is:</strong> <?php echo $email; ?></p>
			<p>You are affiliated with the following website: <?php echo $website; ?></p>
			<p>You are affiliated with the following website: <?php echo $newsletter; ?></p>
		</div>
	<?php } ?>
</body>
</html>