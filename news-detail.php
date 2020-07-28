<?php
require_once 'includes/lib.php';
global $active_tab;

if (!isset($_GET['id'])) {
    header('Location: 404.php');
    die();
}
else {
    $id = $_GET['id'];
}

$active_tab = 'news';

require_once 'application/models/news-detail.php';
