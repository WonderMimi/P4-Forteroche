-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 juil. 2020 à 13:17
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bibliotheque`
--
CREATE DATABASE IF NOT EXISTS `bibliotheque` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bibliotheque`;

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `onloan` tinyint(1) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `borrowerid` int(11) DEFAULT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `onloan`, `duedate`, `borrowerid`) VALUES
(1, 'Le Cinquième Règne', 'Maxime Chattam', NULL, NULL, NULL),
(2, 'Thérèse Raquin', 'Emile Zola', 1, '2020-05-11', 100),
(3, 'Balle De Match', 'Harlan Coben', NULL, NULL, NULL),
(4, 'La Maison du Clair de Lune', 'Mary Higgins Clark ', NULL, NULL, NULL),
(5, 'Ne le dis a personne', 'Harlan Coben', 1, '2020-05-05', 101),
(6, 'Ne Pleure pas ma Belle', 'Mary Higgins Clark', 1, '2020-05-12', 102),
(7, 'Destination Inconnue', 'Agatha Christie', NULL, NULL, NULL),
(8, 'Rupture de Contrat', 'Harlan Coben', NULL, NULL, NULL),
(9, 'Le Client', 'John Grisham', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `borrowers`
--

DROP TABLE IF EXISTS `borrowers`;
CREATE TABLE IF NOT EXISTS `borrowers` (
  `borrowerid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`borrowerid`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `borrowers`
--

INSERT INTO `borrowers` (`borrowerid`, `name`, `address`) VALUES
(100, 'Homer Simpson', '742 Evergreen Terrace, Springfield'),
(101, 'John Doe', '54 Main Street, Dublin'),
(102, 'Jane Smith', '5 Church Lane, Ballsbridge'),
(103, 'Henry Higgins', '14 Mayfair, Ratoath');
--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `createdAt`) VALUES
(1, 'Voici mon premier article', 'Mon super blog est en construction.', 'Mimi', '2020-05-21 08:10:24'),
(2, 'Un deuxième article', 'Je continue à ajouter du contenu sur mon blog.', 'Mimi', '2020-05-21 13:27:38'),
(3, 'Mon troisième article', 'Mon blog est génial !!!', 'Mimi', '2020-05-22 14:45:57'),
(4, 'News saisie via le formulaire', 'LQDD j sd  Sq  s', 'moi', '2020-05-22 20:25:22');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `article_id`) VALUES
(1, 'Jean', 'Génial, hâte de voir ce que ça donne !', '2019-03-16 21:02:24', 1),
(2, 'Nina', 'Trop cool ! depuis le temps', '2019-03-17 17:34:35', 1),
(3, 'Rodrigo', 'Great ! ', '2019-03-17 17:42:04', 1),
(4, 'Hélène', 'je suis heureuse de découvrir un super site ! Continuez comme ça ', '2019-03-18 12:08:37', 2),
(5, 'Moussa', 'Un peu déçu par le contenu pour le moment...', '2019-03-18 03:09:02', 2),
(6, 'Barbara', 'pressée de voir la suite', '2019-03-18 10:05:58', 2),
(7, 'Guillaume', 'Je viens ici pour troller !', '2019-03-19 21:08:44', 3),
(8, 'Aurore', 'Enfin un blog tranquille, où on ne nous casse pas les pieds !', '2019-03-19 21:09:27', 3),
(9, 'Jordane', 'Je suis vendéen ! Amateur de mojettes !', '2019-03-20 10:10:11', 3);
--
-- Base de données :  `forteroche`
--
CREATE DATABASE IF NOT EXISTS `forteroche` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forteroche`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `status`, `author`, `created_date`, `flag`) VALUES
(1, 1, 'Génial ce billet s\'affiche !!', 'autorisé', 'moi-même', '2020-05-24', 1),
(14, 14, 'I totally agree with this post!!', 'autorisé', 'Quidam', '2020-06-21', 0),
(13, 9, 'yeah!!!', 'autorisé', 'dff', '2020-06-21', 1),
(12, 9, 'Commentaire saisi via le formulaire', 'autorisé', 'Untel', '2020-06-21', 1),
(17, 16, 'test de commentaire', 'autorisé', 'test', '2020-06-24', 0),
(15, 14, 'je souhaite voir si ce post est signalé ou non', 'autorisé', 'moi', '2020-06-21', 1),
(18, 16, 'qfsfgsdf qfd sq qdf ', 'autorisé', 'test 2 de commentaire', '2020-06-24', 0);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `created_date`) VALUES
(1, 'Mon premier billet', 'Ce billet a été ajouté directement à partir de phpMyAdmin. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed nihil suscipit quas nesciunt, sitisi de Cum dolor nulla maxime accusamas deleniti!', '', '2020-06-10'),
(9, 'Billet saisi via le formulaire', 'Billet saisi via le formulaire et je viens également de le modifier !', 'Untel', '2020-06-20'),
(3, 'Billet de test', 'Ce billet a été ajouté via le site et également modifié via le site', 'Mimi', '2020-06-14'),
(4, 'A belief that there are better days ahead', 'What we have already achieved gives us hope - the audacity to hope - for what we can and must achieve tomorrow. Not just with words, but with deeds - by investing in our schools and our communities; by enforcing our civil rights laws and ensuring fairness in our criminal justice system; by providing this generation with ladders of opportunity that were unavailable for previous generations. He does not say that he was there because of Barack Obama. Tonight, I say to the American people, to Democrats and Republicans and Independents across this great land - enough! This moment - this election - is our chance to keep, in the 21st century, the American promise alive. You understand that in this election, the greatest risk we can take is to try the same old politics with the same old players and expect a different result.', 'MySelf', '2020-06-14'),
(5, 'I stand here knowing that my story is part of a larger story', 'that I owe a debt to all of those who came before me, and that, in no other country on earth, is my story even possible. And so they need an assurance that somebody out there cares about them, is listening to them - that they are not just destined to travel down that long road toward nothingness. We believe that everyone, everywhere should be loved, and given the chance to work, and raise a family. We will, however, relentlessly confront violent extremists who pose a grave threat to our security.', 'Ipsum', '2020-06-14'),
(13, 'Ce billet a été ajouté via le back-end', 'Attention les yeux.... Est-ce que cela fonctionne ??', 'Jean Forteroche', '2020-06-21'),
(14, 'Now don\'t get me wrong.', 'Clearly, the past 50 years have not weakened your resolve as faithful witnesses of the gospel. The skeptical bent of my mind didn\'t suddenly vanish. That experience guides my conviction that partnership between America and Islam must be based on what Islam is, not what it isn\'t. It is easier to blame others than to look inward; to see what is different about someone than to find the things we share.', 'Jean Forteroche', '2020-06-21'),
(15, 'Ce billet a été ajouté via le back-end', 'Attention les yeux.... Est-ce que cela fonctionne ??\r\nRéponse : oui ça fonctionne parfaitement !!', 'Jean Forteroche', '2020-06-21'),
(16, 'He grew up herding goats, went to school in a tin-roof shack', 'And when these battles were overtaken by others and when the wars they opposed were waged and won, these faithful foot soldiers for justice kept marching. It\'s not enough, but it\'s helping. You\'re on your own. I have made it clear to the Iraqi people that we pursue no bases, and no claim on their territory or resources. Meanwhile, the struggle for women\'s equality continues in many aspects of American life, and in countries around the world.', 'Jean Forteroche', '2020-06-21'),
(17, 'Ce billet a été ajouté via le back-end', 'Attention les yeux.... Est-ce que cela fonctionne ??\r\nRéponse : oui cela fonctionne !!', 'Jean Forteroche', '2020-06-21'),
(18, 'He grew up herding goats, went to school in a tin-roof shack modifié', 'And when these battles were overtaken by others and when the wars they opposed were waged and won, these faithful foot soldiers for justice kept marching. It\'s not enough, but it\'s helping. You\'re on your own. I have made it clear to the Iraqi people that we pursue no bases, and no claim on their territory or resources. Meanwhile, the struggle for women\'s equality continues in many aspects of American life, and in countries around the world.', 'Jean Forteroche', '2020-06-24'),
(25, 'Ce billet a été ajouté via le back-end', '<p>Attention les yeux.... Est-ce que cela fonctionne ?? R&eacute;ponse : oui cela fonctionne !!</p>\r\n<p>Modifi&eacute; avec TinyMCE</p>', 'Jean Forteroche', '2020-06-28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `role_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_role_id` (`role_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `created_date`, `role_id`) VALUES
(3, 'littlemy', '$2y$10$dI.xZ4MdyEjQLW.qtNVBiOHPlNM9d4eN8RHhVQ1nVaiRdK5gmqfN6', '2020-06-28', 2),
(4, 'jean', '$2y$10$GZ56lt.wGQ6YbUZZx6EgWOOnJoCOVdgwcALjdYz/vNp5oeqLDid1K', '2020-06-28', 1);
--
-- Base de données :  `grafikart`
--
CREATE DATABASE IF NOT EXISTS `grafikart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grafikart`;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Article de test 1 modifié', 'Contenu de test 1 modifié', '2019-12-30 00:00:00'),
(2, 'Deuxième titre modifié', 'Haec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum longius ea tempestate distinebatur, iussus comes orientis Nebridius contractis undique militaribus copiis ad eximendam periculo civitatem amplam et oportunam studio properabat ingenti, quo cognito abscessere latrones nulla re amplius memorabili gesta, dispersique ut solent avia montium petiere celsorum.\r\n\r\nEmensis itaque difficultatibus multis et nive obrutis callibus plurimis ubi prope Rauracum ventum est ad supercilia fluminis Rheni, resistente multitudine Alamanna pontem suspendere navium conpage Romani vi nimia vetabantur ritu grandinis undique convolantibus telis, et cum id inpossibile videretur, imperator cogitationibus magnis attonitus, quid capesseret ambigebat.\r\n\r\nExcitavit hic ardor milites per municipia plurima, quae isdem conterminant, dispositos et castella, sed quisque serpentes latius pro viribus repellere moliens, nunc globis confertos, aliquotiens et dispersos multitudine superabatur ingenti, quae nata et educata inter editos recurvosque ambitus montium eos ut loca plana persultat et mollia, missilibus obvios eminus lacessens et ululatu truci perterrens.\r\n\r\nRogatus ad ultimum admissusque in consistorium ambage nulla praegressa inconsiderate et leviter proficiscere inquit ut praeceptum est, Caesar sciens quod si cessaveris, et tuas et palatii tui auferri iubebo prope diem annonas. hocque solo contumaciter dicto subiratus abscessit nec in conspectum eius postea venit saepius arcessitus.', '2019-12-29 00:00:00'),
(3, 'Troisième article', 'cet article a été écrit le 30/12/2019 à environ 23h32 UTC.', '2019-12-30 00:00:00');
--
-- Base de données :  `pluralsight`
--
CREATE DATABASE IF NOT EXISTS `pluralsight` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pluralsight`;

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `pen_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `pen_name`) VALUES
(1, 'Samuel Langhorne', 'Clemens', NULL),
(2, 'Lucy Maud', 'Montgomery', 'L.M. Montgomery'),
(3, 'Louisa May', 'Alcott', NULL),
(5, 'Jane', 'Austin', NULL),
(6, 'William', 'Shakespeare', NULL),
(7, 'Arthur Ignatius Conan', 'Doyle', 'Conan Doyle'),
(8, 'Arthur Ignatius Conan', 'Doyle', 'Conan Doyle');
--
-- Base de données :  `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='table contenant tous les commentaires du blog';

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'anonyme', 'Super ! bon courage alors :)', '2019-11-11 15:37:28'),
(2, 2, 'moi-même', 'Je ne suis pas timide et j\'ajoute ce premier commentaire au billet numéro 2', '2019-11-11 15:37:28'),
(3, 3, 'anonyme', 'j\'ai hâte de voir ça !!!!! lol', '2019-11-11 15:38:21'),
(4, 3, 'anonyme', 'J\'aime bien le look de ce blog ;)', '2019-11-12 00:07:36'),
(5, 2, 'encore moi', 'et moi j\'en ajoute un autre ^^', '2019-11-12 18:17:43'),
(6, 2, 'moi', 'mon commentaire', '2019-11-12 18:15:03'),
(7, 2, 'encore moi', 'encore un énième commentaire !!!', '2019-11-13 17:48:20'),
(8, 2, 'encore moi', 'Un dernier commentaire ^^', '2019-11-13 17:48:46'),
(9, 3, 'mimi', 'Premier commentaire en mode MVC', '2019-11-25 11:47:25');

-- --------------------------------------------------------

--
-- Structure de la table `jeux_video`
--

DROP TABLE IF EXISTS `jeux_video`;
CREATE TABLE IF NOT EXISTS `jeux_video` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `ID_proprietaire` int(11) NOT NULL,
  `possesseur` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `nbre_joueurs_max` int(11) NOT NULL DEFAULT '0',
  `commentaires` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux_video`
--

INSERT INTO `jeux_video` (`ID`, `nom`, `ID_proprietaire`, `possesseur`, `console`, `prix`, `nbre_joueurs_max`, `commentaires`, `date_ajout`) VALUES
(1, 'Super Mario Bros', 3, 'Michel', 'NES', 4, 1, 'Un jeu d\'anthologie !', '2019-11-11 13:47:41'),
(2, 'Sonic', 2, 'Patrick', 'Megadrive', 2, 1, 'Pour moi, le meilleur jeu du monde !', '2019-11-11 13:47:41'),
(3, 'Zelda : ocarina of time', 3, 'Michel', 'Nintendo 64', 15, 1, 'Un jeu grand, beau et complet comme on en voit rarement de nos jours', '2019-11-11 13:47:41'),
(4, 'Mario Kart 64', 3, 'Michel', 'Nintendo 64', 25, 4, 'Un excellent jeu de kart !', '2019-11-11 13:47:41'),
(5, 'Super Smash Bros Melee', 3, 'Michel', 'GameCube', 55, 4, 'Un jeu de baston délirant !', '2019-11-11 13:47:41'),
(6, 'Dead or Alive', 2, 'Patrick', 'Xbox', 60, 4, 'Le plus beau jeu de baston jamais créé', '2019-11-11 13:47:41'),
(7, 'Dead or Alive Xtreme Beach Volley Ball', 2, 'Patrick', 'Xbox', 60, 4, 'Un jeu de beach volley de toute beauté o_O', '2019-11-11 13:47:41'),
(8, 'Enter the Matrix', 3, 'Michel', 'PC', 45, 1, 'Plutôt bof comme jeu, mais ça complète bien le film', '2019-11-11 13:47:41'),
(9, 'Max Payne 2', 3, 'Michel', 'PC', 50, 1, 'Très réaliste, une sorte de film noir sur fond d\'histoire d\'amour. A essayer !', '2019-11-11 13:47:41'),
(10, 'Yoshi\'s Island', 3, 'Michel', 'SuperNES', 6, 1, 'Le paradis des Yoshis :o)', '2019-11-11 13:47:41'),
(11, 'Commandos 3', 3, 'Michel', 'PC', 44, 12, 'Un bon jeu d\'action où on dirige un commando pendant la 2ème guerre mondiale !', '2019-11-11 13:47:41'),
(12, 'Final Fantasy X', 2, 'Patrick', 'PS2', 40, 1, 'Encore un Final Fantasy mais celui la est encore plus beau !', '2019-11-11 13:47:41'),
(13, 'Pokemon Rubis', 3, 'Michel', 'GBA', 44, 4, 'Pika-Pika-chu !!!', '2019-11-11 13:47:41'),
(14, 'Starcraft', 3, 'Michel', 'PC', 19, 8, 'Le meilleur jeux pc de tout les temps !', '2019-11-11 13:47:41'),
(15, 'Grand Theft Auto 3', 3, 'Michel', 'PS2', 30, 1, 'Comme dans les autres Gta on ecrase tout le monde :) .', '2019-11-11 13:47:41'),
(16, 'Homeworld 2', 3, 'Michel', 'PC', 45, 6, 'Superbe ! o_O', '2019-11-11 13:47:41'),
(17, 'Aladin', 2, 'Patrick', 'SuperNES', 10, 1, 'Comme le dessin Animé !', '2019-11-11 13:47:41'),
(18, 'Super Mario Bros 3', 3, 'Michel', 'SuperNES', 10, 2, 'Le meilleur Mario selon moi.', '2019-11-11 13:47:41'),
(19, 'SSX 3', 3, 'Michel', 'Xbox', 56, 2, 'Un très bon jeu de snow !', '2019-11-11 13:47:41'),
(20, 'Star Wars : Jedi outcast', 2, 'Patrick', 'Xbox', 33, 1, 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !', '2019-11-11 13:47:41'),
(21, 'Actua Soccer 3', 2, 'Patrick', 'PS', 30, 2, 'Un jeu de foot assez bof ...', '2019-11-11 13:47:41'),
(22, 'Time Crisis 3', 3, 'Michel', 'PS2', 40, 1, 'Un troisième volet efficace mais pas vraiment surprenant', '2019-11-11 13:47:41'),
(23, 'X-FILES', 2, 'Patrick', 'PS', 25, 1, 'Un jeu censé ressembler a la série mais assez raté ...', '2019-11-11 13:47:41'),
(24, 'Soul Calibur 2', 2, 'Patrick', 'Xbox', 54, 1, 'Un jeu bien axé sur le combat', '2019-11-11 13:47:41'),
(25, 'Diablo', 3, 'Michel', 'PS', 20, 1, 'Comme sur PC mais la c\'est sur un ecran de télé :) !', '2019-11-11 13:47:41'),
(26, 'Street Fighter 2', 2, 'Patrick', 'Megadrive', 10, 2, 'Le célèbre jeu de combat !', '2019-11-11 13:47:41'),
(27, 'Gundam Battle Assault 2', 3, 'Michel', 'PS', 29, 1, 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement', '2019-11-11 13:47:41'),
(28, 'Spider-Man', 3, 'Michel', 'Megadrive', 15, 1, 'Vivez l\'aventure de l\'homme araignée', '2019-11-11 13:47:41'),
(29, 'Midtown Madness 3', 3, 'Michel', 'Xbox', 59, 6, 'Dans la suite des autres versions de Midtown Madness', '2019-11-11 13:47:41'),
(30, 'Tetris', 3, 'Michel', 'Gameboy', 5, 1, 'Qui ne connait pas ? ', '2019-11-11 13:47:41'),
(31, 'The Rocketeer', 3, 'Michel', 'NES', 2, 1, 'Un super un film et un jeu de m*rde ...', '2019-11-11 13:47:41'),
(32, 'Pro Evolution Soccer 3', 2, 'Patrick', 'PS2', 59, 2, 'Un petit jeu de foot sur PS2', '2019-11-11 13:47:41'),
(33, 'Ice Hockey', 3, 'Michel', 'NES', 7, 2, 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)', '2019-11-11 13:47:41'),
(34, 'Sydney 2000', 3, 'Michel', 'Dreamcast', 15, 2, 'Les JO de Sydney dans votre salon !', '2019-11-11 13:47:41'),
(35, 'NBA 2k', 2, 'Patrick', 'Dreamcast', 12, 2, 'A votre avis :p ?', '2019-11-11 13:47:41'),
(36, 'Aliens Versus Predator : Extinction', 3, 'Michel', 'PS2', 20, 2, 'Un shoot\'em up pour pc', '2019-11-11 13:47:41'),
(37, 'Crazy Taxi', 3, 'Michel', 'Dreamcast', 11, 1, 'Conduite de taxi en folie !', '2019-11-11 13:47:41'),
(38, 'Le Maillon Faible', 1, 'Florent', 'PS2', 10, 1, 'Le jeu de l\'émission', '2019-11-11 13:47:41'),
(39, 'FIFA 64', 3, 'Michel', 'Nintendo 64', 25, 2, 'Le premier jeu de foot sur la N64 =) !', '2019-11-11 13:47:41'),
(40, 'Qui Veut Gagner Des Millions', 3, 'Michel', 'PS2', 10, 1, 'Le jeu de l\'émission', '2019-11-11 13:47:41'),
(41, 'Monopoly', 0, 'Sebastien', 'Nintendo 64', 21, 4, 'Bheuuu le monopoly sur N64 !', '2019-11-11 13:47:41'),
(42, 'Taxi 3', 0, 'Corentin', 'PS2', 19, 4, 'Un jeu de voiture sur le film', '2019-11-11 13:47:41'),
(43, 'Indiana Jones Et Le Tombeau De L\'Empereur', 3, 'Michel', 'PS2', 25, 1, 'Notre aventurier préféré est de retour !!!', '2019-11-11 13:47:41'),
(44, 'F-ZERO', 1, 'Florent', 'GBA', 25, 4, 'Un super jeu de course futuriste !', '2019-11-11 13:47:41'),
(45, 'Harry Potter Et La Chambre Des Secrets', 1, 'Florent', 'Xbox', 30, 1, 'Abracadabra !! Le célebre magicien est de retour !', '2019-11-11 13:47:41'),
(46, 'Half-Life', 0, 'Corentin', 'PC', 15, 32, 'L\'autre meilleur jeu de tout les temps (surtout ses mods).', '2019-11-11 13:47:41'),
(47, 'Myst III Exile', 0, 'Sébastien', 'Xbox', 49, 1, 'Un jeu de réflexion', '2019-11-11 13:47:41'),
(48, 'Wario World', 0, 'Sebastien', 'Gamecube', 40, 4, 'Wario vs Mario ! Qui gagnera ! ?', '2019-11-11 13:47:41'),
(49, 'Rollercoaster Tycoon', 3, 'Michel', 'Xbox', 29, 1, 'Jeu de gestion d\'un parc d\'attraction', '2019-11-11 13:47:41'),
(50, 'Splinter Cell', 2, 'Patrick', 'Xbox', 53, 1, 'Jeu magnifique !', '2019-11-11 13:47:41'),
(52, 'Mario kart Tour', 0, 'moi', 'Smartphone', 0, 1, 'super jeu', '2019-11-11 14:19:58');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`ID`, `pseudo`, `message`) VALUES
(4, 'Elsa', 'Est-ce que ça marche vraiment ?'),
(2, 'littlemy', 'Premier message'),
(3, 'Alex', 'C\'est trop cool ce chat !!'),
(5, 'admin', 'test PDO');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creationDate` datetime NOT NULL,
  `modifDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `author`, `title`, `content`, `creationDate`, `modifDate`) VALUES
(2, 'Myriam', 'News saisie via le formulaire', 'voici la premiÃ¨re news saisie avec le formulaire d\'administration :)', '2020-01-11 14:59:15', '2020-01-11 14:59:15'),
(3, 'Place gre.net', 'BientÃ´t la fin des travaux Ã  l\'Ã©cole AmpÃ¨re, qui a fait peau neuve', 'FIL INFO â€“ Lâ€™Ã©cole primaire situÃ©e rue AmpÃ¨re a reÃ§u, ce vendredi 9 janvier, la visite dâ€™Ã‰ric Piolle, maire de Grenoble, venu observer les amÃ©nagements effectuÃ©s dans le cadre du Plan Ã‰cole 2015-2024. La rÃ©habilitation de lâ€™Ã©cole qui a dÃ©butÃ© en juillet 2018 devrait prendre fin dans les prochaines semaines.', '2020-01-11 15:02:51', '2020-01-11 15:02:51'),
(4, 'JÃ©rÃ©my Tronc', 'Le patrimoine mÃ©tropolitain en lumiÃ¨re', 'Câ€™est un travail exceptionnel menÃ© pour la MÃ©tro par Jean Guibal, conservateur en chef du patrimoine et ancien directeur du MusÃ©e dauphinois : rÃ©fÃ©rencer les Ã©difices patrimoniaux remarquables de 49 communes de la mÃ©tropole grenobloise.', '2020-01-11 15:04:37', '2020-01-11 15:04:37'),
(5, 'JÃ©rÃ©my Tronc', 'Picasso attire 100 000 visiteurs', 'Expo / MalgrÃ© un thÃ¨me exigeant et grave, lâ€™exposition Picasso au cÅ“ur des tÃ©nÃ¨bres (1939 â€“ 1945) prÃ©sentÃ©e au musÃ©e de Grenoble est parvenue Ã  attirer plus de 100 000 visiteurs.\r\n\r\nLâ€™Ã©tablissement franchit pour la cinquiÃ¨me fois en 10 ans ce cap et confirme sa belle dynamique avec une progression de 10% du nombre de visiteurs par rapport Ã  lâ€™annÃ©e prÃ©cÃ©dente. 226 454 visiteurs ont parcouru les allÃ©es du musÃ©e en 2019, le plus beau chiffre de frÃ©quentation depuis 2011 !', '2020-01-11 15:05:45', '2020-01-11 15:05:45'),
(6, 'Myriam', 'Un grand Tour en IsÃ¨re', 'Cyclisme / Ce sont pas moins de trois journÃ©es du Tour de France qui seront accueillies cette annÃ©e en IsÃ¨re. Un contraste important avec lâ€™annÃ©e 2019 oÃ¹ le dÃ©partement nâ€™a reÃ§u aucune Ã©tape de la grande boucle.\r\n\r\nLe Tour arrivera le lundi 13 juillet pour une journÃ©e de repos avant une seiziÃ¨me Ã©tape 100% isÃ©roise. Le parcours de 164 km partira le mardi 14 juillet de la Tour-du-Pin. Les coureurs devront rejoindre Villard-de-Lans, via Voiron, Saint-Laurent-du-Pont, le col de Porte, Meylan, DomÃ¨ne, Uriage, Le Pont-de-Claix, Seyssins et Saint-Nizier-du-Moucherotte.', '2020-01-11 15:06:46', '2020-01-11 15:40:42');

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

DROP TABLE IF EXISTS `personnages`;
CREATE TABLE IF NOT EXISTS `personnages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `forcePerso` int(11) NOT NULL,
  `degats` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `experience` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `forcePerso`, `degats`, `niveau`, `experience`) VALUES
(1, 'Mimi', 50, 10, 15, 3),
(2, 'Alex', 30, 20, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `personnages_v2`
--

DROP TABLE IF EXISTS `personnages_v2`;
CREATE TABLE IF NOT EXISTS `personnages_v2` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `degats` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `timeEndormi` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type` enum('magicien','guerrier') NOT NULL,
  `atout` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `persos`
--

DROP TABLE IF EXISTS `persos`;
CREATE TABLE IF NOT EXISTS `persos` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `degats` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `persos`
--

INSERT INTO `persos` (`id`, `nom`, `degats`) VALUES
(1, 'Mimi', 10),
(2, 'Alex', 5),
(3, 'Elsa', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Table contenantla liste des billets du blog';

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`ID`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon super blog !!', 'je suis très fière de vous accueillir sur mon blog que j\'ai créé moi-même. Il est basique mais ce n\'est qu\'un début !\r\nVous allez voir quand j\'aurai fini mes cours il sera super bien ^^', '2019-11-11 15:31:29'),
(2, 'Ne soyez pas timides ^^', 'Si vous souhaitez réagir à l\'un des billet de mon blog n\'hésitez pas à laisser un commentaire ;)\r\nMerci', '2019-11-11 15:33:25'),
(3, 'Le PHP à la conquête du monde !', 'maintenant que je connais (un peu) de PHP je vais pouvoir faire des supers sites !!!\r\nYEAH!!!!!!\r\n** PHP rules **', '2019-11-11 15:35:06');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaires`
--

DROP TABLE IF EXISTS `proprietaires`;
CREATE TABLE IF NOT EXISTS `proprietaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `tel` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proprietaires`
--

INSERT INTO `proprietaires` (`id`, `prenom`, `nom`, `tel`) VALUES
(1, 'Florent', 'Dugommier', '01 44 77 21 33'),
(2, 'Patrick', 'Lejeune', '03 22 17 41 22'),
(3, 'Michel', 'Doussand', '04 11 78 02 00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
