<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tripod Blog Theme - Free CSS Templates</title>
<meta name="keywords" content="free css templates, tripod, blog, theme" />
<meta name="description" content="Tripod - free CSS template provided by templatemo.com" />
<link rel="stylesheet" href="templatemo_style.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>

</script>
</head>



<body>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">

       <div id="site_title">
            <h1><a href="index.php">
                <img src="images/templatemo_logo.png" alt="tripod blog" /></a>
                <span>Блог на разные темы</span>
            </h1>
        </div>


    </div> <!-- end of header -->

    <div id="templatemo_menu">

        <ul>
<?$res = mysqli_query($con,"SELECT * FROM menu");

$row = mysqli_fetch_assoc($res);


	do{

				$href = $row['title'];
			if( $href == 'Home'){
				$href = 'index';
			}
			if( $href == 'Contact Us'){
				$href = 'contact';
			}
			?>

      <li><a href="<?=$href?>.php" class=""><?=$row['title']?></a></li>
	 <? }while($row = mysqli_fetch_assoc($res));?>
	</ul>

    </div> <!-- end of templatemo_menu -->

</div> <!-- end of header wrapper-->

<script type="text/javascript">
    <? $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
    window.addEventListener('load', function() {
        const pageName = '<?= $curPageName ?>'.replace('/', '');
        const activeMenu = document.querySelector(`#templatemo_menu a[href="${ pageName || 'index.php' }"]`);
         activeMenu.classList.add("current");
    });
</script>
