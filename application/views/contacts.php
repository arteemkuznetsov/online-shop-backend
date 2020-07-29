<?php
global $news;
global $categories;
global $answer;
global $params;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="includes/css/stylesheet.css">
    <link rel="shortcut icon" href="includes/img/favicon.png" type="image/png">
    <link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="includes/js/script.js"></script>
    <title>Company - Контакты</title>
</head>

<body>
<?php
include 'includes/template_header.php'
?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <h1 class="contacts-page__main-headline">Контакты</h1>
            <table class="contacts-section">
                <tbody>
                <tr>
                    <td>
                        <h2>Адрес нашего офиса:</h2>
                        <p>
                            630065, г. Новосибирск, Декабристов, 92, корп.7
                            <br>Время приема заказов по телефону -
                        </p>
                        <p>
                            с 9.30 до 18.00
                            <br>Телефоны: +7 (383) 255‒15‒15 ; 349‒18‒49
                        </p>
                        <h2>Магазины партнеры:</h2>
                        <h3>Москва:</h3>
                        <p>
                            Красный проспект, 50, стр. 1. универмаг "Московский":
                            <br>1-й этаж, левое крыло пав. 71, тел.: +7 (383) 239‒39‒50;
                        </p>
                        <h3>Санкт-Петербург:</h3>
                        <p>
                            www.president-spa.club, (913) 321-83-54
                        </p>
                    </td>
                    <td class="contacts-section__second-column">
                        <h2>ООО «Компания»</h2>
                        <p>
                            Ген. директор:Иванов А.Ю.
                        </p>
                        <p>
                            Юридический адрес: 630065, г. Новосибирск,
                            <br>Декабристов, 92, корп.7
                        </p>
                        <p>
                            ИНН 7733700983; КПП 7737655901;
                        </p>
                        <p>
                            ОГРН 1097746493754 от 15 июня 2014г.
                        </p>
                        <p>
                            Наименование банка: ОАО «УРАЛСИБ»
                        </p>
                        <p>
                            г. Москва БИК 042591537;
                            <br>Корр. счет 31542814300000000327; Расчетный счет 40418710900020003009
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            <section class="feedback-form">
                <h2 class="feedback-form__headline">Форма обратной связи</h2>
                <p class="feedback-form__hint">
                    <span class="required-star">*</span> — обязательные для заполнения поля
                </p>
                <aside class="
                <?php
                if  ($answer) { // если форма была отправлена
                    if ($answer['success'] == 'true') {
                        echo 'success-box success-text';
                    }
                    else {
                        echo 'error-box error-text';
                    }
                }
                ?>">
                    <p class="info-message">
                        <?php
                        if ($answer) {
                            echo $answer['message'];
                        }
                        ?>
                    </p>
                </aside>
                <form method="POST" class="registration-form" name="contats-page__feedback-form"
                      action="contacts.php">
                    <div class="feedback-form__row">
                        <label class="inner-label" for="feedback-author">
                            Имя <span class="required-star">*</span>
                        </label>
                        <input class="inner-input-box inner-input-box__name" type="text" name="feedback-author"
                               id="feedback-author" maxlength="50">
                        <span class="error-text feedback-form__error-hint error-emptyness invisible">Поле «Имя» должно быть заполнено</span>
                    </div>
                    <div class="feedback-form__row">
                        <label class="inner-label" for="email">
                            Электронная почта <span class="required-star">*</span>
                        </label>
                        <input class="inner-input-box inner-input-box__email" type="email" name="email" id="email"
                               maxlength="70">
                        <span class="error-text feedback-form__error-hint error-emptyness invisible">Поле «Электронная почта» должно
								быть заполнено</span>
                    </div>
                    <div class="feedback-form__row">
                        <label class="inner-label optional" for="phone">
                            Телефон
                        </label>
                        <input class="inner-input-box" type="tel" name="phone" id="phone" maxlength="20">
                    </div>
                    <div class="feedback-form__row feedback-form__row_left-shift">
                        <label class="inner-label feedback-text-area__label" for="feedback-text">
                            Пожалуйста укажите какого рода информация вас интересует <span
                                    class="required-star">*</span>
                        </label>
                        <textarea class="inner-input-box feedback-text-area__input" name="feedback-text"
                                  id="feedback-text"></textarea>
                        <div>
                            <input class="form-submit data-send" type="submit" value="Отправить">
                            <input class="form-submit clear-inputs" type="button" value="Очистить поля">
                        </div>
                    </div>
                </form>
            </section>
        </main>
        <div class="sidebar">
            <section class="catalog">
                <h2 class="sidebar__headline">Каталог</h2>
                <ul class="catalog-list">
                    <?php
                    for ($i = 0; $i < sizeof($categories); $i++) {
                        echo '<li class="catalog-list__item"><a class="catalog-list__link" href="catalog.php?id=' . $categories[$i]['id'] . '">' . $categories[$i]['name'] . '</a></li>';
                    }
                    ?>
                </ul>
            </section>
            <section class="news">
                <h2 class="sidebar__headline news__headline">Новости</h2>
                <ul class="news-list">
                    <?php
                    for ($i = 0; $i < $params['news_on_side']; $i++) {
                        echo '<li class="news-item">
                        <a class="news-item__link" href="news-detail.php?id=' . $news[$i]['id'] . '">
                            ' . $news[$i]['header'] . '
                        </a>
                        <span class="news-item__date">' . $news[$i]['date'] . '</span>
                    </li>';
                    }
                    ?>
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