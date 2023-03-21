<?php
session_start();
?>
<? include "inc/bd.php";?>
<? include "inc/header.php";?>

<div id="templatemo_main_wrapper">
<div id="templatemo_content_wrapper">

	<div id="templatemo_content">


<?
				$per_page = 5;
				$page = 1;
				if( isset($_GET['page'])) {
				$page = (int)$_GET['page'];
				}
				$id = $_GET['id'];
				$total_count_q = mysqli_query($con,"SELECT COUNT(`id`) as `total_count` FROM `posts`");

				$total_count=mysqli_fetch_assoc($total_count_q);

				$total_count=$total_count['total_count'];
				$total_pages = ceil($total_count / $per_page);

				if ($page <= 1 || $page > $total_pages) {
				$page = 1;
				}

				$offset=($per_page * $page)-$per_page;


			$res = mysqli_query($con,"SELECT * FROM `posts` ORDER BY `id` DESC LIMIT $offset,$per_page");
			$articles_exist=true;

			if(mysqli_num_rows($res)<=0){
					echo "not news";
					$articles_exist=false;
			}
			while($row = mysqli_fetch_assoc($res)){?>
    	<div class="post_section"><span class="bottom"></span>

        	<span class="comment"><a href="#"><?=$row['comments']?></a></span>

            <h2><a href="detail.php?id=<?=$row['id']?>"><?=$row['title']?></a></h2>

          	<strong>Date:</strong> <?=$row['date']?> | <strong>Author:</strong> <?=$row['author']?>
			  <img src="<?=$row['img']?>" width="430px" height="300px"/>

            <p><?=$row['text']?></p>

          <div class="cleaner"></div>
            <div class="category">Tags: <a href="#"><?=$row['categories']?></a></div> <div class="button float_r"><a href="detail.php?id=<?=$row['id']?>" class="more">Read more</a></div>

			<div class="cleaner"></div>
      </div>
<? }?>

<?php
if( $articles_exist == true)
{
		 echo '<div class="paginator">';

			   if($page > 1)
				 {
					echo '<a href="index.php?page='. ($page - 1) .'">&laquo; Прошлая страница</a>';

				 }
				 if($total_pages != 1){
					 for ($i = 1; $i <=$total_pages; $i++){
						echo " <a href=index.php?page=" . $i .">". $i ."</a> ";
						}
					}else {
						 echo "Пагинации нет!";
						}
			   if($page < $total_pages)
				 {
					 echo '<a href="index.php?page='. ($page + 1) .'"> Следующая страница &raquo;</a>';
				 }
		 echo '</div>';
 }
?>
        <div class="cleaner_h40"><!-- a spacing between 2 posts --></div>
  </div>
  <? include "inc/sidebar.php";?>


	<div class="cleaner"></div>
</div> <!-- end of content wrapper -->
</div>
<? include "inc/footer.php";?>
