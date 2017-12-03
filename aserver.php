
<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	include('errors.php');
	$_SESSION['success'] = "";
	$name = "";
	$age    = "";
	$gender = "";
	$place = "";
	$height = "";
	$weight = "";
	$complexion = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'iwasborn', 'r');
	if ($db->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected successfully";
}

	// REGISTER USER
	if (isset($_POST['submit'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//checking if username already exists or not 
		$usr= "select username from admins where username='{$_POST['username']}'";//'{$_SESSION['name']}'
		$re= mysqli_query($db, $usr);
		if(mysqli_num_rows($re) > 0){
			array_push($errors, "username already exists");
		}
		/*else{
			$usr= "select username from n where username='{$_POST['username']}'";
			$re= mysqli_query($db, $usr);
			if(mysqli_num_rows($re) > 0){
			array_push($errors, "username already exists");
		}
		}*/

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//$password = md5($password_1);//encrypt the password before saving in the database
			
			mysqli_query($db,"START TRANSACTION");

			$a1 = "INSERT INTO admins 
						VALUES('$username', '$email', '$password_1')";
			$a= mysqli_query($db, $a1);
			
			if ($a) {
    		mysqli_query($db,"COMMIT");
    		$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: aindex.php');
			} else {        
    		mysqli_query($db,"ROLLBACK");
			}
		}
		else
		{
			echo "error hai";
		}

	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {

			$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
			$r= mysqli_query($db, $query);
			if(mysqli_num_rows($r)==1){

				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: aindex.php');
			     
			}else{
				array_push($errors, "Wrong username/password");
			}
		}
	}
 ?>
		