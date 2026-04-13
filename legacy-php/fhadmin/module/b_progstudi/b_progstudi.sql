CREATE TABLE IF NOT EXISTS `b_progstudi` (
  `progid` int(10) NOT NULL AUTO_INCREMENT,
  `progdate` date NOT NULL,
  `progtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `progtitle_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `progtujuan` text NOT NULL,
  `progtujuan_en` text NOT NULL,
  `progvisi` text NOT NULL,
  `progvisi_en` text NOT NULL,
  `progmisi` text NOT NULL,
  `progmisi_en` text NOT NULL,
  `progurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `progpic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `progpic2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Show','Hidden') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` smallint(5) NOT NULL,
  PRIMARY KEY (`progid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `b_progstudi_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` VALUES ('', '2', 'Program Study', 'b_progstudi/b_progstudi.php', 'b_progstudi.php');
INSERT INTO `b_progstudi_ukuran` VALUES ('', '170', '283');

