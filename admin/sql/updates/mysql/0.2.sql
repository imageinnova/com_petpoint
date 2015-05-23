DROP TABLE IF EXISTS `#__petpoint_species`;
CREATE TABLE IF NOT EXISTS `#__petpoint_species` (
  `code` char(20) NOT NULL,
  `lang` char(5) NOT NULL DEFAULT 'en-GB',
  `description` varchar(80) NOT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `petpoint_species` (`code`, `lang`, `description`, `published`) VALUES
('All', 'en-GB', 'All', 0),
('Cat', 'en-GB', 'Cat', 0),
('Dog', 'en-GB', 'Dog', 0);


ALTER TABLE `#__petpoint_species`
 ADD UNIQUE KEY `code_lang` (`code`,`lang`);