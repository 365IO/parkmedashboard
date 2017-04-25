-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 25, 2017 at 06:52 PM
-- Server version: 5.6.28
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `parking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaing`
--

CREATE TABLE `campaing` (
  `c_id` int(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `virtual_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaing`
--

INSERT INTO `campaing` (`c_id`, `mobile`, `virtual_number`) VALUES
(1, '9920818481', '191');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logs_id` int(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `caller_date` date NOT NULL,
  `caller_time` time NOT NULL,
  `v_number` varchar(255) NOT NULL,
  `cur_time` time NOT NULL,
  `cur_date` date NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logs_id`, `mobile`, `caller_date`, `caller_time`, `v_number`, `cur_time`, `cur_date`, `ip_address`) VALUES
(1, '9920818481', '2017-04-05', '07:28:00', '191', '00:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `Vehicle_Id` int(255) NOT NULL,
  `Parking_Id` int(11) NOT NULL,
  `Check_In` date NOT NULL,
  `Check_Out` date NOT NULL,
  `Check_In_Time` time(6) NOT NULL,
  `Check_Out_Time` time(6) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Charges` varchar(255) NOT NULL,
  `Curr_Time` datetime(6) NOT NULL,
  `Curr_Date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`Vehicle_Id`, `Parking_Id`, `Check_In`, `Check_Out`, `Check_In_Time`, `Check_Out_Time`, `Location`, `Charges`, `Curr_Time`, `Curr_Date`) VALUES
(1, 1, '2017-04-11', '2017-04-23', '00:00:00.000000', '00:00:00.000000', 'panvel', '200', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 2, '2017-04-22', '2017-04-24', '00:00:00.000000', '00:00:00.000000', 'panvel', '100', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 3, '2017-04-23', '2017-04-24', '00:00:00.000000', '00:00:00.000000', 'panvel', '50', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_mobile`, `password`) VALUES
(1, '9920818481', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_Id` int(255) NOT NULL,
  `Vehicle_Number` varchar(100) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `V_Currdate` date NOT NULL,
  `V_Currtime` time(6) NOT NULL,
  `Ipaddress` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_Id`, `Vehicle_Number`, `Vehicle_Type`, `V_Currdate`, `V_Currtime`, `Ipaddress`) VALUES
(1, '123456', 'Two wheelers', '2017-04-24', '18:05:00.000000', 0),
(2, '123456', 'Two wheelers', '2017-04-24', '18:05:00.000000', 0),
(3, 'MH.46.AK.9640', 'Two Wheeler', '2017-04-23', '20:24:00.000000', 11111111);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vehpar`
-- (See below for the actual view)
--
CREATE TABLE `vehpar` (
`Vehicle_Number` varchar(100)
,`Vehicle_Type` varchar(255)
,`Check_In` date
,`Check_Out` date
,`Charges` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vehpar`
--
DROP TABLE IF EXISTS `vehpar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vehpar`  AS  select `V`.`Vehicle_Number` AS `Vehicle_Number`,`V`.`Vehicle_Type` AS `Vehicle_Type`,`P`.`Check_In` AS `Check_In`,`P`.`Check_Out` AS `Check_Out`,`P`.`Charges` AS `Charges` from (`vehicle` `V` join `parking` `P`) where (`V`.`Vehicle_Id` = `P`.`Vehicle_Id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaing`
--
ALTER TABLE `campaing`
  ADD PRIMARY KEY (`virtual_number`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `mobile` (`mobile`),
  ADD KEY `virtual number` (`virtual_number`),
  ADD KEY `c_id_2` (`c_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`mobile`),
  ADD KEY `logs_id` (`logs_id`),
  ADD KEY `virtual_number` (`v_number`),
  ADD KEY `mobile` (`mobile`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`Parking_Id`),
  ADD KEY `Vehicle_Id` (`Vehicle_Id`),
  ADD KEY `Parking_Id` (`Parking_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_mobile`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaing`
--
ALTER TABLE `campaing`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logs_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `Parking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Vehicle_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaing`
--
ALTER TABLE `campaing`
  ADD CONSTRAINT `campaing_ibfk_1` FOREIGN KEY (`mobile`) REFERENCES `user` (`user_mobile`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`mobile`) REFERENCES `user` (`user_mobile`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`v_number`) REFERENCES `campaing` (`virtual_number`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`Vehicle_Id`) REFERENCES `vehicle` (`Vehicle_Id`);
