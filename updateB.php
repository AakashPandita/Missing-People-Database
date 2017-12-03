<?php
	session_start();
			$db = mysqli_connect('localhost', 'root', 'iwasborn', 'r');
	if ($db->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>update</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Update</h2>
	</div>
	<form action="updateB.php" method="post">
	
		<div class="input-group">
			<button type="submit" class="btn" name="emailc">Change email</button>
			<input type="email" name="nemail">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="passwordc">Change password</button>
			<input type="password" name="npassword">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="namec">Change name</button>
			<input type="text" name="nname">
		</div>
				<div class="input-group">
			<button type="submit" class="btn" name="agec">Change age</button>
			<input type="text" name="nage">
		</div>
				<div class="input-group">
			<button type="submit" class="btn" name="genderc">Change gender</button>
			<input type="text" name="ngender">
		</div>
				<div class="input-group">
			<button type="submit" class="btn" name="placec">Change place</button>
			<input type="text" name="nplace">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="heightc">Change height</button>
			<input type="text" name="nheight">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="weightc">Change weight</button>
			<input type="text" name="nheight">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="complexionc">Change complexion</button>
			<input type="text" name="ncomplexion">
		</div>

	</form>
</body>
</html>
<?php
if (isset($_POST['emailc'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update users set email='{$_POST['nemail']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
	
}
if (isset($_POST['passwordc'])) {

	$p = md5($_POST['npassword']);
	mysqli_query($db,"START TRANSACTION");
	$query= "update users set password='$p' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['namec'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set name='{$_POST['nname']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['agec'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set age='{$_POST['nage']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['genderc'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set gender='{$_POST['ngender']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['placec'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set place='{$_POST['nplace']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['heightc'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set height='{$_POST['nheight']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['weightc'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set weight='{$_POST['nweight']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
if (isset($_POST['complexionc'])) {

	mysqli_query($db,"START TRANSACTION");
	$query= "update found set complexion='{$_POST['ncomplexion']}' where username='{$_SESSION['username']}'";
	if(mysqli_query($db, $query)){
		mysqli_query($db,"COMMIT");
		header('location: indexB.php');
	}else{
		mysqli_query($db,"ROLLBACK");
	}
}
?>