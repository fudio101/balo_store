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
            echo 'Không đủ số lượng sản phẩm';
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
                if (!is_valid_quantity($index, $cart[$index]['quantity'])) {
                    echo 'Không đủ số lượng sản phẩm';
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
