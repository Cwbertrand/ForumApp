-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Dumping structure for table forum.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Dumping data for table forum.categorie: ~3 rows (approximately)
INSERT INTO `categorie` (`id_categorie`, `nomCategorie`) VALUES
	(1, 'Informatique'),
	(2, 'Moralité'),
	(3, 'Voyage');

-- Dumping structure for table forum.message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb3_bin NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `user_id` (`user_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `FK_message_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id_subject`),
  CONSTRAINT `FK_message_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Dumping data for table forum.message: ~7 rows (approximately)
INSERT INTO `message` (`id_message`, `message`, `createAt`, `user_id`, `subject_id`) VALUES
	(1, 'Le mot cybersécurité est un néologisme désignant le rôle de l\'ensemble des lois, politiques, outils, dispositifs, concepts et mécanismes de sécurité, méthodes de gestion des risques, actions, formations, bonnes pratiques et technologies qui peuvent être utilisés pour protéger les personnes et les actifs informatiques matériels et immatériels (connectés directement ou indirectement à un réseau) des États et des organisations (avec un objectif de disponibilité, intégrité et authenticité, confidentialité, preuve et non-répudiation)', '2022-11-08 13:50:33', 2, 1),
	(2, 'La 5G (cinquième génération) est une norme de réseau de téléphonie mobile. Elle succède à la quatrième génération, appelée 4G1, en proposant des débits plus importants et une latence fortement réduite, tout en évitant le risque de saturation des réseaux lié à l\'augmentation des usages numériques (smartphones, tablettes, objets connectés). Son déploiement fait l\'objet de contestations concernant en particulier l\'effet sanitaire des ondes électromagnétiques et l\'impact environnemental de cette technologie.', '2022-11-08 13:51:15', 2, 2),
	(3, 'En informatique, une interface de programmation d’application1 ou interface de programmation applicative2,3,4 (souvent désignée par le terme API pour Application Programming Interface) est un ensemble normalisé de classes, de méthodes, de fonctions et de constantes qui sert de façade par laquelle un logiciel offre des services à d\'autres logiciels. Elle est offerte par une bibliothèque logicielle ou un service web, le plus souvent accompagnée d\'une description qui spécifie comment des programmes consommateurs peuvent se servir des fonctionnalités du programme fournisseur', '2022-11-08 13:51:54', 1, 3),
	(4, 'Sujet et morale sont deux mots bien différents : le mot sujet a plusieurs significations selon l’angle sous lequel nous l’abordons. Par exemple, il peut être un thème : le sujet d’une discussion ou bien il peut être l’être qui fait l’action ; la morale désigne quant à elle, l\'ensemble des règles ou préceptes relatifs à la conduite, c\'est-à-dire à l\'action humaine.', '2022-11-08 17:52:03', 3, 4),
	(5, 'Non-conscient: ce que notre conscience ignore sans que cela ait des conséquences dans son fonctionnement. Ex: nous n’avons pas conscience de la circulation du sang dans notre corps. Cela n’entrave en rien notre conscience. L’inconscient Est-ce que nous ignorons nous même, ce qui peut nous mettre en danger. Ex: rêves non contrôlés', '2022-11-08 17:53:43', 2, 4),
	(6, 'Pourquoi ne pas prévoir un voyage à Noël ou à Nouvel An ? Profitez ainsi des fêtes de fin d’année pour vous évader ! Week-end de Noël ou du Nouvel An, séjour les pieds dans l\'eau ou sur les pistes : cherchez les meilleures destinations, découvrez nos offres et réservez dès aujourd\'hui vos vacances de fin d\'année !', '2022-11-08 17:58:10', 3, 6),
	(7, 'Inclus : départ pour la « cité des morts » l’impressionnante Thèbes regroupant sur la rive Ouest du Nil plusieurs dizaines de tombeaux dont Le temple funéraire de Ramsès III (Medinet Habou), la Vallée des Artisans et les Colosses de Memnon. En cours de journée départ en navigation vers Edfou en passant par l’écluse d’Esna.', '2022-11-08 18:00:35', 1, 7);

-- Dumping structure for table forum.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id_subject` int NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `datePost` datetime DEFAULT CURRENT_TIMESTAMP,
  `statusPost` tinyint DEFAULT NULL,
  `categorie_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id_subject`),
  KEY `categorie_id` (`categorie_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_subject_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_subject_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Dumping data for table forum.subject: ~7 rows (approximately)
INSERT INTO `subject` (`id_subject`, `theme`, `datePost`, `statusPost`, `categorie_id`, `user_id`) VALUES
	(1, 'Cybersécurité', '2022-11-08 13:45:08', 1, 1, 2),
	(2, 'Reseaux 5G', '2022-11-08 13:49:07', 2, 1, 2),
	(3, 'API', '2022-11-08 13:49:44', 2, 1, 1),
	(4, 'Moral', '2022-11-08 17:51:21', 1, 2, 3),
	(5, 'La Conscience', '2022-11-08 17:53:00', 1, 2, 1),
	(6, 'Voyages à Noël ', '2022-11-08 17:57:36', 1, 3, 2),
	(7, 'Voyage Egypte', '2022-11-08 17:59:38', 2, 3, 1);

-- Dumping structure for table forum.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb3_bin NOT NULL,
  `role` tinyint NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Dumping data for table forum.user: ~2 rows (approximately)
INSERT INTO `user` (`id_user`, `pseudo`, `email`, `password`, `role`) VALUES
	(1, 'thomas', 'thomas9@gmail.com', '12345', 1),
	(2, 'Eric', 'eric9@gmail.com', '1234', 2),
	(3, 'eveline', 'eveline9@gmail.com', '123456', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
