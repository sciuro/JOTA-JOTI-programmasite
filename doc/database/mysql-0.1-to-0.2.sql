-- Bug #3
ALTER TABLE `spel` CHANGE `id` `id` INT( 4 ) NOT NULL AUTO_INCREMENT

-- Issue #1: verwijderen urlnaam
ALTER TABLE `spel` DROP `urlnaam`