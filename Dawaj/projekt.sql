-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2023, 19:34
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `staff`
--

CREATE TABLE `staff` (
  `id` text NOT NULL,
  `name` text NOT NULL,
  `warehouse` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `staff`
--

INSERT INTO `staff` (`id`, `name`, `warehouse`, `quantity`) VALUES
('12345670', 'Projekt', 'magazyn 1', 4),
('12345671', 'Kichał', 'Mag', 8),
('12345672', 'Tool C', 'Warehouse Z', 2),
('12345673', 'Part D', 'Warehouse X', 2),
('12345674', 'Accessory E', 'Warehouse Y', 2),
('12345675', 'Component F', 'Warehouse Z', 2),
('12345676', 'Material G', 'Warehouse X', 2),
('12345677', 'Product H', 'Warehouse Y', 2),
('12345678', 'Item I', 'Warehouse Z', 2),
('12345679', 'Device J', 'Warehouse X', 2),
('12345680', 'Equipment K', 'Warehouse Y', 2),
('12345681', 'Supply L', 'Warehouse Z', 2),
('12345682', 'Widget M', 'Warehouse X', 2),
('12345683', 'Gadget N', 'Warehouse Y', 2),
('12345684', 'Tool O', 'Warehouse Z', 2),
('12345685', 'Part P', 'Warehouse X', 2),
('12345686', 'Accessory Q', 'Warehouse Y', 2),
('12345687', 'Component R', 'Warehouse Z', 2),
('12345688', 'Material S', 'Warehouse X', 2),
('12345689', 'Product T', 'Warehouse Y', 2),
('12345690', 'Item U', 'Warehouse Z', 2),
('12345691', 'Device V', 'Warehouse X', 2),
('12345692', 'Equipment W', 'Warehouse Y', 2),
('12345693', 'Supply X', 'Warehouse Z', 2),
('12345694', 'Widget Y', 'Warehouse X', 2),
('12345695', 'Gadget Z', 'Warehouse Y', 2),
('12345696', 'Tool AA', 'Warehouse Z', 2),
('12345697', 'Part BB', 'Warehouse X', 2),
('12345698', 'Accessory CC', 'Warehouse Y', 2),
('12345699', 'Component DD', 'Warehouse Z', 2),
('12345700', 'Material EE', 'Warehouse X', 2),
('12345701', 'Product FF', 'Warehouse Y', 2),
('12345702', 'Item GG', 'Warehouse Z', 2),
('12345703', 'Device HH', 'Warehouse X', 2),
('12345704', 'Equipment II', 'Warehouse Y', 2),
('12345705', 'Supply JJ', 'Warehouse Z', 2),
('12345706', 'Widget KK', 'Warehouse X', 2),
('12399999', 'forlan', 'Mag', 2),
('12399991', 'forlan', 'Mag', 2),
('12345670', 'Projekt', 'magazyn 1', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user_table`
--

INSERT INTO `user_table` (`id`, `email`, `password`) VALUES
(1, '1234', '1234'),
(2, '3233', '222'),
(3, '123', '$argon2i$v=19$m=65536,t=4,p=1$a0FnVjNGQjc5Q2lnODJqTQ$STvW5gPOFubgVeWjDAWFceoERdeHwVQXrJlP+RqqxeY'),
(4, '33', '$2y$10$fWFxM27g1vbe9vqN03x4tu0WkexuFYkdipX3wZQHSyt0o5bxlbxWu'),
(5, '12', '$2y$10$82ETJ5ZuhCl7vqHmzf8Bau2IAENXzHjL4N3QWbyrbigLkh5ynzVMm');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
