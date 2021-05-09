-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 09:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmv`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `action_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `area` text NOT NULL,
  `type` tinytext NOT NULL,
  `site` text NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `entry_date` date DEFAULT current_timestamp(),
  `priority` tinytext NOT NULL,
  `status` text NOT NULL,
  `created_on` date DEFAULT current_timestamp(),
  `created_by` text NOT NULL,
  `last_modified_on` text NOT NULL,
  `last_modified_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assoc_equipments`
--

CREATE TABLE `assoc_equipments` (
  `assoc_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `manufacturer` text NOT NULL,
  `model` text NOT NULL,
  `description` text NOT NULL,
  `service` text NOT NULL,
  `location` text NOT NULL,
  `protection` text NOT NULL,
  `epl` text NOT NULL,
  `eq_group` text NOT NULL,
  `t_class` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `amb_min` int(11) NOT NULL,
  `amb_max` int(11) NOT NULL,
  `certificate` text NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `created_by` text NOT NULL,
  `last_modified_on` date NOT NULL DEFAULT current_timestamp(),
  `last_modified_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` text NOT NULL,
  `priority` text NOT NULL,
  `last_modified_by` text NOT NULL,
  `last_modified_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `defects`
--

CREATE TABLE `defects` (
  `defect_id` int(11) NOT NULL,
  `insert_id` int(11) NOT NULL,
  `tag_number` text NOT NULL,
  `item_number` text NOT NULL,
  `site` text NOT NULL,
  `area` text NOT NULL,
  `description` text NOT NULL,
  `inspection` text NOT NULL,
  `details` text NOT NULL,
  `priority` text NOT NULL,
  `status` text NOT NULL,
  `created_by` text NOT NULL DEFAULT current_timestamp(),
  `created_on` date NOT NULL,
  `last_modified_by` text NOT NULL,
  `last_modified_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defects`
--

INSERT INTO `defects` (`defect_id`, `insert_id`, `tag_number`, `item_number`, `site`, `area`, `description`, `inspection`, `details`, `priority`, `status`, `created_by`, `created_on`, `last_modified_by`, `last_modified_on`) VALUES
(38, 0, 'TEST 1', '', '', '', '', '', 'Equipment is clearly marked with an acceptable Ex certification identification plate (ANZEx, AUSEx, IECEx), or CAD on file', 'Medium', '', '2021-04-21 17:01:05', '0000-00-00', '', '2021-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `defects_comments`
--

CREATE TABLE `defects_comments` (
  `comment_id` int(11) NOT NULL,
  `defect_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` text NOT NULL,
  `priority` text NOT NULL,
  `last_modified_by` text NOT NULL,
  `last_modified_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `document_number` text NOT NULL,
  `type` text NOT NULL,
  `issue` text NOT NULL,
  `description` text NOT NULL,
  `filename` text NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `created_by` text NOT NULL,
  `last_modified_on` date NOT NULL DEFAULT current_timestamp(),
  `last_modified_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document_number`, `type`, `issue`, `description`, `filename`, `created_on`, `created_by`, `last_modified_on`, `last_modified_by`) VALUES
(1, '5451', '', 'dffs', '', 'Take away.pdf', '2021-03-09', 'admin admin', '2021-03-09', 'admin admin');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipment_id` int(11) NOT NULL,
  `tag_number` varchar(10) NOT NULL,
  `site` text NOT NULL,
  `manufacturer` text NOT NULL,
  `model` text NOT NULL,
  `serial_number` text NOT NULL,
  `description` text NOT NULL,
  `service` text NOT NULL,
  `area` text NOT NULL,
  `location` text NOT NULL,
  `installation_date` datetime NOT NULL,
  `inspection_date` datetime NOT NULL,
  `ac_epl` text NOT NULL,
  `ac_zone` text NOT NULL,
  `ac_group` text NOT NULL,
  `ac_t_class` text NOT NULL,
  `ac_ip` text NOT NULL,
  `ac_amb_min` text NOT NULL,
  `ac_amb_max` text NOT NULL,
  `certificate` text NOT NULL,
  `xr_protection` text NOT NULL,
  `xr_epl` text NOT NULL,
  `xr_group` text NOT NULL,
  `xr_t_class` text NOT NULL,
  `xr_ip` text NOT NULL,
  `xr_amb_min` text NOT NULL,
  `xr_amb_max` text NOT NULL,
  `er_kw` text NOT NULL,
  `er_voltage` text NOT NULL,
  `er_amps` text NOT NULL,
  `er_hz` text NOT NULL,
  `er_rpm` text NOT NULL,
  `er_la` text NOT NULL,
  `er_te` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` text NOT NULL,
  `last_modified_on` datetime NOT NULL,
  `last_modified_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `tag_number`, `site`, `manufacturer`, `model`, `serial_number`, `description`, `service`, `area`, `location`, `installation_date`, `inspection_date`, `ac_epl`, `ac_zone`, `ac_group`, `ac_t_class`, `ac_ip`, `ac_amb_min`, `ac_amb_max`, `certificate`, `xr_protection`, `xr_epl`, `xr_group`, `xr_t_class`, `xr_ip`, `xr_amb_min`, `xr_amb_max`, `er_kw`, `er_voltage`, `er_amps`, `er_hz`, `er_rpm`, `er_la`, `er_te`, `created_on`, `created_by`, `last_modified_on`, `last_modified_by`) VALUES
(14, 'TEST 1', '', '', '', '', '', '', '', '', '2021-04-27 03:31:10', '2021-04-27 03:31:10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-04-27 03:31:10', '', '2021-04-27 03:31:10', ''),
(19, 'TEST 2', '', '', '', '', '', '', '', '', '2021-04-29 02:05:08', '2021-04-29 02:05:08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-04-29 02:05:08', 'admin admin', '2021-04-29 02:05:08', 'admin admin');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_report`
--

CREATE TABLE `inspection_report` (
  `ID` int(11) NOT NULL,
  `form_id` text NOT NULL,
  `type` text NOT NULL,
  `grade` text NOT NULL,
  `eq_tag` text NOT NULL,
  `facility_desc` text NOT NULL,
  `equipment_desc` text NOT NULL,
  `certificate_no` text NOT NULL,
  `manufacturer` text NOT NULL,
  `model` text NOT NULL,
  `serial_no` text NOT NULL,
  `pe/id` text NOT NULL,
  `loop_drawing` text NOT NULL,
  `ex_technique` text NOT NULL,
  `ex_group` text NOT NULL,
  `ex_temp_class` text NOT NULL,
  `ex_ip` text NOT NULL,
  `ex_amb_temp_min_c` text NOT NULL,
  `ex_amb_temp_max_c` text NOT NULL,
  `area_zone` text NOT NULL,
  `area_group` text NOT NULL,
  `area_temp_class` text NOT NULL,
  `area_ip` text NOT NULL,
  `amb_temp_min_c` text NOT NULL,
  `amb_temp_max_c` text NOT NULL,
  `er_kw` text NOT NULL,
  `er_voltage` text NOT NULL,
  `er_amps` text NOT NULL,
  `er_hz` text NOT NULL,
  `er_rpm` text NOT NULL,
  `er_la` text NOT NULL,
  `er_te` text NOT NULL,
  `ec1_desc` text NOT NULL,
  `Priority1` text NOT NULL,
  `ec1_type` text NOT NULL,
  `ec1_comment` text NOT NULL,
  `ec2_desc` text NOT NULL,
  `Priority2` text NOT NULL,
  `ec2_type` text NOT NULL,
  `ec2_comment` text NOT NULL,
  `ec3_desc` text NOT NULL,
  `Priority3` text NOT NULL,
  `ec3_type` text NOT NULL,
  `ec3_comment` text NOT NULL,
  `ec4_desc` text NOT NULL,
  `Priority4` text NOT NULL,
  `ec4_type` text NOT NULL,
  `ec4_comment` text NOT NULL,
  `ec5_desc` text NOT NULL,
  `Priority5` text NOT NULL,
  `ec5_type` text NOT NULL,
  `ec5_comment` text NOT NULL,
  `ec6_desc` text NOT NULL,
  `Priority6` text NOT NULL,
  `ec6_type` text NOT NULL,
  `ec6_comment` text NOT NULL,
  `ec7_desc` text NOT NULL,
  `Priority7` text NOT NULL,
  `ec7_type` text NOT NULL,
  `ec7_comment` text NOT NULL,
  `ec8_desc` text NOT NULL,
  `Priority8` text NOT NULL,
  `ec8_type` text NOT NULL,
  `ec8_comment` text NOT NULL,
  `ec9_desc` text NOT NULL,
  `Priority9` text NOT NULL,
  `ec9_type` text NOT NULL,
  `ec9_comment` text NOT NULL,
  `ec10_desc` text NOT NULL,
  `Priority10` text NOT NULL,
  `ec10_type` text NOT NULL,
  `ec10_comment` text NOT NULL,
  `ec11_desc` text NOT NULL,
  `Priority11` text NOT NULL,
  `ec11_type` text NOT NULL,
  `ec11_comment` text NOT NULL,
  `ec12_desc` text NOT NULL,
  `Priority12` text NOT NULL,
  `ec12_type` text NOT NULL,
  `ec12_comment` text NOT NULL,
  `ec13_desc` text NOT NULL,
  `Priority13` text NOT NULL,
  `ec13_type` text NOT NULL,
  `ec13_comment` text NOT NULL,
  `ec14_desc` text NOT NULL,
  `Priority14` text NOT NULL,
  `ec14_type` text NOT NULL,
  `ec14_comment` text NOT NULL,
  `ec15_desc` text NOT NULL,
  `Priority15` text NOT NULL,
  `ec15_type` text NOT NULL,
  `ec15_comment` text NOT NULL,
  `ec16_desc` text NOT NULL,
  `Priority16` text NOT NULL,
  `ec16_type` text NOT NULL,
  `ec16_comment` text NOT NULL,
  `ec17_desc` text NOT NULL,
  `Priority17` text NOT NULL,
  `ec17_type` text NOT NULL,
  `ec17_comment` text NOT NULL,
  `ec18_desc` text NOT NULL,
  `Priority18` text NOT NULL,
  `ec18_type` text NOT NULL,
  `ec18_comment` text NOT NULL,
  `ec19_desc` text NOT NULL,
  `Priority19` text NOT NULL,
  `ec19_type` text NOT NULL,
  `ec19_comment` text NOT NULL,
  `ec20_desc` text NOT NULL,
  `Priority20` text NOT NULL,
  `ec20_type` text NOT NULL,
  `ec20_comment` text NOT NULL,
  `ec21_desc` text NOT NULL,
  `Priority21` text NOT NULL,
  `ec21_type` text NOT NULL,
  `ec21_comment` text NOT NULL,
  `ec22_desc` text NOT NULL,
  `Priority22` text NOT NULL,
  `ec22_type` text NOT NULL,
  `ec22_comment` text NOT NULL,
  `ec23_desc` text NOT NULL,
  `Priority23` text NOT NULL,
  `ec23_type` text NOT NULL,
  `ec23_comment` text NOT NULL,
  `ec24_desc` text NOT NULL,
  `Priority24` text NOT NULL,
  `ec24_type` text NOT NULL,
  `ec24_comment` text NOT NULL,
  `ec25_desc` text NOT NULL,
  `Priority25` text NOT NULL,
  `ec25_type` text NOT NULL,
  `ec25_comment` text NOT NULL,
  `ec26_desc` text NOT NULL,
  `Priority26` text NOT NULL,
  `ec26_type` text NOT NULL,
  `ec26_comment` text NOT NULL,
  `ec27_desc` text NOT NULL,
  `Priority27` text NOT NULL,
  `ec27_type` text NOT NULL,
  `ec27_comment` text NOT NULL,
  `ec28_desc` text NOT NULL,
  `Priority28` text NOT NULL,
  `ec28_type` text NOT NULL,
  `ec28_comment` text NOT NULL,
  `ec29_desc` text NOT NULL,
  `Priority29` text NOT NULL,
  `ec29_type` text NOT NULL,
  `ec29_comment` text NOT NULL,
  `ec30_desc` text NOT NULL,
  `Priority30` text NOT NULL,
  `ec30_type` text NOT NULL,
  `ec30_comment` text NOT NULL,
  `ec31_desc` text NOT NULL,
  `Priority31` text NOT NULL,
  `ec31_type` text NOT NULL,
  `ec31_comment` text NOT NULL,
  `ec32_desc` text NOT NULL,
  `Priority32` text NOT NULL,
  `ec32_type` text NOT NULL,
  `ec32_comment` text NOT NULL,
  `ec33_desc` text NOT NULL,
  `Priority33` text NOT NULL,
  `ec33_type` text NOT NULL,
  `ec33_comment` text NOT NULL,
  `ec34_desc` text NOT NULL,
  `Priority34` text NOT NULL,
  `ec34_type` text NOT NULL,
  `ec34_comment` text NOT NULL,
  `ec35_desc` text NOT NULL,
  `Priority35` text NOT NULL,
  `ec35_type` text NOT NULL,
  `ec35_comment` text NOT NULL,
  `ec36_desc` text NOT NULL,
  `Priority36` text NOT NULL,
  `ec36_type` text NOT NULL,
  `ec36_comment` text NOT NULL,
  `ec37_desc` text NOT NULL,
  `Priority37` text NOT NULL,
  `ec37_type` text NOT NULL,
  `ec37_comment` text NOT NULL,
  `ec38_desc` text NOT NULL,
  `Priority38` text NOT NULL,
  `ec38_type` text NOT NULL,
  `ec38_comment` text NOT NULL,
  `ec39_desc` text NOT NULL,
  `Priority39` text NOT NULL,
  `ec39_type` text NOT NULL,
  `ec39_comment` text NOT NULL,
  `ec40_desc` text NOT NULL,
  `Priority40` text NOT NULL,
  `ec40_type` text NOT NULL,
  `ec40_comment` text NOT NULL,
  `ec41_desc` text NOT NULL,
  `Priority41` text NOT NULL,
  `ec41_type` text NOT NULL,
  `ec41_comment` text NOT NULL,
  `ec42_desc` text NOT NULL,
  `Priority42` text NOT NULL,
  `ec42_type` text NOT NULL,
  `ec42_comment` text NOT NULL,
  `ec43_desc` text NOT NULL,
  `Priority43` text NOT NULL,
  `ec43_type` text NOT NULL,
  `ec43_comment` text NOT NULL,
  `ec44_desc` text NOT NULL,
  `Priority44` text NOT NULL,
  `ec44_type` text NOT NULL,
  `ec44_comment` text NOT NULL,
  `ec45_desc` text NOT NULL,
  `Priority45` text NOT NULL,
  `ec45_type` text NOT NULL,
  `ec45_comment` text NOT NULL,
  `ec46_desc` text NOT NULL,
  `Priority46` text NOT NULL,
  `ec46_type` text NOT NULL,
  `ec46_comment` text NOT NULL,
  `ec47_desc` text NOT NULL,
  `Priority47` text NOT NULL,
  `ec47_type` text NOT NULL,
  `ec47_comment` text NOT NULL,
  `ec48_desc` text NOT NULL,
  `Priority48` text NOT NULL,
  `ec48_type` text NOT NULL,
  `ec48_comment` text NOT NULL,
  `ec49_desc` text NOT NULL,
  `Priority49` text NOT NULL,
  `ec49_type` text NOT NULL,
  `ec49_comment` text NOT NULL,
  `ec50_desc` text NOT NULL,
  `Priority50` text NOT NULL,
  `ec50_type` text NOT NULL,
  `ec50_comment` text NOT NULL,
  `ec51_desc` text NOT NULL,
  `Priority51` text NOT NULL,
  `ec51_type` text NOT NULL,
  `ec51_comment` text NOT NULL,
  `ec52_desc` text NOT NULL,
  `Priority52` text NOT NULL,
  `ec52_type` text NOT NULL,
  `ec52_comment` text NOT NULL,
  `ec53_desc` text NOT NULL,
  `Priority53` text NOT NULL,
  `ec53_type` text NOT NULL,
  `ec53_comment` text NOT NULL,
  `ec54_desc` text NOT NULL,
  `Priority54` text NOT NULL,
  `ec54_type` text NOT NULL,
  `ec54_comment` text NOT NULL,
  `ec55_desc` text NOT NULL,
  `Priority55` text NOT NULL,
  `ec55_type` text NOT NULL,
  `ec55_comment` text NOT NULL,
  `isb_model` text NOT NULL,
  `isb_cert` text NOT NULL,
  `isb_loop` text NOT NULL,
  `simple_device` text NOT NULL,
  `created_by` text NOT NULL,
  `created_on` datetime NOT NULL,
  `Modified_by` text NOT NULL,
  `Modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inspection_report`
--

INSERT INTO `inspection_report` (`ID`, `form_id`, `type`, `grade`, `eq_tag`, `facility_desc`, `equipment_desc`, `certificate_no`, `manufacturer`, `model`, `serial_no`, `pe/id`, `loop_drawing`, `ex_technique`, `ex_group`, `ex_temp_class`, `ex_ip`, `ex_amb_temp_min_c`, `ex_amb_temp_max_c`, `area_zone`, `area_group`, `area_temp_class`, `area_ip`, `amb_temp_min_c`, `amb_temp_max_c`, `er_kw`, `er_voltage`, `er_amps`, `er_hz`, `er_rpm`, `er_la`, `er_te`, `ec1_desc`, `Priority1`, `ec1_type`, `ec1_comment`, `ec2_desc`, `Priority2`, `ec2_type`, `ec2_comment`, `ec3_desc`, `Priority3`, `ec3_type`, `ec3_comment`, `ec4_desc`, `Priority4`, `ec4_type`, `ec4_comment`, `ec5_desc`, `Priority5`, `ec5_type`, `ec5_comment`, `ec6_desc`, `Priority6`, `ec6_type`, `ec6_comment`, `ec7_desc`, `Priority7`, `ec7_type`, `ec7_comment`, `ec8_desc`, `Priority8`, `ec8_type`, `ec8_comment`, `ec9_desc`, `Priority9`, `ec9_type`, `ec9_comment`, `ec10_desc`, `Priority10`, `ec10_type`, `ec10_comment`, `ec11_desc`, `Priority11`, `ec11_type`, `ec11_comment`, `ec12_desc`, `Priority12`, `ec12_type`, `ec12_comment`, `ec13_desc`, `Priority13`, `ec13_type`, `ec13_comment`, `ec14_desc`, `Priority14`, `ec14_type`, `ec14_comment`, `ec15_desc`, `Priority15`, `ec15_type`, `ec15_comment`, `ec16_desc`, `Priority16`, `ec16_type`, `ec16_comment`, `ec17_desc`, `Priority17`, `ec17_type`, `ec17_comment`, `ec18_desc`, `Priority18`, `ec18_type`, `ec18_comment`, `ec19_desc`, `Priority19`, `ec19_type`, `ec19_comment`, `ec20_desc`, `Priority20`, `ec20_type`, `ec20_comment`, `ec21_desc`, `Priority21`, `ec21_type`, `ec21_comment`, `ec22_desc`, `Priority22`, `ec22_type`, `ec22_comment`, `ec23_desc`, `Priority23`, `ec23_type`, `ec23_comment`, `ec24_desc`, `Priority24`, `ec24_type`, `ec24_comment`, `ec25_desc`, `Priority25`, `ec25_type`, `ec25_comment`, `ec26_desc`, `Priority26`, `ec26_type`, `ec26_comment`, `ec27_desc`, `Priority27`, `ec27_type`, `ec27_comment`, `ec28_desc`, `Priority28`, `ec28_type`, `ec28_comment`, `ec29_desc`, `Priority29`, `ec29_type`, `ec29_comment`, `ec30_desc`, `Priority30`, `ec30_type`, `ec30_comment`, `ec31_desc`, `Priority31`, `ec31_type`, `ec31_comment`, `ec32_desc`, `Priority32`, `ec32_type`, `ec32_comment`, `ec33_desc`, `Priority33`, `ec33_type`, `ec33_comment`, `ec34_desc`, `Priority34`, `ec34_type`, `ec34_comment`, `ec35_desc`, `Priority35`, `ec35_type`, `ec35_comment`, `ec36_desc`, `Priority36`, `ec36_type`, `ec36_comment`, `ec37_desc`, `Priority37`, `ec37_type`, `ec37_comment`, `ec38_desc`, `Priority38`, `ec38_type`, `ec38_comment`, `ec39_desc`, `Priority39`, `ec39_type`, `ec39_comment`, `ec40_desc`, `Priority40`, `ec40_type`, `ec40_comment`, `ec41_desc`, `Priority41`, `ec41_type`, `ec41_comment`, `ec42_desc`, `Priority42`, `ec42_type`, `ec42_comment`, `ec43_desc`, `Priority43`, `ec43_type`, `ec43_comment`, `ec44_desc`, `Priority44`, `ec44_type`, `ec44_comment`, `ec45_desc`, `Priority45`, `ec45_type`, `ec45_comment`, `ec46_desc`, `Priority46`, `ec46_type`, `ec46_comment`, `ec47_desc`, `Priority47`, `ec47_type`, `ec47_comment`, `ec48_desc`, `Priority48`, `ec48_type`, `ec48_comment`, `ec49_desc`, `Priority49`, `ec49_type`, `ec49_comment`, `ec50_desc`, `Priority50`, `ec50_type`, `ec50_comment`, `ec51_desc`, `Priority51`, `ec51_type`, `ec51_comment`, `ec52_desc`, `Priority52`, `ec52_type`, `ec52_comment`, `ec53_desc`, `Priority53`, `ec53_type`, `ec53_comment`, `ec54_desc`, `Priority54`, `ec54_type`, `ec54_comment`, `ec55_desc`, `Priority55`, `ec55_type`, `ec55_comment`, `isb_model`, `isb_cert`, `isb_loop`, `simple_device`, `created_by`, `created_on`, `Modified_by`, `Modified_on`) VALUES
(14, '', '', 'VISUAL', 'TEST 1', '', '', '', '', '', '', '', '', 'EXTRA Ex i CHECKS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Equipment is clearly marked with an acceptable Ex certification identification plate (ANZEx, AUSEx, IECEx), or CAD on file', 'Medium', '2', '', 'Equipment is appropriate to the EPL/Zone, Gas Group  and Temperature class', 'High', '1', '', 'Equipment circuit identification is available and correct', 'Low', '0', '', 'Degree of protection(IP grade)of equipment is appropriate for the area', 'Low', '3', '', 'Equipment NOT obviously damaged', 'Low', '3', '', 'There are NO obvious unauthorised modifications', 'Low', '3', '', 'Bolts, cable entry devices and blanking elements are of the  correct type and are complete, and tight', 'Low', '3', '', 'Sealing gaskets and compounds on glasses and windows are in good condition', 'Low', '3', '', 'Condition of enclosure gaskets appear satisfactory', 'Low', '3', '', 'Cable type is appropriate for the EPL/Zone', 'Low', '3', '', 'Cables/conduits are adequately supported and there is no obvious damage', 'Low', '3', '', 'Cable insulation resistance OK', 'Low', '3', '', 'Earth resistance and continuity checked and OK', 'High', '3', '', 'Earthing of equipment is satisfactory and is correctly bonded, when required', 'Low', '3', '', 'Equipment is protected against corrosion/ weather/ vibration/ other adverse conditions, & there is no undue accumulation of dust or dirt', 'Low', '3', '', 'Motor fan cowling is not damaged and motor fan not rubbing', 'Low', '3', '', 'Cable entry devices are certified as flameproof and there is no more than 1 adaptor per cable entry', 'High', '3', '', 'Glands are barrier glands if cable is not solid, or if cable is solid and there are ignition sources inside enclosure in a zone 1 area and the volume of enclosure is >2 litres', 'High', '3', '', 'There are no obstacles within 10 mm of flange joints for Group IIA', 'Low', '3', '', 'If Denso tape has been applied to a flange joint there is one wrap only with a short overlap for Gas Group IIA', 'Medium', '3', '', 'Flameproof conduit seals are fitted on all conduits, with maximum one adaptor per entry', 'Low', '3', '', 'Glands, adapters and blanking elements maintain the: \r\na) IP of enclosure and are fitted with an IP washer or \r\nb) IP54 if there is no IP rating available for the enclosure ', 'High', '3', '', 'Equipment has adequate IS circuit identification (e.g. blue sheath)', 'Medium', '3', '', 'Point to point connections checked and are OK', 'Medium', '3', '', 'Specific conditions of use(if applicable)are complied with', 'High', '3', '', 'Lamp rating, type and position are correct', 'Low', '3', '', 'Enclosure gasket condition is clean, undamaged, etc. (No gasket allowed on flameproof  equipment unless part of certification)', 'Low', '3', '', 'Creepage and clearance distances have not been reduced by the termination', 'Low', '3', '', 'All equipment housings are clean and dry', 'Low', '3', '', 'Earthing connections are satisfactory', 'High', '3', '', 'All unused cores are terminated or earthed at HA end, and if terminated at HA end then are earthed at the other end', 'Low', '3', '', 'All terminations are tight', 'Low', '3', '', 'Protective devices, overloads etc. correctly set', 'High', '3', '', 'Cable glands are installed correctly as per manufacturers specifications', 'High', '3', '', 'Flame paths are clean and undamaged', 'High', '3', '', 'Flange joint gaps appear to be acceptable', 'High', '3', '', 'Conduit seals are filled with compound', 'High', '3', '', 'All terminals are Ex e or Ex de certified, and the number does NOT exceed the limit for the enclosure', 'High', '3', '', 'All unused cores are terminated in Ex e terminals and earthed', 'High', '3', '', 'All equipment within the enclosure is suitably Ex e or Ex d or Ex m certified.', 'High', '3', '', 'Bridging links do not reduce creepage and clearance distances and are allowed by the documentation', 'Low', '3', '', 'Power conductors are not bunched together causing possible hot spots, and conductor lengths are not excessive', 'Low', '3', '', 'Unused terminals are tightened down', 'Low', '3', '', 'Motor protection device correctly set', 'High', '3', '', 'All terminals are Ex n or Ex e or Ex de certified (if required on certificate)', 'Low', '3', '', 'Bridging links do not reduce creepage & clearance distances and are allowed by the documentation', 'Low', '3', '', 'Enclosed break and hermetically sealed devices are undamaged', 'Low', '3', '', 'All cores are uniquely labelled', 'Low', '3', '', 'Cable screens are earthed in the safe area as per design documentation and normally isolated at field equipment end', 'Low', '3', '', 'Separation and segregation is maintained between IS and Non-IS circuits to ensure integrity of IS signal', 'High', '3', '', 'Cable length does not exceed maximum allowable value per IS calculations in the HA Verification Dossier', 'High', '3', '', 'Safety IS barrier units, relays and other energy limiting devices are of the approved type, installed in accordance with the loop sheet and securely earthed where required', 'High', '3', '', 'For Zener barriers the ISB earth conductor to the main power system earth point is clearly identified', 'Low', '3', '', 'For Zener barriers the impedance from the ISB earth point of connection to the main power system earth point is less than 1Ω', 'Low', '3', '', 'Earth Free test successfully completed(Zener barriers only)', 'Low', '3', '', 'TEST', 'TEST ', 'TEST', 'NO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(19, '', '', 'DETAILED', 'TEST 2', '', '', '', '', '', '', '', '', 'EXTRA Ex i CHECKS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Equipment is clearly marked with an acceptable Ex certification identification plate (ANZEx, AUSEx, IECEx), or CAD on file', 'Medium', '3', '', 'Equipment is appropriate to the EPL/Zone, Gas Group  and Temperature class', 'High', '3', '', 'Equipment circuit identification is available and correct', 'Low', '3', '', 'Degree of protection(IP grade)of equipment is appropriate for the area', 'Low', '3', '', 'Equipment NOT obviously damaged', 'Low', '3', '', 'There are NO obvious unauthorised modifications', 'Low', '3', '', 'Bolts, cable entry devices and blanking elements are of the  correct type and are complete, and tight', 'Low', '3', '', 'Sealing gaskets and compounds on glasses and windows are in good condition', 'Low', '3', '', 'Condition of enclosure gaskets appear satisfactory', 'Low', '3', '', 'Cable type is appropriate for the EPL/Zone', 'Low', '3', '', 'Cables/conduits are adequately supported and there is no obvious damage', 'Low', '3', '', 'Cable insulation resistance OK', 'Low', '3', '', 'Earth resistance and continuity checked and OK', 'High', '3', '', 'Earthing of equipment is satisfactory and is correctly bonded, when required', 'Low', '3', '', 'Equipment is protected against corrosion/ weather/ vibration/ other adverse conditions, & there is no undue accumulation of dust or dirt', 'Low', '3', '', 'Motor fan cowling is not damaged and motor fan not rubbing', 'Low', '3', '', 'Cable entry devices are certified as flameproof and there is no more than 1 adaptor per cable entry', 'High', '3', '', 'Glands are barrier glands if cable is not solid, or if cable is solid and there are ignition sources inside enclosure in a zone 1 area and the volume of enclosure is >2 litres', 'High', '3', '', 'There are no obstacles within 10 mm of flange joints for Group IIA', 'Low', '3', '', 'If Denso tape has been applied to a flange joint there is one wrap only with a short overlap for Gas Group IIA', 'Medium', '3', '', 'Flameproof conduit seals are fitted on all conduits, with maximum one adaptor per entry', 'Low', '3', '', 'Glands, adapters and blanking elements maintain the: \r\na) IP of enclosure and are fitted with an IP washer or \r\nb) IP54 if there is no IP rating available for the enclosure ', 'High', '3', '', 'Equipment has adequate IS circuit identification (e.g. blue sheath)', 'Medium', '3', '', 'Point to point connections checked and are OK', 'Medium', '3', '', 'Specific conditions of use(if applicable)are complied with', 'High', '3', '', 'Lamp rating, type and position are correct', 'Low', '3', '', 'Enclosure gasket condition is clean, undamaged, etc. (No gasket allowed on flameproof  equipment unless part of certification)', 'Low', '3', '', 'Creepage and clearance distances have not been reduced by the termination', 'Low', '3', '', 'All equipment housings are clean and dry', 'Low', '3', '', 'Earthing connections are satisfactory', 'High', '3', '', 'All unused cores are terminated or earthed at HA end, and if terminated at HA end then are earthed at the other end', 'Low', '3', '', 'All terminations are tight', 'Low', '3', '', 'Protective devices, overloads etc. correctly set', 'High', '3', '', 'Cable glands are installed correctly as per manufacturers specifications', 'High', '3', '', 'Flame paths are clean and undamaged', 'High', '3', '', 'Flange joint gaps appear to be acceptable', 'High', '3', '', 'Conduit seals are filled with compound', 'High', '3', '', 'All terminals are Ex e or Ex de certified, and the number does NOT exceed the limit for the enclosure', 'High', '3', '', 'All unused cores are terminated in Ex e terminals and earthed', 'High', '3', '', 'All equipment within the enclosure is suitably Ex e or Ex d or Ex m certified.', 'High', '3', '', 'Bridging links do not reduce creepage and clearance distances and are allowed by the documentation', 'Low', '3', '', 'Power conductors are not bunched together causing possible hot spots, and conductor lengths are not excessive', 'Low', '3', '', 'Unused terminals are tightened down', 'Low', '3', '', 'Motor protection device correctly set', 'High', '3', '', 'All terminals are Ex n or Ex e or Ex de certified (if required on certificate)', 'Low', '3', '', 'Bridging links do not reduce creepage & clearance distances and are allowed by the documentation', 'Low', '3', '', 'Enclosed break and hermetically sealed devices are undamaged', 'Low', '3', '', 'All cores are uniquely labelled', 'Low', '3', '', 'Cable screens are earthed in the safe area as per design documentation and normally isolated at field equipment end', 'Low', '3', '', 'Separation and segregation is maintained between IS and Non-IS circuits to ensure integrity of IS signal', 'High', '3', '', 'Cable length does not exceed maximum allowable value per IS calculations in the HA Verification Dossier', 'High', '3', '', 'Safety IS barrier units, relays and other energy limiting devices are of the approved type, installed in accordance with the loop sheet and securely earthed where required', 'High', '3', '', 'For Zener barriers the ISB earth conductor to the main power system earth point is clearly identified', 'Low', '3', '', 'For Zener barriers the impedance from the ISB earth point of connection to the main power system earth point is less than 1Ω', 'Low', '3', '', 'Earth Free test successfully completed(Zener barriers only)', 'Low', '3', '', '', '', '', 'YES', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `first_name`, `last_name`) VALUES
('admin', 'password', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `assoc_equipments`
--
ALTER TABLE `assoc_equipments`
  ADD PRIMARY KEY (`assoc_id`),
  ADD KEY `eid_fk` (`equipment_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `aid_fk` (`action_id`);

--
-- Indexes for table `defects`
--
ALTER TABLE `defects`
  ADD PRIMARY KEY (`defect_id`);

--
-- Indexes for table `defects_comments`
--
ALTER TABLE `defects_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `aid_fk` (`defect_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `inspection_report`
--
ALTER TABLE `inspection_report`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assoc_equipments`
--
ALTER TABLE `assoc_equipments`
  MODIFY `assoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `defects`
--
ALTER TABLE `defects`
  MODIFY `defect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `defects_comments`
--
ALTER TABLE `defects_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inspection_report`
--
ALTER TABLE `inspection_report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assoc_equipments`
--
ALTER TABLE `assoc_equipments`
  ADD CONSTRAINT `eid_fk` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`equipment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `aid_fk` FOREIGN KEY (`action_id`) REFERENCES `actions` (`action_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
