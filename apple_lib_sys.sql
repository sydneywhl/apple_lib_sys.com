

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 06:50 PM
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
-- Database: `apple_lib_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` varchar(10) NOT NULL,
  `author_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
('A001', 'J.K.Rowling'),
('A002', 'George R.R Martin'),
('A003', 'Haruki Murakami'),
('A004', 'Jane Austen'),
('A005', 'Stephen King'),
('A006', 'Agatha Christie'),
('A007', 'Dan Brown'),
('A008', 'Suzanne Collins'),
('A009', 'Nicholas Sparks');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` varchar(20) NOT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `author_id` varchar(10) DEFAULT NULL,
  `genre_id` varchar(10) DEFAULT NULL,
  `available_copies` int(10) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `librarian_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `book_title`, `author_id`, `genre_id`, `available_copies`, `images`, `librarian_id`) VALUES
('9780007119318', 'Murder on the Orient Express', 'A006', 'G002', 5, '9780007119318.webp', 'S005'),
('9780099448761', 'Dance Dance Dance', 'A003', 'G004', 4, '9780099448761.jpg', 'S002'),
('9780141439518', 'Pride and Prejudice', 'A004', 'G003', 6, '9780141439518.jpg', 'S004'),
('9780307474278', 'The Da Vinci Code', 'A007', 'G009', 4, '9780307474278.jpg', 'S010'),
('9780439023528', 'The Hunger Games', 'A008', 'G005', 7, '9780439023528.webp', 'S007'),
('9780439554930', 'Harry Potter and the Sorcerer', 'A001', 'G005', 5, '9780439554930.jpg', 'S001'),
('9780553103540', 'A Game of Thrones', 'A002', 'G005', 3, '9780553103540.jpg', 'S003'),
('9781455502547', 'The Best of Me', 'A009', 'G003', 3, '9781455502547.webp', 'S006'),
('9781501142970', 'IT: The Novel', 'A005', 'G006', 2, '9781501142970.jpg', 'S009');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_by`
--

CREATE TABLE `borrowed_by` (
  `isbn` varchar(20) DEFAULT NULL,
  `member_id` varchar(10) DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_by`
--

INSERT INTO `borrowed_by` (`isbn`, `member_id`, `borrow_date`, `return_date`) VALUES
('9780439554930', 'M003', '2025-10-01', '2025-10-08'),
('9780553103540', 'M005', '2025-10-03', '2025-10-08'),
('9780099448761', 'M001', '2025-10-05', '2025-10-19'),
('9780141439518', 'M007', '2025-10-08', '2025-10-10'),
('9780007119318', 'M004', '2025-12-10', '2025-10-26'),
('9780307474278', 'M002', '2025-10-14', '2025-10-28'),
('9780439023528', 'M010', '2025-10-16', '2025-10-23'),
('9781455502547', 'M006', '2025-10-18', '2025-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` varchar(10) NOT NULL,
  `genre_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
('G001', 'Fiction'),
('G002', 'Mystery'),
('G003', 'Romance'),
('G004', 'Science Fiction'),
('G005', 'Fantasy'),
('G006', 'Horror'),
('G007', 'Biography'),
('G008', 'History'),
('G009', 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `librarian_id` varchar(10) NOT NULL,
  `librarian_type` varchar(10) DEFAULT NULL,
  `librarian_name` varchar(50) DEFAULT NULL,
  `librarian_phone_number` varchar(12) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`librarian_id`, `librarian_type`, `librarian_name`, `librarian_phone_number`, `password`) VALUES
('S001', 'ADMIN', 'Sydney', '0162316051', '97069706'),
('S002', 'STAFF', 'Afiq', '0123214576', '1345'),
('S003', 'STAFF', 'Felix', '0124467745', '9876'),
('S004', 'STAFF', 'Adam', '0137884576', '4567'),
('S005', 'STAFF', 'Wong', '0121282331', '2345'),
('S006', 'STAFF', 'Syahmi', '0126673424', '1456'),
('S007', 'STAFF', 'Shawn', '0178806676', '1678'),
('S008', 'STAFF', 'Christine', '0134307688', '1789'),
('S009', 'STAFF', 'Jason', '0122454423', '3789'),
('S010', 'STAFF', 'Eric', '0126779080', '3567');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` varchar(10) NOT NULL,
  `member_name` varchar(50) DEFAULT NULL,
  `member_phone_number` varchar(11) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_phone_number`, `password`) VALUES
('M001', 'Ellie', '0171231231', '7890'),
('M002', 'Hakim', '60173467382', '1460'),
('M003', 'William', '60123426748', '2341'),
('M004', 'Aisya', '60115394572', '2537'),
('M005', 'Nurul', '60137461131', '3146'),
('M006', 'Bill', '60158259268', '2486'),
('M007', 'Amirul', '60183180206', '5825'),
('M008', 'Sofia', '60189270379', '9956'),
('M009', 'Amber', '60126386292', '5290'),
('M010', 'Matthew', '60196870365', '4450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `librarian_id` (`librarian_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  ADD KEY `isbn` (`isbn`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`librarian_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`librarian_id`) REFERENCES `librarian` (`librarian_id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`);

--
-- Constraints for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  ADD CONSTRAINT `borrowed_by_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`),
  ADD CONSTRAINT `borrowed_by_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
