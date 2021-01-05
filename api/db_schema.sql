
-- ALTER TABLE glimpse ADD image_link varchar(255);

CREATE TABLE IF NOT EXISTS `glimpse` (

  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `glimpse_date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `heading` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `transition` text COLLATE utf8_unicode_ci NOT NULL,
  `prayer_focus` text COLLATE utf8_unicode_ci NOT NULL,
  `featured_verse` text COLLATE utf8_unicode_ci NOT NULL,
  `featured_quote` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255),
  `type` int NOT NULL,    
 

  `created_at` timestamp NULL DEFAULT NULL,
 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63;



CREATE TABLE IF NOT EXISTS `glimpse_image` (

  `glimpse_id` int(10) unsigned NOT NULL REFERENCES glimpse, 

  PRIMARY KEY (`glimpse_id`)

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63;