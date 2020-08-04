<?php

include 'includes/template_header.php'
?>
    <h1 class="invisible"><?php
        echo ((isset($title) && ! empty($title))) ? $title
            : $titles[$activeTab] ?></h1>
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
        foreach ($newsMain as $id => $item) : ?>
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
renderPaginator('');
require_once 'includes/template_footer.php';
?>