<?php
require_once 'includes/lib.php';

$news_main = [];
$news = [];
$sql = "SELECT id, header, date FROM news ORDER BY date DESC";

if (!$conn->connect_error) {
    if (isset($_GET['page'])) {
        $current_page = (int)$_GET['page'];
        $sql = $sql . " LIMIT " . ($current_page - 1) * $params['news_on_page'] . ", " . $params['news_on_page'];
    }
    else {
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
    // получаем все новостипо условию, чтобы узнать их количество и сделать пагинации - просто отщипываем LIMIT
    // находим подстроку, которая начинается со вхождения LIMIT, после чего удаляем ее из основной строки
    $sql_no_limit = str_replace(stristr($sql, 'LIMIT'), '', $sql);
    $all_pages_result = $conn->query($sql_no_limit);
    $num_rows = $all_pages_result->num_rows;
    $number_of_pages = ceil($num_rows / $params['news_on_page']); // округляем вверх полученное число

    get_news_and_categories();
}

require_once 'application/views/news.php';