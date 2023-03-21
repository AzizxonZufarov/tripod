<?php
include "inc/bd.php";
session_start();
$id = $_SESSION['id'];
?>

<? include "inc/header.php";?>
 <style>
.button {
    color: #ffffff;
    font-size: 30px;
    margin: 0 auto;
    display: block;
    text-decoration: none;
    text-align: center;
    padding: 20px 50px;
    background: #36779A;
    max-width: 300px;
}

.popup-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.8);
    display: none;
}

.popup {
    position: absolute;
    background: #ffffff;
    width: 400px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 30px;
    padding-top: 60px;
}

.popup form {
    display: flex;
    flex-direction: column;
}

.popup form input {
    margin-bottom: 30px;
    height: 50px;
    font-size: 20px;
    border: 2px solid #000000;
}

.popup form input[type="submit"] {
    background: #000000;
    color: #ffffff;
    font-size: 24px;
}

.close-popup {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

.no-scroll {
    overflow-y: hidden;
}
</style>

<div id="templatemo_content_wrapper">

	<div id="templatemo_content">

    <div id="contact_form">

 <?

$res = mysqli_query($con,"SELECT * FROM users WHERE id = $id");

$row = mysqli_fetch_assoc($res);
 ?>


<h2 align="center">Добро пожаловать, <?=$row['login']?></h2>


<table align="center" border="1" width="50" height="100">

			<tr>
					<td align="center">Name</td>
					<td align="center">Login</td>
					<td align="center">Password</td>
					<td align="center">Email</td>
					<td align="center">Image</td>

			</tr>
			<tr>
					<td align="center"><?=$row['name']?></td>
					<td align="center"><?=$row['login']?></td>
					<td align="center"><?=$row['password']?></td>
					<td align="center"><?=$row['email']?></td>
					<td align="center"><img src="upl/<?=$row['img']?>" width="50"/></td>


			</tr>
</table>
            <a href="editcab.php?id=<?=$row['id']?>">edit</a></br>

</br>
       <a href="dellcab.php?id=<?=$row['id']?>">delete</a></br>
        <a href="logout.php"><button>Exit</button></a>
     </div>
    	<div class="cleaner"></div>

			<a href="#" class="buttonPop open-popup">Сменить пароль</a>
			<div class="popup-bg">
					<div class="popup">
							<img class="close-popup" src="images/close.png" alt="">
							<form action="updpass.php" method="post">
									<label>Старый пароль</label>
									<input type="text" name="oldpass" autocomplete="off" >
									<label>Новый пароль</label>
									<input type="text" name="newpass" autocomplete="off" >
									<input type="hidden" value="<?=$id?>" name="id" />
									<input value="Сменить пароль" type="submit">
							</form>
					</div>
			</div>
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
<script>
$('.open-popup').click(function(e) {
    e.preventDefault();
    $('.popup-bg').fadeIn(800);
    $('html').addClass('no-scroll');
});

$('.close-popup').click(function() {
    $('.popup-bg').fadeOut(800);
    $('html').removeClass('no-scroll');
});
</script>
<? include "inc/footer.php";?>
