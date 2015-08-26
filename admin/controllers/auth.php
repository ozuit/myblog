<?php
    
function auth_login() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        if (model('admin')->authLogin($postData)) {
            redirect('index.php?c=article&m=list');
        } else {
            $data['error'] = 'Login failed ! Please try again !';
        }
    }
    
    $data['template_file'] = 'auth/login.php';
    render('layout.php', $data);
}

function auth_logout() {
    model('admin')->authLogout();
    redirect('index.php?c=auth&m=login');
}