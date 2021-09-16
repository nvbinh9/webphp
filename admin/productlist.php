<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../hlpers/format.php';?>
<?php 
	$product = new product();
	$format = new Format();
?>
<?php
if(isset($_GET['productid'])) {  
    $id = $_GET['productid'];
    $deleteProduct = $product->delete_product($id);
   }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block"> 
			<?php
			if(isset($deleteProduct)) {
				echo $deleteProduct;
			}
			?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Thương hiệu</th>
					<th>Danh mục</th>
					<th>Type</th>
					<th>Mô tả</th>
					<th>Hình ảnh</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$productlist = $product->show_product();
				if($productlist){
					$i = 0;
					while($result = $productlist->fetch_assoc()) {
						$i++;
				
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_name'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><?php echo $result['brand_name'] ?></td>
					<td><?php echo $result['category_name'] ?></td>
					<td><?php 
					 if($result['type'] == 1) {
						 echo 'Phiên bản giới hạn';
					 } else {
						 echo 'Sản phẩm hot';
					 }
					?></td>
					<td><?php echo $format->textShorten($result['category_id'], 30)  ?></td>
					<td><img src ="<?php echo $result['image'] ?>" width = "60"></td>
					<td><a href="productedit.php?productid=<?php echo $result['product_id'] ?>">Sửa</a> || <a href="?productid=<?php echo $result['product_id'] ?>">Xóa</a></td>
				</tr>
				<?php 
				    }
				}
				?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php //include 'inc/footerer.php';?>
