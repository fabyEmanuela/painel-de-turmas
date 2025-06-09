-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2025 às 17:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fiap_project`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name_classes` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `classes`
--

INSERT INTO `classes` (`id`, `name_classes`, `description`, `created_at`) VALUES
(2, 'Turma B - Banco de dados I', 'Banco de dados I  inicial', '2025-06-08 18:03:11'),
(4, 'Turma de  gestão de ti', 'Curso base para gestão', NULL),
(6, 'Turma  de Sql II', 'Turma  de Sql II bases ', NULL),
(7, 'Turma de  gestão de ti modulo II', ' gestão de ti modulo II', NULL),
(8, 'Turma de  gestão de ti modulo III', ' gestão de ti modulo III', NULL),
(9, 'Turma  de pôs tech', 'Turma  de pôs tech 2025', NULL),
(11, 'Turma de mestrado', 'Turma de mestrado 2025', NULL),
(12, 'turma nova ', 'aaaaaa', NULL),
(13, 'Turma de Q.a', 'Analise de qualidade', '2025-06-09 13:52:52'),
(14, 'Turma de ux', 'curso voltado pra experiencia  do usuário ', NULL),
(15, 'Turma de java', 'Java EE', NULL),
(16, 'Graduação 2', 'graduação período II', '2025-06-09 14:10:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `name_student` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_student` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `students`
--

INSERT INTO `students` (`id`, `cpf`, `name_student`, `date_birth`, `email`, `password_student`, `created_at`) VALUES
(3, '293.303.710-60', 'Fabio ', '2025-06-16', 'fabiomarcolino@gmail.com', '$2y$10$OPsnMpvnGbFrrhTWtqx8R.YSo5YDLynsQDHzAfH4iw.cksyhmsAqy', '2025-06-09 11:54:34'),
(8, '501.347.850-29', 'Gissele', '2025-07-01', 'gissele@exemplo.us', '$2y$10$BFzKKrlJfa9IcuKbX0R92OGKDt1DGPzhB1EIU3cW5kkV0ElhqZQKa', '2025-06-09 11:53:49'),
(19, '147.854.895-48', 'Fabiana emanuela  andre marcolino ', '2002-01-24', 'emails1235@gmail.com', '$2y$10$m1k/NIFb0lMA1bGoILij5eO9iehNuXkJjs0l2SGoAURkX6x5o5Fqu', '2025-06-08 14:57:47'),
(20, '423.132.783-48', 'Flavia', '2025-06-24', 'tech@gmail.com.br', '$2y$10$.lrTLtqXUudiUUzYkmiZyu1UFaFNxHfs6FzWmbMAe.iHrGlZcTeCm', '2025-06-09 11:52:23'),
(21, '478.548.969-24', 'Claudio fernando souza', '2025-07-02', 'Claudio@gmail.com', '$2y$10$eZJ/pVIxM0ZHhQkHAQZGQu4uesg/E4AIT8pibQovpV41qBYszkdRO', '2025-06-09 14:17:26'),
(33, '755.468.800-66', 'Fernanda ', '1998-06-16', 'tech@digital.com.br', '$2y$10$XLqe9MdcFRmv6hUVpRL8D.Df1AgoslekSmjrIW0KJkJm6k6OF.HTC', '2025-06-09 11:54:12'),
(34, '947.181.560-68', 'Tereza cristina silvas souza', '1998-06-23', 'terezacris@gmail.com', '$2y$10$0EFeOSQ6qeB9n3QW2xZHa.Kqwt7rCk8VcmAmx/RJdhHaLfunbjJBa', '2025-06-09 13:32:15'),
(35, '023.457.110-19', 'Luana', '1996-09-02', 'luana@gmail.com', '$2y$10$5cY3tWvK7NluV3hRuQh9c.zQz79g4U7C5ANc6DJKSdQnHOtj0h9TG', '2025-06-09 11:56:41'),
(36, '899.983.080-20', 'Maria ', '1999-12-09', 'mariaq@gmail.com', '$2y$10$ie745hqEAv7EN8efqyJ0yuoYvKSHco/pRvGdD0w3JIZgPtwV4mwZS', '2025-06-09 11:57:48'),
(47, '251.848.020-02', 'silva santos ', '2025-06-24', 'tech@453535.com', '$2y$10$Ime.jT1eC2zrB6ItftTRTOMvzSEYq5JS8aKUefcyAxrzNMnnMzrhe', '2025-06-09 13:16:11'),
(51, '094.712.460-83', 'Fabiana emanuela', '2025-06-25', 'tech@gmail.com', '$2y$10$F/Qb3MW.wamCOcIUYA2QsuUBBUTmBWeUwarhVoOHOhOpHjlCcFrw.', '2025-06-09 13:18:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `students_classes`
--

CREATE TABLE `students_classes` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `students_classes`
--

INSERT INTO `students_classes` (`id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(6, 19, 2, '2025-06-08 18:03:29', NULL),
(7, 3, 2, '2025-06-08 18:04:17', NULL),
(8, 8, 2, '2025-06-08 18:04:17', NULL),
(12, 20, 9, '2025-06-08 18:06:21', NULL),
(18, 3, 12, '2025-06-08 22:31:01', NULL),
(19, 8, 12, '2025-06-08 22:31:01', NULL),
(20, 3, 9, '2025-06-09 12:00:53', NULL),
(21, 3, 13, '2025-06-09 13:51:35', NULL),
(22, 20, 13, '2025-06-09 13:51:35', NULL),
(23, 34, 13, '2025-06-09 13:51:35', NULL),
(24, 8, 13, '2025-06-09 13:52:52', NULL),
(25, 21, 13, '2025-06-09 13:53:09', NULL),
(26, 47, 13, '2025-06-09 13:53:20', NULL),
(27, 3, 16, '2025-06-09 13:58:32', NULL),
(28, 8, 16, '2025-06-09 13:58:32', NULL),
(29, 20, 16, '2025-06-09 13:58:32', NULL),
(30, 21, 16, '2025-06-09 13:58:32', NULL),
(31, 36, 16, '2025-06-09 13:59:14', NULL),
(32, 47, 16, '2025-06-09 14:10:59', NULL),
(33, 33, 16, '2025-06-09 14:11:16', NULL),
(34, 19, 16, '2025-06-09 14:12:18', NULL),
(35, 35, 16, '2025-06-09 14:15:44', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `students_classes`
--
ALTER TABLE `students_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`,`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `students_classes`
--
ALTER TABLE `students_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `students_classes`
--
ALTER TABLE `students_classes`
  ADD CONSTRAINT `students_classes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `students_classes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
