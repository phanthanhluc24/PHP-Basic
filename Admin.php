<?php
    include "./Connect.php";
    error_reporting(0);
    if(isset($_POST['submit'])){
        $Title=$_POST['Name'];
        $Img=$_POST['Img'];
        $Price=$_POST['Price'];
        $Quantity=$_POST['Quantity'];

        if($Title!="" && $Img !="" && $Price!=" " && $Quantity !=""){
          if($Reference->query("INSERT into products (Title,Img,Price,Quantity) values ('$Title','$Img','$Price','$Quantity')")){
            echo "<script>alert('Thêm thành công')</script>";
            header("location:Product.php");
          }else{
            echo "<script>alert('Thêm không thành công')</script>";
          }  
        }
    }

    if(isset($_GET['update'])){
        $update=$_GET['update'];
        $truy_van=("SELECT * from products where ID_Products=$update");
        $data=mysqli_query($Reference,$truy_van);
        if($data){
            $row=$data->fetch_array();
            $Title=$row['Title'];
        $Img=$row['Img'];
        $Price=$row['Price'];
        $Quantity=$row['Quantity'];
        }
    }
?>
<link rel="stylesheet" href="./Content.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <link rel="stylesheet" href="./san_pham.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Mr.Lực</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="./Admin.php">HOME</a></li>
                    <li><a href="./Manager_User.php">MANAGER USER</a></li>
                    <li><a href="./Manager_pro.php">MANAGER PRODUCTS</a></li>
                    <li><a href="./Shopping.php">MANAGER ODERS</a></li>
                 
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>

        </div> 
       
    </div>

    <div class="">  
			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Add Product</label>
					<input type="text" name="Name" placeholder="Title" required="" value="<?php echo $Title ?>">
					<input type="text" name="Img" placeholder="Image" required="" value="<?php echo $Img ?>">
					<input type="number" name="Price" placeholder="Price" required="" value="<?php echo $Price ?>">
          <input type="number" name="Quantity" placeholder="Quantity" required="" value="<?php echo $Quantity ?>">
					<button name="submit">POST</button>
				</form>
			</div>
	</div>
    
  
</body>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
