<title>Latish</title>
<?php
require './components/header.php'
?>

<?php
require 'connectdb.php';
if (isset($_GET['page']) && $_GET['page'] !== "") {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$record1page = 4;
$previous = $page - 1;
$next = $page + 1;
$offset = ($page - 1) * $record1page;
?>

<!--search bar-->
<div class="container" style="padding-top: 40px;">
    <form class="row" action="" method="GET">
        <div class="col-2" style="margin-left: 5px">
            <select type="search" class="form-select mb-2 mr-sm-2" id="category" name="category">
                <option selected value="all" <?php if (isset($_GET['category']) && $_GET['category'] == "all") {
                                                    echo "selected";
                                                } ?>>Tất cả mặt hàng</option>
                <option value="1" <?php if (isset($_GET['category']) && $_GET['category'] == "1") {
                                        echo "selected";
                                    } ?>>Áo quần</option>
                <option value="2" <?php if (isset($_GET['category']) && $_GET['category'] == "2") {
                                        echo "selected";
                                    } ?>>Đồ điện tử</option>
                <option value="3" <?php if (isset($_GET['category']) && $_GET['category'] == "3") {
                                        echo "selected";
                                    } ?>>Đồ gia dụng</option>
                <option value="4" <?php if (isset($_GET['category']) && $_GET['category'] == "4") {
                                        echo "selected";
                                    } ?>>Học tập</option>
                <option value="5" <?php if (isset($_GET['category']) && $_GET['category'] == "5") {
                                        echo "selected";
                                    } ?>>Sách</option>
                <option value="6" <?php if (isset($_GET['category']) && $_GET['category'] == "6") {
                                        echo "selected";
                                    } ?>>Giày dép</option>
            </select>
        </div>
        <div class="col-9   ">
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Bạn muốn tìm sản phẩm gì?" name="item">
        </div>
        <div class="col" style="margin-left:20px;">
            <button type="submit" class="btn btn-info mb-2"><img src="./img/search.png" style="width:25px; height:25px;"></button>
        </div>
    </form>
</div>

<!--product-->
<div class="container">
    <div class="row">
        <?php
        $search_option = $_GET['category'];
        if ($search_option == "all") {
            if (isset($_GET["item"]) && !empty($_GET["item"])) {
                $str = $_GET["item"];
                $query = "SELECT * from `product` where name REGEXP '$str+' limit $offset,$record1page";
                $query1 = "SELECT COUNT(*) as total_records from `product` where name REGEXP '$str+'";
            } else {
                $query = "SELECT * from `product` limit $offset,$record1page";
                $query1 = "SELECT COUNT(*) as total_records from `product`";
            }
        } else {
            if (isset($_GET["item"]) && !empty($_GET["item"])) {
                $str = $_GET["item"];
                $query = "SELECT * from `product` where (category_id=$search_option and name REGEXP '$str+') limit $offset,$record1page";
                $query1 = "SELECT COUNT(*) as total_records from `product` where (category_id=$search_option and name REGEXP '$str+')";
            } else {
                $query = "SELECT * from `product` where category_id=$search_option limit $offset,$record1page";
                $query1 = "SELECT COUNT(*) as total_records from `product` where category_id=$search_option";
            }
        }
        $result_count = mysqli_query($conn, $query1);
        $records = mysqli_fetch_array($result_count);
        $total_records = $records['total_records'];
        $total_page = ceil($total_records / $record1page);
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
                    <form action="seller.php" method="GET">Người bán: 
                        <input type="hidden" name="id" value="<?php echo $r['seller_id'] ?>">
                        <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
                        <button type="submit" class="btn btn-default"><?php
                                                $seller_id = $r['seller_id'];
                                                $query1 = "SELECT `name` from `seller` where `id`=$seller_id";
                                                $r1 = mysqli_fetch_assoc(mysqli_query($conn, $query1));
                                                echo $r1['name']
                                                ?></button>
                    </form>
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
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>"><a class="page-link" <?= ($page > 1) ? 'href=?page=' . $previous . '&category=' . $_GET["category"] . '&item=' . $_GET["item"] : ''; ?> style="height:33px"><i class="ti-arrow-left"></i></a></li>

        <li class="page-item active"><a class="page-link"><?= $page ?></a></li>

        <li class="page-item <?= ($page >= $total_page) ? 'disabled' : ''; ?>"><a class="page-link" <?= ($page < $total_page) ? 'href=?page=' . $next . '&category=' . $_GET["category"] . '&item=' . $_GET["item"] : ''; ?> style="height:33px"><i class="ti-arrow-right"></i></a></li>
    </ul>
    <div style="margin-top:-20px; color:aliceblue">
        <strong>Trang <?php echo $page ?> / <?= $total_page ?></strong>
    </div>

</div>