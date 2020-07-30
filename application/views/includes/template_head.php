<?php
$titles = [
    'about' => 'О компании',
    'catalog' => 'Каталог',
    'contacts' => 'Контакты',
    'index' => 'Интернет-магазин электронных сигарет',
    'news' => 'Новости',
    'paydelivery' => 'Доставка и оплата'
]
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/script.js"></script>
    <title>Company - <?php
        switch ($active_tab) :
            case 'news-detail':
                echo $news_info['header'];
                break;
            case 'product':
                echo $product_info['name'];
                break;
            default:
                echo $titles[$active_tab];
                break;
        endswitch;
        ?></title>
</head>
