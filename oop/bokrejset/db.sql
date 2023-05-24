-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 24 maj 2023 kl 13:28
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bokrejset`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`) VALUES
(1, 'test_fn', 'test_lv'),
(5, 'Emely', 'Henry'),
(6, 'Prince', 'Harry'),
(7, 'Lucy', 'Score'),
(9, 'Stacy', 'Willingham'),
(10, 'Lauren', 'Asher'),
(11, 'Freida', 'McFadden');

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `year` int(4) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`id`, `title`, `year`, `author_id`) VALUES
(1, 'The great book', 2023, 1),
(2, 'test', 2010, 1),
(3, 'Happy Place', 2023, 5),
(4, 'Spare', 2023, 6),
(5, 'Things We Hide from the Light', 2023, 7),
(6, 'All the dangerous things', 2023, 9),
(7, 'Final Offer', 2023, 10),
(8, 'The Housemaid&#39;s Secret', 2023, 11);

-- --------------------------------------------------------

--
-- Tabellstruktur `userbook`
--

CREATE TABLE `userbook` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `userbook`
--

INSERT INTO `userbook` (`id`, `user_id`, `book_id`, `pages`, `comment`) VALUES
(1, 1, 1, 300, 'Blablabla'),
(6, 1, 5, 687, 'Tyckte inte om'),
(7, 4, 3, 504, 'Spännande boken   '),
(8, 5, 7, 398, 'Kan varmt rekommendera'),
(9, 6, 5, 475, 'Tråkig book&#13;&#10;                '),
(10, 6, 1, 279, 'Skriv din recension här...&#13;&#10;                ');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`) VALUES
(1, 'Sergejs', 'Voronins', 's@v.se', '07202023081'),
(4, 'Niklas', 'Johnsson', 'n@j.se', '0768646623'),
(5, 'Anastasia', 'Voronins', 'a@v.se', '0812309712'),
(6, 'Linda', 'Emilsson', 'l@e.se', '0782354325'),
(7, 'Georg', 'Jacobsson', 'g@j.se', '0725832254');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorId` (`author_id`);

--
-- Index för tabell `userbook`
--
ALTER TABLE `userbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`book_id`),
  ADD KEY `userId` (`user_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `userbook`
--
ALTER TABLE `userbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Restriktioner för tabell `userbook`
--
ALTER TABLE `userbook`
  ADD CONSTRAINT `userbook_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `userbook_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
