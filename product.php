<?php

$parameters = [];

foreach ($_GET as $parameter => $value) {
    if (! empty($parameter) && ($parameter == 'id' || $parameter == 'cat_id')) {
        $parameters[$parameter] = (int)$value;
    }
}

if (
    ! isset($parameters['id']) ||
    (isset($parameters['id']) && $parameters['id'] <= 0) ||
    (isset($parameters['cat_id']) && $parameters['cat_id'] <= 0)
) {
    header('Location: 404.html');
} else {
    $activeTab = 'product';
    require_once 'application/models/product.php';
}
