<?php
    session_start();
    include('include/head.inc');
    $db = mysqli_connect ('localhost','root','','ecom-web');
    $sql = "SELECT * FROM admin_register";
    $sql_run = mysqli_query($db, $sql);
?>

<head>
	<title>Admin</title>
</head>

<body class="animsition">
    <div class="page-wrapper">

<?php
  include('include/sidebar.inc');
?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">

<?php
  include('include/header.inc');
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="table-responsive m-b-40">

                    <div class="fc-left">
                        <h3 style="padding:10px 0px;">Admin Page</h3>
                    </div>
                    <a style="float:right;" href="register.php" ><button class="au-btn au-btn--blue m-b-20" name="addAdmin" type="submit">Add Admin</button></a>
                            
                    <table class="table table-borderless table-data3 cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>ADDRESS</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(mysqli_num_rows($sql_run)>0){
                                while($row = mysqli_fetch_assoc($sql_run))
                            {
                        ?>
                            <tr>
                                <td><?php echo $row['ad_id'];?></td>
                                <td><?php echo $row['ad_username'];?></td>
                                <td><?php echo $row['ad_email'];?></td>
                                <td><?php echo $row['ad_phone'];?></td>
                                <td><?php echo $row['ad_address'];?></td>
                                <td>
                                <form action="register_edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['ad_id'];?>">
                                    <button class="au-btn au-btn--green m-b-20" name="registereditbtn" type="submit">Edit</button>
                                </form>
                                </td>
                                <td>
                                <form action="register_delete.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['ad_id'];?>">
                                    <button class="au-btn au-btn--blue m-b-20" name="registerdeletebtn" type="submit">Delete</button>
                                </form>
                                </td>
                            </tr>
                            <?php
                            }
                            }
                            else{
                                echo "No Record Found";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
  include('include/footer.inc');
?>