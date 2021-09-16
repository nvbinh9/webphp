<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../hlpers/format.php');
  ?>
 <?php
 class product 
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}

 	public function insert_product($data, $files) {
             // chống SQL Injection, mysqli_real_escape_string
 		     $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
              $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
              $category = mysqli_real_escape_string($this->db->link, $data['category']);
              $description = mysqli_real_escape_string($this->db->link, $data['description']);
              $price = mysqli_real_escape_string($this->db->link, $data['price']);
              $type = mysqli_real_escape_string($this->db->link, $data['type']);

              $permited = array('jpg', 'jpeg', 'png', 'gif');
              $file_name = $_FILES['image']['name'];
              $file_size = $_FILES['image']['size'];
              $file_temp = $_FILES['image']['tmp_name'];

              $div = explode('.', $file_name);
              $file_ext = strtolower(end($div));
              $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
              $uploaded_image = "uploads/".$unique_image;

 		if($productName == " " || $brand == " " || $category == " " || $description == " " || $price == " " || $type == " " || $file_name == " ") {
 			$alert = "<span class = 'success'> Thông tin chưa đầy đủ!</span>";
 			return $alert;
 		} else {
 		    move_uploaded_file($file_temp, $uploaded_image);
 			$query = "INSERT INTO product(product_name, category_id, brand_id, description, type, price, image) VALUES('$productName', '$category', '$brand', '$description', '$type', '$price', '$uploaded_image')";
 			$result = $this->db->insert($query);

 			if($result) {
 			  $alert = "<span class = 'success'> Thêm sản phẩm thành công!</span>";
 			  return $alert;
 			} else {
 			  $alert = "<span class = 'success'> Thêm sản phẩm không thành công!</span>";
 			  return $alert;
 			}
 		}
 	}

       public function show_product() {
              $query = "SELECT product.*, category.category_name, brand.brand_name
                        FROM product INNER JOIN category ON product.category_id = category.category_id
                        INNER JOIN brand ON product.brand_id = brand.brand_id
                        ORDER BY product.product_id DESC";
              // $query = "SELECT * FROM product order by product_id desc";
              $result = $this->db->select($query);
              return $result;
       }

       public function getProductById($id){
              $query = "SELECT * FROM product WHERE product_id = '$id'";
              $result = $this->db->select($query);
              return $result;
       }
   public function getProductByCategoryId($id){
     $query = "SELECT * FROM product WHERE category_id = '$id'";
     $result = $this->db->select($query);
     return $result;
   }
   public function getProductByBrandId($id){
     $query = "SELECT * FROM product WHERE brand_id = '$id'";
     $result = $this->db->select($query);
     return $result;
   }

       public function update_product($data,$files, $id) {

              $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
              $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
              $category = mysqli_real_escape_string($this->db->link, $data['category']);
              $description = mysqli_real_escape_string($this->db->link, $data['description']);
              $price = mysqli_real_escape_string($this->db->link, $data['price']);
              $type = mysqli_real_escape_string($this->db->link, $data['type']);

              $permited = array('jpg', 'jpeg', 'png', 'gif');
              $file_name = $_FILES['image']['name'];
              $file_size = $_FILES['image']['size'];
              $file_temp = $_FILES['image']['tmp_name'];

              $div = explode('.', $file_name);
              $file_ext = strtolower(end($div));
              $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
              $uploaded_image = "uploads/".$unique_image;

              if($productName == " " || $brand == " " || $category == " " || $description == " " || $price == " " || $type == " ") {
                     $alert = "<span class = 'success'> Thông tin chưa đầy đủ!</span>";
                     return $alert;
              } else {
                     move_uploaded_file($file_temp, $uploaded_image);
                     $query = "UPDATE product SET product_name = '$productName', brand_id = '$brand', category_id = '$category',
                     description = '$description', price = '$price', type = '$type', image = '$uploaded_image'
                     WHERE product_id = '$id' ";
                     $result = $this->db->update($query);

                     if($result) {
                            $alert = "<span class = 'success'> Sửa sản phẩm thành công!</span>";
                            return $alert;
                     } else {
                            $alert = "<span class = 'success'> Sửa sản phẩm không thành công!</span>";
                            return $alert;
                     }
              }
       }

       public function delete_product($id) {
              $query = "DELETE FROM product WHERE product_id = '$id'";
              $result = $this->db->delete($query);
              if($result) {
                     $alert = "<span> Xóa sản phẩm thành công!</span>";
                     return $alert;
              } else {
                      $alert = "<span> Xóa sản phẩm không thành công!</span>";
                     return $alert;
                     }
       }

       public function getProductByType() {
         $query = "SELECT * FROM product WHERE type = '2'";
         $result = $this->db->select($query);
         return $result;
       }

       public function getProductByIdNew() {
        $query = "SELECT * FROM product ORDER BY product_id DESC LIMIT 4";
        $result = $this->db->select($query);
         return $result;
       }

       public function getProductDetailsById($id) {
         $query = "SELECT product.*, category.category_name, brand.brand_name
                        FROM product INNER JOIN category ON product.category_id = category.category_id
                        INNER JOIN brand ON product.brand_id = brand.brand_id
                        WHERE product_id = '$id'";
         $result = $this->db->select($query);
         return $result;
       }
 }
 ?>