<?php
require_once 'includes/lib.php';
global $conn;
global $params;

$news = [];

if (!$conn->connect_error) {
    $result = $conn->query("SELECT id, header, date FROM news ORDER BY date DESC");
    while ($row = $result->fetch_assoc()) {
        $news[] = array(
            'id' => $row['id'],
            'header' => $row['header'],
            'date' => $row['date']
        );
    }
    // наша наша модель должна знать, какие существуют категории, чтобы вьюшка их вывела
    $result = $conn->query("SELECT * FROM categories");
    while ($row = $result->fetch_assoc()) {
        $categories[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image']
        );
    }
}

require_once 'application/views/news.php';