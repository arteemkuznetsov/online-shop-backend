<?php
require_once 'includes/lib.php';
global $conn;
global $params;

$news = [];
$news_aside = [];
$sql = "SELECT id, header, date FROM news ORDER BY date DESC";

if (!$conn->connect_error) {
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
        if ($current_page > 0) { // но только если пользователь не написал чушь а-ля "&page=-1"
            $sql = $sql . " LIMIT " . ($current_page - 1) * $params['news_on_page'] .
                ", " . $params['news_on_page'];
        }
        else {
            $current_page = 1;
            $sql = $sql . " LIMIT 0, " . $params['news_on_page'];
        }
    }
    else { // если не указана страница, то она по умолчанию первая (товары 1-12)
        $current_page = 1;
        $sql = $sql . " LIMIT 0, " . $params['news_on_page'];
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $news[] = array(
            'id' => $row['id'],
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

    // НОВОСТИ СБОКУ НЕ ДОЛЖНЫ ЗАВИСЕТЬ ОТ ОСНОВНЫХ НОВОСТЕЙ,
    // В Т.Ч. ПРИ ПЕРЕЛИСТЫВАНИИ СТРАНИЦ ОНИ НЕ ДОЛЖНЫ ТАК ЖЕ ПЕРЕЛИСТЫВАТЬСЯ
    $news_result = $conn->query("SELECT id, header, date FROM news ORDER BY date DESC");
    while ($row = $news_result->fetch_assoc()) {
        $news_aside[] = array(
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