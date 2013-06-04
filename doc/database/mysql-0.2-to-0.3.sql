
-- Upgradescript database van versie 0.2 naar 0.3

-- Aanmaken usertabel

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `voornaam` varchar(64) NOT NULL,
  `achternaam` varchar(64) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Statistieken

CREATE TABLE IF NOT EXISTS `statistics` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `agent` varchar(64) NOT NULL,
  `platform` varchar(64) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `robot` varchar(64) NOT NULL,
  `browser` varchar(32) NOT NULL,
  `version` varchar(32) NOT NULL,
  `session` varchar(32) NOT NULL,
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
