<p align="center">
    <h1 align="center">Учебный проект интернет-магазина с админкой</h1>
    <br>
    Шаблон: https://github.com/Max0nsky/bootstrap-template
    <br>
</p>

ДАННЫЕ ДЛЯ ВХОДА В АДМИНКУ
-------------------

 login: admin<br>
 password: adminpass12345<br>


ДАМП БАЗЫ
-------------------
-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 15 2021 г., 20:15
-- Версия сервера: 8.0.22-0ubuntu0.20.04.3
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MyDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Пицца'),
(2, 'Суши'),
(3, 'Роллы'),
(4, 'Сеты'),
(5, 'Закуска');

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

CREATE TABLE `food` (
  `id` int NOT NULL,
  `id_category` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `id_category`, `name`, `price`, `description`, `img`, `popular`, `quantity`) VALUES
(5, 1, 'Нью-йорк', 530, 'Фирменный соус,\r\nмоцарелла, ветчина, пеперони, шампиньоны. 40 см.', 'newyork.jpg', 1, 5),
(6, 1, 'Кармен', 600, 'Фирменный соус, моцарелла, пеперони, бекон, томат, шалот, шампиньоны, курица, укроп. 40 см.', 'karmen.jpg', 0, 5),
(7, 1, 'Филадельфия', 600, 'Фирменный соус, моцарелла, семга, айсберг, томаты. 40 см.', 'filad.jpg', 0, 5),
(8, 1, 'Маргарита', 550, 'Фирменный соус, моцарелла, говядина, корнишоны, томат, пеперони. 40 см.', 'margar.jpg', 0, 5),
(9, 2, 'C копченным лососем', 59, 'Копченый лосось. 1 шт.', 'sushlos.jpg', 0, 5),
(10, 2, 'C чукой', 49, 'Салат чука, нори. 1 шт.', 'sushchuk.jpg', 0, 5),
(11, 2, 'Острый Тори Унаги', 59, 'Угорь, курица, спайси. 1 шт.', 'sushunag.jpg', 0, 5),
(12, 2, 'С креветкой', 69, 'Острые суши с креветкой и нори. 1 шт.', 'sushikrev.jpg', 0, 5),
(13, 3, 'Темпурная Камчатка', 219, 'Окуню жар., лук зеленый, масаго, унаги. 8 шт.', 'rolltemp.jpg', 0, 5),
(14, 3, 'С авокадо', 79, 'Ролл с нежным авокадо. 8 шт.', 'rollavokado.jpg', 1, 4),
(15, 3, 'Эби люкс', 119, 'Сыр, креветка, огурец. 8 шт.', 'rollaby.jpg', 0, 5),
(16, 3, 'Запеченная Филадельфия', 349, 'Сыр, лосось, соус сырный, унаги соус, кунжут. 8 шт.', 'rollzapfil.jpg', 0, 5),
(17, 3, 'Запеченный штурман', 199, 'Окунь жар., лук,томат, соус чесночный, унаги,кунжут. 8 шт.', 'rollzapshtur.jpg', 1, 5),
(18, 3, 'Запеченный с беконом', 259, 'Сыр,огурец,копченный лосось,бекон,соус сырный. 8 шт.', 'rollzapbek.jpg', 1, 5),
(19, 3, 'Запеченный с угрем', 249, 'Сыр, огурец, пекинка, угорь, соус сырный, унаги, кунжут. 8 шт.', 'rollzapygr.jpg', 0, 5),
(20, 3, 'Запеченная Калифорния', 209, 'Масаго, сыр, краб, огурец, соус сырный, унаги, кунжут. 8 шт.', 'rollzapkalifor.jpg', 1, 5),
(21, 3, 'Хамелеон', 199, 'Масаго, курица, перец, огурец, пекинка. 8 шт.', 'rollhamel.jpg', 0, 5),
(22, 4, 'Филадельфия Maxi под угрем', 1149, 'Филадельфия,\r\nфиладельфия абсолют,\r\nмини филадельфия,\r\n2 суши сливочная креветка,\r\nфиладельфия масаго,\r\nфиладельфия лайт,\r\nмини ролл сливочный лосось.\r\nВес 1118 гр. 48 шт.', 'setfilmax.jpg', 0, 5),
(23, 4, 'Большой запеченный', 799, 'Запеченный с окунем,\r\nзапеченный с мидиями,\r\nзапеченный с лососем,\r\n2 суши окунь,\r\n2 суши лосось,\r\n2 суши мидии.\r\nВес 900 гр. 30 шт.', 'setbolzap.jpg', 0, 5),
(24, 4, 'Харумаки', 799, 'Запеченный с лососем терияки,\r\nсенсей,\r\nфиладельфия классическая,\r\nснек ролл,\r\nролл с лососем,\r\nролл сяке люкс. 48 шт.', 'sethar.jpg', 0, 5),
(25, 4, 'Темпурный', 699, 'Темпурный лосось,\r\nтемпурная креветка,\r\nимбирный,\r\nтемпурные альпы. 32 шт.', 'settempur.jpg', 0, 5),
(26, 4, 'Крайз', 699, 'Запеченный с лососем терияки,\r\nсенсей,\r\nсливочный лосось, •калифорния,\r\nаляска. 40 шт.', 'setkrayz.jpg', 1, 4),
(27, 4, 'Харакири', 1399, 'Калифорния,\r\nсливочный лосось,\r\nбонито,\r\nснек ролл,\r\nспарта,\r\nчикен,\r\nролл с огурцом,\r\nролл с лососем,\r\nролл с авокадо,\r\nсливочный огурец,\r\nсуши лосось,\r\nсуши угорь. 74 шт.', 'setharak.jpg', 0, 5),
(28, 5, 'Кольца кальмара', 160, 'Аппетитные кольца кальмара. 180 гр.', 'zakkolca.jpg', 0, 5),
(29, 5, 'Картофель фри', 80, 'Тот самый картофель фри. 150 гр.', 'zakkarfree.jpg', 0, 5),
(30, 5, 'Картофель по-деревенски', 80, 'Один из лучших, картофель по-деревенски. 150 гр.', 'zakkarpoderev.jpg', 1, 5),
(31, 5, 'Куриные наггетсы', 150, 'Свежайшие куриные наггетсы. 200 гр.', 'zakkurnag.jpg', 0, 5),
(32, 5, 'Салат Чука', 110, '(Чука,ореховый соус, лимон)\r\nВес 110гр.', 'zaksalatchuk.jpg', 0, 5),
(33, 5, 'Чука Унаги', 210, '(Чука,лимон,угорь,ореховый соус,кунжут)\r\nВес 130гр.', 'zakchukunagi.jpg', 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `final_sum` int NOT NULL,
  `final_quantity` int NOT NULL,
  `phone_number` bigint NOT NULL,
  `address` varchar(255) NOT NULL,
  `persons` int NOT NULL,
  `date` date NOT NULL,
  `condition_order` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `firstname`, `lastname`, `patronymic`, `final_sum`, `final_quantity`, `phone_number`, `address`, `persons`, `date`, `condition_order`) VALUES
(16, 'Петр', 'Петров', 'Петрович', 778, 2, 8923748932, 'Петровская 33', 2, '2021-01-11', 'Выполнено'),
(18, 'Иван', 'Иванов', 'Иванович', 690, 3, 89123456789, 'Ивановская 23', 3, '2021-01-13', 'Ожидание');

-- --------------------------------------------------------

--
-- Структура таблицы `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int NOT NULL,
  `purchase_id` int NOT NULL,
  `food_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `purchase_id`, `food_id`, `name`, `price`, `quantity`, `sum`) VALUES
(24, 16, 14, 'С авокадо', 79, 1, 79),
(25, 16, 26, 'Крайз', 699, 1, 699),
(27, 18, 5, 'Нью-йорк', 530, 1, 530),
(28, 18, 29, 'Картофель фри', 80, 2, 160);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `id_food` int NOT NULL,
  `mail` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `id_food`, `mail`, `name`, `text`, `date`) VALUES
(2, 14, 'niko1234@mail.ru', 'Николай', 'Замечательный вкус и неплохая комплектация. Всем советую это попробовать.', '2021-01-14 12:24:29'),
(7, 5, 'nikol@mail.ru', 'Николай', 'Хорошая пицца, много начинки. Было вкусно.', '2021-01-15 17:13:15'),
(8, 5, 'ivan@mail.ru', 'Иван', 'Тесто сухое', '2021-01-15 17:14:16');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `authKey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`) VALUES
(1, 'admin', '$2y$13$SgWV2nUPfipEUSYNwGgmVOXTYTaeJkDly5WcvyC4j5NIjT5dF79ni', '5P8OF7o2gukfVM7PD4jRPaEHh63Rgq9W');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_food` (`id_food`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `food`
--
ALTER TABLE `food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD CONSTRAINT `purchase_item_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_item_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`);

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_food`) REFERENCES `food` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must download [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Optional) Create `yii2_basic_tests` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run -- --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit -- --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit -- --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
