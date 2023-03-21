<? include "inc/bd.php";?>
<? include "inc/header.php";?>


<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
    
    	
            <div class="cleaner_h40"></div>

            <div id="contact_form">
			 
			 
			 <? $id = $_GET['id'];

			$res = mysqli_query($con,"SELECT * FROM posts WHERE id = $id");

			$row = mysqli_fetch_assoc($res);?>
			
				<form action="updcat.php" method="post" enctype="multipart/form-data">

	 			    <label for="author">Author:</label> 
                    <input type="text" value="<?=$row['author']?>" name="author"  />
                    <div class="cleaner_h10"></div>               
                        
                     <label for="author">Category:</label> 
                    <input type="text" value="<?=$row['categories']?>" name="categories"  />
                    <div class="cleaner_h10"></div>   
                                    
                     <label for="text">Text:</label> 
                    <textarea type="text" name="text"><?=$row['text']?></textarea>
                    <div class="cleaner_h10"></div>
                    
                     <label for="author">Title:</label> 
                    <input type="text" value="<?=$row['title']?>" name="title"  />
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
  
	<div class="cleaner"></div>
</div> <!-- end of content wrapper -->

<? include "inc/footer.php";?>
   
   