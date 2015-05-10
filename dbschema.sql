CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birth_years` date NULL,
  `shirt_number` varchar(2) NULL,
  `team_ID` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 

CREATE TABLE IF NOT EXISTS `teams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `teams_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `logo_name` varchar (255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1

ALTER TABLE players ADD FOREIGN KEY (team_ID) REFERENCES teams(ID) ON DELETE CASCADE ON UPDATE RESTRICT

ALTER TABLE `players` ADD UNIQUE( `name`, `surname`); 
