<?php

function payment_list()
{
	$data = array();
    
    $data['payments'] = model('payment')->getAll();
    $data['template_file'] = 'payment/list.php';

    render('layout.php', $data);
}

function payment_delete()
{
	$data = array();
    
    model('payment')->deleteById($_GET['id']);
    $data['payments'] = model('payment')->getAll();
    $data['template_file'] = 'payment/list.php';

    render('layout.php', $data);
}

function payment_update()
{
	if (isPostRequest()) {
        $postData = postData();
        model('payment')->updateById($postData, $_GET['id']);
        redirect('index.php?c=payment&m=list');
    }
    
    $data = array();
    $data['payment'] = model('payment')->getAllBy($_GET['id']);
    $data['template_file'] = 'payment/update.php';
    render('layout.php', $data);
}