<?php
 include "inc/bd.php";
session_start();

$id = $_POST['id'];

$name = $_POST['name'];

$login = $_POST['login'];

$password = $_POST['password'];

$email = $_POST['email'];

$img = $_FILES['img']['name']; 


move_uploaded_file($_FILES['img']['tmp_name'],"upl/".$img);


$res = mysqli_query($con,"UPDATE users SET name = '$name', login = '$login', password = '$password', email = '$email', img = '$img' WHERE id = $id");

header("location:cab.php");