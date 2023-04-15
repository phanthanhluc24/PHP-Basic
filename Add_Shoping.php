<?php
    include "./Connect.php";
    if(isset($_GET['shoping'])){
        $id=$_GET['shoping']; // Lấy sản phẩm ID của giỏ hàng
        $ket_noi="SELECT ID_products from products where ID_products=$id"; // Lấy ID của sản phẩm
        $data=mysqli_query($Reference,$ket_noi); // Kết nối
        $getdata=mysqli_fetch_assoc($data); // Nạp dữ liệu

        // $ket_noi_user="SELECT ID_User from user"; // Lấy Id của người dùng hiện tại
        // $data_user=mysqli_query($Reference,$ket_noi_user);
        // $getdata_user=mysqli_fetch_assoc($data_user);
        // $fetch_ket_noi="SELECT ID_User from user where ID_User=$getdata_user[ID_User]"; // Tìm người hiện tại
        // $data_users=mysqli_query($Reference,$fetch_ket_noi); // kết nối
        // $getdata_users=mysqli_fetch_assoc($data_users);// Nạp dữ liệu
        if($getdata ){
            $Data=$getdata['ID_products'];
            // $Data_user=$getdata_users['ID_User'];
            if($Reference->query("INSERT into gio_hang (ID_products) values ('$Data')")){
                echo "<script>alert('Thêm vào giỏ thành công') </script>";
               header("location:Gio_hang_User.php");
               
            }else{
                echo "<script>alert('Thêm không thành công') </script>";
            }
        }
       
    }