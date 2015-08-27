<?php

function category_list() {
    $data = array();
    
    $data['categories'] = model('category')->getAll();
    $data['template_file'] = 'category/list.php';

    render('layout.php', $data);
}

function category_add() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        
        if (model('category')->addToCategory($postData)) {
            redirect('index.php?c=category&m=list');
        }
    }
    
    $data['template_file'] = 'category/add.php';
    render('layout.php', $data);
}

function category_delete() {   
    model('category')->deleteById($_GET['id']);
    redirect('index.php?c=category&m=list');
}

function category_edit() {   
    if (isPostRequest()) {
        $postData = postData();
        model('category')->updateById($postData, $_GET['id']);
        redirect('index.php?c=category&m=list');
    }
    
    $data = array();
    $data['category'] = model('category')->findOne($_GET['id']);
    $data['template_file'] = 'category/edit.php';
    
    render('layout.php', $data);
}