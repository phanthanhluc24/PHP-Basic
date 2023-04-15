
<?php
include "./Connect.php";

// $ket_noi = "SELECT * from user";
// $data = mysqli_query($Reference, $ket_noi);
        
// while ($getdata = mysqli_fetch_assoc($data)) {
   
// }
function get_current_user_id(){
    
}

$Ket_noi = "SELECT * From products";
$Data = mysqli_query($Reference, $Ket_noi);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <link rel="stylesheet" href="./san_pham.css">
    <link rel="stylesheet" href="./Content.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Mr.Lực</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="./Product.php">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="./Gio_hang_User.php">CART</a></li>
                    <li><a href="#">ACCOUNT</a></li>
                 
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>

        </div> 
       
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
<div class="products">
    <?php

    while ($Getdata = mysqli_fetch_assoc($Data)) {
    ?>

<div class="product">
                <div class="image">
                    <img src="<?php echo $Getdata['Img'] ?>" alt="">
                </div>
                <div class="namePrice">
                    <h3><?php echo $Getdata['Title'] ?></h3>
                    <span><?php echo $Getdata['Price'] ?></span>
                </div>
                <div class="bay">
                    <button><a href="./User_Shopping.php?buy_now=<?php echo $Getdata['ID_products'] ?>"> Buy Now </a></button>
                </div>
            </div>

    <?php

    }

    $getCount="SELECT * from gio_hang";
    $fetch_data=mysqli_query($Reference,$getCount);
    $print_data=mysqli_num_rows($fetch_data);
    echo $print_data;
    ?>
</div>
