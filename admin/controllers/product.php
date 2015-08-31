<?php

function product_list() {
    $data = array();
    
    $data['products'] = model('product')->getAll();
    $data['template_file'] = 'product/list.php';

    render('layout.php', $data);
}

function product_add() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        
        if (model('product')->addToProduct($postData)) {
            redirect('index.php?c=product&m=list');
        }
    }
    
    $data['template_file'] = 'product/add.php';
    render('layout.php', $data);
}

function product_delete() {   
    model('product')->deleteById($_GET['id']);
    redirect('index.php?c=product&m=list');
}

function product_edit() {   
    if (isPostRequest()) {
        $postData = postData();
        model('product')->updateById($postData, $_GET['id']);
        redirect('index.php?c=product&m=list');
    }
    
    $data = array();
    $data['product'] = model('product')->findOne($_GET['id']);
    $data['template_file'] = 'product/edit.php';
    
    render('layout.php', $data);
}