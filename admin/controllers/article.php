<?php

function article_list() {
    $data = array();
    $currentUser = isLogged();
    
    $data['articles'] = model('article')->getAll();
    $data['template_file'] = 'articles/list.php';
    render('layout.php', $data);
}

function article_add() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        $currentUser = isLogged();
        
        if (model('payment')->addToUser($postData, $currentUser['id'])) {
            redirect('/index.php?c=payment&m=list');
        }
    }
    
    $data['template_file'] = 'articles/add.php';
    render('layout.php', $data);
}
