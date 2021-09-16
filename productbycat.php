<?php 
include 'web/header.php';
//include 'web/slider.php';
 ?>
<?php
if(!isset($_GET['categoryId']) || $_GET['categoryId'] == NULL) {
    echo "<script>'window.location ='details.php'</script>";
} else {
    $id = $_GET['categoryId'];
    $productByCategory = $product->getProductByCategoryId($id);
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">

    		<h3>Danh mục</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
              if($productByCategory) {
                  while ($result = $productByCategory->fetch_assoc()) {


                      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?productId=<?php echo $result['product_id'] ?>"><img src="admin/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['product_name'] ?> </h2>
					 <p><?php echo $result['description'] ?></p>
					 <p><span class="price"><?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?productId=<?php echo $result['product_id'] ?>" class="details">Details</a></span></div>
				</div>
              <?php
                  }
              }
              ?>

			</div>

	
	
    </div>
 </div>
<?php 
//include 'web/footer.php';
 ?>