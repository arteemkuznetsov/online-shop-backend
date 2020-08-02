<?php

require_once 'config.php';

function connect_db()
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

function get_news($conn)
{
    global $params;
    $news = [];

    $result = $conn->query(
        "SELECT * FROM news ORDER BY date DESC LIMIT 0, "
        . $params['news_on_side']
    );
    while ($row = $result->fetch_assoc()) {
        $news[$row['id']] = $row;
    }

    return $news;
}

function get_categories($conn)
{
    $categories = [];

    $sql    = "SELECT * FROM categories";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $categories[$row['id']] = $row;
    }

    return $categories;
}

function render_paginator(
    $uri_query
) {
    global $active_tab,
           $number_of_pages,
           $current_page; ?>
    <ul class="paginator catalog-page__paginator">
        <?php
        if ($number_of_pages > 0) :
            for ($i = 0; $i < $number_of_pages; $i++) :
                $practical_page = $i
                                  + 1; // фактическая страница. мы же не с нуля считаем, когда страницы видим?
                if ($practical_page != $current_page) : // нетекущая страница
                    ?>
                    <li class="paginator__elem">
                        <a href="<?php
                        echo $active_tab ?>.php?<?php
                        echo $uri_query ?>&page=<?php
                        echo $practical_page ?>"
                           class="paginator__link">
                            <?php
                            echo $practical_page ?>
                        </a>
                    </li>
                <?php
                else : // текущая страница
                    ?>
                    <li class="paginator__elem paginator__elem_current">
                        <a href="<?php
                        echo $active_tab ?>.php?<?php
                        if ($active_tab == 'catalog')
                            echo $uri_query ?>&page=<?php
                        echo $current_page ?>"
                           class="paginator__link">
                            <?php
                            echo $practical_page ?>
                        </a>
                    </li>
                <?php
                endif;
            endfor; ?>
            <li class="paginator__elem paginator__elem_next">
                <a href="<?php
                echo $active_tab ?>.php?<?php
                echo $uri_query ?>&page=<?php
                if ($current_page < $number_of_pages) :
                    echo ++$current_page;
                else :
                    echo $current_page;
                endif;
                ?>" class="paginator__link">Следующая страница</a>
            </li>
        <?php
        endif; ?>
    </ul>
    <?php
}

function get_number_of_pages($conn, $sql, $type)
{
    global $params;
    // считаем количество страниц для составления пагинации
    $all_pages_result = $conn->query($sql);
    $num_rows         = $all_pages_result->num_rows;

    return ceil(
        $num_rows / $params[$type . '_on_page'] // news or products
    ); // округляем вверх полученное число
}

?>
