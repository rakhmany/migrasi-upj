INSERT INTO `fh_menu` (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES
('2' , 'Career Management' , 'job_vacancy1/job_vacancy1.php' , 'job_vacancy1.php' );

CREATE TABLE IF NOT EXISTS `job_vacancy1` (
  `jobvacancyid` bigint(11) NOT NULL auto_increment,
  `metatag` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `metakeyword` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `metadescription` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `jobvacancydatestart` date NOT NULL default '0000-00-00',
  `jobvacancydateend` date NOT NULL default '0000-00-00',
  `jobvacancytitle` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `jobvacancytitle_en` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `jobvacancydescription` text collate utf8_unicode_ci,
  `jobvacancydescription_en` text collate utf8_unicode_ci,
  `jobvacancyqualification` longtext collate utf8_unicode_ci NOT NULL,
  `jobvacancyqualification_en` longtext collate utf8_unicode_ci NOT NULL,
  `jobvacancystatus` enum('Active','Hidden') character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`jobvacancyid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

