<?php

require_once 'includes/lib.php';

$conn = connectDb();

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories, 'catalog');

require_once 'application/views/about.php';
