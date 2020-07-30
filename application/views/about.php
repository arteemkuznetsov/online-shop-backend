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
    <title>Company - О компании</title>
</head>

<body>
<?php
include 'includes/template_header.php'
?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <article class="shipment-article">
                <h1>О компании</h1>
                <p><b>Вы решили купить электронную сигарету у нас?! Вы в правильном месте! Наш вейп шоп предлагает
                        купить вейп на любой вкус, от стартового набора для новичка до сверхмощных батарейных и
                        механических модов для рьяных вейперов, которые с легкостью "раскачают" любую намотку вашего
                        бака или дрипки.</b></p>
                <p>
                    "Company" - магазины электронных сигарет в Новосибирске с огромнейшим
                    ассортиментом и лучшими ценами. Именно здесь можно купить хороший вейп от именитых производителей,
                    pod системы - джул (Juul), battlestar, минифит (Minifit), suorin (суорин), relx, logic compact, my
                    blu (блю), renova; системы нагревания табака - айкос (iqos), glo (гло), avbad (авбад), hotcig.
                </p>
                <p>
                    <b>Почему стоит выбрать вейп шоп "Company":</b>
                <ul>
                    <li>- несколько магазинов в Новосибирске и Барнауле;</li>
                    <li>- обработка интернет-заказов без выходных и праздников, практически 24/7;</li>
                    <li>- курьерская доставка в г. Новосибирске;</li>
                    <li>- быстрая, недорогая и нередко бесплатная доставка в любой населенный пункт России и СНГ;</li>
                    <li>- наличие физических магазинов для самовывоза в Новосибирске и Барнауле;</li>
                    <li>- несколько поступлений новых товаров каждую неделю;</li>
                    <li>- постоянные акции и скидки, позволяющие сэкономить;</li>
                    <li>- опытные консультанты, которые максимально постараются помочь в любой ситуации.</li>
                </ul>
                </p>
                <p>
                    В нашем ассортименте более 500 линеек различных жидкостей для электронных сигарет (жидкости для
                    вейпа), более 150 видов устройств для парения, более 100 видов баков и дрипок и огромное количество
                    всевозможных комплектующих, аккумуляторы 18650 / 20700 / 21700 и расходных материалов (сменные
                    испарители, проволока для койлов, хлопок). Наши консультанты всегда помогут с выбором, исходя из
                    личных предпочтений покупателя, а в дальнейшем и с обслуживанием вашего бака или дрипки - установим
                    спирали (более 30 видов) и заменим вату.
                </p>
                <p>
                    В наших магазинах вы можете получить консультацию по любым вопросам, связанным с электронными
                    сигаретами, а также посмотреть/пощупать любой приглянувшийся товар, и, конечно выбрать ту самую
                    жидкость, которая идеально будет соответствовать вашим требованиям и желаниям, а мы с удовольствием
                    Вам в этом поможем.
                </p>
                <p>
                    У нас вы сможете купить лучшие электронные сигареты от мировых производителей. Мы дадим понятные
                    ответы на все ваши вопросы, связанные с покупкой и использованием электронной сигареты.
                </p>
                <p>
                    Электронные сигареты во многом более безопасны, чем табачная продукция и при грамотном использовании
                    Вы легко сможете заменить курение на вкусный пар.
                </p>
                <p>
                    Обязательно заходите в раздел жидкость для электронных сигарет и выбирайте из множества брендов и
                    вкусов, новинки поступают несколько раз в неделю.
                </p>
                <p><i>
                        Вы можете забрать купленный товар в любом нашем магазине в Новосибирске, а если вы
                        живете в другом городе, то и это не проблема - быстрая доставка возможна в любой населенный
                        пункт
                        России и СНГ.
                    </i>
                </p>
            </article>
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
    </div>
</div>
<?php
include 'includes/template_footer.php'
?>
</body>

</html>