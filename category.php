<?php
session_start();
?>
<? include "inc/bd.php";?>
<? include "inc/header.php";?>


<div id="templatemo_main_wrapper">
<div id="templatemo_content_wrapper">

	<div id="templatemo_content">


<!--Pagination-->
<?php

$per_page = 5;
$page = 1;
if( isset($_GET['page'])) {
$page = (int)$_GET['page'];
}
$id = $_GET['id'];

$total_count_q = mysqli_query($con,"SELECT COUNT(`id`)  as `total_count` FROM `posts`  WHERE `cat_id` = '$id'");
$total_count=mysqli_fetch_assoc($total_count_q);

$total_count=$total_count['total_count'];

$total_pages = ceil($total_count / $per_page);

if ($page <= 1 || $page > $total_pages) {
$page = 1;
}

$offset=($per_page * $page)-$per_page;


$res = mysqli_query($con,"SELECT * FROM `posts` WHERE `cat_id` = '$id' ORDER BY `id` DESC LIMIT $offset,$per_page ");

$articles_exist=true;

if(mysqli_num_rows($res)<=0){
		echo "not news";
		$articles_exist=false;
}

					while($row = mysqli_fetch_assoc($res)){?>
    	<div class="post_section"><span class="bottom"></span>


        	<span class="comment"><a><?=$row['comments']?></a></span>

            <h2><a href="detail.php?id=<?=$row['id']?>"><?=$row['title']?></a></h2>

          	<strong>Date:</strong> <?=$row['date']?> | <strong>Author:</strong> <?=$row['a']?>

			<a href="#"><img src="<?=$row['img']?>" width="430px" height="300px"/></a>

            <p><?=$row['text']?></p>

          <div class="cleaner"></div>
            <div class="category">Tags: <a href="#"><?=$row['categories']?></a>, <a href="#">Templates</a></div> <div class="button float_r"><a href="detail.php?id=<?=$row['id']?>" class="more">Read more</a></div>

			<div class="cleaner"></div>

        </div>
            <? }

						?>

        <div class="cleaner_h40"><!-- a spacing between 2 posts --></div>
	<?php			if( $articles_exist == true )
				{
						 echo '<div class="paginator">';

							 if($page > 1)
								 {
									echo '<a href="category.php?id='.$id.'&page='. ($page - 1) .'">&laquo; Прошлая страница</a>';

								 }
								 	if($total_pages != 1){
										for ($i = 1; $i <=$total_pages; $i++){
										 echo ' <a href=category.php?id='.$id.'&page=' . $i .'>' . $i .'</a>';
									 }
								 	}else {
									 echo "Пагинации нет!";
									}
							 if($page < $total_pages)
								 {
									 echo '<a href="category.php?id='.$id.'&page='. ($page + 1) .'"> Следующая страница &raquo;</a>';
								 }
						 echo '</div>';
				 }
				?>

  </div>
   <? include "inc/sidebar.php";?>
 <!--
    <div id="templatemo_sidebar_one">

    	<h4>Categories</h4>



         <ul class="templatemo_list">

<?			 $id = $_GET['id'];
			 $res = mysqli_query($con,"SELECT * FROM categories");
			 $row = mysqli_fetch_assoc($res);

			do{?>
			 <li><a href="category.php?id=<?=$row['id']?>"><?=$row['category']?></a></li>
    		<? }while($row = mysqli_fetch_assoc($res));?>

         </ul>

        <div class="cleaner_h40"></div>

        <h4>Archives</h4>
        <ul class="templatemo_list">
<?$res = mysqli_query($con,"SELECT * FROM archives");

$row = mysqli_fetch_assoc($res);

	do{?>
       		<li><a href="#"><?=$row['title']?></a></li>
	<? }while($row = mysqli_fetch_assoc($res));?>
        </ul>

        <div class="cleaner_h40"></div>

        <h4>Recent Posts</h4>


<? 		$id = $_GET['id'];
		$res = mysqli_query($con,"SELECT * FROM recent");

		$row = mysqli_fetch_assoc($res);

		do{?>
			 <div class="recent_comment_box">
						<a href="detail.php?id=<?=$row['id']?>"><?=$row['title']?></a>
						<p><?=$row['text']?></p>

			</div>
		<? }while($row = mysqli_fetch_assoc($res));?>


    </div>
 -->
    <div id="templatemo_sidebar_two">

        <div class="banner_250x200">
    		<a href="" target="_parent"><img src="images/250x200_banner.jpg" alt="templates" /></a>
        </div>

        <div class="banner_125x125">
        	<a href="" target="_parent"><img src="images/templatemo_ads.jpg" alt="web 1" /></a>
            <a href="" target="_parent"><img src="images/templatemo_ads.jpg" alt="web 2" /></a>
    		<a href="" target="_parent"><img src="images/templatemo_ads.jpg" alt="templates 2" /></a>
    		<a href="" target="_parent"><img src="images/templatemo_ads.jpg" alt="templates 1" /></a>
        </div>

        <div class="cleaner_h40"></div>

        <div class="sidebar_two_box">

            <h4>Useful Resources</h4>
            <ul class="templatemo_list">
<?$res = mysqli_query($con,"SELECT * FROM useful");

$row = mysqli_fetch_assoc($res);

	do{?>
	<li><a href="" target="_parent"><?=$row['title']?></a></li>

    <? }while($row = mysqli_fetch_assoc($res));?>

            </ul>
    	</div>

    </div>

	<div class="cleaner"></div>
</div> <!-- end of content wrapper -->
</div>
<? include "inc/footer.php";?>

</body>
</html>
