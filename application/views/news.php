<?php

include 'includes/template_header.php'
?>
    <h1 class="invisible">Архив новостей</h1>
    <nav class="bread-crumbs-container">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link"
                                       href="index.php">Главная</a>
            </li>
            <li class="bread-crumb bread-crumb_current">Новости</li>
        </ul>
    </nav>
    <ul class="news-list">
        <?php
        foreach ($news_main as $id => $item) : ?>
            <li class="news-item">
                <a class="news-item__link" href="news-detail.php?id=<?= $id ?>">
                    <?= $item['header'] ?>
                </a>
                <span class="news-item__date"><?= $item['date'] ?></span>
            </li>
        <?php
        endforeach; ?>
    </ul>
<?php
render_paginator('');
require_once 'includes/template_footer.php';
?>