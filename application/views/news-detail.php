<!DOCTYPE html>
<html lang="ru">
<?php
require_once 'includes/template_head.php'
?>
<body>
<?php
include 'includes/template_header.php'
?>
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
<?php
require_once 'includes/template_sidebar.php'
?>
<?php
include 'includes/template_footer.php'
?>
</body>
</html>
