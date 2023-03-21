<? include "inc/bd.php";
session_start();

$id = $_SESSION['id'];

$res = mysqli_query($con,"DELETE  FROM users WHERE id = $id");

header("location:cab.php");
