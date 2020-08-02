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
                                       href="catalog.php?id=<?= $product_info['cat_id'] ?>">
                    <?= $product_info['category'] ?></a>
            </li>
            <li class="bread-crumb bread-crumb_current"><?= $product_info['name'] ?></li>
        </ul>
    </nav>
    <section class="product">
        <h1 class="product__info-block-part product__headline"><?= $product_info['name'] ?></h1>
        <img class="product__image"
             src="assets/img/products/<?= $product_info['image'] ?>"
             alt="Упс! Здесь было фото сигареты, но теперь его нет :(">
        <span class="good-price good_price product__info-block-part product__info-price"><?= $product_info['price'] ?> <small
                    class="good-price__currency">руб.</small></span>
        <article class="product__description">
            <p>
                <?= $product_info['description'] ?>
            </p>
        </article>
    </section>
<?php
require_once 'includes/template_footer.php';
?>