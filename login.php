<?php 
include 'web/header.php';
//include 'web/slider.php';
 ?>
<?php
$loginCheck = Session::get('customer_login');
if($loginCheck) {
    header('Location:cart.php');
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertCustomer = $customer->insertCustomer($_POST);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $loginCustomer = $customer->loginCustomer($_POST);
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
             <?php
             if(isset($loginCustomer)) {
                 echo $loginCustomer;
             }
             ?>
        	<form action="" method="post" >
                	<input  type="text" name="email" placeholder="email" class="field" >
                    <input  type="password" name="password" placeholder="password" class="field" >

                    <div class="buttons"><div><input type="submit" name="login"  value="Đăng nhập"></div></div>
            </form>
                    </div>

    	<div class="register_account">
    		<h3>Đăng ký</h3>
            <?php
            if(isset($insertCustomer)) {
                echo $insertCustomer;
            }
            ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="username" placeholder="Username"  >
							</div>

							<div>
								<input type="text" name="email" placeholder="E-Mail" >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address" >
						</div>
	
		           <div>
		          <input type="text"name="phone" placeholder="Phone" >
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Password" >
				</div>
		    	</td>
		    </tr> 
		    </tbody></table>
		   <div class="search"><div><input type="submit" name="submit"  value="Tạo tài khoản"></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
//include 'web/footer.php';
 ?>