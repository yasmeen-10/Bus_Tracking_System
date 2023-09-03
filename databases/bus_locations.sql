SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `bus_location`;
CREATE TABLE IF NOT EXISTS `bus_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Bus_ID` varchar(255) NOT NULL,
  `Driver_Email` varchar(250) NOT NULL,
  `Longitude` varchar(250) NOT NULL,
  `Latitude` varchar(250) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `Place` varchar(255) NOT NULL,
  `approximate_time` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


COMMIT;
