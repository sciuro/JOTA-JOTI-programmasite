-- Change table format for explorers
ALTER TABLE `gebied` CHANGE `kaartloc` `kaartloc` VARCHAR( 16 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL


-- Add explorers as spelgebied and speltak
INSERT INTO `speltak` (`id`, `naam`) VALUES
(14, 'Explorers');

INSERT INTO `gebied` (`id`, `speltak_id`, `naam`, `kaartloc`) VALUES
(43, 14, 'Uitdagende scoutingtechnieken', '1,1,260,300'),
(44, 14, 'Expressie', '260,1,500,300'),
(45, 14, 'Sport en Spel', '500,1,750,300'),
(46, 14, 'Buitenleven', '750,1,1050,300'),
(47, 14, 'Identiteit', '1,300,260,700'),
(48, 14, 'Internationaal', '260,300,500,700'),
(49, 14, 'Samenleving', '500,300,750,700'),
(50, 14, 'Veilig en Gezond', '750,300,1050,700');


-- bind scout-games to explorers also

INSERT INTO `spel_gebied` (`spel_id`, `gebied_id`) VALUES
(301, 43),
(302, 43),
(303, 43),
(304, 43),
(305, 43),
(306, 43),
(307, 43),
(308, 43),
(309, 43),
(310, 43),
(311, 43),
(312, 44),
(313, 44),
(314, 44),
(315, 44),
(316, 44),
(317, 44),
(318, 44),
(319, 44),
(320, 44),
(321, 44),
(322, 45),
(323, 45),
(324, 45),
(325, 45),
(326, 45),
(327, 45),
(328, 45),
(329, 45),
(330, 45),
(331, 45),
(332, 45),
(333, 45),
(334, 45),
(335, 46),
(336, 46),
(337, 46),
(338, 46),
(339, 46),
(340, 46),
(341, 46),
(342, 46),
(343, 47),
(344, 47),
(345, 47),
(346, 47),
(347, 47),
(348, 47),
(349, 47),
(350, 47),
(351, 47),
(352, 47),
(353, 47),
(354, 47),
(355, 48),
(356, 48),
(357, 48),
(358, 48),
(359, 48),
(360, 48),
(361, 48),
(362, 48),
(363, 48),
(364, 48),
(365, 48),
(366, 49),
(367, 49),
(368, 49),
(369, 49),
(370, 50),
(371, 50),
(372, 50),
(373, 50),
(374, 50),
(375, 50),
(376, 49),
(377, 49),
(378, 49),
(379, 49),
(380, 49),
(381, 50);

-- Add movie bijlages

INSERT INTO `bijlage` (`id`, `omschrijving`, `filename`, `timestamp`) VALUES
(74, 'Filmpje eindspel Bevers', 'Bevers.zip', '2013-09-29 15:52:19'),
(73, 'Filmpje eindspel Welpen', 'Welpen.zip', '2013-09-29 15:52:19');

INSERT INTO `spel_bijlage` (`spel_id`, `bijlage_id`) VALUES
(43, 74),
(44, 74),
(125, 73),
(126, 73);

