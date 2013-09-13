-- Tabel uitbreiding statistics
ALTER TABLE `statistics` ADD `tracking` VARCHAR( 32 ) NOT NULL ;
ALTER TABLE `statistics` ADD `error_code` INT( 3 ) NOT NULL AFTER `uri` ;

-- Tabel spelen heeft een generiekere wincode
ALTER TABLE `spel` CHANGE `wincode` `wincode` VARCHAR( 32 ) NOT NULL ;

-- Tabel voor alle winnende codes
CREATE TABLE `wincode` (
`code` VARCHAR( 64 ) NOT NULL ,
`youtube` VARCHAR( 32 ) NOT NULL ,
`plaatje` VARCHAR( 128 ) NOT NULL
) ENGINE = MYISAM ;

-- Voorbeeld voor de wincodes
INSERT INTO `wincode` (`code`, `youtube`, `plaatje`) VALUES
('welpen-1-2-3-4-5-6-7-8', 'm4eTnN6AW14', ''),
('scouts-1-2-3-4-5-6-7-8', '', 'http://someonenoticed.files.wordpress.com/2011/03/thumbsupd.png'),
('bevers-8-7-6-5-4-3-2-1', 'Ld1DTmXesTo', '');

-- De speltakpagina van de scouts werkt nu ook.
UPDATE `gebied` SET `kaartloc` = '65,130,179,334' WHERE `gebied`.`id` =35;
UPDATE `gebied` SET `kaartloc` = '297,124,411,316' WHERE `gebied`.`id` =36;
UPDATE `gebied` SET `kaartloc` = '410,126,524,318' WHERE `gebied`.`id` =37;
UPDATE `gebied` SET `kaartloc` = '180,125,294,317' WHERE `gebied`.`id` =38;
UPDATE `gebied` SET `kaartloc` = '62,342,176,534' WHERE `gebied`.`id` =39;
UPDATE `gebied` SET `kaartloc` = '298,339,412,531' WHERE `gebied`.`id` =40;
UPDATE `gebied` SET `kaartloc` = '174,326,288,535' WHERE `gebied`.`id` =41;
UPDATE `gebied` SET `kaartloc` = '415,339,529,531' WHERE `gebied`.`id` =42;
