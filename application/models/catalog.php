<?php

require_once 'includes/lib.php';

$products = [];
$conditions = [];
$title = '';

// запрос по умолчанию - вывод всех товаров без повторений. делаем запрос многих ко многим, поэтому DISTINCT
$sql = "SELECT DISTINCT products.id, products.name, products.image, price
	        FROM products_categories
                INNER JOIN products
		            ON product_id = products.id
	            INNER JOIN categories
		            ON category_id = categories.id";

$conn = connectDb();

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories);

/*---------------------------------------*/

// запоминаем все параметры, кроме page - оно задается каждый раз при перелистывании
$filterParams = $_GET;
if (isset($filterParams['page'])) {
    unset($filterParams['page']);
}

// формируем массив условий запроса
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conditions[] = "categories.id = $id";
    $title = $categories[$id]['name'];
}
if (isset($_GET['price_from'])) {
    $priceFrom = (float)$_GET['price_from'];
    $conditions[] = "price >= $priceFrom";
}
if (isset($_GET['price_to'])) {
    $priceTo = (float)$_GET['price_to'];
    $conditions[] = "price <= $priceTo";
}

// если был передан хотя бы один параметр кроме page
if (
    (isset($_GET['id']) ||
     isset($_GET['price_from']) ||
     isset($_GET['price_to'])) &&
    ! empty($conditions)
) { // $sql . " WHERE (условие 1) AND (условие 2) AND..."
    $sql = $sql . " WHERE " . implode(" AND ", $conditions);
}
$sql = $sql . " ORDER BY id DESC "; // вывод товаров от новых к старым
$numberOfPages = getNumberOfPages($conn, $sql, PRODUCTS);


if (isset($_GET['page']) && (int)$_GET['page'] <= $numberOfPages) {
    $currentPage = (int)$_GET['page'];
    $sql = $sql . " LIMIT " . ($currentPage - 1) * $params['products_on_page'] .
           ", " . $params['products_on_page'];
} else { // если page не в промежутке [1; последняя страница], он по умолчанию 1
    $currentPage = 1;
    $sql = $sql . " LIMIT 0, " . $params['products_on_page'];
}

// получаем товары на одну страницу
$onePageResult = $conn->query($sql);
while ($row = $onePageResult->fetch_assoc()) {
    $products[$row['id']] = $row;
}

require_once 'application/views/catalog.php';
