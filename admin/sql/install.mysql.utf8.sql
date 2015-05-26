DROP TABLE IF EXISTS `#__petpoint_species`;
CREATE TABLE IF NOT EXISTS `#__petpoint_species` (
`id` int(11) NOT NULL,
  `species` char(20) NOT NULL,
  `lang` char(7) NOT NULL DEFAULT 'en-GB',
  `description` varchar(80) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `#__petpoint_species` (`id`, `species`, `lang`, `description`, `published`) VALUES
(1, 'All', 'en-GB', 'All', 0),
(2, 'Cat', 'en-GB', 'Cat', 0),
(3, 'Dog', 'en-GB', 'Dog', 0);


ALTER TABLE `#__petpoint_species`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `code_lang` (`species`,`lang`);


ALTER TABLE `#__petpoint_species`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;