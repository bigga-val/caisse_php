-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 jan. 2020 à 14:11
-- Version du serveur :  10.1.39-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `masomo_tegra`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_effectuer_paiement` (IN `eleve` INT, IN `frais` INT, IN `user` INT)  BEGIN
	INSERT INTO t_paiement (id_eleve, id_frais, id_user, date_paiement)
	values (eleve, frais, user, CURDATE());
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `eleves_inscripts`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `eleves_inscripts` (
`id` int(11)
,`nom_eleve` varchar(25)
,`postnom_eleve` varchar(25)
,`prenom_eleve` varchar(25)
,`id_classe` int(11)
,`nom_classe` varchar(20)
,`designation` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure de la table `t_classe`
--

CREATE TABLE `t_classe` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_classe`
--

INSERT INTO `t_classe` (`id`, `designation`, `id_filiere`, `active`) VALUES
(1, 'creche', 6, '1'),
(2, '1ere', 6, '1'),
(3, '2eme', 6, '1'),
(4, '3ere', 6, '1'),
(5, '1ere', 7, '1'),
(6, '2eme', 7, '1'),
(7, '3ere', 7, '1'),
(8, '4eme', 7, '1'),
(9, '5ere', 7, '1'),
(10, '6eme', 7, '1'),
(11, '3ere', 1, '1'),
(12, '4eme', 1, '1'),
(13, '5ere', 1, '1'),
(14, '6eme', 1, '1'),
(15, '3ere', 2, '1'),
(16, '4eme', 2, '1'),
(17, '5ere', 2, '1'),
(18, '6eme', 2, '1'),
(19, '3ere', 3, '1'),
(20, '4eme', 3, '1'),
(21, '5ere', 3, '1'),
(22, '6eme', 3, '1'),
(23, '3ere', 4, '1'),
(24, '4eme', 4, '1'),
(25, '5ere', 4, '1'),
(26, '6eme', 4, '1'),
(27, '3ere', 5, '1'),
(28, '4eme', 5, '1'),
(29, '5ere', 5, '1'),
(30, '6eme', 5, '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_eleve`
--

CREATE TABLE `t_eleve` (
  `id` int(11) NOT NULL,
  `nom_eleve` varchar(25) DEFAULT NULL,
  `postnom_eleve` varchar(25) NOT NULL,
  `prenom_eleve` varchar(25) NOT NULL,
  `nom_tuteur` varchar(25) DEFAULT NULL,
  `num_telephone` varchar(15) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `active` char(1) DEFAULT '1',
  `genre` char(1) DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_eleve`
--

INSERT INTO `t_eleve` (`id`, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, `nom_tuteur`, `num_telephone`, `adresse`, `date_naissance`, `active`, `genre`) VALUES
(1, 'kyamadjingi', 'masengo', 'jonathan', 'ilunga', '0995053623', '2312, lumangi', '1994-10-10', '1', 'M'),
(2, 'amani', 'makuta', 'patient', 'tibag', '0995000234', '1272, av ISTA', '1994-10-10', '1', 'M'),
(3, 'mujinga', 'tshinyingi', 'narcia', 'tshinyingi', '0909834234', '892, av zambia', '1990-02-01', '1', 'F'),
(4, 'lumbu', 'musipi', 'chris', 'lumbu', '0990003423', '2732, av morgue', '1994-10-10', '1', 'M'),
(5, 'mukund', 'yav', 'jessy', 'mukund', '0899843433', '1025, av welenga', '1994-09-05', '1', 'F'),
(6, 'kayumba', 'nyembo', 'herman', 'nyembo', '0829873423', '2002, av cuivre', '1993-11-10', '1', 'M'),
(7, 'kapend', 'a ileng', 'herve', 'ileng', '0990890342', '2732, av manganeze', '1997-03-23', '1', 'M'),
(8, 'ndala', 'nsenga', 'daniella', 'ndala', '0810923123', '8908, av kalenga', '2000-01-29', '1', 'M'),
(9, 'lumbu', 'musipi', 'chris', 'lumbu', '0990003423', '2732, av morgue', '1994-10-10', '1', 'M'),
(10, 'kahilu', 'katonge', 'valery', 'katonge', '0998723823', '2732, av ndjandja', '1993-08-15', '1', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `t_filiere`
--

CREATE TABLE `t_filiere` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `id_option` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_filiere`
--

INSERT INTO `t_filiere` (`id`, `designation`, `id_option`, `active`) VALUES
(1, 'pedagogie', 3, '1'),
(2, 'scientifique', 3, '1'),
(3, 'mecanique', 4, '1'),
(4, 'electricite', 4, '1'),
(5, 'compt et gestion', 4, '1'),
(6, 'maternelle', 1, '1'),
(7, 'primaire', 2, '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_frais`
--

CREATE TABLE `t_frais` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `montant_francs` double DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `active` char(1) DEFAULT '1',
  `montant_dollars` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_frais`
--

INSERT INTO `t_frais` (`id`, `designation`, `montant_francs`, `slug`, `active`, `montant_dollars`) VALUES
(1, 'inscription', 35000, 'tous', '1', NULL),
(2, 'travaux', 17000, 'tous', '1', NULL),
(3, 'transport', 35000, 'tous', '1', NULL),
(4, 'maintenance', 35000, 'tous', '1', NULL),
(5, 'FIP', 25000, 'tous', '1', NULL),
(6, 'FAP', 12500, 'tous', '1', NULL),
(7, 'supplementaire', 35000, 'finaliste', '1', NULL),
(8, 'participation', 52000, 'finaliste', '1', NULL),
(9, 'septembre', 30000, 'tous', '1', NULL),
(10, 'octobre', 30000, 'tous', '1', NULL),
(11, 'novembre', 30000, 'tous', '1', NULL),
(12, 'decembre', 30000, 'tous', '1', NULL),
(13, 'janvier', 30000, 'tous', '1', NULL),
(14, 'fevrier', 30000, 'tous', '1', NULL),
(15, 'mars', 30000, 'tous', '1', NULL),
(16, 'avril', 30000, 'tous', '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_inscription`
--

CREATE TABLE `t_inscription` (
  `id` int(11) NOT NULL,
  `id_eleve` int(11) DEFAULT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `active` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_inscription`
--

INSERT INTO `t_inscription` (`id`, `id_eleve`, `id_classe`, `id_user`, `date_inscription`, `active`) VALUES
(1, 1, 2, 1, '2020-01-08', '1'),
(2, 2, 2, 1, '2020-01-08', '1'),
(3, 3, 2, 1, '2020-01-08', '1'),
(4, 4, 2, 1, '2020-01-08', '1'),
(5, 5, 2, 1, '2020-01-08', '1'),
(6, 6, 15, 1, '2020-01-08', '1'),
(7, 7, 15, 1, '2020-01-08', '1'),
(8, 8, 15, 1, '2020-01-08', '1'),
(9, 9, 15, 1, '2020-01-08', '1'),
(10, 10, 15, 1, '2020-01-08', '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_option`
--

CREATE TABLE `t_option` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_option`
--

INSERT INTO `t_option` (`id`, `designation`, `id_section`, `active`) VALUES
(1, 'maternelle', 1, '1'),
(2, 'primaire', 2, '1'),
(3, 'litteraire', 3, '1'),
(4, 'technique', 3, '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_paiement`
--

CREATE TABLE `t_paiement` (
  `id` int(11) NOT NULL,
  `id_eleve` int(11) DEFAULT NULL,
  `id_frais` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_paiement`
--

INSERT INTO `t_paiement` (`id`, `id_eleve`, `id_frais`, `id_user`, `date_paiement`) VALUES
(1, 1, 1, 1, '2020-01-08'),
(2, 2, 1, 1, '2020-01-08'),
(3, 3, 1, 1, '2020-01-08'),
(4, 4, 1, 1, '2020-01-08'),
(5, 5, 1, 1, '2020-01-08'),
(6, 6, 1, 1, '2020-01-08'),
(7, 7, 1, 1, '2020-01-08'),
(8, 8, 1, 1, '2020-01-08'),
(9, 9, 1, 1, '2020-01-08'),
(10, 10, 1, 1, '2020-01-08'),
(12, 1, 8, 1, '2020-01-11'),
(13, 1, 9, 1, '2020-01-19'),
(14, 1, 10, 1, '2020-01-19'),
(15, 1, 11, 1, '2020-01-19'),
(16, 2, 9, 1, '2020-01-21'),
(17, 2, 10, 1, '2020-01-21');

-- --------------------------------------------------------

--
-- Structure de la table `t_section`
--

CREATE TABLE `t_section` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `active` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_section`
--

INSERT INTO `t_section` (`id`, `designation`, `active`) VALUES
(1, 'Maternelle', '1'),
(2, 'Primaire', '1'),
(3, 'Secondaire', '1');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nom_user` varchar(20) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`id`, `nom_user`, `id_role`, `active`, `password`) VALUES
(1, 'jean', 2, '1', 'jean_caisse'),
(2, 'gaby', 3, '1', 'gaby_caisse');

-- --------------------------------------------------------

--
-- Structure de la table `t_user_role`
--

CREATE TABLE `t_user_role` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `active` char(1) DEFAULT '1',
  `level` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_user_role`
--

INSERT INTO `t_user_role` (`id`, `designation`, `active`, `level`) VALUES
(1, 'admin', '1', 1),
(2, 'secretaire', '1', 2),
(3, 'comptable', '1', 3);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_eleves_inscripts`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_eleves_inscripts` (
`id` int(11)
,`nom_eleve` varchar(25)
,`postnom_eleve` varchar(25)
,`prenom_eleve` varchar(25)
,`id_classe` int(11)
,`classe` varchar(20)
,`designation` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure de la vue `eleves_inscripts`
--
DROP TABLE IF EXISTS `eleves_inscripts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eleves_inscripts`  AS  select `e`.`id` AS `id`,`e`.`nom_eleve` AS `nom_eleve`,`e`.`postnom_eleve` AS `postnom_eleve`,`e`.`prenom_eleve` AS `prenom_eleve`,`c`.`id` AS `id_classe`,`c`.`designation` AS `nom_classe`,`f`.`designation` AS `designation` from (((`t_eleve` `e` join `t_classe` `c`) join `t_filiere` `f`) join `t_inscription` `i`) where ((`e`.`id` = `i`.`id_eleve`) and (`c`.`id` = `i`.`id_classe`) and (`c`.`id_filiere` = `f`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_eleves_inscripts`
--
DROP TABLE IF EXISTS `v_eleves_inscripts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_eleves_inscripts`  AS  select `e`.`id` AS `id`,`e`.`nom_eleve` AS `nom_eleve`,`e`.`postnom_eleve` AS `postnom_eleve`,`e`.`prenom_eleve` AS `prenom_eleve`,`c`.`id` AS `id_classe`,`c`.`designation` AS `classe`,`f`.`designation` AS `designation` from (((`t_eleve` `e` join `t_classe` `c`) join `t_filiere` `f`) join `t_inscription` `i`) where ((`e`.`id` = `i`.`id_eleve`) and (`c`.`id` = `i`.`id_classe`) and (`c`.`id_filiere` = `f`.`id`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_classe_filiere` (`id_filiere`);

--
-- Index pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_filiere`
--
ALTER TABLE `t_filiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_filiere_section` (`id_option`);

--
-- Index pour la table `t_frais`
--
ALTER TABLE `t_frais`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_eleve` (`id_eleve`),
  ADD KEY `fk_inscription_classe` (`id_classe`),
  ADD KEY `fk_inscription_user` (`id_user`);

--
-- Index pour la table `t_option`
--
ALTER TABLE `t_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_option_section` (`id_section`);

--
-- Index pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paiement_eleve` (`id_eleve`),
  ADD KEY `fk_paiement_frais` (`id_frais`),
  ADD KEY `fk_paiement_user` (`id_user`);

--
-- Index pour la table `t_section`
--
ALTER TABLE `t_section`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `fk_user_to_role` (`id_role`);

--
-- Index pour la table `t_user_role`
--
ALTER TABLE `t_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_classe`
--
ALTER TABLE `t_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_filiere`
--
ALTER TABLE `t_filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_frais`
--
ALTER TABLE `t_frais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_option`
--
ALTER TABLE `t_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `t_section`
--
ALTER TABLE `t_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_user_role`
--
ALTER TABLE `t_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD CONSTRAINT `fk_classe_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `t_filiere` (`id`);

--
-- Contraintes pour la table `t_filiere`
--
ALTER TABLE `t_filiere`
  ADD CONSTRAINT `fk_filiere_section` FOREIGN KEY (`id_option`) REFERENCES `t_option` (`id`);

--
-- Contraintes pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD CONSTRAINT `fk_inscription_classe` FOREIGN KEY (`id_classe`) REFERENCES `t_classe` (`id`),
  ADD CONSTRAINT `fk_inscription_eleve` FOREIGN KEY (`id_eleve`) REFERENCES `t_eleve` (`id`),
  ADD CONSTRAINT `fk_inscription_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`);

--
-- Contraintes pour la table `t_option`
--
ALTER TABLE `t_option`
  ADD CONSTRAINT `fk_option_section` FOREIGN KEY (`id_section`) REFERENCES `t_section` (`id`);

--
-- Contraintes pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD CONSTRAINT `fk_paiement_eleve` FOREIGN KEY (`id_eleve`) REFERENCES `t_eleve` (`id`),
  ADD CONSTRAINT `fk_paiement_frais` FOREIGN KEY (`id_frais`) REFERENCES `t_frais` (`id`),
  ADD CONSTRAINT `fk_paiement_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`);

--
-- Contraintes pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `fk_user_to_role` FOREIGN KEY (`id_role`) REFERENCES `t_user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
