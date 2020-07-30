</main>
<div class="sidebar">
    <section class="catalog">
        <h2 class="sidebar__headline">Каталог</h2>
        <ul class="catalog-list">
            <?php for ($i = 0; $i < sizeof($categories); $i++) : ?>
                <li class="catalog-list__item">
                    <a class="catalog-list__link"
                       href="catalog.php?id=<?php echo array_keys($categories)[$i] ?>"><?php echo array_values($categories)[$i]['name'] ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </section>
    <section class="news">
        <h2 class="sidebar__headline news__headline">Новости</h2>
        <ul class="news-list">
            <?php for ($i = 0; $i < $params['news_on_side']; $i++) : ?>
                <li class="news-item">
                    <a class="news-item__link" href="news-detail.php?id=<?php echo array_keys($news)[$i] ?>">
                        <?php echo array_values($news)[$i]['header'] ?>
                    </a>
                    <span class="news-item__date"><?php echo array_values($news)[$i]['date'] ?></span>
                </li>
            <?php endfor; ?>
        </ul>
        <span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
    </section>
</div>