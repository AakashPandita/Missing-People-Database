<?php
            $db = mysqli_connect('localhost', 'root', 'iwasborn', 'r');
    if ($db->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected successfully";
}
?>

<?php
if (isset($_POST['users'])) {

    $q= "select* from users";
    $result=  mysqli_query($db, $q);
    echo"<table>";
    echo"<thead>";
        echo"<tr>";
            echo"<th>username</th>";
            echo"<th>email</th>";
        echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
        //<!--Use a while loop to make a table row for every DB row-->
         while( $row = $result->fetch_assoc()){
       echo"<tr>";
            //<!--Each table column is echoed in to a td cell-->
            echo"<td>";echo $row['username'];echo"</td>";
            echo"<td>";echo $row['email'];echo"</td>";
        echo"</tr>";}
       
   echo" </tbody>";
    echo"</table>";
}
?>

<?php
if (isset($_POST['found'])) {

    $q= "select* from found";
    $result=  mysqli_query($db, $q);
    echo"<table>";
    echo"<thead>";
        echo"<tr>";
            echo"<th>username</th>";
            echo"<th>name</th>";
            echo"<th>age</th>";
            echo"<th>gender</th>";
            echo"<th>place</th>";
            echo"<th>height</th>";
            echo"<th>weight</th>";
            echo"<th>complexion</th>";
        echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
        //<!--Use a while loop to make a table row for every DB row-->
         while( $row = $result->fetch_assoc()){
       echo"<tr>";
            //<!--Each table column is echoed in to a td cell-->
            echo"<td>";echo $row['username'];echo"</td>";
            echo"<td>";echo $row['name'];echo"</td>";
            echo"<td>";echo $row['age'];echo"</td>";
             echo"<td>";echo $row['gender'];echo"</td>";
              echo"<td>";echo $row['place'];echo"</td>";
               echo"<td>";echo $row['height'];echo"</td>";
                echo"<td>";echo $row['weight'];echo"</td>";
                 echo"<td>";echo $row['complexion'];echo"</td>";
        echo"</tr>";}
       
   echo" </tbody>";
    echo"</table>";
}
?>
<?php
if (isset($_POST['missing'])) {

	$q= "select* from missing";
	$result=  mysqli_query($db, $q);
	echo"<table>";
    echo"<thead>";
        echo"<tr>";
            echo"<th>username</th>";
            echo"<th>name</th>";
            echo"<th>age</th>";
            echo"<th>gender</th>";
            echo"<th>place</th>";
            echo"<th>height</th>";
            echo"<th>weight</th>";
            echo"<th>complexion</th>";
        echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
        //<!--Use a while loop to make a table row for every DB row-->
         while( $row = $result->fetch_assoc()){
       echo"<tr>";
            //<!--Each table column is echoed in to a td cell-->
            echo"<td>";echo $row['username'];echo"</td>";
            echo"<td>";echo $row['name'];echo"</td>";
            echo"<td>";echo $row['age'];echo"</td>";
             echo"<td>";echo $row['gender'];echo"</td>";
              echo"<td>";echo $row['place'];echo"</td>";
               echo"<td>";echo $row['height'];echo"</td>";
                echo"<td>";echo $row['weight'];echo"</td>";
                 echo"<td>";echo $row['complexion'];echo"</td>";
        echo"</tr>";}
       
   echo" </tbody>";
	echo"</table>";
}
?>
<?php
if (isset($_POST['delete'])) {

 echo'<form method="post" action="atable.php">';
  echo'<div class="input-group">';
     echo" <label>Enter username</label>";
      echo'<input type="text" name="username1">';
    echo"</div>";
    echo"</form>";
    echo'<div class="input-group">';
      echo'<button type="submit" class="btn" name="submit">Submit</button>';
    echo'</div>';
    if (isset($_POST['submit'])) {   
    $query= "delete from users where username='{$_POST['username1']}'";
    if(mysqli_query($db, $query)){
      echo"deleted";
    }else{
      echo"error";
    }
  }
  }
?>
