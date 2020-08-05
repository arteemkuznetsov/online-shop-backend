<?php

$parameters = [];

foreach ($_GET as $parameter => $value) {
    if (! empty($parameter) && $parameter == 'id') {
        $parameters[$parameter] = (int)$value;
    }
}

if (! isset($parameters['id']) ||
    (isset($parameters['id']) && $parameters['id'] <= 0)
) {
    header('Location: 404.html');
} else {
    $activeTab = 'news-detail';
    require_once 'application/models/news-detail.php';
}
