<?php 
include 'web/header.php';
//include 'web/slider.php';
 ?>
<?php
 $categoryName = $category->show_category();
?>
 <div class="main">
    <div class="content">
        <?php
        if($categoryName) {
            while ($result = $categoryName->fetch_assoc()) {


        ?>
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result['category_name'] ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
              $id = $result['category_id'];
              $getProductByCategoryId = $product->getProductByCategoryId($id);
              if($getProductByCategoryId) {
                  while ($resultProduct = $getProductByCategoryId->fetch_assoc()) {


              ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?productid=<?php echo $resultProduct['product_id'] ?>"><img src="admin/<?php echo $resultProduct['image'] ?>" alt="" /></a>
					 <h2><?php echo $resultProduct['product_name'] ?> </h2>
					 <p><?php echo $resultProduct['description'] ?></p>
					 <p><span class="price"><?php echo $resultProduct['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?productid=<?php echo $resultProduct['product_id'] ?>" class="details">Details</a></span></div>
				</div>
              <?php
                  }
              }
                      ?>
			</div>
          <?php
            }
        }
        ?>
<!--			<div class="content_bottom">-->
<!--    		<div class="heading">-->
<!--    		<h3>Latest from Acer</h3>-->
<!--    		</div>-->
<!--    		<div class="clear"></div>-->
<!--    	</div>-->
<!--			<div class="section group">-->
<!--				<div class="grid_1_of_4 images_1_of_4">-->
<!--					 <a href="preview-3.php"><img src="images/new-pic1.jpg" alt="" /></a>-->
<!--					 <h2>Lorem Ipsum is simply </h2>-->
<!--					 <p><span class="price">$403.66</span></p>-->
<!--				    -->
<!--				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>-->
<!--				</div>-->
<!--				<div class="grid_1_of_4 images_1_of_4">-->
<!--					<a href="preview-4.php"><img src="images/new-pic2.jpg" alt="" /></a>-->
<!--					 <h2>Lorem Ipsum is simply </h2>-->
<!--					 <p><span class="price">$621.75</span></p>-->
<!--				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>-->
<!--				</div>-->
<!--				<div class="grid_1_of_4 images_1_of_4">-->
<!--					<a href="preview-2.php"><img src="images/feature-pic2.jpg" alt="" /></a>-->
<!--					 <h2>Lorem Ipsum is simply </h2>-->
<!--					 <p><span class="price">$428.02</span></p>-->
<!--				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>-->
<!--				</div>-->
<!--				<div class="grid_1_of_4 images_1_of_4">-->
<!--				 <img src="images/new-pic3.jpg" alt="" />-->
<!--					 <h2>Lorem Ipsum is simply </h2>					 -->
<!--					 <p><span class="price">$457.88</span></p>   -->
<!--				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>-->
<!--				</div>-->
<!--			</div>-->
    </div>
 </div>
<?php 
//include 'web/footer.php';
 ?>