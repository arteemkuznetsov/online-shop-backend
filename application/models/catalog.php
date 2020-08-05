<?php

require_once 'includes/lib.php';

$products = [];
$conditions = [];
$title = '';

// prefixes
$sqlPrefix = "SELECT * FROM products";
$sqlPaginatorPrefix = "SELECT COUNT(*) FROM (";
// middle
$sqlCommonPart = " INNER JOIN products_categories ON product_id = products.id";

$conn = connectDb();

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories, 'catalog');

/*---------------------------------------*/

// формируем массив условий запроса
if (isset($parameters['id'])) { // если задано id категории
    $sql = $sqlPrefix . $sqlCommonPart;
    $sqlPaginator = $sqlPaginatorPrefix . $sql;

    $id = $parameters['id'];
    $conditions[] = "category_id = $id";
    $title = $categories[$id]['name'];
} else {
    $sql = $sqlPrefix;
    $sqlPaginator = $sqlPaginatorPrefix . $sql;
}
if (isset($parameters['price_from'])) {
    $priceFrom = $parameters['price_from'];
    $conditions[] = "price >= $priceFrom";
}
if (isset($parameters['price_to'])) {
    $priceTo = $parameters['price_to'];
    $conditions[] = "price <= $priceTo";
}

// если был передан хотя бы один параметр кроме page
if (! empty($parameters) && ! empty($conditions)) {
    $sql = $sql . " WHERE " . implode(" AND ", $conditions);
    $sqlPaginator = $sqlPaginator . " WHERE " . implode(" AND ", $conditions);
}
$sql = $sql . " ORDER BY id DESC "; // вывод товаров от новых к старым
$sqlPaginator = $sqlPaginator . ") FINAL";

$numberOfPages = getNumberOfPages($conn, $sqlPaginator, PRODUCTS);

if (isset($parameters['page']) && $parameters['page'] <= $numberOfPages) {
    $currentPage = $parameters['page'];
    $sql = $sql . " LIMIT " . ($currentPage - 1) * PARAMS['products_on_page'] .
           ", " . PARAMS['products_on_page'];
} else { // если page не в промежутке [1; последняя страница], он по умолчанию 1
    $currentPage = 1;
    $sql = $sql . " LIMIT 0, " . PARAMS['products_on_page'];
}

// выбрасываем page, так как $currentPage мы уже запомнили
if (isset($parameters['page'])) {
    unset($parameters['page']);
}

// получаем товары на одну страницу
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $products[$row['id']] = $row;
}

require_once 'application/views/catalog.php';
