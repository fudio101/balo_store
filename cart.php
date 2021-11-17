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

                                <?php $i = 0;
                                if ($cartList != null) foreach ($cartList as $key => $product_) : ?>

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
                                                <input type="button" class="container-form__add-sub" onclick="subValue(<?= $i ?>)" value="-">
                                                <input type="number" class="container-form__add-cart" id="fix-number-<?= $i ?>" min="1" max="1000" style="width: 40px;" value="<?= $cart[$key]['quantity'] ?>">
                                                <input type="button" class="container-form__add-sub1" onclick="addValue(<?= $i++ ?>)" value="+">
                                            </div>
                                        </td>
                                        <td class="container-bank__table-td hide-on-mobile">
                                            <span class="container-bank__table-text">2.400.000đ</span>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </table>
                            <div class="container-bank__btn">
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


        <?php require_once('./layouts/bot.php') ?>

        <div class="backtop">
            <i class="backtop-icon fas fa-angle-up"></i>
        </div>
    </div>
    <!-- javasprit -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./assets/js/balo.js"></script>
    <script>
        function addValue(value) {
            $('#fix-number-' + value).val(parseInt($('#fix-number-' + value).val()) + 1);
        }

        function subValue(value) {
            if ($('#fix-number-' + value).val() > 1) {
                $('#fix-number-' + value).val(parseInt($('#fix-number-' + value).val()) - 1);
            }
        }
    </script>

</body>

</html>