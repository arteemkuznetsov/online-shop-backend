<?php
require_once 'includes/lib.php';
global $conn;
global $params;

function redirect404() {
    header('Location: 404.php'); // REDIRECT 404.php
    die();
}

if (!isset($_GET['id'])) {
    redirect404();
}

$id = $_GET['id'];
$sql = "SELECT products.name, products.image, price, description, categories.name AS 'category'
	            FROM products
                INNER JOIN categories
		            ON main_category_id = categories.id
		        WHERE products.id = $id";
$product_info = [];
$categories = [];

if (!$conn->connect_error) {
    $product_result = $conn->query($sql); // запрос информации о продукте

    if ($product_result->num_rows > 0) { // если товар найден
        while ($row = $product_result->fetch_assoc()) { // записываем о нем информацию вместе с категорией по умолчанию
            $product_info = $row;
        }
    } else {
        redirect404();
    }

    if (isset($_GET['cat_id'])) { // если был передан параметр cat_id
        $category_id = $_GET['cat_id'];

        // проверяем на существование категории с таким именем - СДЕЛАТЬ ПОИСК В АССОЦИАТИВНОМ МАССИВЕ!!!!!!
        $category_exists_result = $conn->query("SELECT * FROM categories WHERE id = $category_id");

        if ($category_exists_result->num_rows > 0) { // если такая категория найдена

            // проверяем находится ли в ней товар
            $product_in_category_result = $conn->query(
                "SELECT products.id, products.name, products.image, price
            	        FROM products_categories
                            INNER JOIN products
            		            ON product_id = products.id
            	            INNER JOIN categories
            		            ON category_id = categories.id
            		        WHERE products.id = $id AND categories.id = $category_id;");

            if ($product_in_category_result->num_rows > 0) { // если да, то меняем категорию по умолчанию на cat_id
                while ($row = $category_exists_result->fetch_assoc()) {
                    $product_info['category'] = $row['name'];
                }
            }
            else {
                redirect404();
            }
        } else {
            redirect404();
        }
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
require_once 'application/views/product.php';