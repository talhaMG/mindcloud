-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 09:12 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mortage`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_loan`
--

CREATE TABLE `ms_loan` (
  `loan_id` int(11) NOT NULL,
  `loan_email` varchar(255) NOT NULL,
  `loan_officername` varchar(255) NOT NULL,
  `loan_work` int(1) NOT NULL,
  `loan_fname` varchar(255) NOT NULL,
  `loan_midname` varchar(255) NOT NULL,
  `loan_lname` varchar(255) NOT NULL,
  `loan_suffix` varchar(255) NOT NULL,
  `loan_phone` varchar(255) NOT NULL,
  `loan_marital_status` varchar(255) NOT NULL,
  `loan_military` int(1) NOT NULL,
  `loan_address` varchar(255) NOT NULL,
  `loan_property_value` varchar(255) NOT NULL,
  `loan_cash_out` int(1) NOT NULL,
  `loan_cash_amount` varchar(255) NOT NULL,
  `loan_loan_value` text NOT NULL,
  `loan_co_applicantfname` text NOT NULL,
  `loan_co_applicantmidname` text NOT NULL,
  `loan_co_applicantlname` text NOT NULL,
  `loan_co_applicantsuffix` text NOT NULL,
  `loan_co_applicantemail` text NOT NULL,
  `loan_co_applicantphone` text NOT NULL,
  `loan_co_applicantmarital_status` text NOT NULL,
  `loan_co_applicantmilitary` int(1) NOT NULL,
  `loan_co_applicantlive` int(1) NOT NULL,
  `loan_co_applicantaddress` text NOT NULL,
  `loan_property_type` text NOT NULL,
  `loan_property_use` text NOT NULL,
  `loan_property_county` text NOT NULL,
  `loan_purchase_price` text NOT NULL,
  `loan_down_payment` text NOT NULL,
  `loan_down_payment_gift` int(1) NOT NULL,
  `loan_real_state_agent` int(1) NOT NULL DEFAULT '0',
  `loan_refer_name` text NOT NULL,
  `loan_agent_fname` text NOT NULL,
  `loan_agent_lname` text NOT NULL,
  `loan_agent_phone` text NOT NULL,
  `loan_agent_email` text NOT NULL,
  `loan_dateof_birth` text NOT NULL,
  `loan_security_number` text NOT NULL,
  `loan_finance_institute` text NOT NULL,
  `loan_property_address` text NOT NULL,
  `loan_judgments` text NOT NULL,
  `loan_bankruptcy` text NOT NULL,
  `loan_foreclosed` text NOT NULL,
  `loan_lawsuit` text NOT NULL,
  `loan_transfer_of_title` text NOT NULL,
  `loan_financial_obligation` text NOT NULL,
  `loan_child_support` text NOT NULL,
  `loan_payment_borrowed` text NOT NULL,
  `loan_co_maker` text NOT NULL,
  `loan_sex` text NOT NULL,
  `loan_ethnicity` text NOT NULL,
  `loan_hispanic` text NOT NULL,
  `loan_wish` text NOT NULL,
  `loan_american` text NOT NULL,
  `loan_asian` text NOT NULL,
  `loan_black` text NOT NULL,
  `loan_native` text NOT NULL,
  `loan_white` text NOT NULL,
  `loan_move_date` text NOT NULL,
  `loan_rent_free` text NOT NULL,
  `loan_own_property` text NOT NULL,
  `loan_education` text NOT NULL,
  `loan_dependents` text NOT NULL,
  `loan_credit_score` text NOT NULL,
  `loan_file1` text NOT NULL,
  `loan_file2` text NOT NULL,
  `loan_file3` text NOT NULL,
  `loan_file4` text NOT NULL,
  `loan_file5` text NOT NULL,
  `loan_file6` text NOT NULL,
  `loan_file7` text NOT NULL,
  `loan_file8` text NOT NULL,
  `loan_file9` text NOT NULL,
  `loan_file10` text NOT NULL,
  `loan_file11` text NOT NULL,
  `loan_file12` text NOT NULL,
  `loan_image_path` text NOT NULL,
  `loan_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loan_step_id` int(11) NOT NULL,
  `loan_user_id` int(11) NOT NULL,
  `loan_status` tinyint(1) NOT NULL DEFAULT '1',
  `loan_approval_status` tinyint(4) NOT NULL DEFAULT '0',
  `loan_same` int(1) NOT NULL DEFAULT '1',
  `loan_terms` int(1) NOT NULL DEFAULT '1',
  `loan_reason` text,
  `loan_mail_add` varchar(255) DEFAULT NULL,
  `loan_co_mail_add` varchar(2555) DEFAULT NULL,
  `loan_co_applicantmilitary_status` varchar(255) DEFAULT NULL,
  `loan_co_applicantvaloan` int(1) NOT NULL,
  `loan_apply_someone` varchar(255) DEFAULT NULL,
  `loan_trans` varchar(255) DEFAULT NULL,
  `loan_personal_status` varchar(255) DEFAULT NULL,
  `loan_personalvaloan` int(1) NOT NULL DEFAULT '1',
  `loan_personal_loan_status` varchar(2555) DEFAULT NULL,
  `loan_work_some` varchar(2555) DEFAULT NULL,
  `loan_citizen` varchar(2555) DEFAULT NULL,
  `loan_emp_name` varchar(2555) DEFAULT NULL,
  `loan_emp_address` varchar(2555) DEFAULT NULL,
  `loan_emp_phone` varchar(2555) DEFAULT NULL,
  `loan_emp_start_date` varchar(2555) DEFAULT NULL,
  `loan_emp_job` varchar(2555) DEFAULT NULL,
  `loan_emp_year` varchar(2555) DEFAULT NULL,
  `loan_pay_type` varchar(2555) DEFAULT NULL,
  `loan_hour_rate` varchar(2555) DEFAULT NULL,
  `loan_hour_week` varchar(2555) DEFAULT NULL,
  `loan_annual_overtime` varchar(2555) DEFAULT NULL,
  `loan_annual_bonus` varchar(2555) DEFAULT NULL,
  `loan_annual_commission` varchar(2555) DEFAULT NULL,
  `loan_real_property_type` varchar(255) DEFAULT NULL,
  `loan_real_property_address` varchar(255) DEFAULT NULL,
  `loan_real_value` varchar(255) DEFAULT NULL,
  `loan_real_current` varchar(255) DEFAULT NULL,
  `loan_real_trans` varchar(255) DEFAULT NULL,
  `loan_real_rental` varchar(255) DEFAULT NULL,
  `loan_real_month` varchar(255) DEFAULT NULL,
  `loan_real_mortgages` varchar(255) DEFAULT NULL,
  `loan_bank_account_type` varchar(255) DEFAULT NULL,
  `loan_account_balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_loan`
--

INSERT INTO `ms_loan` (`loan_id`, `loan_email`, `loan_officername`, `loan_work`, `loan_fname`, `loan_midname`, `loan_lname`, `loan_suffix`, `loan_phone`, `loan_marital_status`, `loan_military`, `loan_address`, `loan_property_value`, `loan_cash_out`, `loan_cash_amount`, `loan_loan_value`, `loan_co_applicantfname`, `loan_co_applicantmidname`, `loan_co_applicantlname`, `loan_co_applicantsuffix`, `loan_co_applicantemail`, `loan_co_applicantphone`, `loan_co_applicantmarital_status`, `loan_co_applicantmilitary`, `loan_co_applicantlive`, `loan_co_applicantaddress`, `loan_property_type`, `loan_property_use`, `loan_property_county`, `loan_purchase_price`, `loan_down_payment`, `loan_down_payment_gift`, `loan_real_state_agent`, `loan_refer_name`, `loan_agent_fname`, `loan_agent_lname`, `loan_agent_phone`, `loan_agent_email`, `loan_dateof_birth`, `loan_security_number`, `loan_finance_institute`, `loan_property_address`, `loan_judgments`, `loan_bankruptcy`, `loan_foreclosed`, `loan_lawsuit`, `loan_transfer_of_title`, `loan_financial_obligation`, `loan_child_support`, `loan_payment_borrowed`, `loan_co_maker`, `loan_sex`, `loan_ethnicity`, `loan_hispanic`, `loan_wish`, `loan_american`, `loan_asian`, `loan_black`, `loan_native`, `loan_white`, `loan_move_date`, `loan_rent_free`, `loan_own_property`, `loan_education`, `loan_dependents`, `loan_credit_score`, `loan_file1`, `loan_file2`, `loan_file3`, `loan_file4`, `loan_file5`, `loan_file6`, `loan_file7`, `loan_file8`, `loan_file9`, `loan_file10`, `loan_file11`, `loan_file12`, `loan_image_path`, `loan_createdon`, `loan_step_id`, `loan_user_id`, `loan_status`, `loan_approval_status`, `loan_same`, `loan_terms`, `loan_reason`, `loan_mail_add`, `loan_co_mail_add`, `loan_co_applicantmilitary_status`, `loan_co_applicantvaloan`, `loan_apply_someone`, `loan_trans`, `loan_personal_status`, `loan_personalvaloan`, `loan_personal_loan_status`, `loan_work_some`, `loan_citizen`, `loan_emp_name`, `loan_emp_address`, `loan_emp_phone`, `loan_emp_start_date`, `loan_emp_job`, `loan_emp_year`, `loan_pay_type`, `loan_hour_rate`, `loan_hour_week`, `loan_annual_overtime`, `loan_annual_bonus`, `loan_annual_commission`, `loan_real_property_type`, `loan_real_property_address`, `loan_real_value`, `loan_real_current`, `loan_real_trans`, `loan_real_rental`, `loan_real_month`, `loan_real_mortgages`, `loan_bank_account_type`, `loan_account_balance`) VALUES
(117, '', 'd', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-21 04:42:26', 1, 67, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-23 12:17:22', 1, 68, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '', 'Test', 0, 'Lorem', '', 'Ipsum', '', '(767) 686-8787', 'Married', 0, '1', '', 0, '', '7', 'Lorem', '', 'Ipsum', '', 'lorem0909@gmail.com', '(767) 686-8787', 'Separated', 0, 0, '1', 'Townhouse', 'Primary Residence', 'jhjk', '0', '8', 0, 0, 'No', '', '', '', '', '2012-01-01', '557-90-8900', 'Bank Of America', 'as', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Female', 'Puerto Rican', 'Do not wish to provide', '', 'Do not wish to provide', 'Korean', '', 'Native Hawaiian', '', '2020-07-22', 'Rent', 'Yes', 'Graduation', '1', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-23 12:52:08', 27, 68, 0, 0, 1, 1, NULL, '', '', '', 0, 'Yes', 'Purchase', '', 0, '', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '', 'Test', 0, 'Lorem', '', 'Ipsum', '', '(767) 686-8787', 'Married', 0, '1', '', 0, '', '7', 'Lorem', '', 'Ipsum', '', 'lorem0909@gmail.com', '(767) 686-8787', 'Single', 0, 0, '1', 'Townhouse', 'Second Home', 'jhjk', '0', '0', 0, 0, 'No', '', '', '', '', '2012-01-01', '778-90-8000', 'Bank Of America', 'test', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Do not wish to provide', 'Other Hispanic or Latino', 'Do not wish to provide', '', 'Black or African American', 'Vietnamese', '', '', '', '2005-09-11', 'Rent', 'No', 'Intermediate', '1', '9', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-24 02:15:29', 22, 68, 1, 0, 1, 1, NULL, '', '', '', 0, 'Yes', 'Purchase', '', 0, '', 'Yes', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '', 'Test', 0, 'Lorem', '', 'Ipsum', '', '(767) 686-8787', 'Single', 0, '1', '', 0, '', '7', 'Lorem', '', 'Ipsum', '', 'lorem3@gmail.com', '(676) 769-8787', 'Single', 0, 0, '1', 'Single Family', 'Primary Residence', 'Test', '7', '8', 0, 0, 'No', '', '', '', '', '2012-01-01', '678-80-9898', 'Chase', 'test', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:31:25', 16, 69, 0, 0, 1, 1, NULL, '', '', '', 0, 'Yes', 'Purchase', '', 0, '', 'Yes', 'U.S. Citizen', 'Lorem', 'PO BOX 548', '(767) 676-7688', '2020-07-24', 'hkh', '67', 'Salaried', '9', '5', '8', '9', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Savings', '89'),
(122, '', 'er', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:35:25', 2, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', 'Yes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '', 'gjgj', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:37:00', 1, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', 'Yes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '', 'gjgj', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:37:07', 1, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:38:10', 1, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:38:28', 1, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '', 'd', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:38:53', 2, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', 'Yes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '', 'f', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:40:34', 1, 69, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', 'Yes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '', 'f', 0, 'Lorem', '', 'Ipsum', '', '(767) 686-8787', 'Single', 0, '1', '8', 0, '9', '0', 'Lorem', '', 'Ipsum', '', 'lorem1@gmail.com', '(767) 686-8787', 'Single', 0, 0, '1', 'Condominium', 'Primary Residence', '0', '0', '8', 0, 0, 'Yes', 'Madiha', 'Mukhtar', '(034) 712-5255', 'madihamukhtar111@gmail.com', '2012-01-01', '123-78-9000', 'U.S. Bank', 'test', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Male', 'Hispanic or Latino', 'Do not wish to provide', '', 'Do not wish to provide', 'Chinese', '', '', '', '2008-09-11', 'Rent', 'Yes', 'Intermediate', '1', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 05:40:43', 40, 69, 1, 0, 1, 1, NULL, '', '', '', 0, 'Yes', 'Purchase', '', 0, '', 'No', 'U.S. Citizen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '', '', 0, 'Madiha', '', 'Mukhtar', '', '(034) 712-5255', 'Single', 0, 'Waseem Terrace B/7 nicholas street Karachi', '', 0, '', '7', 'Lorem', '', 'Ipsum', '', 'lorem1@gmail.com', '(767) 686-8787', 'Single', 0, 0, '1', 'Single Family', 'Primary Residence', 'Test', '0', '8', 0, 0, 'No', '', '', '', '', '1998-09-11', '678-89-9898', 'Bank Of America', 'test', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-25 06:41:52', 20, 69, 0, 0, 1, 1, NULL, '', '', '', 0, 'Yes', 'Purchase', '', 0, '', '', '', 'Lorem', '1', '(767) 686-8787', '2004-09-11', 'hkh', 'lkl', 'Salaried', '9', '5', '8', '9', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, '', '', 0, 'Lorem', '', 'Ipsum', '', '(767) 686-8787', 'Single', 0, '1', '', 0, '', '7', 'Lorem', '', 'Ipsum', '', 'lorem2@gmail.com', '(767) 686-8787', 'Married', 0, 0, '1', 'Single Family', 'Primary Residence', 'jhjk', '7', '0', 0, 0, 'No', '', '', '', '', '2008-09-11', '123-78-9000', 'Chase', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-07-26 11:37:18', 20, 70, 0, 0, 1, 1, NULL, '', '', '', 0, 'Yes', 'Purchase', '', 0, '', '', '', 'Lorem', 'PO BOX 548', '(767) 686-8787', '2020-07-23', 'hkh', '20', 'Hourly', '9', '5', '7', '9', '9', 'Single Family', 'Lorem', '1', 'Primary Residence', 'Primary or vacation home', 'Yes', '1900', '6', NULL, NULL),
(132, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-08-25 10:32:52', 1, 38, 0, 0, 0, 0, NULL, '', '', '', 0, '', '', '', 0, '', 'Yes', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_loan`
--
ALTER TABLE `ms_loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_loan`
--
ALTER TABLE `ms_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
