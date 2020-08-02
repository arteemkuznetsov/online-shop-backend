<?php

// для передачи в get_number_of_pages(), чтобы строки не брались из ниоткуда
const NEWS     = 'news';
const PRODUCTS = 'products';

$params = [
    // database params
    'servername' => 'localhost',
    'username'   => 'root',
    'password'   => 'admin',
    'database'   => 'company',
    'port'       => '3306',

    'products_on_page' => 12,
    'news_on_side'     => 6,
    'news_on_page'     => 8,
];

$menu_items = [
    [
        'resource_name' => 'index',
        'item_name'     => 'Главная',
    ],
    [
        'resource_name' => 'catalog',
        'item_name'     => 'Каталог',
    ],
    [
        'resource_name' => 'about',
        'item_name'     => 'О компании',
    ],
    [
        'resource_name' => 'news',
        'item_name'     => 'Новости',
    ],
    [
        'resource_name' => 'paydelivery',
        'item_name'     => 'Доставка и оплата',
    ],
    [
        'resource_name' => 'contacts',
        'item_name'     => 'Контакты',
    ],
];
