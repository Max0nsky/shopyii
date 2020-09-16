<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.com/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.com/yiisoft/yii2-app-basic)

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

DUMP BASE
------------

### MySQL

~~~
-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 06 2020 г., 19:25
-- Версия сервера: 8.0.21-0ubuntu0.20.04.4
-- Версия PHP: 7.4.3

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
(1, 'admin', '$2y$13$SgWV2nUPfipEUSYNwGgmVOXTYTaeJkDly5WcvyC4j5NIjT5dF79ni', 'dPuohRaf_k5a1619_Yvh1zNTbL2mdPre');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
~~~

DUMP DATABASE
------------

-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 16 2020 г., 23:02
-- Версия сервера: 8.0.21-0ubuntu0.20.04.4
-- Версия PHP: 7.4.3

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
  `popular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `id_category`, `name`, `price`, `description`, `img`, `popular`) VALUES
(1, 1, 'Карибская', 500, 'Фирменный соус, моцарелла, пеперони, шампиньоны. 40 см.', 'karib.jpg', 1),
(2, 1, 'Джульетта', 550, 'Фирменный соус, моцарелла, томат,\r\nбекон, корнишоны. 40 см.', 'july.jpg', 0),
(5, 1, 'Нью-йорк', 530, 'Фирменный соус,\r\nмоцарелла, ветчина, пеперони, шампиньоны. 40 см.', 'newyork.jpg', 0),
(6, 1, 'Кармен', 600, 'Фирменный соус, моцарелла, пеперони, бекон, томат, шалот, шампиньоны, курица, укроп. 40 см.', 'karmen.jpg', 0),
(7, 1, 'Филадельфия', 600, 'Фирменный соус, моцарелла, семга, айсберг, томаты. 40 см.', 'filad.jpg', 0),
(8, 1, 'Маргарита', 550, 'Фирменный соус, моцарелла, говядина, корнишоны, томат, пеперони. 40 см.', 'margar.jpg', 0),
(9, 2, 'C копченным лососем', 59, 'Копченый лосось. 1 шт.', 'sushlos.jpg', 0),
(10, 2, 'C чукой', 49, 'Салат чука, нори. 1 шт.', 'sushchuk.jpg', 0),
(11, 2, 'Острый Тори Унаги', 59, 'Угорь, курица, спайси. 1 шт.', 'sushunag.jpg', 0),
(12, 2, 'С креветкой', 69, 'Острые суши с креветкой и нори. 1 шт.', 'sushikrev.jpg', 0),
(13, 3, 'Темпурная Камчатка', 219, 'Окуню жар., лук зеленый, масаго, унаги. 8 шт.', 'rolltemp.jpg', 0),
(14, 3, 'С авокадо', 79, 'Ролл с нежным авокадо. 8 шт.', 'rollavokado.jpg', 1),
(15, 3, 'Эби люкс', 119, 'Сыр, креветка, огурец. 8 шт.', 'rollaby.jpg', 0),
(16, 3, 'Запеченная Филадельфия', 349, 'Сыр, лосось, соус сырный, унаги соус, кунжут. 8 шт.', 'rollzapfil.jpg', 0),
(17, 3, 'Запеченный штурман', 199, 'Окунь жар., лук,томат, соус чесночный, унаги,кунжут. 8 шт.', 'rollzapshtur.jpg', 1),
(18, 3, 'Запеченный с беконом\"', 259, 'Сыр,огурец,копченный лосось,бекон,соус сырный. 8 шт.', 'rollzapbek.jpg', 1),
(19, 3, 'Запеченный с угрем', 249, 'Сыр, огурец, пекинка, угорь, соус сырный, унаги, кунжут. 8 шт.', 'rollzapygr.jpg', 0),
(20, 3, 'Запеченная Калифорния', 209, 'Масаго, сыр, краб, огурец, соус сырный, унаги, кунжут. 8 шт.', 'rollzapkalifor.jpg', 1),
(21, 3, 'Хамелеон', 199, 'Масаго, курица, перец, огурец, пекинка. 8 шт.', 'rollhamel.jpg', 0),
(22, 4, 'Филадельфия Maxi под угрем', 1149, 'Филадельфия,\r\nфиладельфия абсолют,\r\nмини филадельфия,\r\n2 суши сливочная креветка,\r\nфиладельфия масаго,\r\nфиладельфия лайт,\r\nмини ролл сливочный лосось.\r\nВес 1118 гр. 48 шт.', 'setfilmax.jpg', 0),
(23, 4, 'Большой запеченный', 799, 'Запеченный с окунем,\r\nзапеченный с мидиями,\r\nзапеченный с лососем,\r\n2 суши окунь,\r\n2 суши лосось,\r\n2 суши мидии.\r\nВес 900 гр. 30 шт.', 'setbolzap.jpg', 0),
(24, 4, 'Харумаки', 799, 'Запеченный с лососем терияки,\r\nсенсей,\r\nфиладельфия классическая,\r\nснек ролл,\r\nролл с лососем,\r\nролл сяке люкс. 48 шт.', 'sethar.jpg', 0),
(25, 4, 'Темпурный', 699, 'Темпурный лосось,\r\nтемпурная креветка,\r\nимбирный,\r\nтемпурные альпы. 32 шт.', 'settempur.jpg', 0),
(26, 4, 'Крайз', 699, 'Запеченный с лососем терияки,\r\nсенсей,\r\nсливочный лосось, •калифорния,\r\nаляска. 40 шт.', 'setkrayz.jpg', 1),
(27, 4, 'Харакири', 1399, 'Калифорния,\r\nсливочный лосось,\r\nбонито,\r\nснек ролл,\r\nспарта,\r\nчикен,\r\nролл с огурцом,\r\nролл с лососем,\r\nролл с авокадо,\r\nсливочный огурец,\r\nсуши лосось,\r\nсуши угорь. 74 шт.', 'setharak.jpg', 0),
(28, 5, 'Кольца кальмара', 160, 'Аппетитные кольца кальмара. 180 гр.', 'zakkolca.jpg', 0),
(29, 5, 'Картофель фри', 80, 'Тот самый картофель фри. 150 гр.', 'zakkarfree.jpg', 0),
(30, 5, 'Картофель по-деревенски', 80, 'Один из лучших, картофель по-деревенски. 150 гр.', 'zakkarpoderev.jpg', 1),
(31, 5, 'Куриные наггетсы', 150, 'Свежайшие куриные наггетсы. 200 гр.', 'zakkurnag.jpg', 0),
(32, 5, 'Салат Чука', 110, '(Чука,ореховый соус, лимон)\r\nВес 110гр.', 'zaksalatchuk.jpg', 0),
(33, 5, 'Чука Унаги', 210, '(Чука,лимон,угорь,ореховый соус,кунжут)\r\nВес 130гр.', 'zakchukunagi.jpg', 0);

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
(1, 'admin', '$2y$13$SgWV2nUPfipEUSYNwGgmVOXTYTaeJkDly5WcvyC4j5NIjT5dF79ni', 'ZI3CWV4NxEM3_hBp9BQe2E0PXIMOAIbL');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.


INSTALLATION
------------

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
