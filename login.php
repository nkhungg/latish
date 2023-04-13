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
  <!-- <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Đăng nhập</span>
        <form action="checkLogin.php" method="post">
          <div class="input-field">
            <input type="text" class="form-control" name="id" id="id" placeholder="Tên đăng nhập" required />
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" class="password form-control" name="password" id="password" placeholder="Mật khẩu" required />
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>
          <div class="checkbox-text">
            <div class="checkbox-content">
              <input type="checkbox" id="logCheck" />
              <label for="logCheck" class="text">Ghi nhớ đăng nhập</label>
            </div>
          </div>
          <div class="input-field button"><button type="submit" class="btn btn-primary">Đăng nhập</button></div>
        </form>
      </div>
    </div>
  </div> -->
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