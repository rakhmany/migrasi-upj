CREATE TABLE IF NOT EXISTS `popup_banner` (
  `pbanner_id` int(10) NOT NULL AUTO_INCREMENT,
  `pbanner_date` date NOT NULL DEFAULT '0000-00-00',
  `pbanner_date_end` date NOT NULL DEFAULT '0000-00-00',
  `pbanner_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pbanner_title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pbanner_shortdesc` varchar(160) DEFAULT NULL,
  `pbanner_shortdesc_en` varchar(160) DEFAULT NULL,
  `pbanner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pbanner_pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Show','Hidden') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` smallint(5) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`pbanner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `popup_banner_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` VALUES ('', '2', 'Popup Banner', 'popup_banner/popup_banner.php', 'popup_banner.php', NOW());
INSERT INTO `popup_banner_ukuran` VALUES ('', '856', '520');

