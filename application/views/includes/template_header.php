<header class="page-header">
    <div class="wrapper">
        <aside class="header-top">
            <?php if ($active_tab != 'index'): ?>
                <a href="index.php">
                    <div class="header-logo">
                        <img class="header-logo__image" src="assets/img/logo.png" alt="Логотип" width="95" height="75">
                        <span class="header-logo__caption">Company</span>
                    </div>
                </a>
            <?php else: ?>
                <div class="header-logo">
                    <img class="header-logo__image" src="assets/img/logo.png" alt="Логотип" width="95" height="75">
                    <span class="header-logo__caption">Company</span>
                </div>
            <?php endif ?>
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
                <?php foreach ($menu_items as $item) : ?>
                <li class="header-nav-item"><span><a class="header-nav-item__link
                        <?php
                        if ($item['resource_name'] == $active_tab) :
                            echo 'header-nav-item__link_current';
                        endif;
                        ?>" href="<?php echo $item['resource_name'] ?>.php"><?php echo $item['item_name'] ?></a></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>
<div class="content <?php if ($active_tab == 'product') echo 'content__product' ?>">
    <div class="wrapper content__wrapper">
        <main class="<?php if ($active_tab == 'index') echo 'categories'; else echo 'inside-content' ?>">