<?php

function contact_index()
{
	$data = array();
    
    $data['template_file'] = 'page/contact.php';
    render('layout.php', $data);
}