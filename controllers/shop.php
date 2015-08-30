<?php

function shop_list()
{
	$data = array();
    
    $data['sidebar'] = 'blocks/sidebar_shop.php';
    $data['template_file'] = 'shop/list.php';
    render('layout.php', $data);
}