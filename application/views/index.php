<!DOCTYPE html>
<html lang="ru">
<?php
require_once 'includes/template_head.php'
?>
<body>
<?php
include 'includes/template_header.php'
?>
<h1 class="invisible">Company - Электронные сигареты</h1>
<ul class="categories">
    <?php for ($i = 0; $i < sizeof($categories); $i++) : ?>
        <li class="category">
            <a class="category__link" href="catalog.php?id=<?php echo array_keys($categories)[$i] ?>">
                <img class="category__image" src="
                    <?php
                if (file_exists('assets/img/' . array_values($categories)[$i]['image'])) :
                    echo 'assets/img/' . array_values($categories)[$i]['image'];
                else :
                    echo 'assets/img/default.jpg';
                endif; ?>
                        " alt="<?php echo array_values($categories)[$i]['name'] ?>">
                <span class="category__name-container">
                                <span class="category__name-inner"><?php echo array_values($categories)[$i]['name'] ?></span>
                            </span>
            </a>
        </li>
    <?php endfor; ?>
</ul>
<?php
require_once 'includes/template_sidebar.php';
require_once 'includes/template_footer.php';
?>
</body>
</html>