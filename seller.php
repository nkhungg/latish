<title>Thông tin người bán</title>
<?php
require './components/header.php';
require 'connectdb.php';
$id = $_GET['id'];
$query = "SELECT * from seller where id='$id'";
$r = mysqli_fetch_assoc(mysqli_query($conn, $query));
?>

<div class="container">
    <img src="./img/avt.png" style="width:150px; height:150px; border-radius: 75px 75px 75px 75px; margin-top: 100px">
    <h1 style="margin-left:200px; margin-top:-150px;color:aliceblue">Tên: <?php echo $r['name'] ?></h1>
    <h2 style="margin-left:200px; margin-top: 20px;color:aliceblue">Số điện thoại: <?php echo $r['phone_no'] ?></h2>
    <h2 style="margin-left:200px; margin-top: 20px;color:aliceblue">Tỉnh / Thành phố: <?php echo $r['address'] ?></h2>
    <h1 style="color:aliceblue">Các mặt hàng đã bán:</h1>
    <div class="row">
        <?php
        $query = "SELECT * from product where seller_id='$id'";
        $result = mysqli_query($conn, $query);
        while ($r = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="./img/<?php echo $r['img'] ?>" class="card-img-top" style="width:100%; height:50%">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $r['name'] ?></h5>
                    <div style="clear:both">
                        <h6 class="card-text" style="margin-top:15px;">Giá: <?php echo $r['price'] ?> đ</h6>
                        <?php if ($r['status'] == 'sold') { ?>
                            <h6 class="card-text" style="margin-top:-30px; float: right">Đã bán!</h6> <?php } ?>
                    </div>
                    <form action="detail.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                        <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
                        <input type="hidden" name="item" value="<?php if (isset($_GET['item']) && !empty($_GET["item"])) echo $_GET['item'];
                                                                else echo '' ?>">
                        <button type="submit" class="btn btn-success">Chi tiết mặt hàng</button>
                    </form>
                    <form action="addProduct.php" method="GET">
                        <script>
                            function clickAlert() {
                                alert("Thêm vào giỏ hàng thành công!");
                            }
                        </script>
                        <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                        <input type="hidden" name="price" value="<?php echo $r['price'] ?>">
                        <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
                        <input type="hidden" name="item" value="<?php if (isset($_GET['item']) && !empty($_GET["item"])) echo $_GET['item'];
                                                                else echo '' ?>">
                        <button type="submit" onclick="clickAlert()" class="btn btn-primary" <?php if ($r['status'] == 'sold') echo 'disabled'; ?>>Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>