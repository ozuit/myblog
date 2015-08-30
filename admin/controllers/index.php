<?php

function index_index() {
    redirect('index.php' . ((empty($_SESSION['ad_logged'])) ? '?c=auth&m=login' : '?c=article&m=list'));
}
