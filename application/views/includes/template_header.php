<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="alternate"
          href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/script.js"></script>
    <title>Company - <?php
        echo ((isset($title) && ! empty($title))) ? $title
            : $titles[$activeTab] ?></title>
</head>
<body>
<header class="page-header">
    <div class="wrapper">
        <aside class="header-top">
            <?php
            if ($activeTab != 'index'): ?>
                <a href="index.php">
                    <div class="header-logo">
                        <img class="header-logo__image"
                             src="assets/img/logo.png" alt="Логотип" width="95"
                             height="75">
                        <span class="header-logo__caption">Company</span>
                    </div>
                </a>
            <?php
            else: ?>
                <div class="header-logo">
                    <img class="header-logo__image" src="assets/img/logo.png"
                         alt="Логотип" width="95" height="75">
                    <span class="header-logo__caption">Company</span>
                </div>
            <?php
            endif ?>
            <div class="company-info">
                <b class="company-info__tagline">Нанотехнологии здоровья</b>
                <div class="contacts">
                    <a class="contacts__link-mail"
                       href="mailto:info@company.ru">info@company.ru</a>
                    <a class="contacts__link-phone" href="tel:+73833491849">+7
                        (383) 349-18-49</a>
                </div>
            </div>
        </aside>
        <div class="user-info">

        </div>
    </div>
    <nav class="header-nav">
        <div class="wrapper">
            <span class="menu-toggler">Меню</span>
            <ul class="menu-togglable">
                <?php
                $i = 0;
                while ($i < sizeof($menu)) :
                    if ($menu[$i]['level'] == 1) : ?>
                        <li class="header-nav-item">
                        <span <?php
                        if (isset($menu[$i + 1]) && $menu[$i + 1]['level'] == 2 ) : ?>
                            class="header-nav-item__container-for-link"
                        <?php
                        endif; ?>
                        ><a class="header-nav-item__link <?php
                            if ($menu[$i]['resource'] == $activeTab) :
                                echo 'header-nav-item__link_current';
                            endif;
                            ?>"
                            href="<?= $menu[$i]['resource'] ?>.php"><?= $menu[$i]['name'] ?></a>
                        </span>
                            <?php
                            if (isset($menu[$i + 1]) && $menu[$i + 1]['level'] == 2 ) : ?>
                                <ul class="sub-menu">
                                    <?php
                                    $i++;
                                    while ($menu[$i]['level'] == 2) : ?>
                                        <li class="sub-menu__list-item">
                                            <a class="sub-menu__link"
                                               href="<?= $menu[$i]['resource'] ?>"><?= $menu[$i]['name'] ?></a>
                                        </li>
                                        <?php
                                        $i++;
                                    endwhile;
                                    ?>
                                </ul>
                            <?php
                            endif; ?>
                        </li>
                    <?php
                    endif;
                    $i++;
                endwhile; ?>
            </ul>
        </div>
    </nav>
</header>
<div class="content <?php
if ($activeTab == 'product')
    echo 'content__product' ?>">
    <div class="wrapper content__wrapper">
        <main class="<?php
        if ($activeTab == 'index') {
            echo 'categories';
        } else echo 'inside-content' ?>">