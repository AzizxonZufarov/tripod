<?php
 include "inc/bd.php";

$id = $_POST['id'];

$author = $_POST['author'];

$categories = $_POST['categories'];

 $res = mysqli_query($con,"SELECT * FROM categories WHERE category= '$categories' ");
	$row = mysqli_fetch_assoc($res);
if(mysqli_num_rows($res)>0){
	
	$cat_id=$row['id'];

}else{
	
	$res = mysqli_query($con,"INSERT INTO categories (category) VALUES('$categories')");
	$res2 = mysqli_query($con,"SELECT * FROM categories WHERE category= '$categories' ");
	$row2 = mysqli_fetch_assoc($res2);
	$cat_id=$row2['id'];
}


$text = $_POST['text'];

$title = $_POST['title'];


$img = $_FILES['img']['name']; 


move_uploaded_file($_FILES['img']['tmp_name'],"upl/".$img);


$res = mysqli_query($con,"UPDATE posts SET author = '$author', categories = '$categories', text = '$text', title  = '$title ', cat_id= $cat_id ,img = '$img' WHERE id = $id");

header("location:editcat.php");