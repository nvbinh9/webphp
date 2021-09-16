<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../hlpers/format.php');
  ?>
 <?php
 class category 
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}

 	public function insert_category($catName) {
 		$catName = $this->fm->validation($catName);

             // chống SQL Injection, mysqli_real_escape_string
 		$catName = mysqli_real_escape_string($this->db->link, $catName);

 		if(empty($catName)) {
 			$alert = "<span class = 'success'> Bạn chưa điền thông tin!</span>";
 			return $alert;
 		} else {
 			$query = "INSERT INTO category(category_name) VALUES('$catName')";
 			$result = $this->db->insert($query);

 			if($result) {
                            $alert = "<span class = 'success'> Thêm danh mục thành công!</span>";
                            return $alert;
                     } else {
                            $alert = "<span class = 'success'> Thêm danh mục không thành công!</span>";
                            return $alert;
                     }
 		}
 	}

       public function show_category() {
              $query = "SELECT * FROM category order by category_id desc";
              $result = $this->db->select($query);
              return $result;
       }

       public function getCatById($id){
              $query = "SELECT * FROM category WHERE category_id = '$id'";
              $result = $this->db->select($query);
              return $result;
       }



       public function update_category($catName, $id) {
              $catName = $this->fm->validation($catName);

             // chống SQL Injection, mysqli_real_escape_string
              $catName = mysqli_real_escape_string($this->db->link, $catName);
              $id = mysqli_real_escape_string($this->db->link, $id);


              if(empty($catName)) {
                     $alert = "<span class = 'success'> Bạn chưa điền thông tin!</span>";
                     return $alert;
              } else {
                     $query = "UPDATE category SET category_name = '$catName' WHERE category_id = '$id'";
                     $result = $this->db->update($query);

                     if($result) {
                            $alert = "<span class = 'success'> Sửa danh mục thành công!</span>";
                            return $alert;
                     } else {
                            $alert = "<span class = 'success'> Sửa danh mục không thành công!</span>";
                            return $alert;
                     }
              }
       }

       public function delete_category($id) {
              $query = "DELETE FROM category WHERE category_id = '$id'";
              $result = $this->db->delete($query);
              if($result) {
                     $alert = "<span class = 'success'> Xóa danh mục thành công!</span>";
                     return $alert;
              } else {
                      $alert = "<span class = 'success'> Xóa danh mục không thành công!</span>";
                     return $alert;
                     }
       }
 }
 ?>