-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: company
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Электронные сигареты','category-1.jpg'),(2,'Трубки','category-2.jpg'),(3,'Жидкости для заправки','category-3.jpg'),(4,'Аккумуляторы','category-4.jpg'),(5,'Картриджи','category-5.jpg'),(6,'Зарядные устройства','category-6.jpg'),(7,'Аксессуары','category-7.jpg'),(8,'Подарочные наборы','category-8.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Коля','kolya@gmail.com','+79239139031','10 из 10'),(2,'Александр','sasha1993@mail.ru','+79139239031','пойдет'),(3,'Николай','killer2005@yandex.ru','+79039139230','верните деньги, мама забрала электронную сигарету'),(4,'Сергей','sergeypopovichenko@icloud.com','+79999039133','Отличный сервис и качество.'),(5,'Артем','test@gmail.com','+79039033178','это работает');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `announcement` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Школьник из Заринска отравился снюсом','2017-05-23 09:15:28','Школьник из Заринска был госпитализирован с признаками отравления. Ребенок признался, что накануне происшествия он употребил табачную смесь – так называемый снюс. ЧС-ИНФО узнал, чем грозит употребление такой смеси.','Следователи Алтайского края начали доследственную проверку отравления ребенка снюсом. «Предстоит установить обстоятельства, при которых ребенок приобрел вещество, запрещенное к употреблению несовершеннолетними, а также лиц, распространяющих его среди школьников», – сказано в сообщении ведомства. Снюс представляет собой измельченный увлажненный табак в мешочке, который кладут между губой и десной. Так никотин поступает в организм примерно в том же объеме, что и при курении. Употребление снюса вызывает привыкание, раздражение слизистой полости рта и пагубно влияет на сосуды. Несмотря на то, что табачный снюс в России  запрещен, сам продукт с полок магазинов не исчез. Ради прибыли продавцы идут на разные ухищрения – вполне законно они реализуют синтетический снюс без табака якобы как заменитель сигарет.\nВ некоторых регионах России планируют запретить продажу и синтетических снюсов. К примеру, в Удмуртской Республике готовится соответствующий законопроект.\n«На самом деле снюсы запрещены в России с 2015 года. Это ПЭКи! Никотиновые ПЭКи содержат химический никотин, его доза в 7-8 раз превышает дозу никотина в сигаретах. В Удмуртии готовится законопроект о запрете продажи ПЭКов. А пока главное – информирование педагогов, родителей и жесткая позиция руководства школ! Не замалчивать!» — отметила уполномоченный при главе Удмуртской Республики по правам ребенка Ольга Авдеева.'),(2,'Шерлок Холмс потерял свою трубку в Новосибирске','2020-01-17 21:47:05','Новый арт-объект появился в Калининском районе Новосибирска; на месте отвода пара из теплокамеры установили трубку Шерлока Холмса.','Специалисты СГК продолжают украшать в Новосибирске места отвода пара. В городе уже установлены самовар и паровоз, а теперь появился новый арт-объект – трубка Шерлока Холмса.\nВ этот раз поднимать громадную скульптуру, которая на самом деле является дефлектором (устройством по отведению пара), пришлось на крышу теплового пункта в Калининском районе Новосибирска.\nИдею установить неизменный атрибут знаменитого сыщика в более людном месте не поддержали городские власти. Аргумент: дабы не пропагандировать курение.\nРабочие тепловых сетей сделали трубку своими руками. На изготовление арт-объекта они потратили несколько месяцев. Трудились в свободное от основной работы время и руководствовались собственной интуицией: что может подойти для постоянного выхода пара.\nДля изготовления арт-объектов используются старые трубы, которые уже непригодны для подачи тепла и горячей воды в дома новосибирцев.\nНапомним, СГК извинилась перед горожанами за технологический хлопок на ТЭЦ-2.'),(3,'Совфед приравнял электронные сигареты и кальяны к табачным изделиям','2020-07-24 13:46:59','Совет Федерации на пленарном заседании в пятницу одобрил закон, который распространяет на кальяны и электронные сигареты те же ограничения, что и на табачные изделия.','Речь идет в частности о полном запрете на их использование в общественных местах.\nКак уточнил один из авторов инициативы - первый зампред комитета СФ по социальной политике Валерий Рязанский, норма касается любой содержащей никотин продукции. Это не только электронные сигареты, вейпы, никпэки, снюс и насвай, но и пищевой табак, которые выпускают в виде леденцов.\nКроме того, вводятся ограничения для кальянов: их нельзя будет раскуривать в те местах, где запрещено употребление табака, в том числе на рынках, в торговых центрах, офисах, кафе и ресторанах, в зданиях вокзалов и аэропортов.\nЧасть запретов вступит в силу сразу после подписания закона. Для торговых центров, аэропортов, кафе и ресторанов сделано послабление в виде трехмесячной отсрочки.'),(4,'В России задумали увеличить штрафы за продажу табака несовершеннолетним','2020-07-19 21:27:56','В России задумали увеличить штрафы за продажу табачных и никотиносодержащих изделий несовершеннолетним. Соответствующие поправки были внесены в Госдуму, сообщает РИА Новости.','Поправки поступили ко второму чтению законопроекта о внесении изменений в Кодекс об административных правонарушениях. Предлагается гражданам за продажу насвая и снюса назначить штраф от 15 до 20 тысяч рублей, должностным лицам — от 30 до 50 тысяч рублей, юридическим лицам — от 100 до 150 тысяч рублей. В случае продажи табачных изделий несовершеннолетним штрафы составят для физлиц от 20 до 40 тысяч рублей, для должностных лиц — от 40 до 70 тысяч рублей, юридических лиц — от 150 до 300 тысяч рублей. В декабре премьер-министр России Дмитрий Медведев заявил, что поручил МВД пресечь незаконное распространение некурительной никотиносодержащей продукции вне торговых точек, в том числе в интернете. Российские власти запретили продажу никотиносодержащих изделий вроде сосательного табака (снюс) несколько лет назад, но в некоторых торговых сетях продолжается их реализация за счет того, что производители заменяют табак на чистый никотин или никотиносодержащие смеси. Снюс стал популярен среди несовершеннолетних, в первую очередь в регионах.'),(5,'Кто курит IQOS тому табак не страшен','2020-07-20 18:00:12','Можно очень долго говорить о вреде курения, но, к сожалению, эта нездоровая привычка была, есть и будет. Вы можете подумать, что сейчас мы поговорим о здоровье, но нет. Сейчас мы поговорим не о фармацевтической компании, которая борется с этим злом. Речь пойдёт, наоборот, о бренде, связанном с производством сигарет.','В 2016 году Philip Morris решила полностью пересмотреть свою бизнес-модель. Сейчас табачная корпорация хочет решить проблему, которую когда-то сама и создала. Задача, которая стоит перед PMI не из лёгких – остаться на табачных рынках, сохранить лидирующие позиции и при этом переучить своих клиентов перейти с обыкновенных сигарет на новейшие бездымные технологии курения. Согласно исследованиям компании нагрев табака, а не его зажигание, снизит дозу канцерогенов, которые получают курильщики. Бездымные технологии должны стать альтернативой для тех курильщиков, которые хотели бы отказаться от табака, но сил для этого им не хватает. Эмитент убежден в том, что устройства IQOS станут тем мостом, которые соединят курильщиков с бездымным будущем. Philip Morris в июле 2020 года обнародовала отчёт, посвящённый новому направлению – продукции IQOS. Согласно отчёту, в мире уже почти 10 млн пользователей, которые предпочли IQOS и отказались от классических табачных изделий. За последнее время объёмы поставок продукции IQOS выросли более чем на 60 млрд единиц, а пять лет назад объём поставок составлял 7.6 млрд. Через четыре года в планах компании продавать 240 млрд единиц. Параллельно PMI сокращает производство обычной табачной продукции. Например, сейчас объём производства не превышает 730 млрд единиц, а в 2016 году эти числа были на уровне 840 млрд единиц. В ближайшем будущем эмитент хочет получать от 39% до 43% чистого дохода от технологии IQOS.'),(6,'Однообразная упаковка и налог на табак сократили продажи сигарет в Великобритании','2020-07-13 18:57:34','Правда, при этом выросли продажи \"самокруток\" без пачек, которые не облагаются такими налогами','ТАСС, 13 июля. Британские ученые выяснили, что благодаря однообразной упаковке сигарет можно уменьшить количество курильщиков среди жителей Великобритании. Такая упаковка уменьшила выручку от продаж сигарет на 13%, пишут ученые в статье для научного журнала Tobacco Control.'),(7,'Курение в детстве удвоило сложность отказа от табака во взрослом возрасте','2020-04-08 19:17:05','К такому выводу ученые пришли на основе исследования более чем 6 тысяч человек, которое длилось около полувека','Эти наблюдения показали, что фактически все взрослые жители США, Австралии и Финляндии, которые ежедневно употребляют табак, начали курить в детстве или подростковом возрасте. Чем раньше дети пробовали сигареты, тем выше была вероятность подобного исхода событий. В частности, лишь 2% добровольцев, которые попробовали сигареты в 20 лет или позже, курили на 40-м году жизни, тогда как 50% участников наблюдений, начавших курить в возрасте от 6 до 12 лет, оставались заядлыми курильщиками и в середине жизни. Подобная закономерность, как отмечают исследователи, была характерна не только для тех людей, которые постоянно курили в детстве, но и для тех, кто только несколько раз пробовал табак. Аналогичным образом больше половины добровольцев, начавших курить в 20 лет или позже, успешно бросали эту вредную привычку впоследствии, тогда как среди начавших курить в детстве это удавалось сделать лишь 25-37% их сверстников.'),(8,'Между курением, депрессией и шизофренией нашли взаимосвязь','2019-11-06 07:31:17','Никотин нарушает работу серотонина и дофамина, полагают исследователи','ТАСС, 6 ноября. Анализ ДНК более полумиллиона британцев помог ученым доказать, что курение способствует развитию шизофрении и депрессии, почти удваивая риск развития этих душевных расстройств. Об этом пишут генетики, опубликовавшие статью в журнале Psychological Medicine. \"Врачи часто игнорируют носителей психических болезней при борьбе с курением и другими вредными привычками. Наше исследование показывает, что отказ от табака должен улучшать не только физическое, но и душевное здоровье у всех категорий людей, в том числе и больных шизофренией и депрессией\", - рассказал один из авторов исследования Робин Вуттон из Бристольского университета (Великобритания). Согласно современным оценкам ученых, от шизофрении сейчас страдает около 21 млн жителей планеты, причем половина из них не получает помощи от государства и медицинских служб. Значительная часть подобных пациентов приходится на молодых людей в возрасте от 15 до 35 лет. Пока нейрофизиологи не могут точно сказать, как возникают подобные расстройства и как их нужно лечить. За последние годы ученые нашли несколько десятков генов, которые относительно слабо связаны с шизофренией, однако специалисты не могли сказать, как мутации в этих участках ДНК вызывают шизофрению и как последствия их появления можно подавить.'),(9,'Минфин не готовит введение дополнительных сборов с продажи алкоголя и табака','2020-07-24 21:54:38','Ранее сообщалось о предложении взимать с прибыли от продаж алкоголя и табака дополнительный сбор на развитие здравоохранения','МОСКВА, 24 июля. /ТАСС/. Минфин РФ не готовит изменений в законодательство по введению дополнительных сборов с продажи алкоголя и табака. Об этом ТАСС сообщили в пресс-службе Минфина РФ. \"Минфин не готовит никаких изменений в законодательство в части введения дополнительных сборов с продажи алкоголя и табака\", - отметили в Минфине. Ранее издание RT сообщило, что член Общественной палаты РФ, глава федерального проекта \"Трезвая Россия\" Султан Хамзаев предложил взимать с прибыли от продаж алкоголя и табака дополнительный сбор на развитие здравоохранения, соответствующее письмо он направил премьер-министру РФ Михаилу Мишустину.'),(10,'Оборот немаркированных сигарет в России запрещается с 1 июля','2020-07-01 04:20:57','Эксперимент по маркировке табачной продукции в России начался 15 января 2018 года','МОСКВА, 1 июля. /ТАСС/. Оборот немаркированных сигарет в России запрещается с 1 июля 2020 года. Соответствующее постановление правительства в феврале 2019 года подписал бывший премьер-министр России Дмитрий Медведев. Эксперимент по маркировке табачной продукции в России начался 15 января 2018 года. С 1 марта 2019 года маркировка стала обязательной, а с 1 июля 2019 года был прекращен выпуск немаркированных сигарет. По данным Центра развития перспективных технологий (ЦРПТ), который выступает оператором маркировки, в системе \"Честный знак\" уже зарегистрировано около 230 тыс. компаний, в том числе более 81 тыс. - участники оборота табачной продукции. К настоящему времени выдано около 16 млрд кодов, в том числе около 13 млрд - для пачек сигарет.'),(11,'На востоке Москвы из магазина табачной продукции похитили товар на 1,1 млн рублей','2020-07-09 13:15:42','По данному факту полиция начала доследственную проверку','МОСКВА, 9 июля. /ТАСС/. Неизвестные похитили из магазина табачной продукции на востоке Москвы товар на 1,1 млн рублей. Об этом ТАСС в четверг сообщили в пресс-службе столичного ГУ МВД России. По данным главка, утром 8 июля в полицию поступило сообщение от директора магазина табачной продукции о краже по адресу: улица Красноярская, дом 15. Прибывшие на место сотрудники полиции установили, что неизвестные, повредив входную дверь, проникли в помещение магазина. \"Они свершили кражу четырех кальянов, шести портмоне, двух портсигаров, семи сумок, пяти блоков табака для кальяна. Материальный ущерб составил около 1 млн 100 тыс. рублей\", - сказали в пресс-службе. Полиция начала доследственную проверку по данному факту, по ее итогам будет принято процессуальное решение.');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `main_category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `main_category_id` (`main_category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Электронная сигарета FD12','fd12.jpg',820.00,'Eleaf iJust 3 Pro это очередное обновление популярнейшего набора от компании Eleaf, с отличным баком ELLO Duro, имеющим хороший объем и шикарные испарители на сетке. Несмотря на то, что набор появился еще на заре вейпинга, свою актуальность он не теряет и в наше время, ведь в Айджаст 3 Про есть все функции, которые могут понадобиться для комфортного ежедневного парения.',1),(2,'Трубка из дерева','pb5.jpg',760.00,'Габариты батарейного блока Eleaf iJust 3 Pro не сильно изменился относительно предыдущих, сохранив диаметр в 25 мм и высоту в 97.5 мм. Так что девайс будет смотреться гармонично с любыми атомайзерами до 25 мм, а вот что-то большее уже будет слегка нависать над корпусом. Вместе с комплектным баком высота iJust 3 Pro составляет 148.5 мм, так что его легко можно носить в кармане или сумке. Металлический корпус покрыт геометрической гравировкой, узор которой зависит от цвета, из-за чего мод не только интересно выглядит, но еще и не скользит в руке.',2),(3,'Жидкость для заправки','sx78.jpg',59.00,'Встроенный аккумулятор получил объем в 3000 mAh, чем могут похвастаться только самые емкие АКБ формата 18650. Несмотря на небольшие размеры, iJust 3 Pro может выдавать от 30 до 75 Ватт, чего вполне достаточно для большинства намоток и испарителей. Мощность, к слову, теперь можно регулировать, что является нововведением в серии. Айджаст 3 Про поддерживает сопротивление от 0.1 до 3 Ом, а значит его можно использовать в паре практически с чем угодно, начиная сигаретными баками и заканчивая навалистыми дрипками.',3),(4,'Аккумулятор TY132','ty132.jpg',820.00,'Благодаря такому функционалу, вы легко можете накрутить на iJust 3 Pro практический любой бачок или RDA. Так что если захочется разнообразия или комплектный атомайзер вдруг надоест – просто поставьте на Айджаст 3 Про что-нибудь другое и отрегулируйте мощность под обновку.',4),(5,'Картридж FG876','fg876.jpg',760.00,'Регулируется мощность очень просто – на дне расположена кнопка, нажатие на которую увеличит мощность на 5 Ватт, а понять сколько выставлено прямо сейчас помогут светодиодные индикаторы с подписями. В обратную сторону переключить нельзя, поэтому если вам нужно вниз, придется прокликать до 75 Ватт и нажать еще раз, после чего мощность скинется до минимальных 30. Кнопка утоплена в корпус, что защищает ее от случайных кликов, но для собственного спокойствия ее можно заблокировать, нажав 3 раза на «Fire», которая также отвечает за включение и непосредственно парение. Вокруг кнопки «Fire» расположен светодиодный индикатор, сообщающий об уровне заряда: зеленый – больше 60%, синий – от 20 до 59%, красный – меньше 20. Слева от нее находится современный разъем зарядки Type-C, через который можно подзарядить iJust 3 Pro Black как зарядным устройством, так и подключив к компьютеру или Powerbank.',5),(6,'Зарядное устройство','bx426.jpg',59.00,'iJust 3 Pro идет в комплекте с баком ELLO DURO диаметром в 25 мм (на посадке) и высотой 54 мм, учитывая 810 оринговый дриптип. Объем, благодаря нескромным габаритам, тоже внушительный – 6.5 мл с комплектным Bubble-стеклом, чего надолго хватит даже самым активным вейперам. Можно также поставить комплектное стекло на 4.5 мл, что также очень много даже по современным меркам.',6),(7,'Аксессуар','toy_ciga.jpg',820.00,'Заправка в Айджаст 3 Про черного цвета осуществляется через удобную крышку-слайдер, часто используемую в атомайзерах от Eleaf, но в этой версии уплотнительная прокладка обзавелась клапаном с силиконовыми проставками, который призван собрать капельки жидкости при заправке и обеспечить герметичность. За забор воздуха отвечают два больших слота и классическое кольцо регулировки с накатками для удобного раскручивания.',7),(8,'Подарочный набор','luxury_thing.jpg',760.00,'Позвольте себе этот лакшери набор и чувствуйте себя чуть солиднее.',8),(12,'Электронная сигарета HQD01','hqd1.jpg',489.00,'Электронные сигареты hqd — курительные устройства с не сменным электронным испарителем без возможности дозаправки. Сигарета HQD V2 вмещает 1,25 мл жидкости на солевом никотине, что дает возможность сделать в среднем 300 затяжек (что равно примерно двум пачкам обычных табачных сигарет). Такого количества жидкости хватит максимум на 2 дня, после чего электронную сигарету нельзя будет перезаправить или зарядить. Емкость аккумулятора также ограничена (280 мАч) — если он начал мигать зеленым цветом, значит заряд заканчивается. Втором показателем завершения срока эксплуатации также является характерный всхлип при затяжке. Остерегайтесь подделок!!!',1),(13,'Электронная сигарета HQD05','hqd5.jpg',575.00,'В настоящее время на рынке появляются клоны-подделки продукции HQD. Подделки низкого качества и представляют опасность для здоровья. Клоны продаются по цене чуть ниже оригинала, но их себестоимость значительно ниже по следующим причинам:\n1. Некачественный никотин, который может нанести вред здоровью потребителя\n2. Дешевые ароматизаторы с плохим вкусом\n3. Некачественные комплектующие которые доводят процент брака до 30-50%.',1),(14,'Электронная сигарета HSQ02','hqd2.jpg',420.00,'HQD V2 Cantaloupe – «Дыня»Экзотическая, сочная и сладкая дыня с ненавязчивым мускусным ароматом.HQD V2 – это одноразовая электронная сигарета в пластиковом корпусе и с весом в 12 грамм. Сигарета вмещает 1,2 мл жидкости на солевом никотине и позволяет совершить до 300 затяжек.',1),(15,'Гильотина Tonino Lamborghini','tonino_lamborghini.jpg',4490.00,'Гильотина для сигар PRECISIONE CIGAR CUTTER - современный и элегантный аксессуар, который станет отличным подарком для настоящего мужчины. Корпус гильотины выполнен из нержавеющей стали серебристого цвета и декорирован лакированными вставками на боковых панелях. Горизонтальные острозаточенные лезвия открываются нажатием на кнопку с логотипом Tonino Lamborghini, расположенную в верхней части гильотины. Tonino Lamborghini - компания, созданная в 1981 году. Основатель ее - Тонино Ламборгини - сын Феруччо Ламборгини, известного всему миру своими элегантными, спортивными автомобилями. Творческий дух, страсть к дизайну и технологиям стали персональным стилем бренда Tonino Lamborghini, оригинальность и роскошь которого оценили во всем мире за умение каждую вещь делать уникальной.',7),(16,'Курительная трубка Cascata','cascata.jpg',3840.00,'Итальянская курительная трубка из натурального бриара - корня вереска. Имеет необычную текстуру чаши, классический мундштук, а так же, декорирована латунным кольцом. Длина: 150 мм Глубина чаши: 35 мм Ширина: 40 мм Страна производства - Италия.',2),(17,'Курительная трубка Peterson','mini_peterson.jpg',1859.00,'Простая и компактная трубка из натурального бриара отвечает всем основным требованиям любителей трубочного курения. Классическая форма, простота линий, и конечно, высокое качество материалов. Длина: 120 мм. Глубина чаши : 30 мм Ширина: 17 мм Страна производства - Италия.',2),(18,'Картриджи Logic Compact','logic_compact.jpg',1240.00,'Этот вкус несёт внутри частичку солнца, проглядывающую сквозь листья пальмового древа. Чарующий десерт с первой затяжки выдаёт в основе сок спелых экзотических фруктов и едва уловимый сливочный оттенок. Источай летнее настроение круглый год!Крепость никотина: 5 мг',5),(19,'Картридж для MINIFIT Pod','justfog_minifit_pod.jpg',998.00,'JUSTFOG MINIFIT Pod - это картридж на 1,5 мл для многоразового использования с сопротивлением 1,6 Ом. Подходит для электронной сигареты JUSTFOG MINIFIT Starter Kit.',5),(20,'Чехол-зарядка для Jmate P3','juul_p3_800.jpg',1600.00,'Чехол выполнен из авиационного алюминия в стильном современном дизайне. Модель эргономичнее своего предшественника Jmate P2 - аксессуар стал тоньше и короче. При этом мощность и удобство при этом остались на прежнем уровне',6),(21,'Гильотина для сигар, серебро','cigar_cutter.jpg',2179.00,'Гильотина PRECISIONE CIGAR CUTTER - современный и элегантный аксессуар, который станет отличным подарком для настоящего мужчины. Корпус гильотины выполнен из нержавеющей стали серебристого цвета. Горизонтальные острозаточенные лезвия открываются нажатием пальцев.',7),(22,'Трубка на подставке красная','bonino_grinder.jpg',590.00,'Винтажная курительная трубка от Bonino Grinder.',2),(23,'Сумка для трубок и табака','bag.jpg',2600.00,'Сумка из натуральной телячьей кожи для курительных трубок и табака',7),(24,'Жидкость Illusion Lila Saft','illusion_lila_saft_115.jpg',930.00,'Жидкость Illusion Lila Saft – это свежий взгляд на, пожалуй, самый любимый среди вейперов вкус малинового лимонада. Отличительными особенностями данного коктейля является то, что здесь очень грамотно выверен баланс между спелыми и головокружительно душистыми ягодами малины и заметным лимонным фоном.',3),(25,'Жидкость Illusion Vitamin','illusion_vitamin_115.jpg',620.00,'Жидкость Illusion Vitamin – это отборное сочетание ваших любимых фруктов с удивительно качественным балансом противоположных по сути оттенков. Сам вкус способен взбодрить вас утром рабочего дня получше чашечки насыщенного кофе, ведь сладкий сок берёт начало на вдохе, затем плавно сменяется на кислые тона под конец затяжки.',3),(26,'Жидкость Liqui Daily Lemon Tart','liquidaily_lemon_tart_60.jpg',290.00,'Жидкость Liqui Daily Lemon Tart – это самый настоящий лимонный пирог, способный не только поразить в самое сердце ароматом цедры и вкусом сахарной пудры, но и утолить аппетит. Пара-тройка затяжек во время еды и ваши рецепторы скажут вам спасибо. Чрезмерное употребление чревато перееданием!',3),(27,'Жидкость Five Pawns Original','five_pawns_original_salt_grandmaster_30.jpg',1990.00,'Вы можете купить Жидкость Five Pawns Original Salt Grandmaster (30 мл) в фирменном магазине Vardex Вашего города или сделать заказ через наш интернет-каталог с возможностью доставки по всей России.',3),(28,'Набор сигар Villa Zamorano','villa_zamorano_set_reserva.jpg',10500.00,'Сигары очень качественно скручены. Покровный лист Коннектикут США, связующий лист и начинка из Гондураса. Подборка табаков, щедрая вкусовая гамма, а, кроме того, искусность и привлекательность – вот ее характеристики в кругу корифеев. Несомненно, это сигары высшего класса. В сигарах преобладание вкуса жаренного миндаля и мокко и древесные ароматы.',8),(29,'Набор сигар Rocky Patel','rocky_patel_sampler.jpg',14280.00,'Шикарный подарочно-дегустационный набор из шести сигар разных серий известного производителя, которые демонстрируют богатейшую палитру сигарной продукции этого бренда. Каждая витола упакована в красивую алюминиевую тубу и даже в отдельности выглядит великолепно. В состав вошли сигары формата торо: Decade, 15th Anniversary, Sun Grown, а также по одной витоле из трёх винтажных выпусков – 1990, 1992 и 1999. Все представленные изделия скручены из высокосортных табачных листьев, выращенных в Никарагуа, Гондурасе, Доминикане, Эквадоре. Они отличаются крепостью и вкусоароматическими характеристиками. При этом каждая из них является настоящим шедевром. Rocky Patel Deluxe Toro Tubos Sampler – чудесный подарок ценителю.',8),(30,'Аккумулятор Samsung 25R','samsung_18650.jpg',350.00,'Современный аккумулятор 25R типоразмера 18650 от компании Samsung, отличается достойной автономностью и повышенной надёжностью. Он идеально подходит к использованию в большинстве электронных сигарет и других устройств для парения.',4),(31,'Аккумулятор SONY VTC6','sony_18650.jpg',630.00,'Новейший высокотоковый аккумулятор от компании Sony, отличается хорошей автономностью и высокой токоотдачей. Идеально подходит к использованию в современных электронных сигаретах.',4);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_categories` (
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_categories`
--

LOCK TABLES `products_categories` WRITE;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` VALUES (1,1),(1,2),(1,8),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(12,1),(13,1),(14,1),(15,7),(15,8),(16,2),(17,2),(18,5),(19,5),(20,6),(20,7),(21,7),(21,8),(22,2),(23,7),(23,8),(24,3),(25,3),(26,3),(27,3),(27,8),(28,8),(29,8),(30,4),(31,4);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'company'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-29  5:27:47