<!DOCTYPE html>
<html lang="ru">
<?php
require_once 'includes/template_head.php'
?>
<body>
<?php
include 'includes/template_header.php'
?>
<h1 class="invisible">Каталог товаров</h1>
<nav class="bread-crumbs-container">
    <ul class="bread-crumbs">
        <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
        <li class="bread-crumb bread-crumb_current">Каталог</li>
    </ul>
</nav>
<form action="catalog.php" class="search-filter" id="catalog-page__search-filter-1" method="get">
    <?php
    // при добавлении GET-параметров к адресу после отправки формы они стираются. приходится изобретать такое
    // если выбрал категорию, а потом фильтруешь по цене в этой категории
    $multiple_parameters = explode('&', $uri_query)[0];
    $parameter = explode('=', $multiple_parameters);
    // id всегда находится первым в списке параметров (если не писать в URL вручную)
    if ($parameter[0] == 'id') : ?>
        <input hidden name="id" value="<?php echo $parameter[1] ?>">
    <?php endif; ?>
    <span class="search-filter__item">
        <label class="search-filter__label" for="cost-from">Цена</label>
        <input class="search-filter__input" step="0.01" type="number" min="0" name="price_from"
               id="cost-from" placeholder="от"
            <?php if ($price_from != 0): ?>
                value="<?php echo $price_from ?>"
            <?php endif; ?>>
    </span>
    <span class="search-filter__item">
        <label class="search-filter__label" for="cost-to">—</label>
        <input class="search-filter__input" type="number" min="0" name="price_to" id="cost-to"
               placeholder="до"
            <?php if ($price_to != 0): ?>
                value="<?php echo $price_to ?>"
            <?php endif; ?>>
    </span>
    <input class="form-submit search-filter__apply" type="submit" value="Применить">
</form>
<ul class="categories categories__reposition">
    <?php
    if (sizeof($products) > 0) :
        for ($i = 0; $i < sizeof($products); $i++) : ?>
            <li class="category good-piece">
                <a class="category__link" href="product.php?id=<?php echo array_keys($products)[$i] ?>">
                    <img class="category__image good__image"
                         src="<?php if (file_exists('assets/img/products/' . array_values($products)[$i]['image'])) :
                             echo 'assets/img/products/' . array_values($products)[$i]['image'];
                         else :
                             echo 'assets/img/' . array_values($products)[$i]['image'];
                         endif; ?>
                         " alt="<?php echo array_values($products)[$i]['name'] ?>">
                    <span class="category__name-container good_name"><span class="category__name-inner">
                                        <?php echo array_values($products)[$i]['name'] ?></span></span>
                </a>
                <span class="good-price good_price"><?php echo array_values($products)[$i]['price'] ?> <small
                            class="good-price__currency">руб.</small></span>
            </li>
        <?php endfor;
    else :?>
        <p>Найдено 0 товаров</p>
    <?php endif; ?>
</ul>
<?php
require_once 'includes/template_paginator.php';
require_once 'includes/template_sidebar.php';
require_once 'includes/template_footer.php';
?>
</body>
</html>