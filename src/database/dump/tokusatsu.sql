-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28-Dez-2022 às 11:13
-- Versão do servidor: 8.0.31-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tokusatsu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Sentai', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_14_134624_create_series_table', 1),
(6, '2022_12_16_225334_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `duration` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `name`, `plot`, `image`, `opening_video`, `year`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Himitsu Sentai Gorenger', 'When world peace is threatened by the emergence of a terrorist group called the Black Cross Army, EAGLE (The Earth Guard League[3]) is formed to combat the threat. The Black Cross Army sends five operatives to destroy each EAGLE branch in Japan, killing all except for five agents. These surviving agents are summoned to a secret base located underneath the snack shop \"Gon\", where they are recruited by EAGLE Japan`s commander, Gonpachi Edogawa. They become the Himitsu Sentai Gorengers and are given electronic battlesuits that endow them with superhuman strength and speed. The five dedicate themselves to stopping the Black Cross Army and its leader, the Black Cross Führer.', 'https://static.tvtropes.org/pmwiki/pub/images/690e456f_33d0_4c79_bbeb_9d9c53fa0db5.jpeg', 'https://www.youtube.com/watch?v=gbuEg2v9Arg&t=1s', 1975, 20, NULL, NULL),
(2, 'J.A.K.Q. Dengekitai', 'Iron Claw is the leader of a global criminal empire known as \"Crime\". Crime has a network of wealthy, influential sympathizers and employs an army of faceless, leather-masked thugs and cyborg assassins. It seeks to become the most powerful mafia organization in the world.\n\nTo combat the threat of Crime, ISSIS, the International Science Special Investigation Squad, is formed. The focus of the series is ISSIS\'s battles against Crime in Tokyo and Japan.\n\nTokyo\'s ISSIS branch commander, Daisuke Kujirai, proposes a radical experiment. Taking the code name \"Joker\", he recruits four young test subjects to undergo his cyborg enhancement project: Goro Sakurai, a multi-talented athlete and Olympic Gold medalist; Ryu Higashi, a disgraced boxing champion; Karen Mizuki, a policewoman who has been critically injured; and Bunta Daichi, an oceanographer who is clinically dead and is being cryogenically sustained. All four are surgically altered and given various bionic enhancements as well as energy manipulation powers. They are given the code name J.A.K.Q. Dengekitai, or J.A.K.Q (pronounced \"Jacker\"), and the mission to destroy Crime. Later in the series Joker leaves to head ISSIS\'s advanced engineering branch, and Sokichi Banba, a master of disguise and a cyborg, becomes their new boss, known as Big One.\n\n', 'https://m.media-amazon.com/images/M/MV5BZjU2YTI0ZmItMmJlNC00MGJmLWI5MGYtMWY5MWRhYWY4OTE3XkEyXkFqcGdeQXVyNDA5ODU0NDg@._V1_.jpg', 'https://www.youtube.com/watch?v=ko2HdTDCxk8', 1977, 20, '2022-12-28 16:03:18', '2022-12-28 16:03:18'),
(3, 'Battle Fever J', 'General Kurama assembles four young agents who had been dispatched around the world for training. They are joined by FBI investigator Diane Martin, whose father was murdered by Egos. The five don powered suits to become the Battle Fever team. The Battle Fever team\'s trump card is the Battle Fever Robo. Egos tries to stop the construction of the Robot, but the monsters they send to perform this task are defeated one by one by the Fever team. Egos then unleashes the \"younger brother\" of the Buffalo Monster, a giant robot replica of its \"older brother\". The Robot, fortunately, is finished in time. Aboard it, the Fever team defeats the Buffalo Monster and its successors. The Fever team never stops, even when it lost two of its members (the original Miss America and Battle Cossack). With new members, the team defeats Hedder, now the Hedder Monster, and breaks into Egos\' headquarters, where they are fed into the Egos Monster Making Machine so that they may be used as material for a Battle Fever Monster. The team destroys the machine and slays the mysterious deity Satan Egos himself with the Lightning Sword Rocketter sword-throwing move.', 'https://3.bp.blogspot.com/-xNeuaA93J7U/XjyE8wpthqI/AAAAAAAAAHE/4cD5qDchJtgHz15UJ-BeZxhALpVn2LreQCLcBGAsYHQ/s1600/1979%2B-%2BBattle%2BFever%2BJ.jpg', 'https://www.youtube.com/watch?v=28vl-s7L1uE', 1979, 20, '2022-12-28 16:11:07', '2022-12-28 16:11:07'),
(4, 'Denshi Sentai Denjiman', '3,000 years ago, the Vader Clan, led by Queen Hedrian, devastated the planet Denji. Denji Land, an island from Denji, landed on Earth. In modern times, the computer of Denji Land awoke the Denji Dog IC when it detected the Vader Clan approaching Earth. IC found five young people (who may or may not be descendants of the Denji people) to become the Denjiman in order to defend Earth, the Vader Clan\'s next target.', 'https://i.pinimg.com/564x/22/db/9d/22db9d1bf76e50faebd35f641fedd243.jpg', 'https://www.youtube.com/watch?v=7Bsj5DaxQsA', 1980, 20, '2022-12-28 16:13:02', '2022-12-28 16:13:02'),
(5, 'Taiyo Sentai Sun Vulcan', 'The threat of the Machine Empire Black Magma causes the United Nations to establish the Solar Sentai at a summit. From the UN\'s Guardians of World Peace\'s (GWP) air force, navy, and rangers, Commander Arashiyama assembles three specialists to become Sun Vulcan. When Black Magma learns of this, he attacks the GWP\'s base, but Sun Vulcan debuts in time to save it. Hell Saturn prays to the Black Solar God and is rewarded with a revived Queen Hedrian, now a cyborg with a mechanical heart and a metallic afro. Black Magma multiple plots, even with Hedrian\'s aid, fails. Following the death of 01, Amazon Killer, (a Vader) arrives from space, destroying the Sun Vulcan Base. A new Vulcan Base is then built.\n\nThe original Vul Eagle, Ryusuke Ohwashi, is replaced by a friend and master of the sword, Takayuki Hiba (who first appeared in episode 23).', 'https://cdn.shopify.com/s/files/1/1615/2845/products/resize_image_d1da1799-3fee-4a60-9701-3e073c74bbb8_500x.jpg?v=1648616108', 'https://www.youtube.com/watch?v=7BPFUWRswBw&t=3s', 1981, 20, '2022-12-28 16:19:16', '2022-12-28 16:19:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'fdfreekazoid@gmail.com', '2022-12-22 21:33:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UfjywqUtN4N699BxrTYwymTIWvJo2cyOXnhbZyR8JW9mgqPZgSzQrtYRbRpQ', '2022-12-22 21:33:48', '2022-12-22 21:33:48');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
