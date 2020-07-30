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
    <span class="search-filter__item">
        <label class="search-filter__label" for="cost-from">Цена</label>
        <input class="search-filter__input" step="0.01" type="number" min="0" name="price_from"
               id="cost-from" placeholder="от">
    </span>
    <span class="search-filter__item">
        <label class="search-filter__label" for="cost-to">—</label>
        <input class="search-filter__input" type="number" min="0" name="price_to" id="cost-to"
               placeholder="до">
    </span>
    <input class="form-submit search-filter__apply" type="submit" value="Применить">
</form>
<ul class="categories categories__reposition">
    <?php
    if (sizeof($products) > 0) :
        for ($i = 0; $i < sizeof($products); $i++) : ?>
            <li class="category good-piece">
                <a class="category__link" href="product.php?id=<?php echo array_keys($products)[$i] ?>">
                    <img class="category__image good__image" src="
                                        <?php if (file_exists('assets/img/products/' . array_values($products)[$i]['image'])) :
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
    else :
        echo '<p>Найдено 0 товаров</p>';
    endif; ?>
</ul>
<ul class="paginator catalog-page__paginator">
    <?php
    if ($number_of_pages > 0) :
        for ($i = 0; $i < $number_of_pages; $i++) :
            $practical_page = $i + 1; // фактическая страница. мы же не с нуля считаем, когда страницы видим?
            if ($practical_page != $current_page) : // нетекущая страница
                ?>
                <li class="paginator__elem">
                    <a href="catalog.php?<?php echo $uri_query ?>&page=<?php echo $practical_page ?>"
                       class="paginator__link">
                        <?php echo $practical_page ?>
                    </a>
                </li>
            <?php else : // текущая страница ?>
                <li class="paginator__elem paginator__elem_current">
                    <a href="catalog.php?<?php echo $uri_query ?>&page=<?php echo $current_page ?>"
                       class="paginator__link">
                        <?php echo $practical_page ?>
                    </a>
                </li>
            <?php endif;
        endfor; ?>
        <?php
        require_once 'includes/template_paginator.php'
        ?>
    <?php
    endif; ?>
</ul>
<?php
require_once 'includes/template_sidebar.php'
?>
<?php
include 'includes/template_footer.php'
?>
</body>
</html>