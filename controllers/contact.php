<?php

function contact_index()
{
	$data = array();
	if (isPostRequest()) {
        $postData = postData();
        
        if (model('contact')->addToContact($postData)) {
            // redirect('index.php?c=contact&m=index');
            $data['success'] = 'Ý kiến đóng góp của bạn đã được ghi nhận lại. Xin cảm ơn!';
        }
    }
    
    $data['template_file'] = 'page/contact.php';
    render('layout.php', $data);
}
