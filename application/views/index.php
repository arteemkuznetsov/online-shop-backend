<?php

include 'includes/template_header.php'
?>
    <h1 class="invisible"><?php
        echo ((isset($title) && ! empty($title))) ? $title
            : $titles[$activeTab] ?></h1>
    <ul class="categories">
        <?php
        foreach ($categories as $id => $category) : ?>
            <li class="category">
                <a class="category__link" href="catalog.php?id=<?= $id ?>">
                    <img class="category__image" src="
                    <?php
                    if (file_exists(
                        'assets/img/' . $category['image']
                    )
                    ) :
                        echo 'assets/img/' . $category['image'];
                    else :
                        echo 'assets/img/default.jpg';
                    endif; ?>
                        " alt="<?= $category['name'] ?>">
                    <span class="category__name-container">
                                <span class="category__name-inner"><?= $category['name'] ?></span>
                            </span>
                </a>
            </li>
        <?php
        endforeach; ?>
    </ul>
<?php
require_once 'includes/template_footer.php';
?>