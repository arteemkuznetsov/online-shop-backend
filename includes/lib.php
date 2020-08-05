<?php

require_once 'config.php';

function connectDb()
{
    $conn = new mysqli(
        PARAMS['servername'],
        PARAMS['username'],
        PARAMS['password'],
        PARAMS['database'],
        PARAMS['port']
    );

    if ($conn->connect_error) {
        die('Database connect error!');
    } else {
        return $conn;
    }
}

function getNews($conn)
{
    $news = [];

    $result = $conn->query("SELECT * FROM news ORDER BY date DESC LIMIT 0, " .
                           PARAMS['news_on_side']
    );
    while ($row = $result->fetch_assoc()) {
        $news[$row['id']] = $row;
    }

    return $news;
}

function getCategories($conn)
{
    $categories = [];

    $sql = "SELECT * FROM categories LIMIT 0, " . PARAMS['categories_on_side'];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $categories[$row['id']] = $row;
    }

    return $categories;
}

// расширение меню
function extendMenu($titles, $array, $afterItem)
{
    $menu = [];
    foreach ($titles as $resource => $name) {
        $menu[] = [
            'name' => $name,
            'resource' => $resource,
            'level' => 1
        ];
    }

    $submenu = [];
    $position = 0;

    foreach ($menu as $key => $menuItem) { // ищем в каждом подмассиве меню
        if ($menuItem['resource'] == $afterItem) {
            $position = $key;
            break;
        }
    }
    $first = array_slice($menu, 0, $position + 1);
    $second = array_slice($menu, $position);

    foreach ($array as $item) {
        $submenu[] = [
            'name' => $item['name'],
            'resource' => $afterItem . '.php?id=' . $item['id'],
            'level' => 2
        ];
    }
    $menu = array_merge($first, $submenu, $second);

    return $menu;
}

function renderPaginator($uri_query)
{
    global $activeTab, $numberOfPages, $currentPage; ?>
    <ul class="paginator catalog-page__paginator">
        <?php
        if ($numberOfPages > 0) :
            for ($i = 0; $i < $numberOfPages; $i++) :
                $practicalPage = $i + 1; // фактическая страница
                if ($practicalPage != $currentPage) : // нетекущая страница
                    ?>
                    <li class="paginator__elem">
                        <a href="<?= $activeTab ?>.php?<?= $uri_query ?>&page=<?=
                        $practicalPage ?>"
                           class="paginator__link"><?= $practicalPage ?>
                        </a>
                    </li>
                <?php
                else : // текущая страница
                    ?>
                    <li class="paginator__elem paginator__elem_current">
                        <a href="<?= $activeTab ?>.php?<?php
                        if ($activeTab == 'catalog')
                            echo $uri_query ?>&page=<?= $currentPage ?>"
                           class="paginator__link"><?= $practicalPage ?>
                        </a>
                    </li>
                <?php
                endif;
            endfor; ?>
            <li class="paginator__elem paginator__elem_next">
                <a href="<?= $activeTab ?>.php?<?= $uri_query ?>&page=<?php
                if ($currentPage < $numberOfPages) :
                    echo ++$currentPage;
                else :
                    echo $currentPage;
                endif;
                ?>" class="paginator__link">Следующая страница</a>
            </li>
        <?php
        endif; ?>
    </ul>
    <?php
}

function getNumberOfPages($conn, $sql, $type)
{
    // считаем количество страниц для составления пагинации
    $result = $conn->query($sql);
    $numRows = 1;
    while ($row = $result->fetch_assoc()) {
        $numRows = $row['COUNT(*)'];
    }

    return ceil(
        $numRows / PARAMS[$type . '_on_page'] // news or products
    ); // округляем вверх полученное число
}
