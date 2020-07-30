<?php
global $categories;
global $active_tab;
?>
<header class="page-header">
    <div class="wrapper">
        <aside class="header-top">
            <?php
            if ($active_tab != 'index') {
                echo '<a href="index.php">
                <div class="header-logo">
                    <img class="header-logo__image" src="assets/img/logo.png" alt="Логотип" width="95" height="75">
                    <span class="header-logo__caption">Company</span>
                </div>
            </a>';
            }
            else {
                echo '<div class="header-logo">
                    <img class="header-logo__image" src="assets/img/logo.png" alt="Логотип" width="95" height="75">
                    <span class="header-logo__caption">Company</span>
                </div>';
            }
            ?>
            <div class="company-info">
                <b class="company-info__tagline">Нанотехнологии здоровья</b>
                <div class="contacts">
                    <a class="contacts__link-mail" href="mailto:info@company.ru">info@company.ru</a>
                    <a class="contacts__link-phone" href="tel:+73833491849">+7 (383) 349-18-49</a>
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
                <li class="header-nav-item"><span><a class="header-nav-item__link
                <?php
                        if ($active_tab == 'index') {
                            echo 'header-nav-item__link_current';
                        }
                        ?>" href="index.php">Главная</a></span>
                </li>
                <li class="header-nav-item">
						<span class="header-nav-item__container-for-link"><a
                                    class="header-nav-item__link
                                <?php
                                    if ($active_tab == 'catalog') {
                                        echo 'header-nav-item__link_current';
                                    }
                                    ?>"
                                    href="catalog.php">Каталог</a></span>
                    <ul class="sub-menu">
                        <?php
                        for ($i = 0; $i < sizeof($categories); $i++) {
                            echo '<li class="sub-menu__list-item"><a class="sub-menu__link" href="catalog.php?id=' . $categories[$i]['id'] . '">' . $categories[$i]['name'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="header-nav-item"><span><a class="header-nav-item__link
                        <?php
                        if ($active_tab == 'about') {
                            echo 'header-nav-item__link_current';
                        }
                        ?>" href="about.php">О компании</a></span></li>
                <li class="header-nav-item"><span><a class="header-nav-item__link
                        <?php
                        if ($active_tab == 'news') {
                            echo 'header-nav-item__link_current';
                        }
                        ?>" href="news.php">Новости</a></span></li>
                <li class="header-nav-item"><span><a class="header-nav-item__link
                        <?php
                        if ($active_tab == 'paydelivery') {
                            echo 'header-nav-item__link_current';
                        }
                        ?>" href="paydelivery.php">Доставка и оплата</a></span>
                </li>
                <li class="header-nav-item"><span><a class="header-nav-item__link
                        <?php
                        if ($active_tab == 'contacts') {
                            echo 'header-nav-item__link_current';
                        }
                        ?>" href="contacts.php">Контакты</a></span></li>
            </ul>
        </div>
    </nav>
</header>