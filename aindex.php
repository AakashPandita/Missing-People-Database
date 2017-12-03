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
		<h2>Admin Home Page</h2>
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


		$query= "select* from admins where username='$username'";
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
		



			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		
	</div>


	<form action="atable.php" method="post">
	
		<div class="input-group">
			<button type="submit" class="btn" name="users">Show users</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="missing">Show missing people details</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="found">Show found people details</button>
		</div>
	</form>
	<form action="aindex.php" method="post">
		<div class="input-group">
			<button type="delete" class="btn" name="delete">Delete users</button>
		</div>
	
	<p> <a href="aregister.php" style="color: blue;">create new admin</a> </p>
</form>

</body>
</html>
<?php
if (isset($_POST['delete'])) {

 echo'<form method="post" action="aindex.php">';
  echo'<div class="input-group">';
     echo" <label>Enter username</label>";
      echo'<input type="text" name="username1">';
    echo"</div>";
    echo'<div class="input-group">';
      echo'<button type="submit" class="btn" name="submit1">Submit</button>';
    echo'</div>';
    echo"</form>";}?><?php
    if (isset($_POST['submit1'])) {   
    $query= "delete from users where username='{$_POST['username1']}'";
    if($q= mysqli_query($db, $query)){
      echo"deleted";
    }else{
      echo"error";
    }
  }
  
?>