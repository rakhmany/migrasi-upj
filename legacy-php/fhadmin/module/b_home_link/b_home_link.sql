CREATE TABLE IF NOT EXISTS `b_home_link` (
  `homelink_id` int(10) NOT NULL AUTO_INCREMENT,
  `homelink_title` varchar(255) NOT NULL DEFAULT '',
  `homelink_title_en` varchar(255) NOT NULL DEFAULT '',
  `homelink_url` varchar(255) NOT NULL DEFAULT '',
  `homelink_pic` varchar(255) NOT NULL DEFAULT '',
  `status` enum('Show','Hidden') NOT NULL DEFAULT 'Show',
  `priority` smallint(5) NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`homelink_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `b_home_link_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` VALUES ('', '2', 'Home Link', 'b_home_link/b_home_link.php', 'b_home_link.php', NOW());
INSERT INTO `b_home_link_ukuran` VALUES ('', '56', '47');

