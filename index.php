<?php

require_once('./utils/utility.php');
require_once('./database/dbhelper.php');

//calculate
$totalProduct = count(executeResult("select `id` from `db_product` where `status`=1"));
$numProductsPerPage = 10;
$maxPage = (int)ceil($totalProduct / $numProductsPerPage);
//get curent page
$curentPage = 1;
if (isset($_GET['page'])) {
    $curentPage = (int)$_GET['page'];
}
$curentPage = $curentPage < 1 ? 1 : $curentPage;
$curentPage = $curentPage > $maxPage ? $maxPage : $curentPage;

$pageStart = $curentPage - 2;
$pageEnd = $curentPage + 2;

if ($curentPage < 4) {
    $pageStart = 1;
    $pageEnd = $maxPage > 5 ? ($pageStart + 4) : $maxPage;
} elseif ($curentPage > $maxPage - 3) {
    $pageEnd = $maxPage;
    $pageStart = $maxPage > 5 ? ($pageEnd - 4) : 1;
}

//0->count-1
$offset = ($curentPage - 1) * $numProductsPerPage;
$sqlGetProduct =    "SELECT *
                    FROM `db_product`
                    WHERE `status`=1
                    LIMIT $offset, $numProductsPerPage";
$products = executeResult($sqlGetProduct);

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('./layouts/head.php'); ?>

<body>
    <div class="apps">
        <?php require_once($baseUrl . "layouts/top.php"); ?>

        <div class="container">
            <!-- làm slide -->
            <div class="container-slideshow">
                <div class="container-slide">
                    <input type="radio" name="bottom" id="bottom_1">
                    <input type="radio" name="bottom" id="bottom_2">
                    <div class="container-slide__list container-slide__id">
                        <div class="container-slide__list-img">
                            <img src="./assets/images/slider_1.jpg" alt="" class="container-slide__list-img-slide">
                        </div>
                    </div>
                    <div class="container-slide__list">
                        <div class="container-slide__list-img">
                            <img src="./assets/images/slider_1.jpg" alt="" class="container-slide__list-img-slide">
                        </div>
                    </div>
                </div>
                <div class="container-navigation">
                    <label for="bottom_1" class="container-navigation__bar"></label>
                    <label for="bottom_2" class="container-navigation__bar"></label>
                </div>
            </div>


            <div class="container-menu">
                <div class="grid wide">
                    <div class="container-sale">
                        <sapn class="container-sale__notifi" >Sản phẩm mới</sapn>
                        <img src="./assets/images/flash_sale.jpg" alt="" class="container-sale__img">
                    </div>
                    <div class="row sm-gutter">

                        <?php foreach ($products as $product) : ?>
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="product.php?id=<?= $product['id']; ?>" class="container-home__fb">
                                    <div class="container-shoping">
                                        <div class="container-shoping__img">
                                            <img src="<?= fixUrl($product['avatar'], './'); ?>" alt="" class="container-shoping__img-image">
                                        </div>
                                        <div class="container-shoping__content">
                                            <span class="container-shoping__content-span">
                                                <?= $product['name']; ?>
                                            </span>
                                        </div>
                                        <div class="container-shoping__money">
                                            <span class="container-shoping__money-line">
                                                <?= number_format($product['price'], 0, ',', '.'); ?>₫
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="container-page">
                        <ul class="container-page__form">
                            <li class="container-page__list">
                                <a href="index.php?page=<?= $curentPage > 5 ? ($curentPage - 5) : 1; ?>" class="container-page__link">
                                    <i class="container-page__icon fas fa-angle-double-left"></i>
                                </a>
                            </li>
                            <?php for ($index = $pageStart; $index <= $pageEnd; $index++) : ?>
                                <li class="container-page__list <?= $index == $curentPage ? 'open-color' : ''; ?>">
                                    <a href="index.php?page=<?= $index; ?>" class="container-page__link"><?= $index; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="container-page__list">
                                <a href="index.php?page=<?= $curentPage < ($maxPage - 5) ? ($curentPage + 5) : $maxPage; ?>" class="container-page__link">
                                    <i class="container-page__icon fas fa-angle-double-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="row sm-gutter">
                        <div class="col l-4 m-4 c-0 container-shoping__culum">
                            <div class="container-banner">
                                <img src="./assets/images/bannar1.jpg" alt="" class="container-banner__img">
                            </div>
                        </div>
                        <div class="col l-4 m-4 c-12 container-shoping__culum">
                            <div class="container-banner__imger">
                                <img src="./assets/images/banner2.jpg" alt="" class="container-banner__img-culumn">
                                <img src="./assets/images/banner3.jpg" alt="" class="container-banner__img-culumn">
                            </div>
                        </div>
                        <div class="col l-4 m-4 c-0 container-shoping__culum">
                            <div class="container-banner">
                                <img src="./assets/images/banner4.jpg" alt="" class="container-banner__img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-voter">
                <div class="grid wide">
                    <div class="container-section">
                        <?php
                            $getCategory = 'SELECT `id`,`name` FROM `db_category` WHERE `status`=1 ';
                            $rowsCategory = executeResult($getCategory);
                        ?>
                        <?php foreach($rowsCategory as $rowCategory):
                            $catid = $rowCategory['id'];
                        ?>
                        <div class="container-sale__shop">
                            <sapn class="container-sale__span"><?=$rowCategory['name'];?></sapn>
                        </div>
                        <div class="row sm-gutter">
                            <?php
                                $sql = 'SELECT `id`,`avatar`,`name`,`price` FROM `db_product` WHERE `status`=1 ';
                                $rows = executeResult("$sql AND `catid`=$catid ORDER BY `number_buy` DESC LIMIT 5");
                            ?>
                            <?php foreach ($rows as $row): ?>
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="product.php?id=<?=$row['id']?>" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="<?=fixUrl($row['avatar'],'./');?>" alt="" class="container-vali__img-image">
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                <?=$row['name']?>
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-line">
                                                <?=number_format($row['price'], 0, ',', '.');?>₫
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="container-sale__shop-add">
                            <a href="category.php?id=<?=$catid;?>" class="btn container-sale__shop-add-link">Xem thêm</a>
                        </div>
                        <?php endforeach; ?>

                            <div class="row sm-gutter">
                                <div class="col l-6 m-6 c-12">
                                    <img src="./assets/images/anh3.jpg" alt="" class="container-section__img container-section__img-padding">
                                </div>
                                <div class="col l-6 m-6 c-12">
                                    <img src="./assets/images/anh4.jpg" alt="" class="container-section__img container-section__img-padding">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php require_once($baseUrl . "layouts/bot.php"); ?>
    </div>
    <!-- javasprit -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        let counter = 1;
        setInterval(function() {
            document.getElementById('bottom_' + counter).checked = true;
            counter++;
            if (counter > 2) {
                counter = 1;
            }
        }, 4000);
    </script>
</body>

</html>