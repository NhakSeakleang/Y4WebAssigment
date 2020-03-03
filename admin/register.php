<?php
    session_start();
    include('include/head.inc');
	$db = mysqli_connect ('localhost','root','','ecom-web');
	
	if(isset($_POST['registerbtn'])){
		
		$username =$_POST['username'];
		$email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        
	
		if($password == $rpassword) {
			$password = md5($password);
			$sql = "INSERT INTO admin_register(ad_username, ad_email, ad_phone, ad_address, ad_password) VALUES ('$username', '$email', '$phone', '$address', '$password')";
			$sql_run = mysqli_query($db, $sql);
			$_SESSION['message'] = "You are already registered.";
			header("location: admin.php");
		}
		else{
			$_SESSION['message'] = "Failed Register.";
		}
	}
?>


<body class="animsition">
    <div class="page-wrapper">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="au-input au-input--full" type="text" name="phone" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
								<div class="form-group">
                                    <label>Retype Password</label>
                                    <input class="au-input au-input--full" type="password" name="rpassword" placeholder="Retype-Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" name="registerbtn" type="submit">register</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<?php
    include('include/footer.inc');
?>