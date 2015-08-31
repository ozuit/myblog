<?php

function product_list()
{
	$data = array();
    
    $data['products'] = model('product')->getAllDesc(12);
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
    
    $data['products'] = model('product')->getAllDesc(12);
    $data['sidebar'] = 'blocks/sidebar_shop.php';
    $data['template_file'] = 'shop/list.php';
    render('layout.php', $data);
}
