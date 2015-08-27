<?php

function comment_list() {
    $data = array();
    $currentUser = isLogged();
    
    $data['comments'] = model('comment')->getAll();
    $data['template_file'] = 'comment/list.php';
    render('layout.php', $data);
}

function comment_delete() {    
    model('comment')->deleteById($_GET['id']);
    redirect('index.php?c=comment&m=list');
}
