<?php

function contact_list()
{
	$data = array();

	$data['contacts'] = model('contact')->getAll();
	$data['template_file'] = 'contact/list.php';
    render('layout.php', $data);
}

function contact_delete()
{
	$data = array();

	model('contact')->deleteById($_GET['id']);
	$data['contacts'] = model('contact')->getAll();
	$data['template_file'] = 'contact/list.php';
    render('layout.php', $data);
}