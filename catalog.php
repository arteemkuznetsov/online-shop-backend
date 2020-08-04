<?php

// проверяется не наличие, а логичность. параметры необязательны
if (
    (isset($_GET['page']) && (int)$_GET['page'] <= 0) ||
    (isset($_GET['id']) && (int)$_GET['id'] <= 0) ||
    (isset($_GET['id']) && empty($_GET['id'])) ||
    (
        isset($_GET['price_from']) && isset($_GET['price_to']) &&
        (float)$_GET['price_from'] > (float)$_GET['price_to']
    ) ||
    (isset($_GET['price_from']) && (float)$_GET['price_from'] < 0) ||
    (isset($_GET['price_to']) && (float)$_GET['price_to'] < 0) ||
    (isset($_GET['price_from']) && empty($_GET['price_from'])) ||
    (isset($_GET['price_to']) && empty($_GET['price_to']))
) {
    header('Location: 404.html');
} else {
    $activeTab = 'catalog';
    require_once 'application/models/catalog.php';
}