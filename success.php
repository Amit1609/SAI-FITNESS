<?php
$server="localhost";
$user="root";
$password="";
$dbname="admission";

$price = $_POST['price'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Address1 = $_POST['Address1'];
$Address2 = $_POST['Address2'];

echo "$price";

$conn = mysqli_connect($server,$user,$password,$dbname);

if(isset($_POST['submit']) && isset($_FILES['FileUpload'])){

	$img_name = $_FILES['FileUpload']['name'];
	$img_size = $_FILES['FileUpload']['size'];
	$tmp_name = $_FILES['FileUpload']['tmp_name'];
	$error = $_FILES['FileUpload']['error'];

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: success.php?error=$em");
        }
        else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 
            
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				
			}
            else {
				$em = "You can't upload files of this type";
		        header("Location: success.php?error=$em");
			}
		}
	}
	else {
		$em = "unknown error occurred!";
		header("Location: admission.html?error=$em");
	}

    $query = "insert into tables(price,FirstName,LastName,Email,Mobile,Address1,Address2,Image) values('$price','$FirstName','$LastName','$Email',$Mobile,'$Address1','$Address2','$new_img_name')";

    $run=mysqli_query($conn,$query) or die(mysqli_error("query error"));

    if($run){
        echo "data entered successfully";
    }
    else{
        echo "data not entered";
    }
}
else{
    header("Location: success.php");
}

<button type="submit" name="submit" class="btn-success" style="border-radius:5px;padding:7px;" >Proceed to Pay</button>
?>