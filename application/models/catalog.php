<?php

require_once 'includes/lib.php';

$products   = [];
$conditions = [];
$title      = '';

// запрос по умолчанию - вывод всех товаров без повторений. делаем запрос многих ко многим, поэтому DISTINCT
$sql = "SELECT DISTINCT products.id, products.name, products.image, price
	        FROM products_categories
                INNER JOIN products
		            ON product_id = products.id
	            INNER JOIN categories
		            ON category_id = categories.id";

$conn = connect_db();

$news       = get_news($conn);
$categories = get_categories($conn);

/*---------------------------------------*/

// запоминаем все параметры, кроме page - оно задается каждый раз при перелистывании
$filter_params = $_GET;
if (isset($filter_params['page'])) {
    unset($filter_params['page']);
}

// формируем массив условий запроса
if (isset($_GET['id'])) {
    $id           = (int)$_GET['id'];
    $conditions[] = "categories.id = $id";
    $title        = $categories[$id]['name'];
}
if (isset($_GET['price_from'])) {
    $price_from   = (float)$_GET['price_from'];
    $conditions[] = "price >= $price_from";
}
if (isset($_GET['price_to'])) {
    $price_to     = (float)$_GET['price_to'];
    $conditions[] = "price <= $price_to";
}


if (isset($_GET['id']) // если были передан хотя бы один параметр кроме page
    || isset($_GET['price_from'])
    || isset($_GET['price_to'])
) {
    $sql = $sql . " WHERE "; // то добавляем в изначальный запрос WHERE
    // склеиваем все условия словом AND и соединяем с изначальным SQL-запросом
    $sql = $sql . implode(" AND ", $conditions);
}
$sql             = $sql
                   . " ORDER BY id DESC "; // вывод товаров от новых к старым
$number_of_pages = get_number_of_pages($conn, $sql, PRODUCTS);


if (isset($_GET['page'])
    && (int)$_GET['page'] <= $number_of_pages
) {
    $current_page = (int)$_GET['page'];
    $sql          = $sql . " LIMIT " . ($current_page - 1)
                                       * $params['products_on_page'] . ", "
                    . $params['products_on_page'];
} else { // если page не в промежутке [1; последняя страница], он по умолчанию = 1
    $current_page = 1;
    $sql          = $sql . " LIMIT 0, " . $params['products_on_page'];
}

// получаем товары на одну страницу
$one_page_result = $conn->query($sql);
while ($row = $one_page_result->fetch_assoc()) {
    $products[$row['id']] = $row;
}

require_once 'application/views/catalog.php';
