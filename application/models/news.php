<?php
require_once 'includes/lib.php';

$news_main = [];
$news = [];
$sql = "SELECT id, header, date FROM news ORDER BY date DESC";

// считаем количество страниц для составления пагинации
$all_pages_result = $conn->query($sql);
$num_rows = $all_pages_result->num_rows;
$number_of_pages = ceil($num_rows / $params['news_on_page']); // округляем вверх полученное число

if (!$conn->connect_error) {
    if (isset($_GET['page']) &&
        (int)$_GET['page'] > 0 &&
        (int)$_GET['page'] <= $number_of_pages) {
        $current_page = (int)$_GET['page'];
        $sql = $sql . " LIMIT " . ($current_page - 1) * $params['news_on_page'] . ", " . $params['news_on_page'];
    }
    else { // если page не установлен или page не в промежутке [1; последняя страница], он по умолчанию = 1
        $current_page = 1;
        $sql = $sql . " LIMIT 0, " . $params['news_on_page'];
    }

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $news_main[$row['id']] = array(
            'header' => $row['header'],
            'date' => $row['date']
        );
    }

    get_news_and_categories();
}

require_once 'application/views/news.php';