CREATE TABLE `access` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_name_id` int(10) unsigned NOT NULL DEFAULT '0',
  `access_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_first_view` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1

CREATE TABLE `name` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT 'Placeholder',
  `accesses` int(10) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '2016-12-31',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
