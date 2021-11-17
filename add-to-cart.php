<?php
if (isset($_POST['id']) && isset($_POST['quantity'])) {

    session_start();
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
            $_SESSION['cart'] = $cart;
        }
    }

    echo "Thêm sảm phẩm thành công";
}
