SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gastenboek`
--
CREATE DATABASE IF NOT EXISTS `gastenboek` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `gastenboek`;

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `gasten`
--


DROP TABLE IF EXISTS gasten;
CREATE TABLE gasten (
id INT NOT NULL auto_increment,
naamGast VARCHAR(45) NOT NULL,
email VARCHAR(255) NOT NULL,
wachtwoord VARCHAR(255) NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `gasten` (`id`, `naamGast`, `email`, `wachtwoord`) VALUES 
(1,'Arthur','test@hotmail.com','$2y$10$7R9OUGaAGrp20wBqrX2UUeNzTJV2on0MfqJn2sxMllIkfOFqcQI2q'),
(2,'Jan','jan@hotmail.com','$2y$10$coiQFdH5V8plG5g3d9S/C..W8vML8rPBNLPSEPRb2HnnBWh8QTAba'),
(3,'Marie','marie@hotmail.com','$2y$10$mPx12UXfsIgnSYsyIZP6bOuNdpEDNHySfzZFGbgTkF0dEl32AJW2y');

DROP TABLE IF EXISTS gastenboek;
CREATE TABLE gastenboek (
id INT NOT NULL auto_increment,
gast VARCHAR(45) NOT NULL,
reactie VARCHAR(200) NOT NULL,
datum DATETIME NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `gastenboek` (`id`, `gast`, `reactie`, `datum`) VALUES 
(1,'Marie','Dit was zeer aangenaam!','2020-11-20 12:27:12'),
(2,'Arthur','Super tof!','2020-11-20 12:27:31'),
(3,'Jan','10/10!','2020-11-20 12:27:47');