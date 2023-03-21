<? include "inc/bd.php";


$author = $_POST['author'];
$email = $_POST['email'];
$text = $_POST['text'];
$id = $_POST['id'];



$res = mysqli_query($con,"INSERT INTO contact (author,email,text) VALUES('$author','$email','$text')");

     
header("location:contact.php");