<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Businexx - All products</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
.block1, .block2, .block3 {
	background:rgb(248, 248, 248); 
	height:220px !important;
	margin-bottom:10px;
}
.block1 img, .block2 img, .block3 img {
	max-height:100px;
	max-width:100px;
}
.block1 a, .block2 a, .block3 a {
	text-decoration:none;
	color:green;
	font-weight:bold;
	font-family:arial;
}
</style>
</head>

<body>
	<div id="header">
		<?php include('head.php'); ?>
        <?php include('menu.php'); ?>
 	 </div>
	 <div id="blocks">
	 	<div class="inside">
		    <div class="block1">
				<h3>Nokia lumia 920 (599€)</h3>
			    <span>Lorem ipsum dolor amet, consectetuer. </span>
			   <img src="prods/lumi920.jpg" /><br />
			    <a href="order.php?add=Lumia 920&qty=1&price=599">Add to cart</a>
			</div>
			<div class="block2">
				<h3>Samsung Galaxy S3 (520€)</h3>
			    <span>Lorem ipsum dolor amet, consectetuer. </span>
				<img src="prods/galaxy3.jpg" /><br />
                            <a href="order.php?add=Galaxy S3&qty=1&price=520">Add to cart</a>
			</div>
			<div class="block3">
				<h3>Apple iPhone Discount 10 pieces (230.20€ / pc)</h3>
			    <span>Lorem ipsum dolor amet, consectetuer. </span>
				<img src="prods/iphone.jpg" /><br />
                            <a href="order.php?add=Apple iPhone Discount offer&qty=10&price=230.20">Add to cart</a>
			</div>

                    <div class="block1">
                                <h3>Nokia lumia 800 (240.50€)</h3>
                            <span>Lorem ipsum dolor amet, consectetuer. </span>
                           <img src="prods/lumia800.jpg" /><br />
                            <a href="order.php?add=Nokia Lumia 800&qty=1&price=240.50">Add to cart</a>
                        </div>
                        <div class="block2">
                                <h3>Samsung 5 Series Ultra (649.90€)</h3>
                            <span>Lorem ipsum dolor amet, consectetuer. </span>
				<img src="prods/samsungultra.jpeg" /><br />
                            <a href="order.php?add=Samsung 5 Series Ultra&qty=1&price=649.90">Add to cart</a>                        </div>
                        <div class="block3">
                                <h3>Asus Zenbook UX32VD 13.3" (999.99€)</h3>
                            <span>Lorem ipsum dolor amet, consectetuer. </span>
				<img src="prods/lumia800.jpg" /><br />
                            <a href="order.php?add=Asus Zenbook UX32VD 13.3&qty=1&price=999.99">Add to cart</a>
                        </div>



		</div>
	 </div>
	 <div id="footer" style="clear:both;">
	 	<div class="inside">
			<p>Businex &copy; 2009   |  <a href="http://www.webdesign.org" target="_blank">Webdesign</a> by <a href="http://www.freetemplatesonline.com" target="_blank">Free Templates</a> Online</p>
		</div>
	 </div>
<div style="display:none;"><?php include('order.php'); ?></div>
<?php include('tag.php'); ?>
</body>
</html>
