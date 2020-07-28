<?php
global $news_info; // single news
global $news; // all news
global $categories;
global $params;
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
    <title>Company - Интернет-магазин электронных сигарет</title>
</head>

<body>
<?php
include 'includes/template_header.php'
?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <nav class="bread-crumbs-container">
                <ul class="bread-crumbs">
                    <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                    <li class="bread-crumb bread-crumb_current">Новости</li>
                </ul>
            </nav>
            <article class="shipment-article">
                <span class="news-item__date"><?php echo $news_info['date'] ?></span>
                <h1><?php echo $news_info['header'] ?></h1>
                <p><b><?php echo $news_info['announcement'] ?></b></p>
                <p><?php echo $news_info['description'] ?></p>
            </article>
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
                        <a class="news-item__link" href="news-detail.php?id=' . $news[$i]['id'] . '">
                            ' . $news[$i]['header'] . '
                        </a>
                        <span class="news-item__date">' . $news[$i]['date'] . '</span>
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
