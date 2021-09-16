<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../hlpers/format.php');
  ?>
 <?php
 class cart 
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}

 	public function addProductToCart($quantity, $id) {
      $quantity = $this->fm->validation($quantity);
      $quantity = mysqli_real_escape_string($this->db->link, $quantity);
      $id = mysqli_real_escape_string($this->db->link, $id);
      $sessionId = session_id();

      $querySelect = "SELECT * FROM product WHERE product_id = '$id'";
      $result = $this->db->select($querySelect)->fetch_assoc();

      $productName = $result['product_name'];
      $productId = $result['product_id'];
      $image = $result['image'];
      $price = $result['price'];

      $queryInsert = "INSERT INTO cart(product_name, product_id, session_id, quantity, price, image) VALUES('$productName', '$productId', '$sessionId', '$quantity', '$price', '$image')";
      $insertCart = $this->db->insert($queryInsert);

      if($insertCart) {
        header('Location:cart.php');

      } else {
        header('Location:404.php');
      }
    }

   public function getAll() {
     $query = "SELECT * FROM cart order by cart_id desc";
     $result = $this->db->select($query);
     return $result;
   }

   public function deleteCartById($id) {
     $query = "DELETE FROM cart WHERE cart_id = '$id'";
     $result = $this->db->delete($query);
     if($result) {
       $alert = "<span class = 'success'> Xóa sản thành công!</span>";
       return $alert;
     } else {
       $alert = "<span class = 'success'> Xóa sản phẩm không thành công!</span>";
       return $alert;
     }
   }

 	
 }
 ?>