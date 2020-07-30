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
<?php
require_once 'includes/template_paginator.php';
require_once 'includes/template_sidebar.php';
require_once 'includes/template_footer.php';
?>
</body>
</html>