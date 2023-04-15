<?php
include "./Connect.php";

if (isset($_POST['submit'])) {
  $Name = trim($_POST['Name']);
  $Email = trim($_POST['Email']);
  $Phone = trim($_POST['Phone']);
  $Passwork = trim($_POST['Passwork']);
  $Conf_Pass = trim($_POST['Conf_passwork']);

  $Gate="SELECT * from user";
  $Ckeck=mysqli_query($Reference,$Gate);
  $check=mysqli_fetch_assoc($Ckeck);
  if($check['Email']==$Email){
    echo "<script>alert('Tài khoản đã tồn tại')</script>";
  }
  elseif (
    $Name != "" && strlen($Name) >= 5 && $Email != "" && $Phone != "" && strlen($Phone) == 10 and $Passwork != ""
    && strlen($Passwork) >= 8 and $Passwork == $Conf_Pass
  ) {
    if ($Reference->query("INSERT into user (Full_name,Email,Phone,Password,Confirm_pass) values ('$Name','$Email','$Phone','$Passwork','$Conf_Pass')")) {
      echo "<script>alert('Đăng nhập thành công') </>";
      header("location:Log_in.php");
    }
  } else {
    echo "<script>alert('Đăng nhập không thành công') </script>";
  }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./dang_ky.css">
</head>
<body>
	<div class="main">  
			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="Name" placeholder="User name" required="">
					<input type="email" name="Email" placeholder="Email" required="">
					<input type="number" name="Phone" placeholder="Phone" required="">
          <input type="password" name="Passwork" placeholder="Password" required="">
          <input type="password" name="Conf_passwork" placeholder="Confirm Passwork" required="">
					<button name="submit">Sign up</button>
          <button name="submit"><a href="./Log_In.php">Log in</a> </button>
				</form>
			</div>
	</div>
</body>
</html>