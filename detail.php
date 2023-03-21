<?php
session_start();
$id = $_SESSION['id'];
?>
<? include "inc/bd.php";?>
<? include "inc/header.php";?>

<div id="templatemo_main_wrapper">
<div id="templatemo_content_wrapper">

	<div id="templatemo_content">


<?
          $id = $_GET['id'];
          $res = mysqli_query($con,"SELECT * FROM posts WHERE id= $id");
				  $row = mysqli_fetch_assoc($res);


		$res_upd = mysqli_query($con,"UPDATE posts SET `views`=`views`+1 WHERE id= $id");
        $res_views =   mysqli_query($con,"SELECT views AS cnt_views FROM posts WHERE id= $id");
		$row_views = mysqli_fetch_assoc($res_views);

		$total_views = $row_views['cnt_views'];


                $count =   mysqli_query($con,"SELECT COUNT('id') AS 'total' from comments
					WHERE news_id= $id");

				 $count_res = mysqli_fetch_assoc($count);
				$total = $count_res['total'];


				$result = mysqli_query($con,"UPDATE posts SET comments = $total WHERE id = $id");

					do{?>
	<div id="templatemo_content">

    	<div class="post_section"><span class="bottom"></span>

          <h2><?=$row['title']?></h2>

            <strong>Date:</strong> <?=$row['date']?> | <strong>Author:</strong> <?=$row['author']?>

  <img src="<?=$row['img']?>" width="430px" height="300px"/>

             <p><?=$row['text']?></p>
             <div class="cleaner"></div>

			<div class="cleaner"></div>

            <div class="comment_tab">

            <div class="comment_tab">
           	 <?=$total_views?>   Просмотров
            </div>

			 <?=$total?> Комментариев


            </div>
       <? }while($row = mysqli_fetch_assoc($res));?>

            <div id="comment_section">

 				<? $id = $_GET['id'];
                $res = mysqli_query($con,"SELECT * FROM comments WHERE news_id = $id");

				$row = mysqli_fetch_assoc($res);

				do{?>

                <ol class="comments first_level">

                        <li>
                            <div class="comment_box commentbox1">

                                <div class="gravatar">
                                    <img src="images/avator1.png" alt="author 1" />
                                </div>

                                <div class="comment_text">
                                    <div class="comment_author"><?=$row['author']?><span class="date"><?=$row['date']?></span></div>
                                    <p><?=$row['text']?></p>
                                    <div class="reply"><a href="#">Reply</a></div>
                                </div>
                                <div class="cleaner"></div>
                            </div>

                        </li>

              </ol>
               <? }while($row = mysqli_fetch_assoc($res));?>
          </div>

                <div id="comment_form">
                    <h3>Leave A Comment</h3>

                    <form action="inscomment.php" method="post">
                        <?
              		if($_SESSION['id']){?>
                          <div class="form_row">
                            <label>Your comment</label><br />
                            <textarea  name="text" rows="" cols=""></textarea>
                        </div>
							<input type="hidden" name="id" value="<?=$id?>" />
                        <input type="submit" name="Submit" value="Submit" class="submit_btn" />

                          <?}else{?>
                           <div class="form_row">
                            <label>Name ( Required )</label><br />
                            <input type="text" name="author" />
                        </div>
                        <div class="form_row">
                            <label>Email  ( Required, will not be published )</label><br />
                            <input type="text" name="email" />

                        </div>
                        <div class="form_row">
                            <label>Your comment</label><br />
                            <textarea  name="text" rows="" cols=""></textarea>
                        </div>
							<input type="hidden" name="id" value="<?=$id?>" />
                        <input type="submit" name="Submit" value="Submit" class="submit_btn" /><?}?>
                    </form>

                </div>

        </div>

  	</div> <!-- end of content -->

        <div class="cleaner_h40"><!-- a spacing between 2 posts --></div>



  </div>
  <? include "inc/sidebar.php";?>
   <!--
    <div id="templatemo_sidebar_one">

    	<h4>Categories</h4>



         <ul class="templatemo_list">

<?$res = mysqli_query($con,"SELECT * FROM categories");

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


<?$res = mysqli_query($con,"SELECT * FROM recent");

$row = mysqli_fetch_assoc($res);

	do{?>
 <div class="recent_comment_box">
        <a href="#"><?=$row['title']?></a>
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
