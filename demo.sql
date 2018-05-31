-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 01:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `AgencyID` int(11) NOT NULL,
  `AgencyName` varchar(200) DEFAULT NULL,
  `StreetAddress` varchar(500) DEFAULT NULL,
  `VillageAddress` varchar(50) DEFAULT NULL,
  `SubDistrictAddress` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `CityAddress` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `FaxNumber` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `ActiveDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `UserType` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agencysalescenter`
--

CREATE TABLE `agencysalescenter` (
  `SalesCenterID` int(11) NOT NULL,
  `AgencyID` int(11) NOT NULL,
  `AreaID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `AsuradurID` int(11) DEFAULT NULL,
  `SourceData` varchar(50) DEFAULT NULL,
  `SalesCenterCode` varchar(50) DEFAULT NULL,
  `SalesCenterName` varchar(100) DEFAULT NULL,
  `StreetAddress` varchar(200) DEFAULT NULL,
  `VillageAddress` varchar(100) DEFAULT NULL,
  `SubDistrictAddress` varchar(100) DEFAULT NULL,
  `CityAddress` varchar(100) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `FaxNumber` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(100) DEFAULT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `ActiveDate` datetime DEFAULT NULL,
  `Enddate` datetime DEFAULT NULL,
  `ReasonEnd` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appuser`
--

CREATE TABLE `appuser` (
  `UserID` int(11) NOT NULL,
  `UserGroupID` int(11) DEFAULT NULL,
  `ParentUserID` int(11) DEFAULT NULL,
  `UserLoginID` int(11) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `NPP` int(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `SRLanguage` varchar(55) DEFAULT NULL,
  `EmailAddress` varchar(55) DEFAULT NULL,
  `PhoneNumber` varchar(55) DEFAULT NULL,
  `ActiveDate` datetime DEFAULT NULL,
  `ExpireDate` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `AreaGroupID` int(11) DEFAULT NULL,
  `AreaID` int(11) DEFAULT NULL,
  `AgencyID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `PhotoFilePath` varchar(255) DEFAULT NULL,
  `PhotoFileName` varchar(255) DEFAULT NULL,
  `IconPhotoFilePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `ParentEmployeeID` int(11) DEFAULT NULL,
  `EmployeeName` varchar(300) DEFAULT NULL,
  `EmployeeOldCode` varchar(10) DEFAULT NULL,
  `EmployeeNewCode` varchar(10) DEFAULT NULL,
  `UserGroupID` int(11) DEFAULT NULL,
  `EmployeeStatus` varchar(30) DEFAULT NULL,
  `EmployeeGrade` varchar(30) DEFAULT NULL,
  `EmployeeBirthPlace` varchar(200) DEFAULT NULL,
  `EmployeeBirthDate` datetime DEFAULT NULL,
  `MothersMaidenName` varchar(300) DEFAULT NULL,
  `IdentityType` varchar(30) DEFAULT NULL,
  `IdentityNumber` varchar(30) DEFAULT NULL,
  `IdentityFilePath` varchar(255) DEFAULT NULL,
  `IdentityFileName` varchar(250) DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Religion` varchar(30) DEFAULT NULL,
  `NPWP` varchar(20) DEFAULT NULL,
  `FixedPhoneNumber` varchar(30) DEFAULT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `PhoneNumber2` varchar(50) DEFAULT NULL,
  `EmergencyName` varchar(300) DEFAULT NULL,
  `EmergencyStatus` varchar(30) DEFAULT NULL,
  `EmergencyNumber` varchar(30) DEFAULT NULL,
  `EmergencyAddress` varchar(255) DEFAULT NULL,
  `Province` varchar(30) DEFAULT NULL,
  `StreetAddress` varchar(700) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `EmailAddress` varchar(200) DEFAULT NULL,
  `MaritalStatus` varchar(30) DEFAULT NULL,
  `Height` float DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `PhotoFilePath` varchar(255) DEFAULT NULL,
  `PhotoFileName` varchar(250) DEFAULT NULL,
  `AgencyID` int(11) DEFAULT NULL,
  `SalesCenterID` int(11) DEFAULT NULL,
  `InterviewApprovalID` int(11) DEFAULT NULL,
  `InterviewLevel` int(11) DEFAULT NULL,
  `InterviewStatus` int(11) DEFAULT NULL,
  `HiringApprovalID` int(11) DEFAULT NULL,
  `HiringLevel` int(11) DEFAULT NULL,
  `HiringStatus` int(11) DEFAULT NULL,
  `ApprovalID` int(11) DEFAULT NULL,
  `ApprovalLevel` int(11) DEFAULT NULL,
  `ApprovalStatus` int(11) DEFAULT NULL,
  `IsDiscontinued` int(11) DEFAULT NULL,
  `IsDedicated` int(11) DEFAULT NULL,
  `DedicatedRemark` varchar(500) DEFAULT NULL,
  `ActiveDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `EndReason` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeedocument`
--

CREATE TABLE `employeedocument` (
  `EmployeeID` int(11) NOT NULL,
  `EmployeeDocumentID` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `FileLocation` varchar(255) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `ContentType` varchar(55) DEFAULT NULL,
  `ContentLength` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'teknik informatika'),
(2, 'teknik mesin'),
(3, 'teknik otomotif'),
(4, 'teknik kimia');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kredit`
--

CREATE TABLE `kartu_kredit` (
  `RowID` int(11) DEFAULT NULL,
  `BatchID` int(11) DEFAULT NULL,
  `Tanggal_Survey` date DEFAULT NULL,
  `Surveyor` varchar(255) DEFAULT NULL,
  `No_Aplikasi` varchar(255) DEFAULT NULL,
  `Product` varchar(255) DEFAULT NULL,
  `Source_Code` varchar(255) DEFAULT NULL,
  `Channel_Aplikasi` varchar(255) DEFAULT NULL,
  `Coverage_Area` varchar(255) DEFAULT NULL,
  `Sales_Code` varchar(255) DEFAULT NULL,
  `Nama_Aplikan` varchar(255) DEFAULT NULL,
  `No_Identitas` int(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Jenis_Kelamin` varchar(25) DEFAULT NULL,
  `No_HP` varchar(25) DEFAULT NULL,
  `Jenis_Perusahaan` varchar(255) DEFAULT NULL,
  `Nama_Perusahaan` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `Penghasilan` varchar(255) DEFAULT NULL,
  `Lama_Bekerja` int(11) DEFAULT NULL,
  `Status_Karyawan` varchar(255) DEFAULT NULL,
  `Alamat_Kantor` varchar(255) DEFAULT NULL,
  `Kecamatan` varchar(255) DEFAULT NULL,
  `Kota` varchar(255) DEFAULT NULL,
  `No_Telp_Kantor` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
(15, 'menu management', 'menu', 'fa fa-list-alt', 1, 0),
(16, 'data siswa', 'siswa', 'fa fa-graduation-cap', 1, 0),
(17, 'data jurusan', 'jurusan', 'fa fa-list-alt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentdt`
--

CREATE TABLE `paymentdt` (
  `EmployeeID` int(11) NOT NULL,
  `Month` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `CardLogo` varchar(55) DEFAULT NULL,
  `CardType` varchar(55) DEFAULT NULL,
  `MonthGenerate` int(11) DEFAULT NULL,
  `YearGenerate` int(11) DEFAULT NULL,
  `CardCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymenthd`
--

CREATE TABLE `paymenthd` (
  `SalesCenterID` int(11) NOT NULL,
  `Month` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `ApprovalID` int(11) DEFAULT NULL,
  `ApprovalLevel` int(11) DEFAULT NULL,
  `ApprovalStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentperformancedt`
--

CREATE TABLE `paymentperformancedt` (
  `EmployeeID` int(11) NOT NULL,
  `Month` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `MonthGenerate` int(11) DEFAULT NULL,
  `YearGenerate` int(11) DEFAULT NULL,
  `ComponentID` int(11) DEFAULT NULL,
  `Parameter1` int(11) DEFAULT NULL,
  `Nominal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentperformancehd`
--

CREATE TABLE `paymentperformancehd` (
  `SalesCenterID` int(11) NOT NULL,
  `Month` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `ApprovalID` int(11) DEFAULT NULL,
  `ApprovalLevel` int(11) DEFAULT NULL,
  `Approvalstatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `performancedetail`
--

CREATE TABLE `performancedetail` (
  `RowID` int(11) NOT NULL,
  `BatchID` int(11) DEFAULT NULL,
  `ApplicationSource` varchar(55) DEFAULT NULL,
  `AsOfDate` datetime DEFAULT NULL,
  `CustomerName` varchar(55) DEFAULT NULL,
  `CustomerBirthDate` datetime DEFAULT NULL,
  `Parameter1` varchar(55) DEFAULT NULL,
  `Parameter2` varchar(55) DEFAULT NULL,
  `Parameter3` varchar(55) DEFAULT NULL,
  `Parameter4` varchar(55) DEFAULT NULL,
  `Parameter5` varchar(55) DEFAULT NULL,
  `Parameter6` varchar(55) DEFAULT NULL,
  `Parameter7` varchar(55) DEFAULT NULL,
  `Parameter8` varchar(55) DEFAULT NULL,
  `Parameter9` varchar(55) DEFAULT NULL,
  `Parameter10` varchar(55) DEFAULT NULL,
  `Parameter11` varchar(55) DEFAULT NULL,
  `Parameter12` varchar(55) DEFAULT NULL,
  `Parameter13` varchar(55) DEFAULT NULL,
  `Parameter14` varchar(55) DEFAULT NULL,
  `Parameter15` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performancedetail`
--

INSERT INTO `performancedetail` (`RowID`, `BatchID`, `ApplicationSource`, `AsOfDate`, `CustomerName`, `CustomerBirthDate`, `Parameter1`, `Parameter2`, `Parameter3`, `Parameter4`, `Parameter5`, `Parameter6`, `Parameter7`, `Parameter8`, `Parameter9`, `Parameter10`, `Parameter11`, `Parameter12`, `Parameter13`, `Parameter14`, `Parameter15`) VALUES
(1, 123, 'KJKLJLKJLKJJ', '0000-00-00 00:00:00', 'AAAAAAAAAAAAA', '0000-00-00 00:00:00', 'HJKHJK', 'AAA', 'JHJ', 'khJH', 'KJHKJH', 'h', 'KJHJK', 'JKHJKH', 'GJHG', 'gJHGJ', 'gJHGJH', 'KKKK', 'HHH', 'LLL', 'NNN');

-- --------------------------------------------------------

--
-- Table structure for table `performanceemployee`
--

CREATE TABLE `performanceemployee` (
  `RowID` int(11) NOT NULL,
  `BatchID` int(11) DEFAULT NULL,
  `ApplicationSource` varchar(55) DEFAULT NULL,
  `AsOfDate` datetime DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `performanceperemployee`
--

CREATE TABLE `performanceperemployee` (
  `EmployeeID` int(11) NOT NULL,
  `OpenDate` datetime DEFAULT NULL,
  `CardLogo` varchar(55) DEFAULT NULL,
  `CardType` varchar(55) DEFAULT NULL,
  `CardCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `performanceunmatch`
--

CREATE TABLE `performanceunmatch` (
  `RowID` int(11) NOT NULL,
  `ApplicationSource` varchar(55) DEFAULT NULL,
  `BatchID` int(11) DEFAULT NULL,
  `Month` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `OldSourceCode` varchar(55) DEFAULT NULL,
  `NewSourceCode` varchar(55) DEFAULT NULL,
  `Remark` varchar(55) DEFAULT NULL,
  `ProposedDate` datetime DEFAULT NULL,
  `ProposedBy` int(11) DEFAULT NULL,
  `ApprovalID` int(11) DEFAULT NULL,
  `IsGenerateCorrection` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`ID`, `LastName`, `FirstName`, `Age`) VALUES
(1, 'aaa', 'bbb', 12);

-- --------------------------------------------------------

--
-- Table structure for table `salaryparameter`
--

CREATE TABLE `salaryparameter` (
  `ParameterID` int(11) NOT NULL,
  `UserGroupID` int(11) DEFAULT NULL,
  `EmployeeGrade` varchar(55) DEFAULT NULL,
  `EmployeeStatus` varchar(55) DEFAULT NULL,
  `ComponentID` int(11) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `TargetTypeID` int(11) DEFAULT NULL,
  `Product1` varchar(55) DEFAULT NULL,
  `Product2` varchar(55) DEFAULT NULL,
  `Param1` decimal(13,2) DEFAULT NULL,
  `Param2` decimal(13,2) DEFAULT NULL,
  `Nominal` decimal(13,2) DEFAULT NULL,
  `IsMultiplier` int(11) DEFAULT NULL,
  `IsBasicSalary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaryparameter`
--

INSERT INTO `salaryparameter` (`ParameterID`, `UserGroupID`, `EmployeeGrade`, `EmployeeStatus`, `ComponentID`, `StartDate`, `EndDate`, `TargetTypeID`, `Product1`, `Product2`, `Param1`, `Param2`, `Nominal`, `IsMultiplier`, `IsBasicSalary`) VALUES
(1, 34234, '213213', '213213', 213213, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3213213, '213213', '213213', '213213.00', '21321.00', '3213213.00', 213213, 2313);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `id_jurusan`) VALUES
(2, 'desi hadayani', 1),
(3, 'nuris akbar', 2),
(4, 'muhammad hafidz muzakki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `systemcardlink`
--

CREATE TABLE `systemcardlink` (
  `BatchID` int(11) NOT NULL,
  `RowID` int(11) NOT NULL,
  `OpenDate` datetime DEFAULT NULL,
  `SourceCode` varchar(50) DEFAULT NULL,
  `CustomerNumber` varchar(50) DEFAULT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `CustomerBirthDate` datetime DEFAULT NULL,
  `ORG` int(11) DEFAULT NULL,
  `Logo` int(11) DEFAULT NULL,
  `EmpReffCode` varchar(50) DEFAULT NULL,
  `BlockCard` varchar(50) DEFAULT NULL,
  `ApplicationType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemcardvendor`
--

CREATE TABLE `systemcardvendor` (
  `BatchID` int(11) DEFAULT NULL,
  `RowID` int(11) NOT NULL,
  `Tanggal_Survey` datetime NOT NULL,
  `Surveyor` varchar(55) NOT NULL,
  `No_Aplikasi` varchar(55) NOT NULL,
  `Product` varchar(55) NOT NULL,
  `Source_Code` varchar(55) NOT NULL,
  `Channel_Aplikasi` varchar(55) NOT NULL,
  `Coverage_Area` varchar(55) NOT NULL,
  `Sales_Code` varchar(55) NOT NULL,
  `Nama_Aplikan` varchar(55) NOT NULL,
  `No_Identitas` varchar(55) NOT NULL,
  `DOB` datetime NOT NULL,
  `Jenis_Kelamin` varchar(55) NOT NULL,
  `No_HP` varchar(55) NOT NULL,
  `Jenis_Perusahaan` varchar(55) NOT NULL,
  `Nama_Perusahaan` varchar(25) NOT NULL,
  `Jabatan` varchar(25) NOT NULL,
  `Penghasilan` varchar(25) NOT NULL,
  `Lama_Bekerja` int(11) NOT NULL,
  `Status_Karyawan` varchar(25) NOT NULL,
  `Alamat_Kantor` varchar(225) NOT NULL,
  `Kecamatan` varchar(25) NOT NULL,
  `Kota` varchar(25) NOT NULL,
  `No_Telp_Kantor` varchar(25) NOT NULL,
  `ProcessMonth` int(11) NOT NULL,
  `ProcessYear` int(11) NOT NULL,
  `Status_Kartu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemccos`
--

CREATE TABLE `systemccos` (
  `BatchID` int(11) NOT NULL,
  `RowID` int(11) NOT NULL,
  `DecisionDate` datetime DEFAULT NULL,
  `SourceCode` varchar(25) DEFAULT NULL,
  `CustomerName` varchar(25) DEFAULT NULL,
  `CustomerBirthDate` datetime DEFAULT NULL,
  `ORG` varchar(25) DEFAULT NULL,
  `Logo` varchar(25) DEFAULT NULL,
  `EmpReffCode` varchar(25) DEFAULT NULL,
  `Status` varchar(25) DEFAULT NULL,
  `DeclineCode` varchar(25) DEFAULT NULL,
  `ApplicationType` varchar(25) DEFAULT NULL,
  `ProcessMonth` int(11) DEFAULT NULL,
  `ProcessYear` int(11) DEFAULT NULL,
  `No_Identitas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1524792434, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`AgencyID`);

--
-- Indexes for table `agencysalescenter`
--
ALTER TABLE `agencysalescenter`
  ADD PRIMARY KEY (`SalesCenterID`);

--
-- Indexes for table `appuser`
--
ALTER TABLE `appuser`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `employeedocument`
--
ALTER TABLE `employeedocument`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdt`
--
ALTER TABLE `paymentdt`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `paymenthd`
--
ALTER TABLE `paymenthd`
  ADD PRIMARY KEY (`SalesCenterID`);

--
-- Indexes for table `paymentperformancedt`
--
ALTER TABLE `paymentperformancedt`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `paymentperformancehd`
--
ALTER TABLE `paymentperformancehd`
  ADD PRIMARY KEY (`SalesCenterID`);

--
-- Indexes for table `performancedetail`
--
ALTER TABLE `performancedetail`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `performanceemployee`
--
ALTER TABLE `performanceemployee`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `performanceperemployee`
--
ALTER TABLE `performanceperemployee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `performanceunmatch`
--
ALTER TABLE `performanceunmatch`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `salaryparameter`
--
ALTER TABLE `salaryparameter`
  ADD PRIMARY KEY (`ParameterID`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemcardlink`
--
ALTER TABLE `systemcardlink`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `systemcardvendor`
--
ALTER TABLE `systemcardvendor`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `systemccos`
--
ALTER TABLE `systemccos`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `AgencyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agencysalescenter`
--
ALTER TABLE `agencysalescenter`
  MODIFY `SalesCenterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeedocument`
--
ALTER TABLE `employeedocument`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paymentdt`
--
ALTER TABLE `paymentdt`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenthd`
--
ALTER TABLE `paymenthd`
  MODIFY `SalesCenterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentperformancedt`
--
ALTER TABLE `paymentperformancedt`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentperformancehd`
--
ALTER TABLE `paymentperformancehd`
  MODIFY `SalesCenterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performancedetail`
--
ALTER TABLE `performancedetail`
  MODIFY `RowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performanceemployee`
--
ALTER TABLE `performanceemployee`
  MODIFY `RowID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performanceperemployee`
--
ALTER TABLE `performanceperemployee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performanceunmatch`
--
ALTER TABLE `performanceunmatch`
  MODIFY `RowID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salaryparameter`
--
ALTER TABLE `salaryparameter`
  MODIFY `ParameterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `systemcardlink`
--
ALTER TABLE `systemcardlink`
  MODIFY `RowID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemcardvendor`
--
ALTER TABLE `systemcardvendor`
  MODIFY `RowID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemccos`
--
ALTER TABLE `systemccos`
  MODIFY `RowID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
