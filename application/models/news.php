<?php

require_once 'includes/lib.php';

$news_main  = [];
$news       = [];
$categories = [];
$sql        = "SELECT * FROM news ORDER BY date DESC";

$conn = connect_db();

$number_of_pages = get_number_of_pages($conn, $sql, NEWS);

if (isset($_GET['page']) && (int)$_GET['page'] > 0
    && (int)$_GET['page'] <= $number_of_pages
) {
    $current_page = (int)$_GET['page'];
    $sql          = $sql . " LIMIT " . ($current_page - 1)
                                       * $params['news_on_page'] . ", "
                    . $params['news_on_page'];
} else { // если page не установлен или page не в промежутке [1; последняя страница], он по умолчанию = 1
    $current_page = 1;
    $sql          = $sql . " LIMIT 0, " . $params['news_on_page'];
}

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $news_main[$row['id']] = $row;
}

$news       = get_news($conn);
$categories = get_categories($conn);

require_once 'application/views/news.php';