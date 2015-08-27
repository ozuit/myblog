<?php
    

function auth_login() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->authLogin($postData)) {
            redirect('index.php');
        } else {
            $data['error_login'] = 'Login failed ! Please try again !';
        }
    }
    
    $data['articles'] = model('article')->all();
    $data['template_file'] = 'page/home.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}

function auth_register() {
    $data = array();
    $data['template_file'] = 'auth/register.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    
    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->authRegister($postData)) {
            redirect('index.php');
        } else {
            $data['error_register'] = 'Register failed ! Email exists ! Please try again !';
            $data['postData'] = $postData;
        }
    }

    render('layout.php', $data);
}

function auth_logout() {
    model('user')->authLogout();
    redirect('index.php?c=index&m=index&p=home');
}