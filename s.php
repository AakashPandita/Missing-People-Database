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
echo'<link rel="stylesheet" type="text/css" href="style.css">';



            $db = mysqli_connect('localhost', 'root', 'iwasborn', 'r');
    if ($db->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
  echo "Connected successfully";
}

if (isset($_POST["search"]))
{
$query= "select* from found where name='{$_SESSION['name']}'";
mysqli_query($db,"
    delimiter //
    create procedure nresults(out param1 int)]
    BEGIN
    select* from found where name='{$_SESSION['name']}';

    end//
     ");
$result =mysqli_query($db, $query);     
        
        $r= mysqli_query($db, "call nresults(@a)");
        $s= mysqli_num_rows($result);
        echo"~~Number of results is ";
        printf("%d", $s);
    
        if (mysqli_num_rows($result)>= 1) {
            echo"<p><h2>name: </h2></p>";
    /* fetch associative array */
    while ($row =mysqli_fetch_row($result)) {
        printf ("%s ", $row[1]);
    }

echo"<p><h2>age: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[2]);
    }
        }else{echo "fail";}
        
echo"<p><h2>gender: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[3]);
    }
        }else{echo "fail";}
        
echo"<p><h2>place: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[4]);
    }
        }else{echo "fail";}

echo"<p><h2>photo:</h2></p>";
        
         if($result = mysqli_query($db, $query)) {

            /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        echo '<img src="images/' . $row[5] . '" alt="Image not available" style="max-width:340px"/>';
        
    }
        }else{echo "fail";}

echo"<p><h2>height: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[6]);
    }
        }else{echo "fail";}

echo"<p><h2>weight: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[7]);
    }
        }else{echo "fail";}

echo"<p><h2>complexion: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[8]);
    }
        }else{echo "fail";}


    echo'<div class="header">';
        echo'<h2>Submitted by:</h2>';
    echo'</div>';
        echo "<p><h2>username: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[0]);
        $un= $row[0];//$_SESSION['name']= $row[1];
    }
        }else{echo "fail";}
        
            $query= "select* from users where username='$un'";
            $result= mysqli_query($db, $query);
        
echo"<p><h2>email: </h2></p>";
        if ($result = mysqli_query($db, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        printf ("%s ", $row[1]);
    }
        }else{echo "fail";}
    }else{echo "~~No Records Found";}
}


if (isset($_POST["delete"])){

    $query= "delete from users where username='{$_SESSION['username']}'";
    mysqli_query($db, $query);
    header('location: login.php');
}

?>
<p> <a href="indexB.php?logout='1'" style="color: red;">logout</a> </p>