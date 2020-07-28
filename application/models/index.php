<?php
require_once 'includes/lib.php';
global $conn;
global $params;

$categories = [];
$news = [];

if (!$conn->connect_error) {
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $categories[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image']
        );
    }

    // наша модель должна знать новости
    $result = $conn->query("SELECT id, header, date FROM news ORDER BY date DESC");
    while ($row = $result->fetch_assoc()) {
        $news[] = array(
            'id' => $row['id'],
            'header' => $row['header'],
            'date' => $row['date']
        );
    }
}

require_once 'application/views/index.php';