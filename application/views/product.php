<?php

include 'includes/template_header.php'
?>
    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link"
                                       href="index.php">Главная</a>
            </li>
            <li class="bread-crumb"><a class="bread-crumb__link"
                                       href="catalog.php">Каталог</a>
            </li>
            <li class="bread-crumb"><a class="bread-crumb__link"
                                       href="catalog.php?id=<?= $productInfo['cat_id'] ?>">
                    <?= $productInfo['category'] ?></a>
            </li>
            <li class="bread-crumb bread-crumb_current"><?= $productInfo['name'] ?></li>
        </ul>
    </nav>
    <section class="product">
        <h1 class="product__info-block-part product__headline"><?= $productInfo['name'] ?></h1>
        <img class="product__image"
             src="assets/img/products/<?= $productInfo['image'] ?>"
             alt="Упс! Здесь было фото сигареты, но теперь его нет :(">
        <span class="good-price good_price product__info-block-part product__info-price"><?= $productInfo['price'] ?> <small
                    class="good-price__currency">руб.</small></span>
        <article class="product__description">
            <p>
                <?= $productInfo['description'] ?>
            </p>
        </article>
    </section>
<?php
require_once 'includes/template_footer.php';
?>