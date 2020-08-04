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
    <span class="news-item__date"><?= $newsInfo['date'] ?></span>
    <h1><?= $newsInfo['header'] ?></h1>
    <p><b><?= $newsInfo['announcement'] ?></b></p>
    <p><?= $newsInfo['description'] ?></p>
</article>
<?php
require_once 'includes/template_footer.php';
?>
