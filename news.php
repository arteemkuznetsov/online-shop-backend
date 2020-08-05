<?php

$parameters = [];

if (isset($_GET['page']) && ! empty($_GET['page'])) {
    $parameters['page'] = (int)$_GET['page'];
}

if (isset($parameters['page']) && $parameters['page'] <= 0) {
    header('Location: 404.html');
} else {
    $activeTab = 'news';
    require_once 'application/models/news.php';
}
