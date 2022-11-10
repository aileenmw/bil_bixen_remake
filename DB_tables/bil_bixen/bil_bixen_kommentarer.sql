-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 09:42 AM
-- Server version: 5.7.40-0ubuntu0.18.04.1
-- PHP Version: 7.0.33-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xai01_wi2_sde_dk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bil_bixen_kommentarer`
--

CREATE TABLE `bil_bixen_kommentarer` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `biler_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_bixen_kommentarer`
--

INSERT INTO `bil_bixen_kommentarer` (`id`, `message`, `name`, `email`, `time`, `biler_id`, `status`) VALUES
(2, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'May Flower', 'may@flower.com', '2017-10-24 10:35:31', 15, 2),
(5, 'There are three kinds of people in the world. People who make things happen. People who watch things happen and people who say “What happened?”', 'Bil Bent', 'bent@bil.dk', '2017-10-24 10:51:55', 3, 2),
(6, 'She was my so called \"best friend\". I stared at her long, silky hair, and wished she was mine. But she didn\'t notice me like that, and I knew it. After class, she walked up to me and asked me for the notes she had missed the day before and handed them to her. She said \"thanks\" and gave me a kiss on the cheek. I wanted to tell her, I want her to know that I don\'t want to be just friends, I love her but I\'m just too shy, and I don\'t know why.', 'manja kanja', 'dfbh@asd.asd', '2017-10-24 10:52:56', 3, 2),
(7, 'She asked me to come over because she didn\'t want to be alone, so I did. As I sat next to her on the sofa, I stared at her soft eyes, wishing she was mine. After 2 hours, one Drew Barrymore movie, and three bags of chips, she decided to go to sleep. She looked at me, said \"thanks\" and gave me a kiss on the cheek. I want to tell her, I want her to know that I don\'t want to be just friends, I love her but I\'m just too shy, and I don\'t know why. ', 'Karl Marx', 'foren@jer.su', '2017-10-24 10:51:55', 3, 2),
(8, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Albert Camus', 'exi@stens.fr', '2017-10-24 10:35:31', 3, 2),
(9, 'I stared at her as she smiled at me and stared at me with her crystal eyes. I want her to be mine, but she isn\'t think of me like that, and I know it. Then she said \"I had the best time, thanks!\" and gave me a kiss on the cheek. I want to tell her, I want her to know that I don\'t want to be just friends, I love her but I\'m just too shy, and I don\'t know why. ', ' Albert Einstein', 'rela@tiv.de', '2017-10-24 10:51:55', 3, 2),
(10, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Mahatma Gandhi', 'mahatma@gandhi.com', '2017-10-24 10:35:31', 3, 2),
(11, ' I watched as her perfect body floated like an angel up on stage to get her diploma. I wanted her to be mine, but she didn\'t notice me like that, and I knew it. Before everyone went home, she came to me in her smock and hat, and cried as I hugged her. Then she lifted her head from my shoulder and said, \"you\'re my best friend, thanks\" and gave me a kiss on the cheek. I want to tell her, I want her to know that I don\'t want to be just friends, I love her but I\'m just too shy, and I don\'t know why.', 'Oscar Wilde', 'oscar@wilde.com', '2017-10-24 10:51:55', 3, 2),
(12, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Ekko Lod', 'ekko@lod.dk', '2017-10-24 10:35:31', 10, 2),
(13, 'A Few Years Later \r\nNow I sit in the pews of the church. That girl is getting married now. I watched her say \"I do\" and drive off to her new life, married to another man. I wanted her to be mine, but she didn\'t see me like that, and I knew it. But before she drove away, she came to me and said \"you came!\". She said \"thanks\" and kissed me on the cheek. I want to tell her, I want her to know that I don\'t want to be just friends, I love her but I\'m just too shy, and I don\'t know why.', 'Brian Mikkelsen', 'brian@brian.dum', '2017-10-24 10:51:55', 10, 2),
(14, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Karl Marx', 'foren@jer.com', '2017-10-24 10:35:31', 1, 2),
(15, 'Years passed, I looked down at the coffin of a girl who used to be my \"best friend\". At the service, they read a diary entry she had wrote in her high school years. This is what it read: I stare at him wishing he was mine, but he doesn\'t notice me like that, and I know it. I want to tell him, I want him to know that I don\'t want to be just friends, I love him but I\'m just too shy, and I don\'t know why. I wish he would tell me he loved me! `I wish I did too...` I thought to my self, and I cried.', 'Karl Marx', 'foren@jer.su', '2017-10-24 10:51:55', 1, 2),
(16, 'Toto, I\'ve a feeling we\'re not in Kansas anymore.', 'Elias Kammerat', 'el@ias.dk', '2017-10-24 10:51:55', 2, 2),
(17, 'Of all the gin joints in all the towns in all the world, she walks into mine.', 'Ulla Slukker', 'sluk@brand.ild', '2017-10-24 10:51:55', 24, 2),
(18, 'The first rule of Fight Club is: You do not talk about Fight Club.', 'Old McDonald', 'old@donald.mac', '2017-10-24 10:51:55', 16, 2),
(19, 'One of the most misquoted lines in movie history, right up there with \"Play it again, Sam.\" The real line has no \"Luke\" in it.', 'Bugs Bunny', 'bugs@bunny.com', '2017-10-24 10:51:55', 4, 2),
(20, 'Mandy Patinkin has said that this line — by far the most famous he\'s ever uttered —  gets repeated back to him by fans at least two or three times a day. ', 'Bob Dee Lane', 'bobby.d@gmail.com', '2017-10-24 10:51:55', 34, 2),
(21, 'Hello. My name is Inigo Montoya. You killed my father. Prepare to die.', 'Mommy Daddy', 'daddy@mommy.com', '2017-10-24 10:51:55', 47, 2),
(22, 'Heath Ledger\'s brilliantly twisted delivery may account for why this line finished No. 1 among 20- to 29-year-old voters.', 'Bent Bil', 'bent@bil.dk', '2017-10-24 10:51:55', 16, 2),
(23, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Bodil Traktor', 'bo@dil.dk', '2017-10-24 10:35:31', 4, 2),
(24, 'According to Billy Crystal, Meg Ryan was so self-conscious about faking an orgasm, director Rob Reiner faked \"an orgasm that King Kong would be jealous of\" to make her relax.', 'Aileen', 'aileenmw@gmail.com', '2017-10-24 10:51:55', 25, 2),
(25, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Hans', 'du@pin.com', '2017-10-24 10:35:31', 25, 2),
(26, 'The original draft of the screenplay ended with Claude Rains, not Bogart, saying \"This is the beginning of a beautiful friendship,\" and Bogart replying, \"Yes, but don\'t forget you still owe me 10,000 francs.\"', 'Bo', 'bo@bo.com', '2017-10-24 10:51:55', 25, 2),
(27, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Lulu Gordon', 'lu@lu.fr', '2017-10-24 10:35:31', 28, 2),
(28, 'This is the beginning of a beautiful friendship.', 'Panama', 'pa@na.ma', '2017-10-24 12:06:29', 26, 2),
(29, 'In an oral history for the Writers Guild, screenwriter Julius Epstein recalled, \"I wrote a note to [producer] Hal Wallis telling him how terrible [the script for Casablanca] was. He put it in a drawer. Thereafter, any time we had an argument about anything, he would open the drawer, pull out that note and hand it to [me] to read.\"', 'Piccolo', 'pi@co.lo', '2017-10-24 10:51:55', 26, 2),
(30, 'Ian Fleming named his superspy by looking for the most boring moniker he could find on his bookshelves — it turned out to be the author of a bird-watching guide. \"By God, [that] is the dullest name I\'ve ever heard,\" Fleming recalled of his eureka moment.', 'srtyutrewqrtasdfa', 'sf@sdfd.cd', '2017-10-24 10:51:55', 26, 2),
(31, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Franz', 'asd@asd.de', '2017-10-24 10:35:31', 41, 2),
(32, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Buble', 'de@de.de', '2017-10-24 10:35:31', 42, 2),
(33, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'asdasd', 'du@pin.com', '2017-10-24 10:35:31', 42, 2),
(34, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Dieter', 'de@de.de', '2017-10-24 10:35:31', 42, 2),
(35, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Dieter', 'de@de.de', '2017-10-24 10:35:31', 29, 2),
(42, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Kennedy', 'du@pin.com', '2017-10-24 10:35:31', 29, 1),
(48, 'Never put off till tomorrow what you can do the day after tomorrow.Never put off till tomorrow what you can do the day after tomorrow.', 'Manni Guitar', 'man@ni.de', '2017-10-24 10:35:31', 32, 2),
(52, 'Youth is waisted on the young!', 'Mahatma Mahatmanich', 'ma@ma.de', '2017-10-24 10:59:44', 40, 1),
(53, 'Gammel lorte skrotbunke!', 'Winnie The Pooh', 'win@nie.com', '2017-10-24 11:00:50', 40, 1),
(54, 'Ja, jeg køber den ikke!!', 'Ole', 'om@ar.ir', '2017-10-24 11:03:58', 40, 2),
(66, 'æpåæopæoåøo', 'Oscar Wilde', 'om@ar.ir', '2017-10-24 11:16:48', 40, 1),
(68, 'The hubris it must take to yank a soul out of non existence, into this, meat. And to force a life into this, thresher. Yeah so my daughter, she uh, she spared me the sin of being a father.\r\nØh!', 'Rust', 'true@detective', '2017-10-24 11:18:57', 40, 2),
(69, 'The hubris it must take to yank a soul out of non existence, into this, meat. And to force a life into this, thresher. Yeah so my daughter, she uh, she spared me the sin of being a father.\r\nØh!', 'Rust', 'true@detective', '2017-10-24 11:23:34', 40, 2),
(70, 'The hubris it must take to yank a soul out of non existence, into this, meat. And to force a life into this, thresher. Yeah so my daughter, she uh, she spared me the sin of being a father.\r\nØh!', 'Rust', 'true@detective', '2017-12-12 07:44:01', 40, 2),
(71, 'Fin lille gul bil. Den er cute! \r\n', 'Fracy', 'aileenmw@gmail.com', '2017-10-24 18:58:23', 73, 2),
(72, 'Den er godtnok spraglet, da!!', 'Me', 'me@me.dk', '2018-01-04 11:31:13', 27, 2),
(73, 'Den er godtnok spraglet, da!!', 'Me', 'me@me.dk', '2018-01-04 11:31:16', 27, 1),
(74, 'What will you do when you get lonely\r\nAnd nobody\'s waiting by your side?\r\nYou\'ve been running and hiding much too long\r\nYou know, it\'s just your foolish pride\r\n\r\nLayla, you got me on my knees\r\nLayla, I\'m begging darling, please\r\nLayla, darling, won\'t you ease my worried mind?', 'Layla', 'lay@la.com', '2018-01-04 22:11:15', 31, 2),
(89, 'Hvad er det for en underlig nummerplade?? Er bilen importeret eller stj?let? Hvis den er stj?let, giver jeg det halve af den opsl?ede pris.', 'Ninja Princesse', 'nin@ja.ja', '2018-01-06 14:03:08', 37, 2),
(92, 'Sådan når den - bum – tar\' bananer to og to. Ah abe, åh abe, gid man var lisom dig. Snoabe, snoabe, du har altid lov til leg. Der var engang en abe og den var rød og blå. Når den sku svinge sig fra gren til gren var bagpartiet sådan på den - bum åh så sjov og kikke på. ', 'Commy', 'com@my.com', '2018-01-06 14:01:06', 37, 1),
(93, 'Sådan når den - bum – tar\' bananer to og to. Ah abe, åh abe, gid man var lisom dig. Snoabe, snoabe, du har altid lov til leg. Der var engang en abe og den var rød og blå. Når den sku svinge sig fra gren til gren var bagpartiet sådan på den - bum åh så sjov og kikke på. ', 'Commy', 'com@my.com', '2018-01-06 14:02:51', 37, 1),
(94, 'Sådan når den - bum – tar\' bananer to og to. Ah abe, åh abe, gid man var lisom dig. Snoabe, snoabe, du har altid lov til leg. Der var engang en abe og den var rød og blå. Når den sku svinge sig fra gren til gren var bagpartiet sådan på den - bum åh så sjov og kikke på. ', 'Commy', 'com@my.com', '2018-01-06 14:03:16', 37, 1),
(96, 'Hvad er det for en underlig nummerplade?? Er bilen importeret eller stjålet? Hvis den er stjålet, giver jeg det halve af den opslåede pris.', 'Ninja Princesse', 'nin@ja.ja', '2018-01-06 14:05:28', 37, 2),
(97, 'Hvad er det for en underlig nummerplade?? Er bilen importeret eller stjålet? Hvis den er stjålet, giver jeg det halve af den opslåede pris.', 'Ninja Princesse', 'nin@ja.ja', '2018-01-06 14:05:35', 37, 1),
(98, 'Hvad er det for en underlig nummerplade?? Er bilen importeret eller stjålet? Hvis den er stjålet, giver jeg det halve af den opslåede pris.', 'Ninja Princesse', 'nin@ja.ja', '2018-01-06 14:06:32', 37, 1),
(99, 'Hvad er det for en underlig nummerplade?? Er bilen importeret eller stjålet? Hvis den er stjålet, giver jeg det halve af den opslåede pris.', 'Ninja Princesse', 'nin@ja.ja', '2018-01-06 14:07:34', 37, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_kommentarer`
--
ALTER TABLE `bil_bixen_kommentarer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_kommentarer`
--
ALTER TABLE `bil_bixen_kommentarer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
