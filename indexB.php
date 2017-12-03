<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<div class="header">
		<h2>Your Details</h2>
		</div>
		<?php endif; ?>
<?php
			$db = mysqli_connect('localhost', 'root', 'iwasborn', 'r');
	if ($db->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected successfully";
}
	$username= $_SESSION['username'];
	$email    = ""; 
	$name = "";
	$age    = "";
	$gender = "";
	$place = "";
	$height = "";
	$weight = "";
	$complexion = "";

		$query= "select* from users where username='$username'";
		$result= mysqli_query($db, $query);
?>	
	<p><h2>username: </h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[0]);
    }
		}else{echo "fail";}
		?>
<p><h2>email: </h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[1]);
    }
		}else{echo "fail";}
		?>
		<div class="header">
		<h2>Found Report</h2>
		</div>
<p><h2>name: </h2></p>
	<?php
			$query= "select* from found where username= '$username'";
			$result= mysqli_query($db, $query);
		if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[1]);
    }
		}else{echo "fail";}
		?>
<p><h2>age: </h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[2]);
    }
		}else{echo "fail";}
		?>
<p><h2>gender: </h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[3]);
    }
		}else{echo "fail";}
		?>
<p><h2>place: </h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[4]);
    }
		}else{echo "fail";}
		?>
		<p><h2>photo:</h2></p>
		
		<?php if($result = mysqli_query($db, $query)) {

			/* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        echo '<img src="images/' . $row[5] . '" alt="Image not available" style="max-width:340px"/>';
        
    }
		}else{echo "fail";}
		?>
<p><h2> height</h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[6]);
    }
		}else{echo "fail";}

		?>
<p><h2> weight</h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[7]);
    }
		}else{echo "fail";}

		?>
<p><h2> complexion</h2></p>
	<?php	if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[8]);
    }
		}else{echo "fail";}

		?>



			<p> <a href="indexB.php?logout='1'" style="color: red;">logout</a> </p>
		
	</div>
	<form action="s.php" method="post">
	
		<div class="input-group">
			<button type="submit" class="btn" name="delete">Delete Account</button>
		</div>
	</form>
	<form action="updateB.php" method="post">
		<div class="input-group">
			<button type="submit" class="btn" name="update">Update Details</button>
		</div>
	</form>	
	<form enctype="multipart/form-data" action="addB.php" method="POST">
		Photo: <input type="file" name="image"><br>   <input type="submit"/>   
	</form>


</body>
</html>
