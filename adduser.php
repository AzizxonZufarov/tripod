<? include "inc/bd.php";?>
<?php
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$img = $_FILES['img']['name'];

move_uploaded_file($_FILES['img']['tmp_name'],"regupl/".$img);

$res = mysqli_query($con,"INSERT INTO users (name,login,password,email,img)VALUES('$name','$login','$password','$email','$img')");

header("location:reg.php");
?>
