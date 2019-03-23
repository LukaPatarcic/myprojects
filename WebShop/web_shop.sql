-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 01:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '$2y$10$QGMp7HXht5IUcC3eRNwxXurQ3ZWUdIftqBUT1/0zeCdzeifGKVmTe');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Art'),
(2, 'Electronics'),
(3, 'Sport'),
(4, 'Cars'),
(5, 'accusamus'),
(6, 'eveniet'),
(8, 'rem'),
(9, 'nihil'),
(10, 'ipsam'),
(11, 'Category');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8_unicode_ci NOT NULL,
  `item_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `category_id`, `item_name`, `item_description`, `item_price`, `created_at`) VALUES
(1, 9, 'numquam', 'Amet unde est odio enim esse. Velit molestias ut voluptas. Porro voluptatibus quos accusamus aut.', 5.52911, '1970-04-17 05:08:47'),
(2, 6, 'eos', 'Eligendi laboriosam qui nulla. Recusandae nisi sunt ipsa et quos.', 1647.7, '1983-10-27 22:09:58'),
(3, 6, 'et', 'Molestiae modi eum quis vel amet laborum rem nihil. Dolorum illo officiis dolorem. Et unde et eius. Quaerat tempore deserunt consectetur officiis saepe.', 2615.45747, '1993-12-24 10:30:11'),
(5, 6, 'cupiditate', 'Illo dolore doloribus aperiam voluptatem cupiditate repudiandae et. Iusto porro quia aut dolor odio laudantium ab. Dolor et rerum quibusdam ut exercitationem. Nulla architecto qui dolore et quia.', 3914365.761, '1998-09-17 13:40:22'),
(6, 4, 'rerum', 'Quod suscipit id non eum in. Dolor inventore est labore assumenda. Nam quia et debitis quia nobis vel. Quia omnis in nesciunt a veniam vitae. Excepturi voluptatibus unde provident ipsa aut autem inventore doloribus.', 70.61411128, '2002-03-21 04:20:33'),
(7, 3, 'eos', 'Autem velit aut sunt dicta dolorem repudiandae perspiciatis. Autem quibusdam quas in architecto consequuntur praesentium. Dignissimos animi quidem et beatae maxime qui facere.', 2.1712, '2010-05-07 04:20:38'),
(8, 3, 'magnam', 'Explicabo fuga earum enim numquam distinctio quae. Beatae modi dolorum minima ea ut molestiae. Quam sunt est veritatis. Assumenda et totam qui officiis.', 9347.5440313, '1995-09-13 08:15:49'),
(9, 4, 'ratione', 'Et dolor tempora id officiis. Rem iusto explicabo beatae rerum et accusantium. Quos facere ullam perferendis labore voluptatem fuga cupiditate fugiat. Officia corrupti numquam aut sed sint enim itaque.', 5.6374, '2017-09-28 08:46:50'),
(10, 10, 'deleniti', 'Est commodi commodi itaque corporis nihil. Blanditiis quaerat aut vero non necessitatibus asperiores incidunt soluta. Est vero aut laboriosam et est earum dolorem.', 3093156.6434256, '1992-04-12 16:16:21'),
(11, 5, 'nemo', 'Illum id dolor quis fugiat. Repellat cupiditate placeat nisi ea repudiandae. Aut debitis ut sapiente dolores odit fuga voluptate. Aliquid in aliquid possimus nesciunt quaerat exercitationem.', 22.11, '2019-03-23 11:54:29'),
(12, 5, 'explicabo', 'In id rerum qui delectus amet fugiat. Amet vel distinctio quae incidunt. Ullam voluptatem sed et odit et. Asperiores accusamus quia sit deleniti iure repudiandae.', 659.513797, '1997-12-15 12:38:29'),
(13, 1, 'dignissimos', 'Rerum voluptas dolores rerum et suscipit commodi accusamus. Sed quod et odio animi repudiandae voluptate eos. Possimus totam ea doloremque nisi odio. Cupiditate eligendi et quae ut.', 22.22, '2019-03-23 12:04:53'),
(14, 8, 'id', 'Voluptas omnis voluptatem assumenda nulla consequuntur magni. Nam rerum quis molestias.', 28178.79784777, '1970-09-28 22:01:12'),
(15, 10, 'et', 'Laudantium repellat libero molestias et ex. Ea minus quae et et provident facere ut dolorem. Ut vel id fugit expedita.', 936287742.83836, '2011-12-12 21:47:58'),
(16, 5, 'rem', 'Molestias sapiente vel autem illo qui. Nisi quia voluptates modi. Animi enim molestiae mollitia sit alias nihil. Est consequatur ipsa ratione qui laudantium amet.', 4678.2, '2001-09-03 02:11:56'),
(18, 10, 'labore', 'Sequi qui harum ipsa et eligendi eius. Eos ab magnam soluta quas labore. Neque cum dolore autem aut numquam fugiat et. Qui et voluptatem corporis.', 2524246, '1971-01-01 03:39:54'),
(19, 6, 'quis', 'Magnam et mollitia in. Nihil voluptate sunt enim animi velit est aut porro. Recusandae sunt quia ut quas. Quia nisi nihil id iusto ea aut.', 17, '1996-11-09 00:30:32'),
(20, 6, 'doloremque', 'Aut suscipit sunt quo architecto accusamus inventore. Quae magni eveniet aut molestias aliquam aspernatur. Vitae et magnam sint soluta pariatur ut. Rerum ipsum nulla consectetur facere est eveniet ea.', 1960.9286, '1986-07-02 22:00:56'),
(21, 9, 'odio', 'Voluptatem illum eum ullam quae qui assumenda debitis eveniet. Sunt et eos animi sed sunt cum earum. Illum praesentium eos pariatur quia recusandae. Hic aut dolores officiis unde hic.', 1032.6, '1990-03-02 23:56:33'),
(22, 1, 'eos', 'Vel aperiam omnis provident animi voluptatibus eveniet. Autem velit id officia quia. Minus soluta eveniet aut nobis autem facere porro. Expedita tenetur explicabo ut et necessitatibus. Consequatur eos consequatur soluta quia voluptatem.', 4352, '2019-03-23 11:57:29'),
(23, 4, 'dolorum', 'Sunt omnis provident quia ullam est maiores quis. Sit eaque delectus vitae qui voluptatem. Alias molestias tempora sint sed. Vel alias ut dignissimos est est.', 798.794, '2006-01-09 18:06:05'),
(24, 4, 'sit', 'Fuga odit sit praesentium tenetur. Doloribus qui voluptate quia perspiciatis officia minus commodi. Cumque assumenda nostrum sunt non voluptatem labore ad. Iure sint unde aut distinctio. Velit suscipit hic odit omnis culpa.', 3.48, '1977-11-03 22:38:46'),
(25, 1, 'sit', 'Voluptas consectetur velit voluptas est alias magni sunt eos. Accusantium sit nemo expedita recusandae consequatur libero molestias ipsam. Fugiat illum voluptatibus consequatur voluptatum et cupiditate quos.', 796390161.07338, '1999-06-09 00:04:03'),
(26, 3, 'similique', 'Asperiores qui error expedita dicta officia voluptate accusamus. Consequatur qui et dolor omnis placeat qui illo. Porro aperiam et repellat. Fugit dolorum laudantium est rerum qui aspernatur animi nemo.', 3081214.3167, '2018-09-08 05:57:26'),
(27, 10, 'et', 'Minus voluptate voluptatem rem eos similique deleniti error. Alias id voluptatem et. Accusantium qui quod et est. Qui quas sed adipisci placeat eligendi quam.', 63517.93602, '1976-05-16 18:38:53'),
(28, 2, 'vel', 'Et exercitationem quos blanditiis quo odit eveniet. Quasi tempora repellat optio veniam. Laborum corrupti et id nesciunt vel est. Eaque minus quos voluptatem laboriosam ea.', 9642151.781155, '1991-07-05 00:09:48'),
(29, 10, 'ut', 'Illum ullam corporis blanditiis ex. Omnis culpa aut est rem ut autem.', 4881.98475, '1984-07-10 22:44:38'),
(30, 9, 'nihil', 'Ut debitis mollitia sint id non eum possimus quia. Est laborum est accusamus soluta ut. Praesentium repellendus totam est laudantium occaecati et facilis. Expedita tenetur quos quo et at.', 0, '2016-05-20 20:03:54'),
(31, 8, 'ullam', 'Quasi at eos illum consequatur sit nostrum. Sapiente ut nemo quis doloribus dicta quae aut quam. Voluptatem voluptas molestias ipsum atque possimus. Illum quia voluptas consequatur sint tempora.', 63987.82, '2017-12-10 18:34:01'),
(32, 4, 'nulla', 'Commodi aliquam dicta ipsum quidem aliquid consectetur voluptas. Fuga maxime at et dolore magnam corporis voluptatibus dolores. Sed deserunt nostrum totam. Suscipit ut veritatis sit in ullam delectus deserunt. Hic dolores omnis rem omnis quidem id facere.', 24251846.768822, '1972-12-16 03:44:32'),
(33, 1, 'enim', 'Dolorem maiores et aliquam vitae praesentium minus voluptatem. Esse ipsa ut est laborum labore. Nam consequatur perferendis voluptas fugiat omnis.', 77.389141889, '2001-10-25 21:20:37'),
(34, 10, 'laboriosam', 'Atque iste sint sit cum consequatur voluptatem autem. Quaerat nihil mollitia laborum aut in. Ea molestiae ex iure maxime ut. Voluptas ex qui iure veniam reiciendis iste nostrum.', 2.3777716, '1979-01-11 12:50:17'),
(35, 9, 'et', 'Rerum et consectetur eligendi eveniet. Eum et cum dicta ut vero eum blanditiis. Dolore molestiae qui inventore aut laudantium qui sunt.', 221750842, '2017-08-14 07:32:23'),
(36, 3, 'eum', 'Id dolorem veritatis pariatur sed ipsam et minus porro. Qui officia nesciunt esse nobis repellat amet molestiae dignissimos. Exercitationem corporis et rem illum dolor dolores ducimus. Eveniet impedit eaque vel asperiores. Eaque consectetur doloribus modi et voluptatum molestiae perferendis repudiandae.', 0, '2000-08-05 14:13:30'),
(37, 8, 'eveniet', 'Quia corrupti veritatis ex beatae. Molestiae vel hic adipisci qui. In itaque voluptas pariatur a dignissimos delectus repudiandae voluptatem.', 0.17721103, '1990-12-23 05:25:29'),
(38, 10, 'ut', 'Iure voluptates vel sequi minus illum. Non ducimus quo minima impedit sed corporis modi harum. Consequuntur consectetur atque dolor repellat.', 1048.3, '1981-04-27 16:56:58'),
(39, 10, 'voluptate', 'Tenetur et odit harum quo. Quia ut corporis dolor ea iste eum totam. Temporibus dolore ullam quia dignissimos sit odit. Excepturi est velit ullam nesciunt molestiae.', 5162.6, '2005-06-04 20:28:09'),
(40, 2, 'fugiat', 'Corrupti culpa et praesentium soluta. Rerum at voluptate esse omnis et.', 308408015.669, '2018-08-10 04:10:11'),
(41, 10, 'consequatur', 'Fugiat quasi sit distinctio quae autem ut aliquam. Vel repudiandae est laboriosam eos corporis nobis consequuntur. Aut reiciendis quibusdam sunt exercitationem dolore quos. Illo voluptatem consequatur fuga asperiores minus.', 0, '2004-12-03 06:06:45'),
(42, 3, 'sequi', 'Qui porro praesentium velit tempore quibusdam id odit dolores. Reiciendis et et veniam incidunt sunt aut. Repudiandae quo neque non esse doloremque consequuntur veritatis sint. Ducimus eius tempora aperiam qui est libero.', 47707592.4263, '1972-01-02 17:42:25'),
(43, 6, 'ad', 'Et itaque reprehenderit eaque eum officiis. Nihil molestias in ut minus cumque. Quia nostrum maxime laboriosam eos. Debitis debitis modi perferendis numquam cupiditate.', 53329752.44, '1983-04-17 09:41:52'),
(45, 3, 'delectus', 'Possimus quasi culpa vel eius. Aut qui harum est dolorum assumenda. Numquam asperiores distinctio rerum sunt. Inventore omnis ut occaecati eum. Voluptate in rem est vitae esse.', 1189116.6305659, '2014-05-08 05:14:54'),
(46, 5, 'nam', 'Nemo qui itaque sit sed mollitia. Voluptas optio molestiae rerum accusantium aut doloremque consequatur. Soluta officia aut et omnis. Dolores ea accusantium ut perferendis sint. Voluptatem repudiandae est non necessitatibus quos ab.', 2354077.088238, '1988-06-02 02:43:14'),
(47, 2, 'eveniet', 'Eligendi natus veniam cupiditate. Voluptatibus et nulla occaecati dolorum debitis consequatur accusamus. Quo labore ab non dolorem consequatur. Laborum sint non possimus quibusdam nam vel.', 17926, '2007-10-25 02:50:36'),
(48, 1, 'qui', 'Sint adipisci sint perspiciatis error aperiam provident. Consequatur rem harum fuga harum sint. Quo qui quia aliquid maxime non nobis. Officiis mollitia inventore excepturi ea odio iure quo.', 59034266, '1980-12-13 22:43:42'),
(49, 2, 'adipisci', 'Molestias qui animi dolor rerum enim. Aliquid molestiae est odio minus assumenda. Culpa tenetur natus beatae unde.', 480933.99457387, '1985-05-04 14:37:22'),
(50, 1, 'qui', 'Ullam rerum error nam. Ut occaecati consequuntur laboriosam temporibus. Quis aut et nemo repellat ut magni. Id explicabo ad quod dicta aut. Est optio exercitationem harum ut rem nostrum.', 74107.62638, '1989-09-23 20:25:20'),
(51, 8, 'numquam', 'Similique ipsa eum voluptates occaecati ad voluptate ut. Vero quis reprehenderit excepturi corporis fugit. Occaecati quia pariatur distinctio saepe cupiditate aut. Praesentium ipsa exercitationem animi blanditiis neque ad dignissimos quidem.', 24593695.8109, '1996-11-28 14:38:43'),
(53, 5, 'et', 'Dolorem deleniti excepturi molestiae. Enim saepe nisi quam iusto aliquid cupiditate. Quibusdam sint adipisci aut suscipit iusto illo.', 0, '2008-05-06 21:13:48'),
(54, 2, 'voluptatem', 'Veritatis nisi officia nobis impedit dolorum sed. Nostrum inventore aperiam possimus odit aut soluta. Eligendi ut fugiat saepe hic accusantium amet.', 1355576.2276005, '1999-11-15 18:45:07'),
(55, 8, 'aut', 'Dolorem hic rerum aut earum necessitatibus mollitia. Laboriosam tenetur quia debitis et dolor. Vero ipsa aut autem et velit distinctio optio.', 564793.49637, '1976-09-12 04:56:40'),
(56, 6, 'vitae', 'Molestias at ut quod dolorem. Fugiat quod cum omnis esse.', 849.630500586, '1988-12-30 19:47:39'),
(57, 4, 'et', 'Dolore in nihil quasi consequatur voluptatem earum. Ut est vitae illo sapiente beatae commodi numquam. Optio numquam voluptas quae eos. Consequuntur debitis ut dolores vero saepe ipsa.', 0.9, '1992-09-26 21:50:55'),
(58, 4, 'non', 'Eum fugiat quod suscipit et sunt. Ducimus excepturi dolores repellendus architecto quos ut. Odio mollitia iusto repudiandae eos qui sapiente dolorem. Est nam excepturi aspernatur aut et.', 24218735.270255, '2013-08-31 02:45:28'),
(59, 5, 'hic', 'Necessitatibus eligendi sit sapiente id quibusdam modi. Autem nisi ex et voluptas. Omnis dolores nisi doloremque fuga atque eum.', 3269300.753106, '1973-12-12 00:43:37'),
(61, 9, 'temporibus', 'Sed necessitatibus soluta omnis enim autem minus. Maiores a vitae autem officia sit. Ipsum quidem consequatur sed rem modi occaecati deserunt omnis.', 25288376.1, '1980-10-11 17:44:54'),
(62, 6, 'itaque', 'Perspiciatis omnis porro aperiam dolores distinctio a ea. Laudantium est veniam qui quo. Voluptas delectus aspernatur accusantium. Labore quod dolores reprehenderit nulla ut nesciunt consequatur.', 3739649.1, '1984-08-13 06:39:32'),
(63, 4, 'exercitationem', 'Qui nam sapiente enim vero a porro laborum. Culpa ducimus eius iusto recusandae sed non autem. Nulla quidem quo dolores qui in quia inventore. Pariatur qui officiis maiores eaque quibusdam non nam. At temporibus consequatur et tempore asperiores ipsum saepe.', 66345.149099, '1985-10-14 11:30:53'),
(64, 10, 'blanditiis', 'Dolores et mollitia illum nemo non reiciendis consequatur. Qui mollitia odit ad earum quae ut quisquam. Saepe illo est dicta nemo rem tempora. Quasi dolore eius eos dolor. Autem et at quis.', 2593641.5970895, '2017-06-07 06:13:27'),
(65, 8, 'ut', 'Qui et eos possimus dolore perferendis. Neque placeat et ipsum fugit placeat corporis doloremque. Labore ipsam aspernatur quas dolor libero labore quisquam.', 451171790.78648, '2010-10-29 19:35:18'),
(66, 8, 'repellendus', 'Odio non quis repudiandae et modi nemo expedita. Dicta modi ducimus mollitia minus soluta sit iste. Qui quia rerum vel. Officia non ut et modi est. Modi iusto quibusdam ab pariatur.', 2084067.19, '2010-12-25 17:52:42'),
(67, 3, 'ut', 'Tempora quibusdam est aspernatur omnis ut sed ea. Repellat atque voluptatem nihil est. Nostrum aliquam animi quas quo est.', 659088.825872, '2012-01-19 11:30:45'),
(69, 4, 'dolor', 'Optio velit pariatur eius dolores. Occaecati quaerat ut consequatur. Hic ex nesciunt nulla commodi. Omnis et est odio eius hic pariatur placeat.', 1366.3, '1983-01-02 22:26:12'),
(70, 9, 'nihil', 'Eaque impedit ipsam dolor quae. Suscipit delectus veniam ut reiciendis. Quibusdam sint ut a omnis commodi aliquam.', 33110347.618552, '2002-07-30 07:39:04'),
(71, 2, 'error', 'Cum enim et eum illum et magnam libero vero. At necessitatibus unde rerum totam dolore quo. Sapiente qui rerum tempore totam et.', 0, '2015-05-22 11:20:51'),
(72, 5, 'inventore', 'Aut veniam qui quisquam error at. Fugit voluptatem et perferendis libero quod. Libero magni optio officiis aperiam necessitatibus sint qui. Sapiente non assumenda aliquid quis voluptas omnis in.', 1347533.1481726, '2016-02-25 06:38:04'),
(74, 10, 'est', 'Et distinctio sit porro. Sed soluta dicta iure aut qui ut et voluptatem. Consectetur fugiat libero omnis exercitationem dolorem commodi quia. Rerum voluptatem distinctio maxime.', 13605911.838, '2011-08-22 20:23:02'),
(75, 2, 'veritatis', 'Excepturi sed atque atque iusto quaerat dolores deleniti. Laboriosam velit consequuntur voluptas ipsam. Sit quod reprehenderit architecto eum.', 23093525.001815, '2003-05-26 18:43:44'),
(76, 8, 'sequi', 'Sint non eaque ad ipsam voluptatem. Quisquam aspernatur quae quam qui inventore. Tempora et ratione voluptas. Voluptate id sed natus harum quae vitae.', 86.544502, '1982-06-17 03:50:13'),
(77, 4, 'voluptatibus', 'Dolor rerum iure non facilis voluptatem sed deserunt. Veniam tenetur necessitatibus consequuntur consectetur. Deleniti labore saepe unde et et.', 2314.559, '1973-02-04 02:53:01'),
(78, 3, 'dicta', 'Aperiam magnam modi rerum blanditiis porro. Fugit ut autem rerum. Dolores ea nulla exercitationem aut qui nesciunt quasi sed. Ea in est eos quisquam.', 24.72340181, '2013-04-01 05:16:28'),
(80, 2, 'reiciendis', 'Sed et voluptatem minima sint ut quaerat itaque. Reprehenderit ea occaecati inventore eos sequi sed est. Ut ut consequatur nisi reprehenderit. Et dolor est est voluptates quisquam eaque recusandae.', 4670682.1, '2009-11-08 10:34:43'),
(81, 3, 'rerum', 'Voluptatum sunt recusandae corporis corporis in. Omnis doloribus velit quos architecto voluptate. Eum reiciendis ipsam aliquam et.', 0, '2005-05-29 00:08:59'),
(82, 2, 'perferendis', 'Rem et rerum aut id ex non quo nostrum. Voluptatem unde quis pariatur odio. Distinctio exercitationem quas aliquid delectus libero quia. Ut quaerat ea occaecati id cupiditate explicabo.', 41625.705705181, '1970-10-23 23:31:56'),
(83, 9, 'voluptas', 'Soluta quisquam amet ea nulla. Voluptatem exercitationem ipsam fuga corrupti doloremque quasi. Assumenda rerum sit dolor qui voluptas molestiae id.', 2.49763917, '1998-08-08 22:52:28'),
(84, 4, 'tempore', 'Sint consectetur debitis ea a veniam iure mollitia. Voluptatem eos tempore blanditiis nesciunt quaerat sint ut ut. Non minima quia nihil non eos. Libero vel ut molestiae sit ipsum accusamus corporis.', 197978.87668134, '1986-06-21 00:27:34'),
(85, 10, 'temporibus', 'Soluta molestiae quo odit qui consequatur veniam ea ipsam. Tempora fugit ut dolorem sed corrupti quod. Eveniet et et esse non aliquid voluptate.', 273153184.15349, '1989-02-13 03:48:49'),
(87, 3, 'vel', 'Et eius eaque pariatur voluptates molestias. Dolorum voluptas molestias blanditiis ratione. Doloribus libero praesentium dolore aut neque aut accusamus pariatur.', 3397.629865509, '2007-03-26 05:55:08'),
(88, 4, 'suscipit', 'Voluptatem minima earum quam cumque deleniti necessitatibus debitis. Et aut facere adipisci. Voluptatem sint officia pariatur est perferendis. Enim vero quis est ut autem.', 330446.5406, '1971-02-25 20:28:48'),
(89, 4, 'itaque', 'Et accusantium harum magnam iusto. Necessitatibus iusto aut quae. Quas nostrum quo dolore dolorem quae et. Est consequatur est quis id aut delectus eos. Corrupti quia et repudiandae numquam.', 5737550.6483235, '2000-11-25 00:50:40'),
(90, 9, 'esse', 'Est autem odio explicabo dolorem nihil. Accusamus quis assumenda qui ipsum soluta.', 467822.375, '1991-03-11 04:04:30'),
(92, 9, 'et', 'Inventore culpa minima similique quaerat omnis. Voluptatem rem non est exercitationem in. Vel consequatur sequi ut doloribus ut praesentium et optio.', 2099142.2875781, '1977-04-26 20:14:35'),
(93, 6, 'minima', 'Fugiat iure dolorem repudiandae odio. Magnam perferendis harum est et corporis harum voluptatibus. Sit culpa ipsa blanditiis et et sint autem. Eum sequi provident non et. Quaerat qui sit excepturi tenetur quos.', 4843.259008, '1985-12-23 06:47:34'),
(94, 10, 'consequatur', 'Sint ullam ullam et recusandae. Cumque quo eos vero nihil. Reprehenderit et consequatur temporibus suscipit quis rerum est.', 2670589.92488, '2002-09-12 13:34:17'),
(95, 2, 'repellendus', 'Omnis esse possimus tenetur eligendi at qui unde dignissimos. Aut minus nesciunt omnis modi quia et suscipit.', 603.0294, '1972-09-18 07:10:49'),
(96, 3, 'sed', 'Tempora ipsam iure eius perferendis. Eum ea et pariatur impedit dolores. Qui et asperiores quaerat saepe voluptatibus quod facilis. Quibusdam ut aspernatur corporis non. Doloremque quisquam minus voluptatum accusantium.', 0, '2004-06-09 16:10:24'),
(97, 9, 'quis', 'Adipisci inventore omnis neque ad ut. Officia perspiciatis vero vero odit autem voluptatem. Iure distinctio animi eum accusamus voluptatem iusto dignissimos.', 5149167.7724803, '2003-05-29 04:39:33'),
(98, 5, 'et', 'Adipisci officiis quaerat facere aut placeat omnis. Nulla assumenda sed error voluptate.', 180741.641873, '1996-05-19 08:18:33'),
(99, 9, 'animi', 'Nobis quia in quam facere nisi tempore. Voluptas earum dignissimos et quo. Tempora dolore sunt ut iste amet qui.', 28707290.147161, '1983-03-22 10:12:29'),
(100, 5, 'repellendus', 'Voluptate quidem sit praesentium necessitatibus voluptatem totam perspiciatis est. Voluptas in est assumenda consectetur.', 29383.83, '1980-05-04 10:28:10'),
(101, 3, 'asd', 'dasd', 22, '2019-03-22 23:49:07'),
(102, 4, 'test', 'asdas', 22, '2019-03-22 23:49:55'),
(103, 2, 'as', 'This is a description', 12, '2019-03-23 10:45:42'),
(104, 1, 'dignissimos', 'Rerum voluptas dolores rerum et suscipit commodi accusamus. Sed quod et odio animi repudiandae voluptate eos. Possimus totam ea doloremque nisi odio. Cupiditate eligendi et quae ut.', 22.22, '2019-03-23 11:39:27'),
(105, 1, 'dignissimos', 'Rerum voluptas dolores rerum et suscipit commodi accusamus. Sed quod et odio animi repudiandae voluptate eos. Possimus totam ea doloremque nisi odio. Cupiditate eligendi et quae ut.', 22.22, '2019-03-23 11:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `user_id`, `item_id`) VALUES
(1, 45, 51),
(2, 45, 42),
(3, 1, 1),
(5, 1, 2),
(6, 5, 1),
(8, 5, 2),
(9, 5, 1),
(11, 5, 2),
(12, 5, 3),
(13, 5, 6),
(14, 5, 3),
(15, 5, 6),
(16, 5, 14),
(17, 1, 22),
(18, 1, 39),
(19, 50, 8),
(20, 50, 3),
(22, 50, 10),
(23, 50, 23),
(24, 50, 21),
(25, 51, 39),
(26, 51, 29),
(27, 51, 28),
(28, 51, 8),
(29, 51, 29),
(30, 50, 2),
(31, 50, 24),
(32, 50, 13),
(33, 50, 2),
(34, 50, 23),
(35, 50, 40),
(36, 50, 28),
(37, 50, 83);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `is_active`) VALUES
(1, 'Luna', 'delectus', 'braden08@example.org', 'theo.ryan', '9b3f62b3d64822d88eab8aa5460ff9bcd5bd20d9', '1973-01-09 10:23:33', 1),
(2, 'Jamarcus', 'nihil', 'heber34@example.net', 'verdie61', 'a39fd87696c12248f2c8680cc14f3030a65ba901', '1994-08-12 06:45:18', 1),
(3, 'Eulah', 'neque', 'mkreiger@example.org', 'cleta13', 'c65324d4805d8fa8a6241c65a40f76282248aa39', '1975-07-29 14:48:34', 0),
(4, 'Duncan', 'quas', 'willa.bauch@example.org', 'raphaelle28', '8bc4e67966e23aa4baaca2cfb55afccb52ab982c', '2018-02-14 11:22:50', 0),
(5, 'Astrid', 'delectus', 'tdach@example.org', 'pkutch', '685ad1d156f1402834dbd2f2cc7a5c0f7d749464', '1974-08-05 16:43:21', 0),
(6, 'Ali', 'sit', 'nicola.brekke@example.net', 'darien01', '1fc71a6b18751850a03018c5ab63f74dad743370', '1978-03-03 04:36:43', 1),
(7, 'Gisselle', 'vel', 'gskiles@example.net', 'buckridge.kira', '8c506c87a7d991d622e6802ec63cda7fd640b4b9', '2001-10-05 19:52:17', 0),
(8, 'Tate', 'praesentium', 'ogerhold@example.org', 'obeahan', '570eefefc19266895b4f809db03d33aab591f713', '2002-08-29 03:30:27', 0),
(9, 'Serena', 'mollitia', 'alana41@example.net', 'tcole', '3d36fa89cd6a945468aa14b11f21e82039635411', '2016-01-07 08:11:47', 0),
(10, 'Pascale', 'iure', 'schmitt.odell@example.net', 'mccullough.chelsie', 'c7e34a5e41d4359a11a79cab905ebd49ca2f07bf', '1985-04-14 10:02:27', 0),
(11, 'Telly', 'provident', 'kurtis.kshlerin@example.org', 'meghan.hilll', '761c37c69ce71d02d82c0e33f1f140d9f2f93e98', '2003-10-03 04:16:01', 0),
(12, 'Breana', 'ipsum', 'aheathcote@example.com', 'justus57', '9c39b9acbea2e7ded48ca51fe5c8fb239025f585', '2016-07-23 12:12:14', 0),
(13, 'Travis', 'in', 'luciano91@example.org', 'eveline86', '0d9394bbb578ed586ef17c1e4581b73753d616e7', '1992-10-03 02:52:40', 0),
(14, 'Benny', 'quis', 'zackery.bechtelar@example.org', 'ebert.elsie', 'b7ae9e35a4be058ccb9f6c3a63b02675016a23b5', '1972-10-29 13:54:54', 1),
(15, 'Adolph', 'molestiae', 'mbahringer@example.net', 'kschumm', 'd0c3c5cca8abdeb35d376b6c5f907d59b252c290', '1979-10-31 13:36:16', 1),
(16, 'Anastasia', 'corporis', 'durgan.keely@example.com', 'daron49', '27ce7491022847c7010146250c7373c29438c8af', '1983-11-18 15:42:40', 1),
(17, 'Willis', 'soluta', 'caroline42@example.org', 'chills', '7728537341fd28004c4815887ec354cb08dd97fd', '2002-01-22 09:16:47', 0),
(18, 'Amelia', 'perferendis', 'simeon.lynch@example.org', 'keegan68', '0971628a33780b26a44cc5e2f6a304ec6db8da54', '1972-11-28 21:34:29', 1),
(19, 'Garry', 'sed', 'qmurazik@example.com', 'isom70', '5db0cf08e6f9f9aa95af779055012f2b9e4c4141', '1982-03-07 03:05:18', 0),
(20, 'Brooks', 'dolor', 'deontae.schimmel@example.net', 'ygleason', '1342dbc48de3554b090227ad23a1ae883b590ecd', '2011-02-23 21:46:47', 0),
(21, 'Rachael', 'porro', 'goyette.brain@example.net', 'ztoy', 'bcf100bdb88e971e8d760cf0a2c1be5b80af2221', '1978-11-19 23:08:39', 0),
(22, 'Alexzander', 'rerum', 'iheaney@example.net', 'ruecker.timothy', 'bc95ada90972f190d3005b92aa8fa2212542c377', '2008-02-04 09:51:35', 0),
(23, 'Alicia', 'optio', 'ashtyn.gutkowski@example.org', 'opacocha', '646adcc744622145f6967b3cc94b418053fcb6cf', '2012-11-18 05:12:35', 1),
(24, 'Dion', 'voluptas', 'keon53@example.net', 'hessel.earnestine', '3c350f43392db41336476a54540f2cf84e102626', '2006-03-11 03:52:41', 1),
(25, 'Myrtle', 'eligendi', 'uweber@example.net', 'rico.renner', '5186fbcc4c2b86740ed1a0a37caf7318324af179', '1986-01-27 13:25:07', 0),
(26, 'Willow', 'quo', 'schmeler.carleton@example.net', 'esther.brekke', 'b60e0b18d76a0f210bb86e6a245a11d8c9cd201a', '1990-09-24 01:17:49', 0),
(27, 'Marianna', 'impedit', 'considine.orval@example.com', 'vcole', 'dccb4f8d5b7b1a23411c595289f3f8d60234b19d', '1997-08-13 10:40:29', 0),
(28, 'Jacynthe', 'voluptatem', 'luisa45@example.org', 'orland55', 'c94974da0740504c71e9c0b89ae001cf4c7b58e2', '2015-10-10 04:03:39', 0),
(29, 'Royal', 'est', 'hwhite@example.com', 'iklocko', '343c2c00320a2a6be0dcf7238c5e48966fc730e5', '1980-05-06 09:50:24', 1),
(30, 'Ruby', 'ad', 'marquardt.fannie@example.org', 'nicole.grant', '72195caedca4ade00eae3aba784d780a1ff4e08f', '1996-03-19 00:27:37', 1),
(31, 'Hanna', 'alias', 'ruth19@example.com', 'nia.medhurst', '14e4fe1c6f421adcc04268d3f644617755b096a2', '2004-02-08 04:19:27', 1),
(32, 'Tara', 'voluptatem', 'grady.iva@example.com', 'nicholas57', 'c734529ee98815379456a1f3ec7ce18a1cb66e86', '1990-01-11 23:02:18', 0),
(33, 'Brian', 'reiciendis', 'billie.turner@example.org', 'abarton', 'f3a7208f4d8cb1d2c392d123fdfdd25df432e525', '1994-01-01 03:52:14', 1),
(34, 'Trent', 'ad', 'yleffler@example.com', 'michael43', '4cf45743d573d9dfde35bf2bc26b02296b3a657b', '1983-08-13 23:31:34', 0),
(35, 'Talia', 'magnam', 'auer.anna@example.net', 'tlittel', '29f677be7474043c7c5d022d57dab975b1992c9e', '1977-10-17 21:31:50', 1),
(36, 'Emelia', 'deserunt', 'senger.salvador@example.net', 'emard.maybell', '6a4f9f00c08122b8554452c02c3d31f6448d6927', '1995-12-20 17:26:54', 0),
(37, 'Kennedy', 'id', 'tony.harvey@example.net', 'brice', 'c599307830f3826e581dbc7d26adbdf406675117', '2019-01-13 09:34:23', 0),
(38, 'Clark', 'consectetur', 'ohauck@example.net', 'ebony33', '52cd1731d264759f3e66181db887c509b25b5b1e', '1994-11-28 03:52:13', 0),
(39, 'Lenna', 'ut', 'brenda.hodkiewicz@example.net', 'ycummerata', '370e210e794dde0f4c4d89e49452a1d8c6a82006', '1973-10-10 11:35:04', 1),
(40, 'Thelma', 'est', 'edythe.wunsch@example.net', 'adolf85', 'd80e251f9a188eec4698963ab23cbfd25ec6fe1f', '1986-07-21 21:51:33', 1),
(41, 'Maxwell', 'et', 'libbie.brown@example.net', 'samson51', '7501aa33d90acfb0f1c4866dccc43f90b8afbb42', '2011-05-25 08:38:49', 0),
(42, 'Ervin', 'cumque', 'georgianna44@example.com', 'toney.volkman', 'a3c9be8202cf08e701df8773dd12f28dd05ec34b', '1982-08-06 15:29:49', 1),
(43, 'Miracle', 'dolorum', 'damon.maggio@example.net', 'elsa.erdman', '9cdc24324bac8851ffff50cf61e62a34cfcd844c', '1982-02-20 15:06:31', 1),
(44, 'Liza', 'aperiam', 'abshire.benny@example.com', 'turner.tromp', '15036b447b7ff1b7cf596a5a3108fb627e60e7d6', '1999-03-26 09:48:24', 0),
(45, 'Bruce', 'perferendis', 'neva.muller@example.org', 'jpollich', '77c1144b7277defee4d94288e0b3fc2fd1085c8f', '1978-03-17 12:35:36', 0),
(46, 'Gwendolyn', 'quos', 'mraz.jamison@example.com', 'ena11', 'a6093cad62700e4dfa1ae6f86820105aa7851ec0', '1979-03-06 18:12:19', 1),
(47, 'Nola', 'dicta', 'boyd01@example.net', 'zswift', 'a0e6780cbbb0b7d512a8d892fe2cee8b4a40c0fb', '2013-05-09 02:15:28', 1),
(48, 'Donnie', 'illum', 'ramiro.jakubowski@example.org', 'champlin.tyrell', 'e375aae9890e0c78c7596eb6cc50690ba2470eb3', '1976-12-22 02:47:17', 1),
(49, 'April', 'voluptatem', 'fcruickshank@example.net', 'ndietrich', 'da01a92406d9e7b6e88bbbec3f2ac5cfa3a8b456', '1981-05-08 05:05:38', 0),
(50, 'Luka', 'Patarcic', 'patarcic98@gmail.com', 'Luka', '$2y$10$ZFM5Dg1heYU1cG53.uVtmefw8zj6QjE0T84Zmq1K1UiPceq49rYgG', '2019-03-21 09:04:02', 0),
(51, 'Luka', 'Patarcic', 'patarcic@gmail.com', 'mama', '$2y$10$5MQDE712HlX.UCaV.S5H5OJiW.FNG0brDb06aeY4QI9.rzfH3OVvy', '2019-03-21 21:34:51', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_item_purchase_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_purchase_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
