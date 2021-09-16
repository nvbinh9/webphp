<?php
include 'web/header.php';
//include 'web/slider.php';
?>
<?php
 $brandName = $brand->show_brand()
?>
    <div class="main">
        <div class="content">
            <?php
            if($brandName) {
                while ($result = $brandName->fetch_assoc()) {

                    ?>
                    <div class="content_top">
                        <div class="heading">
                            <h3><?php echo $result['brand_name'] ?></h3>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="section group">
                        <?php
                        $id = $result['brand_id'];
                        $getProductByBrandId = $product->getProductByBrandId($id);
                        if($getProductByBrandId) {
                            while ($resultProduct = $getProductByBrandId->fetch_assoc()) {


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
        </div>
    </div>
<?php
//include 'web/footer.php';
?>