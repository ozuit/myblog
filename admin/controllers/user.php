<?php

function user_list() {
    $data = array();
    $currentUser = isLogged();
    
    $data['users'] = model('user')->getAll();
    $data['template_file'] = 'user/list.php';
    render('layout.php', $data);
}

function user_delete() {    
    model('user')->deleteById($_GET['id']);
    redirect('index.php?c=user&m=list');
}
