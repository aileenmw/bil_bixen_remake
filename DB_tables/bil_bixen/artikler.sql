-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 09. 11 2022 kl. 22:04:21
-- Serverversion: 10.4.21-MariaDB
-- PHP-version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur-dump for tabellen `artikler`
--

CREATE TABLE `artikler` (
  `artikel_id` int(11) NOT NULL,
  `artikel_titel` varchar(200) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `artikel_tekst` text CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `source_url` varchar(300) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `artikel_url` varchar(250) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `artikel_forfatter` varchar(70) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `artikel_kategori` varchar(40) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `artikel_dato` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Data dump for tabellen `artikler`
--

INSERT INTO `artikler` (`artikel_id`, `artikel_titel`, `artikel_tekst`, `source_url`, `artikel_url`, `artikel_forfatter`, `artikel_kategori`, `artikel_dato`, `description`) VALUES
(1, 'Dogs Are Even More Like Us Than We Thought', 'It\'s likely no surprise to dog owners, but growing research suggests that man\'s best friend often acts more human than canine.   \r\n\r\nDogs can read facial expressions, communicate jealousy, display empathy, and even watch TV, studies have shown. They\'ve picked up these people-like traits during their evolution from wolves to domesticated pets, which occurred between 11,000 and 16,000 years ago, experts say.\r\n\r\nIn particular, \"paying attention to us, getting along with us, [and] tolerating us\" has led to particular characteristics that often mirror ours, says Laurie Santos, director of the Yale Comparative Cognition Laboratory. (Read more about how dogs evolved in National Geographic magazine.)\r\n\r\nHere are a few of the latest studies showing the human side of our canine companions.', 'https://news.nationalgeographic.com/', 'https://news.nationalgeographic.com/2015/07/150720-dogs-animals-science-pets-evolution-intelligence/', 'Maya Wei-Haas', 'animals', '2017-11-02 07:58:08', 'Dogs Are Even More Like Us Than We Thought'),
(2, 'Welcome to the Land of a Thousand Stray Dogs', 'At the Territorio de Zaguates no-kill dog shelter in Costa Rica, every animal coming to live at the rescue facility gets a name. And at the moment, there are approximately 970 dogs living here.\r\n\r\nBritish photographer Dan Giannopoulos recently spent time with the dogs and the people who take care of them at this notable rescue facility, which translates to “Land of the Strays.”\r\n\r\nLocated about an hour from downtown San José, the shelter is famed for its approximately 378 acres of tropical mountain land where scores of canines stroll, frolic, and race alongside human visitors, shelter employees, and volunteers. The vast majority of the animals are up for adoption and visitors can bring their own dogs to play with the rescues.', 'https://www.nationalgeographic.com/', 'https://news.nationalgeographic.com/photography/proof/2017/11/land-of-strays/', 'Sarah Stacke', 'magazine', '2017-11-02 07:58:08', 'Welcome to the Land of a Thousand Stray Dogs'),
(3, 'Could Farmers Bring Peace to Nigeria?', 'Nigerian farm laborers harvest tomatoes grown with the help of Babban Gona, which provides strategies to make land more productive. The majority of Nigerians are under age 24, but the average farmer is more than 50 years old. Founder Kola Masha wants his program to reach one million small-scale farmers by 2025—and to reduce conflict and youth unemployment along the way. ', 'https://www.nationalgeographic.com/', 'https://www.nationalgeographic.com/magazine/2017/11/explore-sustainability-nigeria-farming/', 'Nina Strochlic', 'magazine', '2017-11-02 07:58:08', 'Could Farmers Bring Peace to Nigeria?'),
(4, 'Hikers Now Banned From Climbing This Iconic Natural Wonder', 'Australia’s National Park Board has voted unanimously to close Uluru, or Ayers Rock, to climbers. The majestic red rock is located in Uluru Kata Tjuta National Park, a UNESCO World Heritage Site, in Australia’s Northern Territory. It is considered sacred by the region’s indigenous Anangu people.\r\n\r\nThe ban will officially be recognized on Oct. 26, 2019—nearly two years from now. The date itself also holds significance, as the 34th anniversary of the government restoring ownership of Uluru to the Anangu people.', 'https://www.nationalgeographic.com/', 'https://www.nationalgeographic.com/travel/destinations/oceania/australia/australia-uluru-ban-climb-anangu-spd/', 'usta Somvichian-Clausen', 'travel', '2017-11-02 07:58:08', 'Hikers Now Banned From Climbing This Iconic Natural Wonder'),
(5, 'This Man Keeps Time on the World\'s Last Lunar Clock', 'The alleys of Sarajevo’s old city, once an Ottoman-era central market, are crammed with vendors plying their ancestral trades. Mensur Zlatar, whose surname means goldsmith, has a miniscule shop tucked next to the grand Gazi Husrev-beg mosque, named for the Ottoman high-ranking officer who developed the metropolis in the 16th century. Across the street, a clock tower with unusual symbols covering its face rises above the city.', 'https://www.nationalgeographic.com/', 'https://www.nationalgeographic.com/travel/destinations/europe/bosnia-herzegovina/sarajevo-mosque-clock-tower/', 'Nina Strochlic', 'travel', '2017-11-02 13:16:58', 'This Man Keeps Time on the World\'s Last Lunar Clock'),
(6, 'Would Your Dog Eat You if You Died? ', 'In 1997, a forensic examiner in Berlin reported one of his more unusual cases in the journal Forensic Science International. A 31-year-old man had retired for the evening to the converted garden shed behind his mother’s house, where he lived with his German shepherd. Around 8:15 p.m., neighbors heard a gunshot from the direction of the shed.\r\n\r\nForty-five minutes later, the man’s mother and neighbors found him dead of a gunshot wound to the mouth, a Walther pistol under his hands and a farewell note on a table. Most of his face and neck were gone—and there were tooth marks around the edges of the wounds. A half-full bowl of dog food sat on the floor.', 'https://news.nationalgeographic.com/', 'https://news.nationalgeographic.com/2017/06/pets-dogs-cats-eat-dead-owners-forensics-science/', 'Erika Engelhaupt', 'animals', '2017-11-02 13:21:02', 'Would Your Dog Eat You if You Died? '),
(7, 'The smallest horse in the world?', 'So there you were, pretty confident that the best equine story you were going to read all week was the one about the artist who turns My Little Ponies into slightly sinister film characters. Recalibrate your expectations, people. You\'re about to meet Einstein, the world\'s smallest horse.', NULL, 'https://www.theguardian.com/world/blog/2010/apr/28/smallest-horse-in-the-world-einstein', 'Helen Pidd', 'Animals', '2017-11-03 09:26:15', 'The smallest horse in the world?'),
(10, 'The most multicultural city in the world ', 'With its 26 million people, Delhi has been described as a microcosm of India, with trappings from the countryâ€™s many cultures, religions and traditions. Centuries of global trade, conquest and colonisation have made the city one of the worldâ€™s most multicultural. And residents who adapt to this ever-changing culture are embraced as fellow â€˜Dilliwalasâ€™ â€“ the term residents often call themselves, originating from the phase â€˜Dillwalo ki Dilliâ€™, the place where the people with big hearts live.', NULL, 'http://www.bbc.com/travel/story/20170512-the-asian-city-that-caters-to-everyone', 'Lindsey Galloway', 'travel', '2017-11-03 09:30:19', 'The most multicultural city in the world '),
(13, '3 days in Delhi', 'Last week, we asked our travel community for their advice on exploring the Indian capital. Facebook advice poured in for BBC Travel reader Andy Graf, who asked, â€œOff to Delhi in December for a short work trip. What can be done and seen in the area with time limits (three days free)?â€', NULL, 'http://www.bbc.com/travel/story/20130520-reader-qa-what-to-do-with-three-days-in-delhi', 'Breanna McMahon', 'Travel', '2017-11-03 09:32:51', '3 days in Delhi'),
(14, 'The wolve', 'Yes, there are nine major characters in The Wolves who are in their middle teens. (The only adult, portrayed by Mia Barron, doesn\'t appear until near the end.) And for long stretches, it feels as if they\'re all talking at once. This production uses overlapping dialogue the way Robert Altman did in his films, to create a heady buzz of personalities in collision; it forces you to retune your ears and find the order in seemingly chaotic conversation.', NULL, 'https://www.nytimes.com/2016/09/12/theater/the-wolves-review.html', 'Sanne Schmidt', 'Animals', '2017-11-06 07:43:36', 'The wolve'),
(17, 'Welcome to Roatan', 'Roatan is the largest and most developed of the Bay Islands. Long and thin (50km long, but only 2km to 4km wide), the island is (like neighboring Utila) a real diving and snorkeling mecca - virtually its entire coastline is fringed by an astonishingly diverse coral reef teeming with tropical fish. On land, exquisite white-sand beaches like West Bay, a mountainous interior of pine-forested hills and the remote wild east of the island (once a pirate hangout) beg to be explored.', NULL, 'https://www.lonelyplanet.com/honduras/bay-islands/roatan', 'Lulu McIver', 'Travel', '2017-11-06 07:58:06', 'Welcome to Roatan'),
(19, 'Mobies', 'The hubris it must take to yank a soul out of non existence, into this, meat. And to force a life into this, thresher. Yeah so my daughter, she uh, she spared me the sin of being a father.', NULL, 'http://xai01.wi2.sde.dk/dynamisk_web/simpleXML/opg_1.php', 'Claus Winther', 'Animals', '2017-11-06 11:55:38', 'Mobies'),
(24, 'Paradise Papers', 'Charlie Brown est une chanson du groupe britannique Coldplay.\r\nC\'est la quatriÃ¨me piste de leur album Mylo Xyloto et le troisieme single officiel. Le clip de Charlie Brown a ete devoila le 3 favrier 2012.', NULL, 'https://fr.wikipedia.org/wiki/Charlie_Brown_(chanson)', 'Charly Brown', 'Magazine', '2017-11-07 08:03:48', 'Paradise Papers');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `artikler`
--
ALTER TABLE `artikler`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `artikler`
--
ALTER TABLE `artikler`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
