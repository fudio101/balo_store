<?php
require_once("../database/dbhelper.php");
session_start();

if (!empty($_POST)) {
    $action = $_POST['action'];
    switch ($action) {
        case 'add':
            add_to_cart();
            break;
        case 'delete':
            delete_from_cart();
            break;
        case 'update':
            update_cart();
            break;
        case 'getdiscount':
            get_discount();
            break;
        case 'create_order':
            create_order();
            break;
        case 'addcoupon':
            add_coupon();
            break;
    }
}

function update_cart()
{
    if (!empty($_POST['id']) && !empty($_POST['quantity'])) {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        if (!is_valid_quantity($id, $quantity)) {
            echo 'Không đủ số lượng sản phẩm';
            return;
        }
        $cart = $_SESSION['cart'];
        $index = -1;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                $index = $i;
                break;
            }
        }
        if ($index != -1) {
            $cart[$index]['quantity'] = $quantity;
            $_SESSION['cart'] = $cart;
        } else {
            echo 'Sản phẩm không tồn tại!';
        }
    }
}

function delete_from_cart()
{
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        //if cart is not empty, check if item is already in cart
        $cart = $_SESSION['cart'];
        $index = -1;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                $index = $i;
                break;
            }
        }
        if ($index != -1) {
            unset($cart[$index]);
            $cart = array_values($cart);
            $_SESSION['cart'] = $cart;
        } else {
            echo "Sản phẩm không tồn tại!";
        }
    }
}

function add_to_cart()
{
    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        if (!is_valid_quantity($_POST['id'], $_POST['quantity'])) {
            echo 'Không đủ số lượng sản phẩm1';
            return;
        }
        //create array of array with id and quantity
        $item = array(
            'id' => intval($_POST['id']),
            'quantity' => intval($_POST['quantity'])
        );
        //check if cart is empty
        if (empty($_SESSION['cart'])) {
            //if cart is empty, add item to cart
            $_SESSION['cart'][] = $item;
        } else {
            //if cart is not empty, check if item is already in cart
            $cart = $_SESSION['cart'];
            $index = -1;
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $item['id']) {
                    $index = $i;
                    break;
                }
            }
            //if item is not in cart, add item to cart
            if ($index == -1) {
                $_SESSION['cart'][] = $item;
            } else {
                //if item is in cart, update quantity
                $cart[$index]['quantity'] += $item['quantity'];
                if (!is_valid_quantity($item['id'], $cart[$index]['quantity'])) {
                    echo 'Không đủ số lượng sản phẩm ';
                    return;
                }
                $_SESSION['cart'] = $cart;
            }
        }
    }
}

function get_Quantities()
{
    $sql = "SELECT `id`, (`number`-`number_buy`) AS `quantity` FROM `db_product` WHERE `status`=1";
    $result = executeResult($sql);
    return $result;
}

function is_valid_quantity($id, $quantity)
{
    $quantities = get_Quantities();
    foreach ($quantities as $item) {
        if ($item['id'] == $id && $item['quantity'] >= $quantity) {
            return true;
        }
    }
    return false;
}

function get_discount()
{
    $couponCode = isset($_POST['couponcode']) ? $_POST['couponcode'] : '';

    $total = isset($_POST['total']) ? $_POST['total'] : 0;
    $sql = "SELECT * FROM `db_discount` 
        WHERE `status`=1 AND `expiration_date`>=CURDATE() AND (`limit_number`-`number_used`)>0 AND `code`='$couponCode' AND `payment_limit`<$total";
    $discount = executeResult($sql, true);
    if ($discount != null) {
        echo json_encode($discount);
    } else echo json_encode(array('message' => 'Mã giảm giá không hợp lệ'));
}

function add_coupon()
{
    $coupon = isset($_POST['coupon']) ? $_POST['coupon'] : '';
    $discount = json_decode($coupon, true);

    $_SESSION['coupon'] = $discount;
    echo $coupon;
}

function get_odercode()
{
    return time() . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}

function create_order()
{
    $firstname      = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname       = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $fullname       = "$firstname $lastname";
    $company        = isset($_POST['company']) ? $_POST['company'] : '';
    $province       = isset($_POST['province']) ? $_POST['province'] : '';
    $provinceName   = executeResult("select * from `db_province` where `id`=$province", true)['name'];
    $district       = isset($_POST['district']) ? $_POST['district'] : '';
    $districtName   = executeResult("select * from `db_district` where `id`=$district", true)['name'];
    $address        = isset($_POST['address']) ? $_POST['address'] : '';
    $phoneNumber    = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
    $email          = isset($_POST['email']) ? $_POST['email'] : '';
    $totalCost      = (int)(isset($_POST['totalCost']) ? $_POST['totalCost'] : '');
    $products       = isset($_POST['products']) ? $_POST['products'] : '';
    $cart           = isset($_POST['cart']) ? $_POST['cart'] : '';
    $priceShip      = (int)(isset($_POST['priceShip']) ? $_POST['priceShip'] : '');
    $discount_price = (int)(isset($_POST['discount_price']) ? $_POST['discount_price'] : '');
    $amount_pay     = (int)(isset($_POST['amount_pay']) ? $_POST['amount_pay'] : '');

    $checkPhoneNumber = executeResult("select * from `db_customer` where `phone`='$phoneNumber'", true);
    if ($checkPhoneNumber == null) {
        $fullAddress = $address . ', ' . $districtName . ', ' . $provinceName . '.';
        $sqlAddCustomer =   "INSERT INTO `db_customer`(`phone`, `fullname`, `address`, `email`)
                            VALUES ('$phoneNumber','$fullname','$fullAddress','$email');";
        execute($sqlAddCustomer);
    }

    $orderCode = get_odercode();
    $sqlAddOrder    =   "INSERT INTO `db_order`(`orderCode`, `fullname`, `phone`, `money`, `price_ship`, `coupon`, `province`, `district`, `address`)
    VALUES ('$orderCode','$fullname','$phoneNumber',$totalCost,$priceShip,$discount_price,$province,$district,'$address');";

    execute($sqlAddOrder);

    $sql = "SELECT `id` FROM `db_order` WHERE `orderCode`='$orderCode'";

    $getId = executeResult($sql, true);
    $idOrder = $getId['id'];

    $cartDecode = json_decode($cart);
    foreach ($cartDecode as $product) {
        $productId = $product->id;
        $productQuantity = $product->quantity;
        $getProduct = executeResult("select * from db_product where id=$productId", true);
        $curentBuyQuantity = $getProduct['number_buy'];
        $curentBuyQuantity += $productQuantity;
        execute("UPDATE `db_product` SET `number_buy`=$curentBuyQuantity WHERE `id`=$productId");
        $price = $getProduct['price'];
        $sqlAddDetail = "INSERT INTO `db_orderdetail`(`orderid`, `productid`, `number`, `price`)
                        VALUES ($idOrder,$productId,$productQuantity,'$price');";
        execute($sqlAddDetail);
    }
    echo $orderCode;
    unset($_SESSION['cart']);
    unset($_SESSION['coupon']);
}
