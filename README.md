By Chris Pierce

MYSQL Database Syntaxes
	-- Create syntax for TABLE 'colors'
	CREATE TABLE `colors` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `name` varchar(15) DEFAULT NULL,
	  `vote_count` int(11) unsigned NOT NULL DEFAULT '0',
	  `created` datetime DEFAULT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `color` (`name`)
	) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
	
	-- Create syntax for TABLE 'supports'
	CREATE TABLE `supports` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `full_name` varchar(35) DEFAULT NULL,
	  `email` varchar(80) DEFAULT NULL,
	  `comment` text,
	  `created` datetime DEFAULT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	
	-- Create syntax for TABLE 'votes'
	CREATE TABLE `votes` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `city` varchar(20) DEFAULT NULL,
	  `color_id` int(11) unsigned DEFAULT NULL,
	  `number_of_votes` int(11) unsigned DEFAULT NULL,
	  `created` datetime DEFAULT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  KEY `color_id` (`color_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;