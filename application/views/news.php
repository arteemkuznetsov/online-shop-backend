<!DOCTYPE html>
<html lang="ru">
<?php
require_once 'includes/template_head.php'
?>
<body>
<?php
include 'includes/template_header.php'
?>
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
        <?php
        require_once 'includes/template_paginator.php'
        ?>
    <?php
    endif; ?>
</ul>
<?php
require_once 'includes/template_sidebar.php'
?>
<?php
include 'includes/template_footer.php'
?>
</body>
</html>