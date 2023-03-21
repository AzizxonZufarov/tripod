<?php
 include "inc/bd.php";
session_start();

$id = $_POST['id'];

$oldpassword = $_POST['oldpass'];
$newpassword = $_POST['newpass'];

$res = mysqli_query($con,"SELECT * FROM users WHERE id = $id");

$row = mysqli_fetch_assoc($res);
if($oldpassword == $row['password']){
  $res = mysqli_query($con,"UPDATE users SET password = '$newpassword' WHERE id = $id");
}
  header("location:cab.php");
