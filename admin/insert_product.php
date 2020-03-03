<?php
	session_start();
    $db = mysqli_connect ('localhost','root','','ecom-web');
    
    if(isset($_POST['insertbtn'])){

        $pro_name = $_POST['pro_name'];
        $pro_cat = $_POST['pro_cat'];
        $cat = $_POST['cat'];
        $pro_price = $_POST['pro_price'];
        $pro_des = $_POST['pro_des'];
        $pro_key = $_POST['pro_key'];

        $image1 = $_FILES['pro_img1'] ['name'];
        $image2 = $_FILES['pro_img2'] ['name'];
        $image3 = $_FILES['pro_img3'] ['name'];
        $image4 = $_FILES['pro_img4'] ['name'];

        move_uploaded_file($_FILES["pro_img1"]["tmp_name"], "images/".$_FILES["pro_img1"]["name"]);
        move_uploaded_file($_FILES["pro_img2"]["tmp_name"], "images/".$_FILES["pro_img2"]["name"]);
        move_uploaded_file($_FILES["pro_img3"]["tmp_name"], "images/".$_FILES["pro_img3"]["name"]);
        move_uploaded_file($_FILES["pro_img4"]["tmp_name"], "images/".$_FILES["pro_img4"]["name"]);

        $sql = "INSERT INTO products(product_name, p_cat_id, cat_id, date, product_price, product_des, product_img1, product_img2, product_img3, product_img4, product_keyword)
        VALUES ('$pro_name', '$pro_cat', '$cat', NOW(),'$pro_price', '$pro_des', '$image1', '$image2', '$image3', '$image4', '$pro_key')";

        $run_product = mysqli_query($db, $sql);

        if($run_product){
            echo"<script>alert('Product has been inserted successfully')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-date">
                                <div class="form-group">
                                    <label>Product Title</label>
                                    <input class="au-input au-input--full" type="text" name="pro_name" placeholder="Product Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select class="au-input au-input--full" name="pro_cat">
                                        <option> Select a Category Product </option>
                                        <?php
                                            $get_p_cat = "select * from products_cat";
                                            $run_p_cat = mysqli_query($db, $get_p_cat);
                                            
                                            while($row_p_cat = mysqli_fetch_array($run_p_cat)){
                                                $p_cat_id = $row_p_cat['p_cat_id'];
                                                $p_cat_name = $row_p_cat['p_cat_name'];
                                                echo" <option value='$p_cat_id'> $p_cat_name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="au-input au-input--full" name="cat">
                                        <option> Select a Category</option>
                                        <?php
                                            $get_cat = "select * from categories";
                                            $run_cat = mysqli_query($db, $get_cat);
                                            
                                            while($row_cat = mysqli_fetch_array($run_cat)){
                                                $cat_id = $row_cat['cat_id'];
                                                $cat_name = $row_cat['cat_name'];
                                                echo" <option value='$cat_id'> $cat_name</option>";
                                            }
                                            
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product Image 1</label>
                                    <input class="au-input au-input--full" type="file" name="pro_img1" required>
                                </div>

                                <div class="form-group">
                                    <label>Product Image 2</label>
                                    <input class="au-input au-input--full" type="file" name="pro_img2">
                                </div>

                                <div class="form-group">
                                    <label>Product Image 3</label>
                                    <input class="au-input au-input--full" type="file" name="pro_img3">
                                </div>

                                <div class="form-group">
                                    <label>Product Image 4</label>
                                    <input class="au-input au-input--full" type="file" name="pro_img4">
                                </div>

                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input class="au-input au-input--full" type="text" name="pro_price" placeholder="Product Price" required>
                                </div>

                                <div class="form-group">
                                    <label>Product Keyword</label>
                                    <input class="au-input au-input--full" type="text" name="pro_key" placeholder="Product Keyword" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" cols="19" rows="6" name="pro_des" placeholder="Product Description"></textarea>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="insertbtn" type="submit">Insert Product</button>
                            </form>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>



    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
