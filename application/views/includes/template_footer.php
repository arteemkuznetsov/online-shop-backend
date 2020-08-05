</main>
<div class="sidebar">
    <section class="catalog">
        <h2 class="sidebar__headline">Каталог</h2>
        <ul class="catalog-list">
            <?php
            foreach ($categories as $id => $category) : ?>
                <li class="catalog-list__item">
                    <a class="catalog-list__link"
                       href="catalog.php?id=<?= $id ?>"><?= $category['name'] ?></a>
                </li>
            <?php
            endforeach; ?>
        </ul>
    </section>
    <section class="news">
        <h2 class="sidebar__headline news__headline">Новости</h2>
        <ul class="news-list">
            <?php
            foreach ($news as $id => $newsItem) : ?>
                <li class="news-item">
                    <a class="news-item__link" href="news-detail.php?id=<?= $id ?>"><?= $newsItem['header'] ?></a>
                    <span class="news-item__date"><?=$newsItem['date'] ?></span>
                </li>
            <?php
            endforeach; ?>
        </ul>
        <span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
    </section>
</div>
<?php

$seo = 'include_areas/' . $activeTab . '_seo.php';
if (file_exists($seo)) { ?>
    <article class="seo-article">
        <?php
        require_once $seo; ?>
    </article>
    <?php
}
?>
</div>
</div>
<footer class="page-footer">
    <div class="wrapper page-footer__wrapper">
        <div class="copyright">
            <span class="copyright__part copyright__lifetime">Copyright ©2007-<?= date(
                    "Y"
                ) ?></span>
            <span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>, <?= date(
                    "Y"
                ) ?></span>
            <img class="copyright__image" src="assets/img/logo.png"
                 alt="Company-logo">
            <span class="copyright__part copyrhigt__company-name">Company</span>
        </div>
        <nav class="footer-nav">
            <ul class="footer-nav__list">
                <?php
                foreach ($titles as $resource => $title): ?>
                    <li class="footer-nav__list-item"><a
                                class="footer-nav__link"
                                href="<?= $resource ?>.php"><?= $title ?></a>
                    </li>
                <?php
                endforeach; ?>
            </ul>
        </nav>
        <div class="developer">
            <span class="developer__ref">Разработка сайта - <a
                        class="developer__link" href="http://itconstruct.ru">ITConstruct</a></span>
            <img class="counter" src="assets/img/counter.png"
                 alt="Page-counter">
        </div>
    </div>
</footer>
</body>
</html>