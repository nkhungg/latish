<title>Chi tiết mặt hàng</title>
<?php
require './components/header.php';
require 'connectdb.php';
$id = $_GET['id'];
$query = "SELECT * from product where id='$id'";
$r = mysqli_fetch_assoc(mysqli_query($conn, $query));
?>

<div class="container" style="padding-top:100px;color:aliceblue">
    <img src="./img/<?php echo $r['img'] ?>" style="width: 300px; height: 300px; ">
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
        <button type="submit" onclick="clickAlert()" style="margin-left:400px; margin-top: -50px" class="btn btn-primary" <?php if ($r['status'] == 'sold') echo 'disabled'; ?>>Thêm vào giỏ hàng</button>
    </form>
    <h1 style="margin-left:400px; margin-top:-300px">Tên mặt hàng: <?php echo $r['name'] ?></h1>
    <h2 style="margin-left:400px; margin-top: 20px">Giá: <?php echo $r['price'] ?> đ</h2>
    <h3 style="margin-left:400px; margin-top: 20px">Mô tả: <?php echo $r['description'] ?></h3>
    <h2 style="margin-left:400px; margin-top: 20px"><form action="seller.php" method="GET">Người bán:
            <input type="hidden" name="id" value="<?php echo $r['seller_id'] ?>">
            <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
            <button type="submit" class="btn btn-default" style="color:aliceblue"><?php
                                                            $seller_id = $r['seller_id'];
                                                            $query1 = "SELECT `name` from `seller` where `id`=$seller_id";
                                                            $r1 = mysqli_fetch_assoc(mysqli_query($conn, $query1));
                                                            echo $r1['name']
                                                            ?></button>
        </form>
    </h2>
</div>