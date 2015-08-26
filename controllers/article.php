<?php

function article_show()
{
	$data = array();
    
    $data['article'] = model('article')->getOneBy($_GET['id']);
    $data['comments'] = model('comment')->getAllCommentByArticleId($_GET['id']);
    $data['template_file'] = 'article/index.php';
    $data['sidebar'] = 'blocks/sidebar.php';
    render('layout.php', $data);
}