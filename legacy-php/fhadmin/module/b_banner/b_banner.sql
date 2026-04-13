CREATE TABLE IF NOT EXISTS `b_banner` (
  `bannerid` int(10) NOT NULL AUTO_INCREMENT,
  `bannerdate` date NOT NULL,
  `bannertitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bannertitle_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bannershortdesc` varchar(160) DEFAULT NULL,
  `bannershortdesc_en` varchar(160) DEFAULT NULL,
  `bannerurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bannerpic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` enum('Show','Hidden') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` enum('Home Left Bottom','Home Center Bottom','Home Right Bottom','Home Right Center','Home Right Top') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `priority` smallint(5) NOT NULL,
  PRIMARY KEY (`bannerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu`  (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES ('2', 'Banner Management', 'b_banner/b_banner.php', 'b_banner.php');

CREATE TABLE IF NOT EXISTS `b_banner_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `b_banner_ukuran` (`ukuranid`, `label`, `width`, `height`) VALUES (1, 'Home Left Bottom', '368', '150'),
(2, 'Home Center Bottom', '368', '150'),
(3, 'Home Right Bottom', '368', '150'),
(4, 'Home Right Center', '368', '227'),
(5, 'Home Right Top', '368', '227');

