<?php
if (!isset($_GET['id'])) {
    header('Location: 404.html');
    die();
}
else {
    $id = $_GET['id'];
}

$active_tab = 'news';

require_once 'application/models/news-detail.php';
