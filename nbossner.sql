-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2020 at 05:29 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbossner`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `ACC_ID` int(11) NOT NULL,
  `ACC_FNAME` varchar(45) DEFAULT NULL,
  `ACC_LNAME` varchar(45) DEFAULT NULL,
  `ACC_DOB` varchar(45) DEFAULT NULL,
  `ACC_PNUMBER` varchar(45) DEFAULT NULL,
  `ACCT_EMAIL` varchar(45) DEFAULT NULL,
  `ACC_SSN` varchar(45) DEFAULT NULL,
  `DEPARTMENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`ACC_ID`, `ACC_FNAME`, `ACC_LNAME`, `ACC_DOB`, `ACC_PNUMBER`, `ACCT_EMAIL`, `ACC_SSN`, `DEPARTMENT_ID`) VALUES
(1, 'gfhdfghgdh', 'sdfasffd', '1111-11-11', '534252345', 'lksdjf@work.com', '436753045', 5),
(2, 'Sonia', 'McGrath', '2-22-1996', '523464563465', 'Sonia@work.com', '3456304587634', 5),
(3, 'Justin', 'Sutherland', '5-24-1987', '234514533513', 'justin@work.com', '40985623904587', 6),
(4, 'Jasosn', 'Glover', '3333-03-31', '4353245235', 'jason@work.com', '1434546', 5),
(5, 'Noah', 'Bossner', '2222-02-22', '5869292938', 'noahbozz@gmail.com', '3452345245', 5),
(6, 'Joe', 'Biden', '2222-02-22', '342563456', 'Joe@oldman.com', '54332452354', 6);

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `AUDIT_ID` int(11) NOT NULL,
  `AUDIT_NAME` varchar(45) DEFAULT NULL,
  `AUDIT_DATE` date DEFAULT NULL,
  `ACC_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `COMPANY_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(45) DEFAULT NULL,
  `COMPANY_LOCATION` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_LOCATION`) VALUES
(3, 'XYZ Inc.', 'Iowa'),
(4, 'ABC Inc.', 'Gerrmany');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DEPARTMENT_ID` int(11) NOT NULL,
  `DEPARTMENT_NAME` varchar(45) DEFAULT NULL,
  `DEPARTMENT_MANAGER` varchar(45) DEFAULT NULL,
  `COMPANY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPARTMENT_ID`, `DEPARTMENT_NAME`, `DEPARTMENT_MANAGER`, `COMPANY_ID`) VALUES
(5, 'IT Department', 'Jacob Baum', 3),
(6, 'Human Resources', 'Richard F.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `EMP_FNAME` varchar(45) DEFAULT NULL,
  `EMP_LNAME` varchar(45) DEFAULT NULL,
  `EMP_DOB` varchar(45) DEFAULT NULL,
  `EMP_PNUMBER` varchar(45) DEFAULT NULL,
  `EMP_EMAIL` varchar(45) DEFAULT NULL,
  `EMP_SSN` varchar(45) DEFAULT NULL,
  `DEPARTMENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `EMP_FNAME`, `EMP_LNAME`, `EMP_DOB`, `EMP_PNUMBER`, `EMP_EMAIL`, `EMP_SSN`, `DEPARTMENT_ID`) VALUES
(1, 'dfgh', 'dfgh', '1111-11-11', '5869292938', 'noahbozz@gmail.com', '3452345234', 5),
(2, 'Dan', 'Skinner', '9-9-1999', '45245234533', 'dan@work.com', '4523452534', 5),
(3, 'Heather ', 'Mills', '2-2-2222', '34523635467', 'heather@work.com', '430895304975', 6),
(4, 'Brian', 'Morrison', '2-22-2222', '345262546245', 'brian@work.com', '099079986323', 6),
(5, 'Noah', 'Bossner', '1111-11-11', '5869292938', 'noahbozz@gmail.com', '43565735645', 6);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_accountant`
--

CREATE TABLE `payroll_accountant` (
  `ACC_PAYROLL_ID` int(11) NOT NULL,
  `ACC_BANK_NAME` varchar(45) DEFAULT NULL,
  `ACC_PAY_METHOD` varchar(45) DEFAULT NULL,
  `ACC_BANK_NUMBER` varchar(45) DEFAULT NULL,
  `ACC_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll_accountant`
--

INSERT INTO `payroll_accountant` (`ACC_PAYROLL_ID`, `ACC_BANK_NAME`, `ACC_PAY_METHOD`, `ACC_BANK_NUMBER`, `ACC_ID`) VALUES
(1, 'chase', 'DD', '3452345', 4),
(2, 'chase', 'DD', '078097', 6);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_employee`
--

CREATE TABLE `payroll_employee` (
  `EMP_PAYROLL_ID` int(11) NOT NULL,
  `EMP_BANK_NAME` varchar(45) DEFAULT NULL,
  `EMP_PAY_METHOD` varchar(45) DEFAULT NULL,
  `EMP_BNK_NUMBER` varchar(45) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`ACC_ID`,`DEPARTMENT_ID`),
  ADD KEY `fk_ACCOUNTANT_DEPARTMENT1_idx` (`DEPARTMENT_ID`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`AUDIT_ID`,`ACC_ID`),
  ADD KEY `fk_AUDIT_ACCOUNTANT1_idx` (`ACC_ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPARTMENT_ID`,`COMPANY_ID`),
  ADD KEY `fk_DEPARTMENT_COMPANY1_idx` (`COMPANY_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`,`DEPARTMENT_ID`),
  ADD KEY `fk_EMPLOYEE_DEPARTMENT1_idx` (`DEPARTMENT_ID`);

--
-- Indexes for table `payroll_accountant`
--
ALTER TABLE `payroll_accountant`
  ADD PRIMARY KEY (`ACC_PAYROLL_ID`,`ACC_ID`),
  ADD KEY `fk_PAYROLL_ACCOUNTANT1_idx` (`ACC_ID`);

--
-- Indexes for table `payroll_employee`
--
ALTER TABLE `payroll_employee`
  ADD PRIMARY KEY (`EMP_PAYROLL_ID`,`EMPLOYEE_ID`),
  ADD KEY `fk_payroll_employee_employee_idx` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `ACC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `AUDIT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DEPARTMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payroll_accountant`
--
ALTER TABLE `payroll_accountant`
  MODIFY `ACC_PAYROLL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_employee`
--
ALTER TABLE `payroll_employee`
  MODIFY `EMP_PAYROLL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountant`
--
ALTER TABLE `accountant`
  ADD CONSTRAINT `fk_ACCOUNTANT_DEPARTMENT1` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `department` (`DEPARTMENT_ID`);

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `fk_AUDIT_ACCOUNTANT1` FOREIGN KEY (`ACC_ID`) REFERENCES `accountant` (`ACC_ID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_DEPARTMENT_COMPANY1` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_EMPLOYEE_DEPARTMENT1` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `department` (`DEPARTMENT_ID`);

--
-- Constraints for table `payroll_accountant`
--
ALTER TABLE `payroll_accountant`
  ADD CONSTRAINT `fk_PAYROLL_ACCOUNTANT1` FOREIGN KEY (`ACC_ID`) REFERENCES `accountant` (`ACC_ID`) ON DELETE CASCADE;

--
-- Constraints for table `payroll_employee`
--
ALTER TABLE `payroll_employee`
  ADD CONSTRAINT `fk_payroll_employee_employee` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
