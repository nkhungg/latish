<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Iconscout  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- Css style -->
  <link rel="stylesheet" href="./style.css" />

  <title>Đăng nhập</title>
  <!-- add icon link -->
  <link rel="icon" href="https://hcmut.edu.vn/img/nhanDienThuongHieu/01_logobachkhoatoi.png" type="image/x-icon">
</head>

<body>
  <div class="login-box">
    <h2>Đăng nhập</h2>
    <form action="checkLogin.php" method="post">
      <div class="user-box">
        <input type="text" name="id" required="">
        <label>CCCD/CMND</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Mật khẩu</label>
      </div>
      <button type="submit" class="btn btn-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Đăng nhập
      </button>
    </form>
  </div>
  <script src="script.js"></script>
</body>

</html>