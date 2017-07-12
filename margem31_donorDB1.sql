-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2017 at 04:37 PM
-- Server version: 5.6.36-82.0-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `margem31_donorDB1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`margem31`@`localhost` PROCEDURE `getName` (IN `id` INT, OUT `name` VARCHAR(255))  SELECT FirstName INTO name FROM People WHERE People.PersonID = id$$

--
-- Functions
--
CREATE DEFINER=`margem31`@`localhost` FUNCTION `bad_lead` (`p_id` INT) RETURNS INT(11) READS SQL DATA
BEGIN
  DECLARE role_total INT;
  DECLARE d_total INT;
  DECLARE v_total INT;
  
  SELECT count(*) into d_total FROM Donors where DonorID = p_id;
  SELECT count(*) into v_total FROM Volunteers where VolunteerID = p_id;
  SET role_total = d_total + v_total;

  RETURN role_total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `DonorInfo`
-- (See below for the actual view)
--
CREATE TABLE `DonorInfo` (
`PersonID` int(11)
,`FirstName` varchar(255)
,`LastName` varchar(255)
,`PhoneNumber` varchar(10)
,`Email` varchar(255)
,`StreetAddress` varchar(255)
,`Zipcode` char(5)
,`City` varchar(255)
,`Subscribed` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `Donors`
--

CREATE TABLE `Donors` (
  `DonorID` int(11) NOT NULL,
  `Subscribed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Donors`
--

INSERT INTO `Donors` (`DonorID`, `Subscribed`) VALUES
(8, 0),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 0),
(15, 1),
(16, 0),
(17, 0),
(18, 1),
(19, 0),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 0),
(25, 1),
(26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventTitle` varchar(255) NOT NULL,
  `EventDate` date NOT NULL,
  `EventBudget` decimal(6,2) DEFAULT NULL,
  `EventRevenue` decimal(8,2) DEFAULT NULL,
  `Attendance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`EventTitle`, `EventDate`, `EventBudget`, `EventRevenue`, `Attendance`) VALUES
('After School Showcase', '2016-05-31', '200.00', '600.00', 68),
('After School Showcase', '2016-12-18', '150.00', '490.00', 59),
('Camp Showcase', '2016-08-08', '400.00', '1200.00', 156),
('Camp Showcase', '2017-08-19', NULL, NULL, NULL),
('CYAP Kickoff Party', '2017-05-20', '300.00', '600.00', 40),
('Dance Off Fundraiser', '2016-01-14', '150.00', '500.00', 42),
('Halloween Fundraiser', '2016-10-26', '200.00', '590.00', 65),
('Holiday Donor Party', '2016-12-06', '250.00', '980.00', 83),
('Valentine Dance Fundraiser', '2017-02-17', '200.00', '400.00', 34);

-- --------------------------------------------------------

--
-- Table structure for table `Grants`
--

CREATE TABLE `Grants` (
  `Organization` varchar(255) NOT NULL,
  `Deadline` date NOT NULL,
  `Amount` decimal(8,2) NOT NULL,
  `AssignedVolunteer` int(11) DEFAULT NULL,
  `Granted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Grants`
--

INSERT INTO `Grants` (`Organization`, `Deadline`, `Amount`, `AssignedVolunteer`, `Granted`) VALUES
('Juvenile Justice Association', '2016-10-15', '3000.00', 2, 0),
('National ATI', '2016-10-15', '10000.00', 2, 0),
('Open Fields Foundation', '2016-08-15', '2000.00', 1, NULL),
('Public Welfare Foundation', '2016-09-15', '1300.00', 2, 1),
('UUFP', '2016-03-15', '1300.00', 2, NULL),
('UUFP', '2016-09-15', '1300.00', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ItemDonations`
--

CREATE TABLE `ItemDonations` (
  `DonorID` int(11) NOT NULL,
  `ItemDesc` varchar(255) NOT NULL,
  `ValuedAt` decimal(5,2) DEFAULT NULL,
  `DonationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ItemDonations`
--

INSERT INTO `ItemDonations` (`DonorID`, `ItemDesc`, `ValuedAt`, `DonationDate`) VALUES
(9, '3 used bass guitars', '300.00', '2016-07-12'),
(10, '4 guitars', '400.00', '2016-07-12'),
(17, '8 new amps, 2 PAs, 2 used drumkits', '950.00', '2016-07-12'),
(18, '1 used bass guitar', '75.00', '2016-07-13'),
(20, '2 used keyboards', '200.00', '2016-07-13'),
(21, 'food - breakfast', '20.00', '2016-08-03'),
(26, '1 used drumkit, 1 used keyboard', '300.00', '2016-07-13');

--
-- Triggers `ItemDonations`
--
DELIMITER $$
CREATE TRIGGER `NewDonorA` BEFORE INSERT ON `ItemDonations` FOR EACH ROW BEGIN
	declare pID integer;
    declare existsID integer;
    select count(*) into existsID from Donors where DonorID = new.DonorID;
	set pID = new.DonorID;
    IF (existsID = 0)
	THEN INSERT INTO Donors (DonorID, Subscribed) VALUES (pID, True);
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `OneTimeDonation`
--

CREATE TABLE `OneTimeDonation` (
  `DonorID` int(11) NOT NULL,
  `Amount` decimal(5,2) NOT NULL,
  `DonationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OneTimeDonation`
--

INSERT INTO `OneTimeDonation` (`DonorID`, `Amount`, `DonationDate`) VALUES
(8, '35.00', '2016-06-08'),
(8, '25.00', '2016-07-21'),
(8, '30.00', '2016-11-25'),
(8, '10.00', '2016-12-25'),
(8, '20.00', '2017-02-13'),
(9, '200.00', '2016-07-21'),
(9, '40.00', '2016-11-30'),
(10, '20.00', '2016-05-07'),
(10, '200.00', '2016-07-22'),
(10, '50.00', '2016-11-30'),
(10, '10.00', '2016-12-30'),
(11, '10.00', '2017-01-30'),
(14, '200.00', '2016-05-21'),
(14, '30.00', '2016-10-21'),
(14, '10.00', '2016-12-21'),
(14, '20.00', '2017-02-13'),
(15, '250.00', '2016-04-22'),
(15, '40.00', '2016-10-22'),
(15, '10.00', '2016-12-22'),
(15, '20.00', '2017-02-13'),
(16, '10.00', '2016-12-30'),
(17, '800.00', '2016-01-01'),
(17, '200.00', '2017-04-25'),
(18, '20.00', '2016-04-30'),
(18, '90.00', '2016-10-30'),
(18, '10.00', '2016-12-30'),
(19, '250.00', '2016-04-25'),
(19, '30.00', '2016-10-30'),
(19, '10.00', '2016-12-30'),
(20, '15.00', '2016-05-06'),
(20, '80.00', '2016-05-20'),
(20, '25.00', '2016-05-22'),
(20, '55.00', '2016-10-31'),
(20, '15.00', '2016-12-31'),
(21, '30.00', '2016-05-21'),
(21, '15.00', '2016-06-03'),
(21, '60.00', '2016-10-31'),
(21, '10.00', '2016-12-31'),
(22, '30.00', '2016-05-09'),
(22, '25.00', '2016-05-21'),
(22, '50.00', '2016-06-05'),
(22, '90.00', '2016-10-31'),
(22, '10.00', '2016-12-31'),
(23, '20.00', '2016-06-05'),
(23, '80.00', '2016-07-10'),
(23, '100.00', '2016-11-25'),
(23, '10.00', '2016-12-25'),
(23, '20.00', '2017-02-13'),
(25, '40.00', '2016-06-07'),
(25, '30.00', '2016-07-10'),
(25, '120.00', '2016-11-25'),
(25, '10.00', '2016-12-25'),
(25, '20.00', '2017-02-13'),
(26, '300.00', '2016-07-26'),
(26, '60.00', '2016-11-30'),
(26, '10.00', '2016-12-30');

--
-- Triggers `OneTimeDonation`
--
DELIMITER $$
CREATE TRIGGER `NewDonorB` BEFORE INSERT ON `OneTimeDonation` FOR EACH ROW BEGIN
	declare pID integer;
    declare existsID integer;
    select count(*) into existsID from Donors where DonorID = new.DonorID;
	set pID = new.DonorID;
    IF (existsID = 0)
	THEN INSERT INTO Donors (DonorID, Subscribed) VALUES (pID, True);
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE `People` (
  `PersonID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `StreetAddress` varchar(255) DEFAULT NULL,
  `Zipcode` char(5) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `People`
--

INSERT INTO `People` (`PersonID`, `FirstName`, `LastName`, `StreetAddress`, `Zipcode`, `City`, `PhoneNumber`, `Email`) VALUES
(1, 'Juanita', 'Kirk', '1 Vanderhorst St.', '29403', 'Charleston', '8435551234', 'juanita@kirk.xyz'),
(2, 'Eve', 'Sheorain', '21 Saint Souci St.', '29403', 'Charleston', '8435556864', 'yves@fake.biz'),
(3, 'Drea', 'DeNiro', '14B Elmwood St.', '29403', 'Charleston', '8435551418', 'dennie@dre.org'),
(4, 'Carolyn', 'Jazz', '198 Park Circle', '29405', 'North Charleston', '8435559864', 'jazzycarol@aol.com'),
(5, 'Paulette', 'Levine', '158 Meeting St.', '29401', 'Charleston', '8435556646', 'levinelavidaloca@flowers.com'),
(6, 'Nia', 'McCrea', '14B Elmwood St.', '29403', 'Charleston', '8435551255', 'nia@dre.org'),
(7, 'Frankie', 'Prince', '6C Carolina St.', '29403', 'Charleston', '8435553435', 'princefrankie@email.org'),
(8, 'Pat', 'Cower', '478C King St.', '29403', 'Charleston', '8435555678', 'pat@patcower.com'),
(9, 'Kim', 'NoDeal', '478C King St.', '29403', 'Charleston', '8435553333', 'kimberly@bassplace.net'),
(10, 'Courtney', 'Like', '6C Carolina St.', '29403', 'Charleston', '8435551177', 'violet@email.org'),
(11, 'Phoebe', 'Hewson', '34 Maranda Holmes Ave.', '29403', 'Charleston', '8435558999', 'pheebs@yqy.biz'),
(12, 'Mateo', 'DeLile', '1 Line St.', '29403', 'Charleston', '8435550024', 'matty@yahoo.com'),
(13, 'Lavonne', 'Malmuth', '940 Burton Ln.', '29405', 'North Charleston', '8435551211', 'lavonne@delifresh.com'),
(14, 'Dwayne', 'Hamilton', '52 Oswego St.', '29403', 'Charleston', '8435559900', 'dwayne@locallive.com'),
(15, 'Denise', 'Jazz', '198 Park Circle', '29405', 'North Charleston', '8435559864', 'jazzydd@aol.com'),
(16, 'Salter', 'Periwinkle', '6 Apollo Rd.', '29407', 'Charleston', '8435556999', 'periwinkles@tlf.org'),
(17, 'Uncle', 'Moneybags', '47 S. Battery St.', '29401', 'Charleston', '8435551001', 'moneybags@rich.com'),
(18, 'Gina', 'Nguyen', '412 E Erie Ave.', '29439', 'Folly Beach', '8435554695', 'gnguyen@citadel.edu'),
(19, 'Antoine', 'LaCroix', '200 Raven Dr.', '29482', 'Sullivans Island', '8435555687', 'lacroixa@tlf.org'),
(20, 'Mel', 'Park', '16 Lauda Dr.', '29464', 'Mt. Pleasant', '8435552221', 'melp85@yahoo.com'),
(21, 'Joanna', 'Peppers', '44 Watroo Pt.', '29492', 'Charleston', '8435557602', 'peppersj@company.co'),
(22, 'Cleo', 'Ndlovu', '20 Edge Ave.', '29405', 'North Charleston', '8435552001', 'cleo@mutapes.net'),
(23, 'Martha', 'Lee', '1405 Iroquis St.', '29405', 'North Charleston', '8435550003', 'martha@marthalee.com'),
(24, 'Yetta', 'Rosenberg', '23 121st St.', '11356', 'Flushing', '9175552323', 'grandmayetta@aol.com'),
(25, 'Dani', 'Daniels', '7690 Kinston St.', '29418', 'North Charleston', '8435559900', 'dani@locallive.com'),
(26, 'Ami', 'Mizuno', '2693 Mercury Rd.', '29466', 'Mt. Pleasant', '8435551992', 'mizunoa@scouts.org');

-- --------------------------------------------------------

--
-- Table structure for table `RecurringMonthlyDonations`
--

CREATE TABLE `RecurringMonthlyDonations` (
  `DonorID` int(11) NOT NULL,
  `Amount` decimal(5,2) NOT NULL,
  `StartDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RecurringMonthlyDonations`
--

INSERT INTO `RecurringMonthlyDonations` (`DonorID`, `Amount`, `StartDate`) VALUES
(12, '20.00', '2016-02-01'),
(13, '10.00', '2016-02-01'),
(16, '50.00', '2016-01-18'),
(17, '500.00', '2016-01-18'),
(24, '75.00', '2016-03-18');

--
-- Triggers `RecurringMonthlyDonations`
--
DELIMITER $$
CREATE TRIGGER `NewDonorC` BEFORE INSERT ON `RecurringMonthlyDonations` FOR EACH ROW BEGIN
	declare pID integer;
    declare existsID integer;
    select count(*) into existsID from Donors where DonorID = new.DonorID;
	set pID = new.DonorID;
    IF (existsID = 0)
	THEN INSERT INTO Donors (DonorID, Subscribed) VALUES (pID, True);
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `VolunteerInfo`
-- (See below for the actual view)
--
CREATE TABLE `VolunteerInfo` (
`PersonID` int(11)
,`FirstName` varchar(255)
,`LastName` varchar(255)
,`PhoneNumber` varchar(10)
,`Email` varchar(255)
,`StreetAddress` varchar(255)
,`City` varchar(255)
,`Zipcode` char(5)
,`DateJoined` date
);

-- --------------------------------------------------------

--
-- Table structure for table `VolunteerRoles`
--

CREATE TABLE `VolunteerRoles` (
  `VolunteerID` int(11) NOT NULL,
  `Program` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Year` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VolunteerRoles`
--

INSERT INTO `VolunteerRoles` (`VolunteerID`, `Program`, `Role`, `Year`) VALUES
(1, 'Fall ASP', 'Band Coach 1', '2016'),
(1, 'Fall ASP', 'Bass Teacher', '2016'),
(1, 'Fall ASP', 'Workshop Leader: Music Herstory', '2016'),
(1, 'Summer Camp', 'Band Coach 1', '2016'),
(1, 'Summer Camp', 'Bass Teacher 1', '2016'),
(2, 'Fall ASP', 'Keys Teacher', '2016'),
(2, 'Fall ASP', 'Workshop Leader: Beatmaking and DJing', '2016'),
(2, 'Spring ASP', 'Band Coach 2', '2017'),
(2, 'Spring ASP', 'Workshop Leader: Recording', '2017'),
(2, 'Summer Camp', 'Keys Teacher 1', '2016'),
(2, 'Summer Camp', 'Workshop Leader: Beatmaking and DJing', '2016'),
(3, 'Fall ASP', 'Food Coordinator', '2016'),
(3, 'Spring ASP', 'Food Coordinator', '2017'),
(3, 'Spring ASP', 'Keys Teacher', '2017'),
(3, 'Summer Camp', 'Food Coordinator', '2016'),
(3, 'Summer Camp', 'Keys Teacher 2', '2016'),
(4, 'Fall ASP', 'Band Coach 2', '2016'),
(4, 'Fall ASP', 'Drums Teacher', '2016'),
(4, 'Spring ASP', 'Drums Teacher', '2017'),
(4, 'Spring ASP', 'Workshop Leader: Zinemaking', '2017'),
(4, 'Summer Camp', 'Band Coach 2', '2016'),
(4, 'Summer Camp', 'Drums Teacher 1', '2016'),
(5, 'Fall ASP', 'Guitar Teacher', '2016'),
(5, 'Summer Camp', 'Band Coach 3', '2016'),
(5, 'Summer Camp', 'Guitar Teacher 1', '2016'),
(6, 'Spring ASP', 'Wokshop: TBD', '2016'),
(7, 'Summer Camp', 'Drums Teacher 2', '2016'),
(7, 'Summer Camp', 'Workshop Leader: Self Defense', '2016'),
(8, 'Spring ASP', 'Band Coach 1', '2017'),
(8, 'Spring ASP', 'Bass Teacher', '2017'),
(8, 'Summer Camp', 'Band Coach 4', '2016'),
(8, 'Summer Camp', 'Bass Teacher 2', '2016'),
(9, 'Spring ASP', 'Guitar Teacher', '2017'),
(9, 'Summer Camp', 'Guitar Teacher 2', '2016'),
(9, 'Summer Camp', 'Workshop Leader: Songwriting', '2016'),
(10, 'Summer Camp', 'Food Coordinator Assistant', '2016'),
(11, 'Summer Camp', 'Workshop Leader: FX and Pedals', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `Volunteers`
--

CREATE TABLE `Volunteers` (
  `VolunteerID` int(11) NOT NULL DEFAULT '0',
  `DateJoined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Volunteers`
--

INSERT INTO `Volunteers` (`VolunteerID`, `DateJoined`) VALUES
(1, '2016-04-18'),
(2, '2016-04-18'),
(3, '2016-04-20'),
(4, '2016-04-20'),
(5, '2016-04-22'),
(6, '2016-04-24'),
(7, '2016-04-25'),
(8, '2016-04-25'),
(9, '2016-04-25'),
(10, '2016-04-26'),
(11, '2016-04-26');

-- --------------------------------------------------------

--
-- Structure for view `DonorInfo`
--
DROP TABLE IF EXISTS `DonorInfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`margem31`@`localhost` SQL SECURITY DEFINER VIEW `DonorInfo`  AS  select `People`.`PersonID` AS `PersonID`,`People`.`FirstName` AS `FirstName`,`People`.`LastName` AS `LastName`,`People`.`PhoneNumber` AS `PhoneNumber`,`People`.`Email` AS `Email`,`People`.`StreetAddress` AS `StreetAddress`,`People`.`Zipcode` AS `Zipcode`,`People`.`City` AS `City`,`Donors`.`Subscribed` AS `Subscribed` from (`People` join `Donors`) where (`People`.`PersonID` = `Donors`.`DonorID`) ;

-- --------------------------------------------------------

--
-- Structure for view `VolunteerInfo`
--
DROP TABLE IF EXISTS `VolunteerInfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`margem31`@`localhost` SQL SECURITY DEFINER VIEW `VolunteerInfo`  AS  select `People`.`PersonID` AS `PersonID`,`People`.`FirstName` AS `FirstName`,`People`.`LastName` AS `LastName`,`People`.`PhoneNumber` AS `PhoneNumber`,`People`.`Email` AS `Email`,`People`.`StreetAddress` AS `StreetAddress`,`People`.`City` AS `City`,`People`.`Zipcode` AS `Zipcode`,`Volunteers`.`DateJoined` AS `DateJoined` from (`People` join `Volunteers`) where (`People`.`PersonID` = `Volunteers`.`VolunteerID`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Donors`
--
ALTER TABLE `Donors`
  ADD PRIMARY KEY (`DonorID`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventTitle`,`EventDate`);

--
-- Indexes for table `Grants`
--
ALTER TABLE `Grants`
  ADD PRIMARY KEY (`Organization`,`Deadline`),
  ADD KEY `AssignedVolunteer` (`AssignedVolunteer`);

--
-- Indexes for table `ItemDonations`
--
ALTER TABLE `ItemDonations`
  ADD PRIMARY KEY (`DonorID`,`DonationDate`);

--
-- Indexes for table `OneTimeDonation`
--
ALTER TABLE `OneTimeDonation`
  ADD PRIMARY KEY (`DonorID`,`DonationDate`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`PersonID`);

--
-- Indexes for table `RecurringMonthlyDonations`
--
ALTER TABLE `RecurringMonthlyDonations`
  ADD PRIMARY KEY (`DonorID`,`StartDate`);

--
-- Indexes for table `VolunteerRoles`
--
ALTER TABLE `VolunteerRoles`
  ADD PRIMARY KEY (`Program`,`Role`,`Year`),
  ADD KEY `VolunteerID` (`VolunteerID`);

--
-- Indexes for table `Volunteers`
--
ALTER TABLE `Volunteers`
  ADD PRIMARY KEY (`VolunteerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `People`
--
ALTER TABLE `People`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Donors`
--
ALTER TABLE `Donors`
  ADD CONSTRAINT `Donors_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `People` (`PersonID`);

--
-- Constraints for table `Grants`
--
ALTER TABLE `Grants`
  ADD CONSTRAINT `Grants_ibfk_1` FOREIGN KEY (`AssignedVolunteer`) REFERENCES `Volunteers` (`VolunteerID`);

--
-- Constraints for table `ItemDonations`
--
ALTER TABLE `ItemDonations`
  ADD CONSTRAINT `ItemDonations_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `Donors` (`DonorID`);

--
-- Constraints for table `OneTimeDonation`
--
ALTER TABLE `OneTimeDonation`
  ADD CONSTRAINT `OneTimeDonation_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `Donors` (`DonorID`);

--
-- Constraints for table `RecurringMonthlyDonations`
--
ALTER TABLE `RecurringMonthlyDonations`
  ADD CONSTRAINT `RecurringMonthlyDonations_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `Donors` (`DonorID`);

--
-- Constraints for table `VolunteerRoles`
--
ALTER TABLE `VolunteerRoles`
  ADD CONSTRAINT `VolunteerRoles_ibfk_1` FOREIGN KEY (`VolunteerID`) REFERENCES `Volunteers` (`VolunteerID`);

--
-- Constraints for table `Volunteers`
--
ALTER TABLE `Volunteers`
  ADD CONSTRAINT `Volunteers_ibfk_1` FOREIGN KEY (`VolunteerID`) REFERENCES `People` (`PersonID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
