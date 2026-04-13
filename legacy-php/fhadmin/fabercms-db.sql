SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fh_basicconfig`
-- ----------------------------

DROP TABLE IF EXISTS `fh_basicconfig`;
CREATE TABLE `fh_basicconfig` (
  `fh_basicconfigid` int(11) NOT NULL AUTO_INCREMENT,
  `fh_companyname` varchar(255) NOT NULL,
  `fh_companyaddress` text NOT NULL,
  `fh_companyphone` varchar(50) NOT NULL,
  `fh_companyfax` varchar(25) NOT NULL,
  `fh_companyemail` varchar(255) NOT NULL,
  `fh_notifemail` varchar(255) NOT NULL,
  `fh_companyweb` varchar(255) NOT NULL,
  `fh_googlemap` text NOT NULL,
  `fh_fbbox` text NOT NULL,
  `fh_twtbox` text NOT NULL,
  `fh_social_fb` varchar(255) NOT NULL,
  `fh_social_twt` varchar(255) NOT NULL,
  `fh_social_gplus` varchar(255) NOT NULL,
  `fh_social_blogger` varchar(255) NOT NULL,
  `fh_social_linkedin` varchar(255) NOT NULL,
  `fh_social_youtube` varchar(255) NOT NULL,
  `fh_social_vimeo` varchar(255) NOT NULL,
  `fh_social_rss` varchar(255) NOT NULL,
  `fh_company_ym1` varchar(255) NOT NULL,
  `fh_company_ym2` varchar(255) NOT NULL,
  `fh_index_title` varchar(255) NOT NULL,
  `fh_index_description` longtext NOT NULL,
  `fh_general_pageheader` varchar(255) NOT NULL,
  `fh_general_metakeyword` varchar(255) NOT NULL,
  `fh_general_metadescription` varchar(255) NOT NULL,
  `fh_general_banner` varchar(255) NOT NULL,
  `fh_widthgeneralbanner` varchar(5) NOT NULL,
  `fh_heightgeneralbanner` varchar(5) NOT NULL,
  `fh_widthstatisbanner` varchar(5) NOT NULL,
  `fh_heightstatisbanner` varchar(5) NOT NULL,
  `fh_sitetitle` varchar(255) NOT NULL,
  `fh_projectname` varchar(255) NOT NULL,
  `fh_projecturl` varchar(255) NOT NULL,
  `fh_emailadmin` varchar(255) NOT NULL,
  `fh_maxuserlog` varchar(10) NOT NULL,
  `fh_maxfilesize` varchar(10) NOT NULL,
  `fh_frontend_page` int(11) NOT NULL,
  `fh_backend_page` int(11) NOT NULL,
  `fh_webstatus` enum('Published','On Progress') NOT NULL,
  `fh_webstatuskey` varchar(25) NOT NULL,
  PRIMARY KEY (`fh_basicconfigid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- ----------------------------
-- Records of fh_basicconfig
-- ----------------------------

INSERT INTO `fh_basicconfig` (`fh_basicconfigid`, `fh_companyname`, `fh_companyaddress`, `fh_companyphone`, `fh_companyfax`, `fh_companyemail`, `fh_companyweb`, `fh_googlemap`, `fh_fbbox`, `fh_twtbox`, `fh_social_fb`, `fh_social_twt`, `fh_social_gplus`, `fh_social_blogger`, `fh_social_linkedin`, `fh_social_youtube`, `fh_social_vimeo`, `fh_social_rss`, `fh_company_ym1`, `fh_company_ym2`, `fh_index_title`, `fh_index_description`, `fh_general_pageheader`, `fh_general_metakeyword`, `fh_general_metadescription`, `fh_general_banner`, `fh_widthgeneralbanner`, `fh_heightgeneralbanner`, `fh_widthstatisbanner`, `fh_heightstatisbanner`, `fh_sitetitle`, `fh_projectname`, `fh_projecturl`, `fh_emailadmin`, `fh_maxuserlog`, `fh_maxfilesize`, `fh_frontend_page`, `fh_backend_page`, `fh_webstatus`, `fh_webstatuskey`) VALUES
(1, 'Faberhost Indonesia', 'Gading Batavia LC 8 / 20-21\r\nKelapa Gading \r\nJakarta Utara - 14240\r\nIndonesia', '021 - 45854322', '021 - 45854322', 'info@faberhost.com', 'http://www.faberhost.com', '<iframe width=230 height=250 frameborder=0 scrolling=no marginheight=0 marginwidth=0 src=https://maps.google.co.id/maps/ms?msa=0&msid=217116319939403273476.0004c7ebec15dd0aa47fe&hl=id&ie=UTF8&ll=-6.155006,106.896316&spn=0,0&t=m&output=embed></iframe><br /><small>Lihat <a href=https://maps.google.co.id/maps/ms?msa=0&msid=217116319939403273476.0004c7ebec15dd0aa47fe&hl=id&ie=UTF8&ll=-6.155006,106.896316&spn=0,0&t=m&source=embed style=color:#0000FF;text-align:left>Rajalelang.com</a> di peta yang lebih besar</small>', '<div class="fb-like-box" style="background:#fff; font-size:8px; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;" data-href="https://www.facebook.com/FaberHost.co.id" data-width="390" data-height="187" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div> ', '', 'http://www.facebook.com/FaberHost.co.id', 'https://twitter.com/faberhost', 'https://plus.google.com/b/113776191455476125924/113776191455476125924/', 'http://faberhost.blogspot.com/', 'http://www.linkedin.com/company/faberhost-indonesia', 'http://www.youtube.com/faberhostindonesia', 'https://vimeo.com/faberhost', '', 'faberhost', 'pt.watama', 'Welcome To Our Website', '<p style="text-align: justify;">Perkembangan teknologi dalam berbagai media khususnya internet sangat dibutuhkan baik kalangan pribadi, pelaku bisnis dan perusahaan. Dalam hal ini kebutuhan akan internet mempunyai fungsi sebagai penyedia layanan data atau informasi sebagai media online , salah satunya adalah website yang keuntungannya kita dapat memasarkan produk dan jasa layanan perusahaan.<br />\r\n<br />\r\nDalam hal ini KlikWebsite adalah perusahaan jasa pembuatan website dan penyedia fasilitas hosting membantu mengkomunikasikan profile perusahaan berikut produk dan layanan yang diberikan yang bisa dipilih sesuai kebutuhan dan anggaran perusahaan.</p>\r\n', 'Welcome To FaberHost.com', 'Web Desain, Web Development, Design Website, SEO', 'FaberHost Indonesia merupakan perusahaan yang bergerak dibidang desain website yang telah berpenglaman serta didukung oleh SDM yang kompeten', 'defaultbanner.png', '980', '330', '980', '100', 'FaberCMS', 'Core Sistem FaberCMS', 'faberhost.com', 'log.website@faberhost.co.id', '1000', '1000000', 10, 25, 'On Progress', 'F4berd3mo');

-- ----------------------------
-- Table structure for `fh_menu`
-- ----------------------------
DROP TABLE IF EXISTS `fh_menu`;
CREATE TABLE `fh_menu` (
  `fh_menuid` bigint(11) NOT NULL AUTO_INCREMENT,
  `fh_kategorimenuid` bigint(11) NOT NULL DEFAULT '0',
  `fh_name` varchar(255) NOT NULL DEFAULT '',
  `fh_url` varchar(255) NOT NULL DEFAULT '',
  `fh_filename` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`fh_menuid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fh_menu
-- ----------------------------
INSERT INTO `fh_menu` VALUES ('1', '1', 'User Group', 'usermanagement/usergroup.php', 'usergroup.php');
INSERT INTO `fh_menu` VALUES ('2', '1', 'User Management', 'usermanagement/useradmin.php', 'useradmin.php');
INSERT INTO `fh_menu` VALUES ('3', '1', 'User Log', 'usermanagement/userlog.php', 'userlog.php');
INSERT INTO `fh_menu` VALUES ('4', '1', 'User Log By User', 'usermanagement/logbyuser.php', 'logbyuser.php');
INSERT INTO `fh_menu` VALUES ('5', '1', 'Basic Configuration', 'usermanagement/basic.php', 'basic.php');
INSERT INTO `fh_menu` VALUES ('6', '1', 'Seting Category Menu CMS', 'usermanagement/categorymenu.php', 'categorymenu.php');
INSERT INTO `fh_menu` VALUES ('7', '1', 'Seting Menu CMS', 'usermanagement/menu.php', 'menu.php');
INSERT INTO `fh_menu` VALUES ('8', '1', 'Setup Module Database', 'usermanagement/module.php', 'module.php');
INSERT INTO `fh_menu` VALUES ('9', '1', 'Page Statis', 'usermanagement/pagestatis.php', 'pagestatis.php');
INSERT INTO `fh_menu` VALUES ('10', '1', 'Structure Menu Website', 'usermanagement/strukturmenu.php', 'strukturmenu.php');
INSERT INTO `fh_menu` VALUES ('11', '1', 'Themes', 'usermanagement/themes.php', 'themes.php');

-- ----------------------------
-- Table structure for `fh_menu_akses`
-- ----------------------------
DROP TABLE IF EXISTS `fh_menu_akses`;
CREATE TABLE `fh_menu_akses` (
  `fh_aksesid` bigint(11) NOT NULL AUTO_INCREMENT,
  `fh_menuid` bigint(11) NOT NULL DEFAULT '0',
  `fh_groupid` bigint(11) NOT NULL DEFAULT '0',
  `fh_aksestype` varchar(5) NOT NULL DEFAULT 'A-E-D',
  PRIMARY KEY (`fh_aksesid`),
  KEY `fh_aksestype` (`fh_aksestype`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- ----------------------------
-- Records of fh_menu_akses
-- ----------------------------
INSERT INTO `fh_menu_akses` (`fh_aksesid`, `fh_menuid`, `fh_groupid`, `fh_aksestype`) VALUES
(11, 11, 1, 'A-E-D'),
(10, 10, 1, 'A-E-D'),
(9, 9, 1, 'A-E-D'),
(8, 8, 1, 'A-E-D'),
(7, 7, 1, 'A-E-D'),
(6, 6, 1, 'A-E-D'),
(5, 5, 1, 'A-E-D'),
(4, 4, 1, 'A-E-D'),
(3, 3, 1, 'A-E-D'),
(2, 2, 1, 'A-E-D'),
(1, 1, 1, 'A-E-D');

-- ----------------------------
-- Table structure for `fh_menu_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `fh_menu_kategori`;
CREATE TABLE `fh_menu_kategori` (
  `fh_kategorimenuid` bigint(11) NOT NULL AUTO_INCREMENT,
  `fh_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`fh_kategorimenuid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fh_menu_kategori
-- ----------------------------
INSERT INTO `fh_menu_kategori` VALUES ('1', 'Core System FaberCMS');
INSERT INTO `fh_menu_kategori` VALUES ('2', 'Content Management');

-- ----------------------------
-- Table structure for `fh_struktur_menu`
-- ----------------------------
DROP TABLE IF EXISTS `fh_pagestatis`;
CREATE TABLE `fh_pagestatis` (
  `fh_strukturid` int(11) NOT NULL AUTO_INCREMENT,
  `fh_strukturparent` int(11) NOT NULL,
  `fh_strukturparenttipe` enum('Parent','Content') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_strukturtipe` enum('Statis','Module') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_strukturstatus` enum('Active','Hidden') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_strukturprioritas` int(11) NOT NULL,
  `fh_menu_pageheader` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_pageheader_en` varchar(255) NOT NULL,
  `fh_menu_metakeyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_metadescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_name_en` varchar(255) NOT NULL,
  `fh_menu_slug` varchar(255) NOT NULL,
  `fh_content_banner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_content_titlename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_content_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_content_titlename_en` varchar(255) NOT NULL,
  `fh_content_description_en` text NOT NULL,
  `fh_modulefilename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_cat` enum('Main Menu','Top Menu','Bottom Menu') NOT NULL DEFAULT 'Main Menu',
  `fh_menu_catselected` varchar(255) NULL,
  PRIMARY KEY (`fh_strukturid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- ----------------------------
-- Table structure for `fh_struktur_menu`
-- ----------------------------
DROP TABLE IF EXISTS `fh_struktur_menu`;
CREATE TABLE `fh_struktur_menu` (
  `fh_strukturid` int(11) NOT NULL AUTO_INCREMENT,
  `fh_strukturparent` int(11) NOT NULL,
  `fh_strukturparenttipe` enum('Parent','Content') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_strukturtipe` enum('Page Statis','Custom Link') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_strukturstatus` enum('Active','Hidden') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_strukturprioritas` int(11) NOT NULL,
  `fh_menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_name_en` varchar(255) NOT NULL,
  `fh_pagestatisid` int(11) NOT NULL,
  `fh_modulefilename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fh_menu_cat` enum('Main Menu','Top Menu','Bottom Menu') NOT NULL DEFAULT 'Main Menu',
  PRIMARY KEY (`fh_strukturid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- ----------------------------
-- Table structure for `fh_user`
-- ----------------------------
DROP TABLE IF EXISTS `fh_user`;
CREATE TABLE `fh_user` (
  `fh_userid` bigint(11) NOT NULL AUTO_INCREMENT,
  `fh_usergroupid` bigint(20) NOT NULL DEFAULT '0',
  `fh_username` varchar(20) NOT NULL DEFAULT '',
  `fh_password` varchar(255) NOT NULL,
  `fh_name` varchar(255) NOT NULL DEFAULT '',
  `fh_address` varchar(255) NOT NULL DEFAULT '',
  `fh_email` varchar(100) NOT NULL DEFAULT '',
  `fh_phone` varchar(20) NOT NULL DEFAULT '',
  `fh_mobile` varchar(35) NOT NULL DEFAULT '',
  `fh_date` datetime DEFAULT '0000-00-00 00:00:00',
  `fh_logindate` datetime DEFAULT '0000-00-00 00:00:00',
  `fh_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fh_userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fh_user
-- ----------------------------
INSERT INTO `fh_user` VALUES ('1', '1', 'sysadmincms', 'QVNDAyPgHdLsU8nWtvqGoclc+n+MugPyQrXxkzSGAA==', 'Administrator', '', 'andry@faberhost.co.id', '', '', '0000-00-00 00:00:00', '2012-11-16 22:33:43', '0');

-- ----------------------------
-- Table structure for `fh_usergroup`
-- ----------------------------
DROP TABLE IF EXISTS `fh_usergroup`;
CREATE TABLE `fh_usergroup` (
  `fh_usergroupid` bigint(20) NOT NULL AUTO_INCREMENT,
  `fh_usergroupname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`fh_usergroupid`),
  UNIQUE KEY `fh_usergroupid_2` (`fh_usergroupid`),
  KEY `fh_usergroupid` (`fh_usergroupid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fh_usergroup
-- ----------------------------
INSERT INTO `fh_usergroup` VALUES ('1', 'Administrator');

-- ----------------------------
-- Table structure for `fh_userlog`
-- ----------------------------
DROP TABLE IF EXISTS `fh_userlog`;
CREATE TABLE `fh_userlog` (
  `fh_userlogid` bigint(11) NOT NULL AUTO_INCREMENT,
  `fh_userid` bigint(11) NOT NULL DEFAULT '0',
  `fh_usergroupid` bigint(11) NOT NULL DEFAULT '0',
  `fh_pagetitle` varchar(255) NOT NULL DEFAULT '',
  `fh_action` varchar(255) NOT NULL DEFAULT '',
  `fh_description` varchar(255) NOT NULL DEFAULT '',
  `fh_date` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`fh_userlogid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


-- ----------------------------
-- Table structure for `fh_themes`
-- ----------------------------
DROP TABLE IF EXISTS `fh_themes`;
CREATE TABLE `fh_themes` (
  `fh_themesid` bigint(20) NOT NULL AUTO_INCREMENT,
  `fh_themesdir` varchar(255) NOT NULL DEFAULT '',
  `fh_themesstatus` enum('Show','Hidden') NOT NULL,
  PRIMARY KEY (`fh_themesid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
  
-- ----------------------------
-- Records of fh_usergroup
-- ----------------------------
INSERT INTO `fh_themes` VALUES ('1', 'default','Show');
