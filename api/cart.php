<?php
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
        }
    }
}

function add_to_cart()
{
    if (isset($_POST['id']) && isset($_POST['quantity'])) {

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
}
