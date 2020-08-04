<?php

require_once 'includes/lib.php';

$conn = connectDb();

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories);

require_once 'application/views/paydelivery.php';
