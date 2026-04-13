CREATE TABLE IF NOT EXISTS `manage_logo` (
  `logoid` smallint(6) NOT NULL AUTO_INCREMENT,
  `logotitle` varchar(255) NOT NULL,
  `logofile` varchar(255) NOT NULL,
  `status` enum('Show','Hidden') NOT NULL,
  PRIMARY KEY (`logoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `manage_logo_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` VALUES ('', '2', 'Management Logo', 'manage_logo/logo.php', 'logo.php');
INSERT INTO `manage_logo_ukuran` VALUES ('', '255', '90');

