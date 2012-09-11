-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 173.201.136.204
-- Generation Time: Sep 11, 2012 at 02:30 PM
-- Server version: 5.0.92
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ruppert`
--
CREATE DATABASE `ruppert` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ruppert`;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `full_name` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` VALUES(1, 'chris', 'Christopher Ruppert');
INSERT INTO `artists` VALUES(2, 'beth', 'Elizabeth Kennamer');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `username` varchar(50) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` VALUES('steve', '7d2d26d43648e7cff72994c4ccb0beda');
INSERT INTO `auth` VALUES('chris', '9d91bc4abbf4d61900a51058c6d04fe8');
INSERT INTO `auth` VALUES('beth', '245c5e1840c5bed946c50b4eb4288005');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `block_id` tinyint(4) NOT NULL default '0',
  `block_name` varchar(255) default NULL,
  `block` text,
  PRIMARY KEY  (`block_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` VALUES(0, 'nw', '<p>\n                Under the direction of Elizabeth Kennamer, our first show took place in October 2011 at the Anthroposophical Society''s Annual Meeting for North and South America, held in Portland. Because of it''s great success we have immediately turned our efforts towards the future and our next event. Portland is a center for great art and we intend on playing a role in this.\n                        </p>\n                        <p>\n                                The East/NW Art Salon is a Portland, OR, based group of artists who meet twice a month for intense critique and event planning. As a collective, our main concern is to support and enhance each member''s contribution towards the salon by creating opportunities for both the group and individual artists. We are interested in working with galleries, collectors and individuals who understand and promote art as a personal, cultural and financial investment.\n                        </p>');
INSERT INTO `blocks` VALUES(2, 'ne', ' <div class=''profile_thumb''><img src='''' alt=''thumb'' /><div>Artist, Artist</div></div> <div class=''profile_thumb''><img src='''' alt=''thumb'' /><div>Artist, Artist</div></div>');
INSERT INTO `blocks` VALUES(3, 'sw', '<div class=''column''>guest artists</div>');
INSERT INTO `blocks` VALUES(4, 'se', '<p>Events:</p>\n                <div><span>past</span><span>future</span>');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `id` tinyint(9) default NULL,
  `title` varchar(100) default NULL,
  `subtitle` varchar(255) default NULL,
  `location` varchar(60) default NULL,
  `commission` int(11) default NULL,
  `medium` varchar(255) default NULL,
  `dimensions` varchar(30) default NULL,
  `create_date` datetime default NULL,
  `display_order` tinyint(4) default NULL,
  `collection` varchar(255) default NULL,
  `explanation` text,
  `master` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` VALUES(53, 'Back Box', '', '', NULL, 'Artist, Box', '3.5'' x 3.5'' x 3.5''', '2001-01-01 00:00:00', 1, '', '', '');
INSERT INTO `item_details` VALUES(54, 'Lil'' Bit', '', '', NULL, 'Oil, Plaster Form', '', '2002-01-01 00:00:00', 2, '', '', '');
INSERT INTO `item_details` VALUES(55, ' Weird Ball', '', '', NULL, 'Soccer ball, undone stiches', '', '2003-01-01 00:00:00', 3, '', '', '');
INSERT INTO `item_details` VALUES(56, 'Archaic Torso', '', '', NULL, 'Artist, boxes (steel & wood)', '', '2003-01-01 00:00:00', 4, '', '', '');
INSERT INTO `item_details` VALUES(57, 'Failure Apparatus', '', '', NULL, 'Artist, Helpers, Steel, Wood', '', '2003-01-01 00:00:00', 5, '', '', '');
INSERT INTO `item_details` VALUES(58, 'Trans Madonna', '', '', NULL, 'Breast Milk, Enzymes, Wax', '', '2004-01-01 00:00:00', 6, '', '', '');
INSERT INTO `item_details` VALUES(59, 'Goliath', '', '', NULL, 'Bronze', '11'' x 16''', '2002-01-01 00:00:00', 7, '', '', '');
INSERT INTO `item_details` VALUES(60, 'The Redeemable Moon', '', '', NULL, 'Stainless Steel, Maple', '5'' long', '2009-01-01 00:00:00', 8, 'D''Anna Collection', '', '');
INSERT INTO `item_details` VALUES(61, 'The Brothers Breton', '', '', NULL, 'Bronze', '29" high', '2009-01-01 00:00:00', 9, 'D''Anna collection', '', '');
INSERT INTO `item_details` VALUES(52, 'Boars Head', 'Collaboration with Esque and Kapow', '', NULL, 'Glass, Wood', '', '2010-01-01 00:00:00', 10, 'D''Anna Collection', '', '');
INSERT INTO `item_details` VALUES(41, 'Pitbull & Parakeet', NULL, 'Corner of the Living Room', NULL, 'oil on canvas', '24" x 48"', '1998-01-01 00:00:00', 1, 'Sabia Collection', '', '');
INSERT INTO `item_details` VALUES(43, 'Mabel', NULL, 'Neighbor and Model from Bolton Hill, Baltimore', NULL, 'oil on canvas', '21" x 26"', '2003-01-01 00:00:00', 2, 'Artist''s Collection', '', '');
INSERT INTO `item_details` VALUES(44, 'Self Portrait', NULL, 'Late Night Alla Prima Using Two Mirrors', NULL, 'oil on wood', '22" x 28"', '2003-01-01 00:00:00', 3, 'D''Anna Collection', '', '');
INSERT INTO `item_details` VALUES(45, 'Grand Farrell', NULL, 'Portrait of Artist''s Grandfather', NULL, 'oil on canvas', '25" x 30"', '2003-01-01 00:00:00', 4, 'Artist''s Collection', '', '');
INSERT INTO `item_details` VALUES(46, 'Miriam', NULL, 'Portrait of Artist''s Sister', NULL, 'oil on canvas', '26" x 32"', '2004-01-01 00:00:00', 5, 'Mom''s Collection', '', '');
INSERT INTO `item_details` VALUES(47, 'Portrait of Ray Allen', NULL, 'Portrait of Provost at MICA', NULL, 'oil on canvas', '3'' x 4''', '2004-01-01 00:00:00', 6, 'Collection of MICA', '', '');
INSERT INTO `item_details` VALUES(48, 'Portrait of Stacey Johnson', NULL, '', NULL, 'oil on canvas', '20" x 30"', '2005-01-01 00:00:00', 7, 'Johnson Collection', '', '');
INSERT INTO `item_details` VALUES(49, 'Portrait of Watson', NULL, '', NULL, 'oil on canvas', '8" x 10.5"', '2005-01-01 00:00:00', 8, 'Towery Collection', '', '');
INSERT INTO `item_details` VALUES(50, 'Portrait of James & Emma', NULL, '', NULL, 'oil on canvas', '26" x 34"', '2005-01-01 00:00:00', 9, 'Johnson Collection', '', '');
INSERT INTO `item_details` VALUES(31, 'Peonies', NULL, '', NULL, 'oil on canvas', '26" x 32"', '2006-01-01 00:00:00', 10, 'Stephenson Collection', '', '');
INSERT INTO `item_details` VALUES(32, 'Portrait of Jeff', NULL, '', NULL, 'oil on canvas', '22" x 28"', '2006-01-01 00:00:00', 11, 'Jeff and Norma Epstein Collection', '', '');
INSERT INTO `item_details` VALUES(33, 'Portrait of Scarlet', NULL, '', NULL, 'oil on canvas', '22" x 28"', '2006-01-01 00:00:00', 12, 'Bonner Collection', '', '');
INSERT INTO `item_details` VALUES(34, 'Portrait of Joel', NULL, '', NULL, 'oil on canvas', '13.5" x 18"', '2006-01-01 00:00:00', 13, 'Bobeck Collection', '', '');
INSERT INTO `item_details` VALUES(35, 'Portrait of Carmen', NULL, '', NULL, 'oil and acrylic on canvas', '3'' x 5''', '2007-01-01 00:00:00', 14, 'D''Anna Collection', '', '');
INSERT INTO `item_details` VALUES(36, 'Sheila', NULL, 'Friend and Professional Model from Baltimore', NULL, 'oil on canvas', '3.5'' x 4.5''', '2007-01-01 00:00:00', 15, 'Artist Collection', '', '');
INSERT INTO `item_details` VALUES(37, 'Portrait of Ruth Cavill', NULL, '', NULL, 'oil on canvas', '22" x 28"', '2008-01-01 00:00:00', 16, 'Cavill Collection', '', '');
INSERT INTO `item_details` VALUES(38, 'Flowers and Fox Skull', NULL, '', NULL, 'oil on canvas', '22" x 32"', '2008-01-01 00:00:00', 17, 'Pfeltzer Collection', '', '');
INSERT INTO `item_details` VALUES(39, 'The Burnett Sisters', NULL, '', NULL, 'oil on canvas', '22"` x 28"', '2008-01-01 00:00:00', 18, 'Burnett Collection', '', '');
INSERT INTO `item_details` VALUES(40, 'LIllian Dale Snyder', NULL, '', NULL, 'oil on canvas', '10" x 13"', '2009-01-01 00:00:00', 19, 'Johnson Collection', '', '');
INSERT INTO `item_details` VALUES(42, 'Cefalu in Profile', NULL, '', NULL, 'oil on canvas', '3'' x 4''', '2009-01-01 00:00:00', 20, 'D''Anna Collection', '', '');
INSERT INTO `item_details` VALUES(1, 'Two Willows', '', '', NULL, 'oil on plaster', '5.5'' x 55''', '1996-01-01 00:00:00', 1, 'Schwartz Collection', '', 'Claude Monet');
INSERT INTO `item_details` VALUES(2, 'The Kiss', '', '', NULL, 'oil on canvas', '5'' x 5''', '1999-01-01 00:00:00', 2, 'Prumo Collection', '', 'Gustav Klimt');
INSERT INTO `item_details` VALUES(3, 'The Embrace', '', '', NULL, 'oil on canvas', '5'' x 7''', '2000-01-01 00:00:00', 3, 'Prumo Collection', '', 'Pablo Picasso');
INSERT INTO `item_details` VALUES(4, 'Bison', '', '', NULL, 'oil, plaster, charcoal on canvas', '32" x 46"', '2001-01-01 00:00:00', 4, 'Prumo Collection', '', 'Anonymous Altimira Cave Painting');
INSERT INTO `item_details` VALUES(5, 'Peonies in a Vase', '', '', NULL, 'oil on canvas', '26" x 28"', '2001-01-01 00:00:00', 5, 'Fischer Collection', '', 'Edward Manet');
INSERT INTO `item_details` VALUES(6, 'Nude', '', '', NULL, 'oil on paper', '10" x 13"', '2002-01-01 00:00:00', 6, '', '', 'Lucian Freud');
INSERT INTO `item_details` VALUES(7, 'Title Unknown', '', '', NULL, 'oil on paper', '6" x 8"', '2002-01-01 00:00:00', 7, '', '', 'Lucian Freud');
INSERT INTO `item_details` VALUES(8, 'Birchwood Forest', '', '', NULL, 'oil on canvas', '38" x 42"', '2004-01-01 00:00:00', 8, 'D''Anna Collection', '', 'Gustav Klimt');
INSERT INTO `item_details` VALUES(63, 'Bullfight', NULL, '', NULL, 'oil on canvas', '30" x 40"', '1989-01-01 00:00:00', 1, '', '', '');
INSERT INTO `item_details` VALUES(64, 'Daymare', NULL, '', NULL, 'oil on canvas', '18" x 24"', '1990-01-01 00:00:00', 2, '', '', '');
INSERT INTO `item_details` VALUES(65, '', NULL, '', NULL, 'oil on canvas', '30" x 40"', '1991-01-01 00:00:00', 3, '', '', '');
INSERT INTO `item_details` VALUES(66, 'Learning Curve', NULL, '', NULL, 'oil on canvas', '30" x 40"', '1992-01-01 00:00:00', 4, '', '', '');
INSERT INTO `item_details` VALUES(67, 'gods of spring, Washington Square', NULL, '', NULL, 'oil on canvas', '30" x 40"', '1993-01-01 00:00:00', 5, '', '', '');
INSERT INTO `item_details` VALUES(68, 'Yellow Skull', NULL, '', NULL, 'enamel on board', '12" x 16"', '2010-01-01 00:00:00', 1, '', '', '');
INSERT INTO `item_details` VALUES(69, 'Blu Owl', NULL, '', NULL, 'enamel on board', '12" x 16"', '2010-01-01 00:00:00', 2, '', '', '');
INSERT INTO `item_details` VALUES(70, 'New Portland Rose', NULL, '', NULL, 'enamel on board', '12" x 16"', '2010-01-01 00:00:00', 3, '', '', '');
INSERT INTO `item_details` VALUES(71, 'Descending Climber', NULL, '', NULL, 'charcoal,ink & gesso on paper', '24" x 36"', '2011-01-01 00:00:00', 4, 'Johnson Collection', '', '');
INSERT INTO `item_details` VALUES(72, 'Upward Climbers', NULL, '', NULL, 'charcoal,ink & gesso on paper', '24" x 36"', '2011-01-01 00:00:00', 5, 'Johnson Collection', '', '');
INSERT INTO `item_details` VALUES(73, 'Two Climbers', NULL, '', NULL, 'charcoal,ink & gesso on paper', '24" x 36"', '2011-01-01 00:00:00', 6, 'Johnson Collection', '', '');
INSERT INTO `item_details` VALUES(74, 'Ice Climber', NULL, '', NULL, 'charcoal on paper', '24" x 36"', '2011-01-01 00:00:00', 7, 'Johnson collection', '', '');
INSERT INTO `item_details` VALUES(75, 'Fell''s Point at Night', NULL, '', NULL, 'oil on canvas', '32" x 48"', '2012-01-01 00:00:00', 8, 'Ronald collection', '', '');
INSERT INTO `item_details` VALUES(76, 'Arjuna and Nashingadav', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 1, '', '', '');
INSERT INTO `item_details` VALUES(77, 'Peony for Meadow', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 10, '', '', '');
INSERT INTO `item_details` VALUES(78, 'Sailor Jerry Girl', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 2, '', '', '');
INSERT INTO `item_details` VALUES(79, 'Buffalo and Circular Script', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 3, '', '', '');
INSERT INTO `item_details` VALUES(80, 'Fire Star Heart Protector', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 4, '', '', '');
INSERT INTO `item_details` VALUES(81, 'PSU Skull', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 5, '', '', '');
INSERT INTO `item_details` VALUES(82, 'Tattoo 13', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 6, '', '', '');
INSERT INTO `item_details` VALUES(83, 'Ruby Throated Humming Bird for Leslie', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 7, '', '', '');
INSERT INTO `item_details` VALUES(84, 'Cherry Blossoms for Allison', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 8, '', '', '');
INSERT INTO `item_details` VALUES(85, 'Adam''s  Raspberries for Grandma', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 9, '', '', '');
INSERT INTO `item_details` VALUES(86, 'Tiger with Water Element for Brian', NULL, '', NULL, '', '', '2012-01-01 00:00:00', 10, '', '', '');
INSERT INTO `item_details` VALUES(99, 'Born', '', 'New York', NULL, '', '', '1968-01-01 00:00:00', 1, '', '', '');
INSERT INTO `item_details` VALUES(100, 'Childhood', '', 'Michigan', NULL, '', '', '1972-01-01 00:00:00', 2, '', '', '');
INSERT INTO `item_details` VALUES(101, 'High School', 'Calvert Hall', 'Maryland', NULL, '', '', '1985-01-01 00:00:00', 3, '', '', '');
INSERT INTO `item_details` VALUES(97, 'Pro International Standard Ballroom', 'Virginia Open, with Partner, Christina Zukor', '', NULL, '', '', '1999-01-01 00:00:00', 7, '', '', '');
INSERT INTO `item_details` VALUES(104, '', '', '', NULL, '', '', NULL, 9, '', '', '');
INSERT INTO `item_details` VALUES(108, 'Muralist', 'copy of Monet''s "Two Willows,"', 'Baltimore, Maryland', NULL, '', '', '1996-01-01 00:00:00', 6, '', '', '');
INSERT INTO `item_details` VALUES(103, 'Scenic Artist', 'Obelisks for MTV', 'NYC', NULL, '', '', '1993-01-01 00:00:00', 5, '', '', '');
INSERT INTO `item_details` VALUES(102, 'Graduate', 'Maryland', 'Maryland Institute College of Art', NULL, '', '', '2004-01-01 00:00:00', 8, '', '', '');
INSERT INTO `item_details` VALUES(107, 'Zoo Keeper w/ lion cubs', 'Maine', '', NULL, '', '', '1989-01-01 00:00:00', 4, '', '', '');
INSERT INTO `item_details` VALUES(109, 'Angry Boar for Devon', NULL, NULL, NULL, NULL, NULL, '2012-01-01 00:00:00', 15, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_filename` varchar(255) default NULL,
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `modified_by` int(4) default NULL,
  `groups` int(6) default NULL,
  `item_desc` varchar(200) default NULL,
  `id` smallint(6) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` VALUES('1 monet two willows.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 1);
INSERT INTO `items` VALUES('2 klimt the kiss.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 2);
INSERT INTO `items` VALUES('3 picasso the embrace.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 3);
INSERT INTO `items` VALUES('4 cave painting.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 4);
INSERT INTO `items` VALUES('5 manet peonies in a vase.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 5);
INSERT INTO `items` VALUES('6 freud nude.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 6);
INSERT INTO `items` VALUES('7 freud unknown.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 7);
INSERT INTO `items` VALUES('8 klimt birchwood forest.jpg', '2012-06-23 14:46:26', NULL, 4, NULL, 8);
INSERT INTO `items` VALUES('oldkingcole.jpg', '2012-07-18 00:16:25', NULL, 5, NULL, 65);
INSERT INTO `items` VALUES('4 grand farrel.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 45);
INSERT INTO `items` VALUES('3 self portrait.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 44);
INSERT INTO `items` VALUES('2 mabel.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 43);
INSERT INTO `items` VALUES('20 Cefalu.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 42);
INSERT INTO `items` VALUES('1 pitbull.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 41);
INSERT INTO `items` VALUES('19 In Memory of Lillian Dale Snyder, 2009.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 40);
INSERT INTO `items` VALUES('18 burnett sisters.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 39);
INSERT INTO `items` VALUES('17 flowers&foxskull.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 38);
INSERT INTO `items` VALUES('16 ruth cavill.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 37);
INSERT INTO `items` VALUES('15 shiela.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 36);
INSERT INTO `items` VALUES('14 carmen.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 35);
INSERT INTO `items` VALUES('13 joel .jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 34);
INSERT INTO `items` VALUES('12 scarlet.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 33);
INSERT INTO `items` VALUES('11 jeffepstein.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 32);
INSERT INTO `items` VALUES('10 peonies.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 31);
INSERT INTO `items` VALUES('5 miriam.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 46);
INSERT INTO `items` VALUES('6 Portrait of Ray Allen 2006.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 47);
INSERT INTO `items` VALUES('7 stacey johnson.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 48);
INSERT INTO `items` VALUES('8 watson.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 49);
INSERT INTO `items` VALUES('9 james&emma.jpg', '2012-06-23 14:50:54', NULL, 1, NULL, 50);
INSERT INTO `items` VALUES('Daymare.jpg', '2012-07-18 00:16:25', NULL, 5, NULL, 64);
INSERT INTO `items` VALUES('10 boar .jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 52);
INSERT INTO `items` VALUES('1 back box.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 53);
INSERT INTO `items` VALUES('2 lil'' bit.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 54);
INSERT INTO `items` VALUES('3 balls.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 55);
INSERT INTO `items` VALUES('4 Archaic Torso_med.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 56);
INSERT INTO `items` VALUES('5 failure apparatus.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 57);
INSERT INTO `items` VALUES('6 trans madonna.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 58);
INSERT INTO `items` VALUES('7 Goliath (in progress), 2009.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 59);
INSERT INTO `items` VALUES('8 redeemable moon .jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 60);
INSERT INTO `items` VALUES('9 brothers breton.jpg', '2012-06-23 14:50:59', NULL, 2, NULL, 61);
INSERT INTO `items` VALUES('bullfight.jpg', '2012-07-18 00:16:25', NULL, 5, NULL, 63);
INSERT INTO `items` VALUES('Risa.jpg', '2012-07-18 00:16:25', NULL, 5, NULL, 66);
INSERT INTO `items` VALUES('spring.jpg', '2012-07-18 00:16:25', NULL, 5, NULL, 67);
INSERT INTO `items` VALUES('1 yellow skull .jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 68);
INSERT INTO `items` VALUES('2 Blu Owl.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 69);
INSERT INTO `items` VALUES('2 new portland rose.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 70);
INSERT INTO `items` VALUES('4 descending climber.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 71);
INSERT INTO `items` VALUES('5 upward climbers.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 72);
INSERT INTO `items` VALUES('6 climbers.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 73);
INSERT INTO `items` VALUES('7 ice climber.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 74);
INSERT INTO `items` VALUES('8 Fells Point engagement.jpg', '2012-07-18 00:16:49', NULL, 9, NULL, 75);
INSERT INTO `items` VALUES('1 Arjuna w: Nashingadav.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 76);
INSERT INTO `items` VALUES('10 Peony for Meadow.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 77);
INSERT INTO `items` VALUES('2 sailor jerry girl.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 78);
INSERT INTO `items` VALUES('3 Buffalo w text.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 79);
INSERT INTO `items` VALUES('4 Fire Star Heart Protector.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 80);
INSERT INTO `items` VALUES('5 skull.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 81);
INSERT INTO `items` VALUES('5 tattoo 13.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 82);
INSERT INTO `items` VALUES('6 Ruby Throated humming bird for Leslie. .jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 83);
INSERT INTO `items` VALUES('7 Cherry Blossoms for Allison.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 84);
INSERT INTO `items` VALUES('8 Adam''s Raspberries.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 85);
INSERT INTO `items` VALUES('9 tiger w:water element for Brian.jpg', '2012-07-28 02:10:51', NULL, 3, NULL, 86);
INSERT INTO `items` VALUES('born1968.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 99);
INSERT INTO `items` VALUES('childhood.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 100);
INSERT INTO `items` VALUES('highschool.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 101);
INSERT INTO `items` VALUES('Balllroom(Int''l Tango).jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 97);
INSERT INTO `items` VALUES('MICA.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 102);
INSERT INTO `items` VALUES('MTVobelisks.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 103);
INSERT INTO `items` VALUES('Ruppert head shot.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 104);
INSERT INTO `items` VALUES('zoo.jpg', '2012-07-28 12:30:06', NULL, 7, NULL, 107);
INSERT INTO `items` VALUES('two willows.jpg', '2012-07-28 13:16:32', NULL, 7, NULL, 108);
INSERT INTO `items` VALUES('boar tattoo final.jpg', '2012-08-17 16:01:05', NULL, 3, NULL, 109);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `cat_id` int(4) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `permissions` int(11) default NULL,
  `active` tinyint(1) default NULL,
  `owner` tinyint(4) default NULL,
  `sec_order` tinyint(3) default NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` VALUES(1, 'original paintings', 0, 1, 1, 1);
INSERT INTO `sections` VALUES(2, 'sculpture and performance', 0, 1, 1, 3);
INSERT INTO `sections` VALUES(3, 'tattoo', 0, 1, 1, 4);
INSERT INTO `sections` VALUES(4, 'master copies', 0, 1, 1, 2);
INSERT INTO `sections` VALUES(5, 'early work', 0, 1, 1, 5);
INSERT INTO `sections` VALUES(6, 'terms and conditions', 0, 0, 1, 8);
INSERT INTO `sections` VALUES(7, 'bio', 0, 1, 1, 7);
INSERT INTO `sections` VALUES(8, 'store front', 0, 0, 1, 9);
INSERT INTO `sections` VALUES(9, 'recent work', 0, 1, 1, 6);
INSERT INTO `sections` VALUES(10, 'contact', 0, 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `temp_details`
--

CREATE TABLE `temp_details` (
  `id` tinyint(9) default NULL,
  `title` varchar(100) default NULL,
  `subtitle` varchar(255) default NULL,
  `location` varchar(60) default NULL,
  `commission` int(11) default NULL,
  `medium` varchar(255) default NULL,
  `dimensions` varchar(30) default NULL,
  `create_date` datetime default NULL,
  `display_order` tinyint(4) default NULL,
  `collection` varchar(255) default NULL,
  `explanation` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_details`
--

INSERT INTO `temp_details` VALUES(41, NULL, NULL, 'Corner of Artist''s Living Room', NULL, NULL, NULL, NULL, NULL, 'Sabia Collection', '');
INSERT INTO `temp_details` VALUES(43, NULL, NULL, 'Neighbor and Model from Bolton Hill, Baltimore', NULL, NULL, NULL, NULL, NULL, 'Artist''s Collection', '');
INSERT INTO `temp_details` VALUES(44, NULL, NULL, 'Late Night Alla Prima Using 2 Mirrors', NULL, NULL, NULL, NULL, NULL, 'D''Anna Collection', '');
INSERT INTO `temp_details` VALUES(45, NULL, NULL, 'Portrait of Artist''s Grandfather', NULL, NULL, NULL, NULL, NULL, 'Artist''s Collection', '');
INSERT INTO `temp_details` VALUES(46, NULL, NULL, 'Portrait of Artist''s Sister', NULL, NULL, NULL, NULL, NULL, 'Mom''s Collection', '');
INSERT INTO `temp_details` VALUES(47, NULL, NULL, 'Portrait of Provost at MICA', NULL, NULL, NULL, NULL, NULL, 'Collection of MICA', '');
INSERT INTO `temp_details` VALUES(48, NULL, NULL, 'Portrait of Stacey Johnson', NULL, NULL, NULL, NULL, NULL, 'Johnson Collection', '');
INSERT INTO `temp_details` VALUES(49, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Towery Collection', '');
INSERT INTO `temp_details` VALUES(50, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Johnson Collection', '');
INSERT INTO `temp_details` VALUES(31, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Stephenson Collection', '');
INSERT INTO `temp_details` VALUES(32, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Epstein Collection', '');
INSERT INTO `temp_details` VALUES(33, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Bonner Collection', '');
INSERT INTO `temp_details` VALUES(34, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Bobeck Collection', '');
INSERT INTO `temp_details` VALUES(35, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'D''Anna Collection', '');
INSERT INTO `temp_details` VALUES(36, NULL, NULL, 'Friend and Professional Model from Baltimore', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(37, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Cavill Collection', '');
INSERT INTO `temp_details` VALUES(38, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Pfeltzer Collection', '');
INSERT INTO `temp_details` VALUES(39, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Burnett Collection', '');
INSERT INTO `temp_details` VALUES(40, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Johnson Collection', '');
INSERT INTO `temp_details` VALUES(42, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'D''Anna Collection', '');
INSERT INTO `temp_details` VALUES(1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Schwartz Collection', '');
INSERT INTO `temp_details` VALUES(2, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(3, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(4, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Prumo Collection', '');
INSERT INTO `temp_details` VALUES(5, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(6, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(7, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(8, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(53, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'This is the middle of the Artist''s back and because of the stifling interior (no vent) the audience is able to watch the flesh panic & flush as the artists breathes his own poison (carbon dioxide).');
INSERT INTO `temp_details` VALUES(54, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Inspired by and named after a character who endured molestation in Paula Vogel''s Play ''How I Learned to Drive''');
INSERT INTO `temp_details` VALUES(55, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '');
INSERT INTO `temp_details` VALUES(56, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Named after a Poem by Reiner Maria Rilka');
INSERT INTO `temp_details` VALUES(57, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'The Failure Apparatus expresses the threshold (achieved through total muscle failure) between the human form and the Divine Principles of geometric perfection as described by the mathematician Vitruvius and illustrated by Leonardo Da Vinci.');
INSERT INTO `temp_details` VALUES(58, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'A feminization of the Eucharist');
INSERT INTO `temp_details` VALUES(59, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Goliath (upon completion) will be a monument to the ultimate futility of war and the age-old, fallen, paradigm of domination as resolution as handed down by a partiarchal cycle of power.');
INSERT INTO `temp_details` VALUES(60, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'A haunting trophy of cosmic redemptive love retrieved from the event horizon of a black hole.');
INSERT INTO `temp_details` VALUES(61, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Sculpted in homage to Malvina Hoffman''s ''Breton Wrestlers'' as modeled by the artist and his younger brother. Represents mortality in the turn of time and the eternal rescue and fratricide of the collective and solitary self.');
INSERT INTO `temp_details` VALUES(62, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Collaboration with master glass blower Justin Parker of Esque Design and expert wood smith Charley Wheelock.');
