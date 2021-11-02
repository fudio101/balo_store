<?php
$baseUrl = './';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.1/respond.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="./assets/css/balo.css">
    <link rel="stylesheet" href="./assets/css/balobase.css">
    <link rel="stylesheet" href="./assets/css/gird.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Balo</title>
</head>

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
                        <div class="container-slide__list-img"></div>
                    </div>
                    <div class="container-slide__list">
                        <div class="container-slide__list-img"></div>
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
                        <sapn class="container-sale__notifi">Tất cả sản phẩm</sapn>
                        <img src="./assets/images/flash_sale.jpg" alt="" class="container-sale__img">
                    </div>
                    <div class="row sm-gutter">

                        <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                            <a href="" class="container-home__fb">
                                <div class="container-shoping">
                                    <div class="container-shoping__img">
                                        <img src="./assets/images/balo3.jpg" alt="" class="container-shoping__img-image">
                                    </div>
                                    <div class="container-shoping__content">
                                        <span class="container-shoping__content-span">
                                            Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                        </span>
                                    </div>
                                    <div class="container-shoping__money">
                                        <span class="container-shoping__money-line">480.000₫</span>
                                    </div>
                                </div>
                            </a>
                        </div>

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
                <div class="container-voter__img">
                    <div class="container-voter__contai">
                        <div class="grid wide">
                            <div class="container-voter__contai-noti container-sale__shop">
                                <sapn class="container-sale__span container-voter__contai-span container-voter__contai-none">
                                    Sản Phẩm Nổi Bật</sapn>
                                <div class="container-sale__shop-notifi container-voter__contai-none">
                                    <sapn class="container-sale__shop-span container-voter__contai-name">Balo</sapn>
                                    <sapn class="container-sale__shop-span container-voter__contai-name">Vali</sapn>
                                </div>
                            </div>
                            <div class="row sm-gutter">
                                <div class="col l-3 m-3 c-12 container-shoping__culum">
                                    <img src="./assets/images/anh2.jpg" alt="" class="container-voter__discount">
                                </div>
                                <div class="col l-9 m-9 c-12 container-shoping__culum-75">
                                    <div class="row sm-gutter">

                                        <div class="col l-4 m-6 c-6 container-shoping__culum-75">
                                            <a href="#" class="container-star">
                                                <div class="container-star__shop container-discount__flex">
                                                    <div class="container-star__shop-img container-voter__discount-three">
                                                        <img src="./assets/images/balo1.jpg" alt="" class="container-voter__discount-img">
                                                    </div>
                                                    <div class="container-star__shop-isplay container-voter__discount-six">
                                                        <div class="container-star__shop-text">
                                                            <span class="container-star__shop-span container-discount__text-span">
                                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                                            </span>
                                                        </div>
                                                        <div class="container-star__shop-money container-discount__text-culum">
                                                            <span class="container-star__shop-money-line">480.000₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid wide">
                    <div class="container-section">
                        <div class="container-sale__shop">
                            <sapn class="container-sale__span">Vali</sapn>
                            <div class="container-sale__shop-notifi">
                                <sapn class="container-sale__shop-span">Balo</sapn>
                                <sapn class="container-sale__shop-span">Vali</sapn>
                            </div>
                        </div>
                        <div class="row sm-gutter">
                            <div class="col l-2-4 m-4 c-6 container-shoping__culum">
                                <a href="" class="container-home__fb">
                                    <div class="container-vali">
                                        <div class="container-vali__img">
                                            <img src="./assets/images/balo3.jpg" alt="" class="container-vali__img-image">
                                            <div class="container-vali__sale">
                                                <span class="container-vali__sale-noti">
                                                    -11%
                                                </span>
                                            </div>
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-no">540.000₫</span>
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
                                            <div class="container-vali__sale">
                                                <span class="container-vali__sale-noti">
                                                    -11%
                                                </span>
                                            </div>
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-no">540.000₫</span>
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
                                            <div class="container-vali__sale">
                                                <span class="container-vali__sale-noti">
                                                    -11%
                                                </span>
                                            </div>
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-no">540.000₫</span>
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
                                            <div class="container-vali__sale">
                                                <span class="container-vali__sale-noti">
                                                    -11%
                                                </span>
                                            </div>
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-no">540.000₫</span>
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
                                            <div class="container-vali__sale">
                                                <span class="container-vali__sale-noti">
                                                    -11%
                                                </span>
                                            </div>
                                        </div>
                                        <div class="container-vali__content">
                                            <span class="container-vali__content-span">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </span>
                                        </div>
                                        <div class="container-vali__money">
                                            <span class="container-vali__money-no">540.000₫</span>
                                            <span class="container-vali__money-line">480.000₫</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
    <script>
        /* làm bảng menu */
        var clickMenu = document.querySelector('.js-menu__icon');
        var clickDelete = document.querySelector('.js-hearder-modal');
        var stopPropaga = document.querySelector('.js-list__menu');
        var clickIcon = document.querySelector('.js-icon__times');
        clickMenu.onclick = function() {
            clickDelete.classList.add('open');
        }
        clickIcon.onclick = function() {
            clickDelete.classList.remove('open');
        }
        clickDelete.onclick = function() {
            clickDelete.classList.remove('open');
        }
        stopPropaga.onclick = function(event) {
            event.stopPropagation();
        }

        /*làm thanh trở về màn hình */

        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('.backtop').fadeIn();
                } else {
                    $('.backtop').fadeOut();
                }
            });
            $(".backtop").click(function() {
                $('html,body').animate({
                    scrollTop: 0
                }, 50);
            })
        });
    </script>
</body>

</html>