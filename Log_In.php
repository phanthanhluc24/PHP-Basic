<?php
    include "./Connect.php";

    if (isset($_POST['submit'])) {
        $ket_noi="SELECT * from user";
        $data=mysqli_query($Reference,$ket_noi);
       $Name= $_POST['Email'];
       $Email=$_POST['Passwork'];
        while ($get_data=mysqli_fetch_assoc($data)) {
          if($Name==$get_data['Email'] and $Email==$get_data['Password']){
            header("location:Product.php");
          }elseif($Name=="Adminluc@gmail.com" && $Email == "Luc@123?"){
            header("location:Admin.php");
          }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./dang_nhap.css">
  <title>Log in</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="Email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="Passwork">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button name="submit">Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>