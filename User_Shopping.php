<link rel="stylesheet" href="./Content.css">
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

<?php
include "./Connect.php";
if (isset($_GET['buy_now'])) {
    $id = $_GET['buy_now']; // Lấy sản phẩm ID của giỏ hàng
    $ket_noi = "SELECT * from products where ID_products=$id"; // Lấy ID của sản phẩm
    $data = mysqli_query($Reference, $ket_noi); // Kết nối

    $ket_noi_user = "SELECT ID_User from user"; // Lấy Id của người dùng hiện tại
    $data_user = mysqli_query($Reference, $ket_noi_user);
    $getdata_user = mysqli_fetch_assoc($data_user);

?>
    <div class="container_pay_ment">
        <?php
        if ($data) {
            $getdata=$data->fetch_array()
        ?>
            <div class="container_img">
                <img class="item" src="<?php echo $getdata['Img'] ?>" alt="">
            </div>
            <div>
                <h5><?php echo $getdata['Title'] ?></h5>
                <p><?php echo $getdata['Price'] ?></p>
                <input style="width:60px" type="number" value="1" name="Quantity"> <br><br>
                <button><a href="">Thanh Toán</a></button> <button><a href="./Add_Shoping.php?shoping=<?php echo $getdata['ID_products'] ?>">Thêm vào giỏ hàng</a></button>
            </div>

            <?php
            }
        }
    
        ?>
    </div>


