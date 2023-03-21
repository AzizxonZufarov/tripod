
<? include "inc/bd.php";?>
<? include "inc/header.php";?>


<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
    
    	
            <div class="cleaner_h40"></div>

            <div id="contact_form">
            
                <h2>Статьи</h2>
                
           
                  <?
                  $id = $_GET['id'];
                  $res = mysqli_query($con,"SELECT * FROM posts");
			
				   $row = mysqli_fetch_assoc($res);
	
	
	
					do{?>
 
        
            <div class="post_section">
             
            <a href="editcat2.php?id=<?=$row['id']?>"><?=$row['title']?></a>
                  
            </div>
             <? }while($row = mysqli_fetch_assoc($res));?>
            
            </div> 
            
    	<div class="cleaner"></div>
    
    </div> <!-- end of templatemo content -->
    
		<? include "inc/sidebar.php";?>
  
	<div class="cleaner"></div>
</div> <!-- end of content wrapper -->

<? include "inc/footer.php";?>
   