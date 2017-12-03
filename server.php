
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
	if (isset($_POST['miss'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$place = mysqli_real_escape_string($db, $_POST['place']);
		$height = mysqli_real_escape_string($db, $_POST['height']);
		$weight = mysqli_real_escape_string($db, $_POST['weight']);
		$complexion = mysqli_real_escape_string($db, $_POST['complexion']);

//checking if username already exists or not 
		$usr= "select username from users where username='{$_POST['username']}'";//'{$_SESSION['name']}'
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
		if (empty($name)) { array_push($errors, "name is required"); }
		if (empty($age)) { array_push($errors, "age is required"); }
		if (empty($gender)) { array_push($errors, "gender is required"); }
		if (empty($place)) { array_push($errors, "place is required"); }
		if (empty($height)) { array_push($errors, "height is required"); }
		if (empty($weight)) { array_push($errors, "weight is required"); }
		if (empty($complexion)) { array_push($errors, "complexion is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			
			mysqli_query($db,"START TRANSACTION");

			$a1 = "INSERT INTO users 
						VALUES('$username', '$email', '$password')";
			$a= mysqli_query($db, $a1);
			$a2 = "INSERT INTO missing
					  VALUES('$username', '$name', '$age', '$gender', '$place', 'NULL', '$height', '$weight', '$complexion')";
			$b= mysqli_query($db, $a2);
			
			if ($a and $b) {
    		mysqli_query($db,"COMMIT");
    		$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
			} else {        
    		mysqli_query($db,"ROLLBACK");
			}
		}
		else
		{
			echo "error hai";
		}

	}

// REGISTER USER
	if (isset($_POST['found'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$place = mysqli_real_escape_string($db, $_POST['place']);
		$height = mysqli_real_escape_string($db, $_POST['height']);
		$weight = mysqli_real_escape_string($db, $_POST['weight']);
		$complexion = mysqli_real_escape_string($db, $_POST['complexion']);


//checking if username already exists or not 
		$usr= "select username from users where username='{$_POST['username']}'";//'{$_SESSION['name']}'
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
		if (empty($name)) { array_push($errors, "name is required"); }
		if (empty($age)) { array_push($errors, "age is required"); }
		if (empty($gender)) { array_push($errors, "gender is required"); }
		if (empty($place)) { array_push($errors, "place is required"); }
		if (empty($height)) { array_push($errors, "height is required"); }
		if (empty($weight)) { array_push($errors, "weight is required"); }
		if (empty($complexion)) { array_push($errors, "complexion is required"); }


		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			mysqli_query($db,"START TRANSACTION");

			$a1 = "INSERT INTO users 
						VALUES('$username', '$email', '$password')";
			$a= mysqli_query($db, $a1);
			$a2 = "INSERT INTO found
					  VALUES('$username', '$name', '$age', '$gender', '$place', 'NULL', '$height', '$weight', '$complexion')";
			$b= mysqli_query($db, $a2);
			
			if ($a and $b) {
    		mysqli_query($db,"COMMIT");
    		$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: indexB.php');
			} else {        
    		mysqli_query($db,"ROLLBACK");
			}
		}
		else
		{
			echo "error hai";
		}

	}
	// ... 

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

			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$r= mysqli_query($db, $query);
			if(mysqli_num_rows($r)==1){

				$query2 = "SELECT * FROM found WHERE username='$username'";
				$s= mysqli_query($db, $query2);
				if (mysqli_num_rows($s)==1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: indexB.php');
			    }

				$query1 = "SELECT * FROM missing WHERE username='$username'";
				$t= mysqli_query($db, $query1);
				if (mysqli_num_rows($t)==1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
				}   
			}else{
				array_push($errors, "Wrong username/password");
			}
		}
	}
 ?>
			<?php
			/*$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			

			if ( mysqli_query($db, $query)) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				$password = md5($password);
			$query = "SELECT * FROM found WHERE username='$username' AND password='$password'";
			
			if ($results = mysqli_query($db, $query)) {

				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: indexB.php');
				}else{
				array_push($errors, "Wrong username/password combination");*/
			?>