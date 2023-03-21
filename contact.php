<?php
session_start();
?>
<? include "inc/bd.php";?>
<? include "inc/header.php";?>


<div id="templatemo_content_wrapper">

	<div id="templatemo_content">

    	<h1>Контакты</h1>
			<strong class="fix-width-100"><i class="fa fa-skype margin-right-5"></i> Telegram</strong> : @AzizxonZufarov<br/>
			<strong class="fix-width-100"><i class="fa fa-envelope margin-right-5"></i> Email</strong> : bionorica2015@mail.ru  OR  orangelemoncoder@gmail.com<br/>
			<strong class="fix-width-100"><i class="fa fa-globe margin-right-5"></i> Website</strong> : www.testcoder.uz<br/>
			<strong class="fix-width-100"><i class="fa fa-location-arrow margin-right-5"></i> Adresse</strong> : 47, Uygur proezd street, Uchtepa district, Tashkent, Uzbekistan  <br/>
<br />

                <div class="cleaner_h40"></div>

            <div id="contact_form">

                <h2>Пишите мне</h2>

                <form method="post" action="inscontact.php">


                    <label for="author">Name:</label>
                    <input type="text" id="author" name="author" class="required input_field" />
                    <div class="cleaner_h10"></div>

                    <label for="email">Email:</label>
                	<input type="text" id="email" name="email" class="validate-email required input_field" />
                    <div class="cleaner_h10"></div>


                    <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner_h10"></div>
                    <input type="hidden" name="id" value="<?=$id?>" />
                    <input style="font-weight: bold;" type="submit" class="submit_btn" name="submit" id="submit" value=" Send " />
                    <input style="font-weight: bold;" type="reset" class="submit_btn" name="reset" id="reset" value=" Reset " />

                </form>

            </div>

    	<div class="cleaner"></div>

    </div> <!-- end of templatemo content -->

		<? include "inc/sidebar.php";?>


	<div class="cleaner"></div>
</div> <!-- end of content wrapper -->

<? include "inc/footer.php";?>
