<?
session_start();
 include "inc/bd.php";?>
<?php

$login = $_POST['login'];
$password = $_POST['password'];


$res = mysqli_query($con,"SELECT * FROM users WHERE login = '$login' AND password = '$password' ");

$row = mysqli_fetch_assoc($res);

	if(mysqli_num_rows($res)>0){

		$_SESSION['id'] = $row['id'];
	header("location:cab.php");

	}else{
		
		header("location:auth.php");
		
	}
?>