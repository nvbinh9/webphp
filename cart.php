<?php 
include 'web/header.php';
//include 'web/slider.php';
 ?>
<?php
$loginCheck = Session::get('customer_login');
if($loginCheck == false) {
    header('Location:login.php');
}
?>
<?php
if(isset($_GET['cartId'])) {
    $id = $_GET['cartId'];
    $deleteCart = $cart->deleteCartById($id);
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">

			    	<h2>Giỏ Hàng</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá tiền</th>
								<th width="25%">Số lượng</th>
								<th width="10%">Thao tác</th>
							</tr>
                            <?php
                            $showCart = $cart->getAll();
                            if($showCart) {
                                while ($result = $showCart->fetch_assoc()) {


                            ?>
							<tr>
								<td><?php echo $result['product_name'] ?></td>
								<td><img src="admin/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td><?php echo $result['quantity'] ?>
<!--									<form action="" method="post">-->
<!--										<input type="number" name="" value="--><?php //echo $result['quantity'] ?><!--"/>-->
<!--										<input type="submit" name="submit" value="Update"/>-->
<!--									</form>-->
								</td>
								<td><a href="?cartId=<?php echo $result['cart_id']?>">Xóa</a></td>
							</tr>
                             <?php
                                }
                            }
                              ?>
							
						</table>

					</div>
<!--					<div class="shopping">-->
<!--						<div class="shopleft">-->
<!--							<a href="index.php"> <img src="images/shop.png" alt="" /></a>-->
<!--						</div>-->
<!--						<div class="shopright">-->
<!--							<a href="login.php"> <img src="images/check.png" alt="" /></a>-->
<!--						</div>-->
<!--					</div>-->
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</body>
</html>
<?php 
//include 'web/footer.php';
 ?>