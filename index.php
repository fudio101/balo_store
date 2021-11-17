<?php

//$baseUrl = './';

require_once('./utils/utility.php');
require_once('./database/dbhelper.php');


$sqlGetProduct = "SELECT * FROM db_product";
$products =  executeResult($sqlGetProduct);

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
                        <sapn class="container-sale__notifi">Sản phẩm mới</sapn>
                        <img src="./assets/images/flash_sale.jpg" alt="" class="container-sale__img">
                    </div>
                    <div class="row sm-gutter">

                        <?php foreach($products as $product): ?>
                        <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                            <a href="product.php?catid=<?='1';?>&id=<?='1';?>" class="container-home__fb">
                                <div class="container-shoping">
                                    <div class="container-shoping__img">
                                        <img src="<?= fixUrl($product['avatar'], './');?>" alt="" class="container-shoping__img-image">
                                    </div>
                                    <div class="container-shoping__content">
                                        <span class="container-shoping__content-span">
                                            <?=$product['name'];?>
                                        </span>
                                    </div>
                                    <div class="container-shoping__money">
                                        <span class="container-shoping__money-line">
                                            <?=number_format($product['price'],0,',','.');?>₫
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                        <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                            <a href="" class="container-home__fb">
                                <div class="container-shoping">
                                    <div class="container-shoping__img">
                                        <img src="./assets/images/balo3.jpg" alt="" class="container-shoping__img-image">
                                    </div>
                                    <div class="container-shoping__content">
                                        <span class="container-shoping__content-span">
                                            Túi Xách Cartinoe MIVIDA1071 Lamando 15.7
                                        </span>
                                    </div>
                                    <div class="container-shoping__money">
                                        <span class="container-shoping__money-line">480.000₫</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="container-page">
                            <ul class="container-page__form">
                                <li class="container-page__list">
                                    <a href="#" class="container-page__link"><i class="container-page__icon fas fa-angle-double-left"></i></a>
                                </li>
                                <li class="container-page__list open-color">
                                    <a href="#" class="container-page__link">1</a>
                                </li>
                                <li class="container-page__list">
                                    <a href="#" class="container-page__link">2</a>
                                </li>
                                <li class="container-page__list">
                                    <a href="#" class="container-page__link">3</a>
                                </li>
                                <li class="container-page__list">
                                    <a href="#" class="container-page__link">4</a>
                                </li>
                                <li class="container-page__list">
                                    <a href="#" class="container-page__link">5</a>
                                </li>
                                <li class="container-page__list">
                                    <a href="#" class="container-page__link"><i class="container-page__icon fas fa-angle-double-right"></i></a>
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
                        <div class="container-sale__shop">
                            <sapn class="container-sale__span">Vali</sapn>
                        </div>
                        <div class="row sm-gutter">
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="./assets/photos/163713747183715.jpg" alt="" class="container-vali__img-image">
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-line">480.000₫</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="./assets/images/balo3.jpg" alt="" class="container-vali__img-image">
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-line">480.000₫</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="./assets/images/balo3.jpg" alt="" class="container-vali__img-image">
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-line">480.000₫</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="./assets/images/balo3.jpg" alt="" class="container-vali__img-image">
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-line">480.000₫</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="./assets/images/balo3.jpg" alt="" class="container-vali__img-image">
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-line">480.000₫</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="container-sale__shop-add">
                            <a href="#" class="btn container-sale__shop-add-link">Xem thêm</a>
                        </div>
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
    <script src="./assets/js/balo.js"></script>
</body>

</html>