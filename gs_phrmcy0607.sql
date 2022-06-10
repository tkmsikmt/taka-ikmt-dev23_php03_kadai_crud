-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 10 日 12:36
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_phrmcy0607`
--

CREATE TABLE `gs_phrmcy0607` (
  `id` int(64) NOT NULL,
  `patient_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `seibetsu` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `store_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `stock` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `waiting_time` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tele` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `memo` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_phrmcy0607`
--

INSERT INTO `gs_phrmcy0607` (`id`, `patient_name`, `seibetsu`, `store_name`, `stock`, `waiting_time`, `pic`, `email`, `tele`, `memo`, `date`) VALUES
(1, '鈴木淳', 'm', 'アイン', '無し', '40', '山田', 'takamasa.ikemoto@gmail.com', '08012132100', '            \r\n                 再確認\r\n            ', '2022-06-09 21:10:43'),
(3, 'サトシ伊藤更新', 'w', 'アイン', '有り', '30', '山田更新', 'takamasa.ikemoto@gmail.com更新', '08012132100更新', '            \r\n               更新。\r\n            ', '2022-06-09 20:57:17'),
(5, 'イケモトyukiko', 'w', 'クオール', '有り', '40', '山田', 'test5@test.jpnew', '08012132100', '      トライ\r\n            ', '2022-06-09 21:07:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_phrmcy0607`
--
ALTER TABLE `gs_phrmcy0607`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_phrmcy0607`
--
ALTER TABLE `gs_phrmcy0607`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
