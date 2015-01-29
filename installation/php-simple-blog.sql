-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2015 at 04:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php-simple-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `created`, `modified`, `published`, `featured`, `content`) VALUES
(1, 'Lorem Ipsum', '2015-01-28 23:29:04', '2015-01-28 23:29:04', 1, 1, '<p style="text-align:justify;">\r\n<img src="media/images/sample.png" width="50%" height="50%" alt="Commodore 64" title="Commodore 64" align="right"/>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel elementum odio, id viverra est. Sed et purus in sapien pretium feugiat. Quisque id libero a ante euismod mattis. Fusce mi est, ultricies vel est nec, blandit ornare diam. Cras dapibus rhoncus vestibulum. Integer varius vel ligula ut condimentum. Mauris venenatis, justo a rutrum consectetur, risus dolor suscipit est, nec gravida nisl augue eget velit. Integer pulvinar dignissim ullamcorper.\r\n</p>\r\n<h1>Aliquam at purus lorem</h1>\r\n<p style="text-align:justify;">\r\nAliquam at purus lorem. Nunc vel consequat orci. Cras lacinia varius odio. Cras dignissim, neque a lobortis vehicula, tortor libero venenatis arcu, ut pulvinar ligula justo at velit. Donec viverra neque lacus, id sagittis nisi mattis sit amet. Sed congue vulputate nisi, at luctus turpis pulvinar imperdiet. Donec sed lacus viverra, ultricies leo a, feugiat turpis. Pellentesque eleifend nisi eget nisl fermentum accumsan. Nulla tempor finibus felis vel efficitur. Nulla lacinia urna aliquam orci placerat congue. Pellentesque porta non nibh at lobortis. Cras tellus lectus, vestibulum vitae tellus quis, suscipit dictum elit. Sed eu pharetra magna, et dapibus sem. Aenean facilisis lectus egestas, placerat sem vitae, rutrum odio. Nam id tortor iaculis, porta mauris id, lacinia quam.\r\n</p>\r\n<p style="text-align:justify;">\r\nVivamus nec nunc venenatis, feugiat lacus imperdiet, fermentum tortor. Sed convallis massa nunc. Aliquam erat volutpat. Nunc aliquam ut metus a consequat. Mauris ultrices gravida felis quis dapibus. Curabitur ac blandit mi. Donec ligula enim, aliquam ut turpis ac, sollicitudin pulvinar dui. Mauris eget vestibulum metus. Sed lobortis vestibulum ligula, eget pellentesque neque porttitor a. Donec nec sem id elit sollicitudin posuere eget nec dui. Maecenas consectetur mauris nisi, et bibendum risus placerat vitae. Sed tempus, mauris at laoreet molestie, dui ex feugiat nunc, non pellentesque odio orci eget erat. Donec elementum purus lectus, quis tempor libero pulvinar quis. Ut mauris massa, consequat sit amet ex quis, dictum dictum eros. Sed ultrices efficitur accumsan.\r\n</p>\r\n<h1>Sed non aliquet</h1>\r\n<p style="text-align:justify;">\r\nSed non aliquet urna, non fermentum massa. Maecenas hendrerit risus nisi, in pellentesque metus bibendum ut. Donec eleifend felis cursus, bibendum erat in, dapibus augue. Aenean in auctor felis, vel rhoncus lorem. Donec ut magna nec est lobortis interdum. Duis a mi egestas, venenatis metus a, pharetra ligula. Morbi fermentum congue ligula. Nunc orci tortor, feugiat vitae eros vitae, hendrerit rhoncus nibh. Vestibulum quis orci erat. Nunc eget consequat lorem, vitae blandit ipsum. Cras tempus risus dignissim ante tempor porttitor. Quisque nisl urna, auctor pulvinar orci non, varius laoreet ante. Praesent bibendum maximus lacinia. Vestibulum vitae velit consectetur, iaculis erat eu, placerat velit. Phasellus sed sem at nisl scelerisque iaculis.\r\n</p>\r\n<p style="text-align:justify;">\r\nCurabitur porttitor tellus id sem blandit volutpat sed nec est. Suspendisse sit amet nibh a nulla ultricies fringilla eu sed magna. Suspendisse vitae est mattis, dapibus dui sit amet, vestibulum ante. Phasellus sit amet facilisis orci, at imperdiet augue. Integer condimentum scelerisque elit eget consequat. Duis ex felis, hendrerit sit amet feugiat id, sagittis et lectus. Suspendisse vel enim vestibulum, pulvinar risus eget, luctus urna. Proin varius metus in risus posuere, eget rutrum leo scelerisque. Sed venenatis eget turpis in laoreet. Etiam ullamcorper magna sapien, eget sodales neque interdum rutrum. Phasellus vulputate nec augue at tincidunt.\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `key`, `value`) VALUES
(1, 'title', '%author%''s Blog'),
(2, 'lang', 'en-US'),
(3, 'keywords', 'blog'),
(4, 'description', '%author%''s blog'),
(5, 'author', 'Default'),
(6, 'header_background', 'SeaGreen'),
(7, 'header_font', ''),
(8, 'header_font_size', ''),
(9, 'panel_background', 'Tan'),
(10, 'content_background', ''),
(11, 'page_background', 'beige'),
(12, 'footer_background', 'SeaGreen'),
(13, 'footer_font', ''),
(14, 'footer_font_size', ''),
(15, 'author_email', 'black_hole@mailinator.com'),
(16, 'aside_background', 'SeaGreen'),
(17, 'aside_font', ''),
(18, 'aside_font_size', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;