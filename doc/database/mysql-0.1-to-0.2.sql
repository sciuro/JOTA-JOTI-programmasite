-- Bug #3
ALTER TABLE `artikel` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `bijlage` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `duur` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT ,
	CHANGE `lengte` `lengte` INT( 4 ) NOT NULL;
ALTER TABLE `gebied` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT ,
	CHANGE `speltak_id` `speltak_id` INT( 4 ) NOT NULL;
ALTER TABLE `groep` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `pagina` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `pagina_bijlage` CHANGE `pagina_id` `pagina_id` INT( 4 ) NOT NULL ,
	CHANGE `bijlage_id` `bijlage_id` INT( 4 ) NOT NULL;
ALTER TABLE `score` CHANGE `spel_id` `spel_id` INT( 4 ) NOT NULL ,
	CHANGE `gebied_id` `gebied_id` INT( 4 ) NOT NULL ,
	CHANGE `groep_id` `groep_id` INT( 4 ) NOT NULL ,
	CHANGE `punten` `punten` INT( 4 ) NOT NULL DEFAULT '0',
	CHANGE `bijlage_id` `bijlage_id` INT( 4 ) NOT NULL DEFAULT '0';
ALTER TABLE `spel` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `spel` CHANGE `maxpunten` `maxpunten` INT( 4 ) NOT NULL DEFAULT '0';
ALTER TABLE `spel_artikel` CHANGE `spel_id` `spel_id` INT( 11 ) NOT NULL ,
	CHANGE `artikel_id` `artikel_id` INT( 11 ) NOT NULL;
ALTER TABLE `spel_bijlage` CHANGE `spel_id` `spel_id` INT( 4 ) NOT NULL ,
	CHANGE `bijlage_id` `bijlage_id` INT( 4 ) NOT NULL;
ALTER TABLE `spel_duur` CHANGE `spel_id` `spel_id` INT( 4 ) NOT NULL ,
	CHANGE `duur_id` `duur_id` INT( 4 ) NOT NULL;
ALTER TABLE `spel_gebied` CHANGE `spel_id` `spel_id` INT( 4 ) NOT NULL ,
	CHANGE `gebied_id` `gebied_id` INT( 4 ) NOT NULL;

-- Issue #1: verwijderen urlnaam
ALTER TABLE `spel` DROP `urlnaam`;

-- Issue #2: Spellokatie bij spelen
CREATE TABLE IF NOT EXISTS `spellokatie` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `spel_spellokatie` (
  `spel_id` int(4) NOT NULL,
  `duur_id` int(4) NOT NULL,
  KEY `spel_id` (`spel_id`,`duur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
