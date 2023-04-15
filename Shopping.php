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
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>

<?php
    include "./Connect.php";
    $Pick_user="SELECT Title,Img,Price,Full_name from gio_hang,user,products where gio_hang.ID_User=user.ID_User and gio_hang.ID_Products=products.ID_Products";
    $Data_user=mysqli_query($Reference,$Pick_user);
?>
<table border="1px">
    <tr>
        <th>Tilte</th>
        <th>Img</th>
        <th>Price</th>
        <th>User_Name</th>
    </tr>
    <?php
    while ($Getdata=mysqli_fetch_assoc($Data_user)) {
        ?>
        <tr>
            <td><?php echo $Getdata['Title']?></td>
            <td ><img class="item" src="<?php echo $Getdata['Img']?>" alt=""></td>
            <td><?php echo $Getdata['Price']?></td>
            <td><?php echo $Getdata['Full_name']?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>