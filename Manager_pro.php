
<link rel="stylesheet" href="./Content.css">
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <link rel="stylesheet" href="./san_pham.css">
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

$Pick_user="SELECT * From products";
$Data_user=mysqli_query($Reference,$Pick_user);


?>
<table border="1px">
    <tr>
        <th>Title</th>
        <th>Img</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
  
        <?php
            while($Getdata=mysqli_fetch_assoc($Data_user)) {
                ?>
                  <tr>
                <td><?php echo $Getdata['Title'] ?></td>
                <td><img class="item" src="<?php  echo $Getdata['Img'] ?>" alt=""></td>
                <td><?php echo $Getdata['Price'] ?></td>
                <td><?php echo $Getdata['Quantity'] ?></td>
                <td><a class="none_style" href="./Manager_pro.php?delete=<?php echo $Getdata['ID_Products'] ?>">Delete</a> 
                <a class="none_style" href="./Admin.php?update=<?php echo $Getdata['ID_Products'] ?>">Edit</a></td>
                </tr>
    <?php
}
?>
  
</table>


<?php
        if(isset($_GET['delete'])){
            $delete=$_GET['delete'];
            if($delete){
            $Reference->query("DELETE From products,gio_hang where products.ID_Products=$delete and products.ID_Products=gio_hang.ID_Products");
            echo "<script> alert('Delete succee') </script>";
            header("location:Manager_pro.php");   
            }else{
                echo "<script> alert('Xóa thất bại') </script>";
            }
           
        }

      
        
?>
</body>