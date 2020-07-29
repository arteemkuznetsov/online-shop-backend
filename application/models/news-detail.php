<?php
require_once 'includes/lib.php';

global $conn;
global $params;
global $id;

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
    // наша модель должна знать, какие существуют категории, чтобы вьюшка их вывела
    $categories_result = $conn->query("SELECT * FROM categories");
    while ($row = $categories_result->fetch_assoc()) {
        $categories[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image']
        );
    }

    // наша модель должна знать новости
    $news_result = $conn->query("SELECT id, header, date FROM news ORDER BY date DESC");
    while ($row = $news_result->fetch_assoc()) {
        $news[] = array(
            'id' => $row['id'],
            'header' => $row['header'],
            'date' => $row['date']
        );
    }
}

require_once 'application/views/news-detail.php';