<?php

require_once 'includes/lib.php';

$news_info = [];

$conn = connect_db();

$result = $conn->query("SELECT * FROM news WHERE id = $id");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news_info = $row;
    }
} else {
    header('Location: 404.html');
}

$news       = get_news($conn);
$categories = get_categories($conn);

$title = $news_info['header'];

require_once 'application/views/news-detail.php';