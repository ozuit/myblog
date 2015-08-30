<?php
    

function auth_login() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->authLogin($postData)) {
            redirect('index.php');
        } else {
            $data['error_login'] = 'Username hoặc mật khẩu không đúng!';
        }
    }
    
    $data['articles'] = model('article')->all();
    $data['template_file'] = 'page/home.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}

function auth_register() {
    $data = array();
    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['template_file'] = 'auth/register.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    
    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->authRegister($postData)) {
            redirect('index.php');
        } else {
            $data['error_register'] = 'Username đã tồn tại, hãy chọn tên đăng nhập khác!';
            $data['postData'] = $postData;
        }
    }

    render('layout.php', $data);
}

function auth_logout() {
    model('user')->authLogout();
    redirect('index.php?c=index&m=index&p=home');
}