<?php

$parameters = [];

// приведение параметров
foreach ($_GET as $parameter => $value) {
    if (! empty($parameter)) {
        switch ($parameter) {
            case ('id' || 'page'):
                $parameters[$parameter] = (int)$value;
                break;
            case ('price_from' || 'price_to'):
                $parameters[$parameter] = (float)$value;
                break;
            default:
                break;
        }
    }
}

if (
    (isset($parameters['page']) && $parameters['page'] <= 0) ||
    (isset($parameters['id']) && $parameters['id'] <= 0) ||
    (isset($parameters['price_from']) && isset($parameters['price_to']) &&
     $parameters['price_from'] > $parameters['price_to']) ||
    (isset($parameters['price_from']) && $parameters['price_from'] < 0) ||
    (isset($parameters['price_to']) && $parameters['price_to'] < 0)
) {
    header('Location: 404.html');
} else {
    $activeTab = 'catalog';
    require_once 'application/models/catalog.php';
}