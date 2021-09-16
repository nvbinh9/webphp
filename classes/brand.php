<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/database.php');
 include_once ($filepath.'/../hlpers/format.php');

  ?>
 <?php
 class brand 
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}

 	public function insert_brand($brandName) {
 		$brandName = $this->fm->validation($brandName);

             // chống SQL Injection, mysqli_real_escape_string
 		$brandName = mysqli_real_escape_string($this->db->link, $brandName);

 		if(empty($brandName)) {
 			$alert = "<span class = 'success'> Bạn chưa điền thông tin!</span>";
 			return $alert;
 		} else {
 			$query = "INSERT INTO brand(brand_name) VALUES('$brandName')";
 			$result = $this->db->insert($query);

 			if($result) {
                            $alert = "<span class = 'success'> Thêm thương hiệu thành công!</span>";
                            return $alert;
                     } else {
                            $alert = "<span class = 'success'> Thêm thương hiệu không thành công!</span>";
                            return $alert;
                     }
 		}
 	}

       public function show_brand() {
              $query = "SELECT * FROM brand order by brand_id desc";
              $result = $this->db->select($query);
              return $result;
       }

       public function getBrandById($id){
              $query = "SELECT * FROM brand WHERE brand_id = '$id'";
              $result = $this->db->select($query);
              return $result;

       }



       public function update_brand($brandName, $id) {
              $brandName = $this->fm->validation($brandName);

             // chống SQL Injection, mysqli_real_escape_string
              $brandName = mysqli_real_escape_string($this->db->link, $brandName);
              $id = mysqli_real_escape_string($this->db->link, $id);


              if(empty($brandName)) {
                     $alert = "<span class = 'success'> Bạn chưa điền thông tin!</span>";
                     return $alert;
              } else {
                     $query = "UPDATE brand SET brand_name = '$brandName' WHERE brand_id = '$id'";
                     $result = $this->db->update($query);

                     if($result) {
                            $alert = "<span class = 'success'> Sửa thương hiệu thành công!</span>";
                            return $alert;
                     } else {
                            $alert = "<span class = 'success'> Sửa thương hiệu không thành công!</span>";
                            return $alert;
                     }
              }
       }

       public function delete_brand($id) {
              $query = "DELETE FROM brand WHERE brand_id = '$id'";
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