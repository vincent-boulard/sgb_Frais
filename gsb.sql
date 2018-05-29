SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS etat (
  id char(2) COLLATE utf8_swedish_ci NOT NULL,
  libelle varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE IF NOT EXISTS fichefrais (
id int(11) NOT NULL,
  idVisiteur char(4) COLLATE utf8_swedish_ci NOT NULL,
  mois varchar(2) NOT NULL,
  annee varchar(4) NOT NULL,
  nbJustificatifs int(11) DEFAULT NULL,
  montantValide decimal(10,2) DEFAULT NULL,
  dateModif date DEFAULT NULL,
  idEtat char(2) COLLATE utf8_swedish_ci DEFAULT 'CR'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=19 ;

CREATE TABLE IF NOT EXISTS forfait (
  id char(3) COLLATE utf8_swedish_ci NOT NULL,
  libelle char(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  montant decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE IF NOT EXISTS lignefraisforfait (
  idFicheFrais int(11) NOT NULL,
  idForfait char(3) COLLATE utf8_swedish_ci NOT NULL,
  quantite int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE IF NOT EXISTS users (
id int(11) NOT NULL,
  nom varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  adresse varchar(60) NOT NULL,
  cp varchar(5) NOT NULL,
  ville varchar(30) NOT NULL,
  dateEmbauche date DEFAULT NULL,
  login varchar(30) NOT NULL,
  pwd varchar(60) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO users (id, nom, prenom, adresse, cp, ville, dateEmbauche, login, pwd, status) VALUES
(1, 'Boulard', 'Vincent', 'Route de Quimper', '29200', 'BREST', NULL, 'boulard', '6c0747e1815c64c3eeef6231e4ee4b58', 'administrateur'),
(2, 'Raine', 'Alexandre', 'Route de Quimper', '29200', 'BREST', '2018-05-28', 'raine', '3da223f57acf5e3994ca3deaeec92547', 'medecin'),
(3, 'Metz', 'Maxime', 'Route de Quimper', '29200', 'BREST', NULL, 'metz', 'ed3d6785be18c00afefa6e775733787a', 'visiteur');


ALTER TABLE etat
 ADD PRIMARY KEY (id);

ALTER TABLE fichefrais
 ADD PRIMARY KEY (id), ADD KEY idEtat (idEtat), ADD KEY idVisiteur (idVisiteur);

ALTER TABLE forfait
 ADD PRIMARY KEY (id);

ALTER TABLE lignefraisforfait
 ADD PRIMARY KEY (idFicheFrais,idForfait), ADD KEY idForfait (idForfait);

ALTER TABLE users
 ADD PRIMARY KEY (id);


ALTER TABLE fichefrais
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
ALTER TABLE users
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
