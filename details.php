<?php 
include 'web/header.php';
//include 'web/slider.php';
 ?>
<?php
if(!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>'window.location ='index.php'</script>";
} else {
    $id = $_GET['productid'];
    $getProductId = $product->getProductDetailsById($id);

}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addToCart = $cart->addProductToCart($quantity, $id);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <?php

            if($getProductId) {
                while ($result = $getProductId->fetch_assoc()) {

            ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['product_name'] ?> </h2>
					<p><?php echo $result['description'] ?></p>
					<div class="price">
						<p>Price: <span><?php echo $result['price'] ?></span></p>
						<p>Category: <span><?php echo $result['category_name'] ?></span></p>
						<p>Brand:<span><?php echo $result['brand_name'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua"/>
					</form>				
				</div>
			</div>

			<div class="product-desc">
			<h2>Mô tả sản phẩm</h2>
                <p><?php echo $result['description'] ?></p>
                <?php
                }
            }
            ?>
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
                        <?php
                        $getAllCategory = $category->show_category();
                        if($getAllCategory) {
                            while ($result = $getAllCategory->fetch_assoc()) {
                        ?>
				      <li><a href="productbycat.php?categoryId=<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></a></li>
                        <?php
                            }
                        }
                        ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php 
//include 'web/footer.php';
 ?>

