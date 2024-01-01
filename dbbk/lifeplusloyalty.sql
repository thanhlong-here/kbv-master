-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2019 at 03:25 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.3.7-1+ubuntu18.04.1+deb.sury.org+1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeplusloyalty`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesss`
--

DROP TABLE IF EXISTS `accesss`;
CREATE TABLE IF NOT EXISTS `accesss` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `accesss`
--

TRUNCATE TABLE `accesss`;
--
-- Dumping data for table `accesss`
--

INSERT INTO `accesss` (`id`, `domain_id`, `user_id`) VALUES
(8, 11, 14),
(9, 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `parent` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `media_id` int(11) DEFAULT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cards_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `cards`
--

TRUNCATE TABLE `cards`;
--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `title`, `status`, `parent`, `content`, `media_id`, `issuer_id`) VALUES
(1, '2019-04-25 09:38:26', '2019-04-25 09:38:26', NULL, 'newbie', 'KBVision', 'draft', 0, NULL, NULL, 1),
(2, '2019-06-26 04:45:17', '2019-06-26 04:49:24', NULL, 'Code', 'KVB Title 2', 'active', 0, NULL, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `cities`
--

TRUNCATE TABLE `cities`;
--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `postcode`, `country`, `name`) VALUES
(1, '880000', 'VN', 'An Giang'),
(2, '790000', 'VN', 'Bà Rịa-Vũng Tàu'),
(3, '960000', 'VN', 'Bạc Liêu'),
(4, '260000', 'VN', 'Bắc Kạn'),
(5, '230000', 'VN', 'Bắc Giang'),
(6, '220000', 'VN', 'Bắc Ninh'),
(7, '930000', 'VN', 'Bến Tre'),
(8, '820000', 'VN', 'Bình Dương'),
(9, '590000', 'VN', 'Bình Định'),
(10, '830000', 'VN', 'Bình Phước'),
(11, '800000', 'VN', 'Bình Thuận'),
(12, '970000', 'VN', 'Cà Mau'),
(13, '270000', 'VN', 'Cao Bằng'),
(14, '900000', 'VN', 'Cần Thơ'),
(15, '550000', 'VN', 'Đà Nẵng'),
(16, '630000', 'VN', 'Đắk Lắk'),
(17, '640000', 'VN', 'Đắk Nông'),
(18, '380000', 'VN', 'Điện Biên'),
(19, '810000', 'VN', 'Đồng Nai'),
(20, '870000', 'VN', 'Đồng Tháp'),
(21, '600000', 'VN', 'Gia Lai'),
(22, '310000', 'VN', 'Hà Giang'),
(23, '400000', 'VN', 'Hà Nam'),
(24, '100000', 'VN', 'Hà Nội'),
(25, '480000', 'VN', 'Hà Tĩnh'),
(26, '170000', 'VN', 'Hải Dương'),
(27, '180000', 'VN', 'Hải Phòng'),
(28, '910000', 'VN', 'Hậu Giang'),
(29, '350000', 'VN', 'Hòa Bình'),
(30, '700000', 'VN', 'Thành phố Hồ Chí Minh'),
(31, '160000', 'VN', 'Hưng Yên'),
(32, '650000', 'VN', 'Khánh Hoà'),
(33, '920000', 'VN', 'Kiên Giang'),
(34, '580000', 'VN', 'Kon Tum'),
(35, '390000', 'VN', 'Lai Châu'),
(36, '240000', 'VN', 'Lạng Sơn'),
(37, '330000', 'VN', 'Lào Cai'),
(38, '670000', 'VN', 'Lâm Đồng'),
(39, '850000', 'VN', 'Long An'),
(40, '420000', 'VN', 'Nam Định'),
(41, '460000', 'VN', 'Nghệ An'),
(42, '430000', 'VN', 'Ninh Bình'),
(43, '660000', 'VN', 'Ninh Thuận'),
(44, '290000', 'VN', 'Phú Thọ'),
(45, '620000', 'VN', 'Phú Yên'),
(46, '510000', 'VN', 'Quảng Bình'),
(47, '560000', 'VN', 'Quảng Nam'),
(48, '570000', 'VN', 'Quảng Ngãi'),
(49, '200000', 'VN', 'Quảng Ninh'),
(50, '520000', 'VN', 'Quảng Trị'),
(51, '950000', 'VN', 'Sóc Trăng'),
(52, '360000', 'VN', 'Sơn La'),
(53, '840000', 'VN', 'Tây Ninh'),
(54, '410000', 'VN', 'Thái Bình'),
(55, '250000', 'VN', 'Thái Nguyên'),
(56, '440000', 'VN', 'Thanh Hoá'),
(57, '530000', 'VN', 'Thừa Thiên-Huế'),
(58, '860000', 'VN', 'Tiền Giang'),
(59, '940000', 'VN', 'Trà Vinh'),
(60, '300000', 'VN', 'Tuyên Quang'),
(61, '890000', 'VN', 'Vĩnh Long'),
(62, '280000', 'VN', 'Vĩnh Phúc'),
(63, '320000', 'VN', 'Yên Bái');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `countries`
--

TRUNCATE TABLE `countries`;
--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `iso`, `name`, `phone`, `currency`, `capital`) VALUES
(1, 'BD', 'BGD', 'Bangladesh', '880', 'BDT', 'Dhaka'),
(2, 'BE', 'BEL', 'Belgium', '32', 'EUR', 'Brussels'),
(3, 'BF', 'BFA', 'Burkina Faso', '226', 'XOF', 'Ouagadougou'),
(4, 'BG', 'BGR', 'Bulgaria', '359', 'BGN', 'Sofia'),
(5, 'BA', 'BIH', 'Bosnia and Herzegovina', '387', 'BAM', 'Sarajevo'),
(6, 'BB', 'BRB', 'Barbados', '+1-246', 'BBD', 'Bridgetown'),
(7, 'WF', 'WLF', 'Wallis and Futuna', '681', 'XPF', 'Mata Utu'),
(8, 'BL', 'BLM', 'Saint Barthelemy', '590', 'EUR', 'Gustavia'),
(9, 'BM', 'BMU', 'Bermuda', '+1-441', 'BMD', 'Hamilton'),
(10, 'BN', 'BRN', 'Brunei', '673', 'BND', 'Bandar Seri Begawan'),
(11, 'BO', 'BOL', 'Bolivia', '591', 'BOB', 'Sucre'),
(12, 'BH', 'BHR', 'Bahrain', '973', 'BHD', 'Manama'),
(13, 'BI', 'BDI', 'Burundi', '257', 'BIF', 'Bujumbura'),
(14, 'BJ', 'BEN', 'Benin', '229', 'XOF', 'Porto-Novo'),
(15, 'BT', 'BTN', 'Bhutan', '975', 'BTN', 'Thimphu'),
(16, 'JM', 'JAM', 'Jamaica', '+1-876', 'JMD', 'Kingston'),
(17, 'BV', 'BVT', 'Bouvet Island', '', 'NOK', ''),
(18, 'BW', 'BWA', 'Botswana', '267', 'BWP', 'Gaborone'),
(19, 'WS', 'WSM', 'Samoa', '685', 'WST', 'Apia'),
(20, 'BQ', 'BES', 'Bonaire, Saint Eustatius and Saba ', '599', 'USD', ''),
(21, 'BR', 'BRA', 'Brazil', '55', 'BRL', 'Brasilia'),
(22, 'BS', 'BHS', 'Bahamas', '+1-242', 'BSD', 'Nassau'),
(23, 'JE', 'JEY', 'Jersey', '+44-1534', 'GBP', 'Saint Helier'),
(24, 'BY', 'BLR', 'Belarus', '375', 'BYR', 'Minsk'),
(25, 'BZ', 'BLZ', 'Belize', '501', 'BZD', 'Belmopan'),
(26, 'RU', 'RUS', 'Russia', '7', 'RUB', 'Moscow'),
(27, 'RW', 'RWA', 'Rwanda', '250', 'RWF', 'Kigali'),
(28, 'RS', 'SRB', 'Serbia', '381', 'RSD', 'Belgrade'),
(29, 'TL', 'TLS', 'East Timor', '670', 'USD', 'Dili'),
(30, 'RE', 'REU', 'Reunion', '262', 'EUR', 'Saint-Denis'),
(31, 'TM', 'TKM', 'Turkmenistan', '993', 'TMT', 'Ashgabat'),
(32, 'TJ', 'TJK', 'Tajikistan', '992', 'TJS', 'Dushanbe'),
(33, 'RO', 'ROU', 'Romania', '40', 'RON', 'Bucharest'),
(34, 'TK', 'TKL', 'Tokelau', '690', 'NZD', ''),
(35, 'GW', 'GNB', 'Guinea-Bissau', '245', 'XOF', 'Bissau'),
(36, 'GU', 'GUM', 'Guam', '+1-671', 'USD', 'Hagatna'),
(37, 'GT', 'GTM', 'Guatemala', '502', 'GTQ', 'Guatemala City'),
(38, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', '', 'GBP', 'Grytviken'),
(39, 'GR', 'GRC', 'Greece', '30', 'EUR', 'Athens'),
(40, 'GQ', 'GNQ', 'Equatorial Guinea', '240', 'XAF', 'Malabo'),
(41, 'GP', 'GLP', 'Guadeloupe', '590', 'EUR', 'Basse-Terre'),
(42, 'JP', 'JPN', 'Japan', '81', 'JPY', 'Tokyo'),
(43, 'GY', 'GUY', 'Guyana', '592', 'GYD', 'Georgetown'),
(44, 'GG', 'GGY', 'Guernsey', '+44-1481', 'GBP', 'St Peter Port'),
(45, 'GF', 'GUF', 'French Guiana', '594', 'EUR', 'Cayenne'),
(46, 'GE', 'GEO', 'Georgia', '995', 'GEL', 'Tbilisi'),
(47, 'GD', 'GRD', 'Grenada', '+1-473', 'XCD', 'St. George\'s'),
(48, 'GB', 'GBR', 'United Kingdom', '44', 'GBP', 'London'),
(49, 'GA', 'GAB', 'Gabon', '241', 'XAF', 'Libreville'),
(50, 'SV', 'SLV', 'El Salvador', '503', 'USD', 'San Salvador'),
(51, 'GN', 'GIN', 'Guinea', '224', 'GNF', 'Conakry'),
(52, 'GM', 'GMB', 'Gambia', '220', 'GMD', 'Banjul'),
(53, 'GL', 'GRL', 'Greenland', '299', 'DKK', 'Nuuk'),
(54, 'GI', 'GIB', 'Gibraltar', '350', 'GIP', 'Gibraltar'),
(55, 'GH', 'GHA', 'Ghana', '233', 'GHS', 'Accra'),
(56, 'OM', 'OMN', 'Oman', '968', 'OMR', 'Muscat'),
(57, 'TN', 'TUN', 'Tunisia', '216', 'TND', 'Tunis'),
(58, 'JO', 'JOR', 'Jordan', '962', 'JOD', 'Amman'),
(59, 'HR', 'HRV', 'Croatia', '385', 'HRK', 'Zagreb'),
(60, 'HT', 'HTI', 'Haiti', '509', 'HTG', 'Port-au-Prince'),
(61, 'HU', 'HUN', 'Hungary', '36', 'HUF', 'Budapest'),
(62, 'HK', 'HKG', 'Hong Kong', '852', 'HKD', 'Hong Kong'),
(63, 'HN', 'HND', 'Honduras', '504', 'HNL', 'Tegucigalpa'),
(64, 'HM', 'HMD', 'Heard Island and McDonald Islands', ' ', 'AUD', ''),
(65, 'VE', 'VEN', 'Venezuela', '58', 'VEF', 'Caracas'),
(66, 'PR', 'PRI', 'Puerto Rico', '+1-787 and 1-939', 'USD', 'San Juan'),
(67, 'PS', 'PSE', 'Palestinian Territory', '970', 'ILS', 'East Jerusalem'),
(68, 'PW', 'PLW', 'Palau', '680', 'USD', 'Melekeok'),
(69, 'PT', 'PRT', 'Portugal', '351', 'EUR', 'Lisbon'),
(70, 'SJ', 'SJM', 'Svalbard and Jan Mayen', '47', 'NOK', 'Longyearbyen'),
(71, 'PY', 'PRY', 'Paraguay', '595', 'PYG', 'Asuncion'),
(72, 'IQ', 'IRQ', 'Iraq', '964', 'IQD', 'Baghdad'),
(73, 'PA', 'PAN', 'Panama', '507', 'PAB', 'Panama City'),
(74, 'PF', 'PYF', 'French Polynesia', '689', 'XPF', 'Papeete'),
(75, 'PG', 'PNG', 'Papua New Guinea', '675', 'PGK', 'Port Moresby'),
(76, 'PE', 'PER', 'Peru', '51', 'PEN', 'Lima'),
(77, 'PK', 'PAK', 'Pakistan', '92', 'PKR', 'Islamabad'),
(78, 'PH', 'PHL', 'Philippines', '63', 'PHP', 'Manila'),
(79, 'PN', 'PCN', 'Pitcairn', '870', 'NZD', 'Adamstown'),
(80, 'PL', 'POL', 'Poland', '48', 'PLN', 'Warsaw'),
(81, 'PM', 'SPM', 'Saint Pierre and Miquelon', '508', 'EUR', 'Saint-Pierre'),
(82, 'ZM', 'ZMB', 'Zambia', '260', 'ZMK', 'Lusaka'),
(83, 'EH', 'ESH', 'Western Sahara', '212', 'MAD', 'El-Aaiun'),
(84, 'EE', 'EST', 'Estonia', '372', 'EUR', 'Tallinn'),
(85, 'EG', 'EGY', 'Egypt', '20', 'EGP', 'Cairo'),
(86, 'ZA', 'ZAF', 'South Africa', '27', 'ZAR', 'Pretoria'),
(87, 'EC', 'ECU', 'Ecuador', '593', 'USD', 'Quito'),
(88, 'IT', 'ITA', 'Italy', '39', 'EUR', 'Rome'),
(89, 'VN', 'VNM', 'Vietnam', '84', 'VND', 'Hanoi'),
(90, 'SB', 'SLB', 'Solomon Islands', '677', 'SBD', 'Honiara'),
(91, 'ET', 'ETH', 'Ethiopia', '251', 'ETB', 'Addis Ababa'),
(92, 'SO', 'SOM', 'Somalia', '252', 'SOS', 'Mogadishu'),
(93, 'ZW', 'ZWE', 'Zimbabwe', '263', 'ZWL', 'Harare'),
(94, 'SA', 'SAU', 'Saudi Arabia', '966', 'SAR', 'Riyadh'),
(95, 'ES', 'ESP', 'Spain', '34', 'EUR', 'Madrid'),
(96, 'ER', 'ERI', 'Eritrea', '291', 'ERN', 'Asmara'),
(97, 'ME', 'MNE', 'Montenegro', '382', 'EUR', 'Podgorica'),
(98, 'MD', 'MDA', 'Moldova', '373', 'MDL', 'Chisinau'),
(99, 'MG', 'MDG', 'Madagascar', '261', 'MGA', 'Antananarivo'),
(100, 'MF', 'MAF', 'Saint Martin', '590', 'EUR', 'Marigot'),
(101, 'MA', 'MAR', 'Morocco', '212', 'MAD', 'Rabat'),
(102, 'MC', 'MCO', 'Monaco', '377', 'EUR', 'Monaco'),
(103, 'UZ', 'UZB', 'Uzbekistan', '998', 'UZS', 'Tashkent'),
(104, 'MM', 'MMR', 'Myanmar', '95', 'MMK', 'Nay Pyi Taw'),
(105, 'ML', 'MLI', 'Mali', '223', 'XOF', 'Bamako'),
(106, 'MO', 'MAC', 'Macao', '853', 'MOP', 'Macao'),
(107, 'MN', 'MNG', 'Mongolia', '976', 'MNT', 'Ulan Bator'),
(108, 'MH', 'MHL', 'Marshall Islands', '692', 'USD', 'Majuro'),
(109, 'MK', 'MKD', 'Macedonia', '389', 'MKD', 'Skopje'),
(110, 'MU', 'MUS', 'Mauritius', '230', 'MUR', 'Port Louis'),
(111, 'MT', 'MLT', 'Malta', '356', 'EUR', 'Valletta'),
(112, 'MW', 'MWI', 'Malawi', '265', 'MWK', 'Lilongwe'),
(113, 'MV', 'MDV', 'Maldives', '960', 'MVR', 'Male'),
(114, 'MQ', 'MTQ', 'Martinique', '596', 'EUR', 'Fort-de-France'),
(115, 'MP', 'MNP', 'Northern Mariana Islands', '+1-670', 'USD', 'Saipan'),
(116, 'MS', 'MSR', 'Montserrat', '+1-664', 'XCD', 'Plymouth'),
(117, 'MR', 'MRT', 'Mauritania', '222', 'MRO', 'Nouakchott'),
(118, 'IM', 'IMN', 'Isle of Man', '+44-1624', 'GBP', 'Douglas, Isle of Man'),
(119, 'UG', 'UGA', 'Uganda', '256', 'UGX', 'Kampala'),
(120, 'TZ', 'TZA', 'Tanzania', '255', 'TZS', 'Dodoma'),
(121, 'MY', 'MYS', 'Malaysia', '60', 'MYR', 'Kuala Lumpur'),
(122, 'MX', 'MEX', 'Mexico', '52', 'MXN', 'Mexico City'),
(123, 'IL', 'ISR', 'Israel', '972', 'ILS', 'Jerusalem'),
(124, 'FR', 'FRA', 'France', '33', 'EUR', 'Paris'),
(125, 'IO', 'IOT', 'British Indian Ocean Territory', '246', 'USD', 'Diego Garcia'),
(126, 'SH', 'SHN', 'Saint Helena', '290', 'SHP', 'Jamestown'),
(127, 'FI', 'FIN', 'Finland', '358', 'EUR', 'Helsinki'),
(128, 'FJ', 'FJI', 'Fiji', '679', 'FJD', 'Suva'),
(129, 'FK', 'FLK', 'Falkland Islands', '500', 'FKP', 'Stanley'),
(130, 'FM', 'FSM', 'Micronesia', '691', 'USD', 'Palikir'),
(131, 'FO', 'FRO', 'Faroe Islands', '298', 'DKK', 'Torshavn'),
(132, 'NI', 'NIC', 'Nicaragua', '505', 'NIO', 'Managua'),
(133, 'NL', 'NLD', 'Netherlands', '31', 'EUR', 'Amsterdam'),
(134, 'NO', 'NOR', 'Norway', '47', 'NOK', 'Oslo'),
(135, 'NA', 'NAM', 'Namibia', '264', 'NAD', 'Windhoek'),
(136, 'VU', 'VUT', 'Vanuatu', '678', 'VUV', 'Port Vila'),
(137, 'NC', 'NCL', 'New Caledonia', '687', 'XPF', 'Noumea'),
(138, 'NE', 'NER', 'Niger', '227', 'XOF', 'Niamey'),
(139, 'NF', 'NFK', 'Norfolk Island', '672', 'AUD', 'Kingston'),
(140, 'NG', 'NGA', 'Nigeria', '234', 'NGN', 'Abuja'),
(141, 'NZ', 'NZL', 'New Zealand', '64', 'NZD', 'Wellington'),
(142, 'NP', 'NPL', 'Nepal', '977', 'NPR', 'Kathmandu'),
(143, 'NR', 'NRU', 'Nauru', '674', 'AUD', 'Yaren'),
(144, 'NU', 'NIU', 'Niue', '683', 'NZD', 'Alofi'),
(145, 'CK', 'COK', 'Cook Islands', '682', 'NZD', 'Avarua'),
(146, 'XK', 'XKX', 'Kosovo', '', 'EUR', 'Pristina'),
(147, 'CI', 'CIV', 'Ivory Coast', '225', 'XOF', 'Yamoussoukro'),
(148, 'CH', 'CHE', 'Switzerland', '41', 'CHF', 'Berne'),
(149, 'CO', 'COL', 'Colombia', '57', 'COP', 'Bogota'),
(150, 'CN', 'CHN', 'China', '86', 'CNY', 'Beijing'),
(151, 'CM', 'CMR', 'Cameroon', '237', 'XAF', 'Yaounde'),
(152, 'CL', 'CHL', 'Chile', '56', 'CLP', 'Santiago'),
(153, 'CC', 'CCK', 'Cocos Islands', '61', 'AUD', 'West Island'),
(154, 'CA', 'CAN', 'Canada', '1', 'CAD', 'Ottawa'),
(155, 'CG', 'COG', 'Republic of the Congo', '242', 'XAF', 'Brazzaville'),
(156, 'CF', 'CAF', 'Central African Republic', '236', 'XAF', 'Bangui'),
(157, 'CD', 'COD', 'Democratic Republic of the Congo', '243', 'CDF', 'Kinshasa'),
(158, 'CZ', 'CZE', 'Czech Republic', '420', 'CZK', 'Prague'),
(159, 'CY', 'CYP', 'Cyprus', '357', 'EUR', 'Nicosia'),
(160, 'CX', 'CXR', 'Christmas Island', '61', 'AUD', 'Flying Fish Cove'),
(161, 'CR', 'CRI', 'Costa Rica', '506', 'CRC', 'San Jose'),
(162, 'CW', 'CUW', 'Curacao', '599', 'ANG', ' Willemstad'),
(163, 'CV', 'CPV', 'Cape Verde', '238', 'CVE', 'Praia'),
(164, 'CU', 'CUB', 'Cuba', '53', 'CUP', 'Havana'),
(165, 'SZ', 'SWZ', 'Swaziland', '268', 'SZL', 'Mbabane'),
(166, 'SY', 'SYR', 'Syria', '963', 'SYP', 'Damascus'),
(167, 'SX', 'SXM', 'Sint Maarten', '599', 'ANG', 'Philipsburg'),
(168, 'KG', 'KGZ', 'Kyrgyzstan', '996', 'KGS', 'Bishkek'),
(169, 'KE', 'KEN', 'Kenya', '254', 'KES', 'Nairobi'),
(170, 'SS', 'SSD', 'South Sudan', '211', 'SSP', 'Juba'),
(171, 'SR', 'SUR', 'Suriname', '597', 'SRD', 'Paramaribo'),
(172, 'KI', 'KIR', 'Kiribati', '686', 'AUD', 'Tarawa'),
(173, 'KH', 'KHM', 'Cambodia', '855', 'KHR', 'Phnom Penh'),
(174, 'KN', 'KNA', 'Saint Kitts and Nevis', '+1-869', 'XCD', 'Basseterre'),
(175, 'KM', 'COM', 'Comoros', '269', 'KMF', 'Moroni'),
(176, 'ST', 'STP', 'Sao Tome and Principe', '239', 'STD', 'Sao Tome'),
(177, 'SK', 'SVK', 'Slovakia', '421', 'EUR', 'Bratislava'),
(178, 'KR', 'KOR', 'South Korea', '82', 'KRW', 'Seoul'),
(179, 'SI', 'SVN', 'Slovenia', '386', 'EUR', 'Ljubljana'),
(180, 'KP', 'PRK', 'North Korea', '850', 'KPW', 'Pyongyang'),
(181, 'KW', 'KWT', 'Kuwait', '965', 'KWD', 'Kuwait City'),
(182, 'SN', 'SEN', 'Senegal', '221', 'XOF', 'Dakar'),
(183, 'SM', 'SMR', 'San Marino', '378', 'EUR', 'San Marino'),
(184, 'SL', 'SLE', 'Sierra Leone', '232', 'SLL', 'Freetown'),
(185, 'SC', 'SYC', 'Seychelles', '248', 'SCR', 'Victoria'),
(186, 'KZ', 'KAZ', 'Kazakhstan', '7', 'KZT', 'Astana'),
(187, 'KY', 'CYM', 'Cayman Islands', '+1-345', 'KYD', 'George Town'),
(188, 'SG', 'SGP', 'Singapore', '65', 'SGD', 'Singapur'),
(189, 'SE', 'SWE', 'Sweden', '46', 'SEK', 'Stockholm'),
(190, 'SD', 'SDN', 'Sudan', '249', 'SDG', 'Khartoum'),
(191, 'DO', 'DOM', 'Dominican Republic', '+1-809 and 1-829', 'DOP', 'Santo Domingo'),
(192, 'DM', 'DMA', 'Dominica', '+1-767', 'XCD', 'Roseau'),
(193, 'DJ', 'DJI', 'Djibouti', '253', 'DJF', 'Djibouti'),
(194, 'DK', 'DNK', 'Denmark', '45', 'DKK', 'Copenhagen'),
(195, 'VG', 'VGB', 'British Virgin Islands', '+1-284', 'USD', 'Road Town'),
(196, 'DE', 'DEU', 'Germany', '49', 'EUR', 'Berlin'),
(197, 'YE', 'YEM', 'Yemen', '967', 'YER', 'Sanaa'),
(198, 'DZ', 'DZA', 'Algeria', '213', 'DZD', 'Algiers'),
(199, 'US', 'USA', 'United States', '1', 'USD', 'Washington'),
(200, 'UY', 'URY', 'Uruguay', '598', 'UYU', 'Montevideo'),
(201, 'YT', 'MYT', 'Mayotte', '262', 'EUR', 'Mamoudzou'),
(202, 'UM', 'UMI', 'United States Minor Outlying Islands', '1', 'USD', ''),
(203, 'LB', 'LBN', 'Lebanon', '961', 'LBP', 'Beirut'),
(204, 'LC', 'LCA', 'Saint Lucia', '+1-758', 'XCD', 'Castries'),
(205, 'LA', 'LAO', 'Laos', '856', 'LAK', 'Vientiane'),
(206, 'TV', 'TUV', 'Tuvalu', '688', 'AUD', 'Funafuti'),
(207, 'TW', 'TWN', 'Taiwan', '886', 'TWD', 'Taipei'),
(208, 'TT', 'TTO', 'Trinidad and Tobago', '+1-868', 'TTD', 'Port of Spain'),
(209, 'TR', 'TUR', 'Turkey', '90', 'TRY', 'Ankara'),
(210, 'LK', 'LKA', 'Sri Lanka', '94', 'LKR', 'Colombo'),
(211, 'LI', 'LIE', 'Liechtenstein', '423', 'CHF', 'Vaduz'),
(212, 'LV', 'LVA', 'Latvia', '371', 'EUR', 'Riga'),
(213, 'TO', 'TON', 'Tonga', '676', 'TOP', 'Nuku\'alofa'),
(214, 'LT', 'LTU', 'Lithuania', '370', 'LTL', 'Vilnius'),
(215, 'LU', 'LUX', 'Luxembourg', '352', 'EUR', 'Luxembourg'),
(216, 'LR', 'LBR', 'Liberia', '231', 'LRD', 'Monrovia'),
(217, 'LS', 'LSO', 'Lesotho', '266', 'LSL', 'Maseru'),
(218, 'TH', 'THA', 'Thailand', '66', 'THB', 'Bangkok'),
(219, 'TF', 'ATF', 'French Southern Territories', '', 'EUR', 'Port-aux-Francais'),
(220, 'TG', 'TGO', 'Togo', '228', 'XOF', 'Lome'),
(221, 'TD', 'TCD', 'Chad', '235', 'XAF', 'N\'Djamena'),
(222, 'TC', 'TCA', 'Turks and Caicos Islands', '+1-649', 'USD', 'Cockburn Town'),
(223, 'LY', 'LBY', 'Libya', '218', 'LYD', 'Tripolis'),
(224, 'VA', 'VAT', 'Vatican', '379', 'EUR', 'Vatican City'),
(225, 'VC', 'VCT', 'Saint Vincent and the Grenadines', '+1-784', 'XCD', 'Kingstown'),
(226, 'AE', 'ARE', 'United Arab Emirates', '971', 'AED', 'Abu Dhabi'),
(227, 'AD', 'AND', 'Andorra', '376', 'EUR', 'Andorra la Vella'),
(228, 'AG', 'ATG', 'Antigua and Barbuda', '+1-268', 'XCD', 'St. John\'s'),
(229, 'AF', 'AFG', 'Afghanistan', '93', 'AFN', 'Kabul'),
(230, 'AI', 'AIA', 'Anguilla', '+1-264', 'XCD', 'The Valley'),
(231, 'VI', 'VIR', 'U.S. Virgin Islands', '+1-340', 'USD', 'Charlotte Amalie'),
(232, 'IS', 'ISL', 'Iceland', '354', 'ISK', 'Reykjavik'),
(233, 'IR', 'IRN', 'Iran', '98', 'IRR', 'Tehran'),
(234, 'AM', 'ARM', 'Armenia', '374', 'AMD', 'Yerevan'),
(235, 'AL', 'ALB', 'Albania', '355', 'ALL', 'Tirana'),
(236, 'AO', 'AGO', 'Angola', '244', 'AOA', 'Luanda'),
(237, 'AQ', 'ATA', 'Antarctica', '', '', ''),
(238, 'AS', 'ASM', 'American Samoa', '+1-684', 'USD', 'Pago Pago'),
(239, 'AR', 'ARG', 'Argentina', '54', 'ARS', 'Buenos Aires'),
(240, 'AU', 'AUS', 'Australia', '61', 'AUD', 'Canberra'),
(241, 'AT', 'AUT', 'Austria', '43', 'EUR', 'Vienna'),
(242, 'AW', 'ABW', 'Aruba', '297', 'AWG', 'Oranjestad'),
(243, 'IN', 'IND', 'India', '91', 'INR', 'New Delhi'),
(244, 'AX', 'ALA', 'Aland Islands', '+358-18', 'EUR', 'Mariehamn'),
(245, 'AZ', 'AZE', 'Azerbaijan', '994', 'AZN', 'Baku'),
(246, 'IE', 'IRL', 'Ireland', '353', 'EUR', 'Dublin'),
(247, 'ID', 'IDN', 'Indonesia', '62', 'IDR', 'Jakarta'),
(248, 'UA', 'UKR', 'Ukraine', '380', 'UAH', 'Kiev'),
(249, 'QA', 'QAT', 'Qatar', '974', 'QAR', 'Doha'),
(250, 'MZ', 'MOZ', 'Mozambique', '258', 'MZN', 'Maputo');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `currency`
--

TRUNCATE TABLE `currency`;
-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `domains_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `domains`
--

TRUNCATE TABLE `domains`;
--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `name`, `secret`, `user_id`) VALUES
(11, 'root', '$2y$10$d4FuLAW2.BehoqITs8XwleY2Bt0RnQ2f2zXrNPeIDOK6DnXxLxAxW', 14),
(12, 'app_kbv', '$2y$10$MReuyuYqrKanToS7CLvovuQ9qF.YMF4b6n9jshvGAtMxHElpg2vki', 19);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `groups`
--

TRUNCATE TABLE `groups`;
--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `code`, `parent`, `deleted_at`) VALUES
(1, 'Danh mục khác', 'uncategorized', 0, NULL),
(2, 'Trà sữa', 'trasua', 0, NULL),
(3, 'Ẩm thực', 'amthuc', 0, NULL),
(4, 'Mua online', 'muaonline', 0, NULL),
(5, 'Mua sắm', 'muasam', 0, NULL),
(6, 'Giải trí', 'giaitri', 0, NULL),
(7, 'Làm đẹp', 'lamdep', 0, NULL),
(8, 'Di chuyển', 'dichuyen', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interacts`
--

DROP TABLE IF EXISTS `interacts`;
CREATE TABLE IF NOT EXISTS `interacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `issuer_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `interacts`
--

TRUNCATE TABLE `interacts`;
--
-- Dumping data for table `interacts`
--

INSERT INTO `interacts` (`id`, `issuer_id`, `user_id`, `type`, `action`, `note`, `status`, `created_at`, `updated_at`, `deleted_at`, `promotion_id`) VALUES
(1, 1, 73, 'save', NULL, NULL, NULL, '2019-07-08 20:00:50', '2019-07-08 20:00:50', NULL, 7),
(2, 1, 73, 'save', NULL, NULL, NULL, '2019-07-08 20:20:48', '2019-07-08 20:20:48', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `issuers`
--

DROP TABLE IF EXISTS `issuers`;
CREATE TABLE IF NOT EXISTS `issuers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issuers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `issuers`
--

TRUNCATE TABLE `issuers`;
--
-- Dumping data for table `issuers`
--

INSERT INTO `issuers` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `content`, `title`, `media_id`, `status`, `type`, `address`, `email`, `phone`, `website`) VALUES
(1, '2019-04-01 15:46:22', '2019-04-01 15:48:44', NULL, 18, NULL, 'KBVision', 1, 'active', 'free', '119 Điện Biên Phủ', 'meohere@gmail.com', '916700848', NULL),
(2, '2019-04-09 12:57:21', '2019-04-12 11:25:35', NULL, 20, NULL, 'ohere', NULL, 'active', 'free', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kbv_lotteries`
--

DROP TABLE IF EXISTS `kbv_lotteries`;
CREATE TABLE IF NOT EXISTS `kbv_lotteries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `media_id` int(11) DEFAULT NULL,
  `redeempoint` int(11) NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `end_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `kbv_lotteries`
--

TRUNCATE TABLE `kbv_lotteries`;
--
-- Dumping data for table `kbv_lotteries`
--

INSERT INTO `kbv_lotteries` (`id`, `title`, `content`, `media_id`, `redeempoint`, `result`, `status`, `end_at`, `created_at`, `updated_at`) VALUES
(5, 'QUAY SỐ MAY MẮN', 'Hãy chọn cho mình một mã số may mắn nhé! Mã số trúng thưởng sẽ dựa trên KQ XSMM Ngày 16/05/2019 củ CT XSKT Hồ Chí Minh', 41, 100, '0', 'active', '2019-06-15 00:00:00', '2019-05-21 02:13:52', '2019-05-21 08:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `kbv_lucky`
--

DROP TABLE IF EXISTS `kbv_lucky`;
CREATE TABLE IF NOT EXISTS `kbv_lucky` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `lottery_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `kbv_lucky`
--

TRUNCATE TABLE `kbv_lucky`;
--
-- Dumping data for table `kbv_lucky`
--

INSERT INTO `kbv_lucky` (`id`, `number`, `member_id`, `lottery_id`, `created_at`, `updated_at`) VALUES
(4, '818368', 32, 2, '2019-05-15 18:56:25', '2019-05-15 18:56:25'),
(5, '123731', 76, 2, '2019-05-16 01:42:44', '2019-05-16 01:42:44'),
(6, '206690', 76, 3, '2019-05-16 01:44:46', '2019-05-16 01:44:46'),
(7, '615184', 76, 4, '2019-05-16 01:46:42', '2019-05-16 01:46:42'),
(8, '290010', 32, 2, '2019-05-16 03:14:21', '2019-05-16 03:14:21'),
(9, '622619', 32, 2, '2019-05-16 03:25:33', '2019-05-16 03:25:33'),
(10, '711058', 32, 2, '2019-05-16 03:26:23', '2019-05-16 03:26:23'),
(11, '636008', 32, 2, '2019-05-16 03:28:41', '2019-05-16 03:28:41'),
(12, '366893', 32, 3, '2019-05-16 03:30:01', '2019-05-16 03:30:01'),
(13, '651222', 32, 2, '2019-05-16 03:32:29', '2019-05-16 03:32:29'),
(14, '781469', 32, 2, '2019-05-16 03:32:39', '2019-05-16 03:32:39'),
(15, '917685', 32, 2, '2019-05-16 03:44:00', '2019-05-16 03:44:00'),
(16, '881887', 63, 2, '2019-05-16 03:51:16', '2019-05-16 03:51:16'),
(17, '283365', 63, 2, '2019-05-16 03:51:23', '2019-05-16 03:51:23'),
(18, '894717', 63, 3, '2019-05-16 04:21:45', '2019-05-16 04:21:45'),
(19, '284385', 63, 3, '2019-05-16 04:21:48', '2019-05-16 04:21:48'),
(20, '746619', 63, 2, '2019-05-16 07:44:48', '2019-05-16 07:44:48'),
(21, '578303', 63, 2, '2019-05-16 07:44:51', '2019-05-16 07:44:51'),
(22, '063507', 63, 2, '2019-05-16 07:44:52', '2019-05-16 07:44:52'),
(23, '952147', 63, 2, '2019-05-16 07:44:52', '2019-05-16 07:44:52'),
(24, '483380', 63, 2, '2019-05-16 07:44:52', '2019-05-16 07:44:52'),
(25, '232431', 63, 2, '2019-05-16 07:44:53', '2019-05-16 07:44:53'),
(26, '330388', 63, 2, '2019-05-16 07:44:53', '2019-05-16 07:44:53'),
(27, '764394', 63, 2, '2019-05-16 07:44:53', '2019-05-16 07:44:53'),
(28, '234264', 63, 2, '2019-05-16 07:44:53', '2019-05-16 07:44:53'),
(29, '693962', 63, 2, '2019-05-16 07:44:53', '2019-05-16 07:44:53'),
(30, '892979', 63, 2, '2019-05-16 07:44:54', '2019-05-16 07:44:54'),
(31, '851699', 63, 2, '2019-05-16 07:44:54', '2019-05-16 07:44:54'),
(32, '321944', 63, 2, '2019-05-16 07:44:54', '2019-05-16 07:44:54'),
(33, '189029', 63, 2, '2019-05-16 07:44:54', '2019-05-16 07:44:54'),
(34, '905605', 63, 2, '2019-05-16 07:44:55', '2019-05-16 07:44:55'),
(35, '024671', 63, 2, '2019-05-16 08:23:36', '2019-05-16 08:23:36'),
(36, '778443', 63, 2, '2019-05-16 08:23:37', '2019-05-16 08:23:37'),
(37, '619511', 63, 2, '2019-05-16 08:23:37', '2019-05-16 08:23:37'),
(38, '099538', 63, 2, '2019-05-16 08:23:37', '2019-05-16 08:23:37'),
(39, '149992', 63, 2, '2019-05-16 08:23:38', '2019-05-16 08:23:38'),
(40, '908186', 63, 2, '2019-05-16 08:23:38', '2019-05-16 08:23:38'),
(41, '428584', 63, 2, '2019-05-16 08:23:38', '2019-05-16 08:23:38'),
(42, '664787', 63, 2, '2019-05-16 08:23:38', '2019-05-16 08:23:38'),
(43, '403049', 63, 2, '2019-05-16 08:23:38', '2019-05-16 08:23:38'),
(44, '077823', 63, 2, '2019-05-16 08:23:39', '2019-05-16 08:23:39'),
(45, '154235', 63, 2, '2019-05-16 08:23:42', '2019-05-16 08:23:42'),
(46, '433731', 63, 2, '2019-05-16 08:23:44', '2019-05-16 08:23:44'),
(47, '438020', 63, 2, '2019-05-16 08:23:44', '2019-05-16 08:23:44'),
(48, '581065', 63, 2, '2019-05-16 08:23:45', '2019-05-16 08:23:45'),
(49, '230509', 63, 2, '2019-05-16 08:23:45', '2019-05-16 08:23:45'),
(50, '651710', 63, 2, '2019-05-16 08:23:45', '2019-05-16 08:23:45'),
(51, '883057', 63, 2, '2019-05-16 08:23:46', '2019-05-16 08:23:46'),
(52, '854602', 63, 2, '2019-05-16 08:23:46', '2019-05-16 08:23:46'),
(53, '270198', 63, 2, '2019-05-16 08:23:46', '2019-05-16 08:23:46'),
(54, '390373', 63, 2, '2019-05-16 08:23:47', '2019-05-16 08:23:47'),
(55, '022793', 63, 2, '2019-05-16 08:23:47', '2019-05-16 08:23:47'),
(56, '343591', 63, 2, '2019-05-16 08:23:47', '2019-05-16 08:23:47'),
(57, '321517', 63, 2, '2019-05-16 08:23:48', '2019-05-16 08:23:48'),
(58, '808923', 63, 2, '2019-05-16 08:23:48', '2019-05-16 08:23:48'),
(59, '827176', 63, 2, '2019-05-16 08:24:30', '2019-05-16 08:24:30'),
(60, '672428', 63, 2, '2019-05-16 08:39:14', '2019-05-16 08:39:14'),
(61, '619142', 63, 2, '2019-05-16 08:39:16', '2019-05-16 08:39:16'),
(62, '722891', 63, 2, '2019-05-16 08:39:17', '2019-05-16 08:39:17'),
(63, '681879', 63, 2, '2019-05-16 08:39:18', '2019-05-16 08:39:18'),
(64, '652224', 63, 2, '2019-05-16 08:39:19', '2019-05-16 08:39:19'),
(65, '074984', 63, 2, '2019-05-16 08:39:20', '2019-05-16 08:39:20'),
(66, '274578', 63, 2, '2019-05-16 08:39:21', '2019-05-16 08:39:21'),
(67, '232021', 63, 2, '2019-05-16 08:39:22', '2019-05-16 08:39:22'),
(68, '263563', 63, 2, '2019-05-16 08:39:22', '2019-05-16 08:39:22'),
(69, '580087', 63, 2, '2019-05-16 08:39:23', '2019-05-16 08:39:23'),
(70, '080301', 63, 2, '2019-05-16 08:39:24', '2019-05-16 08:39:24'),
(71, '799759', 63, 2, '2019-05-16 08:39:25', '2019-05-16 08:39:25'),
(72, '070994', 63, 2, '2019-05-16 08:39:26', '2019-05-16 08:39:26'),
(73, '725325', 63, 2, '2019-05-16 08:39:27', '2019-05-16 08:39:27'),
(74, '292412', 63, 2, '2019-05-16 08:39:27', '2019-05-16 08:39:27'),
(75, '494107', 32, 2, '2019-05-16 08:39:34', '2019-05-16 08:39:34'),
(76, '671993', 63, 2, '2019-05-16 08:39:41', '2019-05-16 08:39:41'),
(77, '940040', 63, 2, '2019-05-16 08:39:42', '2019-05-16 08:39:42'),
(78, '780104', 63, 2, '2019-05-16 08:39:43', '2019-05-16 08:39:43'),
(79, '068365', 63, 2, '2019-05-16 08:39:43', '2019-05-16 08:39:43'),
(80, '180489', 63, 2, '2019-05-16 08:39:44', '2019-05-16 08:39:44'),
(81, '890375', 32, 2, '2019-05-16 08:46:24', '2019-05-16 08:46:24'),
(82, '625026', 32, 2, '2019-05-16 08:46:25', '2019-05-16 08:46:25'),
(83, '021513', 32, 2, '2019-05-16 08:46:55', '2019-05-16 08:46:55'),
(84, '371230', 76, 2, '2019-05-16 09:50:09', '2019-05-16 09:50:09'),
(85, '812354', 32, 2, '2019-05-16 10:26:08', '2019-05-16 10:26:08'),
(86, '293233', 32, 2, '2019-05-16 10:28:10', '2019-05-16 10:28:10'),
(87, '272362', 32, 2, '2019-05-16 10:28:10', '2019-05-16 10:28:10'),
(88, '804429', 32, 2, '2019-05-16 10:28:10', '2019-05-16 10:28:10'),
(89, '932958', 32, 2, '2019-05-16 10:28:10', '2019-05-16 10:28:10'),
(90, '834807', 32, 2, '2019-05-16 10:28:11', '2019-05-16 10:28:11'),
(91, '797430', 32, 2, '2019-05-16 10:28:11', '2019-05-16 10:28:11'),
(92, '766403', 32, 2, '2019-05-16 10:28:11', '2019-05-16 10:28:11'),
(93, '037552', 32, 2, '2019-05-16 10:28:11', '2019-05-16 10:28:11'),
(94, '060260', 32, 2, '2019-05-16 10:28:12', '2019-05-16 10:28:12'),
(95, '607305', 32, 2, '2019-05-16 10:28:12', '2019-05-16 10:28:12'),
(96, '908991', 32, 2, '2019-05-16 10:28:13', '2019-05-16 10:28:13'),
(97, '337061', 90, 2, '2019-05-16 11:00:11', '2019-05-16 11:00:11'),
(98, '597860', 90, 2, '2019-05-16 11:00:12', '2019-05-16 11:00:12'),
(99, '217473', 90, 2, '2019-05-16 11:00:13', '2019-05-16 11:00:13'),
(100, '527740', 90, 2, '2019-05-16 11:00:13', '2019-05-16 11:00:13'),
(101, '515590', 90, 2, '2019-05-16 11:00:14', '2019-05-16 11:00:14'),
(102, '964698', 90, 2, '2019-05-16 11:00:14', '2019-05-16 11:00:14'),
(103, '191032', 90, 2, '2019-05-16 11:00:14', '2019-05-16 11:00:14'),
(104, '214813', 90, 2, '2019-05-16 11:00:15', '2019-05-16 11:00:15'),
(105, '785026', 90, 2, '2019-05-16 11:00:15', '2019-05-16 11:00:15'),
(106, '701737', 90, 2, '2019-05-16 11:00:15', '2019-05-16 11:00:15'),
(107, '107958', 90, 2, '2019-05-16 11:01:04', '2019-05-16 11:01:04'),
(108, '968220', 90, 2, '2019-05-16 11:01:04', '2019-05-16 11:01:04'),
(109, '100837', 90, 2, '2019-05-16 11:01:04', '2019-05-16 11:01:04'),
(110, '345283', 90, 2, '2019-05-16 11:01:04', '2019-05-16 11:01:04'),
(111, '911168', 90, 2, '2019-05-16 11:01:04', '2019-05-16 11:01:04'),
(112, '624370', 90, 2, '2019-05-16 11:01:05', '2019-05-16 11:01:05'),
(113, '587592', 90, 2, '2019-05-16 11:01:05', '2019-05-16 11:01:05'),
(114, '523909', 90, 2, '2019-05-16 11:01:05', '2019-05-16 11:01:05'),
(115, '654947', 90, 2, '2019-05-16 11:18:28', '2019-05-16 11:18:28'),
(116, '665686', 90, 2, '2019-05-17 01:06:51', '2019-05-17 01:06:51'),
(117, '671547', 90, 2, '2019-05-17 01:06:52', '2019-05-17 01:06:52'),
(118, '137636', 97, 2, '2019-05-17 01:40:37', '2019-05-17 01:40:37'),
(119, '276941', 97, 2, '2019-05-17 01:40:43', '2019-05-17 01:40:43'),
(120, '447643', 43, 2, '2019-05-17 15:27:42', '2019-05-17 15:27:42'),
(121, '859150', 43, 2, '2019-05-17 15:27:47', '2019-05-17 15:27:47'),
(122, '592816', 43, 2, '2019-05-17 15:28:05', '2019-05-17 15:28:05'),
(123, '119900', 43, 2, '2019-05-17 15:28:10', '2019-05-17 15:28:10'),
(124, '273220', 43, 2, '2019-05-17 15:30:12', '2019-05-17 15:30:12'),
(131, '248511', 48, 5, '2019-05-22 03:53:01', '2019-05-22 03:53:01'),
(130, '058869', 90, 5, '2019-05-21 02:15:19', '2019-05-21 02:15:19'),
(129, '165865', 90, 5, '2019-05-21 02:15:14', '2019-05-21 02:15:14'),
(128, '460179', 43, 2, '2019-05-17 17:12:55', '2019-05-17 17:12:55'),
(132, '714280', 63, 5, '2019-05-22 04:43:33', '2019-05-22 04:43:33'),
(133, '618105', 119, 5, '2019-05-22 05:41:42', '2019-05-22 05:41:42'),
(134, '773700', 119, 5, '2019-05-22 05:42:09', '2019-05-22 05:42:09'),
(135, '697930', 119, 5, '2019-05-22 05:42:17', '2019-05-22 05:42:17'),
(136, '964897', 119, 5, '2019-05-22 05:42:19', '2019-05-22 05:42:19'),
(137, '803971', 141, 5, '2019-05-22 09:09:29', '2019-05-22 09:09:29'),
(138, '868079', 141, 5, '2019-05-22 09:09:34', '2019-05-22 09:09:34'),
(139, '458307', 141, 5, '2019-05-22 09:09:35', '2019-05-22 09:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `kbv_missions`
--

DROP TABLE IF EXISTS `kbv_missions`;
CREATE TABLE IF NOT EXISTS `kbv_missions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=350 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `kbv_missions`
--

TRUNCATE TABLE `kbv_missions`;
--
-- Dumping data for table `kbv_missions`
--

INSERT INTO `kbv_missions` (`id`, `product_id`, `product_name`, `points`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'E6095990-3A87-48A9-9B11-02A4B4943E74', 'Camera quan sát IP 2.0mp', 154, 'active', NULL, '2019-04-17 01:44:47', '2019-05-15 06:55:21'),
(8, '9C3F0D2A-CB8C-4D57-B4B9-C1659A7726DB', 'CAMERA IP 2011N3', 109, 'active', NULL, '2019-04-29 01:20:15', '2019-05-15 06:56:50'),
(9, '93721AF1-80DF-4C45-80AE-B110FD36B3BB', 'Camera thân lớn CVI 2.0mp KX-2003C4', 85, 'active', NULL, '2019-04-29 01:20:37', '2019-05-15 06:59:09'),
(11, '22A49A47-233C-4F40-857B-38B876C8D0C4', 'Camera thân 2.0mp KX-2003N2', 159, 'active', NULL, '2019-05-15 04:17:24', '2019-05-15 07:00:08'),
(12, 'E6C644E5-E244-463A-A897-1577A1105790', 'Camera dome 1.0MP KX-1004C4NN noname', 90, 'active', NULL, '2019-05-15 04:22:01', '2019-05-15 06:31:12'),
(13, '99E3D002-642F-46C5-956C-284E663EA6AC', 'Đầu ghi hình 4 kênh KX-4K8104N2', 179, 'active', NULL, '2019-05-15 06:33:21', '2019-05-15 06:35:50'),
(14, '6D541B13-2FA4-4836-8765-AD2E187B440B', 'Camera dome 1.0mp KX-1004C4', 29, 'active', NULL, '2019-05-15 07:09:19', '2019-05-15 07:09:19'),
(15, '8AEB9A7B-0C2C-45A8-9625-1EB1CC8D42AF', 'Camera thân 1.0mp KX-1003C4', 33, 'active', NULL, '2019-05-15 07:13:59', '2019-05-15 07:13:59'),
(16, '6E2A6297-F510-48FC-83B9-B9F8E47A2259', 'Camera dome 4in1, 1.0mp KX-1002C4', 37, 'active', NULL, '2019-05-15 07:17:26', '2019-05-15 07:17:26'),
(17, '810A7B96-5BDB-479A-9C1F-5F5B6BFBDF70', 'Camera thân 4in1, 1.0mp KX-1001C4', 37, 'active', NULL, '2019-05-15 07:20:47', '2019-05-15 07:20:47'),
(18, '54F7B1BF-B667-4F0A-A683-AD753E652C76', 'Camera dome sắt CVI 1.0mp KX-1001S4', 38, 'active', NULL, '2019-05-15 07:22:02', '2019-05-15 07:22:02'),
(19, '852ED134-DEEF-4C65-9F88-49DD1737C030', 'Camera dome sắt CVI 1.0mp KX-1002SX4', 38, 'active', NULL, '2019-05-15 07:24:01', '2019-05-15 07:24:01'),
(20, '5018D370-6454-4C77-A3BF-66C0493CCE20', 'Camera dome 1.0mp KX-1011S4', 42, 'active', NULL, '2019-05-15 07:25:04', '2019-05-15 07:25:04'),
(21, '79B9E3B1-394B-4E47-922F-723F6011D574', 'Camera dome 1.0mp KX-1012S4', 42, 'active', NULL, '2019-05-15 07:25:30', '2019-05-15 07:25:30'),
(22, 'B2B61498-D21B-4C94-BE6F-EFE3E0ECC7D0', 'Camera thân CVI 1.3 KX-1301C', 41, 'active', NULL, '2019-05-15 07:26:32', '2019-05-15 07:26:32'),
(23, '3F5EA312-E6E7-4F70-836C-E7925714A237', 'Camera dome CVI 1.3mp KX-1302C', 41, 'active', NULL, '2019-05-15 07:28:29', '2019-05-15 07:28:29'),
(24, 'AF4515B6-2ACE-4EEC-A2AD-D752600F1580', 'Camera thân lớn  CVI 1.3mp KX-1303C4', 68, 'active', NULL, '2019-05-15 07:30:12', '2019-05-15 07:30:12'),
(25, 'FFC3E2DA-3577-4DA7-9914-D368FCB42B16', 'Camera thân lớn CVI 1.3mp KX-1305C4', 105, 'active', NULL, '2019-05-15 07:32:18', '2019-05-15 07:32:18'),
(26, '05B07751-B87E-4240-8336-7BD8FA84B793', 'Camera dome 2.0mp KX-2112C4', 40, 'active', NULL, '2019-05-15 07:36:01', '2019-05-15 07:36:01'),
(27, '41C284C1-C9D2-4BDE-9F88-13DB7B912F3B', 'Camera thân 2.0mp KX-2111C4', 40, 'active', NULL, '2019-05-15 07:37:04', '2019-05-15 07:37:04'),
(28, '2F965A3F-E46E-468C-84C8-64B73E45BCEC', 'Camera thân 2.0mp KX-2011C4', 46, 'active', NULL, '2019-05-15 07:37:34', '2019-05-15 07:37:34'),
(29, 'A09034EF-1438-4C32-AC18-3EDE053C8599', 'Camera dome 2.0mp KX-2012C4', 46, 'active', NULL, '2019-05-15 07:38:10', '2019-05-15 07:38:10'),
(30, 'A8967DDB-4BF7-43B0-88D1-2FAB3513E5FE', 'Camera thân CVI 2.0mp KX-2001C4', 53, 'active', NULL, '2019-05-15 07:39:29', '2019-05-15 07:39:29'),
(31, '5C743D45-3D0F-479A-BA86-59B828BCEAEA', 'Camera dome CVI 2.0mp KX-2002C4', 53, 'active', NULL, '2019-05-15 07:40:20', '2019-05-15 07:40:20'),
(32, '735D8014-A42A-4496-B4FE-98716890FDA3', 'Camera thân 2.0mp KX-2011S4', 51, 'active', NULL, '2019-05-15 07:41:02', '2019-05-15 07:41:02'),
(33, '1CA1451E-D771-4DFF-8AF3-E05C4AE74FC2', 'Camera dome 2.0mp KX-2012S4', 50, 'active', NULL, '2019-05-15 07:41:46', '2019-05-15 07:41:46'),
(34, '356A0BFB-4346-4712-971D-563CFF41083E', 'CAMERA 2.0 CVI', 57, 'active', NULL, '2019-05-15 07:42:37', '2019-05-15 07:42:37'),
(35, '1413A1C3-3942-427F-AC5A-FD6BDDE51DB9', 'Camera thân 2.0mp KX-2013S4', 59, 'active', NULL, '2019-05-15 07:43:16', '2019-05-15 07:43:16'),
(36, '549EF0CA-F825-4C61-B210-94FF6B5A334E', 'Camera dome sắt CVI 2.0mp KX-2002S4', 64, 'active', NULL, '2019-05-15 07:44:48', '2019-05-15 07:44:48'),
(37, '8AE6E3EE-EDC6-459C-B946-2B88293CEA06', 'CAMERA THAN 2.0 CVI', 64, 'active', NULL, '2019-05-15 07:45:13', '2019-05-15 07:45:13'),
(38, 'A486CA09-1174-4B0A-AFA5-6AF598258201', 'Camera dome CVI 2.0mp KX-2004C4', 72, 'active', NULL, '2019-05-15 07:49:41', '2019-05-15 07:49:41'),
(39, 'AC65ABBE-E14E-4499-9996-6FAAF72990EC', 'Camera dome 2.0mp KX-2004CA', 78, 'active', NULL, '2019-05-15 07:50:39', '2019-05-15 07:50:39'),
(40, 'D3930904-BDD0-490B-92D6-AF9C533351AE', 'Camera thân 2.0mp KX-2005C4', 149, 'active', NULL, '2019-05-15 07:51:32', '2019-05-15 07:51:32'),
(41, '0E884109-9A39-42F9-A31A-9B19E119F134', 'Camera thân 2.0mp KX-2001C.PIR', 74, 'active', NULL, '2019-05-15 07:52:10', '2019-05-15 07:52:10'),
(42, '0146E0F1-8886-42DC-8438-3F72339547BA', 'Camera thân 4.0mp KX-4001C.PIR', 99, 'active', NULL, '2019-05-15 07:54:17', '2019-05-15 07:54:17'),
(43, '9BB0A150-D6AC-4382-BCFC-D91116E2F86D', 'Camera thân 2.1mp KX-NB2005MC22', 232, 'active', NULL, '2019-05-15 07:55:41', '2019-05-15 07:55:41'),
(44, 'AEA2110A-AD8A-4203-B7C0-E7FC30204692', 'Camera thân 2.0mp KX-S2003C4', 99, 'active', NULL, '2019-05-15 07:56:17', '2019-05-15 07:56:17'),
(45, '95378986-B0BF-411A-B9C0-C7DDD0F480E6', 'Camera dome 2.0mp KX-S2004CA4', 92, 'active', NULL, '2019-05-15 07:59:01', '2019-05-15 07:59:01'),
(46, '18643CF3-4354-4E82-8D4B-5394436088FE', 'Camera thân 2.0mp KX-S2005C4', 148, 'active', NULL, '2019-05-15 08:01:18', '2019-05-15 08:01:18'),
(47, 'B30C9ADE-B866-47F8-BAEF-A7E9197A0143', 'Camera dome 2.0mp  KX-S2002C4', 72, 'active', NULL, '2019-05-15 08:01:40', '2019-05-15 08:01:40'),
(48, '6CB632EF-0EE7-4AE2-814E-A1B6A1310FA1', 'Camera thân 2.0mp KX-S2001C4', 76, 'active', NULL, '2019-05-15 08:02:30', '2019-05-15 08:02:30'),
(49, '1C0F1F9D-C010-4CD5-8186-AF9EA853A2BA', 'Camera thân 2.0mp KX-S2001CA4', 89, 'active', NULL, '2019-05-15 08:02:59', '2019-05-15 08:02:59'),
(50, '2DCABFD1-5876-427E-8BD3-8DAAB7A57FDA', 'Camera thân 4.0mp KX-2K11CP', 68, 'active', NULL, '2019-05-15 08:04:17', '2019-05-15 08:04:17'),
(51, '09A91C8F-42EF-41F8-B32F-48823CC773B9', 'Camera dome 4.0mp KX-2K12CP', 68, 'active', NULL, '2019-05-15 08:05:02', '2019-05-15 08:05:02'),
(52, 'D771EEB3-C2F8-40F2-9578-3AFD8EC742C4', 'Camera thân 4.1mp  KX-2K11C', 75, 'active', NULL, '2019-05-15 08:05:27', '2019-05-15 08:05:27'),
(53, '3F3C6029-386B-403B-91B9-976D9B93CD7F', 'Camera dome 4.1mp KX-2K12C', 75, 'active', NULL, '2019-05-15 08:06:42', '2019-05-15 08:06:42'),
(54, '6FFE0B46-B724-49AB-AD40-0BD9E25EB232', 'Camera thân 4.1mp KX-2K13C', 104, 'active', NULL, '2019-05-15 08:07:12', '2019-05-15 08:07:12'),
(55, 'A4D052B8-FA1E-4D35-8EA6-49B17BE01BF7', 'Camera dome 4.1mp KX-2K14C', 98, 'active', NULL, '2019-05-15 08:08:54', '2019-05-15 08:08:54'),
(56, 'AD660179-73DD-4E1C-AC1C-5ACC6A831765', 'Camera thân 4.0mp KX-2K15MC', 159, 'active', NULL, '2019-05-15 08:09:27', '2019-05-15 08:09:27'),
(57, '25DA4E58-2F6A-4D1C-924A-BEFC28D519FF', 'Camera dome 4.1 mp KX-2K14CA', 117, 'active', NULL, '2019-05-15 08:09:57', '2019-05-15 08:09:57'),
(58, '1193EB5E-6FF0-41EE-A6EA-64D0AA2D4F74', 'Camera dome 8.0mp KX-4K04MC', 595, 'active', NULL, '2019-05-15 08:11:50', '2019-05-15 08:11:50'),
(59, '07CA885D-F630-4685-A3C1-B7C2E02D377E', 'Camera thân 8.0mp KX-4K05MC', 595, 'active', NULL, '2019-05-15 08:12:23', '2019-05-15 08:12:23'),
(60, 'EE33208D-734A-424D-ADD2-587F1F1B46F4', 'Camera thân 8.0 KX-4K01C4', 190, 'active', NULL, '2019-05-15 08:13:26', '2019-05-15 08:13:26'),
(61, '2FC3D8E5-950D-477E-859C-657C87C18EC4', 'Camera dome 8.0 KX-4K02C4', 190, 'active', NULL, '2019-05-15 08:14:05', '2019-05-15 08:14:05'),
(62, 'A37DF6A6-30EA-462E-920D-74D0AE31BBF1', 'Đầu ghi 4 kênh KX-7104SD6', 107, 'active', NULL, '2019-05-15 08:16:42', '2019-05-15 08:16:42'),
(63, '7931F25D-4C96-48A1-BC0A-8FA767849127', 'Đầu ghi 8 kênh KX-7108SD6', 149, 'active', NULL, '2019-05-15 08:45:27', '2019-05-15 08:45:27'),
(64, '35E5FCB6-F00F-44F3-907C-2285CCC38DA7', 'Đầu ghi 4 kênh KX-7104TH1', 138, 'active', NULL, '2019-05-15 08:46:55', '2019-05-15 08:46:55'),
(65, 'A57E8BDF-536E-4F3C-BD01-99E62B372011', 'Đầu ghi 8 kênh  KX-7108TH1', 179, 'active', NULL, '2019-05-15 08:47:50', '2019-05-15 08:47:50'),
(66, 'D6D88FD0-628F-45DF-A65E-3D735DF89FB9', 'Main đầu ghi hình 16 kênh KX-7116H1', 253, 'active', NULL, '2019-05-15 08:48:51', '2019-05-15 08:48:51'),
(67, 'DD796F19-4D69-4B95-B2ED-3BD4B13A1944', 'Đầu ghi 16 kênh KX-7216H1', 407, 'active', NULL, '2019-05-15 08:51:33', '2019-05-15 08:51:33'),
(68, '0A638F04-7C5D-4B00-A899-755D70719C81', 'Đầu ghi 32 kênh KX-7232H1', 610, 'active', NULL, '2019-05-15 08:52:13', '2019-05-15 08:52:13'),
(69, '0305F4A8-92C9-45F4-BC0F-F08D12AD2704', 'Đầu ghi 2.0 4 kênh KX-8104H1', 159, 'active', NULL, '2019-05-15 08:56:15', '2019-05-15 08:56:15'),
(70, '1C333CA7-93CF-49AD-B4EE-9C15253AF96D', 'Đầu ghi 8 kênh KX-8108H1', 249, 'active', NULL, '2019-05-15 09:00:02', '2019-05-15 09:00:02'),
(71, 'DDC61683-EC52-4825-A4AB-01DE542E66C9', 'Đầu ghi 16 kênh KX-8116H1', 448, 'active', NULL, '2019-05-15 09:00:39', '2019-05-15 09:00:39'),
(72, '1B35FDC5-600B-478B-9E47-11100AAF60F5', 'Đầu ghi hình 16 kênh KX-8216H1', 499, 'active', NULL, '2019-05-15 09:01:13', '2019-05-15 09:01:13'),
(73, 'DE780685-5A9D-4101-B268-59043D1142F7', 'Đầu ghi hình 32 kênh KX-8232H1', 810, 'active', NULL, '2019-05-15 09:02:02', '2019-05-15 09:02:02'),
(74, 'CD85DC0C-B2B2-4BF0-AD2B-904185280F54', 'Đầu ghi hình 32 kênh KX-8832H1', 2340, 'active', NULL, '2019-05-15 09:04:15', '2019-05-15 09:04:15'),
(75, 'A58892CE-EEA9-4C73-83DF-85544974414C', 'Đầu ghi 16 kênh  KX 8416D5', 890, 'active', NULL, '2019-05-15 09:04:43', '2019-05-15 09:04:43'),
(76, '8F1F060B-5FAB-4779-AAAB-0081A81B264B', 'Đầu ghi hình 16 kênh KX 8816D5', 1090, 'active', NULL, '2019-05-15 09:06:32', '2019-05-15 09:06:32'),
(77, '241E4245-B3DA-4E3A-9156-3CB230588BE9', 'Đầu ghi 32 kênh KX-8432D5', 1480, 'active', NULL, '2019-05-15 09:07:07', '2019-05-15 09:07:07'),
(78, '8C89998C-4D59-4C91-A65F-DFD63DE67A3C', 'Đầu ghi 4 kênh KX-2K8104H1', 235, 'active', NULL, '2019-05-15 09:07:42', '2019-05-15 09:07:42'),
(79, '9CE7F7EC-1CA2-48AA-8357-2F484B8FE46E', 'Đầu ghi 8 kênh KX-2K8108H1', 330, 'active', NULL, '2019-05-15 09:10:06', '2019-05-15 09:10:06'),
(80, '578FCC27-25B7-4EDD-9870-FA393106C87F', 'Đầu ghi 16 kênh KX-2K8216H1', 630, 'active', NULL, '2019-05-15 09:10:27', '2019-05-15 09:10:27'),
(81, '0D9C55FF-106C-44EF-9911-74F03311A0CA', 'Đầu ghi hinh 4 kênh KX-4K8104H1', 250, 'active', NULL, '2019-05-15 09:10:53', '2019-05-15 09:10:53'),
(82, '0152DF2C-5C7E-4810-BFB6-81B16E940B60', 'Đầu ghi hinh 8 kênh KX-4K8108H1', 350, 'active', NULL, '2019-05-15 09:11:33', '2019-05-15 09:11:33'),
(83, '709D1EE0-11FF-410C-A2BE-C03E59FDF4A9', 'Camera thân 1.0mp KX-1011N', 76, 'active', NULL, '2019-05-15 09:12:05', '2019-05-15 09:12:05'),
(84, '0C15D6A4-8A49-4DED-A922-6C189EC10260', 'Camera dome 1.0mp KX-1012N', 76, 'active', NULL, '2019-05-15 09:12:38', '2019-05-15 09:12:38'),
(85, 'C9338393-29D8-4A86-BF31-2964D0A30A88', 'Camera thân IP 1.0mp KX-1001N', 87, 'active', NULL, '2019-05-15 09:13:12', '2019-05-15 09:13:12'),
(86, 'BA5AF94F-C73F-4BBC-AD72-0D58552BDF0E', 'Camera dome IP 1.0mp KX-1002N', 87, 'active', NULL, '2019-05-15 09:13:43', '2019-05-15 09:13:43'),
(87, '76522506-4631-4251-B553-A32D887D9166', 'Camera thân 3.0mp KX-3011N', 115, 'active', NULL, '2019-05-15 09:14:08', '2019-05-15 09:14:08'),
(88, '984E7805-B69C-4354-900D-3613613E57C4', 'Camera dome 3.0mp KX-3012N', 115, 'active', NULL, '2019-05-15 09:14:26', '2019-05-15 09:14:26'),
(89, '425FE235-FB48-4D38-8110-460550324CF4', 'Camera thân IP 3.0 KX-3001N', 145, 'active', NULL, '2019-05-15 09:14:57', '2019-05-15 09:14:57'),
(90, '1A347B89-6599-4E1D-94F3-630582C7BCED', 'Camera DOME IP 3.0 KX-3002N', 145, 'active', NULL, '2019-05-15 09:15:19', '2019-05-15 09:15:19'),
(91, 'E7B25378-0E15-4CB8-9FE7-EBBA11E13D5F', 'Camera DOME IP 3.0 KX-3004AN', 285, 'active', NULL, '2019-05-15 09:16:47', '2019-05-15 09:16:47'),
(92, '423B6B39-0A4F-498E-9D70-1457AB9C5AB1', 'Camera thân 2.0mp KX-2011N2', 99, 'active', NULL, '2019-05-15 09:17:13', '2019-05-15 09:17:13'),
(93, '07E814A4-A495-4E46-A14B-29F50D4986CE', 'Camera dome 2.0mp KX-2012N2', 99, 'active', NULL, '2019-05-15 09:17:37', '2019-05-15 09:17:37'),
(94, '7765B31D-AEA0-45B2-A351-E5A407110FB7', 'Camera dome 2.0mp KX-2012N3', 109, 'active', NULL, '2019-05-15 09:18:41', '2019-05-15 09:18:41'),
(95, '44634C56-6165-40FE-A1E8-C1469AFD2C52', 'Camera thân 2.0mp KX-2001N2', 139, 'active', NULL, '2019-05-15 09:19:26', '2019-05-15 09:19:26'),
(96, '2C5BD854-7AA8-4EAD-ADFB-F3B8C443B6F2', 'CAMERA DOME 2.0MP KX-2002N2', 139, 'active', NULL, '2019-05-15 09:19:45', '2019-05-15 09:19:45'),
(97, '469F0516-4D98-4027-BB2A-C46F3C70F4AC', 'CAMERA THAN 2.0 IP', 149, 'active', NULL, '2019-05-15 09:21:38', '2019-05-15 09:21:38'),
(98, '08F2DB72-E1C7-4617-88AD-7492A399A9F8', 'Camera dome 2.0mp KX-2002N3', 149, 'active', NULL, '2019-05-15 09:21:55', '2019-05-15 09:21:55'),
(99, '327697C3-FF87-4561-8725-EBEB6873BD02', 'Camera dome 2.0mp KX-2022N2', 159, 'active', NULL, '2019-05-15 09:22:14', '2019-05-15 09:22:14'),
(100, '44A49042-B7B0-41DD-BEE4-EB924ECF12B2', 'Camera thân 2.0mp KX-2003iAN', 240, 'active', NULL, '2019-05-15 09:24:40', '2019-05-15 09:24:40'),
(101, '6C05D60B-8B42-46F0-81CC-BC0AF114AA34', 'Camera dome 2.0mp KX-2004iAN', 240, 'active', NULL, '2019-05-15 09:24:54', '2019-05-15 09:24:54'),
(102, '7699CCD5-4E42-465D-B505-7BCF9894B947', 'Camera thân 2.0mp KX-2005N2', 295, 'active', NULL, '2019-05-15 09:25:25', '2019-05-15 09:25:25'),
(103, '4E4CA444-04C9-4A0B-92C2-85BFB2974DE2', 'Camera thân 2.0mp KX-2001SN', 590, 'active', NULL, '2019-05-15 09:26:33', '2019-05-15 09:26:33'),
(104, 'E9D2C302-C087-4F23-8DC8-3AA582F53683', 'Camera thân 4.0mp KX-4011N2', 165, 'active', NULL, '2019-05-15 09:26:52', '2019-05-15 09:26:52'),
(105, '8290B0A2-9C73-45C9-B9EA-0D0F40149C78', 'CAMERA IP DOME 4.0', 165, 'active', NULL, '2019-05-15 09:27:32', '2019-05-15 09:27:32'),
(106, '6629731E-F21B-4010-A0AF-DC5FB4705E22', 'Camera thân 4.0mp KX-4001N2', 195, 'active', NULL, '2019-05-15 09:27:53', '2019-05-15 09:27:53'),
(107, '4EF6F7FE-63D0-4DF5-8358-3071189B87AD', 'Camera dome 4.0mp KX-4002N2', 195, 'active', NULL, '2019-05-15 09:28:16', '2019-05-15 09:28:16'),
(108, '0883999B-8418-49C6-9293-0263C46A08CB', 'Camera dome 4.0mp KX-4002iAN', 279, 'active', NULL, '2019-05-15 09:28:45', '2019-05-15 09:28:45'),
(109, 'B8C30607-1DBA-4D3D-AE6E-21B06B9C6D6F', 'Camera dome 4.0mp KX-4002WAN', 209, 'active', NULL, '2019-05-15 09:29:06', '2019-05-15 09:29:06'),
(110, '1465DEC9-4E5C-406A-8EBD-E3DADF48766A', 'Camera thân 4.0mp KX-4003iN', 295, 'active', NULL, '2019-05-15 09:29:24', '2019-05-15 09:29:24'),
(111, 'AFE8559F-C8C4-42C7-9C72-25CFBF8DB7E8', 'Camera thân 4.0mp KX-4005N2', 329, 'active', NULL, '2019-05-15 09:29:52', '2019-05-15 09:29:52'),
(112, 'BA982A0F-10AC-47D3-9366-98232EF349CD', 'Camera dome 4.0mp KX-4004iMN', 529, 'active', NULL, '2019-05-15 09:30:12', '2019-05-15 09:30:12'),
(113, '0437C64F-8EBD-4204-8C9E-F519691CEF72', 'Camea thân 4.0mp KX-4005iMN', 529, 'active', NULL, '2019-05-15 09:30:34', '2019-05-15 09:30:34'),
(114, '0A99613C-935B-4179-930B-C5EC51723C2C', 'Camera dome 8.0mp KX-8002iN', 409, 'active', NULL, '2019-05-15 09:30:57', '2019-05-15 09:30:57'),
(115, 'CDBDCD8D-E10D-420D-8C8F-B6D40C897645', 'Camera thân 8.0mp KX-8005iN', 409, 'active', NULL, '2019-05-15 09:31:16', '2019-05-15 09:31:16'),
(116, 'DBAC42FA-B510-43FD-AB6E-ED2A7E95C989', 'Camera dome 8.0mp KX-8004iMN', 630, 'active', NULL, '2019-05-15 09:31:38', '2019-05-15 09:31:38'),
(117, '414E81CC-E7AB-47AC-BD3E-9B41AE6E4C91', 'Camera thân 8.0mp KX-8005iMN', 630, 'active', NULL, '2019-05-15 09:31:59', '2019-05-15 09:31:59'),
(118, '2F4999AC-5F47-49F0-A20C-D644022C87E5', 'Camera thân SMART IP 3.0MP KX-3005MSN', 940, 'active', NULL, '2019-05-15 09:33:46', '2019-05-15 09:33:46'),
(119, 'B87DBCF8-2A6B-4265-8166-830BD2044A3A', 'Camera DOME SMART IP 3.0MP KX-3004MSN', 610, 'active', NULL, '2019-05-15 09:34:21', '2019-05-15 09:34:21'),
(120, '2047C39F-AFAC-4441-BC15-0AA134DFA7D2', 'Camera thân SMART IP 2.0MP KX-2005MSN', 890, 'active', NULL, '2019-05-15 09:34:44', '2019-05-15 09:34:44'),
(121, 'C76734BD-CFE4-442A-A419-43301111E875', 'Camera DOME SMART IP 2.0MP KX-2004MSN', 890, 'active', NULL, '2019-05-15 09:34:57', '2019-05-15 09:34:57'),
(122, '31798CAB-7C18-438A-8013-6C98F59CA8C5', 'Camera 360 độ 4.0mp KX-0404FN', 409, 'active', NULL, '2019-05-15 09:35:20', '2019-05-15 09:35:20'),
(123, 'CA5FD9DC-2A03-4D58-BFD7-C690A5D2E5BC', 'Camera 360 SMART IP 5.0MP KX-0504FN( KX-0504FN )', 370, 'active', NULL, '2019-05-15 09:35:37', '2019-05-15 09:35:37'),
(124, 'E039011D-4BBA-43A7-9502-0608906946E5', 'Camera 360 SMART IP 12.0MP KX-1204FN( KX-1204FN )', 1280, 'active', NULL, '2019-05-15 09:35:57', '2019-05-15 09:35:57'),
(126, 'C82325ED-C6DE-4672-AA4E-451276719476', 'Camera IP 6.8MP chuyên dụng dành cho giao thông KX-6808ITN', 5950, 'active', NULL, '2019-05-15 09:36:34', '2019-05-15 09:36:34'),
(127, '4B544BFA-559C-4EBA-8FD3-D7AB6C0BB79B', 'Camera thân 3.0mp KX-3808ITN', 4450, 'active', NULL, '2019-05-15 09:37:01', '2019-05-15 09:37:01'),
(128, 'AF73468A-CE4E-48F3-9948-169EF32355FB', 'ống kính chuyên dụng zoom KX-8020VF', 499, 'active', NULL, '2019-05-15 09:38:00', '2019-05-15 09:38:00'),
(129, 'C9053780-57C4-4B6C-99DB-A89474B56480', 'Đèn Flash KX-16FL', 485, 'active', NULL, '2019-05-15 09:38:54', '2019-05-15 09:38:54'),
(130, 'C3510044-DCEC-4356-B33E-B4DD38117969', 'Thiết bị giám sát tốc độ KX-2501R', 3490, 'active', NULL, '2019-05-15 09:39:58', '2019-05-15 09:39:58'),
(131, 'FD439103-732E-4A4A-8B8B-468A84FBD567', 'Camera dome 1.0mp KX-H10PWN', 119, 'active', NULL, '2019-05-15 09:41:24', '2019-05-15 09:41:24'),
(132, 'EAB116CD-7715-4B3D-AC5A-656116C8ED40', 'Camera dome Home IP 1.3MP KX-H13WN', 107, 'active', NULL, '2019-05-15 09:42:41', '2019-05-15 09:42:41'),
(133, '646B5064-092C-462B-8D82-0695EFDC7494', 'Camera dome Home IP 1.3MP KX-H13PWN', 189, 'active', NULL, '2019-05-15 09:43:19', '2019-05-15 09:43:19'),
(134, '6BEFC573-3958-40A2-AB12-B15094946D18', 'Camera dome Home IP 3.0MP KX-H30WN', 125, 'active', NULL, '2019-05-15 09:43:52', '2019-05-15 09:43:52'),
(135, 'C0B3D719-FFA6-4C45-A9CA-64FD42A60984', 'Camera dome Home IP 3.0MP KX-H30PWN', 215, 'active', NULL, '2019-05-15 09:44:15', '2019-05-15 09:44:15'),
(136, 'D4B1039F-0ABF-41DD-8323-31D4031BE745', 'Camera dome wifi IP 1.3mp KX-1301WN', 139, 'active', NULL, '2019-05-15 09:45:52', '2019-05-15 09:45:52'),
(137, '104538DA-4BE2-48A6-8827-8A0C0E32F916', 'Camera thân wifi IP 1.3mp KX-1302WN', 149, 'active', NULL, '2019-05-15 09:46:15', '2019-05-15 09:46:15'),
(138, '7C02CB72-7020-4F19-B3B1-CEEFB94ADD9A', 'Camera thân IP WIFI 3.0 KX-3001WN', 165, 'active', NULL, '2019-05-15 09:46:47', '2019-05-15 09:46:47'),
(139, 'C1E112F0-44E2-4DF3-9E1F-CDC364CC666A', 'Camera DOME WIFI IP 3.0 KX-3002WN', 165, 'active', NULL, '2019-05-15 09:47:07', '2019-05-15 09:47:07'),
(140, '0C1C370F-EFD6-43E8-94F4-C25B219732D7', 'Camera speed dome 2.0mp KX-2007ePC', 609, 'active', NULL, '2019-05-15 09:47:29', '2019-05-15 09:47:29'),
(141, '0B9D835E-9BFB-4DEE-B09E-DAAABD341281', 'Camera speed dome CVI 2.0mp KX-2007PC', 705, 'active', NULL, '2019-05-15 09:47:53', '2019-05-15 09:47:53'),
(142, '7A533602-4B24-477D-8F25-40C52973B3C6', 'Bàn điều khiển KX-100CK', 340, 'active', NULL, '2019-05-15 09:48:13', '2019-05-15 09:48:13'),
(143, 'C03BD7EE-DD51-4647-92E0-6B2F5ECE2903', 'Camera speed dome IP 2.0MP KX-2008PN', 955, 'active', NULL, '2019-05-15 09:49:11', '2019-05-15 09:49:11'),
(144, '15300FD4-57F7-4840-A189-90100C5E5584', 'Camera speed dome IP 2.0MP KX-2308PN', 1190, 'active', NULL, '2019-05-15 09:49:34', '2019-05-15 09:49:34'),
(145, 'F035C2E2-CD37-426A-9A88-DF52A0940EEF', 'Camera speed dome IP 2.0MP KX-2007PN', 590, 'active', NULL, '2019-05-15 09:49:56', '2019-05-15 09:49:56'),
(146, '33F1D9F2-5A63-4399-A0EF-4F65A3E93B4A', 'Camera speed dome IP 2.0MP KX-2007sPN', 295, 'active', NULL, '2019-05-15 09:50:40', '2019-05-15 09:50:40'),
(147, '893533AF-0A02-447B-A6F9-B8BECAFA9649', 'Camera speed dome IP 2.0MP KX-2007IRPN', 375, 'active', NULL, '2019-05-15 09:51:08', '2019-05-15 09:51:08'),
(148, 'C09313E2-5B72-40CF-A21C-9F4F4AC524DE', 'Bàn điều khiển KX-100NK', 440, 'active', NULL, '2019-05-15 09:51:31', '2019-05-15 09:51:31'),
(149, '1C452D72-54D8-462A-A0EB-3D2672C526C6', 'Camera speed dome IP 2.0MP KX-2308IRSN', 2900, 'active', NULL, '2019-05-15 09:51:53', '2019-05-15 09:51:53'),
(150, '5A5C8A98-027E-4609-8101-69796BD3C1F2', 'Camera speed dome IP 2.0MP KX-2408IRSN', 4400, 'active', NULL, '2019-05-15 09:52:14', '2019-05-15 09:52:14'),
(151, '27D1CC3A-3C52-443A-9C59-7A8040DBDC3E', 'Camera ip speed dome 8.0mp KX-8308IRPN', 3990, 'active', NULL, '2019-05-15 09:52:35', '2019-05-15 09:52:35'),
(152, 'CD17386A-096D-49BB-AEDF-8C476E65978C', 'Đầu ghi IP 4 kênh KX-8104N2', 135, 'active', NULL, '2019-05-15 09:53:44', '2019-05-15 09:53:44'),
(153, 'F1820E95-4170-4A56-AF95-0F8FA2178974', 'Đầu ghi IP 8 kênh KX-8108N2', 153, 'active', NULL, '2019-05-15 09:54:13', '2019-05-15 09:54:13'),
(154, '73E18622-50C2-494B-8502-057CDE1AEBE0', 'Đầu ghi hình 8 kênh KX-4K8108N2', 189, 'active', NULL, '2019-05-15 09:55:38', '2019-05-15 09:55:38'),
(155, 'C46AEE86-0F50-4EFC-BA25-C5AFA10DB695', 'Đầu ghi hình 16 kênh KX-4K8116N2', 279, 'active', NULL, '2019-05-15 10:01:05', '2019-05-15 10:01:05'),
(156, '256128C8-B424-4433-A117-6A8DB72EE173', 'ĐẦU GHI HÌNH IP 16 KÊNH KX-4K8216N2', 399, 'active', NULL, '2019-05-15 10:01:49', '2019-05-15 10:01:49'),
(157, '86B6CB0E-AF76-4601-A67C-09AD5B3639F4', 'Đầu ghi hình 16 kênh 4K8416N2', 590, 'active', NULL, '2019-05-15 10:02:12', '2019-05-15 10:02:12'),
(158, 'C3F0ABD7-9FB2-4F7F-9779-FA8278656E13', 'Đầu ghi hình 16 kênh KX-4K8816N2', 995, 'active', NULL, '2019-05-15 10:02:43', '2019-05-15 10:02:43'),
(159, 'E448A3A5-715B-4821-AF83-4456FFC3F061', 'Đầu ghi 16 kênh KX-4K8816N3', 1275, 'active', NULL, '2019-05-15 10:03:05', '2019-05-15 10:03:05'),
(160, 'CD3DEACD-0552-410B-ACC0-D5B28EA06C36', 'Đầu ghi 32 kênh KX-4K8232N2', 499, 'active', NULL, '2019-05-15 10:03:43', '2019-05-15 10:03:43'),
(161, 'F1D9C51A-B9A4-4C4D-A84A-6F181F18705E', 'Đầu ghi hình 32 kênh KX-4K8432N2', 781, 'active', NULL, '2019-05-15 10:04:52', '2019-05-15 10:04:52'),
(162, '7A105CC8-57B3-4142-BE9A-2B21B8A55457', 'Đầu ghi hình 32 kênh KX-4K8832N2', 1150, 'active', NULL, '2019-05-15 10:05:48', '2019-05-15 10:05:48'),
(163, '6D6D4700-A7DA-458F-ABC6-D98AFA7150A4', 'Đầu ghi hình 32 kênh KX-4K8832N3', 1590, 'active', NULL, '2019-05-15 10:06:10', '2019-05-15 10:06:10'),
(164, '036BB874-26C7-42EE-A0C2-CD74A22FC8DE', 'Đầu ghi hình 32 kênh KX-4K8832N4', 1990, 'active', NULL, '2019-05-15 10:06:58', '2019-05-15 10:06:58'),
(165, 'EAFAA03E-2E9B-4CDD-90E8-05CEF7C328AB', 'Đầu ghi hình KX-4K8864N3', 1690, 'active', NULL, '2019-05-15 10:07:30', '2019-05-15 10:07:30'),
(166, '0522094E-DF5D-4070-8F42-A665CE68E5D5', 'Đầu ghi 4 kênh KX-4K8104PN2', 241, 'active', NULL, '2019-05-15 10:12:51', '2019-05-15 10:12:51'),
(167, '520F09F7-53A7-46B0-A5E4-9169725F5AC0', 'Đầu ghi 8 kênh KX-4K8108PN2', 349, 'active', NULL, '2019-05-15 10:13:37', '2019-05-15 10:13:37'),
(168, 'CA78795D-6222-45BC-91A3-0B6A981983C5', 'Đầu ghi IP WIFI 4 kênh KX-8104WN2', 302, 'active', NULL, '2019-05-15 10:14:00', '2019-05-15 10:14:00'),
(169, '0CC92BA2-C0CE-4971-BE66-50B7203A8F4A', 'Switch 4 cổng KX-SW04iP1', 229, 'active', NULL, '2019-05-15 10:15:36', '2019-05-15 10:15:36'),
(170, '0D344293-9F10-4A19-8652-7EE7087F9A9B', 'POE SWITCH 4 KÊNH', 83, 'active', NULL, '2019-05-15 10:16:03', '2019-05-15 10:16:03'),
(171, '52EA7AAF-2C3D-415A-A7C4-2C99B3F0A122', 'POE SWITCH 8 KÊNH', 165, 'active', NULL, '2019-05-15 10:16:25', '2019-05-15 10:16:25'),
(172, '0E97AE4E-9356-41AE-BF07-F4402289B79D', 'Switch 16 cổng KX-SW16SFP2', 449, 'active', NULL, '2019-05-15 10:17:21', '2019-05-15 10:17:21'),
(173, '72CBC44A-D875-45FE-A12A-0112A96412EB', 'Switch 24 cổng KX-SW24SFP2', 550, 'active', NULL, '2019-05-15 10:17:46', '2019-05-15 10:17:46'),
(179, 'E687615B-36E1-4BB4-A59D-C3A7AE0EB2B3', 'Nút nhấn báo động khẩn', 62, 'active', NULL, '2019-05-15 10:24:56', '2019-05-15 10:24:56'),
(181, '747B8064-3081-4D58-9D45-FC6A0A6CE580', 'Cảm biến hồng ngoại không dây KX-PIR12-w', 69, 'active', NULL, '2019-05-15 10:27:24', '2019-05-15 10:27:24'),
(182, '75A1D8CF-B2C4-423B-9C1E-149B0B4B07BB', 'Cảm biến cửa từ không dây KX-MD25-w', 59, 'active', NULL, '2019-05-15 10:27:43', '2019-05-15 10:27:43'),
(183, '64A6B80B-8C42-446D-A132-E62D56C096A1', 'Chuông báo động không dây KX-Si10-w', 82, 'active', NULL, '2019-05-15 10:28:14', '2019-05-15 10:28:14'),
(184, '57BD6A40-4C34-42BD-AAB2-8DD3AFD78AFE', 'Trung tâm báo động KX-AL02-W', 710, 'active', NULL, '2019-05-15 10:28:39', '2019-05-15 10:28:39'),
(185, '40FF56B7-9F0C-4D22-87CF-83490567DF38', 'Đầu đọc thẻ kết hợp mật khẩu KX-DR02', 170, 'active', NULL, '2019-05-15 10:29:13', '2019-05-15 10:29:13'),
(188, '0F0D6245-F156-4D50-A17B-366A302EDF4B', 'Khóa từ chốt cửa đơn', 110, 'active', NULL, '2019-05-15 10:30:16', '2019-05-15 10:30:16'),
(189, '17B0EA6A-89DD-4245-B186-493D2AB84C12', 'Màn hình giám sát IP', 290, 'active', NULL, '2019-05-15 10:30:41', '2019-05-15 10:30:41'),
(190, '9D0B3E35-AB2A-4263-95B6-504788E60A7B', 'Màn hình IP WIFI KB-VDP01HWN', 320, 'active', NULL, '2019-05-15 10:31:03', '2019-05-15 10:31:03'),
(191, 'F2B18700-2525-40BD-96DA-59446A5B50B0', 'Chuông cửa IP WIFI KB-VDP01GWN', 199, 'active', NULL, '2019-05-15 10:31:22', '2019-05-15 10:31:22'),
(192, '8BAAC61D-3B8D-46D9-BB1D-7BB917053652', 'Chuông cửa IP', 248, 'active', NULL, '2019-05-15 10:31:53', '2019-05-15 10:31:53'),
(193, '6EE85072-E88D-4A5B-BFC8-B9AE665B3D19', 'Chuông cửa IP', 263, 'active', NULL, '2019-05-15 10:32:16', '2019-05-15 10:32:16'),
(195, '5977FC17-183A-4776-A10F-ADA0B285401A', 'Khóa thông minh dành cho nhà màu đỏ', 690, 'active', NULL, '2019-05-16 01:13:03', '2019-05-16 01:13:03'),
(196, 'BF71B106-4CDF-472D-BFC4-CE8E76D65C16', 'Khóa cửa thông minh cho nhà màu bạc', 690, 'active', NULL, '2019-05-16 01:13:30', '2019-05-16 01:13:30'),
(197, '5776F6CD-762E-4FB9-9734-E2B99A905BDA', 'Khóa thông minh dành cho nhà màu đen', 690, 'active', NULL, '2019-05-16 01:13:55', '2019-05-16 01:13:55'),
(198, '6EC30188-8F9F-47BE-8959-A15CA345AF80', 'Khóa cửa thông minh cho nhà màu đỏ', 1190, 'active', NULL, '2019-05-16 01:14:38', '2019-05-16 01:14:38'),
(199, 'EE4E82E0-703C-4333-ACE9-481BC1C62985', 'Khóa thông minh dành cho nhà màu bạc', 1190, 'active', NULL, '2019-05-16 01:15:00', '2019-05-16 01:15:00'),
(200, '482CE530-F822-4C1E-9E5B-AC0D95665E63', 'Khóa thông minh dành cho nhà màu đen', 1190, 'active', NULL, '2019-05-16 01:15:25', '2019-05-16 01:15:25'),
(201, 'F7F2F5C6-7CCC-4EBF-8DA4-3BD9CDCB625E', 'Hotel smartlock', 250, 'active', NULL, '2019-05-16 01:15:55', '2019-05-16 01:15:55'),
(202, '30D321B7-658B-4A20-A805-B93BBDBE9217', 'Camera dome 2.0Mp - KH-4C2002', 79, 'active', NULL, '2019-05-16 01:22:22', '2019-05-16 01:22:22'),
(203, 'B542B1E9-AD80-4467-836F-B3A22608B222', 'Camera thân 2.0Mp - KH-4C2001', 83, 'active', NULL, '2019-05-16 01:23:01', '2019-05-16 01:23:01'),
(204, '9720ABFB-C762-4758-B882-77D1DDC37C7E', 'Camera dome 2.0Mp - KH-4C2004', 97, 'active', NULL, '2019-05-16 01:23:22', '2019-05-16 01:23:22'),
(205, '3B59FC34-80EF-46BE-89C1-9B5D29E8168B', 'Camera thân 2.0Mp - KH-4C2003', 99, 'active', NULL, '2019-05-16 01:23:45', '2019-05-16 01:23:45'),
(206, '2D0573C6-6ACD-4512-8E8E-D6E17B33921E', 'Camera thân  2.0Mp - KH-4C2005', 179, 'active', NULL, '2019-05-16 01:24:04', '2019-05-16 01:24:04'),
(207, 'C027DBD3-E5A1-4190-9E2F-C0DE2DB6143A', 'Camera speedome 2.0Mp - KH-PC2007', 840, 'active', NULL, '2019-05-16 01:24:38', '2019-05-16 01:24:38'),
(208, '5322F8F4-0B82-420A-9DC3-7FD4303A2F2B', 'Đầu ghi 4 kênh KH-8104H1', 190, 'active', NULL, '2019-05-16 01:25:22', '2019-05-16 01:25:22'),
(209, 'FA3ACE72-A899-4769-B32E-80EE7F357242', 'ĐẦU GHI HÌNH 8 KÊNH KH-8108H1', 305, 'active', NULL, '2019-05-16 01:25:45', '2019-05-16 01:25:45'),
(210, '9708E023-68FF-4FE2-B9FB-AD281CD2A805', 'Đầu ghi 16 kênh KH-8216H1', 575, 'active', NULL, '2019-05-16 01:26:06', '2019-05-16 01:26:06'),
(211, 'C3B6EE18-1E6B-49FA-913D-735219ED1A0A', 'ĐẦU GHI HÌNH 32 KÊNH KH-8232H1', 1020, 'active', NULL, '2019-05-16 01:26:46', '2019-05-16 01:26:46'),
(212, 'E4447764-8822-42B7-BD49-C87C18D06407', 'Camera thân IP 1.0Mp KH-N1001', 105, 'active', NULL, '2019-05-16 01:27:34', '2019-05-20 08:26:22'),
(213, '8C653BE0-7A33-426E-A6E8-78E539151CE6', 'Camera quan sát IP 1.3mp wifi', 160, 'active', NULL, '2019-05-16 01:28:23', '2019-05-16 01:28:23'),
(214, '98BB12AD-86D1-40A4-AF97-21B3A4CE6468', 'Camera quan sát IP 1.3mp wifi', 175, 'active', NULL, '2019-05-16 01:33:40', '2019-05-16 01:33:40'),
(215, '0384B8C0-2D33-496C-9205-0367C3E507AA', 'Camera quan sát IP 2.0mp', 154, 'active', NULL, '2019-05-16 01:34:06', '2019-05-16 01:34:06'),
(217, '6244BFF9-B587-4EAD-A54A-89328F7D1550', 'Camera quan sát IP 2.0mp', 270, 'active', NULL, '2019-05-16 01:40:57', '2019-05-16 01:40:57'),
(218, 'E1ABDEDF-B9E3-4888-B8FB-F8C2290D1C4F', 'Camera thân 2.0mp KH-N2003iA', 270, 'active', NULL, '2019-05-16 01:41:14', '2019-05-16 01:41:14'),
(220, '5AF591B6-1428-4255-90E1-048AF4312F22', 'Camera quan sát IP 2.0mp', 330, 'active', NULL, '2019-05-16 01:41:52', '2019-05-16 01:41:52'),
(222, '9B9E105E-2D1D-443E-810F-050F497FD3E8', 'Camera quan sát IP 3.0Mp - KH-N3002', 174, 'active', NULL, '2019-05-16 01:42:52', '2019-05-16 01:42:52'),
(223, '3BC1B6D3-9AA4-4EEA-AE95-10AABAB227A3', 'Camera quan sát IP 3.0mp wifi', 225, 'active', NULL, '2019-05-16 01:43:10', '2019-05-16 01:43:10'),
(224, '84110643-3A4F-4DDC-A8B0-2872B1FDF00B', 'Camera quan sát IP 3.0mp wifi', 225, 'active', NULL, '2019-05-16 01:43:50', '2019-05-16 01:43:50'),
(225, 'D46F4D5A-E46A-4913-83CF-B9B4F94320C9', 'Camera quan sát IP 3.0mp', 339, 'active', NULL, '2019-05-16 01:44:09', '2019-05-16 01:44:09'),
(226, '04AFA0CF-4430-4B4C-B20B-56409287F9EE', 'Camera thân 4.0Mp KH-N4001', 238, 'active', NULL, '2019-05-16 01:44:28', '2019-05-16 01:44:28'),
(227, 'B42EEB5F-3387-4982-B53C-EEA64D3F4749', 'Camera dome 4.0Mp - KH-N4002', 238, 'active', NULL, '2019-05-16 01:44:50', '2019-05-16 01:44:50'),
(228, 'D19B7CE5-B17B-444F-80DA-BA46575ACD24', 'Camera thân 4.0Mp - KH-N4003', 340, 'active', NULL, '2019-05-16 01:45:13', '2019-05-16 01:45:13'),
(229, '1F697111-88DD-47E6-B7D5-B3C49C4B96B0', 'CAMERA THÂN 4.0MP', 380, 'active', NULL, '2019-05-16 01:45:32', '2019-05-16 01:45:32'),
(230, '4C4972E3-C6ED-4B32-B9F4-9AB8AE49512A', 'Camera dome 4.0Mp - KH-N4002A', 325, 'active', NULL, '2019-05-16 01:50:29', '2019-05-16 01:50:29'),
(232, '9774DBC9-9FE4-44EE-A33F-BBBF5F32580B', 'CAMERA DOME 8.0MP KX-N8002i', 491, 'active', NULL, '2019-05-16 01:51:25', '2019-05-16 01:51:25'),
(233, '2192C0DE-A86B-4EB1-9BEC-39C5F0ACFC15', 'CAMERA THÂN 8.0MP KX-N8005i', 491, 'active', NULL, '2019-05-16 01:51:43', '2019-05-16 01:51:43'),
(239, '508EFB6E-E31F-4CF3-8834-0A599FDBAFA4', 'Camera Speedome 2.0mp KH-N2008EP', 920, 'active', NULL, '2019-05-16 01:58:10', '2019-05-16 01:58:10'),
(240, '88723E94-1736-4E47-B990-DFC173FFEB61', 'Camera Speedome IP 2.0mp zoom 20x', 1140, 'active', NULL, '2019-05-16 01:58:33', '2019-05-16 01:58:33'),
(243, '42FE47F4-6892-40A1-8632-C3CBF110FD0C', 'Camera Speedome IP 2.0mp zoom 4x', 340, 'active', NULL, '2019-05-16 02:00:12', '2019-05-16 02:00:12'),
(244, 'C824DBA3-20D8-4649-BDC3-41D4A63FFCA9', 'Camera Speedome IP 2.0mp zoom 4x', 435, 'active', NULL, '2019-05-16 02:00:35', '2019-05-16 02:00:35'),
(245, 'F254942C-51FF-4B73-ACEC-F82B35026436', 'Camera Speedome IP 2.0mp zoom 40x', 5600, 'active', NULL, '2019-05-16 02:02:28', '2019-05-16 02:02:28'),
(246, '6C9D5277-6D69-46EE-A850-F5E92C4C047F', 'Đầu ghi IP 4 kênh  KH-6104N2', 169, 'active', NULL, '2019-05-16 02:03:05', '2019-05-16 02:03:05'),
(247, '0553D334-A241-4D6B-B501-8168AB37E434', 'Đầu ghi IP 8 kênh  KH-6108N2', 195, 'active', NULL, '2019-05-16 02:03:32', '2019-05-16 02:03:32'),
(249, 'C378F0DE-14EB-42A6-8340-D54F2D95C454', 'Đầu ghi 16 kênh KH-4K6216N2', 499, 'active', NULL, '2019-05-16 02:04:18', '2019-05-16 02:04:18'),
(252, '2BCB9AA8-336D-4492-A7F6-D87379C53A21', 'Đầu ghi hình 16 kênh KH-4K6116N2', 349, 'active', NULL, '2019-05-16 02:05:45', '2019-05-16 02:05:45'),
(254, 'A807F49D-B1FB-465A-8748-B53C2F0D4298', 'Đầu ghi 32 kênh KH-4K6232N2', 590, 'active', NULL, '2019-05-16 02:06:39', '2019-05-16 02:06:39'),
(255, '0FADA790-F36A-4291-AD9C-3C9101C04950', 'Đầu ghi 32 kênh KH-4K6432N2', 890, 'active', NULL, '2019-05-16 02:08:00', '2019-05-16 02:08:00'),
(256, 'D36AE1BA-9486-409A-88B1-C4B58C180F50', 'Đầu ghi hình 32 kênh KX-4K6832N2', 1390, 'active', NULL, '2019-05-16 02:08:25', '2019-05-16 02:08:25'),
(257, '9FED3F6B-47EB-4E3A-A7B5-74FCB285780A', 'Đầu ghi 128 kênh KH-4K68128N2', 3950, 'active', NULL, '2019-05-16 02:11:28', '2019-05-16 02:11:28'),
(260, 'F73ABCE0-1633-4F74-B8CC-2A894D05A283', 'Camera quan sát KH-E1008', 970, 'active', NULL, '2019-05-16 02:12:48', '2019-05-16 02:12:48'),
(263, '3DFE9EC8-F590-4A3A-825A-AAA84C00227D', 'Camera dome 2.0Mp KR-4C20D', 93, 'active', NULL, '2019-05-16 02:16:53', '2019-05-16 02:16:53'),
(264, '71D0CF05-113A-42A5-8CE3-DE27432FAB3A', 'Camera thân 2.0Mp KR-4C20B', 97, 'active', NULL, '2019-05-16 02:17:15', '2019-05-16 02:17:15'),
(265, 'D47FAAE3-B392-4C72-A2A3-4550BA4F4113', 'Camera dome 2.0Mp KR-4C20LD', 117, 'active', NULL, '2019-05-16 02:17:40', '2019-05-16 02:17:40'),
(266, '1B9DF664-86E0-429E-BD92-D1F7853BF33D', 'Camera thân 2.0mp KR-4C20LB', 129, 'active', NULL, '2019-05-16 02:17:59', '2019-05-16 02:17:59'),
(268, '145B8E7B-D6D1-4EA8-8B4F-72A20C55B470', 'Camera speed dome 2.0Mp KR-SPC20Z20O', 990, 'active', NULL, '2019-05-16 02:18:57', '2019-05-16 02:18:57'),
(270, '41DE513A-A2AE-48BD-BD26-685471A844E9', 'Đầu ghi 8 kênh KR-9000-8-1DR', 385, 'active', NULL, '2019-05-16 02:21:17', '2019-05-16 02:21:17'),
(271, '7DA6A201-6A8C-4A3B-B8E8-10DC09BE610B', 'Đầu ghi 16 kênh KR-9000-16-2DR', 685, 'active', NULL, '2019-05-16 02:21:37', '2019-05-16 02:21:37'),
(272, 'CEA32348-8B79-465E-BAC5-D277C0C2C24F', 'Đầu ghi hình 32 kênh KR-9000-32-2DR', 1150, 'active', NULL, '2019-05-16 02:22:10', '2019-05-16 02:22:10'),
(273, '897B4590-E03A-421D-96AE-D9CC54CA6EFA', 'Camera thân 1.0mp KR-N10B', 113, 'active', NULL, '2019-05-16 02:22:48', '2019-05-16 02:22:48'),
(274, '86CC5F4C-DF14-4B27-95AD-6AB67F87D1F7', 'Camera dome 1.0mp KR-N10D', 113, 'active', NULL, '2019-05-16 02:23:07', '2019-05-16 02:23:07'),
(275, '13A6D896-9F22-4877-929D-4F9CBEFC493E', 'Camera thân 2.0mp KR-N20B', 167, 'active', NULL, '2019-05-16 02:23:35', '2019-05-16 02:23:35'),
(276, 'A266D96F-5864-4DDB-8AAD-09E0E15BD62D', 'Camera dome 2.0mp KR-N20D', 167, 'active', NULL, '2019-05-16 02:23:52', '2019-05-16 02:23:52'),
(277, '3E6F2DE1-7B8D-4EE5-96EC-FE049168CFFD', 'Camera dome 2.0mp KR-N22D', 219, 'active', NULL, '2019-05-16 02:24:19', '2019-05-16 02:24:19'),
(278, 'EFA31219-0923-4E5B-A27C-994959236F7C', 'Camera thân lớn 2.0mp KR-N20LB', 310, 'active', NULL, '2019-05-16 02:24:39', '2019-05-16 02:24:39'),
(280, '08EA3DD4-E971-4E63-8AFA-1AEF767C3B3D', 'Camera thân 3.0mp KR-N30B', 189, 'active', NULL, '2019-05-16 02:26:49', '2019-05-16 02:26:49'),
(281, '1D4DA4B3-C55A-438B-891D-A85E8310FA8C', 'Camera dome 3.0mp KR-N30D', 189, 'active', NULL, '2019-05-16 02:27:09', '2019-05-16 02:27:09'),
(288, '9E19A813-8B30-4190-A8C5-8F0C1B5F3FE7', 'Camera speed dome 2.0mp KR-SP20Z25O', 1300, 'active', NULL, '2019-05-16 02:39:14', '2019-05-16 02:39:14'),
(290, '953E2210-E86C-4820-9875-D83F2472A29F', 'Camera speed dome 2.0mp KR-SP20Z12Se', 960, 'active', NULL, '2019-05-16 02:40:43', '2019-05-16 02:40:43'),
(292, '8CBCB60F-2886-4243-AA6E-197DA0F03EDF', 'Đầu ghi 4 kênh KR-9000-4-1NR', 230, 'active', NULL, '2019-05-16 02:42:55', '2019-05-16 02:42:55'),
(293, '27F8744E-7543-4C47-9C6C-80259D1F0C8E', 'Đầu ghi 8 kênh KR-9000-8-1NR', 270, 'active', NULL, '2019-05-16 02:43:17', '2019-05-16 02:43:17'),
(295, '16FD1102-34EB-4540-AC47-8ABC4B4B71C3', 'Đầu ghi hình 4 kênh KR-4K9000-04-1NR', 315, 'active', NULL, '2019-05-16 02:44:05', '2019-05-16 02:44:05'),
(296, '65A79275-D927-40F3-9B5A-FE002B09CF26', 'Đầu ghi 8 kênh KR-4k9000-08-1NR', 330, 'active', NULL, '2019-05-16 02:44:39', '2019-05-16 02:44:39'),
(297, 'FD1343E5-0E0E-4D72-9696-B5535A47B625', 'Đầu ghi 16 kênh KR-4K9000-16-1NR', 410, 'active', NULL, '2019-05-16 02:45:19', '2019-05-16 02:45:19'),
(300, '9F74E474-8B82-4769-A75B-C64D24C9B3DE', 'CAM THÂN CVI WIN 6122C4', 41, 'active', NULL, '2019-05-16 02:55:22', '2019-05-16 02:55:22'),
(302, '37C047F1-70FA-438F-8DED-B72F6491D1FA', 'CAM THÂN 1.3MP win 6132s4', 68, 'active', NULL, '2019-05-16 02:56:08', '2019-05-16 02:56:08'),
(304, '7B513A3B-A1D1-4432-A291-9CA70F3B87FF', 'CAM DOME 4.0MP WIN 6114S', 75, 'active', NULL, '2019-05-16 03:00:16', '2019-05-16 03:00:16'),
(305, 'A9E9214C-2A86-42CC-93C6-7633C0FE2F18', 'ĐẦU GHI HÌNH 6008MH1', 179, 'active', NULL, '2019-05-16 03:03:43', '2019-05-16 03:03:43'),
(307, '7C567474-D2F4-4CDB-9BB4-8F627FF935E1', 'ĐẦU GHI HÌNH 4 KÊNH 6004SD6', 107, 'active', NULL, '2019-05-16 03:04:38', '2019-05-16 03:04:38'),
(308, '2AF6FF6E-7427-4BFB-9D36-77D45FF8B19A', 'ĐẦU GHI 8 KÊNH 6008SD6', 149, 'active', NULL, '2019-05-16 03:05:15', '2019-05-16 03:05:15'),
(312, '108040C4-92D3-49CB-96BE-BF65C22C1AB1', 'Đầu ghi 4 kênh WIN 2K 9004D5', 227, 'active', NULL, '2019-05-16 03:09:12', '2019-05-16 03:09:12'),
(316, 'CF974431-4CB6-4496-ACA4-CA8204EAE021', 'CAMERA IP 2.0 9413IP2', 99, 'active', NULL, '2019-05-16 03:13:06', '2019-05-16 03:13:06'),
(317, 'B01791C1-D070-4974-BA05-2E43557BD5DE', 'cam thân ip 2.0 win 9213ip2', 99, 'active', NULL, '2019-05-16 03:13:27', '2019-05-16 03:13:27'),
(318, 'CC84E731-6392-46C2-8496-C8A64AFB583A', 'cam thân 2.0 win 9373ip2', 159, 'active', NULL, '2019-05-16 03:13:50', '2019-05-16 03:13:50'),
(321, 'B98A5EF6-650F-44F2-8893-93CE514BE15F', 'đầu ghi 8 kênh win 4k 8308NVR', 189, 'active', NULL, '2019-05-16 03:20:03', '2019-05-16 03:20:03'),
(326, 'F4CCEA80-CAD7-4C87-9096-5FCCB2722F5E', 'CAMERA DOME 1.0', 22, 'active', NULL, '2019-05-16 03:25:16', '2019-05-16 03:25:16'),
(331, '5518384B-476F-42D2-84F0-F35746960C81', 'Bộ chuyển đổi 4 in 1', 29, 'active', NULL, '2019-05-16 03:34:40', '2019-05-16 03:34:40'),
(332, 'E7590922-1FBD-494A-817B-241E800AEDD8', 'Ổ cứng chuyển dụng Toshiba 1000GB', 91, 'active', NULL, '2019-05-16 04:08:17', '2019-05-16 04:08:17'),
(333, '68799C6C-F670-480F-9348-21EB953797E9', 'Ổ cứng chuyên dụng Toshiba 2000GB', 138, 'active', NULL, '2019-05-16 04:09:08', '2019-05-16 04:09:08'),
(334, '2B1EC333-8797-464B-8F60-9B5F28A660A2', 'Ổ cứng chuyên dụng Toshiba 3000GB', 191, 'active', NULL, '2019-05-16 04:09:36', '2019-05-16 04:09:36'),
(335, '37DBB055-13F1-4BA6-93CA-C7C5C36FDFAC', 'Ổ cứng chuyên dùng Toshiba 4000GB', 267, 'active', NULL, '2019-05-16 04:09:56', '2019-05-16 04:09:56'),
(336, 'E43C5927-CB96-4A41-8713-0EC78C806523', 'Ổ cứng chuyên dùng Toshiba 6000GB', 440, 'active', NULL, '2019-05-16 04:10:20', '2019-05-16 04:10:20'),
(337, 'C89AF60B-234C-4042-ABC6-307B84BF628A', 'Ổ cứng chuyên dùng Toshiba 8000GB', 616, 'active', NULL, '2019-05-16 04:10:43', '2019-05-16 04:10:43'),
(338, 'B7CC73AD-7E2E-4385-9330-ABDFD6156541', 'Ổ cứng chuyên dùng 10000GB', 858, 'active', NULL, '2019-05-16 04:11:28', '2019-05-16 04:11:28'),
(339, '4F75253F-9331-410B-8B8E-6E15B28EED2D', 'Ổ cứng chuyên dùng 8000GB', 655, 'active', NULL, '2019-05-16 04:11:48', '2019-05-16 04:11:48'),
(340, 'F7BD8E9B-0355-4562-B497-676584FE5A9E', 'Ổ cứng chuyên dùng 6000GB', 479, 'active', NULL, '2019-05-16 04:12:06', '2019-05-16 04:12:06'),
(341, '4E7C8259-69CE-4245-B80A-D553A4794DDA', 'Ổ cứng chuyên dùng 4000GB', 284, 'active', NULL, '2019-05-16 04:12:29', '2019-05-16 04:12:29'),
(342, '67192EA8-FC1D-4BD6-BA53-5AF2A0D0B532', 'Ổ cứng chuyên dùng 3TB', 212, 'active', NULL, '2019-05-16 04:13:20', '2019-05-16 04:13:20'),
(343, '0DFE2E93-EFFA-4A05-B054-DE84B7E0739B', 'Ổ cứng chuyên dùng 4TB', 284, 'active', NULL, '2019-05-16 04:13:47', '2019-05-16 04:13:47'),
(344, '658561B6-3E0A-481A-92EB-55AE42AC4536', 'Ổ cứng chuyên dùng 2000GB', 155, 'active', NULL, '2019-05-16 04:14:27', '2019-05-16 04:14:27'),
(345, '77EA6D98-70D8-45FB-AB4F-AE85426CDA6E', 'Ổ cứng chuyên dùng 1000GB', 98, 'active', NULL, '2019-05-16 04:15:08', '2019-05-16 04:15:08'),
(346, 'BD5A848E-17B1-49B9-9D5A-58069D4EC02A', 'Ổ cứng chuyên dùng 1TB', 98, 'active', NULL, '2019-05-16 04:15:33', '2019-05-16 04:15:33'),
(347, '404D3799-845E-4DED-BEED-5A31195D7A4B', 'CAMERA DOME 1.0MP KW-H1', 69, 'active', NULL, '2019-05-16 07:03:54', '2019-05-16 07:03:54'),
(348, 'B2EDA99F-FAC6-4D17-B038-1793A12ED8E4', 'CAMERA DOME 2.0MP KW-H2', 104, 'active', NULL, '2019-05-16 07:04:55', '2019-05-16 07:04:55'),
(349, '35F6ADC1-9D85-4D9C-8846-FFE805AC5809', 'Ổ cứng chuyên dùng 3000GB', 212, 'active', NULL, '2019-05-21 04:37:12', '2019-05-21 04:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `kbv_release`
--

DROP TABLE IF EXISTS `kbv_release`;
CREATE TABLE IF NOT EXISTS `kbv_release` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mem_id` int(10) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `kbv_release`
--

TRUNCATE TABLE `kbv_release`;
--
-- Dumping data for table `kbv_release`
--

INSERT INTO `kbv_release` (`id`, `mem_id`, `product_id`, `seri_no`, `created_at`, `updated_at`) VALUES
(21, 32, '6D4F01A9-09F5-4BAB-BA3C-0056C16C3551', '2H04547PAM00001', '2019-05-15 02:14:40', '2019-05-15 02:14:40'),
(25, 76, '9C3F0D2A-CB8C-4D57-B4B9-C1659A7726DB', '5C034c6pagdc348', '2019-05-16 01:22:04', '2019-05-16 01:22:04'),
(24, 63, '99E3D002-642F-46C5-956C-284E663EA6AC', '3D01C3BPAZ00007', '2019-05-15 06:36:42', '2019-05-15 06:36:42'),
(36, 97, 'D4B1039F-0ABF-41DD-8323-31D4031BE745', '5A05719PAGBE844', '2019-05-17 01:32:30', '2019-05-17 01:32:30'),
(27, 63, 'E6095990-3A87-48A9-9B11-02A4B4943E74', '4H07ABBPAG0EF44', '2019-05-16 03:56:50', '2019-05-16 03:56:50'),
(28, 63, 'E6095990-3A87-48A9-9B11-02A4B4943E74', '4H07ABBPAGF0B64', '2019-05-16 03:57:09', '2019-05-16 03:57:09'),
(29, 63, 'E6095990-3A87-48A9-9B11-02A4B4943E74', '2G03C0DPAG00085', '2019-05-16 08:31:15', '2019-05-16 08:31:15'),
(30, 48, 'E6095990-3A87-48A9-9B11-02A4B4943E74', '2J03BDDPAG00097', '2019-05-16 08:32:06', '2019-05-16 08:32:06'),
(37, 97, 'A37DF6A6-30EA-462E-920D-74D0AE31BBF1', '4K03631PAZ95504', '2019-05-17 01:39:04', '2019-05-17 01:39:04'),
(39, 90, 'E6095990-3A87-48A9-9B11-02A4B4943E74', '5B0078BPAG9FCA0', '2019-05-21 02:36:22', '2019-05-21 02:36:22'),
(40, 119, 'AC65ABBE-E14E-4499-9996-6FAAF72990EC', '5A0029BPALF4576', '2019-05-22 05:36:43', '2019-05-22 05:36:43'),
(41, 119, 'AC65ABBE-E14E-4499-9996-6FAAF72990EC', '5C0333FPAG916FB', '2019-05-22 05:37:26', '2019-05-22 05:37:26'),
(42, 119, 'B2B61498-D21B-4C94-BE6F-EFE3E0ECC7D0', '5B04648PAX7D5F0', '2019-05-22 05:38:05', '2019-05-22 05:38:05'),
(43, 119, '5018D370-6454-4C77-A3BF-66C0493CCE20', '5B03941PAG0E7B1', '2019-05-22 05:39:27', '2019-05-22 05:39:27'),
(44, 119, '5018D370-6454-4C77-A3BF-66C0493CCE20', '5B03941PAGce46f', '2019-05-22 05:39:59', '2019-05-22 05:39:59'),
(45, 119, '99E3D002-642F-46C5-956C-284E663EA6AC', '5C0066APAZADE8C', '2019-05-22 05:40:40', '2019-05-22 05:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `kbv_setting`
--

DROP TABLE IF EXISTS `kbv_setting`;
CREATE TABLE IF NOT EXISTS `kbv_setting` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `kbv_setting`
--

TRUNCATE TABLE `kbv_setting`;
-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `content` text COLLATE utf8mb4_unicode_ci,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `locations`
--

TRUNCATE TABLE `locations`;
-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  PRIMARY KEY (`id`),
  KEY `medias_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `medias`
--

TRUNCATE TABLE `medias`;
--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `source`, `type`) VALUES
(1, '2019-04-26 06:19:44', '2019-04-26 06:19:44', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5cc2a300b29ce.png', 'img'),
(2, '2019-04-26 06:20:33', '2019-04-26 06:20:33', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5cc2a33144e6a.png', 'img'),
(3, '2019-05-04 07:46:32', '2019-05-04 07:46:32', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ccd435802150.jpg', 'img'),
(4, '2019-05-04 07:47:25', '2019-05-04 07:47:25', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ccd438d54006.jpg', 'img'),
(5, '2019-05-04 16:36:09', '2019-05-04 16:36:09', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ccdbf79254db.jpg', 'img'),
(6, '2019-05-04 16:41:52', '2019-05-04 16:41:52', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ccdc0d086762.jpg', 'img'),
(7, '2019-05-04 16:42:21', '2019-05-04 16:42:21', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ccdc0ed08b61.jpg', 'img'),
(8, '2019-05-08 02:46:05', '2019-05-08 02:46:05', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cd242ed48bf5.jpg', 'img'),
(9, '2019-05-08 02:50:34', '2019-05-08 02:50:34', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5cd243fab57b7.jpg', 'img'),
(10, '2019-05-14 13:42:36', '2019-05-14 13:42:36', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5cdac5cc35842.jpg', 'img'),
(11, '2019-05-14 13:43:04', '2019-05-14 13:43:04', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5cdac5e8ae09b.jpg', 'img'),
(12, '2019-05-15 04:26:04', '2019-05-15 04:26:04', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdb94dcd5408.png', 'img'),
(13, '2019-05-16 01:25:58', '2019-05-16 01:25:58', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcbc267e128.png', 'img'),
(14, '2019-05-16 01:26:11', '2019-05-16 01:26:11', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcbc332a2c2.png', 'img'),
(15, '2019-05-16 01:44:11', '2019-05-16 01:44:11', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcc06bce4b8.png', 'img'),
(16, '2019-05-16 01:45:56', '2019-05-16 01:45:56', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcc0d491ed3.png', 'img'),
(17, '2019-05-16 01:53:14', '2019-05-16 01:53:14', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcc28aa5d36.png', 'img'),
(18, '2019-05-16 01:53:22', '2019-05-16 01:53:22', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcc292db981.png', 'img'),
(19, '2019-05-16 01:59:16', '2019-05-16 01:59:16', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdcc3f4e259f.png', 'img'),
(20, '2019-05-16 04:35:31', '2019-05-16 04:35:31', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdce89340cc9.png', 'img'),
(21, '2019-05-16 07:35:45', '2019-05-16 07:35:45', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5cdd12d1b7d82.jpg', 'img'),
(22, '2019-05-20 03:52:48', '2019-05-20 03:52:48', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ce22490c3c81.jpg', 'img'),
(23, '2019-05-20 03:55:58', '2019-05-20 03:55:58', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ce2254e079e8.jpg', 'img'),
(24, '2019-05-21 01:23:38', '2019-05-21 01:23:38', NULL, 18, 'http://kbv-is.lifeplusloyalty.vn/upload/5ce3531a4dd01.png', 'img'),
(25, '2019-05-21 01:27:57', '2019-05-21 01:27:57', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce3541dc369c.jpg', 'img'),
(26, '2019-05-21 01:40:26', '2019-05-21 01:40:26', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce3570a58738.jpg', 'img'),
(27, '2019-05-21 01:52:07', '2019-05-21 01:52:07', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce359c7d71cc.jpg', 'img'),
(28, '2019-05-21 01:53:31', '2019-05-21 01:53:31', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35a1b2176e.jpg', 'img'),
(29, '2019-05-21 01:54:58', '2019-05-21 01:54:58', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35a726fb70.jpg', 'img'),
(30, '2019-05-21 01:58:00', '2019-05-21 01:58:00', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35b282c7e1.jpg', 'img'),
(31, '2019-05-21 02:02:09', '2019-05-21 02:02:09', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35c21933ff.jpg', 'img'),
(32, '2019-05-21 02:03:42', '2019-05-21 02:03:42', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35c7e924f8.jpg', 'img'),
(33, '2019-05-21 02:04:27', '2019-05-21 02:04:27', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35cabc70cf.jpg', 'img'),
(34, '2019-05-21 02:04:44', '2019-05-21 02:04:44', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35cbceabbc.jpg', 'img'),
(35, '2019-05-21 02:05:23', '2019-05-21 02:05:23', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35ce326010.jpg', 'img'),
(36, '2019-05-21 02:05:47', '2019-05-21 02:05:47', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35cfb5365d.jpg', 'img'),
(37, '2019-05-21 02:06:16', '2019-05-21 02:06:16', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35d186363d.jpg', 'img'),
(38, '2019-05-21 02:06:46', '2019-05-21 02:06:46', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35d36e1cd0.jpg', 'img'),
(39, '2019-05-21 02:07:48', '2019-05-21 02:07:48', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35d74ed9df.jpg', 'img'),
(40, '2019-05-21 02:09:07', '2019-05-21 02:09:07', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35dc335590.jpg', 'img'),
(41, '2019-05-21 02:14:32', '2019-05-21 02:14:32', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35f08ae1f4.jpg', 'img'),
(42, '2019-05-21 02:17:01', '2019-05-21 02:17:01', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce35f9d7032e.jpg', 'img'),
(43, '2019-05-21 02:21:23', '2019-05-21 02:21:23', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce360a38b178.jpg', 'img'),
(44, '2019-05-21 02:21:35', '2019-05-21 02:21:35', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce360af7f514.jpg', 'img'),
(45, '2019-05-21 02:21:47', '2019-05-21 02:21:47', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce360bb72946.jpg', 'img'),
(46, '2019-05-21 02:22:49', '2019-05-21 02:22:49', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce360f99f80c.jpg', 'img'),
(47, '2019-05-21 02:26:49', '2019-05-21 02:26:49', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce361e978f97.jpg', 'img'),
(48, '2019-05-21 02:27:09', '2019-05-21 02:27:09', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce361fd0dbdb.jpg', 'img'),
(49, '2019-05-21 02:27:42', '2019-05-21 02:27:42', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce3621edce5b.jpg', 'img'),
(50, '2019-05-21 02:28:44', '2019-05-21 02:28:44', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce3625c6d5c8.jpg', 'img'),
(51, '2019-05-22 04:24:06', '2019-05-22 04:24:06', NULL, 18, 'https://kbv-is.lifeplusloyalty.vn/upload/5ce4cee65f2f2.jpg', 'img'),
(54, '2019-06-22 23:47:20', '2019-06-23 00:02:31', NULL, 18, 'uploads/iss/1561273351/15612733513c24f14ae929054e191a4d73a8f2b609.jpeg_2200x2200q80.jpg_.webp', 'img'),
(55, '2019-06-23 01:00:45', '2019-06-23 01:00:45', NULL, 18, 'uploads/iss/1561276845/15612768453c24f14ae929054e191a4d73a8f2b609.jpeg_2200x2200q80.jpg_.webp', 'img'),
(56, '2019-06-23 01:06:15', '2019-06-23 01:06:15', NULL, 18, 'uploads/iss/1561277175/15612771753c24f14ae929054e191a4d73a8f2b609.jpeg_2200x2200q80.jpg_.webp', 'img'),
(57, '2019-06-23 01:07:25', '2019-06-23 01:07:25', NULL, 18, 'uploads/iss/1561277245/15612772453c24f14ae929054e191a4d73a8f2b609.jpeg_2200x2200q80.jpg_.webp', 'img'),
(58, '2019-06-26 01:15:35', '2019-06-26 01:15:35', NULL, 18, 'uploads/iss/1561536935/15615369353c24f14ae929054e191a4d73a8f2b609.jpeg_2200x2200q80.jpg_.webp', 'img'),
(59, '2019-06-26 01:28:07', '2019-06-26 05:06:38', NULL, 18, 'uploads/iss/1561550798/1561550798Facebook Ad   babaza_seo.png', 'img'),
(60, '2019-06-26 04:45:16', '2019-06-26 04:45:16', NULL, 18, 'uploads/iss/1561549516/15615495163c24f14ae929054e191a4d73a8f2b609.jpeg_2200x2200q80.jpg_.webp', 'img');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `card_id` int(11) NOT NULL,
  `accumulate` int(11) NOT NULL,
  `redeempoint` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` int(10) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `members_user_id_foreign` (`user_id`),
  KEY `members_issuer_id_foreign` (`issuer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `members`
--

TRUNCATE TABLE `members`;
--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `card_id`, `accumulate`, `redeempoint`, `code`, `name`, `birthday`, `job`, `work`, `area`, `address`, `email`, `phone`, `issuer_id`, `status`) VALUES
(49, '2019-05-06 02:54:08', '2019-07-16 18:10:11', NULL, 73, 1, 700, 300, '84909257455', NULL, NULL, NULL, '', NULL, NULL, NULL, '84909257455', 1, 'active'),
(50, '2019-05-06 03:00:02', '2019-05-06 03:00:02', NULL, 74, 1, 0, 0, '84968848865', NULL, NULL, NULL, '', NULL, NULL, NULL, '84968848865', 1, 'active'),
(46, '2019-05-06 01:46:19', '2019-05-06 01:46:19', NULL, 70, 1, 0, 0, '84909196195', NULL, NULL, NULL, '', NULL, NULL, NULL, '84909196195', 1, 'active'),
(47, '2019-05-06 01:52:51', '2019-05-20 01:13:34', NULL, 71, 1, 0, 0, '84902609111', 'Vo minh sang', '1988-02-15 00:00:00', 'Nhân viên', 'Kbvision viet nam', 30, '278 luy ban bich', 'sang.vo@kbvision.vn', '84902609111', 1, 'active'),
(48, '2019-05-06 02:02:52', '2019-05-22 03:53:01', NULL, 72, 1, 154, 54, '84886989796', 'Yhh', '2001-01-11 00:00:00', 'Ggu', 'Andes nguyen van', 30, 'Yuu', 'tkhtnt.2606@gmail.com', '84886989796', 1, 'active'),
(45, '2019-05-05 08:25:26', '2019-05-05 08:25:26', NULL, 69, 1, 0, 0, '84948554838', NULL, NULL, NULL, '', NULL, NULL, NULL, '84948554838', 1, 'active'),
(44, '2019-05-05 04:41:53', '2019-05-05 04:41:53', NULL, 68, 1, 0, 0, '84336927083', NULL, NULL, NULL, '', NULL, NULL, NULL, '84336927083', 1, 'active'),
(43, '2019-05-04 04:00:51', '2019-05-17 17:12:55', NULL, 67, 1, 1000, 400, '84906721706', 'Pound le', NULL, 'Movile', '', 30, '123', 'le@gmail.com', '84906721706', 1, 'active'),
(42, '2019-05-04 01:50:31', '2019-05-04 01:50:31', NULL, 66, 1, 0, 0, '84914150069', NULL, NULL, NULL, '', NULL, NULL, NULL, '84914150069', 1, 'active'),
(41, '2019-05-03 23:59:57', '2019-05-03 23:59:57', NULL, 65, 1, 0, 0, '84939012089', NULL, NULL, NULL, '', NULL, NULL, NULL, '84939012089', 1, 'active'),
(40, '2019-05-03 16:16:53', '2019-05-03 16:16:53', NULL, 64, 1, 0, 0, '84975559319', NULL, NULL, NULL, '', NULL, NULL, NULL, '84975559319', 1, 'active'),
(39, '2019-05-03 16:15:13', '2019-05-03 16:15:13', NULL, 63, 1, 0, 0, '84353639234', NULL, NULL, NULL, '', NULL, NULL, NULL, '84353639234', 1, 'active'),
(38, '2019-05-03 13:18:55', '2019-05-03 13:18:55', NULL, 62, 1, 0, 0, '84908043337', NULL, NULL, NULL, '', NULL, NULL, NULL, '84908043337', 1, 'active'),
(37, '2019-05-03 10:02:58', '2019-05-03 10:02:58', NULL, 61, 1, 0, 0, '84348054524', NULL, NULL, NULL, '', NULL, NULL, NULL, '84348054524', 1, 'active'),
(36, '2019-05-03 09:27:59', '2019-05-03 09:27:59', NULL, 60, 1, 0, 0, '84983333297', NULL, NULL, NULL, '', NULL, NULL, NULL, '84983333297', 1, 'active'),
(35, '2019-05-03 07:58:48', '2019-05-03 07:58:48', NULL, 59, 1, 0, 0, '84937394545', NULL, NULL, NULL, '', NULL, NULL, NULL, '84937394545', 1, 'active'),
(34, '2019-05-03 07:43:04', '2019-05-03 07:43:04', NULL, 58, 1, 0, 0, '84985377191', NULL, NULL, NULL, '', NULL, NULL, NULL, '84985377191', 1, 'active'),
(33, '2019-05-03 07:38:28', '2019-05-03 07:38:28', NULL, 57, 1, 0, 0, '84915750212', NULL, NULL, NULL, '', NULL, NULL, NULL, '84915750212', 1, 'active'),
(32, '2019-05-03 07:08:28', '2019-05-20 08:16:30', NULL, 56, 1, 101450, 98800, '84916700848', 'Here Online', '1984-05-20 00:00:00', 'IT', 'Life+', 30, '119 điện biên phủ', 'meohere@gmail.com', '84916700848', 1, 'active'),
(51, '2019-05-06 03:12:31', '2019-05-06 03:12:31', NULL, 75, 1, 0, 0, '84928365242', NULL, NULL, NULL, '', NULL, NULL, NULL, '84928365242', 1, 'active'),
(52, '2019-05-06 03:16:46', '2019-05-06 03:16:46', NULL, 76, 1, 0, 0, '84911506399', NULL, NULL, NULL, '', NULL, NULL, NULL, '84911506399', 1, 'active'),
(53, '2019-05-06 10:12:47', '2019-05-06 10:12:47', NULL, 77, 1, 0, 0, '84936070805', NULL, NULL, NULL, '', NULL, NULL, NULL, '84936070805', 1, 'active'),
(54, '2019-05-06 11:36:34', '2019-05-06 11:36:34', NULL, 78, 1, 0, 0, '84964764025', NULL, NULL, NULL, '', NULL, NULL, NULL, '84964764025', 1, 'active'),
(55, '2019-05-06 16:13:11', '2019-05-06 16:13:11', NULL, 79, 1, 0, 0, '84942206070', NULL, NULL, NULL, '', NULL, NULL, NULL, '84942206070', 1, 'active'),
(57, '2019-05-08 15:28:55', '2019-05-08 15:28:55', NULL, 81, 1, 0, 0, '84377093550', NULL, NULL, NULL, '', NULL, NULL, NULL, '84377093550', 1, 'active'),
(58, '2019-05-09 06:28:16', '2019-05-22 04:23:47', NULL, 82, 1, 0, 0, '84336220929', 'Hai', '2002-05-22 00:00:00', 'Nhân viên', 'Kbvision', 30, '30', 'caraven84@yahoo.com.vn', '84336220929', 1, 'active'),
(59, '2019-05-09 07:03:45', '2019-05-09 07:03:45', NULL, 83, 1, 0, 0, '84899672911', NULL, NULL, NULL, '', NULL, NULL, NULL, '84899672911', 1, 'active'),
(60, '2019-05-09 10:10:46', '2019-05-09 10:10:46', NULL, 84, 1, 0, 0, '84908165242', NULL, NULL, NULL, '', NULL, NULL, NULL, '84908165242', 1, 'active'),
(61, '2019-05-10 16:44:55', '2019-05-10 16:44:55', NULL, 85, 1, 0, 0, '84814757574', NULL, NULL, NULL, '', NULL, NULL, NULL, '84814757574', 1, 'active'),
(62, '2019-05-11 01:54:01', '2019-05-11 01:54:01', NULL, 86, 1, 0, 0, '84978000013', NULL, NULL, NULL, '', NULL, NULL, NULL, '84978000013', 1, 'active'),
(63, '2019-05-11 02:06:32', '2019-05-23 02:17:44', NULL, 87, 1, 11121, 4014, '84349522010', 'Tran Thanh tuan.', '2002-05-19 00:00:00', 'Nhân viên kinh doanh.', 'Kbvision.', 30, '44 Nguyễn biểu.', 'tuan.khtn.hcmus@gmail.co', '84349522010', 1, 'active'),
(64, '2019-05-11 08:47:26', '2019-05-11 08:47:26', NULL, 88, 1, 0, 0, '84931100133', NULL, NULL, NULL, '', NULL, NULL, NULL, '84931100133', 1, 'active'),
(65, '2019-05-11 09:03:17', '2019-05-11 09:03:17', NULL, 89, 1, 0, 0, '17016453388', NULL, NULL, NULL, '', NULL, NULL, NULL, '17016453388', 1, 'active'),
(66, '2019-05-11 09:20:56', '2019-05-11 09:20:56', NULL, 90, 1, 0, 0, '17016453388', NULL, NULL, NULL, '', NULL, NULL, NULL, '17016453388', 1, 'active'),
(67, '2019-05-11 09:23:53', '2019-05-11 09:23:53', NULL, 91, 1, 0, 0, '17016453388', NULL, NULL, NULL, '', NULL, NULL, NULL, '17016453388', 1, 'active'),
(68, '2019-05-13 02:57:51', '2019-05-13 02:57:51', NULL, 92, 1, 0, 0, '84938506206', NULL, NULL, NULL, '', NULL, NULL, NULL, '84938506206', 1, 'active'),
(69, '2019-05-13 04:35:49', '2019-05-13 04:35:49', NULL, 93, 1, 0, 0, '84988308520', NULL, NULL, NULL, '', NULL, NULL, NULL, '84988308520', 1, 'active'),
(70, '2019-05-13 04:52:54', '2019-05-13 04:52:54', NULL, 94, 1, 0, 0, '84987718718', NULL, NULL, NULL, '', NULL, NULL, NULL, '84987718718', 1, 'active'),
(71, '2019-05-13 05:21:50', '2019-05-13 05:21:50', NULL, 95, 1, 0, 0, '84907223715', NULL, NULL, NULL, '', NULL, NULL, NULL, '84907223715', 1, 'active'),
(72, '2019-05-13 07:56:18', '2019-05-13 07:56:18', NULL, 96, 1, 0, 0, '84374339469', NULL, NULL, NULL, '', NULL, NULL, NULL, '84374339469', 1, 'active'),
(73, '2019-05-13 07:56:27', '2019-05-13 07:58:35', NULL, 97, 1, 0, 0, '84909183689', 'Võ Kiều Hải', NULL, 'QL', '', 30, '96 Phan Van Khoe, P2, Q6, TPHCM', 'vokieuhai@gmail.com', '84909183689', 1, 'active'),
(74, '2019-05-13 10:10:56', '2019-05-13 10:10:56', NULL, 98, 1, 0, 0, '84907970230', NULL, NULL, NULL, '', NULL, NULL, NULL, '84907970230', 1, 'active'),
(75, '2019-05-13 16:09:35', '2019-05-17 15:19:37', NULL, 99, 1, 10000, 10000, '14084766514', NULL, NULL, NULL, '', NULL, NULL, NULL, '14084766514', 1, 'active'),
(76, '2019-05-14 02:01:11', '2019-05-16 09:50:09', NULL, 100, 1, 778086, 777677, '84898312383', 'Trần Thanh Tuấn', '2021-01-22 00:00:00', 'Nhân viên', '', 30, '278 Lũy Bán Bích', 'tkhtnt.2606@gmail.com', '84898312383', 1, 'active'),
(77, '2019-05-14 02:08:35', '2019-05-16 09:49:13', NULL, 101, 1, 29000, 29000, '84773822664', 'Trần Thanh Tuấn', '2019-05-18 00:00:00', 'Nhân viên', '', 700000, '278 Lũy Bán Bích', 'tkhtnt.2606@gmail.com', '84773822664', 1, 'active'),
(78, '2019-05-14 09:22:40', '2019-05-14 09:22:40', NULL, 102, 1, 0, 0, '84919464436', NULL, NULL, NULL, '', NULL, NULL, NULL, '84919464436', 1, 'active'),
(79, '2019-05-14 10:02:01', '2019-05-14 10:02:01', NULL, 103, 1, 0, 0, '84366402778', NULL, NULL, NULL, '', NULL, NULL, NULL, '84366402778', 1, 'active'),
(80, '2019-05-14 14:18:25', '2019-05-14 14:18:25', NULL, 104, 1, 0, 0, '84978501968', NULL, NULL, NULL, '', NULL, NULL, NULL, '84978501968', 1, 'active'),
(81, '2019-05-15 00:06:37', '2019-05-15 00:08:32', NULL, 105, 1, 0, 0, '84868605792', 'Đinh Văn Tuyên', NULL, 'Quản Lý', '', 40, 'Chợ Vò Yên Lộc Ý Yên', 'dientudinhtuyen@gmail.com', '84868605792', 1, 'active'),
(82, '2019-05-15 02:03:15', '2019-05-15 02:03:15', NULL, 106, 1, 0, 0, '8484909257455', NULL, NULL, NULL, '', NULL, NULL, NULL, '8484909257455', 1, 'active'),
(83, '2019-05-15 06:11:41', '2019-05-22 08:12:20', NULL, 107, 1, 0, 0, '84908998976', 'Huynhminhhoang', '1982-02-24 00:00:00', 'ĐHV', 'Tram220kvthuanan', 8, '0184A, kp Tân Ba, p Thái Hòa, Tân uyên, Bình Dương', 'minhhoangnpt@gmail.com', '84908998976', 1, 'active'),
(84, '2019-05-15 08:13:23', '2019-05-15 08:13:23', NULL, 108, 1, 0, 0, '84981847945', NULL, NULL, NULL, '', NULL, NULL, NULL, '84981847945', 1, 'active'),
(85, '2019-05-15 10:26:39', '2019-05-15 10:26:39', NULL, 109, 1, 0, 0, '84911430000', NULL, NULL, NULL, '', NULL, NULL, NULL, '84911430000', 1, 'active'),
(86, '2019-05-15 22:49:52', '2019-05-15 22:49:52', NULL, 110, 1, 0, 0, '84984514880', NULL, NULL, NULL, '', NULL, NULL, NULL, '84984514880', 1, 'active'),
(87, '2019-05-16 03:16:29', '2019-05-16 03:16:29', NULL, 111, 1, 0, 0, '84979487185', NULL, NULL, NULL, '', NULL, NULL, NULL, '84979487185', 1, 'active'),
(88, '2019-05-16 10:37:23', '2019-05-16 10:37:23', NULL, 112, 1, 0, 0, '84975580085', NULL, NULL, NULL, '', NULL, NULL, NULL, '84975580085', 1, 'active'),
(89, '2019-05-16 10:52:02', '2019-05-16 10:52:02', NULL, 113, 1, 0, 0, '84392967607', NULL, NULL, NULL, '', NULL, NULL, NULL, '84392967607', 1, 'active'),
(90, '2019-05-16 10:55:44', '2019-05-21 02:36:22', NULL, 114, 1, 10234, 7854, '84932685888', 'Nguyễn Yến Nhi', '2019-05-31 00:00:00', 'Nhân viên kinh doanh', 'Kbvision', 30, '278 Lũy Bán Bích', 'tttuantgu@gmail.com', '84932685888', 1, 'active'),
(93, '2019-05-16 13:00:12', '2019-05-17 13:51:57', NULL, 117, 1, 154, 0, '84763865051', 'Long', '1982-05-16 00:00:00', 'Long', '', 30, '119 dien bien phu', 'meohere@gmail.com', '84763865051', 1, 'active'),
(94, '2019-05-16 15:49:44', '2019-05-16 15:50:47', NULL, 118, 1, 0, 0, '84888117587', 'Võ Như Thịnh', NULL, 'KTV', '', 50, 'Tp Đông Hà', 'vuthinhtita@gmail.com', '84888117587', 1, 'active'),
(95, '2019-05-17 01:15:58', '2019-05-17 01:15:58', NULL, 119, 1, 0, 0, '84949222272', NULL, NULL, NULL, '', NULL, NULL, NULL, '84949222272', 1, 'active'),
(96, '2019-05-17 01:20:40', '2019-05-17 01:22:59', NULL, 120, 1, 0, 0, '84907602489', 'Tản Đà', '2019-06-20 00:00:00', 'IT', '', 30, '278 Lũy Bán Bích, Hòa Thạnh, Tân Phú, HCM', 'khidudaydien@gmail.com', '84907602489', 1, 'active'),
(97, '2019-05-17 01:29:57', '2019-05-17 01:40:43', NULL, 121, 1, 246, 46, '84902844876', 'Nguyễn thanh thiện', '2019-05-17 00:00:00', 'Kinh doanh', '', 30, '278 lũy bán bích', 'nguyenthien1089@gmail.com', '84902844876', 1, 'active'),
(98, '2019-05-17 02:15:43', '2019-05-17 02:16:38', NULL, 122, 1, 0, 0, '84902756111', 'Trần Đoàn Phú', NULL, 'Trưởng VP Đại Diện Kb Vision Miền Bắc', '', 24, 'Số 9 Ngõ 175 Định Công, Hoàng Mai, Hà Nội', 'phu.doan@questekvietnam.vn', '84902756111', 1, 'active'),
(99, '2019-05-17 02:23:35', '2019-05-17 02:24:23', NULL, 123, 1, 0, 0, '84932685900', 'Đỗ Thanh Xuân', NULL, 'Nhân viên', '', 30, 'Quận tân phú', 'xuan.do@kbvision.vn', '84932685900', 1, 'active'),
(100, '2019-05-17 04:09:24', '2019-05-17 04:09:24', NULL, 124, 1, 0, 0, '84932403555', NULL, NULL, NULL, '', NULL, NULL, NULL, '84932403555', 1, 'active'),
(101, '2019-05-17 12:40:21', '2019-05-17 12:40:21', NULL, 125, 1, 0, 0, '84902651574', NULL, NULL, NULL, '', NULL, NULL, NULL, '84902651574', 1, 'active'),
(102, '2019-05-17 13:26:08', '2019-05-17 13:27:06', NULL, 126, 1, 0, 0, '13028580567', 'Le giant phuong', '1996-10-17 00:00:00', '123vadf', '', 30, 'Fdsafdsaf s13', 'fd@gmail.com', '13028580567', 1, 'active'),
(103, '2019-05-17 15:05:47', '2019-05-17 16:55:31', NULL, 127, 1, 1000, 700, '14084066195', NULL, NULL, NULL, '', NULL, NULL, NULL, '14084066195', 1, 'active'),
(104, '2019-05-17 15:25:47', '2019-05-17 15:25:47', NULL, 128, 1, 0, 0, '84796975047', NULL, NULL, NULL, '', NULL, NULL, NULL, '84796975047', 1, 'active'),
(105, '2019-05-18 00:33:41', '2019-05-18 00:35:20', NULL, 129, 1, 0, 0, '84932000111', 'Hà Duy Nghiêm', NULL, 'Tổng Giám đốc', '', 30, '278 Luỹ Bán Bích, Tân Phú', 'nghiem.ha@kbvision.vn', '84932000111', 1, 'active'),
(106, '2019-05-18 01:17:46', '2019-05-18 01:21:21', NULL, 130, 1, 0, 0, '84932685992', 'Nguyễn Xuân Hoàng', '1992-01-21 00:00:00', NULL, '', 30, '278 luỹ bán bích , Phường Hoà Thạnh ,Quận Tân phú ,TPHCM', 'hoang.nguyen@kbvision.vn', '84932685992', 1, 'active'),
(107, '2019-05-18 01:18:42', '2019-05-18 01:18:42', NULL, 131, 1, 0, 0, '84392887543', NULL, NULL, NULL, '', NULL, NULL, NULL, '84392887543', 1, 'active'),
(108, '2019-05-18 01:20:18', '2019-05-18 01:20:18', NULL, 132, 1, 0, 0, '84937320724', NULL, NULL, NULL, '', NULL, NULL, NULL, '84937320724', 1, 'active'),
(109, '2019-05-18 04:14:43', '2019-05-18 04:43:48', NULL, 133, 1, 0, 0, '84986295059', 'Trần thị ánh nguyet', NULL, 'Hiệu trưởng', '', 54, 'Vũ Tiến, Vũ Thư,  Thái Bình', 'truongmamnonvutien@gmail.com', '84986295059', 1, 'active'),
(110, '2019-05-18 04:53:40', '2019-05-18 04:57:21', NULL, 134, 1, 0, 0, '84974888452', 'Phan cường', '1985-06-15 00:00:00', 'Ông chủ', '', 40, 'Bình dân mỹ tân', 'phancuong0606@gmail.com', '84974888452', 1, 'active'),
(111, '2019-05-18 08:16:36', '2019-05-18 08:17:15', NULL, 135, 1, 0, 0, '84963375444', 'Võ ngọc tú', '2019-05-18 00:00:00', 'Nhân voen', '', 30, '111/111', 'tuvo910@gmail.com', '84963375444', 1, 'active'),
(112, '2019-05-19 01:23:53', '2019-05-19 01:26:23', NULL, 136, 1, 0, 0, '84902801647', 'Phạm thi thu thủy', '1988-03-15 00:00:00', 'Quản lý', '', 30, 'Kp1B an phu thuận an bình dương', 'thuyaobo@gmail.com', '84902801647', 1, 'active'),
(113, '2019-05-19 02:24:53', '2019-05-20 01:13:24', NULL, 137, 1, 0, 0, '84919470999', 'Đặng Hoài Thương', NULL, 'Nhân viên', 'Danh Hùng', 30, '124/18, Đường 3/2, Xuân Khánh, Ninh Kiều, TP Cần Thơ', 'hoaithuong0712@gmail.com', '84919470999', 1, 'active'),
(114, '2019-05-19 03:44:34', '2019-05-20 22:12:04', NULL, 138, 1, 0, 0, '84903395506', 'Nguyễn Đăng Khôi', '2002-05-20 00:00:00', 'Nghỉ hưu', 'Gia đình', 30, 'Kp 2, q2', 'khoik14@gmail.com', '84903395506', 1, 'active'),
(115, '2019-05-19 05:37:07', '2019-05-19 05:37:48', NULL, 139, 1, 0, 0, '84776666890', 'Ken', NULL, 'It', '', 30, 'Q9', 'phamtung2140@gmail.com', '84776666890', 1, 'active'),
(116, '2019-05-19 08:10:28', '2019-05-19 08:10:28', NULL, 140, 1, 0, 0, '84989723577', NULL, NULL, NULL, '', NULL, NULL, NULL, '84989723577', 1, 'active'),
(117, '2019-05-19 12:22:26', '2019-05-19 12:22:26', NULL, 141, 1, 0, 0, '84908128113', NULL, NULL, NULL, '', NULL, NULL, NULL, '84908128113', 1, 'active'),
(124, '2019-05-21 03:43:37', '2019-05-21 03:46:07', NULL, 163, 1, 0, 0, '84931494449', 'Long', '1995-05-21 00:00:00', 'Hhfhfjdj', 'Long', 30, '465 cmhdhb', 'meohere@gmail.com', '84931494449', 1, 'active'),
(119, '2019-05-21 02:52:31', '2019-05-22 05:42:19', NULL, 158, 1, 460, 60, '84947052246', 'Nguyễn Chí Thanh Bình', '1990-05-22 00:00:00', 'Nhân viên hỗ trợ kỹ thuật', 'KBVISION VIỆT NAM', 30, '278 Lũy Bán Bích, Tân Phú', 'nctb@gmail.com', '84947052246', 1, 'active'),
(120, '2019-05-21 02:59:31', '2019-05-21 02:59:31', NULL, 159, 1, 0, 0, '84919230099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84919230099', 1, 'active'),
(121, '2019-05-21 03:14:36', '2019-05-21 03:14:36', NULL, 160, 1, 0, 0, '84937887896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84937887896', 1, 'active'),
(122, '2019-05-21 03:16:25', '2019-05-21 03:16:25', NULL, 161, 1, 0, 0, '886985182186', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '886985182186', 1, 'active'),
(125, '2019-05-21 12:00:23', '2019-05-21 12:00:23', NULL, 164, 1, 0, 0, '84987999947', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84987999947', 1, 'active'),
(126, '2019-05-21 12:00:46', '2019-05-21 12:02:32', NULL, 165, 1, 0, 0, '84987779548', 'Phạm Hồng Chuyên', '2019-05-21 00:00:00', 'Giám Đốc', 'Cổ phần Phát triển công nghệ Đại Vũ', 24, 'Số 7 ngõ 71 Đại Vũ', 'phamhongchuyen0908@gmail.com', '84987779548', 1, 'active'),
(127, '2019-05-21 12:01:52', '2019-05-21 12:01:52', NULL, 166, 1, 0, 0, '84904618869', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84904618869', 1, 'active'),
(128, '2019-05-21 12:02:13', '2019-05-21 12:04:14', NULL, 167, 1, 0, 0, '84987764546', 'Nguyễn Thành Luân', '2017-05-27 00:00:00', 'Phó Giám Đốc', 'Công ty TNHH Thương Mại và Dịch Vụ NTL Việt Nam', 24, 'Số 25 - Ngõ 1194 Đường Láng - P. Láng Thượng - Đống Đa - Hà Nội', 'congtyntlvietnam@gmail.com', '84987764546', 1, 'active'),
(129, '2019-05-21 12:04:07', '2019-05-21 12:04:07', NULL, 168, 1, 0, 0, '84976949666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84976949666', 1, 'active'),
(130, '2019-05-21 12:05:36', '2019-05-21 12:05:36', NULL, 169, 1, 0, 0, '84919915283', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84919915283', 1, 'active'),
(131, '2019-05-21 13:30:08', '2019-05-21 13:30:08', NULL, 170, 1, 0, 0, '84798091088', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84798091088', 1, 'active'),
(132, '2019-05-21 15:29:51', '2019-05-21 15:32:20', NULL, 171, 1, 0, 0, '84983670567', 'Mai Xuân Lực', '2019-05-21 00:00:00', 'Giám đốc', 'Bảo Long', 31, 'Mỹ Phước, Bến Cát, Bình Dương', 'maixuanluc0206@gmail.com', '84983670567', 1, 'active'),
(133, '2019-05-21 16:10:47', '2019-05-21 16:12:35', NULL, 172, 1, 0, 0, '84828428255', 'Tổ Bố', '1975-09-07 00:00:00', 'Gd', 'Tobocompany', 24, 'Hno', '885454@gmail.com', '84828428255', 1, 'active'),
(134, '2019-05-22 01:59:14', '2019-05-22 02:00:34', NULL, 173, 1, 0, 0, '84938144899', 'Nguyen Thi Thu Ha', '2019-05-22 00:00:00', 'Giam doc', 'Cong ty Kbvision', 30, '278 luy ban Bích , p hoa thanh , quan tan phu', 'ha.nguyen@questekvietnam.vn', '84938144899', 1, 'active'),
(135, '2019-05-22 02:01:23', '2019-05-22 02:01:23', NULL, 174, 1, 0, 0, '84901497080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84901497080', 1, 'active'),
(136, '2019-05-22 02:06:59', '2019-05-22 04:05:17', NULL, 175, 1, 0, 0, '84868903390', 'Trần minh hải', '1992-09-01 00:00:00', NULL, NULL, 30, '262/16 lũy bán Bích, p.hoà thạnh, q.tân phú', 'mrhailua92tg@gmail.com', '84868903390', 1, 'active'),
(137, '2019-05-22 02:15:40', '2019-05-22 02:16:37', NULL, 176, 1, 0, 0, '84906711594', 'Đỗ thị ngọc thạch', '2019-05-22 00:00:00', 'Thu ký', 'Kbvision', 30, '278 luỹ bán bích', 'thach.do@questekvietnm.vn', '84906711594', 1, 'active'),
(138, '2019-05-22 02:17:53', '2019-05-22 02:17:53', NULL, 177, 1, 0, 0, '84764602139', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84764602139', 1, 'active'),
(139, '2019-05-22 02:18:08', '2019-05-22 02:27:43', NULL, 178, 1, 0, 0, '84932685337', 'Nguyễn Hữu Thông', '1991-07-20 00:00:00', 'NVKD', 'KBVision Việt Nam', 30, '278 Luỹ Bán Bích, Tân Phú, HCM', 'thong.nguyen@kbvision.vn', '84932685337', 1, 'active'),
(140, '2019-05-22 03:28:13', '2019-05-22 03:28:13', NULL, 179, 1, 0, 0, '84921543081', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84921543081', 1, 'active'),
(141, '2019-05-22 04:41:23', '2019-05-22 09:09:35', NULL, 180, 1, 10000, 9700, '84932685812', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84932685812', 1, 'active'),
(142, '2019-05-22 09:40:19', '2019-05-22 09:42:11', NULL, 181, 1, 0, 0, '84985777007', 'Bùi Khắc Phương', '2019-05-22 00:00:00', 'Chủ cửa hàng', 'Cửa hàng điện tử tin học Bùi Khắc Phương', 42, 'Xích Thổ - Nho Quan - Ninh Bình', 'buikhacphuong@gmail.com', '84985777007', 1, 'active'),
(143, '2019-05-22 15:48:38', '2019-05-22 15:48:38', NULL, 182, 1, 0, 0, '84945936946', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84945936946', 1, 'active'),
(144, '2019-05-22 16:10:26', '2019-05-22 16:15:44', NULL, 183, 1, 0, 0, '84906609077', 'Lâm Quốc Việt', '1985-06-24 00:00:00', 'Giám Đốc', 'CT TNHH TBVP Lâm Gia Phát', 30, '52/4 TX 21 KP5 P Thạnh Xuân Q12', 'lamviet1985@gmail.com', '84906609077', 1, 'active'),
(145, '2019-05-22 16:18:35', '2019-05-22 16:19:40', NULL, 184, 1, 0, 0, '84937383783', 'Nguyễn hữu trí', '2002-05-16 00:00:00', 'Nhan vien', 'Kim son', 30, 'Abc', 'hatemannguyen@gmail.com', '84937383783', 1, 'active'),
(146, '2019-05-22 16:36:04', '2019-05-22 16:36:04', NULL, 185, 1, 0, 0, '84988504949', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84988504949', 1, 'active'),
(147, '2019-05-22 20:15:45', '2019-05-22 20:15:45', NULL, 186, 1, 0, 0, '84769608603', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84769608603', 1, 'active'),
(148, '2019-05-23 02:53:05', '2019-05-23 02:56:09', NULL, 187, 1, 0, 0, '84985966441', 'Nông thắm', '2002-05-16 00:00:00', 'Nhan vien', 'Sao mai', 4, 'Huyen tung bac kan', 'thambk85@gmail.com', '84985966441', 1, 'active'),
(149, '2019-06-11 05:13:20', '2019-06-11 05:13:20', NULL, 189, 1, 0, 0, '84909604665', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '84909604665', 1, 'active'),
(150, '2019-06-19 20:29:47', '2019-06-19 20:29:47', NULL, 190, 1, 0, 0, '+84949638481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+84949638481', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `member_currency`
--

DROP TABLE IF EXISTS `member_currency`;
CREATE TABLE IF NOT EXISTS `member_currency` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `member_id` int(10) UNSIGNED DEFAULT NULL,
  `accumulate` int(10) UNSIGNED DEFAULT NULL,
  `redeempoint` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `member_currency`
--

TRUNCATE TABLE `member_currency`;
-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `issuer_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'news',
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `external` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `messages`
--

TRUNCATE TABLE `messages`;
--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `created_at`, `updated_at`, `deleted_at`, `content`, `title`, `media_id`, `status`, `issuer_id`, `type`, `hot`, `sort`, `external`) VALUES
(1, '2019-04-19 16:12:09', '2019-04-26 06:20:33', NULL, 'Trình mã quà tặng khi tới nhận quà', 'Nón bảo hiểm', 2, 'active', 1, 'promotion', 0, 0, NULL),
(2, '2019-04-19 16:25:35', '2019-04-19 16:25:35', NULL, NULL, 'Áo  mưa cánh dơi', NULL, 'draft', 1, 'promotion', 0, 0, NULL),
(3, '2019-05-04 07:13:39', '2019-05-20 14:05:35', '2019-05-20 14:05:35', 'Khi quyết định lắp đặt một hệ thống camera giám sát chuyên nghiệp cũng là lúc chúng ta nên sẵn sàng cho hàng loạt các lựa chọn vì hệ thống CCTV bao gồm rất nhiều thức khác ngoài camera. Ổ cứng HDD cũng là một trong những thành phần vô cùng quan trọng. Để có hệ thống camera hoạt động tốt nhất, hình ảnh, video được lưu trữ đầy đủ và dài hạn, chúng ta cần lựa chọn loại ổ cứng chuyên dụng phù hợp cả về nhu cầu và túi tiền.', 'MỪNG ĐẠI LỄ 30/4 CÙNG KBVISION – MUA Ổ CỨNG TOSHIBA VỚI GIÁ SIÊU RẺ', 7, 'active', 1, 'news', 0, 0, 'https://kbvision.vn/2019/04/16/mung-dai-le-304-cung-kbvision-mua-o-cung-toshiba-voi-gia-sieu-re/'),
(4, '2019-05-08 02:45:20', '2019-05-20 14:06:25', '2019-05-20 14:06:25', 'Mũ bảo hiểm 1234', 'Nón bảo hiểm abc', 23, 'active', 1, 'promotion', 0, 0, NULL),
(7, '2019-05-08 05:23:04', '2019-06-23 00:05:56', NULL, 'dasdsd', 'Quét mã nhận điểm', NULL, 'draft', 1, 'promotion', 0, 0, NULL),
(8, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, NULL, 'Xổ số trúng thưởng', NULL, 'draft', 1, 'promotion', 0, 0, NULL),
(9, '2019-05-15 04:25:48', '2019-05-15 16:16:08', '2019-05-15 16:16:08', 'test nội dung', 'Test tin tức', 12, 'active', 1, 'news', 0, 0, NULL),
(10, '2019-05-16 01:25:41', '2019-05-16 01:36:22', '2019-05-16 01:36:22', NULL, 'KX-2011N2', NULL, 'draft', 1, 'news', 1, 0, NULL),
(11, '2019-05-16 01:52:44', '2019-05-16 01:58:56', '2019-05-16 01:58:56', NULL, 'Demo new', NULL, 'draft', 1, 'news', 0, 0, NULL),
(12, '2019-05-16 01:59:02', '2019-05-16 02:28:18', '2019-05-16 02:28:18', NULL, 'Test tin tức', NULL, 'draft', 1, 'news', 0, 0, NULL),
(13, '2019-05-16 04:35:16', '2019-05-16 04:37:54', '2019-05-16 04:37:54', 'ádasd', 'Test tin tức', 20, 'active', 1, 'news', 0, 0, 'https://www.google.com/'),
(14, '2019-05-16 07:34:42', '2019-05-23 01:50:58', NULL, '<p>&nbsp;<span style=\"font-size: 1rem;\">Thời gian khuyến mãi: từ 13/5/2019 đến hết ngày 25/5/2019 hoặc đến khi hết hàng). Áp dụng: toàn bộ khách hàng Đại lý cả nước . Hình thức thanh toán: Tiền mặt hoặc Chuyển khoản . Áp dụng sản phẩm: Ổ cứng Toshiba – Hàng chính hãng – Bảo hành 36 tháng.</span></p>', 'CƠN SỐT Ổ CỨNG TOSHIBA DUY NHẤT 13 NGÀY', 21, 'active', 1, 'news', 0, 0, 'https://kbvision.vn/2019/05/13/con-sot-o-cung-toshiba-duy-nhat-13-ngay/'),
(15, '2019-05-21 01:22:32', '2019-05-21 02:28:44', NULL, 'Quà đổi thưởng', 'Nón bảo hiểm', 50, 'active', 1, 'promotion', 0, 0, NULL),
(16, '2019-05-21 01:39:53', '2019-05-23 01:51:56', NULL, '<p>Lịch trình các địa điểm diễn ra KB-Road Show 11/5/2019: số 2080 Đại Lộ Hùng Vương, Thành Phố Cam Ranh, Tỉnh Khánh Hoà. 18/5/2019: số 89 Phan Đình Phùng, Thành phố Pleiku, Tỉnh Gia Lai. 24/5/2019 &amp; 25/5/2019: Lâm Đồng 31/5/2019: Bà Rịa – Vũng Tàu KBVISION hân hạnh đón chào tất cả quý khách hàng đến tham gia chương trình để có những kiến thức bổ ích về CCTV!</p>', 'CẬP NHẬT LỊCH TRÌNH KB-ROAD SHOW THÁNG 5/2019', 26, 'active', 1, 'news', 0, 0, NULL),
(17, '2019-05-21 01:51:12', '2019-05-21 01:52:07', NULL, 'Camera Starlight là camera giám sát với khả năng đặc biệt làm chậm màn trập điện tử của nó để thu được nhiều ánh sáng hơn cho bộ chip CCD của camera, cho phép chúng quay video màu trong điều kiện ánh sáng yếu. Thông thường, các camera IR thường chuyển sang đen trắng vào ban đêm để giảm thiểu nhiễu và biến dạng hình ảnh, nhưng với camera Starlight, hình ảnh vẫn giữ được màu sắc cho chất lượng nhận diện khuôn mặt rõ ràng hơn vào ban đêm so với công nghệ cũ.', 'STARLIGHT SERIES – DÒNG CAMERA “ĐẬP TAN BÓNG TỐI” BẰNG CÔNG NGHỆ VƯỢT TRỘI', 27, 'active', 1, 'news', 0, 0, 'https://kbvision.vn/2019/04/26/starlight-series-dong-camera-dap-tan-bong-toi-bang-cong-nghe-vuot-troi/'),
(18, '2019-05-21 01:53:15', '2019-05-21 01:53:31', NULL, 'Công nghệ cảm biến PIR là gì?\r\nPIR sensor alarm là viết tắt của Passive Infra-Red sensor là một cảm biến thụ động cấu tạo bởi nguồn kích thích là tia hồng ngoại. Tia hồng ngoại (IR) chính là các tia nhiệt phát ra từ các vật thể nóng. Trên thực tế, trong các cơ thể sống và ngay cả trong con người luôn có thân nhiệt (thông thường là ở 37 độ C), các tia nhiệt được hình thành dựa theo đó và liên tục phát ra trong quá trình chúng ta hoạt động, hay còn gọi là các tia hồng ngoại.', 'ỨNG DỤNG CÔNG NGHỆ CẢM BIẾN THÔNG MINH PIR TRONG CAMERA KBVISION', 28, 'active', 1, 'news', 0, 0, 'https://kbvision.vn/2019/05/13/ung-du%CC%A3ng-cong-nghe%CC%A3-ca%CC%89m-bien-thong-minh-pir-trong-camera-kbvision/'),
(19, '2019-05-21 01:54:29', '2019-05-21 01:54:58', NULL, 'KBWIN là dòng sản phẩm camera IP wifi hiện đại đang nằm trong top sản phẩm camera xu hướng 2019-2020 trên thị trường hiện nay. Cơn sốt “KBWIN” vẫn chưa có dấu hiệu ngưng lại nhờ vào những tính năng cũng như sự tiện dụng của camera này:\r\n\r\n✔ Có thể tự lắp đặt dễ dàng, không cần thợ chuyên môn\r\n\r\n✔ Hình ảnh video và âm thanh chuẩn mượt\r\n\r\n✔ Quan sát ban đêm rõ nét\r\n\r\n✔ Lưu trữ tiết kiệm băng thông trực tiếp trên thẻ nhớ\r\n\r\n✔ Báo động khi có người lạ đột nhập', 'HƯỚNG DẪN LẮP ĐẶT VÀ KẾT NỐI CAMERA WIFI KBWIN ĐƠN GIẢN NHẤT', 29, 'active', 1, 'news', 0, 0, 'https://kbvision.vn/2019/04/22/huong-dan-lap-dat-va-ket-noi-camera-wifi-kbwin-don-gian-nhat/'),
(20, '2019-05-21 01:55:28', '2019-06-04 00:59:15', NULL, 'Đầu ghi IP POE là một dòng sản phẩm tiên tiến nhất hiện nay với công nghệ POE. Nó là công nghệ cho phép truyền tải nguồn điện trực tiếp trên sợi cáp mạng (Cable RJ45) đến các thiết bị điện tử có cổng Ethernet. Với công nghệ POE tích hợp trong đầu ghi sẽ giúp việc thu thập dữ liệu hình ảnh âm thanh từ camera chất lượng cao nhất, đơn giãn trong thi công, tính thẩm mỹ cao và đồng thời giúp giảm thiểu tối đa cáp nguồn cho hệ thống camera với chỉ cần một sợi dây cáp mạng.', 'Đầu Ghi IP POE-Công Nghệ Mới Cho Lựa Chọn Hoàn Hảo', 30, 'active', 1, 'news', 0, 0, 'https://kbvision.vn/2019/03/28/dau-ghi-ip-poe/'),
(21, '2019-05-21 02:03:27', '2019-05-21 02:03:42', NULL, NULL, 'Xe đạp điện', 32, 'active', 1, 'promotion', 0, 0, NULL),
(22, '2019-05-21 02:04:17', '2019-05-21 02:04:27', NULL, NULL, 'Xe SH', 33, 'active', 1, 'promotion', 0, 0, NULL),
(23, '2019-05-21 02:04:37', '2019-05-21 02:04:44', NULL, NULL, 'Áo thun', 34, 'active', 1, 'promotion', 0, 0, NULL),
(24, '2019-05-21 02:05:11', '2019-05-21 02:21:23', NULL, NULL, 'Bộ tool chuyển', 43, 'active', 1, 'promotion', 0, 0, NULL),
(25, '2019-05-21 02:05:36', '2019-05-21 02:21:35', NULL, NULL, 'KW-H1', 44, 'active', 1, 'promotion', 0, 0, NULL),
(26, '2019-05-21 02:06:00', '2019-05-21 03:07:12', '2019-05-21 03:07:12', NULL, 'KW-H2', 45, 'active', 1, 'promotion', 0, 0, NULL),
(27, '2019-05-21 02:06:38', '2019-05-21 03:07:18', '2019-05-21 03:07:18', NULL, 'KX-H10PWN', 42, 'active', 1, 'promotion', 0, 0, NULL),
(28, '2019-05-21 02:07:18', '2019-05-21 02:07:48', NULL, NULL, 'KX-H10WN', 39, 'active', 1, 'promotion', 0, 0, NULL),
(29, '2019-05-21 02:08:09', '2019-05-21 02:09:07', NULL, NULL, 'KX-H13WN', 40, 'active', 1, 'promotion', 0, 0, NULL),
(30, '2019-05-21 02:26:41', '2019-05-21 02:26:49', NULL, NULL, 'Tivi', 47, 'active', 1, 'promotion', 0, 0, NULL),
(31, '2019-05-21 02:27:02', '2019-05-21 02:27:09', NULL, NULL, 'Iphone X', 48, 'active', 1, 'promotion', 0, 0, NULL),
(32, '2019-05-21 02:27:31', '2019-05-21 02:28:40', NULL, NULL, 'Galaxy Note 9', 49, 'active', 1, 'promotion', 0, 0, NULL),
(33, '2019-05-22 04:23:24', '2019-05-22 04:26:17', NULL, 'KW-H1 giá cũ 990.000đ nay chỉ còn 890.000đ\r\n\r\n. KW-H2 giá cũ 1.490.000đ nay chỉ còn 1.340.000đ\r\n\r\n. Đặc biệt mua 1 Camera TẶNG kèm 1 Thẻ nhớ\r\n\r\n. Giá mới áp dụng từ 21/5/2019 đến khi có giá mới\r\n\r\n. Hàng chất lượng – Giá tốt – Tặng kèm thẻ nhớ', 'KBWIN CẬP NHẬT GIÁ MỚI SIÊU HOT', 51, 'active', 1, 'news', 1, 0, 'https://kbvision.vn/2019/05/22/kbwin-cap-nhat-gia-moi-sieu-hot/'),
(37, '2019-06-22 23:47:20', '2019-06-23 00:02:31', NULL, 'Công nghệ chống nắng dưỡng da chuyên nghiệp', 'Chống nắng dưỡng da chuyên nghiệp', 54, 'active', 1, 'promotion', 1, 0, ''),
(38, '2019-06-23 00:05:34', '2019-06-23 00:05:34', NULL, NULL, 'Tiêu đề', NULL, 'draft', 1, 'news', 0, 0, NULL),
(39, '2019-06-23 00:05:52', '2019-06-23 00:05:52', NULL, NULL, 'Tiêu đề', NULL, 'draft', 1, 'news', 0, 0, NULL),
(40, '2019-06-23 00:13:02', '2019-06-23 00:13:02', NULL, NULL, 'Tiêu đề', NULL, 'draft', 1, 'news', 0, 0, NULL),
(41, '2019-06-23 01:00:45', '2019-06-23 01:05:50', NULL, 'Tiêu đề nek', 'Tiêu đề', 55, 'active', 1, 'promotion', 1, 0, ''),
(42, '2019-06-23 01:06:15', '2019-06-23 01:06:15', NULL, 'upgrade nek', 'Upgrade', 56, 'active', 1, 'promotion', 1, 0, ''),
(43, '2019-06-23 01:07:25', '2019-06-23 01:07:25', NULL, 'Tiêu đề 2', 'Tiêu đề 2', 57, 'active', 1, 'promotion', 1, 0, ''),
(44, '2019-06-26 01:15:35', '2019-06-26 03:59:04', NULL, 'Reward Content', 'Reward', 58, 'active', 1, 'promotion', 0, 0, ''),
(45, '2019-06-26 01:28:07', '2019-06-26 05:06:38', NULL, 'Redeem 1', 'Redeem 1', 59, 'active', 1, 'promotion', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `messages_cards`
--

DROP TABLE IF EXISTS `messages_cards`;
CREATE TABLE IF NOT EXISTS `messages_cards` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `card_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_cards_card_id_foreign` (`card_id`),
  KEY `messages_cards_message_id_foreign` (`message_id`),
  KEY `messages_cards_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `messages_cards`
--

TRUNCATE TABLE `messages_cards`;
-- --------------------------------------------------------

--
-- Table structure for table `messages_members`
--

DROP TABLE IF EXISTS `messages_members`;
CREATE TABLE IF NOT EXISTS `messages_members` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `messages_members`
--

TRUNCATE TABLE `messages_members`;
-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_03_26_040751_create_sessions_table', 1),
(3, '2014_10_12_000000_create_users_table', 2),
(4, '2019_03_05_070629_create_domains_table', 2),
(5, '2019_03_05_101853_create_access_table', 3),
(6, '2019_03_22_033442_create_countries_table', 3),
(7, '2019_03_23_024949_create_cities_table', 3),
(8, '2019_03_23_050554_create_groups_table', 3),
(9, '2019_03_10_075021_create_posts_table', 4),
(10, '2019_03_10_075204_create_medias_table', 4),
(11, '2019_03_11_153101_create_issuers_table', 5),
(12, '2019_03_23_074818_create_messages_table', 6),
(13, '2019_03_23_074908_create_cards_table', 6),
(14, '2019_03_25_093930_create_locations_table', 7),
(15, '2019_03_25_150746_create_promotions_table', 7),
(16, '2019_03_25_151931_create_promotions_groups_table', 7),
(17, '2019_03_25_152219_create_promotions_locations_table', 7),
(18, '2019_03_25_152715_create_promotions_points_table', 7),
(19, '2019_03_25_153102_create_promotions_publishs_table', 8),
(20, '2019_03_25_154208_create_promotions_releases_table', 8),
(21, '2019_03_25_155435_create_missions_table', 9),
(22, '2019_03_26_004041_create_messages_cards_table', 9),
(23, '2019_03_26_004245_create_messages_members_table', 10),
(24, '2019_03_25_155404_create_promotions_missions_table', 11),
(25, '2019_04_01_041602_create_alters_table', 12),
(26, '2019_04_02_042212_create_kbv_missions_table', 13),
(39, '2014_10_12_100000_create_password_resets_table', 14),
(45, '2016_06_01_000001_create_oauth_auth_codes_table', 15),
(46, '2016_06_01_000002_create_oauth_access_tokens_table', 15),
(47, '2016_06_01_000003_create_oauth_refresh_tokens_table', 15),
(48, '2016_06_01_000004_create_oauth_clients_table', 15),
(49, '2016_06_01_000005_create_oauth_personal_access_clients_table', 15),
(50, '2019_07_09_014306_create_interacts_table', 16),
(51, '2019_07_09_015644_add_promotion_id_to_interacts_table', 17),
(52, '2019_07_16_140535_create_stocks_table', 18),
(53, '2019_04_24_090802_create_sms_table', 19),
(54, '2019_05_06_004711_create_kbv_setting_table', 19),
(55, '2019_05_08_060135_create_kbv_lucky_table', 19),
(56, '2019_05_10_164100_create_kbv_release_table', 19),
(57, '2019_05_14_012652_create_lotteries_table', 19),
(61, '2019_07_17_122725_create_currency_table', 20),
(62, '2019_07_17_122744_create_member_currency_table', 20),
(63, '2019_07_18_035755_create_promotion_currency_table', 20),
(64, '2019_07_19_094925_add_currency_id_to_transactions_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

DROP TABLE IF EXISTS `missions`;
CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `missions_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `missions`
--

TRUNCATE TABLE `missions`;
--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `code`, `link`, `status`, `issuer_id`) VALUES
(3, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, 'Quét mã nhận điểm', 'scancode', 'https://kbv-is.lifeplusloyalty.vn/screen/game/scancode', 'active', 1),
(4, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, 'Xổ số trúng thưởng', 'luckyno', 'https://kbv-is.lifeplusloyalty.vn/screen/game/luckyno', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_access_tokens`
--

TRUNCATE TABLE `oauth_access_tokens`;
--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('009257c56e8ce961a0a704de9402f7ffa6bca78b622b1ce0e532e91956dcf914952576185f6c9b58', 190, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-19 20:29:48', '2019-06-19 20:29:48', '2020-06-20 03:29:48'),
('5470bf19353a2bca831aa49599d3e14186ff41c1919780cb23842eb8a8925e566e6e6b1a87977784', 189, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:13:20', '2019-06-11 05:13:20', '2020-06-11 12:13:20'),
('8a1e5ff63e057d46d3ed2db30a6764acf2759614ed9b0489822e7661a2f28a7c928a33aac4c071de', 189, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:14:21', '2019-06-11 05:14:21', '2020-06-11 12:14:21'),
('a2ad112d8c8f1072d2058c6f81db8ebe83079ea3e333ed1568e1da073485ea573bc00fb4b738dc08', 189, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:13:38', '2019-06-11 05:13:38', '2020-06-11 12:13:38'),
('ada05d09c6ca63171b5582276d586f9540197af9717320a31863e206edd105ff630050febcf098af', 189, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:13:44', '2019-06-11 05:13:44', '2020-06-11 12:13:44'),
('c2a04a155cb2e5665932465c3fbe5a6bd09b8e843bb4763c4f4ea6acab16703deda5b8a59c62acad', 188, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:07:58', '2019-06-11 05:07:58', '2020-06-11 12:07:58'),
('c451da04f4a8a67dab5a9c4ad440702a4d37f74db1f1d8ee177e4684da360da9e9e2f0c732892734', 189, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:13:45', '2019-06-11 05:13:45', '2020-06-11 12:13:45'),
('ee722fcd1dce7c39fdfa55385a89b0d7cdbe714bf834c180608e8d1e20c83622fe0a998dc843e46c', 190, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-19 20:35:18', '2019-06-19 20:35:18', '2020-06-20 03:35:18'),
('f6bbb986688cdafe437f12726842d43d42c4f500f333308b91bac0218d9b6b52fee6f712e98ed94e', 189, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:56:28', '2019-06-11 05:56:28', '2020-06-11 12:56:28'),
('fc92ece042d274dd8b1eaa8a28c796a8258cedf610ec461e23713d30e0b0fc31d8b068bd12529b7b', 188, 1, 'LIFEPLUSLOYALTY_TOKEN', '[]', 0, '2019-06-11 05:08:38', '2019-06-11 05:08:38', '2020-06-11 12:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_auth_codes`
--

TRUNCATE TABLE `oauth_auth_codes`;
-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_clients`
--

TRUNCATE TABLE `oauth_clients`;
--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'xDa7B0vHSDCmQvgM8CNnBHhqlh8Hp6rj5MVaKelv', 'http://localhost', 1, 0, 0, '2019-06-11 05:07:55', '2019-06-11 05:07:55'),
(2, NULL, 'Laravel Password Grant Client', 'b0HYAbAnqCDO1lUzE6edZ8M3dy23Ypfoof23MC7a', 'http://localhost', 0, 1, 0, '2019-06-11 05:07:55', '2019-06-11 05:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_personal_access_clients`
--

TRUNCATE TABLE `oauth_personal_access_clients`;
--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-06-11 05:07:55', '2019-06-11 05:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_refresh_tokens`
--

TRUNCATE TABLE `oauth_refresh_tokens`;
-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `national` int(11) NOT NULL DEFAULT '84',
  `number` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `phones`
--

TRUNCATE TABLE `phones`;
--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `national`, `number`, `phone`) VALUES
(31, '2019-05-06 01:46:19', '2019-05-06 01:46:19', NULL, 70, 84, 909196195, 84909196195),
(30, '2019-05-05 08:25:26', '2019-05-05 08:25:26', NULL, 69, 84, 948554838, 84948554838),
(29, '2019-05-05 04:41:53', '2019-05-05 04:41:53', NULL, 68, 84, 336927083, 84336927083),
(28, '2019-05-04 04:00:51', '2019-05-04 04:00:51', NULL, 67, 84, 906721706, 84906721706),
(27, '2019-05-04 01:50:31', '2019-05-04 01:50:31', NULL, 66, 84, 914150069, 84914150069),
(26, '2019-05-03 23:59:57', '2019-05-03 23:59:57', NULL, 65, 84, 939012089, 84939012089),
(25, '2019-05-03 16:16:53', '2019-05-03 16:16:53', NULL, 64, 84, 975559319, 84975559319),
(24, '2019-05-03 16:15:13', '2019-05-03 16:15:13', NULL, 63, 84, 353639234, 84353639234),
(23, '2019-05-03 13:18:55', '2019-05-03 13:18:55', NULL, 62, 84, 908043337, 84908043337),
(22, '2019-05-03 10:02:58', '2019-05-03 10:02:58', NULL, 61, 84, 348054524, 84348054524),
(21, '2019-05-03 09:27:59', '2019-05-03 09:27:59', NULL, 60, 84, 983333297, 84983333297),
(20, '2019-05-03 07:58:48', '2019-05-03 07:58:48', NULL, 59, 84, 937394545, 84937394545),
(19, '2019-05-03 07:43:04', '2019-05-03 07:43:04', NULL, 58, 84, 985377191, 84985377191),
(18, '2019-05-03 07:38:28', '2019-05-03 07:38:28', NULL, 57, 84, 915750212, 84915750212),
(17, '2019-05-03 07:08:28', '2019-05-03 07:08:28', NULL, 56, 84, 916700848, 84916700848),
(32, '2019-05-06 01:52:51', '2019-05-06 01:52:51', NULL, 71, 84, 902609111, 84902609111),
(33, '2019-05-06 02:02:52', '2019-05-06 02:02:52', NULL, 72, 84, 886989796, 84886989796),
(34, '2019-05-06 02:54:08', '2019-05-06 02:54:08', NULL, 73, 84, 909257455, 84909257455),
(35, '2019-05-06 03:00:02', '2019-05-06 03:00:02', NULL, 74, 84, 968848865, 84968848865),
(36, '2019-05-06 03:12:31', '2019-05-06 03:12:31', NULL, 75, 84, 928365242, 84928365242),
(37, '2019-05-06 03:16:46', '2019-05-06 03:16:46', NULL, 76, 84, 911506399, 84911506399),
(38, '2019-05-06 10:12:47', '2019-05-06 10:12:47', NULL, 77, 84, 936070805, 84936070805),
(39, '2019-05-06 11:36:34', '2019-05-06 11:36:34', NULL, 78, 84, 964764025, 84964764025),
(40, '2019-05-06 16:13:11', '2019-05-06 16:13:11', NULL, 79, 84, 942206070, 84942206070),
(41, '2019-05-08 15:28:55', '2019-05-08 15:28:55', NULL, 81, 84, 377093550, 84377093550),
(42, '2019-05-09 06:28:16', '2019-05-09 06:28:16', NULL, 82, 84, 336220929, 84336220929),
(43, '2019-05-09 07:03:45', '2019-05-09 07:03:45', NULL, 83, 84, 899672911, 84899672911),
(44, '2019-05-09 10:10:46', '2019-05-09 10:10:46', NULL, 84, 84, 908165242, 84908165242),
(45, '2019-05-10 16:44:55', '2019-05-10 16:44:55', NULL, 85, 84, 814757574, 84814757574),
(46, '2019-05-11 01:54:01', '2019-05-11 01:54:01', NULL, 86, 84, 978000013, 84978000013),
(47, '2019-05-11 02:06:32', '2019-05-11 02:06:32', NULL, 87, 84, 349522010, 84349522010),
(48, '2019-05-11 08:47:26', '2019-05-11 08:47:26', NULL, 88, 84, 931100133, 84931100133),
(49, '2019-05-11 09:23:53', '2019-05-11 09:23:53', NULL, 91, 1, 7016453388, 17016453388),
(50, '2019-05-13 02:57:51', '2019-05-13 02:57:51', NULL, 92, 84, 938506206, 84938506206),
(51, '2019-05-13 04:35:49', '2019-05-13 04:35:49', NULL, 93, 84, 988308520, 84988308520),
(52, '2019-05-13 04:52:54', '2019-05-13 04:52:54', NULL, 94, 84, 987718718, 84987718718),
(53, '2019-05-13 05:21:50', '2019-05-13 05:21:50', NULL, 95, 84, 907223715, 84907223715),
(54, '2019-05-13 07:56:18', '2019-05-13 07:56:18', NULL, 96, 84, 374339469, 84374339469),
(55, '2019-05-13 07:56:27', '2019-05-13 07:56:27', NULL, 97, 84, 909183689, 84909183689),
(56, '2019-05-13 10:10:56', '2019-05-13 10:10:56', NULL, 98, 84, 907970230, 84907970230),
(57, '2019-05-13 16:09:35', '2019-05-13 16:09:35', NULL, 99, 1, 4084766514, 14084766514),
(58, '2019-05-14 02:01:11', '2019-05-14 02:01:11', NULL, 100, 84, 898312383, 84898312383),
(59, '2019-05-14 02:08:35', '2019-05-14 02:08:35', NULL, 101, 84, 773822664, 84773822664),
(60, '2019-05-14 09:22:40', '2019-05-14 09:22:40', NULL, 102, 84, 919464436, 84919464436),
(61, '2019-05-14 10:02:01', '2019-05-14 10:02:01', NULL, 103, 84, 366402778, 84366402778),
(62, '2019-05-14 14:18:25', '2019-05-14 14:18:25', NULL, 104, 84, 978501968, 84978501968),
(63, '2019-05-15 00:06:37', '2019-05-15 00:06:37', NULL, 105, 84, 868605792, 84868605792),
(64, '2019-05-15 02:03:15', '2019-05-15 02:03:15', NULL, 106, 84, 84909257455, 8484909257455),
(65, '2019-05-15 06:11:41', '2019-05-15 06:11:41', NULL, 107, 84, 908998976, 84908998976),
(66, '2019-05-15 08:13:23', '2019-05-15 08:13:23', NULL, 108, 84, 981847945, 84981847945),
(67, '2019-05-15 10:26:39', '2019-05-15 10:26:39', NULL, 109, 84, 911430000, 84911430000),
(68, '2019-05-15 22:49:52', '2019-05-15 22:49:52', NULL, 110, 84, 984514880, 84984514880),
(69, '2019-05-16 03:16:29', '2019-05-16 03:16:29', NULL, 111, 84, 979487185, 84979487185),
(70, '2019-05-16 10:37:23', '2019-05-16 10:37:23', NULL, 112, 84, 975580085, 84975580085),
(71, '2019-05-16 10:52:02', '2019-05-16 10:52:02', NULL, 113, 84, 392967607, 84392967607),
(72, '2019-05-16 10:55:44', '2019-05-16 10:55:44', NULL, 114, 84, 932685888, 84932685888),
(75, '2019-05-16 13:00:12', '2019-05-16 13:00:12', NULL, 117, 84, 763865051, 84763865051),
(76, '2019-05-16 15:49:44', '2019-05-16 15:49:44', NULL, 118, 84, 888117587, 84888117587),
(77, '2019-05-17 01:15:58', '2019-05-17 01:15:58', NULL, 119, 84, 949222272, 84949222272),
(78, '2019-05-17 01:20:40', '2019-05-17 01:20:40', NULL, 120, 84, 907602489, 84907602489),
(79, '2019-05-17 01:29:57', '2019-05-17 01:29:57', NULL, 121, 84, 902844876, 84902844876),
(80, '2019-05-17 02:15:43', '2019-05-17 02:15:43', NULL, 122, 84, 902756111, 84902756111),
(81, '2019-05-17 02:23:35', '2019-05-17 02:23:35', NULL, 123, 84, 932685900, 84932685900),
(82, '2019-05-17 04:09:24', '2019-05-17 04:09:24', NULL, 124, 84, 932403555, 84932403555),
(83, '2019-05-17 12:40:21', '2019-05-17 12:40:21', NULL, 125, 84, 902651574, 84902651574),
(84, '2019-05-17 13:26:08', '2019-05-17 13:26:08', NULL, 126, 1, 3028580567, 13028580567),
(85, '2019-05-17 15:05:47', '2019-05-17 15:05:47', NULL, 127, 1, 4084066195, 14084066195),
(86, '2019-05-17 15:25:47', '2019-05-17 15:25:47', NULL, 128, 84, 796975047, 84796975047),
(87, '2019-05-18 00:33:41', '2019-05-18 00:33:41', NULL, 129, 84, 932000111, 84932000111),
(88, '2019-05-18 01:17:46', '2019-05-18 01:17:46', NULL, 130, 84, 932685992, 84932685992),
(89, '2019-05-18 01:18:42', '2019-05-18 01:18:42', NULL, 131, 84, 392887543, 84392887543),
(90, '2019-05-18 01:20:18', '2019-05-18 01:20:18', NULL, 132, 84, 937320724, 84937320724),
(91, '2019-05-18 04:14:43', '2019-05-18 04:14:43', NULL, 133, 84, 986295059, 84986295059),
(92, '2019-05-18 04:53:40', '2019-05-18 04:53:40', NULL, 134, 84, 974888452, 84974888452),
(93, '2019-05-18 08:16:36', '2019-05-18 08:16:36', NULL, 135, 84, 963375444, 84963375444),
(94, '2019-05-19 01:23:53', '2019-05-19 01:23:53', NULL, 136, 84, 902801647, 84902801647),
(95, '2019-05-19 02:24:53', '2019-05-19 02:24:53', NULL, 137, 84, 919470999, 84919470999),
(96, '2019-05-19 03:44:34', '2019-05-19 03:44:34', NULL, 138, 84, 903395506, 84903395506),
(97, '2019-05-19 05:37:07', '2019-05-19 05:37:07', NULL, 139, 84, 776666890, 84776666890),
(98, '2019-05-19 08:10:28', '2019-05-19 08:10:28', NULL, 140, 84, 989723577, 84989723577),
(99, '2019-05-19 12:22:26', '2019-05-19 12:22:26', NULL, 141, 84, 908128113, 84908128113),
(106, '2019-05-21 03:43:37', '2019-05-21 03:43:37', NULL, 163, 84, 931494449, 84931494449),
(101, '2019-05-21 02:52:31', '2019-05-21 02:52:31', NULL, 158, 84, 947052246, 84947052246),
(102, '2019-05-21 02:59:31', '2019-05-21 02:59:31', NULL, 159, 84, 919230099, 84919230099),
(103, '2019-05-21 03:14:36', '2019-05-21 03:14:36', NULL, 160, 84, 937887896, 84937887896),
(104, '2019-05-21 03:16:25', '2019-05-21 03:16:25', NULL, 161, 886, 985182186, 886985182186),
(107, '2019-05-21 12:00:23', '2019-05-21 12:00:23', NULL, 164, 84, 987999947, 84987999947),
(108, '2019-05-21 12:00:46', '2019-05-21 12:00:46', NULL, 165, 84, 987779548, 84987779548),
(109, '2019-05-21 12:01:52', '2019-05-21 12:01:52', NULL, 166, 84, 904618869, 84904618869),
(110, '2019-05-21 12:02:13', '2019-05-21 12:02:13', NULL, 167, 84, 987764546, 84987764546),
(111, '2019-05-21 12:04:07', '2019-05-21 12:04:07', NULL, 168, 84, 976949666, 84976949666),
(112, '2019-05-21 12:05:36', '2019-05-21 12:05:36', NULL, 169, 84, 919915283, 84919915283),
(113, '2019-05-21 13:30:08', '2019-05-21 13:30:08', NULL, 170, 84, 798091088, 84798091088),
(114, '2019-05-21 15:29:51', '2019-05-21 15:29:51', NULL, 171, 84, 983670567, 84983670567),
(115, '2019-05-21 16:10:47', '2019-05-21 16:10:47', NULL, 172, 84, 828428255, 84828428255),
(116, '2019-05-22 01:59:14', '2019-05-22 01:59:14', NULL, 173, 84, 938144899, 84938144899),
(117, '2019-05-22 02:01:23', '2019-05-22 02:01:23', NULL, 174, 84, 901497080, 84901497080),
(118, '2019-05-22 02:06:59', '2019-05-22 02:06:59', NULL, 175, 84, 868903390, 84868903390),
(119, '2019-05-22 02:15:40', '2019-05-22 02:15:40', NULL, 176, 84, 906711594, 84906711594),
(120, '2019-05-22 02:17:53', '2019-05-22 02:17:53', NULL, 177, 84, 764602139, 84764602139),
(121, '2019-05-22 02:18:08', '2019-05-22 02:18:08', NULL, 178, 84, 932685337, 84932685337),
(122, '2019-05-22 03:28:13', '2019-05-22 03:28:13', NULL, 179, 84, 921543081, 84921543081),
(123, '2019-05-22 04:41:23', '2019-05-22 04:41:23', NULL, 180, 84, 932685812, 84932685812),
(124, '2019-05-22 09:40:19', '2019-05-22 09:40:19', NULL, 181, 84, 985777007, 84985777007),
(125, '2019-05-22 15:48:38', '2019-05-22 15:48:38', NULL, 182, 84, 945936946, 84945936946),
(126, '2019-05-22 16:10:26', '2019-05-22 16:10:26', NULL, 183, 84, 906609077, 84906609077),
(127, '2019-05-22 16:18:35', '2019-05-22 16:18:35', NULL, 184, 84, 937383783, 84937383783),
(128, '2019-05-22 16:36:04', '2019-05-22 16:36:04', NULL, 185, 84, 988504949, 84988504949),
(129, '2019-05-22 20:15:45', '2019-05-22 20:15:45', NULL, 186, 84, 769608603, 84769608603),
(130, '2019-05-23 02:53:05', '2019-05-23 02:53:05', NULL, 187, 84, 985966441, 84985966441),
(131, '2019-06-09 01:34:49', '2019-06-09 01:34:49', NULL, 188, 84, 909604665, 84909604665);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `posts`
--

TRUNCATE TABLE `posts`;
-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT '1',
  `upgrade` tinyint(4) NOT NULL DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reward',
  `point` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_message_id_foreign` (`message_id`),
  KEY `promotions_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotions`
--

TRUNCATE TABLE `promotions`;
--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `seen`, `upgrade`, `tags`, `message_id`, `issuer_id`, `type`, `point`) VALUES
(3, '2019-05-08 02:45:20', '2019-05-20 14:06:25', '2019-05-20 14:06:25', '5cd242c042de6', 1, 0, NULL, 4, 1, 'redeem', 200),
(5, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, 'scancode', 0, 0, NULL, 7, 1, 'mission', NULL),
(6, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, 'luckyno', 1, 0, NULL, 8, 1, 'mission', NULL),
(7, '2019-05-21 01:22:32', '2019-05-21 01:22:32', NULL, '5ce352d8e98e6', 1, 0, NULL, 15, 1, 'redeem', 100),
(8, '2019-05-21 02:03:27', '2019-05-21 02:03:27', NULL, '5ce35c6f21bf3', 1, 0, NULL, 21, 1, 'redeem', 0),
(9, '2019-05-21 02:04:17', '2019-05-21 02:04:17', NULL, '5ce35ca16428f', 1, 0, NULL, 22, 1, 'redeem', 0),
(10, '2019-05-21 02:04:37', '2019-05-21 02:04:37', NULL, '5ce35cb58ce6c', 1, 0, NULL, 23, 1, 'redeem', 0),
(11, '2019-05-21 02:05:11', '2019-05-21 02:05:11', NULL, '5ce35cd779539', 1, 0, NULL, 24, 1, 'redeem', 0),
(12, '2019-05-21 02:05:36', '2019-05-21 02:05:36', NULL, '5ce35cf0cdb30', 1, 0, NULL, 25, 1, 'redeem', 0),
(13, '2019-05-21 02:06:00', '2019-05-21 03:07:12', '2019-05-21 03:07:12', '5ce35d08d24e8', 1, 0, NULL, 26, 1, 'redeem', 0),
(14, '2019-05-21 02:06:38', '2019-05-21 03:07:18', '2019-05-21 03:07:18', '5ce35d2ecaf64', 1, 0, NULL, 27, 1, 'redeem', 0),
(15, '2019-05-21 02:07:18', '2019-05-21 02:07:18', NULL, '5ce35d563da58', 1, 0, NULL, 28, 1, 'redeem', 0),
(16, '2019-05-21 02:08:09', '2019-05-21 02:08:09', NULL, '5ce35d8977fbe', 1, 0, NULL, 29, 1, 'redeem', 0),
(17, '2019-05-21 02:26:41', '2019-05-21 02:26:41', NULL, '5ce361e1dacc2', 1, 0, NULL, 30, 1, 'redeem', 0),
(18, '2019-05-21 02:27:02', '2019-05-21 02:27:02', NULL, '5ce361f6ec260', 1, 0, NULL, 31, 1, 'redeem', 0),
(19, '2019-05-21 02:27:31', '2019-05-21 02:27:31', NULL, '5ce362134e833', 1, 0, NULL, 32, 1, 'redeem', 0),
(23, '2019-06-22 23:47:20', '2019-06-22 23:47:20', NULL, '5d0f2078a8bd6', 0, 0, NULL, 37, 1, 'promotion', 0),
(24, '2019-06-23 00:05:52', '2019-06-23 00:05:52', NULL, '5d0f24d0d3b4a', 0, 1, NULL, 39, 1, 'reward', NULL),
(25, '2019-06-23 00:13:03', '2019-06-23 00:13:03', NULL, '5d0f267f09f84', 0, 1, NULL, 40, 1, 'reward', NULL),
(26, '2019-06-23 01:00:45', '2019-06-23 01:00:45', NULL, '5d0f31adcd7c1', 0, 1, NULL, 41, 1, 'promotion', 0),
(27, '2019-06-23 01:06:15', '2019-06-23 01:06:15', NULL, '5d0f32f7ace25', 0, 1, NULL, 42, 1, 'promotion', 0),
(28, '2019-06-23 01:07:25', '2019-06-23 01:07:25', NULL, '5d0f333d22453', 0, 0, NULL, 43, 1, 'promotion', 0),
(29, '2019-06-26 01:15:35', '2019-06-26 03:58:56', NULL, '5d1329a72a25c', 0, 0, NULL, 44, 1, 'reward', 200),
(30, '2019-06-26 01:28:08', '2019-06-26 04:00:05', NULL, '5d132c9805d2c', 0, 0, NULL, 45, 1, 'redeem', 200);

-- --------------------------------------------------------

--
-- Table structure for table `promotions_groups`
--

DROP TABLE IF EXISTS `promotions_groups`;
CREATE TABLE IF NOT EXISTS `promotions_groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_groups_group_id_foreign` (`group_id`),
  KEY `promotions_groups_promotion_id_foreign` (`promotion_id`),
  KEY `promotions_groups_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotions_groups`
--

TRUNCATE TABLE `promotions_groups`;
--
-- Dumping data for table `promotions_groups`
--

INSERT INTO `promotions_groups` (`id`, `created_at`, `updated_at`, `deleted_at`, `group_id`, `promotion_id`, `issuer_id`) VALUES
(1, NULL, NULL, NULL, 1, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `promotions_locations`
--

DROP TABLE IF EXISTS `promotions_locations`;
CREATE TABLE IF NOT EXISTS `promotions_locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_locations_location_id_foreign` (`location_id`),
  KEY `promotions_locations_promotion_id_foreign` (`promotion_id`),
  KEY `promotions_locations_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotions_locations`
--

TRUNCATE TABLE `promotions_locations`;
-- --------------------------------------------------------

--
-- Table structure for table `promotions_missions`
--

DROP TABLE IF EXISTS `promotions_missions`;
CREATE TABLE IF NOT EXISTS `promotions_missions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `mission_id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotions_missions`
--

TRUNCATE TABLE `promotions_missions`;
--
-- Dumping data for table `promotions_missions`
--

INSERT INTO `promotions_missions` (`id`, `created_at`, `updated_at`, `deleted_at`, `mission_id`, `promotion_id`, `issuer_id`) VALUES
(2, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, 3, 5, 1),
(3, '2019-05-08 05:23:04', '2019-05-08 05:23:04', NULL, 4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions_publishs`
--

DROP TABLE IF EXISTS `promotions_publishs`;
CREATE TABLE IF NOT EXISTS `promotions_publishs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `publish` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_publishs_promotion_id_foreign` (`promotion_id`),
  KEY `promotions_publishs_issuer_id_foreign` (`issuer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotions_publishs`
--

TRUNCATE TABLE `promotions_publishs`;
-- --------------------------------------------------------

--
-- Table structure for table `promotions_releases`
--

DROP TABLE IF EXISTS `promotions_releases`;
CREATE TABLE IF NOT EXISTS `promotions_releases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` int(11) NOT NULL,
  `times` int(11) NOT NULL,
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_releases_promotion_id_foreign` (`promotion_id`),
  KEY `promotions_releases_issuer_id_foreign` (`issuer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotions_releases`
--

TRUNCATE TABLE `promotions_releases`;
-- --------------------------------------------------------

--
-- Table structure for table `promotion_currency`
--

DROP TABLE IF EXISTS `promotion_currency`;
CREATE TABLE IF NOT EXISTS `promotion_currency` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL,
  `mission_id` int(10) UNSIGNED DEFAULT NULL,
  `currency_number` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `promotion_currency`
--

TRUNCATE TABLE `promotion_currency`;
--
-- Dumping data for table `promotion_currency`
--

INSERT INTO `promotion_currency` (`id`, `currency_id`, `promotion_id`, `mission_id`, `currency_number`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 7, 12, NULL, '2019-07-18 00:13:18', '2019-07-18 00:13:41'),
(2, 1, NULL, 13, 16, NULL, '2019-07-18 00:13:37', '2019-07-18 00:13:37'),
(3, 1, NULL, 8, 50, NULL, '2019-07-18 00:14:16', '2019-07-18 00:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

DROP TABLE IF EXISTS `seeds`;
CREATE TABLE IF NOT EXISTS `seeds` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seeds_user_id_foreign` (`user_id`),
  KEY `seeds_issuer_id_foreign` (`issuer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `seeds`
--

TRUNCATE TABLE `seeds`;
-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sms_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `sms`
--

TRUNCATE TABLE `sms`;
-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `stocks`
--

TRUNCATE TABLE `stocks`;
--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `ticket_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 73, 'active', '2019-07-16 18:09:24', '2019-07-16 18:09:24', NULL),
(2, 3, 73, 'active', '2019-07-16 18:10:11', '2019-07-16 18:10:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `tickets`
--

TRUNCATE TABLE `tickets`;
--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `status`, `promotion_id`, `issuer_id`) VALUES
(1, '2019-07-16 18:09:12', '2019-07-16 18:09:12', NULL, '5ce352d8e98e6', 'active', 7, 1),
(2, '2019-07-16 18:09:24', '2019-07-16 18:09:24', NULL, '5ce352d8e98e6', 'active', 7, 1),
(3, '2019-07-16 18:10:11', '2019-07-16 18:10:11', NULL, '5ce352d8e98e6', 'active', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `in` int(11) NOT NULL DEFAULT '0',
  `out` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuer_id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_issuer_id_foreign` (`issuer_id`),
  KEY `transactions_member_id_foreign` (`member_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=209 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `transactions`
--

TRUNCATE TABLE `transactions`;
--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `member_id`, `in`, `out`, `type`, `note`, `issuer_id`, `currency_id`) VALUES
(12, '2019-05-15 02:07:40', '2019-05-15 02:07:40', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #19', 1, NULL),
(11, '2019-05-15 02:06:08', '2019-05-15 02:06:08', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #18', 1, NULL),
(10, '2019-05-15 01:52:52', '2019-05-15 01:52:52', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #17', 1, NULL),
(9, '2019-05-15 01:28:28', '2019-05-15 01:28:28', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #16', 1, NULL),
(8, '2019-05-15 01:23:51', '2019-05-15 01:23:51', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #15', 1, NULL),
(7, '2019-05-15 00:42:28', '2019-05-15 00:42:28', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #14', 1, NULL),
(13, '2019-05-15 02:08:06', '2019-05-15 02:08:06', NULL, 73, 49, 100, 0, 'reward', 'Quét mã nhận thưởng: #20', 1, NULL),
(14, '2019-05-15 02:14:40', '2019-05-15 02:14:40', NULL, 56, 32, 100, 0, 'reward', 'Quét mã nhận thưởng: #21', 1, NULL),
(15, '2019-05-15 04:29:44', '2019-05-15 04:29:44', NULL, 87, 63, 1, 0, 'reward', 'Quét mã nhận thưởng: #22', 1, NULL),
(16, '2019-05-15 04:30:22', '2019-05-15 04:30:22', NULL, 87, 63, 1, 0, 'reward', 'Quét mã nhận thưởng: #23', 1, NULL),
(17, '2019-05-15 06:36:42', '2019-05-15 06:36:42', NULL, 87, 63, 179, 0, 'reward', 'Quét mã nhận thưởng: #24', 1, NULL),
(18, '2019-05-15 09:10:49', '2019-05-15 09:10:49', NULL, 56, 32, 100, 0, 'reward', 'Thử nghiệm', 1, NULL),
(19, '2019-05-15 09:13:12', '2019-05-15 09:13:12', NULL, 56, 32, 50, 0, 'reward', 'Thử nghiệm', 1, NULL),
(20, '2019-05-15 16:22:05', '2019-05-15 16:22:05', NULL, 56, 32, 0, 100, 'redeem', 'Thử nghiệm', 1, NULL),
(21, '2019-05-15 18:56:25', '2019-05-15 18:56:25', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởngW', 1, NULL),
(22, '2019-05-16 01:22:04', '2019-05-16 01:22:04', NULL, 100, 76, 109, 0, 'reward', 'Quét mã nhận thưởng: #25', 1, NULL),
(23, '2019-05-16 01:41:14', '2019-05-16 01:41:14', NULL, 100, 76, 200, 0, 'reward', 'khuyến mãi', 1, NULL),
(24, '2019-05-16 01:42:10', '2019-05-16 01:42:10', NULL, 100, 76, 0, 200, 'redeem', 'tru lai khuyen mai', 1, NULL),
(25, '2019-05-16 01:42:44', '2019-05-16 01:42:44', NULL, 100, 76, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(26, '2019-05-16 01:44:46', '2019-05-16 01:44:46', NULL, 100, 76, 0, 150, 'redeem', 'Tham gia quay số trả thưởng#3', 1, NULL),
(27, '2019-05-16 01:46:42', '2019-05-16 01:46:42', NULL, 100, 76, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#4', 1, NULL),
(28, '2019-05-16 03:14:21', '2019-05-16 03:14:21', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(29, '2019-05-16 03:25:33', '2019-05-16 03:25:33', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(30, '2019-05-16 03:26:12', '2019-05-16 03:26:12', NULL, 56, 32, 1000, 0, 'reward', 'Thử quay số', 1, NULL),
(31, '2019-05-16 03:26:23', '2019-05-16 03:26:23', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(32, '2019-05-16 03:28:41', '2019-05-16 03:28:41', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(33, '2019-05-16 03:30:01', '2019-05-16 03:30:01', NULL, 56, 32, 0, 150, 'redeem', 'Tham gia quay số trả thưởng#3', 1, NULL),
(34, '2019-05-16 03:32:29', '2019-05-16 03:32:29', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(35, '2019-05-16 03:32:39', '2019-05-16 03:32:39', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(36, '2019-05-16 03:44:00', '2019-05-16 03:44:00', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(37, '2019-05-16 03:49:39', '2019-05-16 03:49:39', NULL, 87, 63, 40, 0, 'reward', 'Quét mã nhận thưởng: #26', 1, NULL),
(38, '2019-05-16 03:51:16', '2019-05-16 03:51:16', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(39, '2019-05-16 03:51:23', '2019-05-16 03:51:23', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(40, '2019-05-16 03:56:50', '2019-05-16 03:56:50', NULL, 87, 63, 154, 0, 'reward', 'Quét mã nhận thưởng: #27', 1, NULL),
(41, '2019-05-16 03:57:09', '2019-05-16 03:57:09', NULL, 87, 63, 154, 0, 'reward', 'Quét mã nhận thưởng: #28', 1, NULL),
(42, '2019-05-16 04:21:45', '2019-05-16 04:21:45', NULL, 87, 63, 0, 150, 'redeem', 'Tham gia quay số trả thưởng#3', 1, NULL),
(43, '2019-05-16 04:21:48', '2019-05-16 04:21:48', NULL, 87, 63, 0, 150, 'redeem', 'Tham gia quay số trả thưởng#3', 1, NULL),
(44, '2019-05-16 07:18:54', '2019-05-16 07:18:54', NULL, 87, 63, 0, 29, 'redeem', 'Reset điểm', 1, NULL),
(45, '2019-05-16 07:43:38', '2019-05-16 07:43:38', NULL, 87, 63, 10000, 0, 'reward', 'Test', 1, NULL),
(46, '2019-05-16 07:44:48', '2019-05-16 07:44:48', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(47, '2019-05-16 07:44:51', '2019-05-16 07:44:51', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(48, '2019-05-16 07:44:52', '2019-05-16 07:44:52', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(49, '2019-05-16 07:44:52', '2019-05-16 07:44:52', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(50, '2019-05-16 07:44:52', '2019-05-16 07:44:52', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(51, '2019-05-16 07:44:53', '2019-05-16 07:44:53', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(52, '2019-05-16 07:44:53', '2019-05-16 07:44:53', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(53, '2019-05-16 07:44:53', '2019-05-16 07:44:53', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(54, '2019-05-16 07:44:53', '2019-05-16 07:44:53', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(55, '2019-05-16 07:44:53', '2019-05-16 07:44:53', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(56, '2019-05-16 07:44:54', '2019-05-16 07:44:54', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(57, '2019-05-16 07:44:54', '2019-05-16 07:44:54', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(58, '2019-05-16 07:44:54', '2019-05-16 07:44:54', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(59, '2019-05-16 07:44:54', '2019-05-16 07:44:54', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(60, '2019-05-16 07:44:55', '2019-05-16 07:44:55', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(61, '2019-05-16 08:23:36', '2019-05-16 08:23:36', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(62, '2019-05-16 08:23:37', '2019-05-16 08:23:37', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(63, '2019-05-16 08:23:37', '2019-05-16 08:23:37', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(64, '2019-05-16 08:23:37', '2019-05-16 08:23:37', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(65, '2019-05-16 08:23:38', '2019-05-16 08:23:38', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(66, '2019-05-16 08:23:38', '2019-05-16 08:23:38', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(67, '2019-05-16 08:23:38', '2019-05-16 08:23:38', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(68, '2019-05-16 08:23:38', '2019-05-16 08:23:38', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(69, '2019-05-16 08:23:38', '2019-05-16 08:23:38', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(70, '2019-05-16 08:23:39', '2019-05-16 08:23:39', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(71, '2019-05-16 08:23:42', '2019-05-16 08:23:42', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(72, '2019-05-16 08:23:44', '2019-05-16 08:23:44', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(73, '2019-05-16 08:23:44', '2019-05-16 08:23:44', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(74, '2019-05-16 08:23:45', '2019-05-16 08:23:45', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(75, '2019-05-16 08:23:45', '2019-05-16 08:23:45', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(76, '2019-05-16 08:23:45', '2019-05-16 08:23:45', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(77, '2019-05-16 08:23:46', '2019-05-16 08:23:46', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(78, '2019-05-16 08:23:46', '2019-05-16 08:23:46', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(79, '2019-05-16 08:23:46', '2019-05-16 08:23:46', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(80, '2019-05-16 08:23:47', '2019-05-16 08:23:47', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(81, '2019-05-16 08:23:47', '2019-05-16 08:23:47', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(82, '2019-05-16 08:23:47', '2019-05-16 08:23:47', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(83, '2019-05-16 08:23:48', '2019-05-16 08:23:48', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(84, '2019-05-16 08:23:48', '2019-05-16 08:23:48', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(85, '2019-05-16 08:24:30', '2019-05-16 08:24:30', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(86, '2019-05-16 08:31:15', '2019-05-16 08:31:15', NULL, 87, 63, 154, 0, 'reward', 'Quét mã nhận thưởng: #29', 1, NULL),
(87, '2019-05-16 08:32:06', '2019-05-16 08:32:06', NULL, 72, 48, 154, 0, 'reward', 'Quét mã nhận thưởng: #30', 1, NULL),
(88, '2019-05-16 08:33:41', '2019-05-16 08:33:41', NULL, 87, 63, 154, 0, 'reward', 'Quét mã nhận thưởng: #31', 1, NULL),
(89, '2019-05-16 08:34:58', '2019-05-16 08:34:58', NULL, 87, 63, 179, 0, 'reward', 'Quét mã nhận thưởng: #32', 1, NULL),
(90, '2019-05-16 08:36:16', '2019-05-16 08:36:16', NULL, 87, 63, 105, 0, 'reward', 'Quét mã nhận thưởng: #33', 1, NULL),
(91, '2019-05-16 08:39:14', '2019-05-16 08:39:14', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(92, '2019-05-16 08:39:16', '2019-05-16 08:39:16', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(93, '2019-05-16 08:39:17', '2019-05-16 08:39:17', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(94, '2019-05-16 08:39:18', '2019-05-16 08:39:18', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(95, '2019-05-16 08:39:19', '2019-05-16 08:39:19', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(96, '2019-05-16 08:39:20', '2019-05-16 08:39:20', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(97, '2019-05-16 08:39:21', '2019-05-16 08:39:21', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(98, '2019-05-16 08:39:22', '2019-05-16 08:39:22', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(99, '2019-05-16 08:39:22', '2019-05-16 08:39:22', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(100, '2019-05-16 08:39:23', '2019-05-16 08:39:23', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(101, '2019-05-16 08:39:24', '2019-05-16 08:39:24', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(102, '2019-05-16 08:39:25', '2019-05-16 08:39:25', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(103, '2019-05-16 08:39:26', '2019-05-16 08:39:26', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(104, '2019-05-16 08:39:27', '2019-05-16 08:39:27', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(105, '2019-05-16 08:39:27', '2019-05-16 08:39:27', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(106, '2019-05-16 08:39:34', '2019-05-16 08:39:34', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(107, '2019-05-16 08:39:41', '2019-05-16 08:39:41', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(108, '2019-05-16 08:39:42', '2019-05-16 08:39:42', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(109, '2019-05-16 08:39:43', '2019-05-16 08:39:43', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(110, '2019-05-16 08:39:43', '2019-05-16 08:39:43', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(111, '2019-05-16 08:39:44', '2019-05-16 08:39:44', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(112, '2019-05-16 08:46:24', '2019-05-16 08:46:24', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(113, '2019-05-16 08:46:25', '2019-05-16 08:46:25', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(114, '2019-05-16 08:46:55', '2019-05-16 08:46:55', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(115, '2019-05-16 09:49:13', '2019-05-16 09:49:13', NULL, 101, 77, 29000, 0, 'reward', 'khuyến mãi test', 1, NULL),
(116, '2019-05-16 09:49:51', '2019-05-16 09:49:51', NULL, 100, 76, 777777, 0, 'reward', 'khuyến mãi', 1, NULL),
(117, '2019-05-16 09:50:09', '2019-05-16 09:50:09', NULL, 100, 76, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(118, '2019-05-16 10:22:08', '2019-05-16 10:22:08', NULL, 87, 63, 0, 105, 'redeem', 'Đổi trả #33', 1, NULL),
(119, '2019-05-16 10:22:13', '2019-05-16 10:22:13', NULL, 87, 63, 0, 179, 'redeem', 'Đổi trả #32', 1, NULL),
(120, '2019-05-16 10:22:39', '2019-05-16 10:22:39', NULL, 87, 63, 0, 154, 'redeem', 'Đổi trả #31', 1, NULL),
(121, '2019-05-16 10:25:29', '2019-05-16 10:25:29', NULL, 56, 32, 100000, 0, 'reward', 'Test thử quay số', 1, NULL),
(122, '2019-05-16 10:26:08', '2019-05-16 10:26:08', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(123, '2019-05-16 10:28:10', '2019-05-16 10:28:10', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(124, '2019-05-16 10:28:10', '2019-05-16 10:28:10', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(125, '2019-05-16 10:28:10', '2019-05-16 10:28:10', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(126, '2019-05-16 10:28:10', '2019-05-16 10:28:10', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(127, '2019-05-16 10:28:11', '2019-05-16 10:28:11', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(128, '2019-05-16 10:28:11', '2019-05-16 10:28:11', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(129, '2019-05-16 10:28:11', '2019-05-16 10:28:11', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(130, '2019-05-16 10:28:11', '2019-05-16 10:28:11', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(131, '2019-05-16 10:28:12', '2019-05-16 10:28:12', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(132, '2019-05-16 10:28:12', '2019-05-16 10:28:12', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(133, '2019-05-16 10:28:13', '2019-05-16 10:28:13', NULL, 56, 32, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(134, '2019-05-16 10:59:57', '2019-05-16 10:59:57', NULL, 114, 90, 10000, 0, 'reward', 'Test', 1, NULL),
(135, '2019-05-16 11:00:11', '2019-05-16 11:00:11', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(136, '2019-05-16 11:00:12', '2019-05-16 11:00:12', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(137, '2019-05-16 11:00:13', '2019-05-16 11:00:13', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(138, '2019-05-16 11:00:13', '2019-05-16 11:00:13', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(139, '2019-05-16 11:00:14', '2019-05-16 11:00:14', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(140, '2019-05-16 11:00:14', '2019-05-16 11:00:14', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(141, '2019-05-16 11:00:14', '2019-05-16 11:00:14', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(142, '2019-05-16 11:00:15', '2019-05-16 11:00:15', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(143, '2019-05-16 11:00:15', '2019-05-16 11:00:15', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(144, '2019-05-16 11:00:15', '2019-05-16 11:00:15', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(145, '2019-05-16 11:01:04', '2019-05-16 11:01:04', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(146, '2019-05-16 11:01:04', '2019-05-16 11:01:04', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(147, '2019-05-16 11:01:04', '2019-05-16 11:01:04', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(148, '2019-05-16 11:01:04', '2019-05-16 11:01:04', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(149, '2019-05-16 11:01:04', '2019-05-16 11:01:04', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(150, '2019-05-16 11:01:05', '2019-05-16 11:01:05', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(151, '2019-05-16 11:01:05', '2019-05-16 11:01:05', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(152, '2019-05-16 11:01:05', '2019-05-16 11:01:05', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(153, '2019-05-16 11:06:35', '2019-05-16 11:06:35', NULL, 87, 63, 0, 40, 'redeem', 'Đổi trả #26', 1, NULL),
(154, '2019-05-16 11:07:40', '2019-05-16 11:07:40', NULL, 114, 90, 40, 0, 'reward', 'Quét mã nhận thưởng: #34', 1, NULL),
(155, '2019-05-16 11:08:08', '2019-05-16 11:08:08', NULL, 114, 90, 0, 40, 'redeem', 'Đổi trả #34', 1, NULL),
(156, '2019-05-16 11:11:04', '2019-05-16 11:11:04', NULL, 114, 90, 40, 0, 'reward', 'Quét mã nhận thưởng: #35', 1, NULL),
(157, '2019-05-16 11:11:44', '2019-05-16 11:11:44', NULL, 114, 90, 0, 40, 'redeem', 'Đổi trả #35', 1, NULL),
(158, '2019-05-16 11:18:28', '2019-05-16 11:18:28', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(159, '2019-05-17 01:06:51', '2019-05-17 01:06:51', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(160, '2019-05-17 01:06:52', '2019-05-17 01:06:52', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(161, '2019-05-17 01:32:30', '2019-05-17 01:32:30', NULL, 121, 97, 139, 0, 'reward', 'Quét mã nhận thưởng: #36', 1, NULL),
(162, '2019-05-17 01:39:04', '2019-05-17 01:39:04', NULL, 121, 97, 107, 0, 'reward', 'Quét mã nhận thưởng: #37', 1, NULL),
(163, '2019-05-17 01:40:37', '2019-05-17 01:40:37', NULL, 121, 97, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(164, '2019-05-17 01:40:43', '2019-05-17 01:40:43', NULL, 121, 97, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(165, '2019-05-17 11:16:16', '2019-05-17 11:16:16', NULL, 117, 93, 154, 0, 'reward', 'Quét mã nhận thưởng: #38', 1, NULL),
(166, '2019-05-17 13:51:57', '2019-05-17 13:51:57', NULL, 117, 93, 0, 154, 'redeem', 'Đổi trả SN: #5B0078BPAG9FCA0', 1, NULL),
(167, '2019-05-17 15:17:07', '2019-05-17 15:17:07', NULL, 127, 103, 1000, 0, 'reward', 'Test quét quay số', 1, NULL),
(168, '2019-05-17 15:19:30', '2019-05-17 15:19:30', NULL, 99, 75, 0, 0, 'reward', '10000', 1, NULL),
(169, '2019-05-17 15:19:37', '2019-05-17 15:19:37', NULL, 99, 75, 10000, 0, 'reward', 'Test quét quay số', 1, NULL),
(170, '2019-05-17 15:20:15', '2019-05-17 15:20:15', NULL, 67, 43, 1000, 0, 'reward', 'Thử nghiệm', 1, NULL),
(171, '2019-05-17 15:27:42', '2019-05-17 15:27:42', NULL, 67, 43, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(172, '2019-05-17 15:27:47', '2019-05-17 15:27:47', NULL, 67, 43, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(173, '2019-05-17 15:28:05', '2019-05-17 15:28:05', NULL, 67, 43, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(174, '2019-05-17 15:28:10', '2019-05-17 15:28:10', NULL, 67, 43, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(175, '2019-05-17 15:30:12', '2019-05-17 15:30:12', NULL, 67, 43, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(176, '2019-05-17 16:55:21', '2019-05-17 16:55:21', NULL, 127, 103, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(177, '2019-05-17 16:55:29', '2019-05-17 16:55:29', NULL, 127, 103, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(178, '2019-05-17 16:55:31', '2019-05-17 16:55:31', NULL, 127, 103, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(179, '2019-05-17 17:12:55', '2019-05-17 17:12:55', NULL, 67, 43, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#2', 1, NULL),
(180, '2019-05-21 02:15:14', '2019-05-21 02:15:14', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(181, '2019-05-21 02:15:19', '2019-05-21 02:15:19', NULL, 114, 90, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(182, '2019-05-21 02:36:22', '2019-05-21 02:36:22', NULL, 114, 90, 154, 0, 'reward', 'Quét mã nhận thưởng: #5B0078BPAG9FCA0', 1, NULL),
(183, '2019-05-22 03:53:01', '2019-05-22 03:53:01', NULL, 72, 48, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(184, '2019-05-22 04:43:33', '2019-05-22 04:43:33', NULL, 87, 63, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(185, '2019-05-22 05:36:43', '2019-05-22 05:36:43', NULL, 158, 119, 78, 0, 'reward', 'Quét mã nhận thưởng: #5A0029BPALF4576', 1, NULL),
(186, '2019-05-22 05:37:26', '2019-05-22 05:37:26', NULL, 158, 119, 78, 0, 'reward', 'Quét mã nhận thưởng: #5C0333FPAG916FB', 1, NULL),
(187, '2019-05-22 05:38:05', '2019-05-22 05:38:05', NULL, 158, 119, 41, 0, 'reward', 'Quét mã nhận thưởng: #5B04648PAX7D5F0', 1, NULL),
(188, '2019-05-22 05:39:27', '2019-05-22 05:39:27', NULL, 158, 119, 42, 0, 'reward', 'Quét mã nhận thưởng: #5B03941PAG0E7B1', 1, NULL),
(189, '2019-05-22 05:39:59', '2019-05-22 05:39:59', NULL, 158, 119, 42, 0, 'reward', 'Quét mã nhận thưởng: #5B03941PAGce46f', 1, NULL),
(190, '2019-05-22 05:40:40', '2019-05-22 05:40:40', NULL, 158, 119, 179, 0, 'reward', 'Quét mã nhận thưởng: #5C0066APAZADE8C', 1, NULL),
(191, '2019-05-22 05:41:42', '2019-05-22 05:41:42', NULL, 158, 119, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(192, '2019-05-22 05:42:09', '2019-05-22 05:42:09', NULL, 158, 119, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(193, '2019-05-22 05:42:17', '2019-05-22 05:42:17', NULL, 158, 119, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(194, '2019-05-22 05:42:19', '2019-05-22 05:42:19', NULL, 158, 119, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(195, '2019-05-22 09:08:31', '2019-05-22 09:08:31', NULL, 180, 141, 10000, 0, 'reward', 'nạp thêm test app', 1, NULL),
(196, '2019-05-22 09:09:29', '2019-05-22 09:09:29', NULL, 180, 141, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(197, '2019-05-22 09:09:34', '2019-05-22 09:09:34', NULL, 180, 141, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(198, '2019-05-22 09:09:35', '2019-05-22 09:09:35', NULL, 180, 141, 0, 100, 'redeem', 'Tham gia quay số trả thưởng#5', 1, NULL),
(199, '2019-07-15 04:35:00', '2019-07-15 04:35:00', NULL, 73, 49, 0, 0, 'redeem', NULL, 1, NULL),
(200, '2019-07-15 04:35:46', '2019-07-15 04:35:46', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(201, '2019-07-15 04:35:54', '2019-07-15 04:35:54', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(202, '2019-07-15 04:36:08', '2019-07-15 04:36:08', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(203, '2019-07-16 18:02:49', '2019-07-16 18:02:49', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(204, '2019-07-16 18:04:00', '2019-07-16 18:04:00', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(205, '2019-07-16 18:06:05', '2019-07-16 18:06:05', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(206, '2019-07-16 18:09:12', '2019-07-16 18:09:12', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(207, '2019-07-16 18:09:24', '2019-07-16 18:09:24', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL),
(208, '2019-07-16 18:10:11', '2019-07-16 18:10:11', NULL, 73, 49, 0, 100, 'redeem', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `public` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `public`, `verify`, `password`, `status`, `deleted_at`, `created_at`, `updated_at`, `remember_token`) VALUES
(14, 'root', 0, '$2y$10$.jQpeSBCyupdMTSXDIphWuEeW6.0.XO3vJaaHCmlybibY9JpHicvG', 'active', NULL, '2019-04-01 10:23:17', '2019-04-01 10:23:17', NULL),
(18, 'kbv', 0, '$2y$10$8fJWrhhzXyHX2lNPxOnbNuQDA4LfmGuwfYx/mlGef/znztRbqnffC', 'active', NULL, '2019-04-01 15:46:22', '2019-04-01 15:46:22', NULL),
(19, 'app_kbv', 0, '$2y$10$LLrmR2w63FwffZTcyYygLOf/svJQvezyAY0/qPNuu7nCqTLSKTyqy', 'active', NULL, '2019-04-06 09:33:05', '2019-04-06 09:33:05', NULL),
(20, 'ohere', 0, '$2y$10$EPc9D50qQoSK6dtuxo8uhuK58t1E3L.VGMmPmpRTtaAb9mVa4Ev2O', 'active', NULL, '2019-04-09 12:57:21', '2019-04-09 12:57:21', 'uTJoJyDjlhKTYuDrTKt5E8sLfIrNM1M04LAI83jUjpZJSMr83YnNVMbEleoB'),
(56, '84916700848', 0, '$2y$10$4opgvRN1IVcF0/NxwIqXUucYQxloVUZa.ONsM2jwCR5SLY03yCWCq', 'active', NULL, '2019-05-03 07:08:28', '2019-05-03 07:08:28', NULL),
(57, '84915750212', 0, '$2y$10$GIEle1oEOmck6m2Xfsnz2OBwn2R54yQKGEB3MUFmNhqXgCbDdgjlu', 'active', NULL, '2019-05-03 07:38:28', '2019-05-03 07:38:28', NULL),
(58, '84985377191', 0, '$2y$10$ODrFXE2HdH777QBQr3pWhuc1.5m2jWslGMMX0aCudzp9rgDuBZhLm', 'active', NULL, '2019-05-03 07:43:04', '2019-05-03 07:43:04', NULL),
(59, '84937394545', 0, '$2y$10$gDcjSLw/kLV4A85/58jaQekSINXOMSmk1JWVSgK2EoVcLppdPa7mK', 'active', NULL, '2019-05-03 07:58:48', '2019-05-03 07:58:48', NULL),
(60, '84983333297', 0, '$2y$10$OnP1MtAlE0c/8ddfQbEiNevDrOUdP0d67s7xQgNP8JcHWtN4HMOYy', 'active', NULL, '2019-05-03 09:27:59', '2019-05-03 09:27:59', NULL),
(61, '84348054524', 0, '$2y$10$ylMVvJa2pL80r1Op4pg3yeP.FTDP4kQX7x3nESINI8wVLVL7yDbq.', 'active', NULL, '2019-05-03 10:02:58', '2019-05-03 10:02:58', NULL),
(62, '84908043337', 0, '$2y$10$rpD2ZUnSIy0Qev8dXSSKuuetxHEljUsVFM4By.2USQcJQaY1TKn2.', 'active', NULL, '2019-05-03 13:18:55', '2019-05-03 13:18:55', NULL),
(63, '84353639234', 0, '$2y$10$l0IQEHdmNbLvtYeCKbtS6OpHCd0gEqo0jnLeCUyuLdgFrKxNILtjq', 'active', NULL, '2019-05-03 16:15:13', '2019-05-03 16:15:13', NULL),
(64, '84975559319', 0, '$2y$10$y0CGY59aYHuDOCBl8pXqWe52JX7QYCBHmEnBJu.o5I8cLQZqCKkAO', 'active', NULL, '2019-05-03 16:16:53', '2019-05-03 16:16:53', NULL),
(65, '84939012089', 0, '$2y$10$YqI39eLVEuFjP3OTJgNMSu02i839rHez2o8nGRIYfPHHoaUFsmclm', 'active', NULL, '2019-05-03 23:59:57', '2019-05-03 23:59:57', NULL),
(66, '84914150069', 0, '$2y$10$dPeJfTJeaTawppA6nes/mutgIa0JHBdn6CBBlKvzDWRHk44KMLBqO', 'active', NULL, '2019-05-04 01:50:31', '2019-05-04 01:50:31', NULL),
(67, '84906721706', 0, '$2y$10$X8PcoeJ8oFcaNF6c4O3ZsOkKXuRuBnn72s3J/hULZFH6d8mW/Bzve', 'active', NULL, '2019-05-04 04:00:51', '2019-05-04 04:00:51', NULL),
(68, '84336927083', 0, '$2y$10$ehym6VnBrgapyTZUWIcXX.2F29jCXGxWJ57g/7sAz2/1seD1E.01.', 'active', NULL, '2019-05-05 04:41:53', '2019-05-05 04:41:53', NULL),
(69, '84948554838', 0, '$2y$10$a97ICdpC46KD4dTDtiCY2OU.g02Dp1KGe8y0TeR/HNl/ea4Ol6V9q', 'active', NULL, '2019-05-05 08:25:26', '2019-05-05 08:25:26', NULL),
(70, '84909196195', 0, '$2y$10$5NVJ2.VBHmgQXMRpvOIiQO6S3lLabIgDI3GSz8ibrI5.qm9S1zW56', 'active', NULL, '2019-05-06 01:46:19', '2019-05-06 01:46:19', NULL),
(71, '84902609111', 0, '$2y$10$o7MwFnL9AWJFKdL4y0j5QugW/RdEO1T9rv9wu7sAhKADYuxJXciAK', 'active', NULL, '2019-05-06 01:52:51', '2019-05-06 01:52:51', NULL),
(72, '84886989796', 0, '$2y$10$jo/PEawnpgwdPqqaITdba.pO5uFgh2iRX806hslfXT.AP/Alix1Pa', 'active', NULL, '2019-05-06 02:02:52', '2019-05-06 02:02:52', NULL),
(73, '84909257455', 0, '$2y$10$Y/DDK0056OLt6l1qLzVvzuSZAEsSxXHNeLRCZlayBVc3eOuMQQnAm', 'active', NULL, '2019-05-06 02:54:08', '2019-05-06 02:54:08', NULL),
(74, '84968848865', 0, '$2y$10$vh/57TflHGD5NfHBEO3pG.4zXz0XZFm1qNRCUaTuTdiu8rei..rEi', 'active', NULL, '2019-05-06 03:00:02', '2019-05-06 03:00:02', NULL),
(75, '84928365242', 0, '$2y$10$RuQlN1H15pTWR2mD/GohtuFWF2GN/JTu5QsFetEjVqvLf1bwoFX5.', 'active', NULL, '2019-05-06 03:12:31', '2019-05-06 03:12:31', NULL),
(76, '84911506399', 0, '$2y$10$ZZj4y/NXo4cK.55tNRjafuYsj5pT5jsbYQ5G.lbQVSqvbJxvv.DRq', 'active', NULL, '2019-05-06 03:16:46', '2019-05-06 03:16:46', NULL),
(77, '84936070805', 0, '$2y$10$UUKq98w2WU0q64gd4xCPAujoruWZhXPCI5zQD/g90p6GM5YtYNbMa', 'active', NULL, '2019-05-06 10:12:47', '2019-05-06 10:12:47', NULL),
(78, '84964764025', 0, '$2y$10$Dq1ltJxE3LyGwV0g5.xdcOFq4y2RqSRakJwErSMnIIB5JZShWCyKS', 'active', NULL, '2019-05-06 11:36:34', '2019-05-06 11:36:34', NULL),
(79, '84942206070', 0, '$2y$10$2BuTlZInfVaXI71A7sBY.ebvxYkQG7dkB9shXWxKVBY.N57YXamsm', 'active', NULL, '2019-05-06 16:13:11', '2019-05-06 16:13:11', NULL),
(81, '84377093550', 0, '$2y$10$t8D.CBo7TKEboNweZvDFeeQU1Ih3dx6FqVyWr6w45U/V64t8Jctyy', 'active', NULL, '2019-05-08 15:28:55', '2019-05-08 15:28:55', NULL),
(82, '84336220929', 0, '$2y$10$wVNlDEsyVEDmnTWt/dOABu6sI.ep5V1IJ3b0jfZhBixNsj5O6cOhm', 'active', NULL, '2019-05-09 06:28:16', '2019-05-09 06:28:16', NULL),
(83, '84899672911', 0, '$2y$10$LiNWyU1Od5l5ozrovK6c0u82gHThe69SUFWNjLDj1Y2DqISAkex92', 'active', NULL, '2019-05-09 07:03:45', '2019-05-09 07:03:45', NULL),
(84, '84908165242', 0, '$2y$10$hV9z4HsUlqPkYTi9DM6ePu1pDJq/uzQBb7raLKD3YZiafrfF4p4ry', 'active', NULL, '2019-05-09 10:10:46', '2019-05-09 10:10:46', NULL),
(85, '84814757574', 0, '$2y$10$ktz1IOaLpiqbQ0q/G6nf4.b34zwt4824aoBOtQ0AOfq6igMsjzQqG', 'active', NULL, '2019-05-10 16:44:55', '2019-05-10 16:44:55', NULL),
(86, '84978000013', 0, '$2y$10$e3KpKHwPIY.objiEkqrYNekNM9wnu/iu2oARkmsHWmGOluNwPEKu2', 'active', NULL, '2019-05-11 01:54:01', '2019-05-11 01:54:01', NULL),
(87, '84349522010', 0, '$2y$10$NBYSvLwF8rmEgAS1LBubYuA5VsUVQvMPTeePUkEw7TOS5Odo1LtT.', 'active', NULL, '2019-05-11 02:06:32', '2019-05-11 02:06:32', NULL),
(88, '84931100133', 0, '$2y$10$h2uyPZg5SyHM6fgamb.jgOTuj14XVrkJosSkTKxjAxqMadAVYqR56', 'active', NULL, '2019-05-11 08:47:26', '2019-05-11 08:47:26', NULL),
(89, '17016453388', 0, '$2y$10$Qz0uQu1F7tKjQTxnnRdQLOLUgGCBy/SNf/OuhQqfVSeRDoRpDQL7K', 'active', NULL, '2019-05-11 09:03:17', '2019-05-11 09:03:17', NULL),
(90, '17016453388', 0, '$2y$10$YoiFP1mZYtOkw6Ec1uaaL.UFYlsR/vW8KeUC9.TQFyTvnxLyhwpza', 'active', NULL, '2019-05-11 09:20:56', '2019-05-11 09:20:56', NULL),
(91, '17016453388', 0, '$2y$10$PXQ2877mPkDAhpCLyHkgiuoLAm1G91RyxdHxnmqXk3V3e.9TfROxO', 'active', NULL, '2019-05-11 09:23:53', '2019-05-11 09:23:53', NULL),
(92, '84938506206', 0, '$2y$10$Y.pjbuY/Ee9FNf7s/4wJZ.8iqmPzYZMk7d.4W9IHq8liyqoL2orB.', 'active', NULL, '2019-05-13 02:57:51', '2019-05-13 02:57:51', NULL),
(93, '84988308520', 0, '$2y$10$69w7Y/XzZrr1OllUTP/HNOLOWqEIBFzp/OmiHCtCvBxD33MoJ8Ye.', 'active', NULL, '2019-05-13 04:35:49', '2019-05-13 04:35:49', NULL),
(94, '84987718718', 0, '$2y$10$0rsUywD5e9SsYRkpov.g4esJgCmO/qu0vLZSAnZhvfqaStkIkksjC', 'active', NULL, '2019-05-13 04:52:54', '2019-05-13 04:52:54', NULL),
(95, '84907223715', 0, '$2y$10$CICMIvb/MoaGB1M5bMfMpOL8SxWJJMLiNc0qLTwsPyKTN//V.4WRe', 'active', NULL, '2019-05-13 05:21:50', '2019-05-13 05:21:50', NULL),
(96, '84374339469', 0, '$2y$10$E/uBDUy.QWN2nHLS/a3ubeP4wrUhI4rO9omBV8Tg2GPZNPBVJrcxW', 'active', NULL, '2019-05-13 07:56:18', '2019-05-13 07:56:18', NULL),
(97, '84909183689', 0, '$2y$10$4OER13CzBBPiTQDQ.DfBY.T6Hh5QC.Dg1sQQwfZFiSDfsZkeyQCdu', 'active', NULL, '2019-05-13 07:56:27', '2019-05-13 07:56:27', NULL),
(98, '84907970230', 0, '$2y$10$B5o1fRFy8T2rC8rhWdBg3.c8Og7H06U91gOjCV10afBAHQQU7iUka', 'active', NULL, '2019-05-13 10:10:56', '2019-05-13 10:10:56', NULL),
(99, '14084766514', 0, '$2y$10$U4qGLTuU/Z00PwBsCux5U.KG3ecWjOtL1XvsbjAK/3aisAPpihnka', 'active', NULL, '2019-05-13 16:09:35', '2019-05-13 16:09:35', NULL),
(100, '84898312383', 0, '$2y$10$hAUhcnYOXpB4VdPNN0jq4uKkHtwEcCSGo28vGFc0i74l7Vr4HKgou', 'active', NULL, '2019-05-14 02:01:11', '2019-05-14 02:01:11', NULL),
(101, '84773822664', 0, '$2y$10$Wx4RbIM06Km3oRdpGgc0leIsJXV3u8o1KZyTLTEsXbuHxtk.920nK', 'active', NULL, '2019-05-14 02:08:35', '2019-05-14 02:08:35', NULL),
(102, '84919464436', 0, '$2y$10$H/V.qOJQVG0diOUkNoLXLe.cveQ9/HBQxUCKdTJGNPCn.6zMnWYNu', 'active', NULL, '2019-05-14 09:22:40', '2019-05-14 09:22:40', NULL),
(103, '84366402778', 0, '$2y$10$dj853DaaDeLB.XrSpFcTUOLD79evzYmzWWdEQVNTvanGaH8z7OUru', 'active', NULL, '2019-05-14 10:02:01', '2019-05-14 10:02:01', NULL),
(104, '84978501968', 0, '$2y$10$WosRUgLpp5PphVf2ObC2LOhlrJtX3RF5UUImVMxFfiXqhIGkmCS8.', 'active', NULL, '2019-05-14 14:18:25', '2019-05-14 14:18:25', NULL),
(105, '84868605792', 0, '$2y$10$4UcrSvGwp9Xb3zn2zLHAQ.W/pr80j8kCoQp0o9jfeb0o2pWrXTqbK', 'active', NULL, '2019-05-15 00:06:37', '2019-05-15 00:06:37', NULL),
(106, '8484909257455', 0, '$2y$10$T8CH7Zt36E6kYujVEIJfHO0iG4CX/MPrsCRVHE3HEE2x738NUEQmm', 'active', NULL, '2019-05-15 02:03:15', '2019-05-15 02:03:15', NULL),
(107, '84908998976', 0, '$2y$10$ZKd8a6uEFbLrbgAEmsrZUuw.l3c6VfAYUcDCKJlA.V90hvXFVft8W', 'active', NULL, '2019-05-15 06:11:41', '2019-05-15 06:11:41', NULL),
(108, '84981847945', 0, '$2y$10$gd1nyi0QW6ZtROiw/SZxq.uWQSB97Fis5ezO4vTqumiwllDmzC6Ti', 'active', NULL, '2019-05-15 08:13:23', '2019-05-15 08:13:23', NULL),
(109, '84911430000', 0, '$2y$10$T38SkMgzMQg1larNwkKmO.U70K8XSwucSOlNpViajyKBM0y0n.g7O', 'active', NULL, '2019-05-15 10:26:39', '2019-05-15 10:26:39', NULL),
(110, '84984514880', 0, '$2y$10$./ATKLlbplZYmnubTAlmsOrrEkXYYVHJ21r3K2.0U8w1Uu9juteFK', 'active', NULL, '2019-05-15 22:49:52', '2019-05-15 22:49:52', NULL),
(111, '84979487185', 0, '$2y$10$3cUJVpwFz048iExNl352s.6RSZWR6/KEJHa56GI3xdGcLg89NgFQ6', 'active', NULL, '2019-05-16 03:16:29', '2019-05-16 03:16:29', NULL),
(112, '84975580085', 0, '$2y$10$FKJ0NoH2LJEyXPvtCH4om.0yTnr5fWSda0b.i941DUGtIldst46Ay', 'active', NULL, '2019-05-16 10:37:23', '2019-05-16 10:37:23', NULL),
(113, '84392967607', 0, '$2y$10$I17CoYWyqEHONTuaEPZPnOj3rXx6Q/G9r9y81giPS2RxONoBceHXu', 'active', NULL, '2019-05-16 10:52:02', '2019-05-16 10:52:02', NULL),
(114, '84932685888', 0, '$2y$10$pWl3gAtUK1lvMM48bz8b3eNDkISUg1yGySw206fEVor4jHy.9Ad1G', 'active', NULL, '2019-05-16 10:55:44', '2019-05-16 10:55:44', NULL),
(117, '84763865051', 0, '$2y$10$CNIsrDBxvYBUcIRg0Mc8e.B8SVYctSLVm/SR/apkSCA9KFAesXvCC', 'active', NULL, '2019-05-16 13:00:12', '2019-05-16 13:00:12', NULL),
(118, '84888117587', 0, '$2y$10$C2MYHMd2GBmHuk/dm0oKlO/lAoXU359Xb3clHTD7ZDGg9LJoGw3Na', 'active', NULL, '2019-05-16 15:49:44', '2019-05-16 15:49:44', NULL),
(119, '84949222272', 0, '$2y$10$IwliovwgGtI.mG0LWssJaeL6SKSraqbfK5JnjC2pxu6xOvBA5RzO6', 'active', NULL, '2019-05-17 01:15:58', '2019-05-17 01:15:58', NULL),
(120, '84907602489', 0, '$2y$10$K2MXu755llusv/JAJAe1LOhkjh1iu7mLdGWe7FJkRZyKMLtUQijmG', 'active', NULL, '2019-05-17 01:20:40', '2019-05-17 01:20:40', NULL),
(121, '84902844876', 0, '$2y$10$NYTQJuxRLV/V61.EuoCSoOO.mv6vkoxUZYALoTl1sBs4RAiBD0uOm', 'active', NULL, '2019-05-17 01:29:57', '2019-05-17 01:29:57', NULL),
(122, '84902756111', 0, '$2y$10$1RHvJJaDPZJ3c9Xm9nkCoek3oVKEGLiDTBcDT/Y/yxU44GpIa30nO', 'active', NULL, '2019-05-17 02:15:43', '2019-05-17 02:15:43', NULL),
(123, '84932685900', 0, '$2y$10$.iYJT.SEHZKXYQJIhHQ5KuLWQS.RuUvnqBVsg4WCVqP.lDC4Zn6WW', 'active', NULL, '2019-05-17 02:23:35', '2019-05-17 02:23:35', NULL),
(124, '84932403555', 0, '$2y$10$ZxJV//ZqtGOL0dwyVeasBOCTE12EtLWKdduiYi9NlrPrb45RnteD2', 'active', NULL, '2019-05-17 04:09:24', '2019-05-17 04:09:24', NULL),
(125, '84902651574', 0, '$2y$10$VrzIebLPzA1RZohtFKmSgeew6kS9iInZUZfV2ERkgFhVkolBN78Sa', 'active', NULL, '2019-05-17 12:40:21', '2019-05-17 12:40:21', NULL),
(126, '13028580567', 0, '$2y$10$x/ZjK86XBraOUTL.3KOrzO2s/rbSifniAusUa5jl5n8uoUXml.eTS', 'active', NULL, '2019-05-17 13:26:08', '2019-05-17 13:26:08', NULL),
(127, '14084066195', 0, '$2y$10$JsSu3cME2TW7bfT09dOC/ezc.5.Mb/sLBwLTkqZNREqo0E1H.Z40K', 'active', NULL, '2019-05-17 15:05:47', '2019-05-17 15:05:47', NULL),
(128, '84796975047', 0, '$2y$10$G.y2y/iQqqIq/J7sJpoDvOmRmerPsKtJgKo2TpqPsj1/XAqf3nl7i', 'active', NULL, '2019-05-17 15:25:47', '2019-05-17 15:25:47', NULL),
(129, '84932000111', 0, '$2y$10$9V4gAYwa.5TDyd.1L6mkx.4TU1Z2eUmK4YH/aM2VaUKtZ0Bl7IJ1u', 'active', NULL, '2019-05-18 00:33:41', '2019-05-18 00:33:41', NULL),
(130, '84932685992', 0, '$2y$10$VHoRPNqkq00UoXkcYkzCdutbVPu5V7qJQmgvwnPimKkc.UaVr/8ku', 'active', NULL, '2019-05-18 01:17:46', '2019-05-18 01:17:46', NULL),
(131, '84392887543', 0, '$2y$10$rza/5TY9JinVZqOwyHrZpu9AxvJFOGYgABNorogp6Yzajm1gcvTvG', 'active', NULL, '2019-05-18 01:18:42', '2019-05-18 01:18:42', NULL),
(132, '84937320724', 0, '$2y$10$rYvg1Id3i14aHRnItRX6/uZiuJRZLtja646WsDYUqy5kKVBy7Ebxe', 'active', NULL, '2019-05-18 01:20:18', '2019-05-18 01:20:18', NULL),
(133, '84986295059', 0, '$2y$10$9M3s6cjxKlBJQQDHKEjL8.CHigWZjlWEKGQL3HhjyzXWymPc6wmuK', 'active', NULL, '2019-05-18 04:14:43', '2019-05-18 04:14:43', NULL),
(134, '84974888452', 0, '$2y$10$UUzKTU9XryVyRaOkFs7XaOdFVEzRW5l8XkQA5h7GBjW.VWRbqGT7y', 'active', NULL, '2019-05-18 04:53:40', '2019-05-18 04:53:40', NULL),
(135, '84963375444', 0, '$2y$10$P85T64PQl4OKMUEMB55G0OTMqii5.fuFL5cKj5UiQIIzoJ421ZTJe', 'active', NULL, '2019-05-18 08:16:36', '2019-05-18 08:16:36', NULL),
(136, '84902801647', 0, '$2y$10$6BK617MS9eU4d.O0/hn3d.Ac1miwIiu3AMsohnoxQ4Z.0dk0BB/UW', 'active', NULL, '2019-05-19 01:23:53', '2019-05-19 01:23:53', NULL),
(137, '84919470999', 0, '$2y$10$9P.lR/4Efu6un/WWM4UEYO/06JruuTXRKwGfN0TiqIkAuaoiMAgkK', 'active', NULL, '2019-05-19 02:24:53', '2019-05-19 02:24:53', NULL),
(138, '84903395506', 0, '$2y$10$uSjo0Pd1KidVBcHnU6uV1u3HhH1jZ9yrh/72Z61ibsWkHyycWI0KG', 'active', NULL, '2019-05-19 03:44:34', '2019-05-19 03:44:34', NULL),
(139, '84776666890', 0, '$2y$10$xw29y4jtlA2wXXm9Sy6QG.dzBx2U4cyjmse2f8Z5hjBAIvNA/DY0O', 'active', NULL, '2019-05-19 05:37:07', '2019-05-19 05:37:07', NULL),
(140, '84989723577', 0, '$2y$10$/.kbb1tH4EgXZO.LYqDt7uGbDexuOqnigO1XR4UnwKn8Yr.do3PM6', 'active', NULL, '2019-05-19 08:10:28', '2019-05-19 08:10:28', NULL),
(141, '84908128113', 0, '$2y$10$HFPQwKJVSyOfm9kUqG9y.eMz8aDCt4iH8VkVD/tRWdop1OIRkxMJq', 'active', NULL, '2019-05-19 12:22:26', '2019-05-19 12:22:26', NULL),
(158, '84947052246', 0, '$2y$10$QbnUg1aLlKP0/rO1uuspEuT0OidLpDXQ70gq/GApmW/YlK6TXaqYa', 'active', NULL, '2019-05-21 02:52:31', '2019-05-21 02:52:31', NULL),
(159, '84919230099', 0, '$2y$10$arh729QUPcUTo7BvwIDAg.cYv9FtnQcQNJma6PMJXcpF0Pxc5uuaO', 'active', NULL, '2019-05-21 02:59:31', '2019-05-21 02:59:31', NULL),
(160, '84937887896', 0, '$2y$10$/qH/KivZmnCpJGnVgeVhhOtp5AD4llK5sidMW6xaXN/WZYXEyI6hO', 'active', NULL, '2019-05-21 03:14:36', '2019-05-21 03:14:36', NULL),
(161, '886985182186', 0, '$2y$10$XApWJ0DtJu3OPT6MquMHju05tzqlVq5ItUrJTXIIU.DoVopJ1E85u', 'active', NULL, '2019-05-21 03:16:25', '2019-05-21 03:16:25', NULL),
(163, '84931494449', 0, '$2y$10$WaAcQFumDd3Cyz6yar88DeuOrBNOx4e5yWyJtcs4rkd4mhUP/EdLi', 'active', NULL, '2019-05-21 03:43:37', '2019-05-21 03:43:37', NULL),
(164, '84987999947', 0, '$2y$10$xS0Qkp40Igzx4bIm7o4ujOHVQdzHuwksapyUc2MWGCa9S4iiPhfBS', 'active', NULL, '2019-05-21 12:00:23', '2019-05-21 12:00:23', NULL),
(165, '84987779548', 0, '$2y$10$JlWUIm6z9GsL0sJ49WFzXuODMHV.PpHRT9V7ycFmqJVCtrEj/U.OO', 'active', NULL, '2019-05-21 12:00:46', '2019-05-21 12:00:46', NULL),
(166, '84904618869', 0, '$2y$10$DIcbgfjO7OVRUuadSMBkJ.BKkIDXKNeFOHMzE/MOtXNwhpaXB51H6', 'active', NULL, '2019-05-21 12:01:52', '2019-05-21 12:01:52', NULL),
(167, '84987764546', 0, '$2y$10$FhP1QscG0e.LyYkpyJfMWuPszoLoj.PL18ylSNmLyKaFLjU1o.CUy', 'active', NULL, '2019-05-21 12:02:13', '2019-05-21 12:02:13', NULL),
(168, '84976949666', 0, '$2y$10$W.M8obLEh4lJPTTzu4aW6.1R/f2YCKrRDH6LMF4ji9hdFxzUzX7Gy', 'active', NULL, '2019-05-21 12:04:07', '2019-05-21 12:04:07', NULL),
(169, '84919915283', 0, '$2y$10$mrzDSEfy8tAzDbU7HdB4s.atrjizKYA.9q6pmWYf7B0jXYYufBaIm', 'active', NULL, '2019-05-21 12:05:36', '2019-05-21 12:05:36', NULL),
(170, '84798091088', 0, '$2y$10$tOkI6xjfnqzPwUK/CB2uR.7stzdn7AhOXJg2e65kCV6SLzy04hlyC', 'active', NULL, '2019-05-21 13:30:08', '2019-05-21 13:30:08', NULL),
(171, '84983670567', 0, '$2y$10$UKx1cgpAnPzbVGL7c6SVU.IkZVf8RmsFD1OJRbC9BM/khUzh33YiS', 'active', NULL, '2019-05-21 15:29:51', '2019-05-21 15:29:51', NULL),
(172, '84828428255', 0, '$2y$10$WAIr4aOMxALMYJVixFHBJea5j2PmH3Z.S9PVFfxgPIoD8yHxKJHre', 'active', NULL, '2019-05-21 16:10:47', '2019-05-21 16:10:47', NULL),
(173, '84938144899', 0, '$2y$10$MSdt3NEy5AOeNbplTVq65uWZrxbW8l3ngRyv1AMC.sXSVXyVkmxQ2', 'active', NULL, '2019-05-22 01:59:14', '2019-05-22 01:59:14', NULL),
(174, '84901497080', 0, '$2y$10$Gz1bVo4RjtILRRpKBbuPNel9pQOjADG261QP7TOqi0ZPjp/CUH82e', 'active', NULL, '2019-05-22 02:01:23', '2019-05-22 02:01:23', NULL),
(175, '84868903390', 0, '$2y$10$UkY9ygey0QUCEf0PrXvOouHWRYc7Vw/k/unowJ2uLw.7N8tPAD0VK', 'active', NULL, '2019-05-22 02:06:59', '2019-05-22 02:06:59', NULL),
(176, '84906711594', 0, '$2y$10$u4Ob2wATB8WFLGYnnsqNNefhI1.uG/7V9VTU3utmoDgKMGwahVQCm', 'active', NULL, '2019-05-22 02:15:40', '2019-05-22 02:15:40', NULL),
(177, '84764602139', 0, '$2y$10$062LzLBFkgxkkGSdvMKRHuo0Ka9RmftvH9ZWxsAClG8SrD6u/hp8y', 'active', NULL, '2019-05-22 02:17:53', '2019-05-22 02:17:53', NULL),
(178, '84932685337', 0, '$2y$10$EyiDtEMtuRM8S171n8cK0ewsXxREOqvK4hUtqutUKA.lKchXibdzC', 'active', NULL, '2019-05-22 02:18:08', '2019-05-22 02:18:08', NULL),
(179, '84921543081', 0, '$2y$10$scojdiT3t8kP4QaZJ7f7kuC88E9DHy1bHuersyEWNipwzpitTE0Gu', 'active', NULL, '2019-05-22 03:28:13', '2019-05-22 03:28:13', NULL),
(180, '84932685812', 0, '$2y$10$SFtKoZokGNqjCCMWzUQ/x.TZSbROWtxprOuAiYIZldWHt.TS4awqq', 'active', NULL, '2019-05-22 04:41:23', '2019-05-22 04:41:23', NULL),
(181, '84985777007', 0, '$2y$10$mkzb7QYClzXaADl1yngY1OqwtfA5Axq1LYzk0K0LJEKlNGi8wzljy', 'active', NULL, '2019-05-22 09:40:19', '2019-05-22 09:40:19', NULL),
(182, '84945936946', 0, '$2y$10$NZVuK3wgubTE.kpr1Gu9hO3QOoDaHWM8pHaGzoSzKt.NT1d1OcZM2', 'active', NULL, '2019-05-22 15:48:38', '2019-05-22 15:48:38', NULL),
(183, '84906609077', 0, '$2y$10$R7hIFedzC9b0eCgyeQoWTeMKS4laZqvDow.ZRs9bQ/z.X19rJ7Fj.', 'active', NULL, '2019-05-22 16:10:26', '2019-05-22 16:10:26', NULL),
(184, '84937383783', 0, '$2y$10$qXWSl05uaxdWH24QGbYbh.DxT9f2ZH9euYLEU5sGd28ub151Cjmba', 'active', NULL, '2019-05-22 16:18:35', '2019-05-22 16:18:35', NULL),
(185, '84988504949', 0, '$2y$10$xsYZrYE7k.Or0fbZTfkL4uveX4RVYb7kHCBpqUI7GoZtumXG9WorK', 'active', NULL, '2019-05-22 16:36:04', '2019-05-22 16:36:04', NULL),
(186, '84769608603', 0, '$2y$10$IXct77ja75oqPG3JOInu5eEpMVIjlFKuZXX.XIExbSC0HJTItlgcm', 'active', NULL, '2019-05-22 20:15:45', '2019-05-22 20:15:45', NULL),
(187, '84985966441', 0, '$2y$10$hRDSknQLp7SMfIy9Wl.xHuVxBoYQxTyJLtNR988GqGNCY3tEWY9Cu', 'active', NULL, '2019-05-23 02:53:05', '2019-05-23 02:53:05', NULL),
(189, '84909604665', 0, '$2y$10$LTFj5pQhJN/dCwSXLW774e2XkWw82.o3xmUiQbBT.5pjEMecNU0o2', 'active', NULL, '2019-06-11 05:13:20', '2019-06-11 05:13:20', 'tMFeMhTEURaT8xFiHvC4UkQJXOdeu80oKdV5Vg6OVYZmvxcTCc0an5dM00EH'),
(190, '+84949638481', 0, '$2y$10$RrKXV8AsH4VGZrKAdYOoq.IATEca.qbMqdbnUo/DBJ17AeK11QOx6', 'active', NULL, '2019-06-19 20:29:47', '2019-06-19 20:29:47', 'MgNKMV7kgQS0ia6KslhuPJKclrh9GjnxJC3Y79dekH3bij8GEgs58qaokTWQ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`);

--
-- Constraints for table `domains`
--
ALTER TABLE `domains`
  ADD CONSTRAINT `domains_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `issuers`
--
ALTER TABLE `issuers`
  ADD CONSTRAINT `issuers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`);

--
-- Constraints for table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`);

--
-- Constraints for table `messages_cards`
--
ALTER TABLE `messages_cards`
  ADD CONSTRAINT `messages_cards_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`),
  ADD CONSTRAINT `messages_cards_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`),
  ADD CONSTRAINT `messages_cards_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`);

--
-- Constraints for table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`),
  ADD CONSTRAINT `promotions_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`);

--
-- Constraints for table `promotions_groups`
--
ALTER TABLE `promotions_groups`
  ADD CONSTRAINT `promotions_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `promotions_groups_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`),
  ADD CONSTRAINT `promotions_groups_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `promotions_locations`
--
ALTER TABLE `promotions_locations`
  ADD CONSTRAINT `promotions_locations_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`),
  ADD CONSTRAINT `promotions_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `promotions_locations_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `promotions_releases`
--
ALTER TABLE `promotions_releases`
  ADD CONSTRAINT `promotions_releases_issuer_id_foreign` FOREIGN KEY (`issuer_id`) REFERENCES `issuers` (`id`),
  ADD CONSTRAINT `promotions_releases_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
