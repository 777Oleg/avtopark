-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 31 2020 р., 19:55
-- Версія сервера: 5.5.53
-- Версія PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `avtopark_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `avtopark`
--

CREATE TABLE `avtopark` (
  `id_apark` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `time_work` varchar(20) NOT NULL,
  `nomerCar` varchar(20) NOT NULL,
  `marka` varchar(50) NOT NULL,
  `id_driver` varchar(20) NOT NULL,
  `driver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `avtopark`
--

INSERT INTO `avtopark` (`id_apark`, `name`, `address`, `time_work`, `nomerCar`, `marka`, `id_driver`, `driver`) VALUES
(16, 'Мир Авто', 'ул.Вишневая 35', 'с 08 до 19', 'AC7895AE', 'Ford Focus', '3', 'Коля Шумахер'),
(17, 'Твое Авто', 'ул. Центральная 54', 'с 10 до 20', 'AH3698BE', 'fiat doblo', '1', 'Vova Onegin'),
(18, 'Мир Авто', 'ул. Генерала Маршала 45', 'с 10 до 20', 'AT8245CP', 'Audi 100', '5', 'Константин Риженков');

-- --------------------------------------------------------

--
-- Структура таблиці `cars`
--

CREATE TABLE `cars` (
  `id_car` int(11) NOT NULL,
  `marka` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `cars`
--

INSERT INTO `cars` (`id_car`, `marka`, `model`, `nomer`, `year`) VALUES
(2, 'Audi', 'a6', 'AC8745AE', '2002'),
(3, 'fiat', 'doblo', 'AH3698BE', '2005'),
(4, 'Audi', '100', 'AT8245CP', '1998'),
(5, 'Ford', 'Focus', 'AC7895AE', '2007'),
(6, 'bmw', '325', 'AB9009AT', '2008');

-- --------------------------------------------------------

--
-- Структура таблиці `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `surname`, `login`, `password`) VALUES
(1, 'Владимир', 'Онегин', 'onegin36', 'b59c67bf196a4758191e42f76670ceba'),
(3, 'Коля', 'Шумахер', 'shumaher', 'b59c67bf196a4758191e42f76670ceba'),
(4, 'Андрей', 'Ванечкин', 'andrey', 'b59c67bf196a4758191e42f76670ceba'),
(5, 'Константин', 'Риженков', 'kostya', 'b59c67bf196a4758191e42f76670ceba'),
(6, 'Сергей', 'Добрынин', 'sergey', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Структура таблиці `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `managers`
--

INSERT INTO `managers` (`id`, `name`, `surname`, `login`, `password`) VALUES
(1, 'Олег', 'Швидкий', 'mister.shvydky', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Структура таблиці `page_roots`
--

CREATE TABLE `page_roots` (
  `id_proots` int(11) NOT NULL,
  `proots` varchar(20) NOT NULL,
  `manager` varchar(20) NOT NULL,
  `driver` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `page_roots`
--

INSERT INTO `page_roots` (`id_proots`, `proots`, `manager`, `driver`) VALUES
(1, 'avtopark', '1', '1'),
(2, 'avtopark', '1', '1'),
(3, 'drivers', '1', '0'),
(4, 'drivers', '1', '0'),
(5, 'cars', '1', '1'),
(6, 'cars', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблиці `roots`
--

CREATE TABLE `roots` (
  `id_root` int(11) NOT NULL,
  `roots` varchar(50) NOT NULL,
  `manager` varchar(10) NOT NULL,
  `driver` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `roots`
--

INSERT INTO `roots` (`id_root`, `roots`, `manager`, `driver`) VALUES
(1, 'create_park', '1', '0'),
(3, 'edit_park', '1', '0'),
(4, 'delete_park', '1', '0'),
(5, 'create_driver', '1', '0'),
(6, 'delete_driver', '1', '0'),
(7, 'create_car', '0', '1'),
(13, 'edit_car', '0', '1'),
(14, 'delete_car', '1', '0');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `avtopark`
--
ALTER TABLE `avtopark`
  ADD PRIMARY KEY (`id_apark`);

--
-- Індекси таблиці `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`);

--
-- Індекси таблиці `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `page_roots`
--
ALTER TABLE `page_roots`
  ADD PRIMARY KEY (`id_proots`);

--
-- Індекси таблиці `roots`
--
ALTER TABLE `roots`
  ADD PRIMARY KEY (`id_root`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `avtopark`
--
ALTER TABLE `avtopark`
  MODIFY `id_apark` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `page_roots`
--
ALTER TABLE `page_roots`
  MODIFY `id_proots` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `roots`
--
ALTER TABLE `roots`
  MODIFY `id_root` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
