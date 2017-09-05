-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 05 2017 г., 20:03
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `11_07_fstk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_title` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Ноутбуки и компьютеры'),
(2, 'Смартфоны, ТВ и электроника'),
(3, 'Бытовая техника'),
(4, 'Товары для дома'),
(5, 'Инструменты и автотовары');

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE `prices` (
  `prc_id` bigint(20) UNSIGNED NOT NULL,
  `prc_value` bigint(20) UNSIGNED NOT NULL,
  `prc_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prd_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `prices`
--

INSERT INTO `prices` (`prc_id`, `prc_value`, `prc_datetime`, `prd_id`) VALUES
(1, 2000000, '2017-09-05 16:38:29', 1),
(2, 3000000, '2017-09-05 16:38:29', 2),
(3, 600000, '2017-09-05 16:39:10', 3),
(4, 700000, '2017-09-05 16:39:10', 4),
(5, 890000, '2017-09-05 16:39:51', 5),
(6, 870000, '2017-09-05 16:39:51', 6),
(7, 450000, '2017-09-05 16:40:23', 9),
(8, 340000, '2017-09-05 16:40:23', 10),
(9, 1300000, '2017-09-05 16:40:42', 8),
(10, 1200000, '2017-09-05 16:40:42', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `prd_id` int(10) UNSIGNED NOT NULL,
  `prd_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prd_desc_full` text CHARACTER SET utf8,
  `cat_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`prd_id`, `prd_title`, `prd_desc_full`, `cat_id`) VALUES
(1, 'Acer Aspire ES1-533-C3RY (NX.GFTEU.003) Black + Сумка в подарок!', 'Экран 15.6\'\' (1366x768) HD, матовый / Intel Celeron N3350 (1.1 - 2.4 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics 500 / Без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Без ОС / 2.4 кг / черный\r\nПодробнее: https://rozetka.com.ua/notebooks/c80004/filter/preset=budget/', 1),
(2, 'Asus Vivobook E502NA (E502NA-DM013T) White + фирменная сумка в подарок!', 'Экран 15.6\" (1920x1080) Full HD, матовый / Intel Celeron N3350 (1.1 - 2.4 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics 500 / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 10 / 1.86 кг / белый\r\nПодробнее: https://rozetka.com.ua/notebooks/c80004/filter/preset=budget/', 1),
(3, 'Lenovo K5 (A6020a40) Silver ', 'Акционный кредит 0.01% на 10 месяцев!   Дарим 100 грн за распаковку\r\nЭкран (5\", IPS, 1280x720)/ Qualcomm Snapdragon 415 (1.4 ГГц)/ основная камера: 13 Мп, фронтальная камера: 5 Мп/ RAM 2 ГБ/ 16 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)/ 3G/ LTE/ GPS/ поддержка 2х SIM-карт (Micro-SIM)/ Android 5.1 (Lollipop) / 2750 мА*\r\nПодробнее: https://rozetka.com.ua/lenovo_k5_sl/p7779180/', 2),
(4, 'Lenovo ZUK Z1 3/64GB Grey', 'Экран (5.5\", IPS, 1920x1080)/ Qualcomm Snapdragon 801 (2.5 ГГц)/ основная камера: 13 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 64 ГБ встроенной памяти/ 3G/ LTE/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 5.1.1 (Lollipop) / 4100 мА*ч\r\nПодробнее: https://rozetka.com.ua/lenovo_zuk_z1_3_64gb_gry_www_eu/p17918718/', 2),
(5, 'LIEBHERR T 1404 +', 'Цвет: Белый\r\nГабариты (ВхШхГ): 85х50.1х62 см\r\nВес: 33.4 кг\r\nТип холодильника: Однокамерный\r\nПолезный объем холодильной камеры: 108 л\r\nПолезный объем морозильной камеры: 14 л\r\nКоличество компрессоров: 1\r\nТип управления: Механическое\r\nПодробнее: https://bt.rozetka.com.ua/liebherr-t-1404/p216419/', 3),
(6, 'плита HANSA FCMW 58040', 'Тип духовки: Электрическая\r\nГриль: Есть\r\nКонвекция: Есть\r\nПолезный объем: 65 л\r\nМатериал решеток поверхности: Чугунные\r\nЗоны нагрева: Газовые\r\nЦвет: Белый\r\nГабариты (ВхШхГ): 85 x 50 x 60 см\r\nТип: Комбинированные (газ+электро)\r\nГаз-контроль: Отсутствует\r\nПодробнее: https://bt.rozetka.com.ua/2592702/p2592702/', 3),
(7, 'кроватка Indigo Wood', 'Тип  Классическая\r\nВнутренний размер  120 x 60\r\nЯщик под кроватью   Нет\r\nМаятниковый механизм качания  Нет\r\nЦвет  Белый\r\nПодробнее: https://rozetka.com.ua/indigo_wood_fashion_31594/p2056137/', 4),
(8, 'кроватище Indigo Wood здгы', 'Тип  Классическая\r\nВнутренний размер  120 x 60\r\nЯщик под кроватью   Нет\r\nМаятниковый механизм качания  Нет\r\nЦвет  Белый\r\nПодробнее: https://rozetka.com.ua/indigo_wood_fashion_31594/p2056137/', 4),
(9, 'Дрель ударная Einhell', 'Тип патрона: Быстрозажимной\r\nМощность: 550 Вт\r\nВес: 1.9 кг\r\nЧастота ударов в минуту: 43200\r\nМаксимальная скорость вращения: 2700 об/мин\r\nПодробнее: https://rozetka.com.ua/einhell_4259780/p9569004/', 5),
(10, 'Дрель ударная другая', 'Тип патрона: Быстрозажимной\r\nМощность: 550 Вт\r\nВес: 1.9 кг\r\nЧастота ударов в минуту: 43200\r\nМаксимальная скорость вращения: 2700 об/мин\r\nПодробнее: https://rozetka.com.ua/einhell_4259780/p9569004/', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индексы таблицы `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`prc_id`),
  ADD KEY `prc_dttime` (`prc_datetime`),
  ADD KEY `prd_id` (`prd_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `prices`
--
ALTER TABLE `prices`
  MODIFY `prc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
