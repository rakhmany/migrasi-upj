CREATE TABLE IF NOT EXISTS `latest_event1` ( 
  `eventid` bigint(11) NOT NULL AUTO_INCREMENT,
  `metatag` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `metakeyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `metadescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eventdate` date NOT NULL DEFAULT '0000-00-00',
  `eventtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eventtitle_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventshortdesc` text COLLATE utf8_unicode_ci,
  `eventshortdesc_en` text COLLATE utf8_unicode_ci NOT NULL,
  `eventdescription` longtext COLLATE utf8_unicode_ci NOT NULL,
  `eventdescription_en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `eventmainimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eventstatus` enum('Active','Hidden') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`eventid`),
  KEY `eventtitle_en` (`eventtitle_en`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `latest_event1_kataterkait` (
  `kataterkaitid` bigint(11) NOT NULL auto_increment,
  `eventid` bigint(11) NOT NULL,
  `kataterkait` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`kataterkaitid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `latest_event1_ukuran` (
  `ukuranid` smallint(6) NOT NULL AUTO_INCREMENT,
  `width` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `ratioresized` enum('Yes','No') character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ukuranid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES ('2' , 'Latest Event' , 'latest_event1/latest_event1.php' , 'latest_event1.php' );
INSERT INTO `latest_event1_ukuran` VALUES ('', '382', '260','No');
