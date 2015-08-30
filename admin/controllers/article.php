<?php

function article_list() {
    $data = array();
    
    $data['articles'] = model('article')->getAll();
    $data['template_file'] = 'articles/list.php';

    render('layout.php', $data);
}

function article_add() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        
        if (model('article')->addToArticle($postData)) {
            redirect('index.php?c=article&m=list');
        }
    }
    
    $data['categories'] = model('category')->getAll();
    $data['template_file'] = 'articles/add.php';
    render('layout.php', $data);
}

function article_delete() {   
    model('article')->deleteById($_GET['id']);
    redirect('index.php?c=article&m=list');
}

function article_edit() {   
    if (isPostRequest()) {
        $postData = postData();
        model('article')->updateById($postData, $_GET['id']);
        redirect('index.php?c=article&m=list');
    }
    
    $data = array();
    $data['categories'] = model('category')->getAllBy('id');
    $data['article'] = model('article')->findOne($_GET['id']);
    $data['template_file'] = 'articles/edit.php';
    
    render('layout.php', $data);
}