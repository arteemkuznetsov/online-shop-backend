<?php

// все эти параметры необязательные, поэтому в контроллере проверяется не их наличие, а логичность
if ((isset($_GET['page']) && (int)$_GET['page'] <= 0)
    || // page <= 0
    (isset($_GET['id']) && (int)$_GET['id'] <= 0)
    || // id <= 0
    (isset($_GET['price_from']) && isset($_GET['price_to'])
     && (int)$_GET['price_from']
        > (int)$_GET['price_to']) // price_from > price_to
) {
    header('Location: 404.html');
} else {
    $active_tab = 'catalog';
    require_once 'application/models/catalog.php';
}