
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

    $Pick_user="SELECT * From user";
    $Data_user=mysqli_query($Reference,$Pick_user);
    ?>

    <table border="1px">
        <tr>
            <th>STT</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        
            <?php
            while ($Row=mysqli_fetch_assoc($Data_user)) {
                ?>
                <tr>
                <td><?php echo $Row['ID_User'] ?></td>
                <td><?php echo $Row['Full_name']?></td>
                <td><?php echo $Row['Email']?></td>
                <td><a class="none_style" href="./Manager_User.php?delete=<?php echo $Row['ID_User'] ?>">Delete</a> </td> 
                </tr>
                <?php

            }
            ?>

        
    </table>

    <?php
        if(isset($_GET['delete'])){
            $delete=$_GET['delete'];
            if($delete){
                $Reference->query("DELETE from user where ID_User =$delete");
                echo "<script> alert('Xóa thành công') </script>";
                header("location:Manager_User.php");
            }else{
                echo "<script> alert('Xóa không thành công') </script>";
            }
        }