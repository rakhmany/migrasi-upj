
CREATE TABLE IF NOT EXISTS `gallery3` (
  `galleryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `gallerydate` date NOT NULL,
  `galleryname` varchar(255) NOT NULL,
  `galleryname_en` varchar(255) NOT NULL,
  `galleryfilename` varchar(255) NOT NULL,
  `gallerydescription` varchar(255) DEFAULT NULL,
  `gallerydescription_en` varchar(255) DEFAULT NULL,
  `gallerystatus` enum('Show','Hidden') NOT NULL DEFAULT 'Show',
  `gallerypriority` int(11) NOT NULL,
  PRIMARY KEY (`galleryid`),
  KEY `galleryname` (`galleryname`),
  KEY `gallerystatus` (`gallerystatus`),
  KEY `gallerypriority` (`gallerypriority`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `fh_menu` (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES
('2' , 'Fasilitas' , 'gallery3/gallery3.php' , 'gallery3.php' );