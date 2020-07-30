<?php
require_once 'includes/lib.php';

$news_info = [];

if (!$conn->connect_error) {
    $result = $conn->query("SELECT * FROM news WHERE id = $id");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $news_info = $row;
        }
    }
    else {
        header('Location: 404.html');
        die();
    }

    get_news_and_categories();
}

require_once 'application/views/news-detail.php';