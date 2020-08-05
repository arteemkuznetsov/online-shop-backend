<?php

require_once 'includes/lib.php';

$conn = connectDb();

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories, 'catalog');
$menu = extendMenu($menu,
                   [0 => ['id' => 1, 'name' => 'История'],
                    1 => ['id' => 2, 'name' => 'Сотрудники']
                   ],
                   'about');

require_once 'application/views/paydelivery.php';
