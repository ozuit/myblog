<?php

function page_home() {
	$data = array();

    $data['articles'] = model('article')->all();
    foreach ($data['articles'] as $article) {
        $data['comments'][$article['id']] = model('comment')->countAllByArticleId($article['id']);
        
    }

    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['template_file'] = 'page/home.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}

function page_about() {
	$data = array();
    
    $data['template_file'] = 'page/about.php';
    render('layout.php', $data);
}

function page_contact() {
	$data = array();
    
    $data['template_file'] = 'page/contact.php';
    render('layout.php', $data);
}

function page_category()
{
    $data = array();

    $data['articles'] = model('article')->all();
    foreach ($data['articles'] as $article) {
        $data['comments'][$article['id']] = model('comment')->countAllByArticleId($article['id']);
        
    }
    
    $data['articles'] = model('article')->getAllBy($_GET['id']);
    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['template_file'] = 'page/home.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}
