<?php

require_once 'config.php';

function connectDb()
{
    global $params;

    $conn = new mysqli(
        $params['servername'],
        $params['username'],
        $params['password'],
        $params['database'],
        $params['port']
    );

    if ($conn->connect_error) {
        die('Database connect error!');
    } else {
        return $conn;
    }
}

function getNews($conn)
{
    global $params;
    $news = [];

    $result = $conn->query("SELECT * FROM news ORDER BY date DESC LIMIT 0, " .
                           $params['news_on_side']
    );
    while ($row = $result->fetch_assoc()) {
        $news[$row['id']] = $row;
    }

    return $news;
}

function getCategories($conn)
{
    global $params;
    $categories = [];

    $sql = "SELECT * FROM categories LIMIT 0, " . $params['categories_on_side'];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $categories[$row['id']] = $row;
    }

    return $categories;
}

// расширение меню
function extendMenu($titles, $categories)
{
    // узнаем числовую позицию ключа 'catalog' среди ключей массива $titles
    $catalogElemPosition = array_search("catalog", array_keys($titles));
    // отрезаем от $titles часть до 'catalog', ВКЛЮЧАЯ его
    $firstArrayPart = array_slice($titles, 0, $catalogElemPosition + 1);
    // отрезаем все после, НЕ ВКЛЮЧАЯ 'catalog'
    $secondArrayPart = array_slice($titles, $catalogElemPosition + 1);

    // приклеиваем между ними массив категорий
    return $firstArrayPart + ['categories' => $categories] + $secondArrayPart;
}

function renderMenuItem($item, $resource, $activeTab)
{
    ?>
    <li class="header-nav-item">
    <span<?php
    if ($resource == 'catalog'): ?>
        class="header-nav-item__container-for-link"
    <?php
    endif; ?>>
            <a class="header-nav-item__link <?php
            if ($resource == $activeTab) :
                echo 'header-nav-item__link_current';
            endif;
            ?>" href="<?= $resource ?>.php"><?= $item ?></a>
        </span>
    <?php
}

function renderSubmenu($item)
{
    ?>
    <ul class="sub-menu">
        <?php
        foreach ($item as $id => $category) : ?>
            <li class="sub-menu__list-item">
                <a class="sub-menu__link"
                   href="catalog.php?id=<?= $id ?>"><?= $category['name'] ?></a>
            </li>
        <?php
        endforeach; ?>
    </ul>
    </li>
    <?php
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
    global $params;
    // считаем количество страниц для составления пагинации
    $result = $conn->query($sql);
    $numRows = 1;
    while ($row = $result->fetch_assoc()) {
        $numRows = $row['COUNT(*)'];
    }

    return ceil(
        $numRows / $params[$type . '_on_page'] // news or products
    ); // округляем вверх полученное число
}
