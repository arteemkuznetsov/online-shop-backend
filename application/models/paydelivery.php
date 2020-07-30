<?php
require_once 'includes/lib.php';

$news = [];

if (!$conn->connect_error) {
    get_news_and_categories();
}

require_once 'application/views/paydelivery.php';