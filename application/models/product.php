<?php

require_once 'includes/lib.php';

$id = $parameters['id'];
$sql = "SELECT products.name, products.image, price, description, categories.id AS 'cat_id', categories.name AS 'category'
	            FROM products
                INNER JOIN categories
		            ON main_category_id = categories.id
		        WHERE products.id = $id";
$productInfo = [];

$conn = connectDb();

$productResult = $conn->query($sql); // запрос информации о продукте

if ($productResult->num_rows > 0) { // если товар найден, записываем о нем информацию вместе с категорией по умолчанию
    while ($row = $productResult->fetch_assoc()) {
        $productInfo = $row;
    }
} else {
    header('Location: 404.html'); // REDIRECT 404.html
}

if (isset($parameters['cat_id'])) { // если был передан параметр cat_id
    $categoryId = $parameters['cat_id'];

    $categoryExistsResult = $conn->query(
        "SELECT * FROM categories WHERE id = $categoryId"
    );

    if ($categoryExistsResult->num_rows > 0) { // если такая категория найдена

        // проверяем находится ли в ней товар
        $productInCategoryResult = $conn->query(
            "SELECT products.id, products.name, products.image, price
            	        FROM products_categories
                            INNER JOIN products
            		            ON product_id = products.id
            	            INNER JOIN categories
            		            ON category_id = categories.id
            		        WHERE products.id = $id AND categories.id = $categoryId;"
        );

        if ($productInCategoryResult->num_rows > 0) {
            // если да, то меняем категорию по умолчанию на cat_id
            while ($row = $categoryExistsResult->fetch_assoc()) {
                $productInfo['cat_id'] = $row['id'];
                $productInfo['category'] = $row['name'];
            }
        } else {
            header('Location: 404.html'); // REDIRECT 404.html
        }
    } else {
        header('Location: 404.html'); // REDIRECT 404.html
    }
}

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories, 'catalog');
$menu = extendMenu($menu,
                   [0 => ['id' => 1, 'name' => 'История'],
                    1 => ['id' => 2, 'name' => 'Сотрудники']
                   ],
                   'about');

$title = $productInfo['name'];

require_once 'application/views/product.php';
