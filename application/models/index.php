<?php
require_once 'includes/lib.php';

$categories = [];
$news = [];

if (!$conn->connect_error) {
    get_news_and_categories();
}

require_once 'application/views/index.php';