# 备份标识: MjAxNC0wNC0yOCAwOTozNDoyNywgMQ==
# 分卷:1
# 时间: 2014-04-28 09:34:27
DROP TABLE IF EXISTS `dili_admins`;
CREATE TABLE IF NOT EXISTS `dili_admins` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `realname` varchar(12) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `role` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0=未审核，1=正常，2=冻结',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `group` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO `dili_admins` VALUES ('1','admin','bbc58b6724fe750661200617c75e736f02e8fb52','0678d2b4d2',NULL,NULL,'hello@dilicms.com','1','1');
INSERT INTO `dili_admins` VALUES ('26','896776165@qq.com','f71312e69c063bd48fb750d8896eb444946a7076','e186d81ce1',NULL,NULL,'896776165@qq.com','0','0');

DROP TABLE IF EXISTS `dili_attachments`;
CREATE TABLE IF NOT EXISTS `dili_attachments` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` smallint(10) NOT NULL DEFAULT '0',
  `model` mediumint(10) DEFAULT '0',
  `from` tinyint(1) DEFAULT '0' COMMENT '0:content model,1:cate model',
  `content` int(10) DEFAULT '0',
  `name` varchar(30) DEFAULT NULL,
  `folder` varchar(15) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `image` tinyint(1) DEFAULT '0',
  `posttime` int(11) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO `dili_attachments` VALUES ('30','1','1','0','12','139522435877cf2623db404648','2014/03','pro-newtown-02','jpg','1','1395224358');
INSERT INTO `dili_attachments` VALUES ('29','1','1','0','12','13952241564c74363a6ab88339','2014/03','pro-newtown-02','jpg','1','1395224156');
INSERT INTO `dili_attachments` VALUES ('26','1','2','0','7','1395214820b7475818846feff7','2014/03','pro-newtown-02','jpg','1','1395214820');
INSERT INTO `dili_attachments` VALUES ('27','1','1','0','12','139522392303d956da22d713b7','2014/03','pro-newtown-02','jpg','1','1395223923');
INSERT INTO `dili_attachments` VALUES ('28','1','1','0','12','13952240651af0acb2c033a243','2014/03','pro-newtown-02','jpg','1','1395224065');
INSERT INTO `dili_attachments` VALUES ('17','1','1','0','5','1395213532b6c6006d5bd92208','2014/03','logo','gif','1','1395213532');
INSERT INTO `dili_attachments` VALUES ('18','1','1','0','6','1395213813a6becf175f3ce913','2014/03','bdlogo','gif','1','1395213813');
INSERT INTO `dili_attachments` VALUES ('19','1','1','0','7','139521390808e5bcd80c1f8bd9','2014/03','logonew','png','1','1395213908');
INSERT INTO `dili_attachments` VALUES ('20','1','1','0','8','1395214045ecedf4d3a23753df','2014/03','logo-201305','png','1','1395214045');
INSERT INTO `dili_attachments` VALUES ('21','1','1','0','9','1395214106ff8d4329a5192bb0','2014/03','logo','gif','1','1395214106');
INSERT INTO `dili_attachments` VALUES ('22','1','1','0','10','13952141865f9c9da6b57a4736','2014/03','logo','gif','1','1395214186');
INSERT INTO `dili_attachments` VALUES ('23','1','1','0','11','13952142784e823c0e1b81858a','2014/03','vip','png','1','1395214278');
INSERT INTO `dili_attachments` VALUES ('24','1','1','0','12','1395214347ca6618150ed2805a','2014/03','logo_58939df1','gif','1','1395214347');
INSERT INTO `dili_attachments` VALUES ('25','1','2','0','7','13952147868a581e60ec496d88','2014/03','pro-banner-01','jpg','1','1395214786');
INSERT INTO `dili_attachments` VALUES ('31','1','1','0','12','139522442478aec55dd8fb2eb6','2014/03','pro-newtown-02','jpg','1','1395224424');
INSERT INTO `dili_attachments` VALUES ('32','18','2','0','11','13953050840c022c1e0df4e559','2014/03','logonew','png','1','1395305084');
INSERT INTO `dili_attachments` VALUES ('33','18','2','0','11','1395305084382c0cee8a95bd6d','2014/03','pro-newtown-02','jpg','1','1395305084');

DROP TABLE IF EXISTS `dili_backend_settings`;
CREATE TABLE IF NOT EXISTS `dili_backend_settings` (
  `backend_theme` varchar(15) DEFAULT NULL,
  `backend_lang` varchar(10) DEFAULT NULL,
  `backend_root_access` tinyint(1) unsigned DEFAULT '1',
  `backend_access_point` varchar(20) DEFAULT 'admin',
  `backend_title` varchar(100) DEFAULT 'DiliCMS后台管理',
  `backend_logo` varchar(100) DEFAULT 'images/logo.gif',
  `plugin_dev_mode` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `dili_backend_settings` VALUES ('default','zh-cn','1','','元合资源云','images/logo.gif','1');

DROP TABLE IF EXISTS `dili_cate_fields`;
CREATE TABLE IF NOT EXISTS `dili_cate_fields` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `model` smallint(10) unsigned DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `length` smallint(10) unsigned DEFAULT NULL,
  `values` tinytext,
  `width` smallint(10) DEFAULT NULL,
  `height` smallint(10) DEFAULT NULL,
  `rules` tinytext,
  `ruledescription` tinytext,
  `searchable` tinyint(1) unsigned DEFAULT NULL,
  `listable` tinyint(1) unsigned DEFAULT NULL,
  `order` int(5) unsigned DEFAULT NULL,
  `editable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`model`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `dili_cate_fields` VALUES ('1','title','公司分类名称','1','input','100','','0','0','required','','1','1','0','1');
INSERT INTO `dili_cate_fields` VALUES ('8','counts','分类记录统计','3','int','8','0','0','0','','该分类中资源数目（暂时手动设置）','0','0','4','1');
INSERT INTO `dili_cate_fields` VALUES ('3','title','资源所属分类','3','input','100','','0','0','required','','1','1','1','1');
INSERT INTO `dili_cate_fields` VALUES ('4','title','项目分类名称','4','input','8','','0','0','required','','1','1','0','1');
INSERT INTO `dili_cate_fields` VALUES ('6','title','新闻分类名称','6','input','100','','0','0','required','','0','1','0','1');
INSERT INTO `dili_cate_fields` VALUES ('9','intro','分类描述','3','textarea','0','','0','0','','','0','0','3','1');
INSERT INTO `dili_cate_fields` VALUES ('10','intro_title','分类描述的标题','3','input','255','','0','0','','','0','0','2','1');
INSERT INTO `dili_cate_fields` VALUES ('12','title','产品分类名称','7','input','255','','0','0','required','','0','1','0','1');

DROP TABLE IF EXISTS `dili_cate_models`;
CREATE TABLE IF NOT EXISTS `dili_cate_models` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `perpage` varchar(2) NOT NULL,
  `level` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `hasattach` tinyint(1) NOT NULL DEFAULT '0',
  `built_in` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `dili_cate_models` VALUES ('1','companies_class','公司分类','5','1','0','0');
INSERT INTO `dili_cate_models` VALUES ('3','resources_class','资源分类','5','2','0','0');
INSERT INTO `dili_cate_models` VALUES ('4','projects_class','项目分类','5','1','0','0');
INSERT INTO `dili_cate_models` VALUES ('6','news_class','新闻分类','5','1','0','0');
INSERT INTO `dili_cate_models` VALUES ('7','products_class','产品分类','5','1','0','0');

DROP TABLE IF EXISTS `dili_fieldtypes`;
CREATE TABLE IF NOT EXISTS `dili_fieldtypes` (
  `k` varchar(20) NOT NULL,
  `v` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `dili_fieldtypes` VALUES ('int','整形(INT)');
INSERT INTO `dili_fieldtypes` VALUES ('float','浮点型(FLOAT)');
INSERT INTO `dili_fieldtypes` VALUES ('input','单行文本框(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('textarea','文本区域(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('select','下拉菜单(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('select_from_model','下拉菜单(模型数据)(INT)');
INSERT INTO `dili_fieldtypes` VALUES ('linked_menu','联动下拉菜单(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('radio','单选按钮(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('radio_from_model','单选按钮(模型数据)(INT)');
INSERT INTO `dili_fieldtypes` VALUES ('checkbox','复选框(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('checkbox_from_model','复选框(模型数据)(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('wysiwyg','编辑器(TEXT)');
INSERT INTO `dili_fieldtypes` VALUES ('wysiwyg_basic','编辑器(简)(TEXT)');
INSERT INTO `dili_fieldtypes` VALUES ('datetime','日期时间(VARCHAR)');
INSERT INTO `dili_fieldtypes` VALUES ('content','内容模型调用(INT)');

DROP TABLE IF EXISTS `dili_menus`;
CREATE TABLE IF NOT EXISTS `dili_menus` (
  `menu_id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(20) NOT NULL,
  `method_name` varchar(30) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `menu_level` tinyint(2) unsigned DEFAULT '0',
  `menu_parent` tinyint(10) unsigned DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `dili_menus` VALUES ('1','system','home','系统','0','0');
INSERT INTO `dili_menus` VALUES ('2','system','home','后台首页','1','1');
INSERT INTO `dili_menus` VALUES ('3','system','home','后台首页','2','2');
INSERT INTO `dili_menus` VALUES ('4','setting','site','系统设置','1','1');
INSERT INTO `dili_menus` VALUES ('5','setting','site','站点设置','2','4');
INSERT INTO `dili_menus` VALUES ('6','setting','backend','后台设置','2','4');
INSERT INTO `dili_menus` VALUES ('7','system','password','修改密码','2','4');
INSERT INTO `dili_menus` VALUES ('8','system','cache','更新缓存','2','4');
INSERT INTO `dili_menus` VALUES ('9','model','view','模型管理','1','1');
INSERT INTO `dili_menus` VALUES ('10','model','view','内容模型管理','2','9');
INSERT INTO `dili_menus` VALUES ('11','category','view','分类模型管理','2','9');
INSERT INTO `dili_menus` VALUES ('12','plugin','view','扩展管理','1','1');
INSERT INTO `dili_menus` VALUES ('13','plugin','view','插件管理','2','12');
INSERT INTO `dili_menus` VALUES ('14','role','view','权限管理','1','1');
INSERT INTO `dili_menus` VALUES ('15','role','view','用户组管理','2','14');
INSERT INTO `dili_menus` VALUES ('16','user','view','用户管理','2','14');
INSERT INTO `dili_menus` VALUES ('17','content','view','内容管理','0','0');
INSERT INTO `dili_menus` VALUES ('18','content','view','内容管理','1','17');
INSERT INTO `dili_menus` VALUES ('19','category_content','view','分类管理','1','17');
INSERT INTO `dili_menus` VALUES ('20','module','run','插件','0','0');
INSERT INTO `dili_menus` VALUES ('21','database','index','数据库管理','1','1');
INSERT INTO `dili_menus` VALUES ('22','database','index','数据库备份','2','21');
INSERT INTO `dili_menus` VALUES ('23','database','recover','数据库还原','2','21');
INSERT INTO `dili_menus` VALUES ('24','database','optimize','数据库优化','2','21');

DROP TABLE IF EXISTS `dili_model_fields`;
CREATE TABLE IF NOT EXISTS `dili_model_fields` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `model` smallint(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `length` smallint(10) unsigned DEFAULT NULL,
  `values` tinytext NOT NULL,
  `width` smallint(10) unsigned NOT NULL,
  `height` smallint(10) unsigned NOT NULL,
  `rules` tinytext NOT NULL,
  `ruledescription` tinytext NOT NULL,
  `searchable` tinyint(1) unsigned NOT NULL,
  `listable` tinyint(1) unsigned NOT NULL,
  `order` int(5) unsigned DEFAULT NULL,
  `editable` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`model`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

INSERT INTO `dili_model_fields` VALUES ('1','classid','公司所属分类','1','select_from_model','8','companies_class|title','0','0','required','','0','1','1','1');
INSERT INTO `dili_model_fields` VALUES ('2','title','公司名称','1','input','150','','0','0','required','','1','1','2','1');
INSERT INTO `dili_model_fields` VALUES ('5','sort','排序','1','int','4','0','0','0','','','0','1','6','1');
INSERT INTO `dili_model_fields` VALUES ('49','classid','新闻所属分类','5','radio_from_model','8','news_class|title','0','0','required','','0','1','1','1');
INSERT INTO `dili_model_fields` VALUES ('7','title','产品名称','2','input','150','','0','0','required','','1','1','2','1');
INSERT INTO `dili_model_fields` VALUES ('8','adv','广告位图片','2','file','255','jpg|png|jpeg|bmp','0','0','','','0','0','3','1');
INSERT INTO `dili_model_fields` VALUES ('9','cover','产品封面图','2','file','255','jpg|png|jpeg|bmp','0','0','','','0','1','4','1');
INSERT INTO `dili_model_fields` VALUES ('10','intro','产品简介','2','textarea','255','','0','0','required','','0','1','5','1');
INSERT INTO `dili_model_fields` VALUES ('11','info','产品详细介绍','2','wysiwyg_basic','0','','0','0','required','','0','0','6','1');
INSERT INTO `dili_model_fields` VALUES ('14','sort','排序','2','int','8','0','0','0','','','0','1','7','1');
INSERT INTO `dili_model_fields` VALUES ('15','classid','资源所属分类','3','select_from_model','8','resources_class|title','0','0','required','','0','1','1','1');
INSERT INTO `dili_model_fields` VALUES ('16','title','资源名称','3','input','255','','0','0','required','','0','1','2','1');
INSERT INTO `dili_model_fields` VALUES ('17','cover','资源封面图','3','file','255','jpg|png|jpeg|bmp','0','0','','','0','1','3','1');
INSERT INTO `dili_model_fields` VALUES ('18','intro','资源简介','3','textarea','255','','0','0','required','','0','1','4','1');
INSERT INTO `dili_model_fields` VALUES ('19','info','资源详细介绍','3','wysiwyg_basic','0','','0','0','required','','0','0','5','1');
INSERT INTO `dili_model_fields` VALUES ('22','sort','排序','3','int','8','0','0','0','','','0','1','6','1');
INSERT INTO `dili_model_fields` VALUES ('23','classid','项目所属分类','4','select_from_model','8','projects_class|title','0','0','required','','0','1','1','1');
INSERT INTO `dili_model_fields` VALUES ('24','title','项目名称','4','input','150','','0','0','required','','0','1','2','1');
INSERT INTO `dili_model_fields` VALUES ('25','adv','广告位图片','4','file','255','jpg|png|jpeg|bmp','0','0','','','0','0','5','1');
INSERT INTO `dili_model_fields` VALUES ('26','cover','项目封面图','4','file','255','jpg|png|jpeg|bmp','0','0','','','0','1','6','1');
INSERT INTO `dili_model_fields` VALUES ('27','begin_time','项目启动时间','4','datetime','0','','0','0','required','','0','1','3','1');
INSERT INTO `dili_model_fields` VALUES ('28','end_time','项目截止时间','4','datetime','0','','0','0','required','','0','1','4','1');
INSERT INTO `dili_model_fields` VALUES ('29','intro','项目简介','4','textarea','255','','0','0','required','','0','1','7','1');
INSERT INTO `dili_model_fields` VALUES ('30','info','项目详细介绍','4','wysiwyg_basic','0','','0','0','required','','0','0','8','1');
INSERT INTO `dili_model_fields` VALUES ('54','products_id','所属产品名称','4','content','8','products|title','0','0','required','','0','0','10','1');
INSERT INTO `dili_model_fields` VALUES ('52','cover','公司logo','1','file','255','jpg|png|jpeg|bmp','0','0','','','0','1','3','1');
INSERT INTO `dili_model_fields` VALUES ('33','sort','排序','4','int','8','0','0','0','','','0','1','9','1');
INSERT INTO `dili_model_fields` VALUES ('34','subclassid','分类下的栏目分类','5','select','8','','0','0','required','','0','0','2','1');
INSERT INTO `dili_model_fields` VALUES ('35','title','新闻标题','5','input','150','','0','0','required','','0','1','3','1');
INSERT INTO `dili_model_fields` VALUES ('36','recommend1','相关新闻推荐1','5','content','10','news|title','0','0','','','0','0','8','1');
INSERT INTO `dili_model_fields` VALUES ('37','cover','新闻封面图','5','file','255','jpg|png|jpeg|bmp','0','0','','','0','1','4','1');
INSERT INTO `dili_model_fields` VALUES ('38','intro','新闻简介','5','textarea','255','','0','0','required','','0','1','5','1');
INSERT INTO `dili_model_fields` VALUES ('39','info','新闻详细内容','5','wysiwyg_basic','0','','0','0','required','','0','0','6','1');
INSERT INTO `dili_model_fields` VALUES ('51','info','公司详细介绍','1','wysiwyg','0','','0','0','','','0','0','5','1');
INSERT INTO `dili_model_fields` VALUES ('50','intro','公司简介','1','textarea','255','','0','0','','','0','1','4','1');
INSERT INTO `dili_model_fields` VALUES ('42','sort','排序','5','int','8','0','0','0','','','0','1','7','1');
INSERT INTO `dili_model_fields` VALUES ('43','companies_id','所属公司名称','3','content','8','companies|title','0','0','required','','0','0','8','1');
INSERT INTO `dili_model_fields` VALUES ('44','products_ids','配置产品','3','linked_menu','0','products_class|title|2|100|1','0','0','','','0','0','9','1');
INSERT INTO `dili_model_fields` VALUES ('45','projects_ids','配置项目','3','linked_menu','0','projects_class|title|2|100|1','0','0','','','0','0','10','1');
INSERT INTO `dili_model_fields` VALUES ('46','resources_ids','资源配置','2','linked_menu','0','resources_class|title|3|100|1','0','0','','','0','0','8','1');
INSERT INTO `dili_model_fields` VALUES ('47','resources_ids','配置资源','4','linked_menu','0','resources_class|title|3|100|1','0','0','','','0','0','11','1');
INSERT INTO `dili_model_fields` VALUES ('48','recommend2','相关新闻推荐2','5','content','8','news|title','0','0','','','0','0','9','1');
INSERT INTO `dili_model_fields` VALUES ('55','static','状态','3','select','8','0=敬请期待|1=现已结束|2=火热进行中','0','0','','','0','1','7','1');
INSERT INTO `dili_model_fields` VALUES ('57','projects_id','所属项目名称','5','content','8','projects|title','0','0','','','0','0','10','1');
INSERT INTO `dili_model_fields` VALUES ('58','company_name','公司名称','6','input','255','','0','0','required','','0','1','0','1');
INSERT INTO `dili_model_fields` VALUES ('59','message','留言内容','6','textarea','255','','0','0','required','','0','0','0','1');
INSERT INTO `dili_model_fields` VALUES ('60','classid','所属分类','2','radio_from_model','8','products_class|title','0','0','required','','0','0','0','1');
INSERT INTO `dili_model_fields` VALUES ('61','verify_img','上传公司资质证明','6','file','255','jpg|png|jpeg|bmp','0','0','','','0','0','0','1');
INSERT INTO `dili_model_fields` VALUES ('62','status','审核状态','6','radio','8','0=未审核|1=审核通过|2=审核未通过','0','0','required','','0','1','0','1');
INSERT INTO `dili_model_fields` VALUES ('63','classids','拥有的资源分类集','6','input','0','','0','0','','','0','0','0','1');

DROP TABLE IF EXISTS `dili_models`;
CREATE TABLE IF NOT EXISTS `dili_models` (
  `id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `perpage` varchar(2) NOT NULL DEFAULT '10',
  `hasattach` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `built_in` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `dili_models` VALUES ('1','companies','公司管理','5','1','0');
INSERT INTO `dili_models` VALUES ('2','products','产品管理','5','1','0');
INSERT INTO `dili_models` VALUES ('3','resources','资源管理','5','1','0');
INSERT INTO `dili_models` VALUES ('4','projects','项目管理','10','1','0');
INSERT INTO `dili_models` VALUES ('5','news','新闻管理','5','1','0');
INSERT INTO `dili_models` VALUES ('6','messages','留言板','10','0','0');

DROP TABLE IF EXISTS `dili_plugins`;
CREATE TABLE IF NOT EXISTS `dili_plugins` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `version` varchar(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `author` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `copyrights` varchar(100) NOT NULL,
  `access` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `dili_plugins` VALUES ('1','m2n','1','多对多表结构存储','根据当前栏目填的相关栏目id集合,用遍列的方式将当前栏目的id存储到各个记录的关联字段中','lxping','','','0','1');

DROP TABLE IF EXISTS `dili_resources_attributes`;
CREATE TABLE IF NOT EXISTS `dili_resources_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resources_classid` int(10) unsigned NOT NULL,
  `resources_id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO `dili_resources_attributes` VALUES ('16','46','4','x1属性1');
INSERT INTO `dili_resources_attributes` VALUES ('17','47','4','x2属性1');
INSERT INTO `dili_resources_attributes` VALUES ('18','48','4','x3属性1');
INSERT INTO `dili_resources_attributes` VALUES ('19','49','4','x4属性1');
INSERT INTO `dili_resources_attributes` VALUES ('20','50','4','x5属性1');
INSERT INTO `dili_resources_attributes` VALUES ('21','66','8','y1属性1');
INSERT INTO `dili_resources_attributes` VALUES ('22','52','5','x2属性1');
INSERT INTO `dili_resources_attributes` VALUES ('23','53','5','x3属性1');
INSERT INTO `dili_resources_attributes` VALUES ('24','52','6','x2属性2');
INSERT INTO `dili_resources_attributes` VALUES ('26','52','7','');
INSERT INTO `dili_resources_attributes` VALUES ('27','53','7','x3属性3');
INSERT INTO `dili_resources_attributes` VALUES ('28','53','6','');

DROP TABLE IF EXISTS `dili_rights`;
CREATE TABLE IF NOT EXISTS `dili_rights` (
  `right_id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `right_name` varchar(30) DEFAULT NULL,
  `right_class` varchar(30) DEFAULT NULL,
  `right_method` varchar(30) DEFAULT NULL,
  `right_detail` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`right_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO `dili_rights` VALUES ('1','密码修改','system','password',NULL);
INSERT INTO `dili_rights` VALUES ('2','更新缓存','system','cache',NULL);
INSERT INTO `dili_rights` VALUES ('3',' 站点设置','setting','site',NULL);
INSERT INTO `dili_rights` VALUES ('4','后台设置','setting','backend',NULL);
INSERT INTO `dili_rights` VALUES ('5','插件管理[列表]','plugin','view',NULL);
INSERT INTO `dili_rights` VALUES ('6','添加插件','plugin','add',NULL);
INSERT INTO `dili_rights` VALUES ('7','修改插件','plugin','edit',NULL);
INSERT INTO `dili_rights` VALUES ('8','卸载插件','plugin','del',NULL);
INSERT INTO `dili_rights` VALUES ('9','导出插件','plugin','export',NULL);
INSERT INTO `dili_rights` VALUES ('10','导入插件','plugin','import',NULL);
INSERT INTO `dili_rights` VALUES ('11','激活插件','plugin','active',NULL);
INSERT INTO `dili_rights` VALUES ('12','禁用插件','plugin','deactive',NULL);
INSERT INTO `dili_rights` VALUES ('13','运行插件','module','run',NULL);
INSERT INTO `dili_rights` VALUES ('14','内容模型管理[列表]','model','view',NULL);
INSERT INTO `dili_rights` VALUES ('15','添加内容模型','model','add',NULL);
INSERT INTO `dili_rights` VALUES ('16','修改内容模型','model','edit',NULL);
INSERT INTO `dili_rights` VALUES ('17','删除内容模型','model','del',NULL);
INSERT INTO `dili_rights` VALUES ('18','内容模型字段管理[列表]','model','fields',NULL);
INSERT INTO `dili_rights` VALUES ('19','添加内容模型字段','model','add_filed',NULL);
INSERT INTO `dili_rights` VALUES ('20','修改内容模型字段','model','edit_field',NULL);
INSERT INTO `dili_rights` VALUES ('21','删除内容模型字段','model','del_field',NULL);
INSERT INTO `dili_rights` VALUES ('22','分类模型管理[列表]','category','view',NULL);
INSERT INTO `dili_rights` VALUES ('23','添加分类模型','category','add',NULL);
INSERT INTO `dili_rights` VALUES ('24','修改分类模型','category','edit',NULL);
INSERT INTO `dili_rights` VALUES ('25','删除分类模型','category','del',NULL);
INSERT INTO `dili_rights` VALUES ('26','分类模型字段管理[列表]','category','fields',NULL);
INSERT INTO `dili_rights` VALUES ('27','添加分类模型字段','category','add_filed',NULL);
INSERT INTO `dili_rights` VALUES ('28','修改分类模型字段','category','edit_field',NULL);
INSERT INTO `dili_rights` VALUES ('29','删除分类模型字段','category','del_field',NULL);
INSERT INTO `dili_rights` VALUES ('30','内容管理[列表]','content','view',NULL);
INSERT INTO `dili_rights` VALUES ('31','添加内容[表单]','content','form','add');
INSERT INTO `dili_rights` VALUES ('32','修改内容[表单]','content','form','edit');
INSERT INTO `dili_rights` VALUES ('33','添加内容[动作]','content','save','add');
INSERT INTO `dili_rights` VALUES ('34','修改内容[动作]','content','save','edit');
INSERT INTO `dili_rights` VALUES ('35','删除内容','content','del',NULL);
INSERT INTO `dili_rights` VALUES ('36','分类管理[列表]','category_content','view',NULL);
INSERT INTO `dili_rights` VALUES ('37','添加分类[表单]','category_content','form','add');
INSERT INTO `dili_rights` VALUES ('38','修改分类[表单]','category_content','form','edit');
INSERT INTO `dili_rights` VALUES ('39','添加分类[动作]','category_content','save','add');
INSERT INTO `dili_rights` VALUES ('40','修改分类[动作]','category_content','save','edit');
INSERT INTO `dili_rights` VALUES ('41','删除分类','category_content','del',NULL);
INSERT INTO `dili_rights` VALUES ('42','用户组管理[列表]','role','view',NULL);
INSERT INTO `dili_rights` VALUES ('43','添加用户组','role','add',NULL);
INSERT INTO `dili_rights` VALUES ('44','修改用户组','role','edit',NULL);
INSERT INTO `dili_rights` VALUES ('45','删除用户组','role','del',NULL);
INSERT INTO `dili_rights` VALUES ('46','用户管理[列表]','user','view',NULL);
INSERT INTO `dili_rights` VALUES ('47','添加用户','user','add',NULL);
INSERT INTO `dili_rights` VALUES ('48','修改用户','user','edit',NULL);
INSERT INTO `dili_rights` VALUES ('49','删除用户','user','del',NULL);
INSERT INTO `dili_rights` VALUES ('50','数据库备份','database','index',NULL);
INSERT INTO `dili_rights` VALUES ('51','数据库还原','database','recover',NULL);
INSERT INTO `dili_rights` VALUES ('52','数据库优化','database','optimize',NULL);

DROP TABLE IF EXISTS `dili_roles`;
CREATE TABLE IF NOT EXISTS `dili_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `models` varchar(255) NOT NULL,
  `category_models` varchar(255) NOT NULL,
  `plugins` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `dili_roles` VALUES ('1','root','','','','');
INSERT INTO `dili_roles` VALUES ('2','超级管理员','1,2,3,4,30,31,32,33,34,35,36,37,38,39,40,41','companies,products,resources,projects,news,messages','companies_class,resources_class,projects_class,news_class,products_class','m2n');

DROP TABLE IF EXISTS `dili_sessions`;
CREATE TABLE IF NOT EXISTS `dili_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `dili_sessions` VALUES ('dd6a243fcc47ba624dbb385fbb2e97e0','::1','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36','1398648850','a:2:{s:9:\"user_data\";s:0:\"\";s:3:\"uid\";s:1:\"1\";}');

DROP TABLE IF EXISTS `dili_site_settings`;
CREATE TABLE IF NOT EXISTS `dili_site_settings` (
  `site_name` varchar(50) DEFAULT NULL,
  `site_domain` varchar(50) DEFAULT NULL,
  `site_logo` varchar(50) DEFAULT NULL,
  `site_icp` varchar(50) DEFAULT NULL,
  `site_terms` text,
  `site_stats` varchar(200) DEFAULT NULL,
  `site_footer` varchar(500) DEFAULT NULL,
  `site_status` tinyint(1) DEFAULT '1',
  `site_close_reason` varchar(200) DEFAULT NULL,
  `site_keyword` varchar(200) DEFAULT NULL,
  `site_description` varchar(200) DEFAULT NULL,
  `site_theme` varchar(20) DEFAULT NULL,
  `attachment_url` varchar(50) DEFAULT NULL,
  `attachment_dir` varchar(20) DEFAULT NULL,
  `attachment_type` varchar(50) DEFAULT NULL,
  `attachment_maxupload` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `dili_site_settings` VALUES ('元合开发云','http://www.dilicms.com/','images/logo.gif','','','','','1','网站维护升级中......','城镇化,区域开发,农业,汽车,新媒体','大型项目开发资源云平台','default',NULL,'attachments','*.jpg;*.gif;*.png;*.doc','2097152');

DROP TABLE IF EXISTS `dili_u_c_companies_class`;
CREATE TABLE IF NOT EXISTS `dili_u_c_companies_class` (
  `classid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(5) unsigned NOT NULL DEFAULT '0',
  `level` int(2) unsigned NOT NULL DEFAULT '1',
  `path` varchar(50) DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_c_companies_class` VALUES ('5','0','1','{0}','公司分类一');
INSERT INTO `dili_u_c_companies_class` VALUES ('6','0','1','{0}','公司分类二');
INSERT INTO `dili_u_c_companies_class` VALUES ('7','0','1','{0}','公司分类三');
INSERT INTO `dili_u_c_companies_class` VALUES ('8','0','1','{0}','公司分类四');
INSERT INTO `dili_u_c_companies_class` VALUES ('9','0','1','{0}','公司分类五');

DROP TABLE IF EXISTS `dili_u_c_news_class`;
CREATE TABLE IF NOT EXISTS `dili_u_c_news_class` (
  `classid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(5) unsigned NOT NULL DEFAULT '0',
  `level` int(2) unsigned NOT NULL DEFAULT '1',
  `path` varchar(50) DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_c_news_class` VALUES ('1','0','1','{0}','项目新闻');
INSERT INTO `dili_u_c_news_class` VALUES ('2','0','1','{0}','资源新闻');

DROP TABLE IF EXISTS `dili_u_c_products_class`;
CREATE TABLE IF NOT EXISTS `dili_u_c_products_class` (
  `classid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(5) unsigned NOT NULL DEFAULT '0',
  `level` int(2) unsigned NOT NULL DEFAULT '1',
  `path` varchar(50) DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_c_products_class` VALUES ('1','0','1','{0}','默认分类');

DROP TABLE IF EXISTS `dili_u_c_projects_class`;
CREATE TABLE IF NOT EXISTS `dili_u_c_projects_class` (
  `classid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(5) unsigned NOT NULL DEFAULT '0',
  `level` int(2) unsigned NOT NULL DEFAULT '1',
  `path` varchar(50) DEFAULT '',
  `title` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_c_projects_class` VALUES ('3','0','1','{0}','项目分类一');
INSERT INTO `dili_u_c_projects_class` VALUES ('4','0','1','{0}','项目分类二');
INSERT INTO `dili_u_c_projects_class` VALUES ('5','0','1','{0}','项目分类三');
INSERT INTO `dili_u_c_projects_class` VALUES ('6','0','1','{0}','项目分类四');
INSERT INTO `dili_u_c_projects_class` VALUES ('7','0','1','{0}','项目分类五');

DROP TABLE IF EXISTS `dili_u_c_resources_class`;
CREATE TABLE IF NOT EXISTS `dili_u_c_resources_class` (
  `classid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(5) unsigned DEFAULT '0',
  `level` int(2) unsigned NOT NULL DEFAULT '1',
  `path` varchar(50) DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `counts` int(8) NOT NULL DEFAULT '0',
  `intro` varchar(100) NOT NULL DEFAULT '',
  `intro_title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_c_resources_class` VALUES ('42','0','1','{0}','X','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('43','0','1','{0}','2','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('44','0','1','{0}','Y','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('45','42','2','{0},{42}','X分类一','10','X分类一分类描述','X分类一描述的标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('46',NULL,'45','','x1属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('47',NULL,'45','','x2属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('48',NULL,'45','','x3属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('49',NULL,'45','','x4属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('50',NULL,'45','','x5属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('51','42','2','{0},{42}','X分类二','5','X分类二分类描述','X分类二描述标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('52',NULL,'51','','x2属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('53',NULL,'51','','x3属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('54','42','2','{0},{42}','X分类三','19','X分类三分类描述','X分类三描述的标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('55',NULL,'54','','x3属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('56',NULL,'54','','x17属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('57',NULL,'54','','x8属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('58','43','2','{0},{43}','2分类一','0','2分类一分类描述','2分类一描述的标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('59',NULL,'58','','2a属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('60',NULL,'58','','2b属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('61',NULL,'58','','2c属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('62','43','2','{0},{43}','2分类二','230','2分类二分类描述','2分类二描述的标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('63',NULL,'62','','2b属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('64',NULL,'62','','2c属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('65','44','2','{0},{44}','Y分类一','1','Y分类一分类描述','Y分类一描述的标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('66',NULL,'65','','y1属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('67','44','2','{0},{44}','Y分类二','0','Y分类二分类描述','Y分类二描述的标题');
INSERT INTO `dili_u_c_resources_class` VALUES ('68',NULL,'67','','y2属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('69',NULL,'67','','y3属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('70',NULL,'67','','y4属性','0','','');
INSERT INTO `dili_u_c_resources_class` VALUES ('71',NULL,'67','','y5属性','0','','');

DROP TABLE IF EXISTS `dili_u_m_companies`;
CREATE TABLE IF NOT EXISTS `dili_u_m_companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `update_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `classid` int(8) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '',
  `sort` int(4) NOT NULL DEFAULT '0',
  `intro` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `cover` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_m_companies` VALUES ('5','1395213587','1395213625','1','1','5','公司名称1.1','0','公司简介1.1','<p>\r\n	公司详细介绍1.1\r\n</p>\r\n<p>\r\n	<span>公司详细介绍1.1</span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>公司详细介绍1.1</span></span>\r\n</p>\r\n<p>\r\n	<span><br />\r\n</span>\r\n</p>\r\n<p>\r\n</p>','/2014/03/1395213532b6c6006d5bd92208.gif');
INSERT INTO `dili_u_m_companies` VALUES ('6','1395213693','1395213821','1','1','5','公司名称1.2','0','公司简介1.2','公司详细介绍1.2 &nbsp;&nbsp;<span>公司详细介绍</span><span>1.2 &nbsp;&nbsp;<span>公司详细介绍</span><span>1.2 &nbsp;<span>公司详细介绍</span><span>1.2 &nbsp;<span>公司详细介绍</span><span>1.2 &nbsp;<span>公司详细介绍</span><span>1.2</span></span></span></span></span>','/2014/03/1395213813a6becf175f3ce913.gif');
INSERT INTO `dili_u_m_companies` VALUES ('7','1395213889','1395213920','1','1','6','公司名称2.1','0','公司简介2.1','<p>\r\n	公司详细介绍2.1&nbsp;<span>公司详细介绍</span><span>2.1&nbsp;<span>公司详细介绍</span><span>2.1</span></span> \r\n</p>\r\n<p>\r\n	<span><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span><span><span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1</span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><br />\r\n</span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1<span>公司详细介绍</span><span>2.1&nbsp;</span><span>公司详细介绍</span><span>2.1&nbsp;公司详细介绍2.1</span></span></span></span></span></span></span></span></span></span></span></span> \r\n</p>','/2014/03/139521390808e5bcd80c1f8bd9.png');
INSERT INTO `dili_u_m_companies` VALUES ('8','1395214051','1395214051','1','1','7','公司名称3.1','0','公司简介3.1','公司详细介绍3.1','/2014/03/1395214045ecedf4d3a23753df.png');
INSERT INTO `dili_u_m_companies` VALUES ('9','1395214115','1395214115','1','1','7','公司名称3.2','0','公司简介3.2','公司详细介绍3.2','/2014/03/1395214106ff8d4329a5192bb0.gif');
INSERT INTO `dili_u_m_companies` VALUES ('10','1395214192','1395214192','1','1','7','公司名称3.3','0','公司简介3.3','公司详细介绍3.3','/2014/03/13952141865f9c9da6b57a4736.gif');
INSERT INTO `dili_u_m_companies` VALUES ('11','1395214283','1395214283','1','1','7','公司名称3.4','0','公司简介3.4','公司详细介绍3.4','/2014/03/13952142784e823c0e1b81858a.png');
INSERT INTO `dili_u_m_companies` VALUES ('12','1395214353','1395224552','1','1','7','公司名称3.5','0','公司简介3.5','公司详细介绍3.5','/2014/03/139522442478aec55dd8fb2eb6.jpg');

DROP TABLE IF EXISTS `dili_u_m_messages`;
CREATE TABLE IF NOT EXISTS `dili_u_m_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `update_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `message` varchar(255) NOT NULL DEFAULT '',
  `verify_img` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(8) NOT NULL DEFAULT '',
  `classids` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_m_messages` VALUES ('7','1396944521','1396944521','26','26','','稍等第三方斯蒂芬','','0','');

DROP TABLE IF EXISTS `dili_u_m_news`;
CREATE TABLE IF NOT EXISTS `dili_u_m_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `update_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `subclassid` varchar(8) NOT NULL DEFAULT '',
  `title` varchar(150) NOT NULL DEFAULT '',
  `recommend1` int(10) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `intro` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `sort` int(8) NOT NULL DEFAULT '0',
  `recommend2` int(8) NOT NULL DEFAULT '0',
  `classid` int(8) NOT NULL DEFAULT '0',
  `projects_id` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_m_news` VALUES ('5','1395218726','1395286037','1','1','51','新闻标题-项目新闻1','0','/2014/03/1395214820b7475818846feff7.jpg','新闻标题-项目新闻-新闻简介1','新闻标题-项目新闻-新闻内容1','1','0','2','10');
INSERT INTO `dili_u_m_news` VALUES ('6','1395218804','1395302527','1','1','51','新闻标题-项目新闻2','0','/2014/03/1395214820b7475818846feff7.jpg','新闻标题-项目新闻-新闻简介2','新闻标题-项目新闻-新闻详细内容2','233','7','2','11');
INSERT INTO `dili_u_m_news` VALUES ('7','1395218859','1395286028','1','1','5','新闻标题-资源新闻1','0','/2014/03/1395214820b7475818846feff7.jpg','新闻标题-资源新闻-新闻简介1','新闻标题-资源新闻-新闻详细内容1','0','0','1','10');
INSERT INTO `dili_u_m_news` VALUES ('8','1395219153','1395302513','1','1','4','新闻标题-项目新闻3','6','/2014/03/1395214820b7475818846feff7.jpg','新闻标题-项目新闻-新闻简介3','新闻标题-项目新闻-新闻详细内容3','12','5','1','11');

DROP TABLE IF EXISTS `dili_u_m_products`;
CREATE TABLE IF NOT EXISTS `dili_u_m_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `update_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '',
  `adv` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `intro` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `sort` int(8) NOT NULL DEFAULT '0',
  `resources_ids` varchar(100) NOT NULL DEFAULT '',
  `classid` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_m_products` VALUES ('7','1395214836','1395215173','1','1','产品名称1','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','产品简介1','<p>\r\n	产品详细介绍1<span>产品详细介绍1<span>产品详细介绍1<span>产品详细介绍1<span>产品详细介绍1</span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><br />\r\n</span>\r\n</p>\r\n<p>\r\n	<span><span>产品详细介绍1</span><span>产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1</span></span>\r\n</p>\r\n<p>\r\n	<span><span>产品详细介绍1</span><span>产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1<span>产品详细介绍1</span><span>产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1<span>产品详细介绍1</span><span>产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1<span>产品详细介绍1</span><span>产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1</span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><br />\r\n</span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><br />\r\n</span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><span style=\"color:#E53333;\">产品详细介绍1</span><span><span style=\"color:#E53333;\">产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1</span><span style=\"color:#E53333;\">产品详细介绍1</span><span><span style=\"color:#E53333;\">产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1</span><span style=\"color:#E53333;\">产品详细介绍1</span><span style=\"color:#E53333;\">产品详细介绍1产品详细介绍1产品详细介绍1产品详细介绍1</span></span></span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span></span></span></span></span></span><br />\r\n</span>\r\n</p>','0','','1');
INSERT INTO `dili_u_m_products` VALUES ('8','1395214915','1395215110','1','1','产品名称2','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','产品简介2','产品详细介绍2','0','','1');
INSERT INTO `dili_u_m_products` VALUES ('9','1395214953','1395215093','1','1','产品名称3','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','产品简介3','产品详细介绍3','0','','1');
INSERT INTO `dili_u_m_products` VALUES ('10','1395214995','1395215148','1','1','产品名称4','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','产品简介4','&nbsp;<span>&nbsp;</span><span>产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4<span>&nbsp;</span><span>产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4<span>&nbsp;</span><span>产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4&nbsp;产品详细介绍4</span></span></span>','0','','1');
INSERT INTO `dili_u_m_products` VALUES ('11','1395215034','1395305092','1','18','产品名称5','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','产品简介5','<p>\r\n	产品详细介绍5\r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<span>产品详细介绍5</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>','0','42-51-6|42-51-7','1');

DROP TABLE IF EXISTS `dili_u_m_projects`;
CREATE TABLE IF NOT EXISTS `dili_u_m_projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `update_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `classid` int(8) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '',
  `adv` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `begin_time` varchar(100) NOT NULL DEFAULT '',
  `end_time` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `sort` int(8) NOT NULL DEFAULT '0',
  `resources_ids` varchar(100) NOT NULL DEFAULT '',
  `products_id` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_m_projects` VALUES ('10','1395216596','1395217207','1','1','3','项目名称1.1','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','2014-03-19 16:09:04','2014-03-31 16:09:06','项目简介1.1','项目详细介绍1.1','0','42-45-4|42-51-5|44-65-8','7');
INSERT INTO `dili_u_m_projects` VALUES ('11','1395217384','1395289832','1','1','4','项目名称2.1','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','2014-03-19 16:21:29','2014-05-30 16:21:00','项目简介2.1','<p>\r\n	项目详细介绍2.1\r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>\r\n<p>\r\n	<span>项目详细介绍</span><span>2.1</span> \r\n</p>','0','42-51-6|42-51-7|42-45-4','7');
INSERT INTO `dili_u_m_projects` VALUES ('12','1395217522','1395217522','1','1','4','项目名称2.2','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','2014-03-19 16:24:03','2014-03-19 16:24:04','项目简介2.2','项目详细介绍2.2','0','42-51-7','8');
INSERT INTO `dili_u_m_projects` VALUES ('13','1395217586','1395218109','1','1','4','项目名称2.3','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','2014-03-19 16:25:47','2014-03-19 16:25:48','项目简介2.3','项目详细介绍2.3','0','44-65-8|42-45-4','7');
INSERT INTO `dili_u_m_projects` VALUES ('14','1395217631','1395289806','1','1','4','项目名称2.4','/2014/03/13952147868a581e60ec496d88.jpg','/2014/03/1395214820b7475818846feff7.jpg','2014-03-19 16:26:44','2014-03-19 16:26:45','项目简介2.4','项目详细介绍2.4','0','42-51-6|42-45-4','11');

DROP TABLE IF EXISTS `dili_u_m_resources`;
CREATE TABLE IF NOT EXISTS `dili_u_m_resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classid` int(8) NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `update_user` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `intro` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `sort` int(8) NOT NULL DEFAULT '0',
  `companies_id` int(8) NOT NULL DEFAULT '0',
  `products_ids` varchar(100) NOT NULL DEFAULT '',
  `projects_ids` varchar(100) NOT NULL DEFAULT '',
  `static` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `dili_u_m_resources` VALUES ('4','45','1395215885','1395215942','1','1','资源名称x1.1','/2014/03/1395214820b7475818846feff7.jpg','资源简介x1.1','资源详细介绍x1.1','0','5','1-7|1-8|1-9','','0');
INSERT INTO `dili_u_m_resources` VALUES ('5','51','1395216099','1395216452','1','1','资源名称x2.1','/2014/03/1395214820b7475818846feff7.jpg','资源简介x2.1','资源详细介绍x2.1','0','7','1-8','','0');
INSERT INTO `dili_u_m_resources` VALUES ('6','51','1395216217','1395220354','17','1','资源名称x2.2','/2014/03/1395214820b7475818846feff7.jpg','资源简介x2.2','<p>\r\n	<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;</span></span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><br />\r\n</span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;</span></span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;</span></span></span></span></span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span><span><span><span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span><span><span><span><span><span><span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;<span>资源详细介绍</span><span>x2.2&nbsp;</span><span>资源详细介绍</span><span>x2.2&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span> \r\n</p>\r\n<span></span>','0','5','1-11|1-10|1-9|1-8|1-7','3-10|4-12','1');
INSERT INTO `dili_u_m_resources` VALUES ('7','51','1395216285','1395304481','1','18','资源名称x2.3','/2014/03/1395214820b7475818846feff7.jpg','资源简介x2.3','<p>\r\n	资源详细介绍x2.3\r\n</p>\r\n<p>\r\n	<span>资源详细介绍</span><span>x2.3<span>资源详细介绍</span><span>x2.3<span>资源详细介绍</span><span>x2.3</span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><br />\r\n</span></span> \r\n</p>\r\n<p>\r\n	<span><span><br />\r\n</span></span> \r\n</p>\r\n<p>\r\n	<span><span><span>资源详细介绍</span><span>x2.3<span>资源详细介绍</span><span>x2.3<span>资源详细介绍</span><span>x2.3</span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><br />\r\n</span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><br />\r\n</span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span>资源详细介绍</span><span>x2.3<span>资源详细介绍</span><span>x2.3<span>资源详细介绍</span><span>x2.3</span></span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><br />\r\n</span></span></span></span></span></span> \r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span>资源详细介绍</span><span>x2.3</span></span></span></span></span></span></span> \r\n</p>','0','7','1-8|1-10','4-12|4-13','2');
INSERT INTO `dili_u_m_resources` VALUES ('8','65','1395216410','1395290326','17','1','资源名称y1.1','/2014/03/1395214820b7475818846feff7.jpg','资源名称y1.1','资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1<span>资源名称y1.1</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>','0','5','1-8|1-10','3-10|4-11','2');

DROP TABLE IF EXISTS `dili_validations`;
CREATE TABLE IF NOT EXISTS `dili_validations` (
  `k` varchar(20) DEFAULT NULL,
  `v` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `dili_validations` VALUES ('required','必填');
INSERT INTO `dili_validations` VALUES ('valid_email','E-mail格式');

