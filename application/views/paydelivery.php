<?php
global $params;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/script.js"></script>
    <title>Company - Доставка и оплата</title>
</head>

<body>
<?php
include 'includes/template_header.php'
?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <article class="shipment-article">
                <h1>Доставка</h1>
                <p><b>Уважаемые покупатели!</b></p>
                <p>
                    Оплатить свой заказ Вы можете любым из следующих способов:
                </p>
                <ol>
                    <li>Оплата наличными курьеру (в Москве в пределах МКАД)</li>
                    <li>Оплата с помощью Яндекс.Деньги</li>
                    <li>Оплата по безналичному расчету</li>
                    <li>Оплата по квитанции Сбербанка РФ или другого коммерческого банка.</li>
                </ol>
                <p>В двух последних случаях мы выписываем Вам счет, который Вы получаете по электронной почте после подтверждения
                    Вашего заказа. После получения денег, мы в течение 2-3 рабочих дней доставляем Вам товар с помощью транспортных
                    компаний "СПСР" и "Грузовозофф" (по РФ), а так же по желанию "Почтой РФ". Стоимость доставки по РФ
                    согласовывается с Вами и включается в стоимость счета.</p>
                <p>Доставка по Москве осуществляется на следующий день после согласования заказа.</p>
                <p>Стоимость курьерской доставки по Москве составляет <b>250 р.</b></p>
                <p>Доставка по Москве крупногабаритных товаров (от 5 кг) - <b>300 р.</b></p>
                <p>Доставка за пределы МКАД - по договоренности</p>
                <p><i>Также, Вы имеете возможность приобрести товары в нашем шоу-руме на м.Сходненская</i></p>
            </article>
        </main>
        <div class="sidebar">
            <section class="catalog">
                <h2 class="sidebar__headline">Каталог</h2>
                <ul class="catalog-list">
                    <?php for ($i = 0; $i < sizeof($categories); $i++) : ?>
                        <li class="catalog-list__item"><a class="catalog-list__link"
                                                          href="catalog.php?id=<?php echo $categories[$i]['id'] ?>">
                                <?php echo $categories[$i]['name'] ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </section>
            <section class="news">
                <h2 class="sidebar__headline news__headline">Новости</h2>
                <ul class="news-list">
                    <?php for ($i = 0; $i < $params['news_on_side']; $i++) : ?>
                        <li class="news-item">
                            <a class="news-item__link" href="news-detail.php?id=<?php echo $news[$i]['id'] ?>">
                                <?php echo $news[$i]['header'] ?>
                            </a>
                            <span class="news-item__date"><?php echo $news[$i]['date'] ?></span>
                        </li>
                    <?php endfor; ?>
                </ul>
                <span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
            </section>
        </div>
    </div>
</div>
<?php
include 'includes/template_footer.php'
?>
</body>

</html>
