/404.php - статический контент
/about.php - статический контент
/catalog.php - контроллер для списка товаров
/contacts.php - статический контент + контроллер для страницы контактов
/index.php - контроллер для главной
/news-detail.php - контроллер для новости детально
/news.php - контроллер для списка новостей
/paydelivery.php  - статический контент
/product.php - контроллер для карточки товара

/includes
/includes/config.php - конфгурационный файл
/includes/lib.php - вспомогательные функции, функции инициализации соединения с БД и пр.

/application - папка с Models и Views

/application/models
/application/models/catalog.php — модель для списка товаров
/application/models/contacts.php — модель для обратной связи
/application/models/index.php — модель для главной страницы
/application/models/news-detail.php — модель для карточки новости
/application/models/news.php — модель для списка новостей
/application/models/product.php — модель для карточки товара

/application/views
/application/views/catalog.php — вьюха для списка товаров
/application/views/contacts.php — вьюха для обратной связи
/application/views/index.php — вьюха для главной страницы
/application/views/news-detail.php — вьюха для карточки новости
/application/views/news.php — вьюха для списка новостей
/application/views/product.php — вьюха для карточки товара

/application/views/includes — папка для блоков, включаемых во вьюхи
/application/views/includes/template_footer.php — блок подвала
/application/views/includes/template_header.php — блок шапки

/robots.txt - не трогаем
/.htaccess - не трогаем