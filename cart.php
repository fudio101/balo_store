<?php
require_once("./database/dbhelper.php");
require_once("./utils/utility.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once("./layouts/head.php") ?>

<body>
    <div class="apps">

        <?php require_once('./layouts/top.php') ?>

        <div class="container" style="min-height: 512px;">
            <div class="grid wide" style="margin-top:64px">
                <div class="container-bank">
                    <div class="container-bank__message">
                        <i class="container-bank__message-icon far fa-check-circle"></i>
                        <p class="container-bank__noti">
                            Túi Xách Cartinoe MIVIDA1071 Lamando 15.6” xóa khỏi giỏ hàng
                        </p>
                    </div>
                    <div class="row sm-gutter">
                        <div class="col l-7 m-12 c-12">
                            <table class="container-bank__table">
                                <tr class="container-bank__table-tr container-bank__table-border">
                                    <th class="container-bank__table-th">Sản phẩm</th>
                                    <th class="container-bank__table-th hide-on-mobile">Giá</th>
                                    <th class="container-bank__table-th ">Số Lượng</th>
                                    <th class="container-bank__table-th hide-on-mobile">Tạm tính</th>
                                </tr>

                                <?php if ($cartList != null) foreach ($cartList as $key => $product_) : ?>

                                    <tr class="container-bank__table-tr">
                                        <td class="container-bank__table-td">
                                            <div class="container-bank__table-flex">
                                                <i class="container-bank__table-icon far fa-times-circle" style="margin:0 12px 0 -12px; cursor: pointer;"></i>
                                                <a href="<?= $baseUrl . 'product.php?id=' . $cart[$key]['id'] ?>" class="container-bank__link">
                                                    <img src="<?= fixUrl($product_['avatar'], $baseUrl) ?>" alt="" class="container-bank__link-img">
                                                    <span class="container-bank__link-text" style="margin-left: 12px;">
                                                        <?= $product_['name'] ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="container-bank__table-td hide-on-mobile">
                                            <span class="container-bank__table-text"><?= number_format($product_['price'], 0, ',', '.') ?>đ</span>
                                        </td>
                                        <td class="container-bank__table-td container-bank__table-sum">
                                            <div class="container-form__add-number container-bank__form">
                                                <input type="button" class="container-form__add-sub" value="-">
                                                <input type="number" class="container-form__add-cart fix-number" min="1" max="1000" value="<?= $cart[$key]['quantity'] ?>">
                                                <input type="button" class="container-form__add-sub1" value="+">
                                            </div>
                                        </td>
                                        <td class="container-bank__table-td hide-on-mobile">
                                            <span class="container-bank__table-text">2.400.000đ</span>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </table>
                            <div class="container-bank__btn">
                                <a class="container-bank__btn-link1">
                                    Tiếp tục xem sản phẩm
                                </a>
                                <button class="container-bank__btn-link2">
                                    Cập nhật giỏ hàng
                                </button>
                            </div>
                        </div>
                        <div class="col l-5 m-12 c-12">
                            <div class="container-bank__cart">
                                <span class="container-bank__cart-sum">
                                    Cộng giỏ hàng
                                </span>
                                <div class="container-bank__cart-flex">
                                    <span class="container-bank__cart-item1">Tạm tính</span>
                                    <span class="container-bank__cart-item1">13.720.000đ</span>
                                </div>
                                <div class="container-bank__cart-flex">
                                    <span class="container-bank__cart-item1">Tổng</span>
                                    <span class="container-bank__cart-item1">13.720.000đ</span>
                                </div>
                                <button type="" class="btn btn--green container-bank__cart-btn">Tiến hành thanh toán</button>
                                <form action="" class="container-bank__form-list">
                                    <label for="" class="container-bank__lable">Phiếu ưu đãi</label>
                                    <input type="text" class="container-bank__input">
                                    <button class="container-bank__submit">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-hearder">
                <div class="grid wide">
                    <div class="row sm-gutter">
                        <div class="col l-3 m-12 c-12 container-shoping__culum-75">
                            <div class="footer-hearder__list">
                                <p class="footer-hearder__span-p">
                                    Macinsta.vn – Kênh mua sắm đồ công nghệ cao cấp
                                </p>
                                <p class="footer-hearder__span-p">
                                    Địa chỉ: Ngõ 56 Hoàng Văn Thái, Hà Nội.
                                </p>
                                <span class="footer-hearder__span footer-hearder__span-h2">
                                    Hotline 1: 0906035225
                                </span>
                                <span class="footer-hearder__span footer-hearder__span-h2">
                                    CSKH: 0906095225
                                </span>
                                <p class="footer-hearder__span-p">
                                    Copyright © 2016 Macinsta.vn
                                </p>
                            </div>
                        </div>
                        <div class="col l-3 m-12 c-12 container-shoping__culum-75">
                            <div class="footer-hearder__list">
                                <h2>HỖ TRỢ KHÁCH HÀNG</h2>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Câu hỏi thường gặp (FAQ)
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Hướng dẫn mua hàng
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Chính sách giao hàng
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Chính sách bảo hành
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Điều khoản bảo mật
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col l-3 m-12 c-12 container-shoping__culum-75">
                            <div class="footer-hearder__list">
                                <p class="footer-hearder__list-noti">
                                    (Phản hồi trong thời gian sớm nhất)
                                </p>
                                <h2>VỀ MACINSTA</h2>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Giới thiệu về MacInsta
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Quy trình tư vấn
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Ưu đãi khách hàng thân thiết
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Sản phẩm ở MacInsta
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Vì sao chọn MacInsta?
                                    </a>
                                </span>
                                <span class="footer-hearder__span">
                                    <a href="" class="footer-hearder__link">
                                        Tuyển dụng
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col l-3 m-12 c-12 container-shoping__culum-75">
                            <div class="footer-hearder__list">
                                <div class="footer-hearder__flex">
                                    <a href="" class="footer-hearder__flex-link">
                                        <i class="hearder-top-icon footer-hearder__flex-icon fab fa-facebook"></i>
                                    </a>
                                    <a href="" class="footer-hearder__flex-link">
                                        <i class="hearder-top-icon footer-hearder__flex-icon fab fa-instagram"></i>
                                    </a>
                                    <a href="" class="footer-hearder__flex-link">
                                        <i class="hearder-top-icon footer-hearder__flex-icon fab fa-twitter"></i>
                                    </a>
                                    <a href="" class="footer-hearder__flex-link">
                                        <i class="hearder-top-icon footer-hearder__flex-icon fas fa-envelope"></i>
                                    </a>
                                    <a href="" class="footer-hearder__flex-link footer-hearder__flex-red">
                                        <i class="hearder-top-icon footer-hearder__flex-icon fab fa-youtube"></i>
                                    </a>
                                </div>
                                <p class="footer-hearder__span-p">
                                    Được chứng nhận
                                </p>
                                <a href="" class="footer-hearder__flex-list-link">
                                    <img src="./assets/images/anh7.png" alt="" class="footer-hearder__flex-list-img">
                                </a>
                                <p class="footer-hearder__span-p">
                                    Cách thức thanh toán
                                </p>
                                <div class="footer-hearder__flex">
                                    <a href="" class="footer-hearder__flex-link-pay">
                                        <i class="hearder-top-icon footer-hearder__flex-icon-pay fab fa-cc-visa"></i>
                                    </a>
                                    <a href="" class="footer-hearder__flex-link-pay">
                                        <i class="hearder-top-icon footer-hearder__flex-icon-pay fab fa-cc-paypal"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="footer-hearder__footer footer-hearder__span-p">
                        Copyright 2021 © | Giao diện web đẹp | Lịch CKT
                    </p>
                </div>
            </div>
        </div>

        <div class="modal js-modal">
            <div class="modal-over"></div>
            <div class="modal__from">
                <form action="" class="modal-form" method="">
                    <div class="modal-list js-modal-inner">
                        <h1 class="modal-list__login">Đăng Nhập</h1>
                        <div class="modal-list__user">
                            <h2 class="modal-list__user-h2">Tên tài khoản hoặc địa chỉ email *</h2>
                            <input type="text" class="modal-list__user-text">
                        </div>
                        <div class="modal-list__user">
                            <h2 class="modal-list__user-h2">Mật khẩu *</h2>
                            <input type="password" class="modal-list__user-text">
                        </div>
                        <div class="modal-list__rebme">
                            <input type="checkbox" class="modal-list__rebme-text">
                            <h2 class="modal-list__rebme-h2">Ghi nhớ mật khẩu *</h2>
                        </div>
                        <div class="modal-list__bottom">
                            <button class="btn btn--blue modal-list__bottom-submit">Đăng Nhập</button>
                            <a href="" class="modal-list__bottom-link">Quên mật khẩu ?</a>
                        </div>
                        <div class="modal-list__icon js-modal-list__icon">
                            <i class="modal-list__icon-time fas fa-times"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="hearder-from hearder-modal js-hearder-modal">
            <div class="hearder-modal__over">
                <i class="hearder-modal__over-time fas fa-times js-icon__times"></i>
            </div>
            <ul class="hearder-footer__list hearder-footer__list-culumn hearder-modal-footer js-list__menu">
                <li class="hearder-footer__link hearder-footer__menu-seach">
                    <img src="./assets/images/logo.png" alt="">
                </li>
                <li class="hearder-footer__link hearder-footer__menu ">
                    <a href="./index.html" class="hearder-footer__href hearder-footer__black">
                        Trang chủ
                    </a>
                </li>
                <li class="hearder-footer__link hearder-footer__menu hearder-footer__link-href hearder-footer__link-focus">
                    <a href="#" class="hearder-footer__href hearder-footer__menu-prodct">
                        Sản phẩm
                        <i class="hearder-footer__href-icon fas fa-angle-down"></i>
                    </a>
                    <ul class="hearder-footer__sugget-list hearder-footer__menu-cart hearder-footer__menu-cart-product">
                        <a href="./tuixach.html" class="hearder-footer__sugget-link">
                            <li class="hearder-footer__sugget-li">Túi Xách</li>
                        </a>
                        <a href="./balo.html" class="hearder-footer__sugget-link">
                            <li class="hearder-footer__sugget-li">Balo</li>
                        </a>
                        <a href="./vali.html" class="hearder-footer__sugget-link">
                            <li class="hearder-footer__sugget-li">Vali</li>
                        </a>
                    </ul>
                </li>
                <li class="hearder-footer__link hearder-footer__menu">
                    <a href="" class="hearder-footer__href">
                        Phụ kiện
                    </a>
                </li>
                <li class="hearder-footer__link hearder-footer__menu">
                    <a href="" class="hearder-footer__href">
                        Tin tức
                    </a>
                </li>
                <li class="hearder-footer__link hearder-footer__menu">
                    <a href="" class="hearder-footer__href">
                        Liên hệ
                    </a>
                </li>
            </ul>
        </div>
        <div class="backtop">
            <i class="backtop-icon fas fa-angle-up"></i>
        </div>
    </div>
    <!-- javasprit -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./assets/js/balo.js"></script>
    <script>
        $(".container-form__add-sub").click(() => {
            var val = $(".fix-number").val();
            if (val > 1) {
                $(".fix-number").val(parseInt(val - 1), 10);
            }
        });

        $(".container-form__add-sub1").click(() => {
            $(".fix-number").val(parseInt($(".fix-number").val(), 10) + 1);
        });
    </script>

</body>

</html>