<? include "inc/bd.php";
session_start();


if($_SESSION['id']){
	 
	 $id = $_SESSION['id'];
	 $res = mysqli_query($con,"SELECT * FROM users WHERE id= $id");
	 $row = mysqli_fetch_assoc($res);
	 $author = $row['name'];
	 $email	= $row['email'];

}else{
	$author	=$_POST['author'];
	$email	=$_POST['email'];
}

$text = $_POST['text'];
$id = $_POST['id'];



$res = mysqli_query($con,"INSERT INTO comments (author,text,email,news_id) VALUES('$author','$text','$email',$id)");

header("location:detail.php?id=$id");