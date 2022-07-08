-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-07-2022 a las 11:05:23
-- Versión del servidor: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `metabiz_mlm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_verificacao`
--

CREATE TABLE `codigos_verificacao` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `usado` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codigos_verificacao`
--

INSERT INTO `codigos_verificacao` (`id`, `id_usuario`, `codigo`, `usado`, `data`) VALUES
(1, 32, '8d3e2a24a003be267d7738f98cbf7f45', 0, '2022-06-28 19:43:29'),
(2, 32, '7e4cae5b46b2a1bb640588234b82d13c', 0, '2022-06-29 03:02:50'),
(3, 32, '235c88434893a248884ce7a439404f1d', 0, '2022-06-29 03:04:59'),
(4, 32, '08c4b7d3797a840002da90b76a22004f', 0, '2022-06-29 03:11:16'),
(5, 32, '92039beaf3b148406a46cb4e1a25dd6a', 0, '2022-06-29 03:14:04'),
(6, 32, 'dafd55b54563cde76276752297f87338', 0, '2022-06-29 03:14:23'),
(7, 32, 'e36ba87282d5589bff396b19bf648c21', 0, '2022-06-29 03:15:29'),
(8, 32, '91fca76d9f57a7f9f6c4f6e550687ce4', 0, '2022-06-30 15:57:40'),
(9, 32, '187618d7c21fe6792403a86828200688', 0, '2022-06-30 16:00:12'),
(10, 32, '6778138ff5e8a1e9eb593cb38d6bea8c', 0, '2022-06-30 21:20:14'),
(11, 22, '567724075b679d904d7eb462bf924fb5', 0, '2022-06-30 21:30:21'),
(12, 22, 'ac163146e8d6102a0b8eaccfcfaca991', 0, '2022-06-30 21:35:49'),
(13, 22, '82efd84d7dbc7d6990154b1891aec338', 0, '2022-06-30 21:36:23'),
(14, 22, '764d8bccb3145dbeb831230570402d7c', 0, '2022-06-30 21:37:21'),
(15, 22, '5df9592e4962aef6e2ef75714332e490', 0, '2022-06-30 21:56:17'),
(16, 22, '4ee69b894c3a627574d52e98814e3960', 0, '2022-06-30 22:39:20'),
(17, 22, 'b9cb2d636769e3616ca300e8a9c2a632', 0, '2022-06-30 22:50:49'),
(18, 32, 'a93ef66851c1b6f43ab16a2110f75464', 0, '2022-06-30 22:51:53'),
(19, 32, '2cf94e43971c1f10e0f43900632f647b', 1, '2022-06-30 22:53:09'),
(20, 32, '087d468304cf2e752c7e6ebc05ecc873', 0, '2022-07-02 06:49:56'),
(21, 32, 'c6d9be670eb978ccb6a87f0b4061af08', 0, '2022-07-03 10:07:04'),
(22, 32, 'fafba6536557ebd1fb7aed404cb625b8', 0, '2022-07-03 10:52:01'),
(23, 52, '49546fb875ed7884a86082779940e4d2', 0, '2022-07-03 11:23:41'),
(24, 22, 'c9bef5df976c1fe3d471e49fdb44db78', 0, '2022-07-05 08:57:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracao`
--

CREATE TABLE `configuracao` (
  `id` int(11) NOT NULL,
  `nome_site` varchar(150) NOT NULL,
  `favicon` text DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `email_remetente` varchar(150) DEFAULT NULL,
  `maximo_cpfs` int(11) NOT NULL DEFAULT 1,
  `login_patrocinador` varchar(50) NOT NULL,
  `indicacao_direta` int(11) NOT NULL,
  `valor_minimo_saque_rendimentos` decimal(10,2) NOT NULL,
  `valor_minimo_saque_indicacoes` decimal(10,2) NOT NULL,
  `taxa_saque` int(11) NOT NULL,
  `smtp_enabled` int(11) NOT NULL,
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` varchar(100) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `smtp_encrypt` varchar(3) DEFAULT NULL,
  `porcentagem_dia` int(11) NOT NULL,
  `quantidade_dias` int(11) NOT NULL,
  `paga_final_semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracao`
--

INSERT INTO `configuracao` (`id`, `nome_site`, `favicon`, `logo`, `email_remetente`, `maximo_cpfs`, `login_patrocinador`, `indicacao_direta`, `valor_minimo_saque_rendimentos`, `valor_minimo_saque_indicacoes`, `taxa_saque`, `smtp_enabled`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_encrypt`, `porcentagem_dia`, `quantidade_dias`, `paga_final_semana`) VALUES
(1, 'Metabiz', NULL, '364fe484c644e6d6269f397796088ffa.png', 'support@themetabiz.io', 10000000, 'demo', 10, '50.00', '50.00', 10, 1, 'in-v3.mailjet.com', '170426cecdc6545f7dbab3e6a0e885dd', 'debc4a7df657ac6cbd9cb58f620372ef', 587, 'tls', 5, 60, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracao_nivel_indicacoes`
--

CREATE TABLE `configuracao_nivel_indicacoes` (
  `id` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `porcentagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracao_nivel_indicacoes`
--

INSERT INTO `configuracao_nivel_indicacoes` (`id`, `nivel`, `porcentagem`) VALUES
(1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracao_pagamento_saque`
--

CREATE TABLE `configuracao_pagamento_saque` (
  `id` int(11) NOT NULL,
  `dia_pagamento` int(11) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_termino` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracao_pagamento_saque`
--

INSERT INTO `configuracao_pagamento_saque` (`id`, `dia_pagamento`, `horario_inicio`, `horario_termino`) VALUES
(46, 1, '00:01:00', '23:58:00'),
(47, 2, '00:01:00', '23:58:00'),
(48, 3, '00:01:00', '23:58:00'),
(49, 4, '00:01:00', '23:58:00'),
(50, 5, '00:01:00', '23:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contas_pagamento`
--

CREATE TABLE `contas_pagamento` (
  `id` int(11) NOT NULL,
  `banco` varchar(5) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(15) DEFAULT NULL,
  `operacao` varchar(5) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `titular` varchar(150) DEFAULT NULL,
  `documento` varchar(30) DEFAULT NULL,
  `categoria_conta` int(11) NOT NULL DEFAULT 1,
  `carteira_bitcoin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extrato`
--

CREATE TABLE `extrato` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extrato`
--

INSERT INTO `extrato` (`id`, `id_usuario`, `tipo`, `mensagem`, `valor`, `data`) VALUES
(1, 2, 1, 'Beto user Referral Bonus', '20.00', '2022-06-16 07:43:47'),
(2, 1, 1, 'beto user Referral Bonus', '15.00', '2022-06-16 07:43:47'),
(3, 2, 1, 'betomendez user Referral Bonus', '20.00', '2022-06-16 08:31:12'),
(4, 1, 1, 'betomendez user Referral Bonus', '15.00', '2022-06-16 08:31:13'),
(5, 2, 1, ' game user Referral Bonus', '8.00', '2022-06-16 08:44:27'),
(6, 1, 1, 'game user Referral Bonus', '6.00', '2022-06-16 08:44:27'),
(7, 1, 2, 'Solicitação de saque', '900.00', '2022-06-24 10:04:05'),
(8, 1, 2, 'Taxa do saque', '100.00', '2022-06-24 10:04:05'),
(9, 2, 1, 'scooby user Referral Bonus', '4.00', '2022-06-25 06:13:17'),
(10, 1, 1, 'scooby user Referral Bonus', '3.00', '2022-06-25 06:13:17'),
(11, 9, 1, 'Bônus de indicação do usuário kirusiya', '18.00', '2022-06-25 18:33:18'),
(12, 1, 1, 'Bônus de indicação do usuário carlitos1', '180.00', '2022-06-26 17:53:46'),
(13, 1, 1, 'Bônus de indicação do usuário pedrito1', '1200.00', '2022-06-26 17:58:36'),
(14, 1, 1, 'Bônus de indicação do usuário juancito1', '6.00', '2022-06-26 18:07:09'),
(15, 1, 1, 'betoml user Referral Bonus', '6.00', '2022-06-26 18:07:15'),
(16, 25, 1, 'Bônus de indicação do usuário clarita1', '6.00', '2022-06-26 19:19:06'),
(17, 9, 1, 'Bônus de indicação do usuário kirusiya', '1200.00', '2022-06-26 19:19:08'),
(18, 25, 1, 'Bônus de indicação do usuário susan1', '0.60', '2022-06-26 19:24:00'),
(19, 1, 2, 'Solicitação de saque', '450.00', '2022-06-26 20:24:25'),
(20, 1, 2, 'Taxa do saque', '50.00', '2022-06-26 20:24:25'),
(21, 2, 2, 'Solicitação de saque', '225.00', '2022-06-26 22:09:24'),
(22, 2, 2, 'Taxa do saque', '25.00', '2022-06-26 22:09:24'),
(23, 1, 2, 'Solicitação de saque', '225.00', '2022-06-26 22:17:48'),
(24, 1, 2, 'Taxa do saque', '25.00', '2022-06-26 22:17:48'),
(25, 10, 1, 'Bônus de indicação do usuário alexandra', '0.60', '2022-06-26 22:31:19'),
(26, 3, 2, 'Solicitação de saque', '180.00', '2022-06-27 12:48:28'),
(27, 3, 2, 'Taxa do saque', '20.00', '2022-06-27 12:48:28'),
(28, 1, 2, 'Solicitação de saque', '90.00', '2022-06-27 19:36:51'),
(29, 1, 2, 'Taxa do saque', '10.00', '2022-06-27 19:36:51'),
(30, 1, 2, 'Solicitação de saque', '225.00', '2022-06-28 04:03:52'),
(31, 1, 2, 'Taxa do saque', '25.00', '2022-06-28 04:03:52'),
(32, 9, 1, 'User Referral Bonuskirusiya', '0.30', '2022-06-28 05:25:37'),
(33, 1, 2, 'Solicitação de saque', '225.00', '2022-06-28 05:30:19'),
(34, 1, 2, 'Taxa do saque', '25.00', '2022-06-28 05:30:19'),
(35, 1, 2, 'Solicitação de saque', '225.00', '2022-06-29 07:51:12'),
(36, 1, 2, 'Taxa do saque', '25.00', '2022-06-29 07:51:12'),
(37, 1, 2, 'Solicitação de saque', '225.00', '2022-06-29 08:10:23'),
(38, 1, 2, 'Taxa do saque', '25.00', '2022-06-29 08:10:23'),
(39, 1, 2, 'Solicitação de saque', '225.00', '2022-06-29 08:12:24'),
(40, 1, 2, 'Taxa do saque', '25.00', '2022-06-29 08:12:24'),
(41, 1, 2, 'Solicitação de saque', '225.00', '2022-06-29 08:13:06'),
(42, 1, 2, 'Taxa do saque', '25.00', '2022-06-29 08:13:06'),
(43, 2, 1, 'User Referral Bonusgame', '6.00', '2022-06-29 09:53:35'),
(44, 25, 1, 'Pagamento do binário do dia', '0.70', '2022-06-30 20:10:31'),
(45, 2, 1, 'Pagamento do binário do dia', '0.00', '2022-06-30 20:10:31'),
(46, 1, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(47, 2, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(48, 3, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(49, 4, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(50, 4, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(51, 5, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:10:38'),
(52, 10, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:10:38'),
(53, 11, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(54, 12, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:10:38'),
(55, 21, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:10:38'),
(56, 10, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:10:38'),
(57, 10, 1, 'Pagamento do rendimento do plano', '1000.00', '2022-06-30 20:10:38'),
(58, 25, 1, 'Pagamento do rendimento do plano', '150.00', '2022-06-30 20:10:38'),
(59, 26, 1, 'Pagamento do rendimento do plano', '1000.00', '2022-06-30 20:10:38'),
(60, 2, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:10:38'),
(61, 27, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:10:38'),
(62, 28, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:10:38'),
(63, 29, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:10:38'),
(64, 14, 1, 'Pagamento do rendimento do plano', '500.00', '2022-06-30 20:10:38'),
(65, 10, 1, 'Pagamento do rendimento do plano', '2.50', '2022-06-30 20:10:38'),
(66, 5, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:10:38'),
(67, 1, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(68, 2, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(69, 3, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(70, 4, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(71, 4, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(72, 5, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:13:43'),
(73, 10, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:13:43'),
(74, 11, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(75, 12, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:43'),
(76, 21, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:43'),
(77, 10, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:13:43'),
(78, 10, 1, 'Pagamento do rendimento do plano', '1000.00', '2022-06-30 20:13:43'),
(79, 25, 1, 'Pagamento do rendimento do plano', '150.00', '2022-06-30 20:13:43'),
(80, 26, 1, 'Pagamento do rendimento do plano', '1000.00', '2022-06-30 20:13:43'),
(81, 2, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:43'),
(82, 27, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:43'),
(83, 28, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:43'),
(84, 29, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:43'),
(85, 14, 1, 'Pagamento do rendimento do plano', '500.00', '2022-06-30 20:13:43'),
(86, 10, 1, 'Pagamento do rendimento do plano', '2.50', '2022-06-30 20:13:43'),
(87, 5, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:43'),
(88, 25, 1, 'Pagamento do binário do dia', '1.40', '2022-06-30 20:13:45'),
(89, 1, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(90, 2, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(91, 3, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(92, 4, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(93, 4, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(94, 5, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:13:52'),
(95, 10, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:13:52'),
(96, 11, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(97, 12, 1, 'Pagamento do rendimento do plano', '30.00', '2022-06-30 20:13:52'),
(98, 21, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:52'),
(99, 10, 1, 'Pagamento do rendimento do plano', '15.00', '2022-06-30 20:13:52'),
(100, 10, 1, 'Pagamento do rendimento do plano', '1000.00', '2022-06-30 20:13:52'),
(101, 25, 1, 'Pagamento do rendimento do plano', '150.00', '2022-06-30 20:13:52'),
(102, 26, 1, 'Pagamento do rendimento do plano', '1000.00', '2022-06-30 20:13:52'),
(103, 2, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:52'),
(104, 27, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:52'),
(105, 28, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:52'),
(106, 29, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:52'),
(107, 14, 1, 'Pagamento do rendimento do plano', '500.00', '2022-06-30 20:13:52'),
(108, 10, 1, 'Pagamento do rendimento do plano', '2.50', '2022-06-30 20:13:52'),
(109, 5, 1, 'Pagamento do rendimento do plano', '5.00', '2022-06-30 20:13:52'),
(110, 10, 1, 'User Referral Bonusjuancito3', '0.06', '2022-06-30 20:18:28'),
(111, 10, 1, 'User Referral Bonuspedrito3', '0.06', '2022-06-30 20:20:35'),
(112, 10, 2, 'Solicitação de saque', '225.00', '2022-06-30 20:59:54'),
(113, 10, 2, 'Taxa do saque', '25.00', '2022-06-30 20:59:54'),
(114, 10, 2, 'Solicitação de saque', '225.00', '2022-06-30 21:03:55'),
(115, 10, 2, 'Taxa do saque', '25.00', '2022-06-30 21:03:55'),
(116, 10, 2, 'Solicitação de saque', '225.00', '2022-06-30 21:08:57'),
(117, 10, 2, 'Taxa do saque', '25.00', '2022-06-30 21:08:57'),
(118, 10, 2, 'Solicitação de saque', '232.50', '2022-06-30 21:14:41'),
(119, 10, 2, 'Taxa do saque', '17.50', '2022-06-30 21:14:41'),
(120, 10, 2, 'Solicitação de saque', '225.00', '2022-06-30 21:22:48'),
(121, 10, 2, 'Taxa do saque', '25.00', '2022-06-30 21:22:48'),
(122, 10, 2, 'Solicitação de saque', '242.50', '2022-06-30 22:22:54'),
(123, 10, 2, 'Taxa do saque', '7.50', '2022-06-30 22:22:54'),
(124, 10, 2, 'Solicitação de saque', '270.00', '2022-06-30 22:25:37'),
(125, 10, 2, 'Taxa do saque', '30.00', '2022-06-30 22:25:37'),
(126, 1, 2, 'Withdraw request', '237.50', '2022-07-01 03:01:09'),
(127, 1, 2, 'Withdraw fee', '12.50', '2022-07-01 03:01:09'),
(128, 1, 2, 'Withdraw request', '285.00', '2022-07-01 03:32:14'),
(129, 1, 2, 'Withdraw fee', '15.00', '2022-07-01 03:32:14'),
(130, 1, 2, 'Withdraw request', '465.00', '2022-07-01 03:41:17'),
(131, 1, 2, 'Withdraw fee', '35.00', '2022-07-01 03:41:17'),
(132, 1, 2, 'Withdraw request', '98.00', '2022-07-01 03:41:59'),
(133, 1, 2, 'Withdraw fee', '2.00', '2022-07-01 03:41:59'),
(134, 1, 1, 'Withdrawal request reversal.', '100.00', '2022-07-01 03:43:21'),
(135, 1, 2, 'Withdraw request', '225.00', '2022-07-01 16:24:06'),
(136, 1, 2, 'Withdraw fee', '25.00', '2022-07-01 16:24:06'),
(137, 10, 2, 'Withdraw request', '98.00', '2022-07-01 16:31:44'),
(138, 10, 2, 'Withdraw fee', '2.00', '2022-07-01 16:31:44'),
(139, 9, 1, 'User Referral Bonuskirusiya', '0.06', '2022-07-01 17:02:09'),
(140, 9, 1, 'User Referral Bonuskirusiya', '0.06', '2022-07-01 17:07:40'),
(141, 22, 1, 'User Referral Bonustest21', '0.06', '2022-07-01 18:15:20'),
(142, 22, 1, 'User Referral Bonustest24', '0.06', '2022-07-01 18:23:09'),
(143, 22, 1, 'User Referral Bonustest23', '0.06', '2022-07-01 18:27:11'),
(144, 3, 1, 'User Referral Bonusbolivar', '6.00', '2022-07-01 18:58:22'),
(145, 45, 1, 'User Referral Bonusmagno', '6.00', '2022-07-01 19:33:43'),
(146, 45, 1, 'User Referral Bonusjcesar', '6.00', '2022-07-02 05:55:51'),
(147, 45, 1, 'User Referral Bonussucre', '6.00', '2022-07-02 06:00:16'),
(148, 45, 1, 'User Referral Bonus canoto', '6.00', '2022-07-02 06:12:53'),
(149, 10, 2, 'Withdraw request', '351.50', '2022-07-02 06:33:34'),
(150, 10, 2, 'Withdraw fee', '18.50', '2022-07-02 06:33:34'),
(151, 9, 1, 'User Referral Bonus kirusiya', '0.06', '2022-07-02 07:17:50'),
(152, 9, 1, 'User Referral Bonus kirusiya', '0.06', '2022-07-02 07:26:36'),
(153, 1, 1, 'User Referral Bonus carlitos1', '0.06', '2022-07-02 07:40:37'),
(154, 9, 1, 'User Referral Bonus kirusiya', '0.06', '2022-07-02 07:49:15'),
(155, 9, 1, 'User Referral Bonus kirusiya', '0.06', '2022-07-02 08:05:06'),
(156, 25, 1, 'User Referral Bonus clarita1', '0.06', '2022-07-02 08:09:59'),
(157, 25, 1, 'User Referral Bonus clarita1', '0.06', '2022-07-02 08:12:42'),
(158, 53, 1, 'User Referral Bonus peter', '3.00', '2022-07-03 12:15:27'),
(159, 1, 1, 'User Referral Bonus hann', '0.06', '2022-07-03 12:35:44'),
(160, 53, 1, 'User Referral Bonus gonza', '0.06', '2022-07-03 15:24:16'),
(161, 53, 1, 'User Referral Bonus mafer', '0.06', '2022-07-03 16:47:21'),
(162, 25, 1, 'Binary payout of the day', '8.40', '2022-07-03 16:48:16'),
(163, 45, 1, 'Binary payout of the day', '1.40', '2022-07-03 16:48:16'),
(164, 45, 1, 'Binary payout of the day', '1.40', '2022-07-03 17:02:28'),
(165, 53, 1, 'Binary payout of the day', '3.50', '2022-07-03 17:02:28'),
(166, 55, 1, 'User Referral Bonus xavi', '0.06', '2022-07-03 17:11:38'),
(167, 55, 1, 'User Referral Bonus chani', '0.06', '2022-07-03 17:14:01'),
(168, 53, 1, 'Binary payout of the day', '14.00', '2022-07-03 17:15:07'),
(169, 1, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(170, 2, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(171, 3, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(172, 4, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(173, 4, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(174, 5, 1, 'Payment of plan income', '15.00', '2022-07-03 17:18:45'),
(175, 10, 1, 'Payment of plan income', '15.00', '2022-07-03 17:18:45'),
(176, 11, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(177, 12, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(178, 21, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(179, 10, 1, 'Payment of plan income', '15.00', '2022-07-03 17:18:45'),
(180, 10, 1, 'Payment of plan income', '1000.00', '2022-07-03 17:18:45'),
(181, 25, 1, 'Payment of plan income', '150.00', '2022-07-03 17:18:45'),
(182, 26, 1, 'Payment of plan income', '1000.00', '2022-07-03 17:18:45'),
(183, 2, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(184, 27, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(185, 28, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(186, 29, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(187, 14, 1, 'Payment of plan income', '500.00', '2022-07-03 17:18:45'),
(188, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(189, 5, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(190, 38, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(191, 39, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(192, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(193, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(194, 42, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(195, 44, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(196, 43, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(197, 45, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(198, 46, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(199, 47, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(200, 48, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(201, 49, 1, 'Payment of plan income', '5.00', '2022-07-03 17:18:45'),
(202, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(203, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(204, 25, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(205, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(206, 10, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(207, 28, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(208, 28, 1, 'Payment of plan income', '30.00', '2022-07-03 17:18:45'),
(209, 54, 1, 'Payment of plan income', '2.50', '2022-07-03 17:18:45'),
(210, 53, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(211, 55, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(212, 56, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(213, 57, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(214, 58, 1, 'Payment of plan income', '0.05', '2022-07-03 17:18:45'),
(215, 55, 1, 'User Referral Bonus jeancarlo', '0.06', '2022-07-03 17:47:22'),
(216, 55, 1, 'Binary payout of the day', '7.00', '2022-07-03 17:48:52'),
(217, 1, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(218, 2, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(219, 3, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(220, 4, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(221, 4, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(222, 5, 1, 'Payment of plan income', '15.00', '2022-07-03 17:53:49'),
(223, 10, 1, 'Payment of plan income', '15.00', '2022-07-03 17:53:49'),
(224, 11, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(225, 12, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(226, 21, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(227, 10, 1, 'Payment of plan income', '15.00', '2022-07-03 17:53:49'),
(228, 10, 1, 'Payment of plan income', '1000.00', '2022-07-03 17:53:49'),
(229, 25, 1, 'Payment of plan income', '150.00', '2022-07-03 17:53:49'),
(230, 26, 1, 'Payment of plan income', '1000.00', '2022-07-03 17:53:49'),
(231, 2, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(232, 27, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(233, 28, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(234, 29, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(235, 14, 1, 'Payment of plan income', '500.00', '2022-07-03 17:53:49'),
(236, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(237, 5, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(238, 38, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(239, 39, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(240, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(241, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(242, 42, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(243, 44, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(244, 43, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(245, 45, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(246, 46, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(247, 47, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(248, 48, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(249, 49, 1, 'Payment of plan income', '5.00', '2022-07-03 17:53:49'),
(250, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(251, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(252, 25, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(253, 10, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(254, 10, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(255, 28, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(256, 28, 1, 'Payment of plan income', '30.00', '2022-07-03 17:53:49'),
(257, 54, 1, 'Payment of plan income', '2.50', '2022-07-03 17:53:49'),
(258, 53, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(259, 55, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(260, 56, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(261, 57, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(262, 58, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(263, 59, 1, 'Payment of plan income', '0.05', '2022-07-03 17:53:49'),
(264, 56, 1, 'User Referral Bonus maferia', '0.06', '2022-07-03 18:54:01'),
(265, 56, 1, 'User Referral Bonus maferib', '0.06', '2022-07-03 18:56:00'),
(266, 56, 1, 'User Referral Bonus maferc', '0.06', '2022-07-03 18:59:33'),
(267, 56, 1, 'User Referral Bonus maferd', '0.06', '2022-07-03 19:01:42'),
(268, 55, 1, 'Binary payout of the day', '7.00', '2022-07-03 19:08:29'),
(269, 56, 1, 'Binary payout of the day', '7.00', '2022-07-03 19:08:29'),
(270, 10, 1, 'User Referral Bonus carlita1213', '0.06', '2022-07-04 12:45:01'),
(271, 56, 1, 'Binary payout of the day', '10.50', '2022-07-04 16:54:29'),
(272, 1, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(273, 2, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(274, 3, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(275, 4, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(276, 4, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(277, 5, 1, 'Payment of plan income', '15.00', '2022-07-04 17:03:24'),
(278, 10, 1, 'Payment of plan income', '15.00', '2022-07-04 17:03:24'),
(279, 11, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(280, 12, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(281, 21, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(282, 10, 1, 'Payment of plan income', '15.00', '2022-07-04 17:03:24'),
(283, 10, 1, 'Payment of plan income', '1000.00', '2022-07-04 17:03:24'),
(284, 25, 1, 'Payment of plan income', '150.00', '2022-07-04 17:03:24'),
(285, 26, 1, 'Payment of plan income', '1000.00', '2022-07-04 17:03:24'),
(286, 2, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(287, 27, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(288, 28, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(289, 29, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(290, 14, 1, 'Payment of plan income', '500.00', '2022-07-04 17:03:24'),
(291, 10, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(292, 5, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(293, 38, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(294, 39, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(295, 10, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(296, 10, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(297, 42, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(298, 44, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(299, 43, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(300, 45, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(301, 46, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(302, 47, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(303, 48, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(304, 49, 1, 'Payment of plan income', '5.00', '2022-07-04 17:03:24'),
(305, 10, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(306, 10, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(307, 25, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(308, 10, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(309, 10, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(310, 28, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(311, 28, 1, 'Payment of plan income', '30.00', '2022-07-04 17:03:24'),
(312, 54, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(313, 53, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(314, 55, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(315, 56, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(316, 57, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(317, 58, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(318, 59, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(319, 60, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(320, 61, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(321, 62, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(322, 63, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(323, 50, 1, 'Payment of plan income', '0.05', '2022-07-04 17:03:24'),
(324, 10, 1, 'User Referral Bonus juancito2315', '0.06', '2022-07-04 17:13:03'),
(325, 64, 1, 'User Referral Bonus pedrito2542', '0.06', '2022-07-04 17:19:29'),
(326, 45, 1, 'User Referral Bonus vinny', '3.00', '2022-07-04 21:13:39'),
(327, 10, 1, 'User Referral Bonus carlistos145', '0.06', '2022-07-05 13:05:41'),
(328, 69, 1, 'User Referral Bonus jalberto', '3.00', '2022-07-05 17:26:27'),
(329, 83, 1, 'User Referral Bonus diego1', '0.60', '2022-07-05 17:28:10'),
(330, 90, 1, 'User Referral Bonus alvarito', '0.60', '2022-07-05 17:33:23'),
(331, 10, 1, 'User Referral Bonus kirusiya', '60.00', '2022-07-05 17:38:46'),
(332, 83, 1, 'User Referral Bonus c_kirusiya1', '180.00', '2022-07-05 17:38:56'),
(333, 83, 1, 'User Referral Bonus c_kirusiya2', '18.00', '2022-07-05 17:39:07'),
(334, 83, 1, 'User Referral Bonus c_kirusiya3', '6.00', '2022-07-05 17:45:50'),
(335, 83, 1, 'User Referral Bonus c_kirusiya6', '180.00', '2022-07-05 17:47:46'),
(336, 91, 1, 'User Referral Bonus isilva', '3.00', '2022-07-05 17:51:07'),
(337, 84, 1, 'User Referral Bonus c_kirusiya1_4', '360.00', '2022-07-05 17:51:21'),
(338, 91, 1, 'User Referral Bonus angelita', '3.00', '2022-07-05 18:06:07'),
(339, 83, 1, 'User Referral Bonus pedrito4523', '0.12', '2022-07-05 18:40:10'),
(340, 83, 1, 'User Referral Bonus juancito2345', '0.12', '2022-07-05 23:18:05'),
(341, 10, 1, 'User Referral Bonus kirusiya', '0.60', '2022-07-05 23:24:28'),
(342, 84, 1, 'User Referral Bonus c_kirusiya1_4', '0.12', '2022-07-05 23:27:47'),
(343, 84, 1, 'User Referral Bonus c_kirusiya1_4', '0.60', '2022-07-05 23:30:33'),
(344, 84, 1, 'User Referral Bonus c_kirusiya1_4', '0.06', '2022-07-05 23:38:39'),
(345, 10, 1, 'User Referral Bonus kirusiya', '0.12', '2022-07-05 23:44:57'),
(346, 10, 1, 'User Referral Bonus kirusiya', '0.12', '2022-07-05 23:47:32'),
(347, 83, 1, 'User Referral Bonus c_kirusiya1', '0.06', '2022-07-06 03:28:45'),
(348, 97, 1, 'User Referral Bonus kirusiya', '0.12', '2022-07-06 04:48:06'),
(349, 98, 1, 'User Referral Bonus jarolito3', '0.06', '2022-07-06 06:15:54'),
(350, 91, 1, 'Binary payout of the day', '0.00', '2022-07-06 06:42:14'),
(351, 1, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(352, 2, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(353, 3, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(354, 4, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(355, 4, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(356, 5, 1, 'Payment of plan income', '15.00', '2022-07-06 06:42:20'),
(357, 10, 1, 'Payment of plan income', '15.00', '2022-07-06 06:42:20'),
(358, 11, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(359, 12, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(360, 21, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(361, 10, 1, 'Payment of plan income', '15.00', '2022-07-06 06:42:20'),
(362, 10, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:20'),
(363, 25, 1, 'Payment of plan income', '150.00', '2022-07-06 06:42:20'),
(364, 26, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:20'),
(365, 2, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(366, 27, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(367, 28, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(368, 29, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(369, 14, 1, 'Payment of plan income', '0.05', '2022-07-06 06:42:20'),
(370, 10, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(371, 5, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(372, 38, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(373, 39, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(374, 10, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(375, 10, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(376, 42, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(377, 44, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(378, 43, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(379, 45, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(380, 46, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(381, 47, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(382, 48, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(383, 49, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:20'),
(384, 10, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(385, 10, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(386, 25, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(387, 10, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(388, 10, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(389, 28, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(390, 28, 1, 'Payment of plan income', '30.00', '2022-07-06 06:42:20'),
(391, 54, 1, 'Payment of plan income', '2.50', '2022-07-06 06:42:20'),
(392, 53, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(393, 55, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(394, 56, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(395, 57, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(396, 58, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(397, 59, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(398, 60, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(399, 61, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(400, 62, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(401, 63, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:20'),
(402, 50, 1, 'Payment of plan income', '2.50', '2022-07-06 06:42:20'),
(403, 64, 1, 'Payment of plan income', '2.50', '2022-07-06 06:42:20'),
(404, 65, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(405, 69, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(406, 81, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(407, 91, 1, 'Payment of plan income', '2.50', '2022-07-06 06:42:21'),
(408, 90, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(409, 92, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(410, 83, 1, 'Payment of plan income', '50.00', '2022-07-06 06:42:21'),
(411, 84, 1, 'Payment of plan income', '150.00', '2022-07-06 06:42:21'),
(412, 85, 1, 'Payment of plan income', '15.00', '2022-07-06 06:42:21'),
(413, 86, 1, 'Payment of plan income', '5.00', '2022-07-06 06:42:21'),
(414, 89, 1, 'Payment of plan income', '150.00', '2022-07-06 06:42:21'),
(415, 93, 1, 'Payment of plan income', '2.50', '2022-07-06 06:42:21'),
(416, 87, 1, 'Payment of plan income', '300.00', '2022-07-06 06:42:21'),
(417, 94, 1, 'Payment of plan income', '2.50', '2022-07-06 06:42:21'),
(418, 96, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:21'),
(419, 97, 1, 'Payment of plan income', '0.05', '2022-07-06 06:42:21'),
(420, 95, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:21'),
(421, 83, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(422, 87, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:21'),
(423, 87, 1, 'Payment of plan income', '0.50', '2022-07-06 06:42:21'),
(424, 87, 1, 'Payment of plan income', '0.05', '2022-07-06 06:42:21'),
(425, 83, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:21'),
(426, 83, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:21'),
(427, 84, 1, 'Payment of plan income', '0.05', '2022-07-06 06:42:21'),
(428, 98, 1, 'Payment of plan income', '0.10', '2022-07-06 06:42:21'),
(429, 101, 1, 'Payment of plan income', '0.05', '2022-07-06 06:42:21'),
(430, 98, 1, 'User Referral Bonus jarolito3', '0.60', '2022-07-06 07:05:07'),
(431, 98, 1, 'User Referral Bonus jarolito3', '0.60', '2022-07-06 07:10:12'),
(432, 98, 1, 'User Referral Bonus jarolito3', '0.12', '2022-07-06 07:22:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faturas`
--

CREATE TABLE `faturas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `comprovante` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `data_pagamento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `faturas`
--

INSERT INTO `faturas` (`id`, `id_usuario`, `id_plano`, `comprovante`, `status`, `data_pagamento`) VALUES
(1, 1, 89327534, 'teste.jpg', 1, '2022-06-15'),
(5, 2, 89327534, NULL, 1, '2022-06-01'),
(7, 3, 89327534, 'b1dbe09598d78d47a21de920503ce3c4.png', 1, '2022-06-16'),
(8, 4, 89327534, 'b1dbe09598d78d47a21de920503ce3c4.png', 1, '2022-06-16'),
(9, 4, 89327534, '548c291f8851403f9bb16572f64ffa7a.png', 1, '2022-06-16'),
(10, 5, 89327533, '123526f062737abd82573cf5923f1526.png', 1, '2022-06-16'),
(11, 6, 89327534, NULL, 0, NULL),
(12, 9, 89327532, NULL, 0, NULL),
(13, 10, 89327533, '123526f062737abd82573cf5923f1526.png', 1, '2022-06-21'),
(14, 11, 89327534, '123526f062737abd82573cf5923f1526.png', 1, '2022-06-21'),
(15, 12, 89327534, '123526f062737abd82573cf5923f1526.png', 1, '2022-06-21'),
(21, 21, 89327532, '0x8228fb3cf605123d26112bc96135ee7cc3b3be8c04de3c5521569ff1337f70ee', 1, '2022-06-25'),
(22, 24, 89327534, NULL, 0, NULL),
(23, 10, 89327533, '0x28339dddbf82d1db9cf0f58fd67c847298abef13716be55e28387f72197a843b', 1, '2022-06-25'),
(24, 10, 89327539, '0xecac5fe042c501bbdcf4b9d3f643d4e7bee57b47d702886411dbaa8639d4de90', 1, '2022-06-26'),
(27, 25, 89327536, '0x8989a7449a18a03c28b33feb4e8ab1a5cb40ce05d7cc79b02da7be5a4d4e69b2', 1, '2022-06-26'),
(28, 26, 89327539, '0x9abb729192f6b3d89943bcba6d9f7da518025ed837c569b0351f01cbb11e22fb', 1, '2022-06-26'),
(29, 2, 89327532, '0x915b5b60521d830feab7d20c0b077e5dd93ab7f3d9a399c347dcd0b0f0994a8c', 1, '2022-06-26'),
(32, 27, 89327532, '0x3c3ba8ddc995abf255a523c4c9765a1e15a3035497389e0b99aff4c01c6d5b09', 1, '2022-06-26'),
(33, 28, 89327532, '0xb1f40fa14f7b6757a2dfe862842e0d0b56465075bf0c32a4f6ec72379f005b83', 1, '2022-06-26'),
(35, 29, 89327532, '0xf69425dbd57e7ad1febaa263e15f491c5621e70d0ff7f02eb2f43796c98a1390', 1, '2022-06-26'),
(36, 14, 89327538, '0x3a53b7b6b13495dd4e2e35b07cfd213d32edcc76602a6641d070f7e624b7be0d', 1, '2022-06-26'),
(38, 10, 89327540, '0x9fc475e4b8dbe0d4be98b80f0cc6448230974315c394e1f194437d4fa8236a41', 1, '2022-06-28'),
(39, 1, 89327540, NULL, 0, NULL),
(41, 5, 89327532, '0x09c293d7c14d7eb4ea9cc53ef4498c22114662a5d50cd1650f766be7492fccc4', 1, '2022-06-29'),
(42, 38, 89327540, '0xd5d63d52113306c3aeb1514ed69e5f393c65aa8d91d061c61bb1823a0b34102d', 1, '2022-06-30'),
(43, 39, 89327540, '0x12e5467f9eac1454b86c90dbc8750c9e4486a096408729bbbd55d69b8b8f8628', 1, '2022-06-30'),
(44, 10, 89327540, '0x00c78d900dcd63a23c1b3bf8b3b2fc3c450028fd99fc6fc176d8932ed048f645', 1, '2022-07-01'),
(45, 10, 89327540, '0xddfb4461980912e56ccb27f47d1abb943ea26b35a8ce23e8290c1daa9650ba7d', 1, '2022-07-01'),
(46, 42, 89327540, '0xf1db6618be217e26d8fe953b1c349a5324be70e0a37292135d52546972f729ee', 1, '2022-07-01'),
(47, 44, 89327540, '0x64a52134cf328925f69317b9cd54acfa2b981992d6102a2df143d550f92ed428', 1, '2022-07-01'),
(48, 43, 89327540, '0x0bda8750293dcd38053443ca8e38963151f8bad3cb2d214d0919ecda0f82623c', 1, '2022-07-01'),
(50, 45, 89327532, '0x73188ef427800caf0dd5efc1a851271846b266d3b565547f8af4afa66949038f', 1, '2022-07-01'),
(51, 46, 89327532, '0xf53bbcb1ef189a549e138708c52585d38d37e7d177d57939fb9fbc8a544b70b3', 1, '2022-07-01'),
(53, 47, 89327532, '0x99a09417be9fa165b2d20a7a97ee550e2ceef8925ced6c83d18517e15c590a11', 1, '2022-07-02'),
(54, 48, 89327532, '0xd1b83a543696efa4367de1fe87232f0ebd6231643accd684be67e4b7d1cb3b58', 1, '2022-07-02'),
(55, 49, 89327532, '0x7f547e8b7932e1538d7474eff20f5c765331c20677f44e027a99961604bd7c2b', 1, '2022-07-02'),
(56, 10, 89327540, '0x977e8a18665687c9c536c8bd206bdf8589831afd67548c7310710e95b9984fcb', 1, '2022-07-02'),
(58, 10, 89327540, '0x3c90b049cf0a9f18a84200ae39ac9d49e0155d584f04477e50f87a3571a3cd47', 1, '2022-07-02'),
(59, 25, 89327540, '0x2f8ded9613c1ffe291e649404c92b211c86a86bfead9e19e31c910baf480c256', 1, '2022-07-02'),
(60, 10, 89327540, '0xfaba22c994ce432de8764f21733066dd8ebc16edc27ddd8d60073edbd46b36fe', 1, '2022-07-02'),
(61, 10, 89327534, '0x478b3ff21e08373ff115e36a859f4ca7e365c04ada3557d15efd6b50a167b44e', 1, '2022-07-02'),
(62, 28, 89327534, '0x21ac869bdb43d85cd5c4980c277b408616a66b62e8a9c742069d92eb9e0bf257', 1, '2022-07-02'),
(63, 28, 89327534, '0x5cf3c64808492075cb61908e5d4a43b222d513c44c7f34f3f60337488d67c127', 1, '2022-07-02'),
(73, 54, 89327541, '0x9f1cf2607bd3422ce72e1fc8527b1f5c25ac44eeea512a9babe93e3791122894', 1, '2022-07-03'),
(76, 53, 89327540, '0xbb919c86d9588a79d8696b98c2c9c7ffca74499724ebd37162ca11a8ed868877', 1, '2022-07-03'),
(77, 55, 89327540, '0x565267860529ce3a71deac06cd031079bb4186cd08b34512d49633396df34744', 1, '2022-07-03'),
(78, 56, 89327540, '0x5acd8e6f58af7fc61ec8aaf0760b5f075f82316fdecfea44f6fb0c439320c1e9', 1, '2022-07-03'),
(79, 57, 89327540, '0x9793799aa49d04c6ce14f7a5713682c7d626035081d6f5ea263946fc6617d516', 1, '2022-07-03'),
(80, 58, 89327540, '0xbaeafe0347c234970297c12089a24ea6262a0c9a46577c14215c242b85bd7213', 1, '2022-07-03'),
(81, 59, 89327540, '0x1c4744d45c2dbb57dba92406ea1043ebd5daa0e9fd0bf1c6bf0f2730ba694345', 1, '2022-07-03'),
(82, 60, 89327540, '0x4d109f734488c94b8e877b4223874acd52733715c0e4668263da35547c857fad', 1, '2022-07-03'),
(83, 61, 89327540, '0xa93d1b9a46f34985bc556cc4eaf6860445b992d4ec71f9575a58a76bed39cf12', 1, '2022-07-03'),
(84, 62, 89327540, '0x57c936ddf56ff52a0d99b58eaf5efa6537a102066e7fc305bb71da627129a298', 1, '2022-07-03'),
(85, 63, 89327540, '0xe30f777959e8fd703f99bf90858b891af935b71eddf1793f0e20567adf945c6f', 1, '2022-07-03'),
(86, 50, 89327541, '0x877776254baf02b0548c3f03814c02ce10b2c1d0a5cc15290abd8262e375fbdb', 1, '2022-07-04'),
(87, 64, 89327541, '0x81423e96342f5d63a2039fb6da93fe3be758b788404ee8fbe06ab4a57aa1ee42', 1, '2022-07-04'),
(88, 65, 89327540, '0xed87226175ea912e503d06162f20406ee3702084fdfd195cccb3ba5e1520218d', 1, '2022-07-04'),
(89, 67, 89327540, NULL, 0, NULL),
(90, 68, 89327540, NULL, 0, NULL),
(91, 69, 89327540, '0xdc4565343336e053cc258f7ba5ef8972e9cb79088c643750731fd003ccf37b6a', 1, '2022-07-04'),
(92, 10, 89327541, NULL, 0, NULL),
(93, 71, 89327540, NULL, 0, NULL),
(94, 72, 89327540, NULL, 0, NULL),
(95, 44, 89327540, NULL, 0, NULL),
(96, 45, 89327541, NULL, 0, NULL),
(97, 73, 89327532, NULL, 0, NULL),
(98, 81, 89327540, '0xbefa6818fc43db61ff8efcc62038e50e00b52aeec61f8ece4a1d0eb9484fafa3', 1, '2022-07-05'),
(99, 83, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(100, 84, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(101, 85, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(102, 86, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(103, 87, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(104, 88, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(105, 89, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(106, 90, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(107, 91, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(108, 92, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(110, 91, 89327541, '0xcdf195e4222b0b97f5d5d3cde67f5176c6133f20225cc8b62eb347d752463efd', 1, '2022-07-05'),
(112, 90, 89327540, '0x89fc816647a413c44812720d85a8ce3fe3cd1e1a458c54f303a51b17770edd22', 1, '2022-07-05'),
(113, 92, 89327540, '0x9d7b3f0482e16b32f591c06fa145215ddc0e407dc1a18de27b1c1ed2619c22c1', 1, '2022-07-05'),
(114, 83, 89327535, '0x1dd7bc36654594d38226d81c4105a4dcbe002354f41799f5be5e2e075d4d6029', 1, '2022-07-05'),
(115, 84, 89327536, '0x52b9adff92ba0cee517cbe488ed4147bf119aef9b3c0c0414f5d61706e808929', 1, '2022-07-05'),
(116, 85, 89327533, '0x4bc35ed0569021b34701165de4d8002e9db4d33cd3ff58494a3f33fdc468be02', 1, '2022-07-05'),
(117, 86, 89327532, '0x8cf528701b65c7adb5ef9b362fb8d180cf00076fab843fa1dbdc0b4e071cd2d5', 1, '2022-07-05'),
(118, 93, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(119, 89, 89327536, '0x1f5b6e91351f0b2d6d46ac086c03e84c12ec707a420717ef6e4f0cccdf2f0d3f', 1, '2022-07-05'),
(120, 93, 89327541, '0x4d74a1fb088dfbef89365658681253d9cf95c90bf99415aa9924ef58ada65aea', 1, '2022-07-05'),
(121, 87, 89327537, '0x8eb54e9e7c1d1d0657b53b5dcc56c0c70be204521dc885a1ea4e07ba70e427f1', 1, '2022-07-05'),
(122, 94, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(123, 94, 89327541, '0x3b27032e140f523c6102f267564eabfcef4e72ab7c70587279d8c0784a1f0df2', 1, '2022-07-05'),
(124, 88, 89327532, NULL, 0, NULL),
(125, 95, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(126, 96, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(127, 96, 89327539, '0xffb9591a1332cd52222cc93f44e7b7f5036cd02e4779226e6cd7c6b8c4fadd9a', 1, '2022-07-05'),
(128, 97, 89327542, 'Plan Gratuito', 1, '2022-07-04'),
(129, 97, 89327538, 'Plan Regalo', 1, '2022-07-05'),
(130, 95, 89327539, '0xbab003e22d3b0fa1172040dda514172910d93f0dc2e92818157d42c6d670cc33', 1, '2022-07-05'),
(131, 83, 89327540, '0xb517620e9edf375273dcba9180b6316dc8957e65ecd202d4a16e6a9d24b1f0c5', 1, '2022-07-05'),
(132, 87, 89327539, '0xca84230d46ad5c8dcfaee4da2678ec6f612967dfb1b5cfb08a63628325514220', 1, '2022-07-05'),
(133, 87, 89327540, '0x6a3fe2657a7b458429409307cd5eb0601eb704475fe6a9596b7472c611c2d6ed', 1, '2022-07-05'),
(134, 87, 89327538, '0x94adec9dc931eae62c6da0fba94b4618bc0b02fa7544376ff5496aa29f37f9e4', 1, '2022-07-05'),
(135, 83, 89327539, '0x93503b706dbd49825b405449878c66bebbf1194c52a5007234401c2d2ca2c09a', 1, '2022-07-05'),
(136, 83, 89327539, '0xf1b92f25a9e7f0c81f9594718edb1b01f4a3718bd7b8d142272c96341e93610b', 1, '2022-07-05'),
(137, 84, 89327538, '0xa1b1e2d35bbb144048b763af41c401b8955582905714e3c7ac993ba554a4b920', 1, '2022-07-06'),
(138, 98, 89327542, 'Plan Gratuito', 1, '2022-06-06'),
(139, 98, 89327539, '0x3217f42b664408fe4a7b54927b8b003a3bb76961bfe9b56e4c4d238f26c1a61f', 1, '2022-07-06'),
(140, 98, 89327540, NULL, 0, NULL),
(141, 99, 89327542, 'Plan Gratuito', 1, '2022-07-05'),
(142, 100, 89327542, 'Plan Gratuito', 1, '2022-07-05'),
(143, 101, 89327542, 'Plan Gratuito', 1, '2022-07-05 06:13:26'),
(144, 101, 89327538, '0xdd0e1d73be47871e10ce5f079bf558249a1d6c1549fadf9ee6f9fa025f462470', 1, '2022-07-06 06:15:54'),
(146, 101, 89327540, '0x350aa68e931344dd7e11866af84a43487eca0f518bf304b53b6de9316d9e6ec2', 1, '2022-07-06 07:05:07'),
(147, 101, 89327540, '0xcb6f013a28837e78ad978d46a5c80bec150d9906519fbbfd99b45b4e655451a1', 1, '2022-07-06 07:10:12'),
(148, 101, 89327539, '0xa524e28c0a1386f216fb59d39ead69354bd48bec677b2fbdc2d6a6c275c58855', 1, '2022-07-06 07:22:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `for_admin` int(11) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL,
  `icone` text NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL,
  `visualizada` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `for_admin`, `id_usuario`, `icone`, `mensagem`, `data`, `visualizada`) VALUES
(1, 0, 3, '1', 'Plano ativado com sucesso!', '2022-06-16 07:43:47', 0),
(2, 0, 4, '1', 'Plano ativado com sucesso!', '2022-06-16 08:31:13', 0),
(3, 0, 5, '1', 'Plano ativado com sucesso!', '2022-06-16 08:44:27', 0),
(4, 0, 21, '1', 'Plano ativado com sucesso!', '2022-06-25 06:13:17', 0),
(5, 0, 1, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(6, 0, 2, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(7, 0, 3, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(8, 0, 4, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(9, 0, 5, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(10, 0, 6, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(11, 0, 7, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(12, 0, 8, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(13, 0, 9, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(14, 0, 10, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(15, 0, 11, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(16, 0, 12, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(17, 0, 13, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(18, 0, 14, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(19, 0, 15, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(20, 0, 16, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(21, 0, 17, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(22, 0, 18, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(23, 0, 19, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(24, 0, 20, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(25, 0, 21, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(26, 0, 22, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(27, 0, 23, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(28, 0, 24, '1', 'jhghjgj', '2022-06-25 15:28:45', 0),
(29, 0, 24, '1', 'Seu ticket <b>#3</b> foi respondido pelo suporte', '2022-06-25 15:32:06', 0),
(30, 0, 24, '1', 'Seu ticket <b>#3</b> foi respondido pelo suporte', '2022-06-25 15:32:22', 0),
(31, 0, 1, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(32, 0, 2, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(33, 0, 3, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(34, 0, 4, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(35, 0, 5, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(36, 0, 6, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(37, 0, 7, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(38, 0, 8, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(39, 0, 9, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(40, 0, 10, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(41, 0, 11, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(42, 0, 12, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(43, 0, 13, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(44, 0, 14, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(45, 0, 15, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(46, 0, 16, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(47, 0, 17, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(48, 0, 18, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(49, 0, 19, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(50, 0, 20, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(51, 0, 21, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(52, 0, 22, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(53, 0, 23, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(54, 0, 24, '1', 'adsadasd', '2022-06-25 18:05:01', 0),
(55, 0, 1, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(56, 0, 2, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(57, 0, 3, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(58, 0, 4, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(59, 0, 5, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(60, 0, 6, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(61, 0, 7, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(62, 0, 8, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(63, 0, 9, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(64, 0, 10, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(65, 0, 11, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(66, 0, 12, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(67, 0, 13, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(68, 0, 14, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(69, 0, 15, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(70, 0, 16, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(71, 0, 17, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(72, 0, 18, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(73, 0, 19, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(74, 0, 20, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(75, 0, 21, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(76, 0, 22, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(77, 0, 23, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(78, 0, 24, '1', 'asdasdasd', '2022-06-25 18:05:03', 0),
(79, 0, 1, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(80, 0, 2, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(81, 0, 3, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(82, 0, 4, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(83, 0, 5, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(84, 0, 6, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(85, 0, 7, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(86, 0, 8, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(87, 0, 9, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(88, 0, 10, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(89, 0, 11, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(90, 0, 12, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(91, 0, 13, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(92, 0, 14, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(93, 0, 15, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(94, 0, 16, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(95, 0, 17, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(96, 0, 18, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(97, 0, 19, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(98, 0, 20, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(99, 0, 21, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(100, 0, 22, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(101, 0, 23, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(102, 0, 24, '1', 'hola a todos', '2022-06-25 18:05:35', 0),
(103, 0, 1, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(104, 0, 2, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(105, 0, 3, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(106, 0, 4, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(107, 0, 5, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(108, 0, 6, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(109, 0, 7, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(110, 0, 8, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(111, 0, 9, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(112, 0, 10, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(113, 0, 11, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(114, 0, 12, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(115, 0, 13, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(116, 0, 14, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(117, 0, 15, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(118, 0, 16, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(119, 0, 17, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(120, 0, 18, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(121, 0, 19, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(122, 0, 20, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(123, 0, 21, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(124, 0, 22, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(125, 0, 23, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(126, 0, 24, '1', 'hola a todos', '2022-06-25 18:05:40', 0),
(127, 0, 1, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(128, 0, 2, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(129, 0, 3, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(130, 0, 4, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(131, 0, 5, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(132, 0, 6, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(133, 0, 7, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(134, 0, 8, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(135, 0, 9, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(136, 0, 10, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(137, 0, 11, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(138, 0, 12, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(139, 0, 13, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(140, 0, 14, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(141, 0, 15, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(142, 0, 16, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(143, 0, 17, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(144, 0, 18, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(145, 0, 19, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(146, 0, 20, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(147, 0, 21, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(148, 0, 22, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(149, 0, 23, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(150, 0, 24, '1', 'hola a todos', '2022-06-25 18:05:43', 0),
(151, 0, 1, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(152, 0, 2, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(153, 0, 3, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(154, 0, 4, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(155, 0, 5, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(156, 0, 6, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(157, 0, 7, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(158, 0, 8, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(159, 0, 9, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(160, 0, 10, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(161, 0, 11, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(162, 0, 12, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(163, 0, 13, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(164, 0, 14, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(165, 0, 15, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(166, 0, 16, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(167, 0, 17, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(168, 0, 18, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(169, 0, 19, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(170, 0, 20, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(171, 0, 21, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(172, 0, 22, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(173, 0, 23, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(174, 0, 24, '1', 'hola a tofdos', '2022-06-25 18:05:53', 0),
(175, 0, 1, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(176, 0, 2, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(177, 0, 3, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(178, 0, 4, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(179, 0, 5, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(180, 0, 6, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(181, 0, 7, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(182, 0, 8, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(183, 0, 9, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(184, 0, 10, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(185, 0, 11, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(186, 0, 12, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(187, 0, 13, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(188, 0, 14, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(189, 0, 15, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(190, 0, 16, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(191, 0, 17, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(192, 0, 18, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(193, 0, 19, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(194, 0, 20, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(195, 0, 21, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(196, 0, 22, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(197, 0, 23, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(198, 0, 24, '1', 'Los bonos se pagaran en este fin de semana', '2022-06-26 16:21:42', 0),
(199, 0, 1, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(200, 0, 2, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(201, 0, 3, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(202, 0, 4, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(203, 0, 5, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(204, 0, 6, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(205, 0, 7, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(206, 0, 8, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(207, 0, 9, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(208, 0, 10, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(209, 0, 11, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(210, 0, 12, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(211, 0, 13, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(212, 0, 14, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(213, 0, 15, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(214, 0, 16, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(215, 0, 17, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(216, 0, 18, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(217, 0, 19, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(218, 0, 20, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(219, 0, 21, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(220, 0, 22, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(221, 0, 23, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(222, 0, 24, '1', 'Bienvenidos', '2022-06-26 17:37:48', 0),
(223, 0, 25, '1', 'Plano ativado com sucesso!', '2022-06-26 17:53:46', 0),
(224, 0, 26, '1', 'Plano ativado com sucesso!', '2022-06-26 17:58:36', 0),
(225, 0, 27, '1', 'Plano ativado com sucesso!', '2022-06-26 18:07:09', 0),
(226, 0, 2, '1', 'Plano ativado com sucesso!', '2022-06-26 18:07:15', 0),
(227, 0, 28, '1', 'Plano ativado com sucesso!', '2022-06-26 19:19:06', 0),
(228, 0, 29, '1', 'Plano ativado com sucesso!', '2022-06-26 19:24:00', 0),
(229, 0, 1, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(230, 0, 2, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(231, 0, 3, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(232, 0, 4, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(233, 0, 5, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(234, 0, 6, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(235, 0, 7, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(236, 0, 8, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(237, 0, 9, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(238, 0, 10, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(239, 0, 11, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(240, 0, 12, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(241, 0, 13, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(242, 0, 14, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(243, 0, 15, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(244, 0, 16, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(245, 0, 17, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(246, 0, 18, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(247, 0, 19, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(248, 0, 20, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(249, 0, 21, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(250, 0, 22, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(251, 0, 23, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(252, 0, 24, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(253, 0, 25, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(254, 0, 26, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(255, 0, 27, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(256, 0, 28, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(257, 0, 29, '1', 'Welcome to Metabiz', '2022-06-27 01:13:52', 0),
(258, 0, 1, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(259, 0, 2, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(260, 0, 3, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(261, 0, 4, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(262, 0, 5, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(263, 0, 6, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(264, 0, 7, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(265, 0, 8, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(266, 0, 9, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(267, 0, 10, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(268, 0, 11, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(269, 0, 12, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(270, 0, 13, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(271, 0, 14, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(272, 0, 15, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(273, 0, 16, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(274, 0, 17, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(275, 0, 18, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(276, 0, 19, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(277, 0, 20, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(278, 0, 21, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(279, 0, 22, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(280, 0, 23, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(281, 0, 24, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(282, 0, 25, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(283, 0, 26, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(284, 0, 27, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(285, 0, 28, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(286, 0, 29, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(287, 0, 30, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(288, 0, 31, '1', 'Hola Mr Vinny y florenci', '2022-06-27 08:56:25', 0),
(289, 0, 1, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(290, 0, 2, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(291, 0, 3, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(292, 0, 4, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(293, 0, 5, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(294, 0, 6, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(295, 0, 7, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(296, 0, 8, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(297, 0, 9, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(298, 0, 10, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(299, 0, 11, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(300, 0, 12, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(301, 0, 13, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(302, 0, 14, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(303, 0, 15, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(304, 0, 16, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(305, 0, 17, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(306, 0, 18, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(307, 0, 19, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(308, 0, 20, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(309, 0, 21, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(310, 0, 22, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(311, 0, 23, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(312, 0, 24, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(313, 0, 25, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(314, 0, 26, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(315, 0, 27, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(316, 0, 28, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(317, 0, 29, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(318, 0, 30, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(319, 0, 31, '1', 'Hola a todos ', '2022-06-27 08:56:54', 0),
(320, 0, 31, '1', 'Seu ticket <b>#6</b> foi respondido pelo suporte', '2022-06-27 08:59:40', 0),
(321, 0, 31, '1', 'Seu ticket <b>#6</b> foi respondido pelo suporte', '2022-06-27 08:59:57', 0),
(322, 0, 1, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(323, 0, 2, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(324, 0, 3, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(325, 0, 4, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(326, 0, 5, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(327, 0, 6, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(328, 0, 7, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(329, 0, 8, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(330, 0, 9, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(331, 0, 10, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(332, 0, 11, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(333, 0, 12, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(334, 0, 13, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(335, 0, 14, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(336, 0, 15, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(337, 0, 16, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(338, 0, 17, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(339, 0, 18, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(340, 0, 19, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(341, 0, 20, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(342, 0, 21, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(343, 0, 22, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(344, 0, 23, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(345, 0, 24, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(346, 0, 25, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(347, 0, 26, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(348, 0, 27, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(349, 0, 28, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(350, 0, 29, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(351, 0, 30, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(352, 0, 31, '1', 'Welcome to Metabiz', '2022-06-28 05:38:14', 0),
(353, 0, 1, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(354, 0, 2, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(355, 0, 3, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(356, 0, 4, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(357, 0, 5, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(358, 0, 6, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(359, 0, 7, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(360, 0, 8, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(361, 0, 9, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(362, 0, 10, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(363, 0, 11, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(364, 0, 12, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(365, 0, 13, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(366, 0, 14, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(367, 0, 15, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(368, 0, 16, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(369, 0, 17, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(370, 0, 18, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(371, 0, 19, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(372, 0, 20, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(373, 0, 21, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(374, 0, 22, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(375, 0, 23, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(376, 0, 24, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(377, 0, 25, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(378, 0, 26, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(379, 0, 27, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(380, 0, 28, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(381, 0, 29, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(382, 0, 30, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(383, 0, 31, '62bace9580d90-logo.png', 'Welcome to Metabiz', '2022-06-28 06:49:15', 0),
(384, 0, 5, '1', 'Plano ativado com sucesso!', '2022-06-29 09:53:35', 0),
(385, 0, 1, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(386, 0, 2, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(387, 0, 3, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(388, 0, 4, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(389, 0, 5, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(390, 0, 6, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(391, 0, 7, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(392, 0, 8, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(393, 0, 9, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(394, 0, 10, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(395, 0, 11, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(396, 0, 12, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(397, 0, 13, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(398, 0, 14, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(399, 0, 15, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(400, 0, 16, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(401, 0, 17, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(402, 0, 18, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(403, 0, 19, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(404, 0, 20, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(405, 0, 21, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(406, 0, 22, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(407, 0, 23, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(408, 0, 24, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(409, 0, 25, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(410, 0, 26, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(411, 0, 27, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(412, 0, 28, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(413, 0, 29, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(414, 0, 30, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(415, 0, 31, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(416, 0, 32, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(417, 0, 33, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(418, 0, 34, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(419, 0, 35, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(420, 0, 36, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(421, 0, 37, '62bde53b0cfaa-signo.PNG', 'Welcome to metabiz', '2022-06-30 15:02:44', 0),
(422, 0, 1, '1', 'Your withdrawal has already been sent to your bank/finance company!', '2022-07-01 03:02:02', 0),
(423, 0, 1, '1', 'Your withdrawal has already been sent to your Metamask Wallet!', '2022-07-01 03:32:48', 0),
(424, 0, 1, '1', 'Sorry, but we had to reverse your loot.', '2022-07-01 03:43:21', 0),
(425, 0, 1, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(426, 0, 2, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(427, 0, 3, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(428, 0, 4, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(429, 0, 5, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(430, 0, 6, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(431, 0, 7, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(432, 0, 8, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(433, 0, 9, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(434, 0, 10, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(435, 0, 11, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(436, 0, 12, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(437, 0, 13, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(438, 0, 14, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(439, 0, 15, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(440, 0, 16, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(441, 0, 17, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(442, 0, 18, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(443, 0, 19, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(444, 0, 20, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(445, 0, 21, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(446, 0, 22, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(447, 0, 23, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(448, 0, 24, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(449, 0, 25, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(450, 0, 26, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(451, 0, 27, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(452, 0, 28, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(453, 0, 29, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(454, 0, 30, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(455, 0, 31, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(456, 0, 32, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(457, 0, 33, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(458, 0, 34, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(459, 0, 35, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(460, 0, 36, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(461, 0, 37, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(462, 0, 38, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(463, 0, 39, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(464, 0, 40, '', 'weñcome2', '2022-07-01 08:51:08', 0),
(465, 0, 10, '1', 'Your withdrawal has already been sent to your Metamask Wallet!', '2022-07-01 16:31:04', 0),
(466, 0, 45, '1', 'Plano ativado com sucesso!', '2022-07-01 18:58:22', 0),
(467, 0, 46, '1', 'Plano ativado com sucesso!', '2022-07-01 19:33:43', 0),
(468, 0, 47, '1', 'Plano ativado com sucesso!', '2022-07-02 05:55:51', 0),
(469, 0, 48, '1', 'Plano ativado com sucesso!', '2022-07-02 06:00:16', 0),
(470, 0, 49, '1', 'Plan activated successfully!', '2022-07-02 06:12:53', 0),
(471, 0, 10, '1', 'Your withdrawal has already been sent to your Metamask Wallet!', '2022-07-02 06:34:20', 0),
(472, 0, 25, '1', 'Plan activated successfully!', '2022-07-02 07:40:37', 0),
(473, 0, 28, '1', 'Plan activated successfully!', '2022-07-02 08:09:59', 0),
(474, 0, 28, '1', 'Plan activated successfully!', '2022-07-02 08:12:42', 0),
(475, 0, 54, '1', 'Plan activated successfully!', '2022-07-03 12:15:27', 0),
(476, 0, 53, '1', 'Plan activated successfully!', '2022-07-03 12:35:44', 0),
(477, 0, 55, '1', 'Plan activated successfully!', '2022-07-03 15:24:17', 0),
(478, 0, 56, '1', 'Plan activated successfully!', '2022-07-03 16:47:21', 0),
(479, 0, 57, '1', 'Plan activated successfully!', '2022-07-03 17:11:38', 0),
(480, 0, 58, '1', 'Plan activated successfully!', '2022-07-03 17:14:01', 0),
(481, 0, 59, '1', 'Plan activated successfully!', '2022-07-03 17:47:22', 0),
(482, 0, 60, '1', 'Plan activated successfully!', '2022-07-03 18:54:01', 0),
(483, 0, 61, '1', 'Plan activated successfully!', '2022-07-03 18:56:00', 0),
(484, 0, 62, '1', 'Plan activated successfully!', '2022-07-03 18:59:33', 0),
(485, 0, 63, '1', 'Plan activated successfully!', '2022-07-03 19:01:42', 0),
(486, 0, 69, '1', 'Plan activated successfully!', '2022-07-04 21:13:39', 0),
(487, 0, 91, '1', 'Plan activated successfully!', '2022-07-05 17:26:27', 0),
(488, 0, 93, '1', 'Plan activated successfully!', '2022-07-05 17:51:07', 0),
(489, 0, 94, '1', 'Plan activated successfully!', '2022-07-05 18:06:07', 0),
(490, 0, 1, '', 'welcome', '2022-07-06 07:04:10', 0),
(491, 0, 2, '', 'welcome', '2022-07-06 07:04:10', 0),
(492, 0, 3, '', 'welcome', '2022-07-06 07:04:10', 0),
(493, 0, 4, '', 'welcome', '2022-07-06 07:04:10', 0),
(494, 0, 5, '', 'welcome', '2022-07-06 07:04:10', 0),
(495, 0, 6, '', 'welcome', '2022-07-06 07:04:10', 0),
(496, 0, 7, '', 'welcome', '2022-07-06 07:04:10', 0),
(497, 0, 8, '', 'welcome', '2022-07-06 07:04:10', 0),
(498, 0, 9, '', 'welcome', '2022-07-06 07:04:10', 0),
(499, 0, 10, '', 'welcome', '2022-07-06 07:04:10', 0),
(500, 0, 11, '', 'welcome', '2022-07-06 07:04:10', 0),
(501, 0, 12, '', 'welcome', '2022-07-06 07:04:10', 0),
(502, 0, 13, '', 'welcome', '2022-07-06 07:04:10', 0),
(503, 0, 14, '', 'welcome', '2022-07-06 07:04:10', 0),
(504, 0, 15, '', 'welcome', '2022-07-06 07:04:10', 0),
(505, 0, 16, '', 'welcome', '2022-07-06 07:04:10', 0),
(506, 0, 17, '', 'welcome', '2022-07-06 07:04:10', 0),
(507, 0, 18, '', 'welcome', '2022-07-06 07:04:10', 0),
(508, 0, 19, '', 'welcome', '2022-07-06 07:04:10', 0),
(509, 0, 20, '', 'welcome', '2022-07-06 07:04:10', 0),
(510, 0, 21, '', 'welcome', '2022-07-06 07:04:10', 0),
(511, 0, 22, '', 'welcome', '2022-07-06 07:04:10', 0),
(512, 0, 23, '', 'welcome', '2022-07-06 07:04:10', 0),
(513, 0, 24, '', 'welcome', '2022-07-06 07:04:10', 0),
(514, 0, 25, '', 'welcome', '2022-07-06 07:04:10', 0),
(515, 0, 26, '', 'welcome', '2022-07-06 07:04:10', 0),
(516, 0, 27, '', 'welcome', '2022-07-06 07:04:10', 0),
(517, 0, 28, '', 'welcome', '2022-07-06 07:04:10', 0),
(518, 0, 29, '', 'welcome', '2022-07-06 07:04:10', 0),
(519, 0, 30, '', 'welcome', '2022-07-06 07:04:10', 0),
(520, 0, 31, '', 'welcome', '2022-07-06 07:04:10', 0),
(521, 0, 32, '', 'welcome', '2022-07-06 07:04:10', 0),
(522, 0, 33, '', 'welcome', '2022-07-06 07:04:10', 0),
(523, 0, 34, '', 'welcome', '2022-07-06 07:04:10', 0),
(524, 0, 35, '', 'welcome', '2022-07-06 07:04:10', 0),
(525, 0, 36, '', 'welcome', '2022-07-06 07:04:10', 0),
(526, 0, 37, '', 'welcome', '2022-07-06 07:04:10', 0),
(527, 0, 38, '', 'welcome', '2022-07-06 07:04:10', 0),
(528, 0, 39, '', 'welcome', '2022-07-06 07:04:10', 0),
(529, 0, 40, '', 'welcome', '2022-07-06 07:04:10', 0),
(530, 0, 41, '', 'welcome', '2022-07-06 07:04:10', 0),
(531, 0, 42, '', 'welcome', '2022-07-06 07:04:10', 0),
(532, 0, 43, '', 'welcome', '2022-07-06 07:04:10', 0),
(533, 0, 44, '', 'welcome', '2022-07-06 07:04:10', 0),
(534, 0, 45, '', 'welcome', '2022-07-06 07:04:10', 0),
(535, 0, 46, '', 'welcome', '2022-07-06 07:04:10', 0),
(536, 0, 47, '', 'welcome', '2022-07-06 07:04:10', 0),
(537, 0, 48, '', 'welcome', '2022-07-06 07:04:10', 0),
(538, 0, 49, '', 'welcome', '2022-07-06 07:04:10', 0),
(539, 0, 50, '', 'welcome', '2022-07-06 07:04:10', 0),
(540, 0, 51, '', 'welcome', '2022-07-06 07:04:10', 0),
(541, 0, 52, '', 'welcome', '2022-07-06 07:04:10', 0),
(542, 0, 53, '', 'welcome', '2022-07-06 07:04:10', 0),
(543, 0, 54, '', 'welcome', '2022-07-06 07:04:10', 0),
(544, 0, 55, '', 'welcome', '2022-07-06 07:04:10', 0),
(545, 0, 56, '', 'welcome', '2022-07-06 07:04:10', 0),
(546, 0, 57, '', 'welcome', '2022-07-06 07:04:10', 0),
(547, 0, 58, '', 'welcome', '2022-07-06 07:04:10', 0),
(548, 0, 59, '', 'welcome', '2022-07-06 07:04:10', 0),
(549, 0, 60, '', 'welcome', '2022-07-06 07:04:10', 0),
(550, 0, 61, '', 'welcome', '2022-07-06 07:04:10', 0),
(551, 0, 62, '', 'welcome', '2022-07-06 07:04:10', 0),
(552, 0, 63, '', 'welcome', '2022-07-06 07:04:10', 0),
(553, 0, 64, '', 'welcome', '2022-07-06 07:04:10', 0),
(554, 0, 65, '', 'welcome', '2022-07-06 07:04:10', 0),
(555, 0, 66, '', 'welcome', '2022-07-06 07:04:10', 0),
(556, 0, 69, '', 'welcome', '2022-07-06 07:04:10', 0),
(557, 0, 70, '', 'welcome', '2022-07-06 07:04:10', 0),
(558, 0, 71, '', 'welcome', '2022-07-06 07:04:10', 0),
(559, 0, 72, '', 'welcome', '2022-07-06 07:04:10', 0),
(560, 0, 73, '', 'welcome', '2022-07-06 07:04:10', 0),
(561, 0, 74, '', 'welcome', '2022-07-06 07:04:10', 0),
(562, 0, 75, '', 'welcome', '2022-07-06 07:04:10', 0),
(563, 0, 76, '', 'welcome', '2022-07-06 07:04:10', 0),
(564, 0, 77, '', 'welcome', '2022-07-06 07:04:10', 0),
(565, 0, 78, '', 'welcome', '2022-07-06 07:04:10', 0),
(566, 0, 79, '', 'welcome', '2022-07-06 07:04:10', 0),
(567, 0, 80, '', 'welcome', '2022-07-06 07:04:10', 0),
(568, 0, 81, '', 'welcome', '2022-07-06 07:04:10', 0),
(569, 0, 82, '', 'welcome', '2022-07-06 07:04:10', 0),
(570, 0, 83, '', 'welcome', '2022-07-06 07:04:10', 0),
(571, 0, 84, '', 'welcome', '2022-07-06 07:04:10', 0),
(572, 0, 85, '', 'welcome', '2022-07-06 07:04:10', 0),
(573, 0, 86, '', 'welcome', '2022-07-06 07:04:10', 0),
(574, 0, 87, '', 'welcome', '2022-07-06 07:04:10', 0),
(575, 0, 88, '', 'welcome', '2022-07-06 07:04:10', 0),
(576, 0, 89, '', 'welcome', '2022-07-06 07:04:10', 0),
(577, 0, 90, '', 'welcome', '2022-07-06 07:04:10', 0),
(578, 0, 91, '', 'welcome', '2022-07-06 07:04:10', 0),
(579, 0, 92, '', 'welcome', '2022-07-06 07:04:10', 0),
(580, 0, 93, '', 'welcome', '2022-07-06 07:04:10', 0),
(581, 0, 94, '', 'welcome', '2022-07-06 07:04:10', 0),
(582, 0, 95, '', 'welcome', '2022-07-06 07:04:10', 0),
(583, 0, 96, '', 'welcome', '2022-07-06 07:04:10', 0),
(584, 0, 97, '', 'welcome', '2022-07-06 07:04:10', 0),
(585, 0, 98, '', 'welcome', '2022-07-06 07:04:10', 0),
(586, 0, 99, '', 'welcome', '2022-07-06 07:04:10', 0),
(587, 0, 100, '', 'welcome', '2022-07-06 07:04:10', 0),
(588, 0, 101, '', 'welcome', '2022-07-06 07:04:10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `codigo_opciones` int(11) DEFAULT NULL,
  `opcion` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `rama` int(11) DEFAULT 0,
  `estado` varchar(2) DEFAULT 'AC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `id_modulo`, `codigo_opciones`, `opcion`, `link`, `icono`, `nivel`, `orden`, `rama`, `estado`) VALUES
(1, 1, 0, 'Dashboad', 'admin/dashboard', '', 0, 1, 0, 'AC'),
(2, 1, 0, 'Usuarios', 'admin/usuarios', '', 0, 2, 0, 'AC'),
(3, 1, 0, 'Niveles de Indicación', 'admin/niveis', '', 0, 3, 0, 'AC'),
(4, 1, 0, 'Tickets', 'admin/tickets', '', 0, 4, 0, 'AC'),
(5, 1, 0, 'Notificaciones', 'admin/notificacoes', '', 0, 5, 0, 'AC'),
(6, 1, 6, 'Planes', '', '', 1, 1, 0, 'AC'),
(7, 1, 6, 'Planes', 'admin/planos', '', 2, 1, 0, 'AC'),
(8, 1, 6, 'Planes de Carrera', 'admin/carreira', '', 2, 2, 0, 'AC'),
(9, 1, 9, 'Configuraciones', '', '', 1, 2, 0, 'AC'),
(10, 1, 9, 'Configuraciones del sitio', 'admin/configuracoes/site', '', 2, 1, 0, 'AC'),
(11, 1, 9, 'Configuraciones de email', 'admin/configuracoes/email', '', 2, 2, 0, 'AC'),
(12, 5, 9, 'Configuraciones Financieras', 'admin/configuracoes/financeira', '', 2, 3, 0, 'AC'),
(13, 1, 13, 'Financiero', '', '', 1, 3, 0, 'AC'),
(14, 1, 13, 'Facturas', '', '', 2, 1, 1, 'AC'),
(15, 1, 15, 'Para liberar', 'admin/faturas/liberar', '', 3, 1, 1, 'AC'),
(16, 1, 16, 'Liberadas', 'admin/faturas/liberadas', '', 3, 2, 1, 'AC'),
(17, 1, 17, 'Pagos pendientes', 'admin/faturas/pendentes', '', 3, 3, 1, 'AC'),
(18, 1, 13, 'Retiros', 'admin/saques', '', 2, 2, 0, 'AC'),
(19, 1, 13, 'Cuentas para Depósito', 'admin/deposito', '', 2, 3, 0, 'AC'),
(20, 1, 0, 'Permisos Usuarios', 'admin/permisos', '', 0, 6, 0, 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `binario` int(11) DEFAULT NULL,
  `plano_carreira` int(11) DEFAULT NULL,
  `rede_afiliados` int(11) DEFAULT NULL,
  `teto_binario` decimal(10,2) DEFAULT NULL,
  `ganhos_diarios` decimal(10,2) DEFAULT NULL,
  `ganhos_maximo` decimal(10,2) DEFAULT NULL,
  `recomendado` int(11) NOT NULL DEFAULT 0,
  `img_plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planos`
--

INSERT INTO `planos` (`id`, `nome`, `valor`, `binario`, `plano_carreira`, `rede_afiliados`, `teto_binario`, `ganhos_diarios`, `ganhos_maximo`, `recomendado`, `img_plan`) VALUES
(89327532, 'Star', '100.00', 7, 10, 1, '200.00', '1.10', '275.00', 0, '62beefb1c7b20-star2.gif'),
(89327533, 'Moon', '300.00', 7, 300, 1, '600.00', '1.20', '825.00', 0, '62beeae750a0d-moon2.gif'),
(89327534, 'Mars', '600.00', 7, 60, 1, '1200.00', '1.30', '1650.00', 1, '62beeb4e0d02f-mars2.gif'),
(89327535, 'Jupiter', '1000.00', 7, 100, 1, '2000.00', '1.40', '2750.00', 0, '62beee2a71b09-jupiter2.gif'),
(89327536, 'Saturns', '3000.00', 7, 300, 1, '6000.00', '1.50', '8250.00', 0, '62beebe3a7155-saturn2.gif'),
(89327537, 'Sun', '6000.00', 7, 600, 1, '12000.00', '1.40', '16500.00', 0, '62b72ef7f3e8b-sun.PNG'),
(89327538, 'Galaxy', '1.00', 7, 1000, 1, '20000.00', '1.50', '27500.00', 0, '62b905909ea42-121212.gif'),
(89327539, 'Space', '2.00', 7, 2000, 1, '40000.00', '1.60', '55000.00', 1, '62beecb1e97db-space2.gif'),
(89327540, 'Kite', '10.00', 7, 50, 1, '100.00', '1.30', '2.75', 0, '62b95ca0afd92-mars.PNG'),
(89327541, 'Meteorit', '50.00', 7, 50, 1, '100.00', '1.60', '137.50', 0, '62c01fb56a3d3-white2.gif'),
(89327542, 'Initial', '0.00', 0, 0, 1, '0.00', '0.00', NULL, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plano_carreira`
--

CREATE TABLE `plano_carreira` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pontos` int(11) NOT NULL,
  `premio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plano_carreira`
--

INSERT INTO `plano_carreira` (`id`, `nome`, `pontos`, `premio`) VALUES
(1, 'Users', 2, 'Welcome'),
(2, 'Internal Agent', 5000, '2'),
(3, 'Novice Consutant', 50000, '3 + BONUS'),
(4, 'Supervisor', 250000, '4 + BONUS'),
(5, 'Main Supervisor ', 500000, '5 + BONUS'),
(6, 'Senior Excutive', 1000000, '6 + BONUS'),
(7, 'Master Executive', 3000000, '7 + BONUS'),
(8, 'President', 6000000, '8 + BONUS'),
(9, 'Master Presidente ', 10000000, '9 + BONUS'),
(10, 'Elite Presidente ', 25000000, '10 + BONUS'),
(11, 'Apprentice', 1000, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qr_sistema`
--

CREATE TABLE `qr_sistema` (
  `cod_qr` int(11) NOT NULL,
  `text_qr` text NOT NULL,
  `img_qr` text NOT NULL,
  `estado_qr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rede`
--

CREATE TABLE `rede` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  `id_patrocinador_direto` int(11) NOT NULL,
  `chave_binaria` int(11) NOT NULL,
  `plano_ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rede`
--

INSERT INTO `rede` (`id`, `id_usuario`, `id_patrocinador`, `id_patrocinador_direto`, `chave_binaria`, `plano_ativo`) VALUES
(1, 2, 26, 1, 1, 1),
(2, 3, 2, 2, 1, 1),
(3, 4, 3, 2, 1, 1),
(4, 5, 4, 2, 1, 1),
(5, 6, 1, 1, 1, 0),
(6, 7, 1, 1, 1, 0),
(7, 8, 6, 6, 1, 0),
(8, 9, 9, 9, 1, 0),
(9, 10, 9, 9, 1, 1),
(10, 11, 10, 10, 1, 1),
(11, 12, 10, 10, 1, 1),
(12, 13, 11, 10, 1, 1),
(13, 14, 11, 10, 2, 1),
(14, 15, 11, 10, 2, 1),
(15, 16, 13, 10, 2, 1),
(16, 17, 13, 10, 1, 1),
(17, 18, 13, 10, 1, 1),
(18, 19, 16, 10, 1, 1),
(19, 20, 19, 11, 1, 0),
(20, 21, 2, 2, 2, 1),
(21, 22, 17, 9, 1, 0),
(22, 23, 17, 9, 1, 0),
(23, 24, 17, 9, 1, 0),
(24, 25, 1, 1, 2, 1),
(25, 26, 1, 1, 1, 1),
(26, 27, 25, 1, 2, 1),
(27, 28, 25, 25, 1, 1),
(28, 29, 27, 25, 2, 1),
(29, 30, 17, 9, 1, 0),
(30, 31, 17, 9, 1, 0),
(31, 32, 21, 2, 2, 0),
(32, 33, 10, 10, 2, 0),
(33, 34, 29, 1, 2, 0),
(34, 35, 10, 10, 2, 0),
(35, 36, 29, 1, 2, 0),
(36, 37, 10, 10, 2, 0),
(37, 38, 10, 10, 2, 1),
(38, 39, 17, 10, 1, 1),
(39, 40, 5, 1, 1, 0),
(40, 41, 5, 1, 1, 0),
(41, 42, 22, 22, 1, 1),
(42, 43, 42, 22, 1, 1),
(43, 44, 22, 22, 2, 1),
(44, 45, 3, 3, 2, 1),
(45, 46, 45, 45, 1, 1),
(46, 47, 46, 45, 1, 1),
(47, 48, 45, 45, 2, 1),
(48, 49, 48, 45, 2, 1),
(49, 50, 38, 10, 2, 1),
(50, 51, 44, 22, 2, 0),
(51, 52, 51, 51, 1, 0),
(52, 53, 5, 1, 1, 1),
(53, 54, 53, 53, 1, 1),
(54, 55, 53, 53, 2, 1),
(55, 56, 55, 53, 2, 1),
(56, 57, 55, 55, 1, 1),
(57, 58, 57, 55, 1, 1),
(58, 59, 56, 55, 2, 1),
(59, 60, 56, 56, 1, 1),
(60, 61, 59, 56, 2, 1),
(61, 62, 61, 56, 2, 1),
(62, 63, 60, 56, 1, 1),
(63, 64, 50, 10, 2, 1),
(64, 65, 64, 64, 1, 1),
(65, 66, 49, 45, 2, 0),
(66, 67, 49, 45, 2, 0),
(67, 68, 49, 45, 2, 0),
(68, 69, 49, 45, 2, 1),
(69, 70, 69, 45, 2, 0),
(70, 71, 54, 1, 1, 0),
(71, 72, 44, 44, 1, 0),
(72, 73, 69, 45, 2, 0),
(73, 75, 74, 74, 1, 0),
(74, 76, 74, 74, 1, 0),
(75, 77, 74, 74, 1, 0),
(76, 78, 44, 44, 1, 0),
(77, 79, 72, 72, 1, 0),
(78, 80, 72, 72, 2, 0),
(79, 81, 64, 10, 2, 1),
(80, 82, 30, 30, 1, 0),
(81, 83, 81, 10, 2, 1),
(82, 84, 83, 83, 1, 1),
(83, 85, 83, 83, 2, 1),
(84, 86, 85, 83, 2, 1),
(85, 87, 84, 84, 2, 1),
(86, 88, 84, 84, 1, 1),
(87, 89, 88, 83, 1, 1),
(88, 90, 86, 83, 2, 1),
(89, 91, 69, 69, 1, 1),
(90, 92, 90, 90, 2, 1),
(91, 93, 91, 91, 1, 1),
(92, 94, 91, 91, 2, 1),
(93, 95, 92, 83, 2, 1),
(94, 96, 95, 83, 2, 1),
(95, 97, 96, 96, 1, 1),
(96, 98, 97, 97, 1, 1),
(97, 99, 98, 98, 1, 1),
(98, 100, 99, 98, 1, 1),
(99, 101, 100, 98, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rede_pontos_binario`
--

CREATE TABLE `rede_pontos_binario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pontos` int(11) NOT NULL,
  `chave_binaria` int(11) NOT NULL,
  `pago` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rede_pontos_binario`
--

INSERT INTO `rede_pontos_binario` (`id`, `id_usuario`, `pontos`, `chave_binaria`, `pago`, `data`) VALUES
(1, 2, 45, 1, 1, '2022-06-16'),
(2, 1, 45, 2, 1, '2022-06-16'),
(3, 3, 45, 1, 0, '2022-06-16'),
(4, 2, 45, 1, 0, '2022-06-16'),
(5, 1, 45, 1, 0, '2022-06-16'),
(6, 4, 8, 1, 0, '2022-06-16'),
(7, 3, 8, 1, 0, '2022-06-16'),
(8, 2, 8, 1, 0, '2022-06-16'),
(9, 1, 8, 1, 0, '2022-06-16'),
(10, 10, 8, 1, 1, '2022-06-21'),
(11, 10, 45, 2, 1, '2022-06-21'),
(12, 2, 0, 2, 1, '2022-06-25'),
(13, 1, 0, 1, 0, '2022-06-25'),
(14, 1, 300, 1, 0, '2022-06-26'),
(15, 1, 2000, 1, 0, '2022-06-26'),
(16, 25, 10, 2, 1, '2022-06-26'),
(17, 1, 10, 1, 0, '2022-06-26'),
(18, 26, 10, 1, 0, '2022-06-26'),
(19, 1, 10, 1, 1, '2022-06-26'),
(20, 25, 10, 1, 1, '2022-06-26'),
(21, 1, 10, 1, 0, '2022-06-26'),
(22, 27, 10, 2, 0, '2022-06-26'),
(23, 25, 10, 2, 1, '2022-06-26'),
(24, 1, 10, 1, 0, '2022-06-26'),
(25, 4, 10, 1, 0, '2022-06-29'),
(26, 3, 10, 1, 0, '2022-06-29'),
(27, 2, 10, 1, 0, '2022-06-29'),
(28, 26, 10, 1, 0, '2022-06-29'),
(29, 1, 10, 1, 0, '2022-06-29'),
(30, 3, 10, 2, 0, '2022-07-01'),
(31, 2, 10, 1, 0, '2022-07-01'),
(32, 26, 10, 1, 0, '2022-07-01'),
(33, 1, 10, 1, 0, '2022-07-01'),
(34, 45, 10, 1, 1, '2022-07-01'),
(35, 3, 10, 2, 0, '2022-07-01'),
(36, 2, 10, 1, 0, '2022-07-01'),
(37, 26, 10, 1, 0, '2022-07-01'),
(38, 1, 10, 1, 0, '2022-07-01'),
(39, 46, 10, 1, 0, '2022-07-02'),
(40, 45, 10, 1, 1, '2022-07-02'),
(41, 3, 10, 2, 0, '2022-07-02'),
(42, 2, 10, 1, 0, '2022-07-02'),
(43, 26, 10, 1, 0, '2022-07-02'),
(44, 1, 10, 1, 0, '2022-07-02'),
(45, 45, 10, 2, 1, '2022-07-02'),
(46, 3, 10, 2, 0, '2022-07-02'),
(47, 2, 10, 1, 0, '2022-07-02'),
(48, 26, 10, 1, 0, '2022-07-02'),
(49, 1, 10, 1, 0, '2022-07-02'),
(50, 48, 10, 2, 0, '2022-07-02'),
(51, 45, 10, 2, 1, '2022-07-02'),
(52, 3, 10, 2, 0, '2022-07-02'),
(53, 2, 10, 1, 0, '2022-07-02'),
(54, 26, 10, 1, 0, '2022-07-02'),
(55, 1, 10, 1, 0, '2022-07-02'),
(56, 1, 50, 1, 0, '2022-07-02'),
(57, 25, 60, 1, 1, '2022-07-02'),
(58, 1, 60, 1, 0, '2022-07-02'),
(59, 25, 60, 1, 1, '2022-07-02'),
(60, 1, 60, 1, 0, '2022-07-02'),
(61, 53, 50, 1, 1, '2022-07-03'),
(62, 5, 50, 1, 0, '2022-07-03'),
(63, 4, 50, 1, 0, '2022-07-03'),
(64, 3, 50, 1, 0, '2022-07-03'),
(65, 2, 50, 1, 0, '2022-07-03'),
(66, 26, 50, 1, 0, '2022-07-03'),
(67, 1, 50, 1, 0, '2022-07-03'),
(68, 5, 50, 1, 0, '2022-07-03'),
(69, 4, 50, 1, 0, '2022-07-03'),
(70, 3, 50, 1, 0, '2022-07-03'),
(71, 2, 50, 1, 0, '2022-07-03'),
(72, 26, 50, 1, 0, '2022-07-03'),
(73, 1, 50, 1, 0, '2022-07-03'),
(74, 53, 50, 2, 1, '2022-07-03'),
(75, 5, 50, 1, 0, '2022-07-03'),
(76, 4, 50, 1, 0, '2022-07-03'),
(77, 3, 50, 1, 0, '2022-07-03'),
(78, 2, 50, 1, 0, '2022-07-03'),
(79, 26, 50, 1, 0, '2022-07-03'),
(80, 1, 50, 1, 0, '2022-07-03'),
(81, 55, 50, 2, 1, '2022-07-03'),
(82, 53, 50, 2, 1, '2022-07-03'),
(83, 5, 50, 1, 0, '2022-07-03'),
(84, 4, 50, 1, 0, '2022-07-03'),
(85, 3, 50, 1, 0, '2022-07-03'),
(86, 2, 50, 1, 0, '2022-07-03'),
(87, 26, 50, 1, 0, '2022-07-03'),
(88, 1, 50, 1, 0, '2022-07-03'),
(89, 55, 50, 1, 1, '2022-07-03'),
(90, 53, 50, 2, 1, '2022-07-03'),
(91, 5, 50, 1, 0, '2022-07-03'),
(92, 4, 50, 1, 0, '2022-07-03'),
(93, 3, 50, 1, 0, '2022-07-03'),
(94, 2, 50, 1, 0, '2022-07-03'),
(95, 26, 50, 1, 0, '2022-07-03'),
(96, 1, 50, 1, 0, '2022-07-03'),
(97, 57, 50, 1, 0, '2022-07-03'),
(98, 55, 50, 1, 1, '2022-07-03'),
(99, 53, 50, 2, 1, '2022-07-03'),
(100, 5, 50, 1, 0, '2022-07-03'),
(101, 4, 50, 1, 0, '2022-07-03'),
(102, 3, 50, 1, 0, '2022-07-03'),
(103, 2, 50, 1, 0, '2022-07-03'),
(104, 26, 50, 1, 0, '2022-07-03'),
(105, 1, 50, 1, 0, '2022-07-03'),
(106, 56, 50, 2, 1, '2022-07-03'),
(107, 55, 50, 2, 1, '2022-07-03'),
(108, 53, 50, 2, 0, '2022-07-03'),
(109, 5, 50, 1, 0, '2022-07-03'),
(110, 4, 50, 1, 0, '2022-07-03'),
(111, 3, 50, 1, 0, '2022-07-03'),
(112, 2, 50, 1, 0, '2022-07-03'),
(113, 26, 50, 1, 0, '2022-07-03'),
(114, 1, 50, 1, 0, '2022-07-03'),
(115, 56, 50, 1, 1, '2022-07-03'),
(116, 55, 50, 2, 0, '2022-07-03'),
(117, 53, 50, 2, 0, '2022-07-03'),
(118, 5, 50, 1, 0, '2022-07-03'),
(119, 4, 50, 1, 0, '2022-07-03'),
(120, 3, 50, 1, 0, '2022-07-03'),
(121, 2, 50, 1, 0, '2022-07-03'),
(122, 26, 50, 1, 0, '2022-07-03'),
(123, 1, 50, 1, 0, '2022-07-03'),
(124, 59, 50, 2, 0, '2022-07-03'),
(125, 56, 50, 2, 1, '2022-07-03'),
(126, 55, 50, 2, 0, '2022-07-03'),
(127, 53, 50, 2, 0, '2022-07-03'),
(128, 5, 50, 1, 0, '2022-07-03'),
(129, 4, 50, 1, 0, '2022-07-03'),
(130, 3, 50, 1, 0, '2022-07-03'),
(131, 2, 50, 1, 0, '2022-07-03'),
(132, 26, 50, 1, 0, '2022-07-03'),
(133, 1, 50, 1, 0, '2022-07-03'),
(134, 61, 50, 2, 0, '2022-07-03'),
(135, 59, 50, 2, 0, '2022-07-03'),
(136, 56, 50, 2, 1, '2022-07-03'),
(137, 55, 50, 2, 0, '2022-07-03'),
(138, 53, 50, 2, 0, '2022-07-03'),
(139, 5, 50, 1, 0, '2022-07-03'),
(140, 4, 50, 1, 0, '2022-07-03'),
(141, 3, 50, 1, 0, '2022-07-03'),
(142, 2, 50, 1, 0, '2022-07-03'),
(143, 26, 50, 1, 0, '2022-07-03'),
(144, 1, 50, 1, 0, '2022-07-03'),
(145, 60, 50, 1, 0, '2022-07-03'),
(146, 56, 50, 1, 1, '2022-07-03'),
(147, 55, 50, 2, 0, '2022-07-03'),
(148, 53, 50, 2, 0, '2022-07-03'),
(149, 5, 50, 1, 0, '2022-07-03'),
(150, 4, 50, 1, 0, '2022-07-03'),
(151, 3, 50, 1, 0, '2022-07-03'),
(152, 2, 50, 1, 0, '2022-07-03'),
(153, 26, 50, 1, 0, '2022-07-03'),
(154, 1, 50, 1, 0, '2022-07-03'),
(155, 49, 50, 2, 0, '2022-07-04'),
(156, 48, 50, 2, 0, '2022-07-04'),
(157, 45, 50, 2, 0, '2022-07-04'),
(158, 3, 50, 2, 0, '2022-07-04'),
(159, 2, 50, 1, 0, '2022-07-04'),
(160, 26, 50, 1, 0, '2022-07-04'),
(161, 1, 50, 1, 0, '2022-07-04'),
(162, 69, 50, 1, 0, '2022-07-05'),
(163, 49, 50, 2, 0, '2022-07-05'),
(164, 48, 50, 2, 0, '2022-07-05'),
(165, 45, 50, 2, 0, '2022-07-05'),
(166, 3, 50, 2, 0, '2022-07-05'),
(167, 2, 50, 1, 0, '2022-07-05'),
(168, 26, 50, 1, 0, '2022-07-05'),
(169, 1, 50, 1, 0, '2022-07-05'),
(170, 91, 50, 1, 0, '2022-07-05'),
(171, 69, 50, 1, 0, '2022-07-05'),
(172, 49, 50, 2, 0, '2022-07-05'),
(173, 48, 50, 2, 0, '2022-07-05'),
(174, 45, 50, 2, 0, '2022-07-05'),
(175, 3, 50, 2, 0, '2022-07-05'),
(176, 2, 50, 1, 0, '2022-07-05'),
(177, 26, 50, 1, 0, '2022-07-05'),
(178, 1, 50, 1, 0, '2022-07-05'),
(179, 91, 50, 2, 1, '2022-07-05'),
(180, 69, 50, 1, 0, '2022-07-05'),
(181, 49, 50, 2, 0, '2022-07-05'),
(182, 48, 50, 2, 0, '2022-07-05'),
(183, 45, 50, 2, 0, '2022-07-05'),
(184, 3, 50, 2, 0, '2022-07-05'),
(185, 2, 50, 1, 0, '2022-07-05'),
(186, 26, 50, 1, 0, '2022-07-05'),
(187, 1, 50, 1, 0, '2022-07-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saques`
--

CREATE TABLE `saques` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `tipo_saque` int(11) NOT NULL,
  `local_recebimento` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `valor_solicitado` decimal(10,2) NOT NULL,
  `time_pay` text NOT NULL,
  `status` int(11) NOT NULL,
  `data_pedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `saques`
--

INSERT INTO `saques` (`id`, `id_usuario`, `id_conta`, `tipo_saque`, `local_recebimento`, `valor`, `valor_solicitado`, `time_pay`, `status`, `data_pedido`) VALUES
(4, 1, 1, 1, 2, '900.00', '1000.00', '', 0, '2022-06-24 10:04:05'),
(5, 1, 1, 1, 2, '450.00', '500.00', '', 0, '2022-06-26 20:24:25'),
(6, 2, 0, 1, 2, '225.00', '250.00', '', 0, '2022-06-26 22:09:24'),
(7, 1, 0, 1, 2, '225.00', '250.00', '', 0, '2022-06-26 22:17:48'),
(8, 3, 0, 1, 2, '180.00', '200.00', '', 0, '2022-06-27 12:48:28'),
(9, 1, 0, 1, 2, '90.00', '100.00', '', 0, '2022-06-27 19:36:51'),
(10, 1, 0, 2, 2, '225.00', '250.00', '', 0, '2022-06-28 04:03:52'),
(11, 1, 0, 2, 2, '225.00', '250.00', '', 0, '2022-06-28 05:30:19'),
(12, 1, 0, 1, 2, '225.00', '250.00', '', 0, '2022-06-29 07:51:12'),
(13, 1, 0, 2, 2, '225.00', '250.00', '', 0, '2022-06-29 08:10:23'),
(14, 1, 0, 2, 2, '225.00', '250.00', '', 0, '2022-06-29 08:12:24'),
(15, 1, 0, 2, 2, '225.00', '250.00', '', 0, '2022-06-29 08:13:06'),
(16, 10, 0, 2, 2, '225.00', '250.00', '', 0, '2022-06-30 20:59:54'),
(17, 10, 0, 1, 2, '225.00', '250.00', '24 hours', 0, '2022-06-30 21:03:55'),
(18, 10, 0, 1, 2, '225.00', '250.00', '24 hours', 0, '2022-06-30 21:08:57'),
(19, 10, 0, 1, 2, '232.50', '250.00', '7 days', 0, '2022-06-30 21:14:41'),
(20, 10, 0, 2, 2, '225.00', '250.00', '24 hours', 0, '1969-12-31 21:00:00'),
(21, 10, 0, 1, 2, '242.50', '250.00', '30 days', 1, '2022-07-03 22:22:54'),
(22, 10, 0, 1, 2, '270.00', '300.00', '24 hours', 0, '2022-07-01 22:25:37'),
(23, 1, 0, 1, 2, '237.50', '250.00', '15 days', 1, '2022-07-16 03:01:09'),
(24, 1, 0, 2, 2, '285.00', '300.00', '15 days', 1, '2022-07-16 03:32:14'),
(25, 1, 0, 1, 2, '465.00', '500.00', '7 days', 0, '2022-07-08 03:41:17'),
(26, 1, 0, 2, 2, '98.00', '100.00', '30 days', 2, '2022-07-31 03:41:59'),
(27, 1, 0, 2, 2, '225.00', '250.00', '24 hours', 0, '2022-07-02 16:24:06'),
(28, 10, 0, 1, 2, '98.00', '100.00', '30 days (fee 2%)', 1, '2022-07-31 16:31:44'),
(29, 10, 0, 2, 2, '351.50', '370.00', '15 days (fee 5%)', 0, '2022-07-17 06:33:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `assunto` varchar(150) NOT NULL,
  `ultima_atualizacao` datetime NOT NULL,
  `data_criado` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `id_usuario`, `assunto`, `ultima_atualizacao`, `data_criado`, `status`) VALUES
(2, 2, 'Dúvidas', '2022-06-25 07:11:51', '2022-06-25 07:11:51', 1),
(3, 24, 'Cadastro', '2022-06-25 15:32:28', '2022-06-25 15:31:56', 1),
(4, 1, 'Financeiro', '2022-06-26 15:37:10', '2022-06-26 15:37:10', 3),
(5, 10, 'Cadastro', '2022-06-26 22:45:06', '2022-06-26 22:45:06', 1),
(6, 31, 'Financeiro', '2022-06-27 09:00:00', '2022-06-27 08:59:27', 1),
(7, 3, 'Financeiro', '2022-06-27 12:35:07', '2022-06-27 12:35:07', 1),
(8, 1, 'Cadastro', '2022-06-27 19:38:02', '2022-06-27 19:38:02', 1),
(9, 1, 'Cadastro', '2022-06-28 03:36:50', '2022-06-28 03:36:50', 1),
(10, 1, 'Finances', '2022-06-29 08:26:20', '2022-06-29 08:26:20', 3),
(11, 1, 'Technical support', '2022-06-29 08:27:14', '2022-06-29 08:27:14', 1),
(12, 71, 'Finances', '2022-07-05 08:23:46', '2022-07-05 08:23:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_mensagem`
--

CREATE TABLE `tickets_mensagem` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `respondido_por` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets_mensagem`
--

INSERT INTO `tickets_mensagem` (`id`, `id_ticket`, `respondido_por`, `mensagem`, `data`) VALUES
(5, 2, 1, 'asdasdasdasdas', '2022-06-25 07:11:51'),
(6, 3, 1, 'ativei que nao aparece porra', '2022-06-25 15:31:56'),
(7, 3, 2, 'ihfksahdkashfd', '2022-06-25 15:32:06'),
(8, 3, 1, 'gracias', '2022-06-25 15:32:19'),
(9, 3, 2, 'de nadada', '2022-06-25 15:32:22'),
(10, 3, 1, 'gracias', '2022-06-25 15:32:28'),
(11, 4, 1, 'Prueba de Ticket', '2022-06-26 15:37:10'),
(12, 5, 1, 'Saludos', '2022-06-26 22:45:06'),
(13, 6, 1, 'hpola', '2022-06-27 08:59:27'),
(14, 6, 2, 'Que más a todos Mr vibny', '2022-06-27 08:59:40'),
(15, 6, 1, 'tfryryryrt', '2022-06-27 08:59:54'),
(16, 6, 2, 'Siii ', '2022-06-27 08:59:57'),
(17, 6, 1, 'tfryryryrt', '2022-06-27 09:00:00'),
(18, 7, 1, 'asdasdasdsa', '2022-06-27 12:35:07'),
(19, 8, 1, '46546546546', '2022-06-27 19:38:02'),
(20, 9, 1, 'adsaasdas', '2022-06-28 03:36:50'),
(21, 10, 1, 'teste traduction', '2022-06-29 08:26:20'),
(22, 11, 1, 'tech support message', '2022-06-29 08:27:14'),
(23, 12, 1, 'Hiii', '2022-07-05 08:23:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `celular` varchar(25) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `saldo_rendimentos` decimal(10,2) NOT NULL,
  `saldo_indicacoes` decimal(10,2) NOT NULL,
  `ganancias` decimal(10,0) NOT NULL,
  `plano_carreira` int(11) DEFAULT 1,
  `binario` int(11) NOT NULL DEFAULT 0,
  `quantidade_binario` int(11) NOT NULL,
  `chave_binaria` int(11) NOT NULL DEFAULT 1,
  `block` int(11) NOT NULL DEFAULT 0,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `is_admin`, `nome`, `email`, `cpf`, `celular`, `login`, `senha`, `saldo_rendimentos`, `saldo_indicacoes`, `ganancias`, `plano_carreira`, `binario`, `quantidade_binario`, `chave_binaria`, `block`, `data_cadastro`) VALUES
(1, 1, 'Demo', 'alissonacioli@hotmail.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '(11) 94777-2188', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '860.00', '1631.12', '0', 1, 0, 25, 1, 0, '2017-11-12 13:53:00'),
(2, 2, 'betoml', 'betoml@email.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '(59) 16587-3232', 'betoml', '25d55ad283aa400af464c76d713c07ad', '2495.00', '58.00', '0', 1, 1, 15, 2, 0, '2022-06-16 06:15:15'),
(3, 0, 'jose', 'jose@asda.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '6545454645', 'beto', '25d55ad283aa400af464c76d713c07ad', '10.00', '60.00', '0', 1, 0, 15, 2, 0, '2022-06-16 07:39:49'),
(4, 0, 'beto', 'player4@poker.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '59165873232', 'betomendez', 'e10adc3949ba59abbe56e057f20f883e', '420.00', '0.00', '0', 1, 0, 15, 1, 0, '2022-06-16 08:23:23'),
(5, 0, 'game', 'jose_3505@hotmail.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '6666666666', 'game', 'e10adc3949ba59abbe56e057f20f883e', '140.00', '0.00', '0', 1, 0, 10, 1, 0, '2022-06-16 08:43:45'),
(6, 0, 'goku', 'goku@email.com', '0x9bf0d690d4699cf16f24f34b35354a2f3988fd97', '6666666666', 'goku', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-18 18:13:20'),
(7, 0, 'Vegueta', 'vegueta@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '65656565', 'vegueta', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-18 18:20:59'),
(8, 0, 'Krillin', 'krillin@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '12364444', 'krillin', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-18 18:23:22'),
(9, 0, 'test1', 'miultimosegundo@gmail.com', '0x286586f5ebdf198090309e1d446e5f77181d9b14', '123456789', 'test1', 'bc2102ad55675da87bd5e6097396d619', '0.00', '1218.66', '0', 1, 0, 0, 1, 0, '2022-06-19 07:53:40'),
(10, 0, 'edward2', 'edward.avalos111.severiche@gmail.com', '0xda1796e92015287e93235a17094ab63842659b351', '61781119', 'kirusiya2', 'd90d90a520000ec80857e82af7fedeff', '4941.50', '2191.74', '0', 1, 0, 0, 2, 0, '2022-06-20 18:32:11'),
(11, 0, 'Smith', 'edward.smith.freeloo111.1985@gmail.com', '0xda1256e92015287e93235a17094ab63842659b35', '91781119', 'smith', 'd90d90a520000ec80857e82af7fedeff', '210.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:18:18'),
(12, 0, 'webmaster', 'kirusiya.webmaster@gmail.com', '0xda1796e369815287e93235a17094ab63842659b35', '13214579', 'webmaster', 'd90d90a520000ec80857e82af7fedeff', '210.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:19:36'),
(13, 0, 'Alejandro', 'ale.programador.fullstack@gmail.com', '0xda179687987287e93235a17094ab63842659b35', '65465465', 'alejandro', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:22:01'),
(14, 0, 'alexandra', 'alexandracriollo369@gmail.com', '0xda1796e93335287e93235a17094ab63842659b35', '6571879879', 'alexandra', 'd90d90a520000ec80857e82af7fedeff', '3000.05', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:24:38'),
(15, 0, 'alfonso', 'alfonsovelarde58@gmail.com', '0xda1796e92015287e93235a1709412353842659b35', '8798798798', 'alfonso', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:25:44'),
(16, 0, 'andy', 'andy.villagra.1986@gmail.com', '0xda1796e92015987e93235a17094ab63842659b35', '9879121298798', 'andy', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:28:43'),
(17, 0, 'asaf', 'asaf.taxis@gmail.com', '0xda1796e92015287e93235a17094ab6384265vg4564', '216549879', 'asaf', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:31:06'),
(18, 0, 'businss330', 'businss330@gmail.com', '0xda1796e21465467df7e93235a17094ab63842659b35', '1316794654685', 'businss330', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:32:18'),
(19, 0, 'carlitos', 'carlitos.pena.saavedra.1985@gmail.com', '0xda1796e91265428adag235a17094ab63842659b35', '13874654618', 'carlitos', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-20 21:33:45'),
(20, 0, 'EdwardChild', 'edwardchild@gmail.com', '0xda1796e921234567e93235a17094ab63842659b35', '546465465465', 'edwardchild', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-21 16:11:51'),
(21, 0, 'Scooby Doo', 'scoo@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '622626262', 'scooby', '25d55ad283aa400af464c76d713c07ad', '35.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-24 21:02:18'),
(22, 0, 'test2', '17mgroup@gmail.com', '048.099.188-70', '', 'test2', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.18', '0', 1, 0, 0, 2, 0, '2022-06-25 14:10:03'),
(23, 0, 'felipito', 'lsakdjlkfjsldf@gmail.com', 'xxxxxxxxx', '33242323442', 'floraci', '346c1995b50a0d2a697a08eeda2de573', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-25 15:07:49'),
(24, 0, 'felipe', 'dljfdlfjdl@gmail.com', '0x7bc92184d1446d12d5406d729e761bbc3954edba', '34343', 'floraci1', '346c1995b50a0d2a697a08eeda2de573', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-25 15:10:14'),
(25, 0, 'carlitos1', 'edward.smith.freeloo222222.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '7879879879', 'carlitos1', 'd90d90a520000ec80857e82af7fedeff', '1061.15', '6.72', '0', 1, 1, 7, 1, 0, '2022-06-26 17:52:19'),
(26, 0, 'pedrito1', 'edward.smith.freeloo333333333.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '87987454645', 'pedrito1', 'd90d90a520000ec80857e82af7fedeff', '6000.10', '0.00', '0', 1, 0, 7, 1, 0, '2022-06-26 17:57:32'),
(27, 0, 'juancito1', 'edward.smith.freeloo232323.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '9874654131574', 'juancito1', 'd90d90a520000ec80857e82af7fedeff', '35.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-06-26 18:01:46'),
(28, 0, 'clarita1', 'edward.smith.freeloo87878787.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '98798798798', 'clarita1', 'd90d90a520000ec80857e82af7fedeff', '275.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-06-26 19:17:54'),
(29, 0, 'susan1', 'edward.smith.freelooaasd5465465.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '4654654654654', 'susan1', 'd90d90a520000ec80857e82af7fedeff', '35.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-06-26 19:21:21'),
(30, 0, 'test22', 'test22@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '21312123', 'test22', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-27 08:53:59'),
(31, 0, 'test44', 'test44@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '123123132', 'test44', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 2, 0, '2022-06-27 08:54:41'),
(32, 0, 'Jose Alberto', 'betomendez.2011@gmail.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '67985250', 'elbetus', 'cedea047986d604e06408a522747cab5', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-28 19:15:53'),
(33, 0, 'ale12', 'edward.smith.freeloo212121.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '9797987987', 'ale12', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-29 00:05:09'),
(34, 0, 'edwardito', 'edward.avalos.severiche1212@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '78987987987', 'edwardito', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-29 00:29:09'),
(35, 0, 'alejandro5', 'edward.avalos.severiche@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '98464654879', 'alejandro5', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-29 00:38:27'),
(36, 0, 'pedro657', 'pedro657@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '6546465465', 'pedro657', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-29 06:06:15'),
(37, 0, 'juan123', 'juan123@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '8798756456546', 'juan123', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-29 06:08:39'),
(38, 0, 'juancito3', 'juancito3@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '654975513216', 'juancito3', 'd90d90a520000ec80857e82af7fedeff', '0.65', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-30 20:17:28'),
(39, 0, 'pedrito3', 'pedrito3@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '897984122222', 'pedrito3', 'd90d90a520000ec80857e82af7fedeff', '0.65', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-30 20:19:33'),
(40, 0, 'Alberto Mendez', 'bmlaudiovisuales@gmail.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '6454654654', 'betomendezleite', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-06-30 22:59:34'),
(41, 0, 'Adrian Espinoza', 'topisidad@gmail.com', '0x0d7465ff679db1c2ede9d77591df11282d82893b', '75044770', 'adesp', '94eb681036a8521409c6f311771e746d', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-01 14:39:31'),
(42, 0, 'test21', 'test21@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '123456789', 'test21', '25f9e794323b453885f5181f1b624d0b', '0.65', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-01 18:02:33'),
(43, 0, 'test23', 'test23@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '123456789', 'test23', '25f9e794323b453885f5181f1b624d0b', '0.65', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-01 18:17:27'),
(44, 0, 'test24', 'test24@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '123456789', 'test24', '25f9e794323b453885f5181f1b624d0b', '0.65', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-01 18:19:29'),
(45, 0, 'Simon Bolivar', 'influencer.life.2022@gmail.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '658976232', 'bolivar', '25d55ad283aa400af464c76d713c07ad', '22.80', '27.00', '0', 1, 1, 7, 1, 0, '2022-07-01 18:54:41'),
(46, 0, 'Alejandro Magno', 'magno@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '6796463312', 'magno', '25d55ad283aa400af464c76d713c07ad', '20.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-01 19:25:46'),
(47, 0, 'Julio Cesar', 'jcesar@email.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '685421321', 'jcesar', '25d55ad283aa400af464c76d713c07ad', '20.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-02 05:54:19'),
(48, 0, 'Jose Antonio Sucre', 'sucre@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '65888888', 'sucre', '25d55ad283aa400af464c76d713c07ad', '20.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-02 05:59:18'),
(49, 0, 'Jose Cañoto', 'canoto@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '7523132165', 'canoto', '25d55ad283aa400af464c76d713c07ad', '20.00', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-02 06:12:01'),
(50, 0, 'carlita1213', 'edward.smith.freeloo.1985@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '89794654654', 'carlita1213', 'd90d90a520000ec80857e82af7fedeff', '2.55', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-02 09:40:15'),
(51, 0, 'test33', 'radafarinc.aaf@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '123456789', 'test33', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-03 10:23:31'),
(52, 0, 'test66', 'neraincllc@gmail.com', '0xda4b80991f887bcd00f9d81fa728ab222eaffc86', '123456789', 'test66', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-03 10:25:33'),
(53, 0, 'Hann', 'hanntro@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '362132165464', 'hann', 'e10adc3949ba59abbe56e057f20f883e', '18.15', '3.12', '0', 1, 1, 7, 2, 0, '2022-07-03 11:00:58'),
(54, 0, 'Peter', 'peterz@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '6565464', 'peter', '81dc9bdb52d04dc20036dbd8313ed055', '7.55', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 12:07:39'),
(55, 0, 'Gonzalo', 'gonzajo@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '8461321', 'gonza', '81dc9bdb52d04dc20036dbd8313ed055', '14.65', '0.18', '0', 1, 1, 7, 2, 0, '2022-07-03 15:23:00'),
(56, 0, 'Mafer', 'mafer@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '68464163', 'mafer', '81dc9bdb52d04dc20036dbd8313ed055', '18.15', '0.24', '0', 1, 1, 7, 1, 0, '2022-07-03 16:46:35'),
(57, 0, 'Xavi', 'xavi@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '98461321', 'xavi', '81dc9bdb52d04dc20036dbd8313ed055', '0.65', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 17:10:43'),
(58, 0, 'Chani', 'chanimail@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '987465461', 'chani', '81dc9bdb52d04dc20036dbd8313ed055', '0.65', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 17:12:39'),
(59, 0, 'Jeancarlo', 'jeancarlo@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '46651651', 'jeancarlo', '81dc9bdb52d04dc20036dbd8313ed055', '0.60', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 17:42:36'),
(60, 0, 'maferiA', 'maferA@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '6846131', 'maferia', '81dc9bdb52d04dc20036dbd8313ed055', '0.55', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 18:52:38'),
(61, 0, 'MaferB', 'maferib@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '4361321354', 'maferib', '81dc9bdb52d04dc20036dbd8313ed055', '0.55', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 18:55:11'),
(62, 0, 'MaferC', 'maferc@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '4631321', 'maferc', '81dc9bdb52d04dc20036dbd8313ed055', '0.55', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 18:58:46'),
(63, 0, 'MaferD', 'maferd@gmail.com', '0xad38be84a8f1029f8225a34a4499f6679109e21c', '986313213', 'maferd', '81dc9bdb52d04dc20036dbd8313ed055', '0.55', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-03 19:01:00'),
(64, 0, 'juancito2315', 'juancito2315@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '8798646465', 'juancito2315', 'd90d90a520000ec80857e82af7fedeff', '2.50', '0.06', '0', 1, 0, 0, 2, 0, '2022-07-04 17:01:35'),
(65, 0, 'pedrito2542', 'pedrito2542@gmail.com', '0xda1796e92015287e93235a17094ab63842659b35', '5465465465', 'pedrito2542', 'd90d90a520000ec80857e82af7fedeff', '0.50', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-04 17:16:14'),
(66, 0, 'Jose Miguel', 'jm@asd.com', '0x63788f7f4d6a2c5d0a1fdb0e4977cdff9c365004', '684668464', 'josem', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-04 19:24:24'),
(69, 0, 'Vinny', 'vinny@asd.com', '0x9bf0d690d4699cf16f24f34b35354a2f3988fd97', '5646546545', 'vinny', '25d55ad283aa400af464c76d713c07ad', '0.50', '3.00', '0', 1, 0, 7, 1, 0, '2022-07-04 21:12:30'),
(70, 0, 'Iracema Leite', 'iracema@asd.com', '', '6864532135', 'iracema', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-04 19:44:58'),
(71, 0, 'Pepito', 'radafarinc.ecs@gmail.com', '', '123456789', 'pepito', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 08:22:28'),
(72, 0, 'testx', 'corp.jecs@gmail.com', '', '123456', 'testx', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 2, 0, '2022-07-05 09:38:09'),
(73, 0, 'asda', 'asas@asda', '', '564456546541', 'asd', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 09:47:47'),
(74, 0, 'Albert Einstein', 'alberth@asd.com', '', '68974694654', 'alberth', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 10:00:35'),
(75, 0, 'alberto', 'alberto@asd.com', '', '+549+4546', 'alberto', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 10:05:08'),
(76, 0, 'Joker', 'joker@asd.com', '', '849564165', 'joker', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 10:08:40'),
(77, 0, 'asd', 'asdasd@asd.com', '', '8949849+', 'qwerty', '25d55ad283aa400af464c76d713c07ad', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 10:10:09'),
(78, 0, 'testx1', 'testx1@gmail.com', '', '123466', 'testx1', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 12:27:07'),
(79, 0, 'testx2', 'testx2@gmail.com', '', '12345', 'testx2', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 12:33:33'),
(80, 0, 'testx3', 'testx3@gmail.com', '', '123456', 'testx3', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 12:48:05'),
(81, 0, 'carlistos145', 'carlistos145@gmail.com', '', '89879876542', 'carlistos145', 'd90d90a520000ec80857e82af7fedeff', '0.50', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 13:03:22'),
(82, 0, 'Testz', 'testz@gmail.com', '', '124565', 'testz', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 14:25:06'),
(83, 0, 'kirusiya3', 'kirusiya3@gmail.com', '', '6178111919', 'kirusiya3', 'd90d90a520000ec80857e82af7fedeff', '50.70', '384.90', '0', 1, 0, 0, 2, 0, '2022-07-05 15:53:29'),
(84, 0, 'c_kirusiya1', 'c_kirusiya1@gmail.com', '', '965449794654', 'c_kirusiya1', 'd90d90a520000ec80857e82af7fedeff', '150.05', '360.78', '0', 1, 0, 0, 1, 0, '2022-07-05 16:04:20'),
(85, 0, 'c_kirusiya2', 'c_kirusiya2@gmail.com', '', '8976216871321', 'c_kirusiya2', 'd90d90a520000ec80857e82af7fedeff', '15.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 16:05:53'),
(86, 0, 'c_kirusiya3', 'c_kirusiya3@gmail.com', '', '12354984752', 'c_kirusiya3', 'd90d90a520000ec80857e82af7fedeff', '5.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 16:06:54'),
(87, 0, 'c_kirusiya1_4', 'c_kirusiya1_4@gmail.com', '', '123535485', 'c_kirusiya1_4', 'd90d90a520000ec80857e82af7fedeff', '300.65', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 16:08:45'),
(88, 0, 'c_kirusiya1_5', 'c_kirusiya1_5@gmail.com', '', '5328754620', 'c_kirusiya1_5', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 16:10:57'),
(89, 0, 'c_kirusiya6', 'c_kirusiya6@gmail.com', '', '968542156574', 'c_kirusiya6', 'd90d90a520000ec80857e82af7fedeff', '150.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 16:26:35'),
(90, 0, 'DIEGUITO', 'diego2222@gmail.com', '', '78451263', 'diego1', 'fb87582825f9d28a8d42c5e5e5e8b23d', '0.50', '0.60', '0', 1, 0, 0, 2, 0, '2022-07-05 17:17:41'),
(91, 0, 'Jose ALberto', 'ja@asd.com', '', '64+646465', 'jalberto', '25d55ad283aa400af464c76d713c07ad', '2.50', '6.00', '0', 1, 1, 7, 2, 0, '2022-07-05 17:18:32'),
(92, 0, 'ALVARITO', 'alvaro@gmail.com', '', '96857412', 'alvarito', 'fb87582825f9d28a8d42c5e5e5e8b23d', '0.50', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 17:19:42'),
(93, 0, 'Iracema Silva', 'isilva@asd.com', '', '67979876', 'isilva', '25d55ad283aa400af464c76d713c07ad', '2.50', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-05 17:37:59'),
(94, 0, 'Angelita', 'angelita@asd.com', '', '979756321', 'angelita', '25d55ad283aa400af464c76d713c07ad', '2.50', '0.00', '0', 1, 0, 7, 1, 0, '2022-07-05 18:05:06'),
(95, 0, 'juancito2345', 'juancito2345@gmail.com', '', '7142589369', 'juancito2345', 'd90d90a520000ec80857e82af7fedeff', '0.10', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 18:13:55'),
(96, 0, 'pedrito4523', 'dulcetentaciononline1@gmail.com', '', '1236879815822485', 'pedrito4523', 'd90d90a520000ec80857e82af7fedeff', '0.10', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-05 18:29:59'),
(97, 0, 'gabrielito456', 'gabrielito456@gmail.com', '', '646654654983', 'gabrielito456', 'd90d90a520000ec80857e82af7fedeff', '0.05', '0.12', '0', 1, 0, 0, 1, 0, '2022-07-05 18:41:16'),
(98, 0, 'kirusiya', 'kirusiya@gmail.com', '', '(+591)-61781119', 'kirusiya', 'd90d90a520000ec80857e82af7fedeff', '0.10', '1.38', '0', 1, 0, 0, 1, 0, '2022-07-06 04:44:17'),
(99, 0, 'jarolito1', 'jarolito1@gmail.com', '', '646565465465', 'jarolito1', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-06 06:10:14'),
(100, 0, 'jarolito2', 'jarolito2@gmail.com', '', '6465898946121265', 'jarolito2', 'd90d90a520000ec80857e82af7fedeff', '0.00', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-06 06:12:13'),
(101, 0, 'jarolito3', 'jarolito3@gmail.com', '', '6465898946121265', 'jarolito3', 'd90d90a520000ec80857e82af7fedeff', '0.05', '0.00', '0', 1, 0, 0, 1, 0, '2022-07-06 06:13:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_contas`
--

CREATE TABLE `usuarios_contas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_banco` varchar(5) DEFAULT NULL,
  `agencia` varchar(6) DEFAULT NULL,
  `agencia_digito` varchar(5) DEFAULT NULL,
  `conta` int(11) DEFAULT NULL,
  `conta_digito` varchar(5) DEFAULT NULL,
  `operacao` varchar(6) DEFAULT NULL,
  `tipo_conta` int(11) DEFAULT NULL,
  `titular` varchar(120) DEFAULT NULL,
  `documento` varchar(30) DEFAULT NULL,
  `categoria_conta` int(11) NOT NULL DEFAULT 1,
  `carteira_bitcoin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_contas`
--

INSERT INTO `usuarios_contas` (`id`, `id_usuario`, `codigo_banco`, `agencia`, `agencia_digito`, `conta`, `conta_digito`, `operacao`, `tipo_conta`, `titular`, `documento`, `categoria_conta`, `carteira_bitcoin`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '203983yrhuef269302jenfb32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_opciones`
--

CREATE TABLE `usuarios_opciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_opcion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `permisos` text DEFAULT '\'1|2|3|4|5\'',
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_cambio` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(2) DEFAULT 'AC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_opciones`
--

INSERT INTO `usuarios_opciones` (`id`, `id_opcion`, `id_usuario`, `permisos`, `fecha_alta`, `fecha_cambio`, `estado`) VALUES
(1, 1, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(2, 2, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(3, 3, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(4, 4, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(5, 5, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(6, 6, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(7, 7, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(8, 8, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(9, 9, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(10, 10, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(11, 11, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(12, 12, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(13, 13, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(14, 14, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(15, 15, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(16, 16, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(17, 17, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(18, 18, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(19, 19, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC'),
(20, 20, 1, '1|2|3|4|5', '2022-07-03 12:47:26', '2022-07-03 12:47:26', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_plano_carreira`
--

CREATE TABLE `usuarios_plano_carreira` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_plano_carreira` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_plano_carreira`
--

INSERT INTO `usuarios_plano_carreira` (`id`, `id_usuario`, `id_plano_carreira`, `data`) VALUES
(1, 1, 1, '2017-11-13 12:35:21'),
(2, 2, 1, '2022-06-16 06:15:15'),
(3, 3, 1, '2022-06-16 07:39:49'),
(4, 4, 1, '2022-06-16 08:23:23'),
(5, 5, 1, '2022-06-16 08:43:46'),
(6, 6, 1, '2022-06-18 18:13:21'),
(7, 7, 1, '2022-06-18 18:20:59'),
(8, 8, 1, '2022-06-18 18:23:22'),
(9, 9, 1, '2022-06-19 07:53:40'),
(10, 10, 1, '2022-06-20 18:32:11'),
(11, 11, 1, '2022-06-20 21:18:18'),
(12, 12, 1, '2022-06-20 21:19:36'),
(13, 13, 1, '2022-06-20 21:22:01'),
(14, 14, 1, '2022-06-20 21:24:38'),
(15, 15, 1, '2022-06-20 21:25:44'),
(16, 16, 1, '2022-06-20 21:28:43'),
(17, 17, 1, '2022-06-20 21:31:06'),
(18, 18, 1, '2022-06-20 21:32:18'),
(19, 19, 1, '2022-06-20 21:33:45'),
(20, 20, 1, '2022-06-21 16:11:51'),
(21, 21, 1, '2022-06-24 21:02:18'),
(22, 22, 1, '2022-06-25 14:10:03'),
(23, 23, 1, '2022-06-25 15:07:49'),
(24, 24, 1, '2022-06-25 15:10:14'),
(25, 25, 1, '2022-06-26 17:52:19'),
(26, 26, 1, '2022-06-26 17:57:32'),
(27, 27, 1, '2022-06-26 18:01:46'),
(28, 28, 1, '2022-06-26 19:17:54'),
(29, 29, 1, '2022-06-26 19:21:21'),
(30, 30, 1, '2022-06-27 08:53:59'),
(31, 31, 1, '2022-06-27 08:54:41'),
(32, 32, 1, '2022-06-28 19:15:53'),
(33, 33, 1, '2022-06-29 00:05:09'),
(34, 34, 1, '2022-06-29 00:29:09'),
(35, 35, 1, '2022-06-29 00:38:27'),
(36, 36, 1, '2022-06-29 06:06:15'),
(37, 37, 1, '2022-06-29 06:08:39'),
(38, 38, 1, '2022-06-30 20:17:28'),
(39, 39, 1, '2022-06-30 20:19:33'),
(40, 40, 1, '2022-06-30 22:59:34'),
(41, 41, 1, '2022-07-01 14:39:31'),
(42, 42, 1, '2022-07-01 18:02:33'),
(43, 43, 1, '2022-07-01 18:17:27'),
(44, 44, 1, '2022-07-01 18:19:29'),
(45, 45, 1, '2022-07-01 18:54:41'),
(46, 46, 1, '2022-07-01 19:25:46'),
(47, 47, 1, '2022-07-02 05:54:19'),
(48, 48, 1, '2022-07-02 05:59:18'),
(49, 49, 1, '2022-07-02 06:12:01'),
(50, 50, 1, '2022-07-02 09:40:15'),
(51, 51, 1, '2022-07-03 10:23:31'),
(52, 52, 1, '2022-07-03 10:25:33'),
(53, 53, 1, '2022-07-03 11:00:58'),
(54, 54, 1, '2022-07-03 12:07:39'),
(55, 55, 1, '2022-07-03 15:23:00'),
(56, 56, 1, '2022-07-03 16:46:35'),
(57, 57, 1, '2022-07-03 17:10:43'),
(58, 58, 1, '2022-07-03 17:12:39'),
(59, 59, 1, '2022-07-03 17:42:36'),
(60, 60, 1, '2022-07-03 18:52:38'),
(61, 61, 1, '2022-07-03 18:55:11'),
(62, 62, 1, '2022-07-03 18:58:46'),
(63, 63, 1, '2022-07-03 19:01:00'),
(64, 64, 1, '2022-07-04 17:01:35'),
(65, 65, 1, '2022-07-04 17:16:14'),
(66, 66, 1, '2022-07-04 19:24:24'),
(67, 67, 1, '2022-07-04 20:57:42'),
(68, 68, 1, '2022-07-04 21:10:25'),
(69, 69, 1, '2022-07-04 21:12:30'),
(70, 70, 1, '2022-07-04 19:44:58'),
(71, 71, 1, '2022-07-05 08:22:28'),
(72, 72, 1, '2022-07-05 09:38:09'),
(73, 73, 1, '2022-07-05 09:47:47'),
(74, 74, 1, '2022-07-05 10:00:35'),
(75, 75, 1, '2022-07-05 10:05:08'),
(76, 76, 1, '2022-07-05 10:08:40'),
(77, 77, 1, '2022-07-05 10:10:09'),
(78, 78, 1, '2022-07-05 12:27:07'),
(79, 79, 1, '2022-07-05 12:33:33'),
(80, 80, 1, '2022-07-05 12:48:05'),
(81, 81, 1, '2022-07-05 13:03:22'),
(82, 82, 1, '2022-07-05 14:25:06'),
(83, 83, 1, '2022-07-05 15:53:29'),
(84, 84, 1, '2022-07-05 16:04:20'),
(85, 85, 1, '2022-07-05 16:05:53'),
(86, 86, 1, '2022-07-05 16:06:54'),
(87, 87, 1, '2022-07-05 16:08:45'),
(88, 88, 1, '2022-07-05 16:10:57'),
(89, 89, 1, '2022-07-05 16:26:35'),
(90, 90, 1, '2022-07-05 17:17:41'),
(91, 91, 1, '2022-07-05 17:18:32'),
(92, 92, 1, '2022-07-05 17:19:42'),
(93, 93, 1, '2022-07-05 17:37:59'),
(94, 94, 1, '2022-07-05 18:05:06'),
(95, 95, 1, '2022-07-05 18:13:55'),
(96, 96, 1, '2022-07-05 18:29:59'),
(97, 97, 1, '2022-07-05 18:41:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigos_verificacao`
--
ALTER TABLE `codigos_verificacao`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracao_nivel_indicacoes`
--
ALTER TABLE `configuracao_nivel_indicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracao_pagamento_saque`
--
ALTER TABLE `configuracao_pagamento_saque`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contas_pagamento`
--
ALTER TABLE `contas_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `extrato`
--
ALTER TABLE `extrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faturas`
--
ALTER TABLE `faturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plano_carreira`
--
ALTER TABLE `plano_carreira`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `qr_sistema`
--
ALTER TABLE `qr_sistema`
  ADD PRIMARY KEY (`cod_qr`);

--
-- Indices de la tabla `rede`
--
ALTER TABLE `rede`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rede_pontos_binario`
--
ALTER TABLE `rede_pontos_binario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `saques`
--
ALTER TABLE `saques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets_mensagem`
--
ALTER TABLE `tickets_mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_contas`
--
ALTER TABLE `usuarios_contas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_opciones`
--
ALTER TABLE `usuarios_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_opcion` (`id_opcion`);

--
-- Indices de la tabla `usuarios_plano_carreira`
--
ALTER TABLE `usuarios_plano_carreira`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigos_verificacao`
--
ALTER TABLE `codigos_verificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `configuracao_nivel_indicacoes`
--
ALTER TABLE `configuracao_nivel_indicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracao_pagamento_saque`
--
ALTER TABLE `configuracao_pagamento_saque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `contas_pagamento`
--
ALTER TABLE `contas_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `extrato`
--
ALTER TABLE `extrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT de la tabla `faturas`
--
ALTER TABLE `faturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de la tabla `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT de la tabla `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89327543;

--
-- AUTO_INCREMENT de la tabla `plano_carreira`
--
ALTER TABLE `plano_carreira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `qr_sistema`
--
ALTER TABLE `qr_sistema`
  MODIFY `cod_qr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rede`
--
ALTER TABLE `rede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `rede_pontos_binario`
--
ALTER TABLE `rede_pontos_binario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `saques`
--
ALTER TABLE `saques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tickets_mensagem`
--
ALTER TABLE `tickets_mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `usuarios_contas`
--
ALTER TABLE `usuarios_contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_opciones`
--
ALTER TABLE `usuarios_opciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios_plano_carreira`
--
ALTER TABLE `usuarios_plano_carreira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios_opciones`
--
ALTER TABLE `usuarios_opciones`
  ADD CONSTRAINT `usuarios_opciones_ibfk_1` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
