-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2025 pada 00.40
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goobnote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contents`
--

INSERT INTO `contents` (`id`, `judul`, `content`, `author_id`, `created_at`) VALUES
(6, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, '2024-11-19 13:57:56'),
(7, 'Why do we use?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).                ', 3, '2024-11-19 14:03:35'),
(11, 'The Worst Programmer I Have Ever Worked With', 'Because of the time I’ve been suffering from him, because he’s an egomaniac, a pest, an obsessive, with clear self-esteem problems (and is overweight) and slightly narcissistic (as well as being a heavy smoker and leaving a detestable smell of tobacco wherever he goes), the worst programmer I’ve ever worked with is myself.\r\n\r\nWhen I find a flaw in his code from five years ago, I have a real murderous urge. Apart from me, the second position in my hate ranking is very (but very) disputed.\r\n\r\nPeople you ask to do A while you do B, and they do B.\r\nPeople with whom you establish (in writing, in documentation, and by mail) a working interface, and they do what they want.\r\nPeople who don’t give a damn about planning and deadlines.\r\nPeople who don’t test what they do.\r\nPeople who don’t compile before uploading to the server.\r\nPeople who ask for necessary changes in the pull request (basically because it doesn’t even compile) and they don’t give a damn about making them because “it’s too complicated.”\r\nPeople who create 500-line functions to find out the distance in days between two dates (epic and no…\r\n', 3, '2024-11-19 15:14:06'),
(17, 'Dear IT Departments, Please Stop Trying To Build Your Own RAG', '            Look:\r\n\r\nYou would never ever in a million years build your own CRM system or custom CMS — or in most cases, your own LLM.\r\n\r\nWould you?\r\n\r\nAnd yet, everywhere I look, I see IT departments convincing themselves that building their own RAG-based chat is somehow different. It’s not. It’s actually worse.\r\n\r\nImage Credit : Alden Do Rosario\r\nLet me paint you a picture: Last week, I watched a team of brilliant engineers demo their shiny new RAG pipeline. All built in-house. They were proud. They were excited. They had vector embeddings! They had prompt engineering! They had… no idea what was coming.\r\n\r\nAnd trust me, I’ve seen this movie before. Multiple times. It always ends the same way: with burned-out engineers, blown budgets, and a CTO wondering why they didn’t just buy a solution in the first place.\r\n\r\nThe “It Looks Simple” Trap\r\nI get it. Really, I do. You look at RAG and think:\r\n\r\n“Vector DB + LLM = Done!”\r\n\r\nThrow in some open source tools, maybe some Langchain (oh, we’ll get to that), and you’re good to go, right?\r\n\r\nWrong. So, so wrong.\r\n\r\nLet me tell you about a mid-market company I talked to recently. Their “simple” RAG project started in January. By March, they had:\r\n1 full-time engineer debugging hallucinations and accuracy problems.\r\n1 full-time data guy dealing with ETL and ingestion problems.\r\n1 full-time DevOps engineer fighting with scalability and infrastructure issues.\r\n1 very unhappy CTO looking at a budget that had tripled.\r\nAnd that’s not even the worst part. The worst part was watching them slowly realize that what looked like a two-month project was actually going to become an ongoing nightmare.\r\n\r\n      1. satu\r\n      2. dua\r\n      3. 3\r\naaaaaaaaaaaaaaaaaaaaa UIIIAAAIIUUUIIIAAA AAA UUU III AAA II UUU II AAA U III AAA II U U II AAAA\r\n\r\n\r\n        ', 2, '2024-11-23 07:11:37'),
(31, 'lapar', 'lapar123 lapaaar        ', 19, '2025-01-05 09:38:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin@spiral.com', 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'Admin', 'admin'),
(2, 'shindo@gmail.com', 'shin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Shin', 'author'),
(3, 'rina@gmail.com', 'rina', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Karina', 'author'),
(10, 'rusdi@gmail.com', 'rusdi', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'rusdian sanjaya', 'author'),
(11, 'bambang@gmail.com', 'bambang', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Surambang Law', 'author'),
(12, 'sugeng@gmail.com', 'sugeng budi', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'sugeng', 'author'),
(13, 'heri@ajdwian.com', 'heri', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'herianj', 'author'),
(17, 'samuel.bremanta@google.com', 'samuel12', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Samuel', 'author'),
(18, 'shino@gog.com', 'shin12', '85090efc271006cd575972b33229a21888c7f0e4fe309d806c8192ca3198b60f', 'shinohara', 'author'),
(19, 'rin@rinsa.com', 'rin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'rin', 'author');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
