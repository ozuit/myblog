<?php

function user_update()
{
	$data = array();
    $data['template_file'] = 'user/update.php';
    $data['sidebar'] = 'blocks/sidebar_shop.php';
    $data['user'] = model('user')->getAllById($_SESSION['logged']['id']);

    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->updateById($postData, $_SESSION['logged']['id'])) {
            $data['success'] = 'Thay đổi đã được cập nhật thành công!';
        }
    }

    render('layout.php', $data);
}

function user_check()
{
	$data = array();
    $data['template_file'] = 'user/check.php';
    $data['sidebar'] = 'blocks/sidebar_shop.php';
    $data['payments'] = model('payment')->getAllByUserId($_SESSION['logged']['id']);

    render('layout.php', $data);			
}

function user_cart()
{
	$data = array();

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['id'] as $value) {
            $data['products'][$value] = model('product')->getById($value);
        }
    }
    else {
        $data['products'] = null;
    }
    
    $data['template_file'] = 'user/cart.php';
    $data['sidebar'] = 'blocks/sidebar_shop.php';

    render('layout.php', $data);			
}

function user_total()
{
    $prices = $_POST['price'];
    $total = 0;
    foreach ($prices as $value) {
       $total+= $value;
    }
    echo $total;
}

function user_payment()
{
    $title = $_POST['title'];
    $number = $_POST['number'];
    $price = $_POST['price'];
    $product_id = $_POST['product_id'];

    foreach ($product_id as $id) {
        model('payment')->addPayment($title[$id], $number[$id], $price[$id]);
    }

    echo true;
}

