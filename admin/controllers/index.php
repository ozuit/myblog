<?php

function index_index() {
    redirect('index.php' . (isLogged() ? '?c=article&m=list' : '?c=auth&m=login'));
}
