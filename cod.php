<title>Xác nhận đơn hàng</title>
<?php
require './components/header.php'
?>

<?php
require 'connectdb.php';
$ctm = $_SESSION["id"];
$id = $_GET["id"];
$status = $_GET["status"];
?>
<h1 style="margin-top:100px; margin-left:120px; color:aliceblue">Mã đơn hàng: <?php
                                                                                echo $id;
                                                                                ?></h1>
<div class="container">
    <form action="codprocessing.php" method="GET">
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <h2 style="margin-top:20px; color:aliceblue">Họ và tên người nhận hàng:</h2>
        <input type="text" placeholder="Họ và tên" class="form-control" name="name" required>
        <h2 style="margin-top:20px; color:aliceblue">Số điện thoại người nhận hàng:</h2>
        <input type="text" placeholder="Nhập số điện thoại" class="form-control" name="phone_no" required>
        <h2 style="margin-top:20px; color:aliceblue">Địa chỉ nhận hàng:</h2>
        <input type="text" placeholder="Vui lòng nhập địa chỉ nhận hàng" class="form-control" name="address" required>
        <h2 style="margin-top:20px; color:aliceblue">Hàng bạn đã đặt: <?php
                                                                        $query = "SELECT * from bill where id='$id'";
                                                                        $r = mysqli_fetch_assoc(mysqli_query($conn, $query));
                                                                        $prd_id=$r["prd_id"];
                                                                        $query = "SELECT * from product where id='$prd_id'";
                                                                        $r = mysqli_fetch_assoc(mysqli_query($conn, $query));
                                                                        echo $r["name"];
                                                                        ?></h2>
        <h2 style="margin-top:20px; color:aliceblue">Tổng số tiền bạn phải thanh toán: <?php
                                                                                        echo $r["price"];
                                                                                        ?></h2>
        <button type="submit" class="btn btn-success" style="margin-top:20px">Xác nhận</button>
        <a href="<?php echo "cart.php?status=" . $status ?>" style="color:red; margin-left:20px">Hủy</a>
    </form>
</div>