<?php
require_once 'includes/lib.php';
global $conn;
global $params;

$products = [];
$categories = [];
$news = [];

// запрос по умолчанию - вывод всех товаров без повторений. делаем запрос многих ко многим, поэтому DISTINCT
$sql = "SELECT DISTINCT products.id, products.name, products.image, price
	        FROM products_categories
                INNER JOIN products
		            ON product_id = products.id
	            INNER JOIN categories
		            ON category_id = categories.id";

if (isset($_GET['id']) || isset($_GET['price_from']) || isset($_GET['price_to'])) { // если были переданы параметры кроме page
    $sql = $sql . " WHERE "; // то добавляем в запрос WHERE

    $conditions = [];

    foreach ($_GET as $get_param => $value) {
        switch ($get_param) { // в зависимости от того, что это за параметр, добавляем условие в запрос
            case 'id':
                $id = $_GET['id'];
                $conditions[] = "categories.id = $id";

                // ПРОВЕРКА НА СУЩЕСТВОВАНИЕ ЭТОЙ КАТЕГОРИИ

                break;
            case 'price_from':
                $price_from = $_GET['price_from'];
                $conditions[] = "price >= $price_from";
                break;
            case 'price_to':
                $price_to = $_GET['price_to'];
                $conditions[] = "price <= $price_to";
                break;
            default: // если пользователь ввел в URL чушь, ничего не добавляем
                break;
        }
    }
    // после перебора всех параметров склеиваем их словом AND
    $sql = $sql . implode(" AND ", $conditions);
}

$sql = $sql . " ORDER BY id DESC "; // вывод товаров от новых к старым

if (isset($_GET['page'])) { // LIMIT не должен быть связан WHERE или AND, конкатенируем его к концу запроса без лишних слов
    $current_page = $_GET['page'];
    if ($current_page > 0) { // но только если пользователь снова не написал чушь а-ля "&page=-1"
        $sql = $sql . " LIMIT " . ($current_page - 1) * $params['products_on_page'] .
            ", " . $params['products_on_page'];
    }
    else {
        $current_page = 1;
        $sql = $sql . ' LIMIT 0, ' . $params['products_on_page'];
    }
}
else { // если не указана страница, то она по умолчанию первая (товары 1-12)
    $current_page = 1;
    $sql = $sql . " LIMIT 0, " . $params['products_on_page'];
}

// ЗАПОМНИТЬ ВСЕ ПАРАМЕТРЫ В $_GET КРОМЕ page

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
