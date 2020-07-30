<?php
require_once 'includes/lib.php';

$products = [];
$categories = [];
$news = [];

$number_of_pages = 0;
$current_page = 0;
$uri_query = '';

$price_from = 0;
$price_to = 0;

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
                $id = (int)$_GET['id'];
                $conditions[] = "categories.id = $id";
                break;
            case 'price_from':
                $price_from = (float)$_GET['price_from'];
                $conditions[] = "price >= $price_from";
                break;
            case 'price_to':
                $price_to = htmlspecialchars($_GET['price_to']);
                $conditions[] = "price <= $price_to";
                break;
            default:
                break;
        }
    }
    // после перебора всех параметров склеиваем их словом AND
    $sql = $sql . implode(" AND ", $conditions);
}

$sql = $sql . " ORDER BY id DESC "; // вывод товаров от новых к старым

if (!$conn->connect_error) {
    // LIMIT не должен быть связан WHERE или AND, конкатенируем его к концу запроса без лишних слов
    if (isset($_GET['page'])) {
        $current_page = (int)$_GET['page'];
        $sql = $sql . " LIMIT " . ($current_page - 1) * $params['products_on_page'] . ", " . $params['products_on_page'];
    }
    else {
        $current_page = 1;
        $sql = $sql . " LIMIT 0, " . $params['products_on_page'];
    }

    // получаем товары на одну страницу
    $one_page_result = $conn->query($sql);
    while ($row = $one_page_result->fetch_assoc()) {
        $products[$row['id']] = $row;
    }
    // получаем все товары по условию, чтобы узнать их количество и сделать пагинации - просто отщипываем LIMIT
    // находим подстроку, которая начинается со вхождения LIMIT, после чего удаляем ее из основной строки
    $sql_no_limit = str_replace(stristr($sql, 'LIMIT'), '', $sql);
    $all_pages_result = $conn->query($sql_no_limit);
    $num_rows = $all_pages_result->num_rows;
    $number_of_pages = ceil($num_rows / $params['products_on_page']); // округляем вверх полученное число

    get_news_and_categories();

    // а теперь кодируем в URL все параметры,
    // кроме page (он все равно будет устанавливаться с новым значением при переходе на новую страницу)
    // так мы запомним их при переходе на следующую страницу
    if (isset($_GET['page'])) {
        unset($_GET['page']);
    }
    $uri_query = http_build_query($_GET);
}

require_once 'application/views/catalog.php';
