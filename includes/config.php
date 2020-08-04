<?php

// для передачи в get_number_of_pages(), чтобы строки не брались из ниоткуда
const NEWS = 'news';
const PRODUCTS = 'products';

$params = [
    // database params
    'servername' => 'localhost',
    'username' => 'root',
    'password' => 'admin',
    'database' => 'company',
    'port' => '3306',

    'products_on_page' => 12,
    'news_on_side' => 6,
    'news_on_page' => 8
];

// заголовки страниц и элементы меню
$titles = [
    'index' => 'Главная',
    'catalog' => 'Каталог',
    'about' => 'О компании',
    'news' => 'Новости',
    'paydelivery' => 'Доставка и оплата',
    'contacts' => 'Контакты'
];

