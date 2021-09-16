<?php 
include 'web/header.php';
//include 'web/slider.php';
 ?>


<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản Phẩm Hot</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
              $getProductType = $product->getProductByType();
              if($getProductType) {
                  while ($relust = $getProductType->fetch_assoc()) {

              ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?productid=<?php echo $relust['product_id']?>"><img src="admin/<?php echo $relust['image'] ?>" alt="" /></a>
					 <h2><?php echo $relust['product_name']?> </h2>
					 <p><span class="price"><?php echo $relust['price']." VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?productid=<?php echo $relust['product_id']?>" class="details">Details</a></span></div>
				</div>
              <?php
                   }
              }
              ?>

			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
                <?php
                $getProductNew = $product->getProductByIdNew();
                if($getProductNew) {
                    while ($relust = $getProductNew->fetch_assoc()) {

                        ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href="details.php?productid=<?php echo $relust['product_id']?>""><img src="admin/<?php echo $relust['image'] ?>" alt="" /></a>
                            <h2><?php echo $relust['product_name']?> </h2>
                            <p><span class="price"><?php echo $relust['price']?></span></p>
                            <div class="button"><span><a href="details.php?productid=<?php echo $relust['product_id']?>" class="details">Details</a></span></div>
                        </div>
                        <?php
                    }
                }
                ?>

			</div>
    </div>
 </div>

