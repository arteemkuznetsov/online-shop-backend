<?php
require_once 'includes/lib.php';
global $conn;
global $params;
global $sql;

$products = [];
$categories = [];
$news = [];

if (!$conn->connect_error) {
    // получаем товары на одну страницу
    $one_page_result = $conn->query($sql);
    while ($row = $one_page_result->fetch_assoc()) {
        $products[$row['id']] = array(
            'name' => $row['name'],
            'image' => $row['image'],
            'price' => $row['price']
        );
    }
    // получаем все товары по условию, чтобы узнать их количество и сделать пагинации - просто отщипываем LIMIT
    // находим подстроку, которая начинается со вхождения LIMIT, после чего удаляем ее из основной строки
    $sql_no_limit = str_replace(stristr($sql, 'LIMIT'), '', $sql);
    $all_pages_result = $conn->query($sql_no_limit);
    $num_rows = $all_pages_result->num_rows;
    $number_of_pages = ceil($num_rows / $params['products_on_page']); // округляем вверх полученное число

    // наша модель должна знать, какие существуют категории, чтобы вьюшка их вывела
    $result = $conn->query("SELECT * FROM categories");
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

require_once 'application/views/catalog.php';
