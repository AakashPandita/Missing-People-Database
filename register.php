
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="header">
		<h2>Person Details</h2>
	</div>
	<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>age</label>
			<input type="text" name="age" value="<?php echo $age; ?>">
		</div>
		<div class="input-group">
			<label>gender</label>
			<input type="text" name="gender">
		</div>
		<div class="input-group">
			<label>place</label>
			<input type="text" name="place">
		</div>
		<div class="input-group">
			<label>height</label>
			<input type="text" name="height">
		</div>
		<div class="input-group">
			<label>weight</label>
			<input type="text" name="weight">
		</div>
		<div class="input-group">
			<label>complexion</label>
			<input type="text" name="complexion">
		</div>
		<p>Click one of these to register report.</p>
		<div class="input-group">
			<button type="submit" class="btn" name="miss">Missing</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="found">Found</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>