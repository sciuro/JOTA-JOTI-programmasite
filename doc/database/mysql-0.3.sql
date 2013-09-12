SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `naam` varchar(164) NOT NULL,
  `naammv` varchar(164) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1257 ;

-- --------------------------------------------------------

--
-- Table structure for table `bijlage`
--

CREATE TABLE IF NOT EXISTS `bijlage` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `omschrijving` varchar(32) NOT NULL,
  `filename` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `duur`
--

CREATE TABLE IF NOT EXISTS `duur` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `lengte` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lengte` (`lengte`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spel` int(11) NOT NULL,
  `bruikbaar` tinyint(1) NOT NULL,
  `opmerking` text NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gebied`
--

CREATE TABLE IF NOT EXISTS `gebied` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `speltak_id` int(4) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `kaartloc` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `speltak_id` (`speltak_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Table structure for table `groep`
--

CREATE TABLE IF NOT EXISTS `groep` (
  `id` int(6) NOT NULL,
  `naam` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jota` tinyint(1) NOT NULL,
  `joti` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opkomst_duur`
--

CREATE TABLE IF NOT EXISTS `opkomst_duur` (
  `spel_id` int(4) NOT NULL,
  `duur_id` int(4) NOT NULL,
  KEY `spel_id` (`spel_id`,`duur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `urlnaam` varchar(32) NOT NULL,
  `titel` varchar(32) NOT NULL,
  `tekst` text NOT NULL,
  `banner` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `urlnaam` (`urlnaam`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `pagina_bijlage`
--

CREATE TABLE IF NOT EXISTS `pagina_bijlage` (
  `pagina_id` int(4) NOT NULL,
  `bijlage_id` int(4) NOT NULL,
  KEY `pagina_id` (`pagina_id`,`bijlage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `spel_id` int(4) NOT NULL,
  `groep_id` int(6) NOT NULL,
  `subgroep_id` int(4) NOT NULL,
  `gespeeld` tinyint(1) NOT NULL DEFAULT '0',
  `punten` int(4) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `spel_id` (`spel_id`,`groep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spel`
--

CREATE TABLE IF NOT EXISTS `spel` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `titel` varchar(32) NOT NULL,
  `omschrijving` text NOT NULL,
  `voorbereiding` text NOT NULL,
  `beschrijving` text NOT NULL,
  `copyright` varchar(64) NOT NULL,
  `duur` smallint(6) NOT NULL,
  `min_spelers` tinyint(4) NOT NULL,
  `max_spelers` tinyint(4) NOT NULL,
  `leiding` tinyint(4) NOT NULL,
  `jota` tinyint(1) NOT NULL,
  `joti` tinyint(1) NOT NULL,
  `maxpunten` int(4) NOT NULL DEFAULT '0',
  `wincode` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=382 ;

-- --------------------------------------------------------

--
-- Table structure for table `spelberichten`
--

CREATE TABLE IF NOT EXISTS `spelberichten` (
  `speltak_id` int(4) NOT NULL,
  `bericht` text NOT NULL,
  `van` date NOT NULL,
  `tot` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spellokatie`
--

CREATE TABLE IF NOT EXISTS `spellokatie` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `naam` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `speltak`
--

CREATE TABLE IF NOT EXISTS `speltak` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `spel_artikel`
--

CREATE TABLE IF NOT EXISTS `spel_artikel` (
  `spel_id` int(11) NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  KEY `spel_id` (`spel_id`,`artikel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spel_bijlage`
--

CREATE TABLE IF NOT EXISTS `spel_bijlage` (
  `spel_id` int(4) NOT NULL,
  `bijlage_id` int(4) NOT NULL,
  KEY `spel_id` (`spel_id`,`bijlage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spel_gebied`
--

CREATE TABLE IF NOT EXISTS `spel_gebied` (
  `spel_id` int(4) NOT NULL,
  `gebied_id` int(4) NOT NULL,
  KEY `spel_id` (`spel_id`,`gebied_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spel_spellokatie`
--

CREATE TABLE IF NOT EXISTS `spel_spellokatie` (
  `spel_id` int(4) NOT NULL,
  `spellokatie_id` int(4) NOT NULL,
  KEY `spel_id` (`spel_id`,`spellokatie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `error_code` int(3) NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `group` int(6) NOT NULL,
  `agent` varchar(64) NOT NULL,
  `platform` varchar(64) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `robot` varchar(64) NOT NULL,
  `browser` varchar(32) NOT NULL,
  `version` varchar(32) NOT NULL,
  `session` varchar(32) NOT NULL,
  `tracking` varchar(32) NOT NULL,
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subgroep`
--

CREATE TABLE IF NOT EXISTS `subgroep` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `groepid` int(6) NOT NULL,
  `naam` varchar(64) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `voornaam` varchar(64) NOT NULL,
  `achternaam` varchar(64) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `wincode`
--

CREATE TABLE IF NOT EXISTS `wincode` (
  `code` varchar(64) NOT NULL,
  `youtube` varchar(32) NOT NULL,
  `plaatje` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
