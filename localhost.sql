-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 8 月 21 日 08:15
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `jisaku`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `music`
--

CREATE TABLE `music` (
  `music_ID` int(11) NOT NULL,
  `music_name` text NOT NULL,
  `yen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `music`
--

INSERT INTO `music` (`music_ID`, `music_name`, `yen`) VALUES
(1, '虚言Neurose', 250),
(2, '不可逆リプレイス', 250),
(3, 'reviver', 250),
(4, 'missing you', 250),
(5, '「花」-0714-', 250),
(6, 'home', 250),
(7, '君のいない夜を越えて', 250),
(8, 'with you', 250),
(9, 'winner', 250),
(10, 'accident', 250);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1：管理者 0：一般'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'kudo', 'iii', 1),
(2, 'sato', 'sss', 0),
(3, 'takahasi', 'ttt', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users_music`
--

CREATE TABLE `users_music` (
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_ID`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_music`
--
ALTER TABLE `users_music`
  ADD PRIMARY KEY (`user_id`,`music_id`,`created`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `music`
--
ALTER TABLE `music`
  MODIFY `music_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
