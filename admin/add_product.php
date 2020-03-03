<?php
    session_start();
    include('include/head.inc');
    $db = mysqli_connect ('localhost','root','','ecom-web');
    
    if(isset($_POST['proinsertbtn'])){

        $title = $_POST['title'];
        $cat = $_POST['cat'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $avai = $_POST['avai'];
        $des = $_POST['des'];
        $key = $_POST['key'];

        $image1 = $_FILES['image1'] ['name'];
        $image2 = $_FILES['image2'] ['name'];
        $image3 = $_FILES['image3'] ['name'];
        $image4 = $_FILES['image4'] ['name'];

        move_uploaded_file($_FILES["image1"]["tmp_name"], "images/".$_FILES["image1"]["name"]);
        move_uploaded_file($_FILES["image2"]["tmp_name"], "images/".$_FILES["image2"]["name"]);
        move_uploaded_file($_FILES["image3"]["tmp_name"], "images/".$_FILES["image3"]["name"]);
        move_uploaded_file($_FILES["image4"]["tmp_name"], "images/".$_FILES["image4"]["name"]);

        $sql = "INSERT INTO products(cat_id, type_id, date, pro_title, pro_price, available_id, pro_des, pro_img1, pro_img2, pro_img3, pro_img4, pro_keyword) VALUES ('$cat', '$type', NOW(), '$title', '$price', '$avai', '$des', '$image1', '$image2', '$image3', '$image4', '$key')";
        $sql_run = mysqli_query($db, $sql);
    }
?>
<head>
	<title>Add Product</title>
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
                                    <input class="au-input au-input--full" type="text" name="title" placeholder="Product Title" required>
                                </div>

                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select class="au-input au-input--full" name="cat">
                                        <option> Select a Category</option>
                                        <?php
                                            $sql = "SELECT * FROM pro_category";
                                            $sql_run = mysqli_query($db, $sql);
                                            
                                            while($row_pro_cat = mysqli_fetch_array($sql_run)){
                                                $cat_id = $row_p_cat['cat_id'];
                                                $cat_name = $row_p_cat['cat_name'];
                                                echo" <option value='$cat_id'> $cat_name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select class="au-input au-input--full" name="type">
                                        <option> Select a Type</option>
                                        <?php
                                            $sql = "SELECT * FROM pro_type";
                                            $sql_run = mysqli_query($db, $sql);
                                            
                                            while($row_cat = mysqli_fetch_array($sql_run)){
                                                $type_id = $row_cat['type_id'];
                                                $type_name = $row_cat['type_name'];
                                                echo" <option value='$type_id'> $type_name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product Available</label>
                                    <select class="au-input au-input--full" name="avai">
                                        <option> Select a Available</option>
                                        <?php
                                            $sql = "SELECT * FROM pro_avai";
                                            $sql_run = mysqli_query($db, $sql);
                                            
                                            while($row_cat = mysqli_fetch_array($sql_run)){
                                                $type_id = $row_cat['available_id'];
                                                $type_name = $row_cat['available_name'];
                                                echo" <option value='$available_id'> $available_name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input class="au-input au-input--full" type="text" name="price" placeholder="Product Price" required>
                                </div>

                                <div class="form-group">
                                    <label>Product Image 1</label>
                                    <input class="au-input au-input--full" type="file" name="image1" required>
                                </div>

                                <div class="form-group">
                                    <label>Product Image 2</label>
                                    <input class="au-input au-input--full" type="file" name="image2">
                                </div>

                                <div class="form-group">
                                    <label>Product Image 3</label>
                                    <input class="au-input au-input--full" type="file" name="image3">
                                </div>

                                <div class="form-group">
                                    <label>Product Image 4</label>
                                    <input class="au-input au-input--full" type="file" name="image4">
                                </div>

                                <div class="form-group">
                                    <label>Product Keyword</label>
                                    <input class="au-input au-input--full" type="text" name="key" placeholder="Product Keyword" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" cols="19" rows="6" name="des" placeholder="Product Description"></textarea>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="proinsertbtn" type="submit">Insert Product</button>
                            </form>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
<?php
  include('include/footer.inc');
?>