<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php
   $product = new product();
   if(!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>'window.location ='productlist.php'</script>";
   } else {
    $id = $_GET['productid'];
   }
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

   $updateProduct = $product->update_product($_POST, $_FILES, $id);
   }
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">  
        <?php 
            if(isset($updateProduct)) {
                echo $updateProduct;
             }

        ?>
        <?php
        $get_product_by_id = $product->getProductById($id);
        if($get_product_by_id) {
            while($result_product = $get_product_by_id->fetch_assoc()) {

        ?>          
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value = "<?php echo $result_product['product_name'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn danh mục</option>
                            <?php
                             $cat = new category();
                             $catlist = $cat->show_category();
                             if($catlist) {

                                 while($result = $catlist->fetch_assoc()){

                            ?>
                            <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                            <?php 
                                  }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php
                             $brand = new brand();
                             $brandlist = $brand->show_brand();
                             if($brandlist) {

                                 while($result = $brandlist->fetch_assoc()){

                            ?>
                            <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                            <?php 
                                  }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name= "description"><?php echo $result_product['description'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" value = "<?php echo $result_product['price'] ?>" name= "price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <img src ="<?php echo $result_product['image'] ?>" width = "90"> <br>
                        <input type="file" name= "image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="1">Phiên bản giới hạn</option>
                            <option value="2">Sản phẩm Hot</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhập" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
            }
        }
        ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php //include 'inc/footer.php';?>


