<?php

function article_show()
{
	$data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        $postData['article_id'] = $_GET['id'];
        model('comment')->addToComment($postData);
    }

    $data['four_articles'] = model('article')->getAllDesc(4);
    $data['four_category'] = model('category')->getAllDesc(4);
    $data['article'] = model('article')->getOneBy($_GET['id']);
    $data['comments'] = model('comment')->getAllCommentByArticleId($_GET['id']);
    $data['template_file'] = 'article/index.php';
    $data['sidebar'] = 'blocks/sidebar.php';

    render('layout.php', $data);
}

