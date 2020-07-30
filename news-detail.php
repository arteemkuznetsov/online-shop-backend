<?php

if (!isset($_GET['id'])) {
    header('Location: 404.html');
    die();
}
else {
    $id = (int)$_GET['id'];

    $active_tab = 'news-detail';
    require_once 'application/models/news-detail.php';
}
