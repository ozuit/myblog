<?php

function home_index() {
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

function home_category()
{
    $data = array();

    $data['articles'] = model('article')->all();
    foreach ($data['articles'] as $article) {
        $data['comments'][$article['id']] = model('comment')->countAllByArticleId($article['id']);
        
    }
    
    $data['articles'] = model('article')->getAllBy('category_id', $_GET['id']);
    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['template_file'] = 'page/home.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}

function home_showArticle()
{
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        $postData['article_id'] = $_GET['id'];
        model('comment')->addToComment($postData);
    }

    $data['tags'] = model('article')->getTagsBy($_GET['id']);
    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['article'] = model('article')->getOneBy($_GET['id']);
    $data['comments'] = model('comment')->getAllCommentByArticleId($_GET['id']);
    $data['template_file'] = 'page/article.php';
    $data['sidebar'] = 'blocks/sidebar.php';

    render('layout.php', $data);
}

function home_tag()
{
    $data = array();
    $tag_name = trim($_GET['n']);
    $tag_id = model('article')->getTagIdBy($tag_name)['id'];
    
    $data['articles_id'] = model('article')->getArticleIdBy($tag_id);

    foreach ($data['articles_id'] as $article_id) {
        $data['articles'][] = model('article')->getAllBy('id', $article_id['article_id'])[0];
    }

    foreach ($data['articles'] as $article) {
        $data['comments'][$article['id']] = model('comment')->countAllByArticleId($article['id']);   
    }
    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['template_file'] = 'page/home.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}