<?php

if (! isset($_GET['id']) || (isset($_GET['id']) && (int)$_GET['id'] <= 0)) {
    header('Location: 404.html');
} else {
    $id = (int)$_GET['id'];
    $activeTab = 'news-detail';
    require_once 'application/models/news-detail.php';
}
