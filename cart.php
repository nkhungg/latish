<title>Giỏ hàng của bạn</title>
<?php
require './components/header.php'
?>

<?php
require 'connectdb.php';
$ctm = $_SESSION["id"];
?>

<div class="container" style="margin-top:100px;">
    <form action="" name="status" method="GET">
        <input type="hidden" name="status" value="all">
        <a type="submit" class="btn btn-info" href="cart.php?status=all">Tất cả</a>
        <a type="submit" class="btn btn-warning" href="cart.php?status=processing">Đang xử lý</a>
        <a type="submit" class="btn btn-danger" href="cart.php?status=waiting">Chờ thanh toán</a>
        <a type="submit" class="btn btn-success" href="cart.php?status=paid">Đã thanh toán</a>
    </form>
</div>
<table class="table table-hover" style="color:aliceblue">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên hàng</th>
            <th>Giá</th>
            <th>Người bán</th>
            <th>Địa chỉ giao hàng</th>
            <th>Thời gian</th>
            <th>Tình trạng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $status = $_GET["status"];
        if ($status == "all")
            $query = "SELECT * from `bill` where ctm_id='$ctm'";
        else $query = "SELECT * from `bill` where (ctm_id='$ctm' and `status`='$status')";

        $result = mysqli_query($conn, $query);
        while ($r = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $r['id']; ?></td>
                <td><?php
                    $prd_id = $r["prd_id"];
                    $query1 = "SELECT * from product where id='$prd_id'";
                    $r1 = mysqli_fetch_assoc(mysqli_query($conn, $query1));
                    echo $r1['name']; ?></td>
                <td><?php
                    echo $r1['price']; ?></td>
                <td><?php
                    $seller_id = $r1["seller_id"];
                    $query1 = "SELECT * from seller where id='$seller_id'";
                    $r1 = mysqli_fetch_assoc(mysqli_query($conn, $query1));
                    echo $r1['name']; ?></td>
                <td>
                    <?php
                    $query1 = "SELECT * from customer where id='$ctm'";
                    $r1 = mysqli_fetch_assoc(mysqli_query($conn, $query1));
                    echo $r1['address'];
                    ?>
                </td>
                <td><?php echo $r['time']; ?></td>
                <td><?php if ($r['status'] == "processing") echo "Đang xử lý";
                    else if ($r['status'] == "waiting") echo "Đang chờ thanh toán";
                    else if ($r['status'] == "paid") echo "Đã thanh toán"; ?></td>
                <td>
                    <?php
                    if ($r['status'] == 'processing') { ?>
                        <div class="row" style="width:150px;">
                            <div class="col-3">
                                <form action="momo.php" method="GET">
                                    <input type="hidden" name="status" value=<?php echo $_GET['status'] ?>>
                                    <input type="hidden" name="id" value=<?php echo $r['id'] ?>>
                                    <button type="submit" style="border: none; cursor: pointer; appearance: none; background-color: inherit; transition: transform .7s ease-in-out;"><img src="./img/momo.png" style="width:30; height:30"></button>
                                </form>
                            </div>
                            <div class="col-4">
                                <form action="cod.php" method="GET">
                                    <input type="hidden" name="status" value=<?php echo $_GET['status'] ?>>
                                    <input type="hidden" name="id" value=<?php echo $r['id'] ?>>
                                    <button type="submit" style="border: none; cursor: pointer; appearance: none; background-color: inherit; transition: transform .7s ease-in-out;"><img src="./img/cod.png" style="width:30; height:30"></button>
                                </form>
                            </div>
                            <div class="col-1">
                                <form action="cancel.php" method="GET">
                                    <input type="hidden" name="status" value=<?php echo $_GET['status'] ?>>
                                    <input type="hidden" name="id" value=<?php echo $r['id'] ?>>
                                    <button type="submit" onclick="return confirm('Bạn có muốn hủy đơn hàng này?')" class="btn btn-danger"><i class="ti-close"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>
</table>