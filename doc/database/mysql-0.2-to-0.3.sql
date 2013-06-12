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

-- Feedback formulier

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spel` int(11) NOT NULL,
  `bruikbaar` tinyint(1) NOT NULL,
  `opmerking` text NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Groepsid is niet meer opvolgend en wachtwoorden doen we niet  meer aan.
ALTER TABLE `groep` CHANGE `id` `id` INT( 6 ) NOT NULL;
ALTER TABLE `groep` DROP `wachtwoord`;

-- Groepsdata word nu ook opgeslagen
ALTER TABLE `statistics` ADD `group` INT( 6 ) NOT NULL AFTER `user`;

-- Scoutsspel
CREATE TABLE IF NOT EXISTS `subgroep` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `groepid` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `spel_id` int(4) NOT NULL,
  `groep_id` int(6) NOT NULL,
  `subgroep_id` int(4) NOT NULL,
  `gespeeld` tinyint(1) NOT NULL DEFAULT '0',
  `punten` int(4) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `spel_id` (`spel_id`,`groep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Berichten van de themafiguren
CREATE TABLE IF NOT EXISTS `spelberichten` (
  `speltak_id` int(4) NOT NULL,
  `bericht` text NOT NULL,
  `van` date NOT NULL,
  `tot` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Pagina timestamp automatisch updaten
ALTER TABLE `pagina` CHANGE `timestamp` `timestamp` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;

-- Spellen timesptam automatisch updaten
ALTER TABLE `spel` CHANGE `timestamp` `timestamp` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;

-- Copyright bij Spellen
ALTER TABLE `spel` ADD `copyright` VARCHAR( 64 ) NOT NULL AFTER `beschrijving`;

-- Tabel uitbreiding statistics
ALTER TABLE `statistics` ADD `tracking` VARCHAR( 32 ) NOT NULL ;
