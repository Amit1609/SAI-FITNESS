<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sai Fitness | Payments</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style type="text/css">
        .lbl{
            font-weight:900;
            font-size:large;
        }
    </style>
</head>
<body>
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/lognew112.jpg" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li class="active"><a href="./admission.html">Admission</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <?php
        if(isset($_POST['submit']))
        {
            $price = $_POST['price'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Email = $_POST['Email'];
            $Mobile = $_POST['Mobile'];
            $Address1 = $_POST['Address1'];
            $Address2 = $_POST['Address2'];

            if(isset($_POST['submit']) && isset($_FILES['FileUpload'])){
                $img_name = $_FILES['FileUpload']['name'];
                $img_size = $_FILES['FileUpload']['size'];
                $tmp_name = $_FILES['FileUpload']['tmp_name'];
                $error = $_FILES['FileUpload']['error'];

                if ($error === 0) {
                    if ($img_size > 125000) {
                        echo "<script>alert('Sorry your file size is too large,please go back and upload a different image');</script>";
                    }
                    else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("jpg", "jpeg", "png"); 
                        
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'uploads/'.$new_img_name;
	                        move_uploaded_file($tmp_name, $img_upload_path);

                        }
                        else {
                            echo "<script>alert('You cant upload files of this type,upload only jpg,png or jpeg file');</script>";
                        }
                    }
                }
                else {
                    echo "<script>alert('Unknown Error Occured');</script>";
                }
            }
        }
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="schedule-table"  style="background-image:url('img/formback.jpg');">
                <form action="test.php" method="POST" style="text-align:center;"><br />
                    <div class="container">
                        <img src="img/lognew112.jpg" alt="logo">
                    </div><br />
                    <table class="table">
                        <thead class="thead-dark">
                            <b>PREVIEW</b>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NAME:</td>
                                <td><?php echo "$FirstName $LastName" ?>
                                <input type="hidden" name="FirstName" value="<?php echo "$FirstName" ?>">
                                <input type="hidden" name="LastName" value="<?php echo "$LastName" ?>">
                            </td>
                            </tr>
                            <tr>
                                <td>EMAIL:</td>
                                <td><?php echo "$Email" ?><input type="hidden" name="Email" value="<?php echo "$Email" ?>"></td>
                            </tr>
                            <tr>
                                <td>MOBILE:</td>
                                <td><?php echo "$Mobile" ?><input type="hidden" name="Mobile" value="<?php echo "$Mobile" ?>"></td>
                            </tr>
                            <tr>
                                <td>ADDRESS:</td>
                                <td>
                                    <?php echo "$Address1,$Address2" ?>
                                    <input type="hidden" name="Address1" value="<?php echo "$Address1" ?>">
                                    <input type="hidden" name="Address2" value="<?php echo "$Address2" ?>">
                                </td>
                            </tr>
                            <tr>
                                <td> <label class="lbl" style="color:red;">Total Amount to be Paid</label></td>
                                <td>
                                    <label class="lbl" name="price" style="color:green;"><?php echo "₹ $price" ?><input type="hidden" name="price" value="<?php echo "$price" ?>"></label>
                                    <input type="hidden" name="img_name" value="<?php echo "$img_name" ?>">
                                    <input type="hidden" name="img_size" value="<?php echo "$img_size" ?>">
                                    <input type="hidden" name="tmp_name" value="<?php echo "$tmp_name" ?>">
                                    <input type="hidden" name="error" value="<?php echo "$error" ?>">
                                    <input type="hidden" name="new_img_name" value="<?php echo "$new_img_name" ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><button class="btn-success" name="submit" style="border-radius:5px;padding:7px;">Proceed</button></td>
                                <td><button class="btn-danger" style="border-radius:5px;padding:7px;"><a style="color:white" href="index.html">Cancel</a></button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer-section">
        <div class="register normal-register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#" target="_blank">Sai Fitness</a>

                        </div>
                        <div class="footer-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>