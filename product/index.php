<?php
$baseUrl = '../';

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
    <link rel="stylesheet" href="../assets/css/balo.css">
    <link rel="stylesheet" href="../assets/css/balobase.css">
    <link rel="stylesheet" href="../assets/css/sanpham.css">
    <link rel="stylesheet" href="../assets/css/gird.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/icon/fontawesome-free-5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Balo</title>
</head>

<body>
    <div class="apps">
        <?php require_once($baseUrl . "layouts/top.php"); ?>

        <div class="container">
            <div class="container-folder">
                <div class="grid wide">
                    <div class="container-folder__header">
                        <a href="#" class="container-folder__header-href">Trang chủ</a>
                        <span class="container-folder__header-span">/</span>
                        <a href="#" class="container-folder__header-link">Sản phẩm</a>
                        <span class="container-folder__header-span">/</span>
                        <a href="#" class="container-folder__header-link">Balo</a>
                    </div>
                </div>
            </div>
            <div class="container-product">
                <div class="grid wide">
                    <div class="row sm-gutter">
                        <!-- làm slide sản phẩm -->
                        <div class="col l-9 m-12 c-12">
                            <div class="container-product__padding">
                                <div class="row sm-gutter">
                                    <div class="col l-5 m-12 c-12">
                                        <div class="container-cart">
                                            <div class="container-cart__myslide js-myslide">
                                                <img src="../assets/images/sanpham1.jpg" alt="" class="container-cart__img">
                                            </div>
                                            <div class="container-cart__myslide js-myslide">
                                                <img src="../assets/images/sanpham2.jpg" alt="" class="container-cart__img">
                                            </div>
                                            <div class="container-cart__myslide js-myslide">
                                                <img src="../assets/images/sanpham3.jpg" alt="" class="container-cart__img">
                                            </div>
                                            <div class="container-cart__myslide js-myslide">
                                                <img src="../assets/images/sanpham4.jpg" alt="" class="container-cart__img">
                                            </div>
                                            <!-- Next and previous buttons -->
                                            <a class="container-cart__prev container-cart__none" onclick="plusSlides(-1)">❮</a>
                                            <a class="container-cart__next container-cart__none" onclick="plusSlides(1)">❯</a>

                                            <div class="container-list">
                                                <div class="row sm-gutter">
                                                    <div class="col l-3 m-3 c-3">
                                                        <div class="container-list__hiden js-hiden" onclick="currentSlide(1)">
                                                            <img class="container-list__demo container-list__cursor js-demo" src="../assets/images/sanpham1.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col l-3 m-3 c-3">
                                                        <div class="container-list__hiden js-hiden" onclick="currentSlide(2)">
                                                            <img class="container-list__demo container-list__cursor js-demo" src="../assets/images/sanpham2.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col l-3 m-3 c-3">
                                                        <div class="container-list__hiden js-hiden" onclick="currentSlide(3)">
                                                            <img class="container-list__demo container-list__cursor js-demo" src="../assets/images/sanpham3.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col l-3 m-3 c-3">
                                                        <div class="container-list__hiden js-hiden" onclick="currentSlide(4)">
                                                            <img class="container-list__demo container-list__cursor js-demo" src="../assets/images/sanpham4.jpg" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- làm phần nội dung và số lượng sản phẩm -->
                                    <div class="col l-7 m-12 c-12">
                                        <div class="container-info">
                                            <h1 class="container-info__head">
                                                Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                            </h1>
                                            <div class="container-info__price">
                                                <span class="container-info__price-new">480.000₫</span>
                                            </div>
                                            <p class="container-info__p">Còn hàng</p>
                                            <form action="" class="container-form">
                                                <div class="container-form__add">
                                                    <div class="container-form__add-number">
                                                        <input type="button" class="container-form__add-sub" value="-">
                                                        <input type="number" class="container-form__add-cart fix-number" min="1" max="1000" value="1">
                                                        <input type="button" class="container-form__add-sub1" value="+">
                                                    </div>
                                                    <button type="" class="btn btn--green container-form__add-button">Thêm vào giỏ hàng</button>
                                                </div>
                                                <a href="./Thanhtoan.html" type="" class="btn btn--blue container-form_pay">Mua ngay</a>
                                            </form>
                                            <p class="container-info__noti">
                                                Mọi sản phẩm của MacInsta đều được chăm chút tỉ mỉ đến từng chi tiết – Đặt mua ngay trước khi hết hàng nhé bạn!
                                            </p>
                                            <p class="container-info__category">Danh mục:
                                                <a href="#" class="container-info__category-link">
                                                    Túi xách
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-painted">
                                <p class="container-painted__p">Mô Tả</p>
                                <div class="container-painted__noti">
                                    <p class="container-painted__noti-p">
                                        Rovigo Anakin 2 TE_20 S Sea Blue
                                        <span class="container-painted__noti-span">
                                            là dòng vali của thương hiệu Rovigo. Rovigo được biết đến và yêu thích bởi chất lượng sản phẩm tốt,
                                            bền bỉ và thiết kế sang trọng, tinh tế. Thương hiệu Rovigo luôn không ngừng đổi mới và phát triển,
                                            thường xuyên cho ra mắt sản phẩm mới phù hợp với thị hiếu của khách hàng.Rovigo Anakin 2 TE dòng
                                            sản phẩm của thương hiệu Rovigo thiết kế theo phong cách mới lạ, màu sắc nổi bật, bề mặt nhám phối
                                            hợp với vân sáng thời trang và hiện đại.
                                        </span>
                                    </p>
                                    <h1 class="container-painted__noti-h1">
                                        Ưu điểm của Rovigo Anakin
                                    </h1>
                                    <h2 class="container-painted__noti-h2">
                                        Chất liệu cực tốt
                                    </h2>
                                    <p class="container-painted__noti-p1">
                                        Vali Rovigo Anakin 2 TE được làm từ chất liệu nhựa 100% PP, dẻo, tránh va đập, trong lúc vận chuyển
                                        vali hoặc bạn di chuyển cùng vali trên đường có thể an tâm về độ chắc chắn của vali Rovigo.Đây là
                                        chất liệu nguyên chất chưa qua tái chế nên bạn khi sử dụng thì hoàn toàn yên tâm về độ bền của sản
                                        phẩm nhé.Vali được thiết kế khóa số TSA theo tiêu chuẩn Mỹ được Cục An Ninh Hoa Kì chứng nhận về độ
                                        an toàn tuyệt đối của vali bảo vệ đồ đạc bên trong khỏi tránh mất cắp.
                                    </p>
                                </div>
                            </div>
                            <div class="container-sp">
                                <h1 class="container-sp__head">Sản phẩm tương tự</h1>
                                <div class="container-sp__ps">
                                    <div class="row sm-gutter">
                                        <div class="col l-3 m-4 c-6">
                                            <a href="" class="container-sp__cart">
                                                <img src="../assets/images/sanpham4.jpg" alt="" class="container-sp__cart-img">
                                                <div class="container-sp__cart-postion">
                                                    <span class="container-sp__cart-postion-span">-11%</span>
                                                </div>
                                                <div class="container-sp__noti">
                                                    <p class="container-sp__noti-p">Túi Xách Cartinoe MIVIDA1071 Lamando 15.6</p>
                                                    <div class="container-sp__noti-div">
                                                        <p class="container-sp__noti-p1">540.000₫</p>
                                                        <p class="container-sp__noti-p1">480.000₫</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="" class="container-sp__cart">
                                                <img src="../assets/images/sanpham1.jpg" alt="" class="container-sp__cart-img">
                                                <div class="container-sp__cart-postion">
                                                    <span class="container-sp__cart-postion-span">-11%</span>
                                                </div>
                                                <div class="container-sp__noti">
                                                    <p class="container-sp__noti-p">Túi Xách Cartinoe MIVIDA1071 Lamando 15.6</p>
                                                    <div class="container-sp__noti-div">
                                                        <p class="container-sp__noti-p1">540.000₫</p>
                                                        <p class="container-sp__noti-p1">480.000₫</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="" class="container-sp__cart">
                                                <img src="../assets/images/sanpham1.jpg" alt="" class="container-sp__cart-img">
                                                <div class="container-sp__cart-postion">
                                                    <span class="container-sp__cart-postion-span">-11%</span>
                                                </div>
                                                <div class="container-sp__noti">
                                                    <p class="container-sp__noti-p">Túi Xách Cartinoe MIVIDA1071 Lamando 15.6</p>
                                                    <div class="container-sp__noti-div">
                                                        <p class="container-sp__noti-p1">540.000₫</p>
                                                        <p class="container-sp__noti-p1">480.000₫</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="" class="container-sp__cart">
                                                <img src="../assets/images/sanpham1.jpg" alt="" class="container-sp__cart-img">
                                                <div class="container-sp__cart-postion">
                                                    <span class="container-sp__cart-postion-span">-11%</span>
                                                </div>
                                                <div class="container-sp__noti">
                                                    <p class="container-sp__noti-p">Túi Xách Cartinoe MIVIDA1071 Lamando 15.6</p>
                                                    <div class="container-sp__noti-div">
                                                        <p class="container-sp__noti-p1">540.000₫</p>
                                                        <p class="container-sp__noti-p1">480.000₫</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col l-3 m-0 c-0">
                            <div class="container-last">
                                <div class="container-last__list">
                                    <img src="../assets/images/policy_images_1.png" alt="" class="container-last__list-img">
                                    <div class="container-last__list-div">
                                        <span class="container-last__list-span">Miễn phí vận chuyển</span>
                                        <span class="container-last__list-span">Cho các đơn hàng > 5tr</span>
                                    </div>
                                </div>
                                <div class="container-last__list">
                                    <img src="../assets/images/policy_images_4.png" alt="" class="container-last__list-img">
                                    <div class="container-last__list-div">
                                        <span class="container-last__list-span">Thanh toán</span>
                                        <span class="container-last__list-span">Được bảo mật 100%</span>
                                    </div>
                                </div>
                                <div class="container-last__list">
                                    <img src="../assets/images/policy_images_2.png" alt="" class="container-last__list-img">
                                    <div class="container-last__list-div">
                                        <span class="container-last__list-span">Hỗ trợ 24/7.</span>
                                        <span class="container-last__list-span">Liên hệ hỗ trợ 24h/ngày</span>
                                    </div>
                                </div>
                                <div class="container-last__list">
                                    <img src="../assets/images/policy_images_3.png" alt="" class="container-last__list-img">
                                    <div class="container-last__list-div">
                                        <span class="container-last__list-span">Hoàn tiền 100%</span>
                                        <span class="container-last__list-span">Nếu sản phẩm bị lỗi, hư hỏng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="container-sidebar">
                                <h2 class="container-sidebar__h2">
                                    Sản phẩm yêu thích
                                </h2>
                                <div class="container-sidebar__group">
                                    <div class="row sm-gutter">
                                        <div class="col l-12 m-12 c-12 abc">
                                            <a href="" class="container-sidebar__group-flex">
                                                <img src="../assets/images/sanpham2.jpg" alt="" class="container-sidebar__group-img">
                                                <div class="container-sidebar__group-div">
                                                    <span class="container-sidebar__group-noti">
                                                        Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                                    </span>
                                                    <div class="container-silebar__group-list">
                                                        <span class="container-sidebar__group-span">540.000₫</span>
                                                        <span class="container-sidebar__group-span">480.000₫</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-12 m-12 c-12 abc">
                                            <a href="" class="container-sidebar__group-flex">
                                                <img src="../assets/images/sanpham2.jpg" alt="" class="container-sidebar__group-img">
                                                <div class="container-sidebar__group-div">
                                                    <span class="container-sidebar__group-noti">
                                                        Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                                    </span>
                                                    <div class="container-silebar__group-list">
                                                        <span class="container-sidebar__group-span">540.000₫</span>
                                                        <span class="container-sidebar__group-span">480.000₫</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-12 m-12 c-12 abc">
                                            <a href="" class="container-sidebar__group-flex">
                                                <img src="../assets/images/sanpham2.jpg" alt="" class="container-sidebar__group-img">
                                                <div class="container-sidebar__group-div">
                                                    <span class="container-sidebar__group-noti">
                                                        Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                                    </span>
                                                    <div class="container-silebar__group-list">
                                                        <span class="container-sidebar__group-span">540.000₫</span>
                                                        <span class="container-sidebar__group-span">480.000₫</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-12 m-12 c-12 abc">
                                            <a href="" class="container-sidebar__group-flex">
                                                <img src="../assets/images/sanpham2.jpg" alt="" class="container-sidebar__group-img">
                                                <div class="container-sidebar__group-div">
                                                    <span class="container-sidebar__group-noti">
                                                        Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                                    </span>
                                                    <div class="container-silebar__group-list">
                                                        <span class="container-sidebar__group-span">540.000₫</span>
                                                        <span class="container-sidebar__group-span">480.000₫</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col l-12 m-12 c-12 abc">
                                            <a href="" class="container-sidebar__group-flex">
                                                <img src="../assets/images/sanpham2.jpg" alt="" class="container-sidebar__group-img">
                                                <div class="container-sidebar__group-div">
                                                    <span class="container-sidebar__group-noti">
                                                        Túi Xách Cartinoe MIVIDA1071 Lamando 15.6
                                                    </span>
                                                    <div class="container-silebar__group-list">
                                                        <span class="container-sidebar__group-span">540.000₫</span>
                                                        <span class="container-sidebar__group-span">480.000₫</span>
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
            </div>
        </div>

        <?php require_once($baseUrl . "layouts/bot.php"); ?>

    </div>
    <!-- javasprit -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../assets/js/sanpham.js"></script>
</body>

</html>