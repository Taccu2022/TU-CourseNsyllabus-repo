-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 12:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courserepo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(250) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `OTP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `password`, `OTP`) VALUES
('admin1234@test.com', '$2y$10$Oc15uLSrgMZh5kKe4sk0xerd4GLILXvfjo7CX1VdJq4KEqIbTmBSi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_ID` varchar(10) NOT NULL,
  `Book1` varchar(200) DEFAULT NULL,
  `Book2` varchar(200) DEFAULT NULL,
  `Book3` varchar(200) DEFAULT NULL,
  `Book4` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_ID`, `Book1`, `Book2`, `Book3`, `Book4`) VALUES
('B001', 'Herbert Schild : The Complete Reference to C++, Osborne McGrawHill.', 'Bjarne Stroustrup: The C++ Programming Language, Addison Wesley', 'Rambaugh et al. : Object Oriented Modeling and Design, PHI(EEE).', 'Grady Booch: Object Oriented Analysis and Design, Pearson Education.'),
('B002', 'Computer Architecture and Organization, Hayes J. P., McGrawHill.', 'Computer Organization, Hamacher, Zaky, Vranesic, McGrawHill.', 'Computer System Architecture, Mano M. M.', ''),
('B003', 'Fundamentals of Database Systems, Sixth(2011)/Seventh(2017)Edition, ELMASRI and\r\nNAVATHE, Pearson', 'Database Systems Concepts, Sixth (2010)/Seventh(2019) Edition, A. SILBERSCHATZ,\r\nH. F. KORTH, S SUDARSHAN, McGraw Hill', 'Database Management Systems, 3rd Edition, - RaghuRamakrishnan, Johannes Gehrke,McGraw Hill, 2014.', 'An Introduction to Database Systems, 8th Edition, C.J Date, Pearson, 2003'),
('B004', 'Kenneth H. Rosen : Discrete Mathematics and Its Applications,\r\nMcgraw-Hill College; 6th edition (January 5, 2006)', ' Liu, C. L. : Introduction to Discrete Mathematics. McGraw Hill Education (India) Private Limited (2008)', 'Trembley, Manohar : Discrete Mathematical Structures. McGraw Hill Education (India)\r\nPrivate Limited (2 February 2001)', 'L. Lovász, J. Pelikán , K. Vesztergombi : Discrete Mathematics: Elementary and Beyond\r\n(Undergraduate Texts in Mathematics), Springer; 2003 edition (17 February 2003)');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` varchar(10) NOT NULL,
  `Course_name` varchar(30) DEFAULT NULL,
  `Syllabus` varchar(10) DEFAULT NULL,
  `Book` varchar(10) DEFAULT NULL,
  `Credit` int(10) DEFAULT NULL,
  `Lecture` int(10) DEFAULT NULL,
  `Tutorial` int(10) DEFAULT NULL,
  `Practical` int(10) DEFAULT NULL,
  `Department` varchar(10) DEFAULT NULL,
  `Course_type` varchar(50) DEFAULT NULL,
  `course_start` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_name`, `Syllabus`, `Book`, `Credit`, `Lecture`, `Tutorial`, `Practical`, `Department`, `Course_type`, `course_start`) VALUES
('CO208', ' Object Oriented Programming', 'S003', 'B001', 4, 3, 0, 1, 'CSE', 'Core', '2000-01-03'),
('CO214', 'Computer Architecture & Organi', 'S002', 'B002', 3, 3, 0, 0, 'CSE', 'Core', '2000-01-03'),
('CS405', 'Discrete Mathematics ', 'S004', 'B004', 3, 2, 1, 0, 'CSE', 'Elective', '2000-01-03'),
('CS413', 'Database Management System', 'S001', 'B003', 4, 3, 0, 1, 'CSE', 'Core', '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `course_outcome`
--

CREATE TABLE `course_outcome` (
  `COID` varchar(10) NOT NULL,
  `Outcome` varchar(500) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Course` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` varchar(10) NOT NULL,
  `Department_Name` varchar(50) DEFAULT NULL,
  `School` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`, `School`) VALUES
('CSE', 'Computer Science and Engineering', 'SOE'),
('CVL', 'Civil Engineering', 'SOE'),
('ECE', 'Electrical Engineering', 'SOE'),
('ENE', 'Energy', 'SOE'),
('FET', 'Food Engineering & Technology', 'SOE'),
('MEC', 'Mechanical Engineering', 'SOE');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Program_ID` varchar(10) NOT NULL,
  `Program_Name` varchar(50) DEFAULT NULL,
  `Department` varchar(10) DEFAULT NULL,
  `Min_duration` varchar(10) DEFAULT NULL,
  `Max_duration` varchar(10) DEFAULT NULL,
  `Intro_year` date DEFAULT NULL,
  `Credit_req` int(10) DEFAULT NULL,
  `Max_intake` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Program_ID`, `Program_Name`, `Department`, `Min_duration`, `Max_duration`, `Intro_year`, `Credit_req`, `Max_intake`) VALUES
('CSB', 'B.Tech. in Computer Science & Engineering', 'CSE', '4 Year', '6 Year', '2014-06-05', 160, 60),
('CSE', 'M.Tech. in Computer Science', 'CSE', '2 Year', '4 Year', '2019-06-05', 68, 18),
('CSI', 'M.Tech. in Information Technology', 'CSE', '2 Year', '4 Year', '1997-06-05', 68, 28),
('CSM', 'Master of Computer Application', 'CSE', '2 Year', '4 Year', '1996-01-01', 75, 80),
('CSP', 'Ph.D.(Computer Science & Engineering)', 'CSE', '2 Year', '8 Year', '1996-06-05', 100, 25);

-- --------------------------------------------------------

--
-- Table structure for table `program_outcome`
--

CREATE TABLE `program_outcome` (
  `POID` varchar(10) NOT NULL,
  `Outcome` varchar(500) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Program` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_outcome`
--

INSERT INTO `program_outcome` (`POID`, `Outcome`, `Description`, `Program`) VALUES
('PO001', 'Problem Solving Skills,Technical Competence,System Design and Development,System Design and Development,Effective Communication,Teamwork and Collaboration,Continuous Learning', 'Admission to MCA programs typically requires a bachelors degree in computer science, information technology, or a related field', 'CSM');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `School_ID` varchar(20) NOT NULL,
  `School_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `Syllabus_ID` varchar(10) NOT NULL,
  `Unit` varchar(20) DEFAULT NULL,
  `Syllabus_Objective` varchar(200) DEFAULT NULL,
  `Version` varchar(10) DEFAULT NULL,
  `Approved_by` varchar(50) DEFAULT NULL,
  `Approved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`Syllabus_ID`, `Unit`, `Syllabus_Objective`, `Version`, `Approved_by`, `Approved_date`) VALUES
('S001', 'U001', 'NA', '2nd', 'NA', '2010-03-04'),
('S002', 'U002', 'NA', 'NA', 'NA', '2014-12-09'),
('S003', 'U003', 'NA', '1st', 'NA', '2016-08-21'),
('S004', 'U004', 'NA', '3rd', 'NA', '2018-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `Unit_ID` varchar(10) NOT NULL,
  `unit_1` varchar(500) DEFAULT NULL,
  `unit_2` varchar(500) DEFAULT NULL,
  `unit_3` varchar(500) DEFAULT NULL,
  `unit_4` varchar(500) DEFAULT NULL,
  `unit_5` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`Unit_ID`, `unit_1`, `unit_2`, `unit_3`, `unit_4`, `unit_5`) VALUES
('U001', 'Introduction & Overview: Concept of database, Characteristics of database, Advantages, data\r\nindependence, redundancy Control; Database architecture - ANSI model.Modelling of real-world situation (data models): ER model, EER model ', 'Relational data model: relational model concepts, relational algebra and calculus, SQL, ER/EER\r\nto relational model mapping,', 'Functional dependencies and normalization: functional dependencies, normal forms,\r\ndecomposition, multi-valued functional dependency, and higher normal forms ', 'Database Indexing and hashing: B-Tree, B+ Tree, static and dynamic hashing', 'Database Transaction concepts, query evaluation overview, security, and recovery\r\nDistributed Database '),
('U002', 'Basic organization of the computer and block level description of the functional units from\r\nprogram execution point of view; Fetch, decode and execute cycle.', 'Assembly language programming: Instruction set, instruction cycles, registers and storage,\r\naddressing modes; discussions about RISC versus CISC architectures', 'Inside a CPU: information representation, computer arithmetic and their implementation; control\r\nand data path, data path components, design of ALU and data path, control unit design', 'Memory and I/O access: Memory maps, Read Write operations, Programmed I/O, Concept of\r\nhandshaking, Polled and Interrupt driven I/O, DMA data transfer; I/O subsystems: Input-Output\r\ndevices such as Disk, CD- ROM, Printer etc.; Interfacing with IO devices, keyboard and display\r\ninterfaces', 'Inside the Memory: memory organization, static and dynamic memory; Cache memory and\r\nMemory Hierarchy – Cache memory access techniques; Virtual memory;\r\nIntroduction to Parallel Architectures: Instruction Level Parallel Processors- Pipelined, VLIW,\r\nSuperscalar; Multiprocessors & Multicomputer Architectures, Vector Processing.'),
('U003', 'Data Abstraction: Class, object, constructors, destructors, memory allocations for objects,\r\nmember functions, friend functions, templates. \r\n', 'Inheritance: Single & multiple inheritance, virtual base class.', 'Polymorphism: Compile time polymorphism- operator overloading, function overloading, static\r\nbinding.', NULL, NULL),
('U004', 'Set, relations, equivalence relations; mappings-one-one and on to, Definition of an algebraic structure,Introduction to groups, subgroups, normal subgroups, isomorphism, homeomorphism;\r\nautomorphism of groups; semigroups, monoids, rings, vector space.', ' Logic operators, Truth table, Normal forms\r\nTheory of inference and deduction,Mathematical induction,Predicate calculus; predicates and quantifiers, Boolean algebra,Lattice. \r\n', 'Basic counting techniques,Recurrence relations and their solutions, Generating functions. ', ' Congruence modulo, Fermat s Theorem, Euler s Theorem, Multiplicative Inverse,\r\nReminder Theorem, FFT, Discrete Logarithm', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `Department` (`Department`),
  ADD KEY `Book` (`Book`),
  ADD KEY `Syllabus` (`Syllabus`);

--
-- Indexes for table `course_outcome`
--
ALTER TABLE `course_outcome`
  ADD PRIMARY KEY (`COID`),
  ADD KEY `Course` (`Course`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Program_ID`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `program_outcome`
--
ALTER TABLE `program_outcome`
  ADD PRIMARY KEY (`POID`),
  ADD KEY `Program` (`Program`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`School_ID`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`Syllabus_ID`),
  ADD KEY `Unit` (`Unit`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`Unit_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`Department`) REFERENCES `department` (`Department_ID`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`Book`) REFERENCES `book` (`Book_ID`),
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`Syllabus`) REFERENCES `syllabus` (`Syllabus_ID`);

--
-- Constraints for table `course_outcome`
--
ALTER TABLE `course_outcome`
  ADD CONSTRAINT `course_outcome_ibfk_1` FOREIGN KEY (`Course`) REFERENCES `course` (`Course_ID`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `program_outcome`
--
ALTER TABLE `program_outcome`
  ADD CONSTRAINT `program_outcome_ibfk_1` FOREIGN KEY (`Program`) REFERENCES `program` (`Program_ID`);

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `syllabus_ibfk_2` FOREIGN KEY (`Unit`) REFERENCES `unit` (`Unit_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
