<?php

include 'includes/template_header.php'
?>
    <h1 class="invisible"><?php echo ((isset($title) && ! empty($title))) ? $title : $titles[$activeTab] ?></h1>
    <nav class="bread-crumbs-container">
        <ul class="bread-crumbs">
            <li class="bread-crumb">
                <a class="bread-crumb__link" href="index.php">Главная</a>
            </li>
            <? if (!isset($parameters['id'])): ?>
                <li class="bread-crumb bread-crumb_current">Каталог</li>
            <?
            else: ?>
                <li class="bread-crumb">
                    <a class="bread-crumb__link" href="catalog.php">Каталог</a>
                </li>
                <li class="bread-crumb bread-crumb_current"><?= $title ?></li>
            <?php endif;?>
        </ul>
    </nav>
    <form action="catalog.php" class="search-filter"
          id="catalog-page__search-filter-1" method="get">
        <?php
        if (isset($parameters['id'])) : ?>
            <input hidden name="id" value="<?= $parameters['id'] ?>">
        <?php
        endif; ?>
        <span class="search-filter__item">
        <label class="search-filter__label" for="cost-from">Цена</label>
        <input class="search-filter__input" step="0.01" type="number" min="0"
               name="price_from"
               id="cost-from" placeholder="от"
               <?php
               if (isset($priceFrom) && $priceFrom != 0): ?>
                   value="<?= $priceFrom ?>"
               <?php
               endif; ?>>
    </span>
        <span class="search-filter__item">
        <label class="search-filter__label" for="cost-to">—</label>
        <input class="search-filter__input" type="number" min="0"
               name="price_to" id="cost-to"
               placeholder="до"
            <?php
            if (isset($priceTo) && $priceTo != 0): ?>
                value="<?= $priceTo ?>"
            <?php
            endif; ?>>
    </span>
        <input class="form-submit search-filter__apply" type="submit"
               value="Применить">
    </form>
<?php
if (sizeof($products) > 0) : ?>
    <ul class="categories categories__reposition">
    <?php
    foreach ($products as $id => $product) : ?>
        <li class="category good-piece">
            <a class="category__link" href="product.php?id=<?= $id ?>">
                <?php
                if (file_exists('assets/img/products/' . $product['image'])): ?>
                    <img class="category__image good__image" src="assets/img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <?php else: ?>
                    <img class="category__image good__image" src="assets/img/default.jpg" alt="<?= $product['name'] ?>">
                <?php endif; ?>
                    <span class="category__name-container good_name">
                        <span class="category__name-inner"><?= $product['name'] ?></span>
                    </span>
            </a>
            <span class="good-price good_price"><?= $product['price'] ?> <small class="good-price__currency">руб.</small></span>
        </li>
    <?php
    endforeach; ?>
    </ul>
<?php
else :?>
    <p>Найдено 0 товаров</p>
<?php
endif; ?>
<?php
renderPaginator(http_build_query($parameters));
require_once 'includes/template_footer.php';
?>
