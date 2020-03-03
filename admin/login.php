<?php  
    session_start();
    include('include/head.inc');

        if(isset($_SESSION["username"]))
        {
            header("location:index.php");
        }

    $db = mysqli_connect("localhost", "root", "", "ecom-web");  

        if(isset($_POST["loginbtn"]))   
        {  
            if(!empty($_POST["m_username"]) && !empty($_POST["m_password"]))
            {
                $username = mysqli_real_escape_string($db, $_POST["m_username"]);
                $password = md5(mysqli_real_escape_string($db, $_POST["m_password"]));
                $sql = "SELECT * FROM admin_register WHERE ad_username = '" . $username . "' AND ad_password = '" . $password . "'";  
                $result = mysqli_query($db,$sql);
                $user = mysqli_fetch_array($result);
                
                if($user)   
                {  
                    if(!empty($_POST["remember"]))   
                    {  
                        setcookie ("m_login",$username,time()+ (10 * 365));  
                        setcookie ("m_password",$password,time()+ (10 * 365));
                        $_SESSION["username"] = $username;
                    }  
                    else  
                    {  
                        if(isset($_COOKIE["m_login"]))   
                        {  
                            setcookie ("m_login","");  
                        }  
                        if(isset($_COOKIE["m_password"]))   
                        {  
                            setcookie ("m_password","");  
                        }  
                    }  
                    header("location:index.php"); 
                }  
                else  
                {  
                    $message = "Invalid Login";  
                } 
            }
            else
            {
                $message = "Both are Required Fields";
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
                                <?php
                                    if(isset($message)){

                                        echo $message;
                                    }
                                ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="m_username" value="<?php if(isset($_COOKIE["m_login"])) {echo $_COOKIE["m_login"]; } ?>" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="m_password" value="<?php if(isset($_COOKIE["m_password"])) {echo $_COOKIE["m_password"]; } ?>" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                <input type="checkbox" name="remember" <?php if(isset($_COOKIE["m_login"])){?> checked <?php }?>>Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="loginbtn" type="submit">sign in</button>
                               
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register.php">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php
    include('include/footer.inc');
?>