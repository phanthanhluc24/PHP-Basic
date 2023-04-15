
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
    $Pick_user="SELECT ID_Gio_Hang,Title,Img,Price,products.ID_Products from products,gio_hang where products.ID_Products=gio_hang.ID_Products";
    $Data_user=mysqli_query($Reference,$Pick_user);
?>
<table border="1px">
    <tr>
        <th>Tilte</th>
        <th>Img</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php
    while ($Getdata=mysqli_fetch_assoc($Data_user)) {
        ?>
        <tr>
            <td><?php echo $Getdata['Title']?></td>
            <td ><img class="item" src="<?php echo $Getdata['Img']?>" alt=""></td>
            <td><?php echo $Getdata['Price']?></td>
            <td><a class="none_style" href="./Gio_hang_User.php?delete=<?php echo $Getdata['ID_Gio_Hang'] ?>">Delete</a> 
            <a class="none_style" href="./User_Shopping.php?buy_now=<?php echo $Getdata['ID_Products'] ?>">Buy Now</a></td>
        </tr>
        <?php
    }
    ?>
</table>

<?php
if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    if($delete){
    $Reference->query("DELETE From gio_hang where ID_Gio_Hang=$delete");
    echo "<script> alert('Delete succee') </script>";
    header("location:Gio_hang_User.php");   
    }else{
        echo "<script> alert('Xóa thất bại') </script>";
    }
   
}

?>

    
