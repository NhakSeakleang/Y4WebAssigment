<?php
    session_start();
    include('include/head.inc');
	$db = mysqli_connect ('localhost','root','','ecom-web');
	if(isset($_POST['registerupdatebtn'])){
		
		$id = $_POST['edit_id'];
		$username = $_POST['edit_username'];
		$email = $_POST['edit_email'];
        $phone = $_POST['edit_phone'];
        $address = $_POST['edit_address'];
        $password = $_POST['edit_password'];
		$rpassword = $_POST['edit_rpassword'];

		if($password == $rpassword) {
			$password = md5($password);
			$sql = "UPDATE admin_register SET ad_username='$username', ad_email='$email', ad_phone='$phone', ad_password='$password', ad_address='$address' WHERE ad_id='$id' ";
			$sql_run = mysqli_query($db, $sql);
			$_SESSION['message'] = "You are already registered.";
			header("location: admin.php");
		}
		else{
			$_SESSION['message'] = "Failed Register.";
			header("location: admin.php");

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
<?php

if(isset($_POST['registereditbtn'])){
    $id=$_POST['edit_id'];

    $sql="SELECT * FROM admin_register WHERE ad_id='$id' ";
    $sql_run = mysqli_query($db, $sql);

    foreach($sql_run as $row){
        ?>
                    <form action="register_edit.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['ad_id'] ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="au-input au-input--full" type="text" name="edit_username" value="<?php echo $row['ad_username']?>" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" type="email" name="edit_email" value="<?php echo $row['ad_email']?>" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="au-input au-input--full" type="text" name="edit_phone" value="<?php echo $row['ad_phone']?>" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="au-input au-input--full" type="text" name="edit_address" value="<?php echo $row['ad_address']?>" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="edit_password" value="<?php echo $row['ad_password']?>" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Retype Password</label>
                            <input class="au-input au-input--full" type="password" name="edit_rpassword" placeholder="Retype Password">
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" name="registerupdatebtn" type="submit">Update</button>
                        <a href = "admin.php" class="au-btn au-btn--block au-btn--green m-b-20">Cancel</a>
                    </form>
        <?php
    }
}

?>
                        
                    </div>
            </div>
        </div>
    </div>

<?php
    include('include/footer.inc');
?>