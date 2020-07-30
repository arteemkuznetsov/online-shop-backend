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
                $price_to = (float)$_GET['price_to'];
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

//--------------------------------------------------

// на данный момент SQL не содержит LIMIT, это позволит узнать количество всех товаров по запросу,
// чтобы посчитать количество страниц
$sql_all = $sql;

// считаем количество страниц для пагинации
$all_pages_result = $conn->query($sql_all);
$num_rows = $all_pages_result->num_rows;
$number_of_pages = ceil($num_rows / $params['products_on_page']); // округляем вверх полученное число

//---------------------------------------------------

// LIMIT не должен быть связан WHERE или AND, конкатенируем его к концу запроса без лишних слов
if (isset($_GET['page']) &&
    (int)$_GET['page'] > 0 &&
    (int)$_GET['page'] <= $number_of_pages) {
    $current_page = (int)$_GET['page'];
    $sql = $sql . " LIMIT " . ($current_page - 1) * $params['products_on_page'] . ", " . $params['products_on_page'];
} else { // если page не установлен или page не в промежутке [1; последняя страница], он по умолчанию = 1
    $current_page = 1;
    $sql = $sql . " LIMIT 0, " . $params['products_on_page'];
}

if (!$conn->connect_error) {
    // получаем товары на одну страницу
    $one_page_result = $conn->query($sql);
    while ($row = $one_page_result->fetch_assoc()) {
        $products[$row['id']] = $row;
    }

    get_news_and_categories();

    // а теперь кодируем в URL все параметры,
    // кроме page (он все равно будет устанавливаться с новым значением при переходе на новую страницу)
    // так мы запомним их при переходе на следующую страницу
    $filter_params = $_GET;
    if (isset($filter_params['page'])) {
        unset($filter_params['page']);
    }

    $uri_query = http_build_query($filter_params);
}

require_once 'application/views/catalog.php';
