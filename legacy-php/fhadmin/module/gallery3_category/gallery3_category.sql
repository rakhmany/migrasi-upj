CREATE TABLE IF NOT EXISTS `gallery3_category` (
  `categoryid` bigint(11) NOT NULL AUTO_INCREMENT,
  `categoryparentid` bigint(11) NOT NULL,
  `categoryname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `categoryname_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorystatus` enum('Active','Hidden') COLLATE utf8_unicode_ci NOT NULL,
  `categoryprioritas` bigint(11) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `fh_menu` (`fh_kategorimenuid`, `fh_name`, `fh_url`, `fh_filename`) VALUES
('2' , 'Kategori Falilitas' , 'gallery3_category/gallery3_category.php' , 'gallery3_category.php' );