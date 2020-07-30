<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/script.js"></script>
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
                <?php for ($i = 0; $i < sizeof($news_main); $i++) : ?>
                    <li class="news-item">
                        <a class="news-item__link" href="news-detail.php?id=<?php echo array_keys($news_main)[$i] ?>">
                            <?php echo array_values($news_main)[$i]['header'] ?>
                        </a>
                        <span class="news-item__date"><?php echo array_values($news_main)[$i]['date'] ?></span>
                    </li>
                <?php endfor; ?>
            </ul>
            <ul class="paginator catalog-page__paginator">
                <?php
                if ($number_of_pages > 0) :
                    for ($i = 0; $i < $number_of_pages; $i++) :
                        $practical_page = $i + 1; // фактическая страница. мы же не с нуля считаем, когда страницы видим?
                        if ($practical_page != $current_page) : // нетекущая страница
                            ?>
                            <li class="paginator__elem">
                                <a href="news.php?page=<?php echo $practical_page ?>"
                                   class="paginator__link">
                                    <?php echo $practical_page ?>
                                </a>
                            </li>
                        <?php else : // текущая страница ?>
                            <li class="paginator__elem paginator__elem_current">
                                <a href="news.php?page=<?php echo $current_page ?>"
                                   class="paginator__link">
                                    <?php echo $practical_page ?>
                                </a>
                            </li>
                        <?php endif;
                    endfor; ?>
                    <li class="paginator__elem paginator__elem_next">
                        <a href="news.php?&page=<?php
                        if ($current_page < $number_of_pages) :
                            echo ++$current_page;
                        else :
                            echo $current_page;
                        endif;
                        ?>
                        " class="paginator__link">Следующая страница</a>
                    </li>
                <?php
                endif; ?>
            </ul>
        </main>
        <div class="sidebar">
            <section class="catalog">
                <h2 class="sidebar__headline">Каталог</h2>
                <ul class="catalog-list">
                    <?php for ($i = 0; $i < sizeof($categories); $i++) : ?>
                        <li class="catalog-list__item">
                            <a class="catalog-list__link"
                               href="catalog.php?id=<?php echo array_keys($categories)[$i] ?>"><?php echo array_values($categories)[$i]['name'] ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </section>
            <section class="news">
                <h2 class="sidebar__headline news__headline">Новости</h2>
                <ul class="news-list">
                    <?php for ($i = 0; $i < sizeof($news_main); $i++) : ?>
                        <li class="news-item">
                            <a class="news-item__link" href="news-detail.php?id=<?php echo array_keys($news_main)[$i] ?>">
                                <?php echo array_values($news_main)[$i]['header'] ?>
                            </a>
                            <span class="news-item__date"><?php echo array_values($news_main)[$i]['date'] ?></span>
                        </li>
                    <?php endfor; ?>
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