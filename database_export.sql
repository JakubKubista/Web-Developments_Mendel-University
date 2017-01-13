-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 13. led 2017, 12:26
-- Verze serveru: 10.1.10-MariaDB
-- Verze PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_chat`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `in_room`
--

CREATE TABLE `in_room` (
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_rooms` int(10) UNSIGNED NOT NULL,
  `last_message` datetime NOT NULL,
  `entered` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `in_room`
--

INSERT INTO `in_room` (`id_users`, `id_rooms`, `last_message`, `entered`) VALUES
(1, 1, '0000-00-00 00:00:00', '2017-01-13 12:26:30'),
(8, 53, '0000-00-00 00:00:00', '2015-06-22 01:12:17'),
(9, 1, '0000-00-00 00:00:00', '2017-01-12 00:30:42'),
(12, 1, '0000-00-00 00:00:00', '2017-01-12 22:16:51'),
(13, 1, '0000-00-00 00:00:00', '2015-06-22 11:29:06'),
(14, 1, '0000-00-00 00:00:00', '2017-01-12 23:22:50');

-- --------------------------------------------------------

--
-- Struktura tabulky `messages`
--

CREATE TABLE `messages` (
  `id_messages` bigint(20) UNSIGNED NOT NULL,
  `id_rooms` int(10) UNSIGNED NOT NULL,
  `id_users_from` int(10) UNSIGNED NOT NULL,
  `id_users_to` int(10) UNSIGNED DEFAULT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `messages`
--

INSERT INTO `messages` (`id_messages`, `id_rooms`, `id_users_from`, `id_users_to`, `time`, `message`) VALUES
(2, 1, 1, 1, '2015-05-15 22:44:15', 'Hello'),
(3, 1, 1, 1, '2015-05-15 22:50:18', 'What''s up?'),
(75, 1, 9, 12, '2015-06-21 23:57:28', 'Hey, I''m fine.'),
(95, 2, 13, 13, '2015-06-22 00:51:46', 'Is anyone in the second room?'),
(96, 53, 9, 9, '2015-06-22 01:01:13', 'How you doin?'),
(97, 53, 13, 9, '2015-06-22 01:02:01', 'It works!'),
(209, 1, 1, 12, '2017-01-11 21:00:43', 'Thomas?'),
(210, 1, 9, 9, '2017-01-11 21:01:54', 'He''s not here.'),
(212, 1, 1, 1, '2017-01-11 21:15:44', 'Ok.');

-- --------------------------------------------------------

--
-- Struktura tabulky `rooms`
--

CREATE TABLE `rooms` (
  `id_rooms` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `id_users_owner` int(10) UNSIGNED NOT NULL,
  `lock` enum('t','f') COLLATE utf8_czech_ci NOT NULL,
  `rename` enum('t','f') COLLATE utf8_czech_ci NOT NULL DEFAULT 'f'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `rooms`
--

INSERT INTO `rooms` (`id_rooms`, `created`, `title`, `id_users_owner`, `lock`, `rename`) VALUES
(1, '2015-05-15 21:10:39', 'Room1', 1, 'f', 'f'),
(2, '2015-05-15 21:11:09', 'Room2', 1, 'f', 'f'),
(53, '2015-06-21 17:11:40', 'Room3', 9, 'f', 'f'),
(64, '2017-01-11 15:36:38', 'Room4', 1, 'f', 'f');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id_users` int(10) UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8_czech_ci NOT NULL,
  `registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(200) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id_users`, `login`, `email`, `password`, `name`, `surname`, `gender`, `registered`, `role`) VALUES
(1, 'admin', 'admin@seznam.cz', '3bb5aff21c305f08e8844dbaf281ebb087ede110', 'admin', 'adminek', 'm', '2015-05-15 00:20:00', 'admin'),
(4, 'xkubist1', 'xkubist1@node.cz', '8ea55a820f866f8c71ed7f1de0722afe5ccd8120', 'Jakub', 'Kubišta', 'm', '0000-00-00 00:00:00', 'guest'),
(5, 'Toncek', 'tonda@seznam.cz', '43391489869fdc4133a454f3e8ea38b451a242d2', 'Antonin', 'Pokorny', 'm', '0000-00-00 00:00:00', 'guest'),
(6, 'Magda', 'magda@seznam.cz', '00cafd126182e8a9e7c01bb2f0dfd00496be724f', 'Magdalena', 'Levova', 'f', '0000-00-00 00:00:00', 'guest'),
(7, 'Rada', 'radek@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Radek', 'Tucek', 'm', '2015-05-15 23:15:17', 'guest'),
(8, 'petka', 'petka@gmail.com', 'fba06d24bec801ed7527c17334d12979f4944aa7', 'Petra', 'Mantosova', 'f', '2015-05-15 23:20:28', 'guest'),
(9, 'test', 'test@test.cz', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'testik', 'testosteron', 'm', '2015-06-21 17:11:28', 'admin'),
(12, 'tomas', 'tom@tom.cz', '2bc6038c3dfca09b2da23c8b6da8ba884dc2dcc2', 'tom', 'tom', 'm', '2015-06-21 17:12:19', 'guest'),
(13, 'rena', 'rena@seznam.cz', '0727ef96d56229a5bb9d9ab73d7a56115b778318', 'renata', 'mcglojova', 'f', '2015-06-21 23:41:42', 'guest'),
(14, 'novacek1', 'novak@seznam.cz', '3fa05a32665f456bb89e317be7d3140f834a5e4d', 'Jan', 'Novotny', 'm', '2017-01-12 22:45:49', 'guest');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `in_room`
--
ALTER TABLE `in_room`
  ADD UNIQUE KEY `id_users_UNIQUE` (`id_users`,`id_rooms`),
  ADD KEY `fk_in_room_users1_idx` (`id_users`),
  ADD KEY `fk_in_room_rooms1_idx` (`id_rooms`);

--
-- Klíče pro tabulku `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_messages`),
  ADD KEY `fk_messages_rooms1_idx` (`id_rooms`),
  ADD KEY `fk_messages_users1_idx` (`id_users_from`),
  ADD KEY `fk_messages_users2_idx` (`id_users_to`);

--
-- Klíče pro tabulku `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_rooms`),
  ADD KEY `fk_rooms_users1_idx` (`id_users_owner`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `messages`
--
ALTER TABLE `messages`
  MODIFY `id_messages` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT pro tabulku `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id_rooms` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `in_room`
--
ALTER TABLE `in_room`
  ADD CONSTRAINT `fk_in_room_rooms1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id_rooms`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `in_room_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_rooms1` FOREIGN KEY (`id_rooms`) REFERENCES `rooms` (`id_rooms`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_users1` FOREIGN KEY (`id_users_from`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_users2` FOREIGN KEY (`id_users_to`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_users1` FOREIGN KEY (`id_users_owner`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
