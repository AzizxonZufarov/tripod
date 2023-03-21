<?php
if($_SESSION['id'] == true){
session_start();
}
if($_SESSION['id'] == false){
unset($_SESSION['id']);
}
include "inc/bd.php";
?>


    <div id="templatemo_sidebar_one">


      <?
      $result =   mysqli_query($con,"SELECT * from categories");
      if(mysqli_num_rows($result) ==0){
        echo "<h6>категорий нет</h6>";
      }else {

   echo '<h6>Категорий найдено -' . mysqli_num_rows($result). '</h6>';
}?>





         <ul class="templatemo_list">

<?$res = mysqli_query($con,"SELECT * FROM categories");

$row = mysqli_fetch_assoc($res);
	do{
    $articles_count =   mysqli_query($con,"SELECT * from posts WHERE cat_id = $row[id]");?>
			 <li><a href="category.php?id=<?=$row['id']?>"><?=$row['category']?>(<?=mysqli_num_rows($articles_count);?>)</a></li>
    <? }while($row = mysqli_fetch_assoc($res));?>

         </ul>

        <div class="cleaner_h40"></div>
          	<h4>Вход</h4>

           <?
          $id = $_SESSION['id'];
            if($_SESSION['id']){?>
			<ul class="templatemo_list">
            	<li><a href="cab.php?id=<?=$id?>">Кабинет</a></li>

        </ul>
		<?}else{?>
		<ul class="templatemo_list">
            	<li><a href="reg.php">Регистрация</a></li>
            	<li><a href="auth.php">Авторизация</a></li>
        </ul>
<?}?>
         <div class="cleaner_h40"></div><div class="cleaner_h40"></div>
         <h4>Самые просматриваемые статьи </h4>


<?
		$id = $_GET['id'];
		$res = mysqli_query($con,"SELECT * FROM posts ORDER by views DESC LIMIT 5");


		$row = mysqli_fetch_assoc($res);

	do{?>
 <div class="recent_comment_box">
        <a href="detail.php?id=<?=$row['id']?>"><?=$row['title']?></a>

           <p><?=$row['views']?> просмотров</p>

            <p><?=mb_substr(strip_tags($row['text']), 0, 100, 'utf-8'). '...';?></p>


</div>
<? }while($row = mysqli_fetch_assoc($res));?>
          	  <div class="cleaner_h40"></div>  <div class="cleaner_h40"></div>


        <h4>Самые последние статьи </h4>


<?
		$id = $_GET['id'];
		$res = mysqli_query($con,"SELECT * FROM posts ORDER by `id` DESC LIMIT 3");

		$row = mysqli_fetch_assoc($res);

	do{?>
 <div class="recent_comment_box">
        <a href="detail.php?id=<?=$row['id']?>"><?=$row['title']?></a>
            <p><?=mb_substr(strip_tags($row['text']), 0, 100, 'utf-8'). '...';?></p>

</div>
<? }while($row = mysqli_fetch_assoc($res));?>
          	  <div class="cleaner_h40"></div>  <div class="cleaner_h40"></div>



        <div class="cleaner_h40"></div>




    </div>
