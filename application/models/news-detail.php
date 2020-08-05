<?php

require_once 'includes/lib.php';

$newsInfo = [];

$conn = connectDb();

$id = $parameters['id'];
$result = $conn->query("SELECT * FROM news WHERE id = $id");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newsInfo = $row;
    }
} else {
    header('Location: 404.html');
}

$news = getNews($conn);
$categories = getCategories($conn);
$menu = extendMenu($titles, $categories, 'catalog');
$menu = extendMenu($menu,
                   [0 => ['id' => 1, 'name' => 'История'],
                    1 => ['id' => 2, 'name' => 'Сотрудники']
                   ],
                   'about');

$title = $newsInfo['header'];

require_once 'application/views/news-detail.php';
