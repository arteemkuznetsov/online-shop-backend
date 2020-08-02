<?php

require_once 'includes/lib.php';

$id           = (int)($_GET['id']);
$sql          = "SELECT products.name, products.image, price, description, categories.id AS 'cat_id', categories.name AS 'category'
	            FROM products
                INNER JOIN categories
		            ON main_category_id = categories.id
		        WHERE products.id = $id";
$product_info = [];

$conn = connect_db();

$product_result = $conn->query($sql); // запрос информации о продукте

if ($product_result->num_rows > 0) { // если товар найден
    while ($row = $product_result->fetch_assoc(
    )) { // записываем о нем информацию вместе с категорией по умолчанию
        $product_info = $row;
    }
} else {
    header('Location: 404.html'); // REDIRECT 404.html
}

if (isset($_GET['cat_id'])) { // если был передан параметр cat_id
    $category_id = (int)($_GET['cat_id']);

    $category_exists_result = $conn->query(
        "SELECT * FROM categories WHERE id = $category_id"
    );

    if ($category_exists_result->num_rows
        > 0
    ) { // если такая категория найдена

        // проверяем находится ли в ней товар
        $product_in_category_result = $conn->query(
            "SELECT products.id, products.name, products.image, price
            	        FROM products_categories
                            INNER JOIN products
            		            ON product_id = products.id
            	            INNER JOIN categories
            		            ON category_id = categories.id
            		        WHERE products.id = $id AND categories.id = $category_id;"
        );

        if ($product_in_category_result->num_rows
            > 0
        ) { // если да, то меняем категорию по умолчанию на cat_id
            while ($row = $category_exists_result->fetch_assoc()) {
                $product_info['cat_id']   = $row['id'];
                $product_info['category'] = $row['name'];
            }
        } else {
            header('Location: 404.html'); // REDIRECT 404.html
        }
    } else {
        header('Location: 404.html'); // REDIRECT 404.html
    }
}

$news       = get_news($conn);
$categories = get_categories($conn);

$title = $product_info['name'];

require_once 'application/views/product.php';