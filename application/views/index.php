<?php
global $categories;
global $news;
global $params;
?>
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
    <title>Company - Интернет-магазин электронных сигарет</title>
</head>

<body>
<?php
include 'includes/template_header.php'
?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="categories">
            <h1 class="invisible">Company - Электронные сигареты</h1>
            <ul class="categories">
                <?php
                for ($i = 0; $i < sizeof($categories); $i++) {
                    echo '<li class="category">
                    <a class="category__link" href="catalog.php?id=' . $categories[$i]['id'] . '">
                        <img class="category__image" src="';
                    if (file_exists('assets/img/' . $categories[$i]['image'])) {
                        echo 'assets/img/' . $categories[$i]['image'];
                    } else {
                        echo 'assets/img/default.jpg';
                    }
                    echo '" alt="' . $categories[$i]['name'] . '">
                        <span class="category__name-container"><span
                                    class="category__name-inner">' . $categories[$i]['name'] . '</span></span>
                    </a>
                </li>';
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
        <article class="seo-article">
            <h2>Высокое качество японских ножей</h2>
            <p>
                Кухонные японские ножи (ножи masahiro, касуми, хаттори) известных торговых марок уже завоевали
                популярность
                благодаря своей прочности и уникальным качествам - остроте и долговечности заточки. Японские ножи (ножи
                касуми, масахиро, хаттори, кухонные ножи из дамасской стали) - это профессиональные поварские
                инструменты,
                секреты производства которых передаются и шлифуются мастерами из поколения в поколение. Эти японские
                ножи
                обладают особым значением - они своего рода статус шеф-повара, в Японии обладание таким ножом считалось
                показателем высокого мастерства в поварском деле.
            </p>
            <p>
                Сегодня японские ножи соединили в себе древнейшие традиции изготовления самурайских мечей и
                инновационные
                технологии и, именно поэтому японские ножи обладают уникальными свойствами. Сделаны японские ножи только
                из
                высококачественных материалов. Клинок японского ножа делают из высокоуглеродистой стали, что
                обеспечивает его
                высокую прочность и надежность. Следует отметить, что японские ножи эргономичны по своему дизайну, что
                обеспечивает удобство и комфорт в работе. Японские ножи суперострые и после заточки очень долго не
                тупятся,
                благодаря этому уникальному качеству они получили широкую известность. Японские ножи - это прекрасный
                выбор,
                который говорит о требовательности покупателя к высокому качеству ножа и о его превосходном вкусе.
                Кстати,
                нужно отметить, что японские ножи предназначены не только для японской, но и для европейской, а также
                любой
                другой кухни. В известных ресторанах крупнейших городов во всем мире используют именно японские ножи.
                Японские ножи -это профессиональные инструменты для японской кухни (купить японские ножи Вы можете у
                нас).
            </p>
            <p>
                Интернет магазин "Chef" предлагает купить японские ножи (ножи касуми, масахиро), нож для суши. У нас
                есть
                японские ножи из дамасской стали (ножи masahiro, касуми). Дамасская сталь - это не просто причудливый
                узор на
                лезвии ножа, это технология, сочетающая твердую сталь сердцевины клинка для сохранения остроты ножа и
                множество слоев мягкой стали, которая и создает рисунок при заточке, для придания гибкости и прочности
                острой, но хрупкой сердцевине. По этой технологии делались древние острейшие самурайские мечи катаны.
                Ножи из
                дамасской стали прочны, надежны и долговечны, что подтверждено многолетним опытом. Не зря ножи из
                дамасской
                стали бестселлерами продаж. Есть также товары, которые являются результатом современных научных
                технологий:
                титановые, керамические ножи из Японии.
            </p>
        </article>
    </div>
</div>
<?php
include 'includes/template_footer.php'
?>
</body>

</html>