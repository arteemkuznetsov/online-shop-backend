<?php

if (!isset($_GET['id']) ||
    (isset($_GET['id']) && (int)$_GET['id'] <= 0) || // id <= 0
    (isset($_GET['cat_id']) && (int)$_GET['cat_id'] <= 0)) { // cat_id <= 0
    header('Location: 404.html');
}
else {
    $active_tab = 'product';
    require_once 'application/models/product.php';
}
