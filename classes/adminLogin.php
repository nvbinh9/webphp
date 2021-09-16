<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
Session::checkLogin();

include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../hlpers/format.php');

  ?>
 <?php
 class adminLogin 
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}

 	public function login_admin($adminUser, $adminPass) {
 		$adminUser = $this->fm->validation($adminUser);
 		$adminPass = $this->fm->validation($adminPass);

        // chống SQL Injection, mysqli_real_escape_string
 		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
 		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

 		if(empty($adminUser) || empty($adminPass)) {
 			$alert = "Username và Password không thể trống!";
 			return $alert;
 		} else {
 			$query = "SELECT * FROM admin WHERE username = '$adminUser' AND password = '$adminPass' LIMIT 1";
 			$result = $this->db->select($query);

 			if($result != false) {
 				//fetch_assoc: lấy ra kết quả
 				$value = $result->fetch_assoc();
 				Session::set('adminlogin', true);
 				Session::set('adminId', $value['admin_id']);
 				Session::set('adminUser', $value['username']);
 				Session::set('adminName', $value['admin_name']);
 				header('Location:index.php');
 			} else {
 				$alert = "Username và Password không đúng";
 				return $alert;
 			}
 		}


 	}

 	public function admin_check() {

 	}
 }
 ?>