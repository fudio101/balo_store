<?php
    require_once("./database/dbhelper.php");
    require_once("./utils/utility.php");
    
    $orderCode = '';
    if(!isset($_GET['ordercode'])){
        return header('Location: ./index.php');
    } else {
        $orderCode = fixSqlInject($_GET['ordercode']);
    }
    
    $order = executeResult("SELECT * FROM `db_order` WHERE `orderCode`='$orderCode';", true);
    if($order == null){
        return header('Location: ./index.php');
    }
    
    $customer = executeResult("select * from `db_customer` where `phone`={$order['phone']};", true);
    $products = executeResult("select * from `db_orderdetail` where `orderid`={$order['id']};");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/balo.css">
    <link rel="stylesheet" href="./assets/css/balobase.css">
    <link rel="stylesheet" href="./assets/css/phieupay.css">
    <link rel="stylesheet" href="./assets/css/gird.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Phiếu thanh toán</title>
</head>
<body>
    <pre>
        <?php print_r($order); ?>
        <?php print_r($customer); ?>
        <?php print_r($products); ?>
    </pre>
    <div class="gird wide">
        <div class="row sm-gutter">
            <div class="col l-12 m-12 c-12">
                <div class="bill">
                    <div class="bill-slip">
                        <h2 class="bill-slip__text">Thông tin khách hàng</h2>
                        <form action="" method="">
                            <table class="bill-slip__table">
                                <tr>
                                    <td><label for="" class="bill-ship__label">Họ Tên:</label></td>
                                    <td><span class="bill-slip__span"><?=$order['fullname'];?></span></td>
                                </tr>
                                <tr>
                                   <td><label for="" class="bill-ship__label">Email:</label></td>
                                   <td><span class="bill-slip__span"><?=$customer['email'];?></span></td>
                                </tr>
                                <tr>
                                    <td><label for="" class="bill-ship__label">Điện thoại:</label></td>
                                    <td><span class="bill-slip__span"><?=$order['phone'];?></span></td>
                                </tr>
                                <tr>
                                    <td><label for="" class="bill-ship__label">Địa chỉ:</label></td>
                                    <td><span class="bill-slip__span"><?=$customer['address'];?></span></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="bill-product">
                        <h2 class="bill-product__text">Thông tin đơn hàng</h2>
                        <div class="bill-product__noti">
                            <p class="bill-product__noti-code">Mã đơn hàng: <span class="bill-product__noti-text">#<?=$order['orderCode'];?></span></p>
                            <p class="bill-product__noti-code">Ngày tạo: <span class="bill-product__noti-text"><?=date('H:i:s d/m/Y', strtotime($order['created']));?></span></p>
                        </div>
                        <form action="" method="">
                            <table class="bill-product__table-1">
                                <tr class="tr-pay">
                                    <th><label for="" class="bill-product__th">Sản phẩm</label></th>
                                    <th><label for="" class="bill-product__th">Số lượng</label></th>
                                    <th><label for="" class="bill-product__th">Đơn giá</label></th>
                                    <th><label for="" class="bill-product__th">Tổng</label></th>
                                </tr>

                                <?php foreach($products as $products): ?>
                                <tr>
                                   <td><span class="bbill-product__span-text">(8GB DDR4 1x8G 3000) RAM G.SKILL Trident Z RGB CL16-18-18-38</span></td>
                                   <td><span class="bbill-product__span-text text-cent">1</span></td>
                                   <td><span class="bbill-product__span-text">1,550,000 VNĐ</span></td>
                                   <td><span class="bbill-product__span-text">1,550,000</span></td>
                                </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td>
                                        <tr>
                                            <td><span class="bbill-product__pay-text">Tổng cộng:</span></td>
                                            <td><span class="bbill-product__pay-sum">3,140,000 VNĐ</span></td>
                                        </tr>
                                    </td>
                                    <td>
                                        <tr>
                                            <td><span class="bbill-product__pay-text">Phí vận chuyển</span></td>
                                            <td><span class="bbill-product__pay-sum">30,000 VNĐ</span></td>
                                        </tr>
                                    </td>
                                    <td>
                                        <tr>
                                            <td><span class="bbill-product__pay-text">Voucher:</span></td>
                                            <td><span class="bbill-product__pay-sum">-0 VNĐ</span></td>
                                        </tr>
                                    </td>
                                    <td>
                                        <tr>
                                            <td><span class="bbill-product__pay-text">Tổng thành tiền</span></td>
                                            <td><span class="bbill-product__pay-sum">3,170,000 VNĐ</span></td>
                                        </tr>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <p class="bill-noti">Trang thái hóa đơn: <span>Thánh toán thành công</span></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>