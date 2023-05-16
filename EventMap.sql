-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 24 jan. 2023 à 15:17
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `EventMap`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `AdminStartDate` datetime DEFAULT NULL,
  `AdminEndDate` datetime DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminStartDate`, `AdminEndDate`, `UserId`) VALUES
(1, '2022-11-11 22:15:00', '2023-11-11 22:15:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `adminevent`
--

CREATE TABLE `adminevent` (
  `AdminEventId` int(11) NOT NULL,
  `AdminId` int(11) DEFAULT NULL,
  `EventId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `ChatId` int(11) NOT NULL,
  `EventId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`ChatId`, `EventId`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `chatevent`
--

CREATE TABLE `chatevent` (
  `ChatId` int(11) DEFAULT NULL,
  `EventId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ChatMessage`
--

CREATE TABLE `ChatMessage` (
  `ChatMessageId` int(11) NOT NULL,
  `ChatMessageText` varchar(500) DEFAULT NULL,
  `ChatMessageDate` datetime DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ChatId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ChatMessage`
--

INSERT INTO `ChatMessage` (`ChatMessageId`, `ChatMessageText`, `ChatMessageDate`, `UserId`, `ChatId`) VALUES
(1, 'Je suis la', '2023-01-24 11:35:54', 4, 1),
(2, 'Je suis la', '2023-01-24 11:35:54', 4, 2),
(3, 'Je suis la', '2023-01-24 11:35:54', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `chatmessagereported`
--

CREATE TABLE `chatmessagereported` (
  `ChatMessageReportedId` int(11) NOT NULL,
  `ChatMessageId` int(11) DEFAULT NULL,
  `ChatMessageReportedContext` varchar(1000) DEFAULT NULL,
  `chatMessageReportedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `EventId` int(11) NOT NULL,
  `EventBackgroundId` int(11) DEFAULT NULL,
  `EventThumbnailId` int(11) DEFAULT NULL,
  `EventOwnerId` int(11) DEFAULT NULL,
  `EventName` varchar(50) DEFAULT NULL,
  `EventDescription` varchar(600) DEFAULT NULL,
  `EventStartDate` datetime DEFAULT NULL,
  `EventEndDate` datetime DEFAULT NULL,
  `EventLocation` varchar(100) DEFAULT NULL,
  `EventCategory` varchar(25) DEFAULT NULL,
  `EventPrivate` tinyint(1) DEFAULT NULL,
  `EventSize` int(11) DEFAULT NULL,
  `EventPrice` float DEFAULT NULL,
  `EventCardColor` varchar(6) DEFAULT NULL,
  `EventPageColor` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`EventId`, `EventBackgroundId`, `EventThumbnailId`, `EventOwnerId`, `EventName`, `EventDescription`, `EventStartDate`, `EventEndDate`, `EventLocation`, `EventCategory`, `EventPrivate`, `EventSize`, `EventPrice`, `EventCardColor`, `EventPageColor`) VALUES
(1, NULL, 1, 1, 'Walibi', 'N/A', '2022-11-04 00:00:00', '2022-11-19 00:00:00', 'Belgium', NULL, 0, 0, 0, NULL, NULL),
(3, 1, 1, 1, 'Name', 'Description', '2022-11-04 00:00:00', '2022-11-04 00:00:00', 'Location', NULL, 0, 0, 0, '2', '2'),
(4, NULL, NULL, 1, 'Walibi', 'N/A', '2022-11-04 00:00:00', '2022-11-19 00:00:00', 'Belgium', NULL, 0, 0, 0, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, '2023-01-20 22:00:10', '2023-01-20 22:00:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eventtag`
--

CREATE TABLE `eventtag` (
  `EventTagId` int(11) NOT NULL,
  `EventTagName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `ImageId` int(11) NOT NULL,
  `ImageName` varchar(50) DEFAULT NULL,
  `ImageDir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`ImageId`, `ImageName`, `ImageDir`) VALUES
(1, '', 'Images/Users/Avatars/2/default_256_256.png');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `NotificationId` int(11) NOT NULL,
  `NotificationSender` varchar(50) DEFAULT NULL,
  `NotificationContext` varchar(300) DEFAULT NULL,
  `NotificationStatus` tinyint(1) DEFAULT NULL,
  `NotificationDate` datetime DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`NotificationId`, `NotificationSender`, `NotificationContext`, `NotificationStatus`, `NotificationDate`, `UserId`) VALUES
(1, 'UserId=1', 'Vous avez été invité dans un évènement {EventId=1}, cliquez sur la notification pour le rejoindre !', 0, '2023-01-01 10:45:33', 1),
(2, 'EventId=1', 'Votre évènement va bientôt commencer !', 0, '2023-01-18 10:45:37', 1),
(6, 'EventId=1', 'Votre évènement va bientôt commencer !', 0, '2023-01-10 10:45:41', 4),
(7, 'EventId=1', 'Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur ', 0, '2023-01-09 10:45:43', 4),
(8, 'UserId=1', 'Vous avez été invité dans un évènement {EventId=1}, cliquez sur la notification pour le rejoindre !', 0, '2023-01-21 00:00:00', 4),
(9, 'EventId=1', 'Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur ', 0, '2023-01-21 10:45:46', 4),
(10, 'EventId=1', 'Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur Votre évènement va bientôt commencer ! ceci est une longue notification pour notifier l\'utilisateur ', 0, '2023-01-21 10:45:46', 27);

-- --------------------------------------------------------

--
-- Structure de la table `superadmin`
--

CREATE TABLE `superadmin` (
  `SuperAdminId` int(11) NOT NULL,
  `AdminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `superadmin`
--

INSERT INTO `superadmin` (`SuperAdminId`, `AdminId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `UserFirstName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `UserPassword` varchar(100) DEFAULT NULL,
  `UserDescription` varchar(600) DEFAULT NULL,
  `UserAvatarId` int(11) DEFAULT NULL,
  `UserBackgroundId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`UserId`, `UserFirstName`, `UserName`, `UserEmail`, `UserPassword`, `UserDescription`, `UserAvatarId`, `UserBackgroundId`) VALUES
(1, 'PasArthur', 'Name', 'a@a.com', 'passord', 'N/A', 1, 1),
(4, 'test', 'test', 'test@test.com', '$2y$10$sWyTyr5RqwVj32yVOXA2nOQBeNfr4CPu00z6K97rwzFPY795/ZFNy', 'test', 1, 1),
(17, 'Jean', 'Postman', 'Postman@gmail.com', 'pasw0rd', 'No UserDescription', NULL, NULL),
(18, '', '', '', '', '', NULL, NULL),
(19, 'TestPostManFirstName', 'TestPostManName', 'TestPostMan@email.com', 'TestPostManPassword', 'TestPostManDescription', NULL, NULL),
(20, 'TestPostManFirstName', 'TestPostManName', 'TestPostMan@email.com', 'TestPostManPassword', 'TestPostManDescription', NULL, NULL),
(21, 'TestPostManFirstName', 'TestPostManName', 'TestPostMan@email.com', 'TestPostManPassword', 'TestPostManDescription', 1, 1),
(22, 'TestPostManFirstName', 'TestPostManName', 'TestPostMan@email.com', 'TestPostManPassword', 'TestPostManDescription', 1, 1),
(23, '', 'TestPostManName', 'TestPostMan@email.com', 'TestPostManPassword', 'TestPostManDescription', 1, 1),
(25, 'nom', 'prÃ©nom', 't@t.com', 'mots', '', 1, 1),
(27, 'test2', 'test2', 'test2@test.com', '$2y$10$It2Z1f/arWZ96CZE5XoWNO2DwPGF7vzLFrz34cItytUt5u87lGa1O', '', 1, 1),
(28, 'Damien', 'Pelezdiaz', '200051@site.asty-moulin.be', '$2y$10$zrDFGYTZQR3XZEtCOGhzWefHnKSPuBNL4TwDfduYDiySQXWdNsDYO', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `userevent`
--

CREATE TABLE `userevent` (
  `UserId` int(11) NOT NULL,
  `EventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `userevent`
--

INSERT INTO `userevent` (`UserId`, `EventId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `userreported`
--

CREATE TABLE `userreported` (
  `UserReportedId` int(11) NOT NULL,
  `UserReportedContext` varchar(1000) DEFAULT NULL,
  `UserReportedDate` datetime DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `userwarned`
--

CREATE TABLE `userwarned` (
  `UserWarnedId` int(11) NOT NULL,
  `UserWarnedContext` varchar(1000) DEFAULT NULL,
  `UserWarnedStartDate` datetime DEFAULT NULL,
  `UserWarnedEndDate` datetime DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `SuperAdminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `adminevent`
--
ALTER TABLE `adminevent`
  ADD PRIMARY KEY (`AdminEventId`),
  ADD KEY `AdminId` (`AdminId`),
  ADD KEY `EventId` (`EventId`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatId`),
  ADD KEY `EventId` (`EventId`);

--
-- Index pour la table `chatevent`
--
ALTER TABLE `chatevent`
  ADD KEY `ChatId` (`ChatId`),
  ADD KEY `EventId` (`EventId`);

--
-- Index pour la table `ChatMessage`
--
ALTER TABLE `ChatMessage`
  ADD PRIMARY KEY (`ChatMessageId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `ChatId` (`ChatId`);

--
-- Index pour la table `chatmessagereported`
--
ALTER TABLE `chatmessagereported`
  ADD PRIMARY KEY (`ChatMessageReportedId`),
  ADD KEY `ChatMessageId` (`ChatMessageId`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventId`),
  ADD KEY `EventBackgroundId` (`EventBackgroundId`),
  ADD KEY `EventThumbnailId` (`EventThumbnailId`),
  ADD KEY `EventOwnerId` (`EventOwnerId`);

--
-- Index pour la table `eventtag`
--
ALTER TABLE `eventtag`
  ADD PRIMARY KEY (`EventTagId`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageId`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`SuperAdminId`),
  ADD KEY `AdminId` (`AdminId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `UserAvatarId` (`UserAvatarId`),
  ADD KEY `UserBackgroundId` (`UserBackgroundId`);

--
-- Index pour la table `userevent`
--
ALTER TABLE `userevent`
  ADD PRIMARY KEY (`UserId`,`EventId`),
  ADD KEY `EventId` (`EventId`);

--
-- Index pour la table `userreported`
--
ALTER TABLE `userreported`
  ADD PRIMARY KEY (`UserReportedId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `userwarned`
--
ALTER TABLE `userwarned`
  ADD PRIMARY KEY (`UserWarnedId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `SuperAdminId` (`SuperAdminId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `adminevent`
--
ALTER TABLE `adminevent`
  MODIFY `AdminEventId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ChatMessage`
--
ALTER TABLE `ChatMessage`
  MODIFY `ChatMessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `chatmessagereported`
--
ALTER TABLE `chatmessagereported`
  MODIFY `ChatMessageReportedId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `eventtag`
--
ALTER TABLE `eventtag`
  MODIFY `EventTagId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `SuperAdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `userreported`
--
ALTER TABLE `userreported`
  MODIFY `UserReportedId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `userwarned`
--
ALTER TABLE `userwarned`
  MODIFY `UserWarnedId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `adminevent`
--
ALTER TABLE `adminevent`
  ADD CONSTRAINT `adminevent_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`AdminId`),
  ADD CONSTRAINT `adminevent_ibfk_2` FOREIGN KEY (`EventId`) REFERENCES `event` (`EventId`);

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`EventId`) REFERENCES `Event` (`EventId`);

--
-- Contraintes pour la table `chatevent`
--
ALTER TABLE `chatevent`
  ADD CONSTRAINT `chatevent_ibfk_1` FOREIGN KEY (`ChatId`) REFERENCES `chat` (`ChatId`),
  ADD CONSTRAINT `chatevent_ibfk_2` FOREIGN KEY (`EventId`) REFERENCES `event` (`EventId`);

--
-- Contraintes pour la table `ChatMessage`
--
ALTER TABLE `ChatMessage`
  ADD CONSTRAINT `chatmessage_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `chatmessage_ibfk_2` FOREIGN KEY (`ChatId`) REFERENCES `Chat` (`ChatId`);

--
-- Contraintes pour la table `chatmessagereported`
--
ALTER TABLE `chatmessagereported`
  ADD CONSTRAINT `chatmessagereported_ibfk_1` FOREIGN KEY (`ChatMessageId`) REFERENCES `chatmessage` (`ChatMessageId`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`EventBackgroundId`) REFERENCES `image` (`ImageId`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`EventThumbnailId`) REFERENCES `image` (`ImageId`),
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`EventOwnerId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD CONSTRAINT `superadmin_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`AdminId`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserAvatarId`) REFERENCES `image` (`ImageId`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`UserBackgroundId`) REFERENCES `image` (`ImageId`);

--
-- Contraintes pour la table `userevent`
--
ALTER TABLE `userevent`
  ADD CONSTRAINT `userevent_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `userevent_ibfk_2` FOREIGN KEY (`EventId`) REFERENCES `event` (`EventId`);

--
-- Contraintes pour la table `userreported`
--
ALTER TABLE `userreported`
  ADD CONSTRAINT `userreported_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `userwarned`
--
ALTER TABLE `userwarned`
  ADD CONSTRAINT `userwarned_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `userwarned_ibfk_2` FOREIGN KEY (`SuperAdminId`) REFERENCES `superadmin` (`SuperAdminId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
