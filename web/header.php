 <?php
  include 'lib/session.php';
  Session::init();
 ?>
<?php
  include_once 'lib/database.php';
  include_once 'hlpers/format.php';
////  require_once 'classes/cart.php';
////  require_once 'classes/user.php';
////  require_once 'classes/category.php';
////  require_once 'classes/product.php';
  spl_autoload_register(function($className){
      include_once "classes/".$className.".php";
  });
//
  $db = new Database();
  $fm = new Format();
  $cart = new cart();
  $user = new user();
  $category = new category();
  $product = new product();
  $brand = new brand();
  $customer = new customer();
 ?>

<!-- --><?php
//  header("Cache-Control: no-cache, must-revalidate");
//  header("Pragma: no-cache");
//  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
//  header("Cache-Control: max-age=2592000");
//?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<!--<script src="js/jquerymain.js"></script>-->
<!--<script src="js/script.js" type="text/javascript"></script>-->
<!--<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>-->
<!--<script type="text/javascript" src="js/nav.js"></script>-->
<!--<script type="text/javascript" src="js/move-top.js"></script>-->
<!--<script type="text/javascript" src="js/easing.js"></script>-->
<!--<script type="text/javascript" src="js/nav-hover.js"></script>-->
<!--<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>-->
<!--<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>-->
<!--<script type="text/javascript">-->
<!--  $(document).ready(function($){-->
<!--    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});-->
<!--  });-->
<!--</script>-->
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/444444.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Tìm kiếm" "><input type="submit" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Giỏ Hàng</span>
							</a>
						</div>
			      </div>
                  <?php
                  if(isset($_GET['customerId'])) {
                      Session::destroy();
                  }
                  ?>
		   <div class="login">
               <?php
               $login_check = Session::get('customer_login');
               if($login_check == false) {
                   echo '<a href="login.php">Login</a></div>';
               } else {
                   echo '<a href="?customerId='.Session::get('customer_id').'">Logout</a></div>';
               }
               ?>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang Chủ</a></li>
	  <li><a href="products.php">Sản Phẩm</a> </li>
	  <li><a href="topbrands.php">Thương Hiệu Hot</a></li>
	  <li><a href="cart.php">Giỏ Hàng</a></li>
<!--	  <li><a href="contact.php">Liên Lạc</a> </li>-->
	  <div class="clear"></div>
	</ul>
</div>