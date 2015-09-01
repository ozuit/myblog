<?php

function product_list()
{
	$data = array();

    $data['sidebar'] = 'blocks/sidebar_shop.php';
    $data['template_file'] = 'shop/list.php';
    render('layout.php', $data);
}

function product_cart()
{
	$data = array();
    
    if (!isset($_SESSION['cart'])) {
    	$_SESSION['cart']['number'] = 1;
        $_SESSION['cart']['id'][$_GET['id']] = $_GET['id'];
    }
    else {
        if (!in_array($_GET['id'], $_SESSION['cart']['id'])) {
            $_SESSION['cart']['number'] = $_SESSION['cart']['number']+1;
            $_SESSION['cart']['id'][$_GET['id']] = $_GET['id'];
        }	
    }

    redirect('index.php?c=user&m=cart');
}

function product_detail()
{
    $detail = model('product')->getDetail($_POST['product_id']);
    echo $detail[0]['description'];
}