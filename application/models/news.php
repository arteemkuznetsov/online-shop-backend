<?php

require_once 'includes/lib.php';

$newsMain = [];
$news = [];
$categories = [];
$sql = "SELECT * FROM news ORDER BY date DESC";
$sqlPaginatorCount = "SELECT COUNT(*) FROM news";

$conn = connectDb();

$numberOfPages = getNumberOfPages($conn, $sqlPaginatorCount, NEWS);

if (isset($_GET['page']) &&
    (int)$_GET['page'] > 0 &&
    (int)$_GET['page'] <= $numberOfPages
) {
    $currentPage = (int)$_GET['page'];
    $sql = $sql . " LIMIT " . ($currentPage - 1)
                              * $params['news_on_page'] . ", "
           . $params['news_on_page'];
} else {
    // если page не установлен или page не в
    // промежутке [1; последняя страница], он по умолчанию = 1
    $currentPage = 1;
    $sql = $sql . " LIMIT 0, " . $params['news_on_page'];
}

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $newsMain[$row['id']] = $row;
}

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories);

require_once 'application/views/news.php';
