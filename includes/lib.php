<?php
require_once 'config.php';

function get_news_and_categories() {
    global $conn, $params,
           $categories, $news; // news[] и categories[] лежат в каждой модели

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $categories[$row['id']] = array(
            'name' => $row['name'],
            'image' => $row['image']
        );
    }

    $result = $conn->query("SELECT id, header, date FROM news ORDER BY date DESC LIMIT 0, " . $params['news_on_side']);
    while ($row = $result->fetch_assoc()) {
        $news[$row['id']] = array(
            'header' => $row['header'],
            'date' => $row['date']
        );
    }
}

$conn = new mysqli(
    $params['servername'],
    $params['username'],
    $params['password'],
    $params['database'],
    $params['port']
);