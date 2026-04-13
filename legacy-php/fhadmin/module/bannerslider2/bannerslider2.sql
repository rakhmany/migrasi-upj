CREATE TABLE IF NOT EXISTS `bannerslider2` (
  `newsid` int(10) NOT NULL AUTO_INCREMENT,
  `newsdate` date NOT NULL,
  `newstitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newstitle_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newsshortdesc` text,
  `newsshortdesc_en` text,
  `newsurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newspic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newsbg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Show','Hidden') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` smallint(5) NOT NULL,
  `toptitle` int(11) NOT NULL DEFAULT '17',
  `bottomtext` int(11) NOT NULL DEFAULT '39',
  `bottomlinks` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`newsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bannerslider2_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` VALUES ('', '2', 'Banner Slider', 'bannerslider2/bannerslider2.php', 'bannerslider2.php');
INSERT INTO `bannerslider2_ukuran` VALUES ('', '300', '150');

