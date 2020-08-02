<?php

include 'includes/template_header.php'
?>
<nav class="bread-crumbs-container">
    <ul class="bread-crumbs">
        <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a>
        </li>
        <li class="bread-crumb bread-crumb_current">Новости</li>
    </ul>
</nav>
<article class="shipment-article">
    <span class="news-item__date"><?= $news_info['date'] ?></span>
    <h1><?= $news_info['header'] ?></h1>
    <p><b><?= $news_info['announcement'] ?></b></p>
    <p><?= $news_info['description'] ?></p>
</article>
<?php
require_once 'includes/template_footer.php';
?>
