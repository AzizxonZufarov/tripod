<? include "inc/bd.php";

$id = $_GET['id'];

$res = mysqli_query($con,"DELETE FROM posts WHERE id = $id");

header("location:dellcat.php");
