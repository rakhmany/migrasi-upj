CREATE TABLE IF NOT EXISTS `latest_news1` ( 
  `newsid` bigint(11) NOT NULL AUTO_INCREMENT,
  `metatag` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `metakeyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `metadescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `newsdate` date NOT NULL DEFAULT '0000-00-00',
  `newstitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `newsshortdesc` text COLLATE utf8_unicode_ci,
  `newsdescription` longtext COLLATE utf8_unicode_ci NOT NULL,
  `newstitle_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `newsshortdesc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `newsdescription_en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `newsmainimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `newsstatus` enum('Active','Hidden') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`newsid`),
  KEY `newstitle_en` (`newstitle_en`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `latest_news1_kataterkait` (
  `kataterkaitid` bigint(11) NOT NULL auto_increment,
  `newsid` bigint(11) NOT NULL,
  `kataterkait` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`kataterkaitid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `latest_news1_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `ratioresized` enum('Yes','No') character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES ('2' , 'Latest News' , 'latest_news1/latest_news1.php' , 'latest_news1.php' );
INSERT INTO `latest_news1_ukuran` VALUES ('', '300', '150','No');
