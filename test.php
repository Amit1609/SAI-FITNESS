<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
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

    <script type="text/javascript">
        function PrintDiv() {
                var backup = document.body.innerHTML;
                var divContents = document.getElementById("parent").innerHTML;
                document.body.innerHTML = divContents;
                window.print();
                document.body.innerHTML = backup;
        }
    </script>
</head>
<body>
<?php
#passing database details as variable
$server="localhost";
$user="root";
$password="";
$dbname="admission";

#accepting data from the payment page
$price = $_POST['price'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Address1 = $_POST['Address1'];
$Address2 = $_POST['Address2'];
$img_name=$_POST['img_name'];
$img_size=$_POST['img_size'];
$tmp_name=$_POST['tmp_name'];
$error=$_POST['error'];
$new_img_name = $_POST['new_img_name'];

$conn=mysqli_connect($server,$user,$password,$dbname);

if(isset($_POST['submit'])){

    $query = "insert into tables(price,FirstName,LastName,Email,Mobile,Address1,Address2,Image) values('$price','$FirstName','$LastName','$Email',$Mobile,'$Address1','$Address2','$new_img_name')";
    
    $run=mysqli_query($conn,$query) or die(mysqli_error("query error"));

    if($run){
        echo "<script>alert('Addmission is Successfull, please download your payment reciept');</script>" ;
    }
    else{
        echo "data not entered";
    }
}
else{
    echo "<script>alert('Try Again')</script>";
    
}
?>
<div class="container" id="parent">
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
<div class="container">
<button id="download" class="btn" onclick="PrintDiv()" name="download" style="border-radius:5px;padding:7px;background-color:dodgerblue;color:white;font-weight:700;border:2px solid black;">Download</button>
</div>
</body>
</html>