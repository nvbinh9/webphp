<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../hlpers/format.php');
?>
<?php
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insertCustomer($data) {
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $password = mysqli_real_escape_string($this->db->link,md5($data['password']) );
        if($username == "" || $address == "" || $email == "" || $password == "" || $phone == "") {
            $alert = "<span > Thông tin chưa đầy đủ!</span>";
            return $alert;
        } else {
            $checkEmail = "SELECT * FROM customer WHERE email = '$email' LIMIT 1";
            $resultEmail = $this->db->select($checkEmail);
            if($resultEmail) {
                $alert = "<span > Email đã tồn tại</span>";
                return $alert;
            } else {
                $query = "INSERT INTO customer(username, password, address, phone, email) VALUES('$username', '$password', '$address', '$phone', '$email')";
                $result = $this->db->insert($query);

                if($result) {
                    $alert = "<span class = 'success'> Đăng ký tài khoản thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class = 'success'> Đăng ký tài khoản không thành công!</span>";
                    return $alert;
                }
            }
        }
    }

    public function loginCustomer($data) {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link,md5($data['password']) );
        if( $email == "" || $password == "" ) {
            $alert = "<span > Thông tin chưa đầy đủ!</span>";
            return $alert;
        } else {
            $checkEmail = "SELECT * FROM customer WHERE email = '$email' AND password = '$password' LIMIT 1";
            $resultEmail = $this->db->select($checkEmail);
            if($resultEmail != false) {
                $value = $resultEmail->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['customer_id']);
                Session::set('customer_name', $value['username']);
                header('Location:cart.php');

            } else {
                $alert = "<span > Thông tin đăng nhập không chính xác</span>";
                return $alert;

            }
            }
        }







}
?>