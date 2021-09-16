<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php 
  $brand = new brand();
  if(isset($_GET['delid'])) {  
    $id = $_GET['delid'];
    $deleteBrand = $brand->delete_brand($id);
   }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách thương hiệu</h2>
                <div class="block">
                <?php 
                 if(isset($deleteBrand)) {
                    echo $deleteBrand;
                 }

                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên thương hiệu</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$show_brand = $brand->show_brand();
						  if($show_brand) {
						  	$i = 0;
						  	while($result = $show_brand->fetch_assoc()) {
						  		$i++;
						  	
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brand_name']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brand_id']; ?>">Sửa</a> || <a onclick="return confirm('Bạn muốn xóa thương hiệu này?')" href="?delid=<?php echo $result['brand_id']; ?>">Xóa</a></td>
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
<?php //include 'inc/footer.php';?>

