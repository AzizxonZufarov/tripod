<?php
include "inc/bd.php";
session_start();
?>
  
<? include "inc/header.php";?>


<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
    
    <div id="contact_form">
			 
			 <? $id = $_GET['id'];

			$res = mysqli_query($con,"SELECT * FROM users WHERE id = $id");

			$row = mysqli_fetch_assoc($res);
				?>
				<form action="updcab.php" method="post" enctype="multipart/form-data">

	 			    <label for="author">Name:</label> 
                    <input type="text" value="<?=$row['name']?>" name="name"  />
                    <div class="cleaner_h10"></div>
              
                    
                    <label for="email">Login:</label> 
                    <input type="text" value="<?=$row['login']?>" name="login"/>
                    <div class="cleaner_h10"></div>
                    
                  
                    <label for="text">password:</label> 
                    <input type="text" value="<?=$row['password']?>" name="password"/>
                    <div class="cleaner_h10"></div>
                    
                     <label for="text">Email:</label> 
                    <input type="text" value="<?=$row['email']?>" name="email"/>
                    <div class="cleaner_h10"></div>
 
     				<label for="email">Image:</label> 
                    <input type="file"  name="img"/>
                    <div class="cleaner_h10"></div>
                    
                                    
                      <input type="hidden" value="<?=$id?>" name="id" />
                    <input type="submit" class="submit_btn" value="Send" />
					
				</form>
       
     </div> 
    	<div class="cleaner"></div>
    
    </div> <!-- end of templatemo content -->
    
		<? include "inc/sidebar.php";?>
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
                <li><a href="" target="_parent">Free CSS Templates</a></li>
                <li><a href="" target="_parent">Flash Templates</a></li>
                <li><a href="" target="_parent">Website Templates</a></li>
                <li><a href="" target="_parent">Web Design Blog</a></li>
                <li><a href="" target="_parent">Flash Web Gallery</a></li>
                <li><a href="#">Curabitur sed lacinia</a></li>
                <li><a href="#">Vestibulum laoreet tincidunt</a></li>
                <li><a href="#">Nullam nec mi enim</a></li>
                <li><a href="#">Aliquam quam nulla</a></li>
                <li><a href="#">Curabitur non felis massa</a></li>
            </ul>
    	</div>
        
    </div>

	<div class="cleaner"></div>
</div> <!-- end of content wrapper -->

<? include "inc/footer.php";?>














