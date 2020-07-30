<?php

if (isset($_GET['page']) && (int)$_GET['page'] <= 0) {
    header('Location: 404.html');
}
else {
    $active_tab = 'news';
    require_once 'application/models/news.php';
}
