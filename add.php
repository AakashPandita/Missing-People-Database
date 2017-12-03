<?php
session_start();

// Connects to your database 
 $db = mysqli_connect('localhost', 'root', 'iwasborn', 'r');
	if ($db->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected successfully";
}
mysqli_query($db,"START TRANSACTION");
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];

      //Writes the information to the database 
	mysqli_query($db, "update missing set photo='$file_name' where username='{$_SESSION['username']}'");

/*      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
     	if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }*/
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         mysqli_query($db,"COMMIT");
         header('location: index.php');
         echo "Success";
      }else{
         mysqli_query($db,"ROLLBACK");
         print_r($errors);
      }
   }
?>
