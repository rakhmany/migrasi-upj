
CREATE TABLE IF NOT EXISTS `pmb` (
  `pmbid` bigint(20) NOT NULL AUTO_INCREMENT,
  `pmbname` varchar(255) NOT NULL,
  `pmbjkel` enum('Pria','Wanita') NOT NULL,
  `pmbbirth` varchar(255) NOT NULL,
  `pmbwn` varchar(255) NOT NULL,
  `pmbagama` varchar(255) NOT NULL,
  `pmbstatusnikah` varchar(255) NOT NULL,
  `pmbaddress` text NOT NULL,
  `pmbpostcode` varchar(15) NOT NULL,
  `pmbhp` varchar(20) NOT NULL,
  `pmbemail` varchar(100) NOT NULL,
  `pmbphoto` varchar(255) NOT NULL,
  `pmblulusan` varchar(255) NOT NULL,
  `pmbgraduateyear` year(4) NOT NULL,
  `pmbdadyname` varchar(255) NOT NULL,
  `pmbmammyname` varchar(255) NOT NULL,
  `pmbparentaddress` text NOT NULL,
  `pmbparentpostcode` varchar(15) NOT NULL,
  `pmbparenthp` varchar(20) NOT NULL,
  `pmbdadylaststudy` varchar(255) NOT NULL,
  `pmbmammylaststudy` varchar(255) NOT NULL,
  `pmbdadyjob` varchar(255) NOT NULL,
  `pmbmammyjob` varchar(255) NOT NULL,
  `pmbparentstatus` varchar(255) NOT NULL,
  `pmbprogramstudy` varchar(255) NOT NULL,
  `pmbprogramstudy2` varchar(255) NOT NULL,
  `pmbknowwe` text NOT NULL,
  `pmbgelombang` text NOT NULL,
  `status` enum('Mendaftar','Masuk','Tidak Masuk') NOT NULL DEFAULT 'Mendaftar',
  `ip` varchar(15) NOT NULL,
  `pmbdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pmbid`),
  KEY `pmbname` (`pmbname`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `pmbconfig` (
  `pmbconfigid` int(11) NOT NULL AUTO_INCREMENT,
  `data_pmbconfigterms` longtext NOT NULL,
  `data_pmbconfigterms_en` longtext NOT NULL,
  `data_pmbconfigregister` longtext NOT NULL,
  `data_pmbconfigregister_en` longtext NOT NULL,
  PRIMARY KEY (`pmbconfigid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES
('2' , 'PMB Online' , 'pmb/pmb.php' , 'pmb.php' );