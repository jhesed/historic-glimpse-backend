-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.byetcluster.com
-- Generation Time: Jan 05, 2021 at 03:32 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b7_27614960_b7_27614960_jsoscc`
--

-- --------------------------------------------------------

--
-- Table structure for table `glimpse`
--

CREATE TABLE `glimpse` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `glimpse_date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `heading` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `prayer_focus` text COLLATE utf8_unicode_ci NOT NULL,
  `featured_verse` text COLLATE utf8_unicode_ci NOT NULL,
  `featured_quote` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `transition` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `glimpse`
--

INSERT INTO `glimpse` (`id`, `title`, `glimpse_date`, `heading`, `content`, `prayer_focus`, `featured_verse`, `featured_quote`, `image_link`, `type`, `created_at`, `transition`) VALUES
(63, '2021-01-05', '2021-01-05', 'On the Beginning of the Construction of the Golden Gate Bridge the USA', 'In 1933, the golden gate bridge construction begun.<br/><br/>\r\n\r\nThis was after workers started excavating 3.25 million cubic feet of dirt for the structure\'s big anchorage.  The plan to build the bridge that would connect the San Francisco Peninsula with the southern end of Marin country begun in 1849 after the Gold rush in the land north of San Francisco.<br/><br/>\r\n\r\nCity engineer <i>Michael O\'Shaughnessy</i> who also named the gate, and <i>Joseph Strauss</i>, another engineer and poet, took charge of the construction that cost around US $30 million and took four years to finish.<br/><br/>\r\n\r\nIt officially opened on <i>May 27, 1937</i> eventually becoming a world famous American landmark and tourist spot.\r\n', 'May the <i>Golden Gate Bridge</i> and all the other (major) bridges the world over be properly maintained and enhanced to survive massive earthquakes and flooding. <br/><br/>\r\n\r\nMay more vital bridges be built where strategic and truly needed.', 'Jesus answered, <i>\"I am the way the truth and the life. No one comes to the father except through me.\"</i><br/>\r\n- <b>John 14.6</b>', '<i>In human history, we can see sparkles of God\'s redeeming stories</i><br/>\r\n- Pastor Jose Tacadena', 'https://www.history.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:good%2Cw_1200/MTY1MTc3MjE0MzExMDgxNTQ1/topic-golden-gate-bridge-gettyimages-177770941.jpg', 0, NULL, 'While human bridges are mostly helpful for connecting locations and people, the spiritual bridge who is the Lord Jesus is certainly millions better on all fronts. We must appreciate the Lord Jesus connecting us to God the father.<br/><br/>'),
(64, '2021-01-05', '2021-01-05', 'In 2011, Senator Antonio Trillanes IV and 18 other Magdalo Officers formally applied for Amnesty.', 'Senator Antonio Trillanes IV and other members of the Magdalo group pose for a <i>Group Shot</i> after applying for government amnesty before the Department of National Defense amnesty committee at <i>Camp Aguinaldo</i>.<br/><br/>\r\n\r\nThey sent their application to the <i>Department of National Defense (DND) Ad Hoc Committee</i> in <i>Camp Aguinaldo, Quezon City.</i><br/><br/>\r\n\r\nTrillanes was one of the leaders of the 2003 Oakwoood Mutiny where they lmabdasted the supposed corruption of the President Gloria Arroyo Administration. <br/><br/>\r\n\r\nIn 2007, he walked out of the Camp Crame Custodial Center after the Makti Regional Trial Court and staged the Manila Peninsula Hotel Siege.<br/><br/>\r\n\r\nIn December 2010, he was given provisional liberty, and a year later was given amnesty by then President Noynoy Aquino. <br/><br/>', 'May God\'s truth, fairness, and justice prevail in Senator Trillanes\' pending case by the Department of Justice. May every government refrain from using their power to unjustly harass their critics.', '<i>\"And that is what some of you were. \r\nBut you were washed, you were sanctified, you were justified in the name of the Lord Jesus Christ and the Spirit of our God.\"</i><br>\r\n- <b>Romans 8:1</b>', '<i>\"In human history, we can see sparkles of God\'s redeeming stories\"</i>\r\n- Pastor Jose Tacadena', 'https://www8.gmanews.tv/webpics/infotech/trillanesamnesty1.jpg', 1, NULL, 'While government amnesty may be considered a great blessing to those who receive it, how much more should God\'s own version of Amnesty? The Bible calls it justification and is given to those who receive Jesus as their personal and Lord and Savior.  We must strive to reciprocate God justifying us by living for him. <br/>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glimpse`
--
ALTER TABLE `glimpse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glimpse`
--
ALTER TABLE `glimpse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
