-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Mar 2023, 12:31:36
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `foodorder`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `foodcategories`
--

CREATE TABLE `foodcategories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `foodcategories`
--

INSERT INTO `foodcategories` (`id`, `category`) VALUES
(1, 'Desserts'),
(2, 'Pizza'),
(3, 'Hamburger'),
(4, 'Pide&Lahmacun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `ingredients` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `foods`
--

INSERT INTO `foods` (`id`, `categoryid`, `name`, `price`, `ingredients`, `photo`) VALUES
(1, 1, 'Puding', 32, 'Kakao and milk', 'assets/img/foods/supangle.jpg'),
(2, 1, 'San Sebastian Cheesecake', 55, 'San Sebastian Cheesecake', 'assets/img/foods/sansebastian.jpg'),
(3, 3, 'Cheeseburger', 85, 'Cheeseburger, fries and coke', 'assets/img/foods/cheeseburger.jpg'),
(4, 3, 'Chicken Burger', 50, ' Chicken tenderloin, lettuce, mint, tomato, pickle, ketchup, mayonnaise.', 'assets/img/foods/chichkenburger.jpg'),
(5, 3, 'Hot Dog Burger', 55, ' Sausage, pickles, tomato, ketchup and mayonnaise.', 'assets/img/foods/hotdogburger.jpg'),
(6, 2, 'Margaritha', 95, ' Mozzarella cheese and tomato sauce', 'assets/img/foods/margarita.jpg'),
(7, 2, 'Mix Pizza', 95, ' Mozzarella, salami, sausage, olives, cheese, mushrooms, green peppers and corn.', 'assets/img/foods/mixpizza.jpg'),
(8, 4, 'Lahmacun', 60, ' 3 pieces of Lahmacun and a coke.', 'assets/img/foods/lahmacun.jpg'),
(9, 4, 'Meat Pide', 85, 'Appetizer', 'assets/img/foods/meatpide.jpg'),
(10, 4, 'Cheese Pide', 80, ' Appetizer', 'assets/img/foods/cheesepide.jpg'),
(11, 2, 'Meat Pizza ', 90, ' Mozzarella Cheese, roast beef, mushrooms and olives.', 'assets/img/foods/meatpizza.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `foodcategories`
--
ALTER TABLE `foodcategories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `foodcategories`
--
ALTER TABLE `foodcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
