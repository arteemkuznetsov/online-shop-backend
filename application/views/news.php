<?php
global $news;
global $news_aside;
global $params;

global $number_of_pages;
global $current_page;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="includes/css/stylesheet.css">
    <link rel="shortcut icon" href="includes/img/favicon.png" type="image/png">
    <link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="includes/js/script.js"></script>
    <title>Company - Новости</title>
</head>

<body>
<?php
include 'includes/template_header.php'
?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <h1 class="invisible">Архив новостей</h1>
            <nav class="bread-crumbs-container">
                <ul class="bread-crumbs">
                    <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                    <li class="bread-crumb bread-crumb_current">Новости</li>
                </ul>
            </nav>
            <ul class="news-list">
                <?php
                for ($i = 0; $i < sizeof($news); $i++) {
                    echo '<li class="news-item">
                        <a class="news-item__link" href="news-detail.php?id=' . $news[$i]['id'] . '">
                            ' . $news[$i]['header'] . '
                        </a>
                        <span class="news-item__date">' . $news[$i]['date'] . '</span>
                    </li>';
                }
                ?>
            </ul>
            <ul class="paginator catalog-page__paginator">
                <?php
                if ($number_of_pages > 0) {
                    for ($i = 0; $i < $number_of_pages; $i++) {
                        $practical_page = $i + 1; // фактическая страница. мы же не с нуля считаем, когда страницы видим?
                        if ($practical_page != $current_page) { // нетекущая страница
                            echo '<li class="paginator__elem"><a href="news.php?page=' . $practical_page . '" class="paginator__link">' . $practical_page . '</a></li>';
                        } else { // текущая страница
                            echo '<li class="paginator__elem paginator__elem_current"><a href="news.php?page=' . $current_page . '" class="paginator__link">' . $practical_page . '</a></li>';
                        }
                    }
                    echo '<li class="paginator__elem paginator__elem_next"><a href="news.php?page=';
                    if ($current_page < $number_of_pages) {
                        echo ++$current_page;
                    } else {
                        echo $current_page;
                    }
                    // ГДЕ ТО ТУТ ЗАПОМИНАЕМ $QUERY
                    echo '" class="paginator__link">Следующая
                        страница</a></li>';
                }
                ?>
            </ul>
        </main>
        <div class="sidebar">
            <section class="catalog">
                <h2 class="sidebar__headline">Каталог</h2>
                <ul class="catalog-list">
                    <?php
                    for ($i = 0; $i < sizeof($categories); $i++) {
                        echo '<li class="catalog-list__item"><a class="catalog-list__link" href="catalog.php?id=' . $categories[$i]['id'] . '">' . $categories[$i]['name'] . '</a></li>';
                    }
                    ?>
                </ul>
            </section>
            <section class="news">
                <h2 class="sidebar__headline news__headline">Новости</h2>
                <ul class="news-list">
                    <?php
                    for ($i = 0; $i < $params['news_on_side']; $i++) {
                        echo '<li class="news-item">
                        <a class="news-item__link" href="news-detail.php?id=' . $news_aside[$i]['id'] . '">
                            ' . $news_aside[$i]['header'] . '
                        </a>
                        <span class="news-item__date">' . $news_aside[$i]['date'] . '</span>
                    </li>';
                    }
                    ?>
                </ul>
                <span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
            </section>
        </div>
    </div>
</div>
<?php
include 'includes/template_footer.php'
?>
</body>

</html>