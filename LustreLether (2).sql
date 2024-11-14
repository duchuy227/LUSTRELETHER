-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 15, 2024 lúc 12:10 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `LustreLether`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Admin`
--

CREATE TABLE `Admin` (
  `Ad_ID` int(11) NOT NULL,
  `Ad_Username` varchar(255) NOT NULL,
  `Ad_Password` varchar(255) NOT NULL,
  `Ad_Email` varchar(255) NOT NULL,
  `Ad_Fullname` varchar(255) NOT NULL,
  `Ad_DOB` date NOT NULL,
  `Ad_Image` varchar(255) DEFAULT NULL,
  `Ad_Income` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Admin`
--

INSERT INTO `Admin` (`Ad_ID`, `Ad_Username`, `Ad_Password`, `Ad_Email`, `Ad_Fullname`, `Ad_DOB`, `Ad_Image`, `Ad_Income`) VALUES
(1, 'quocbao12', 'quocbao12@', 'quocbao@gmail.com', 'Quoc Bao', '2000-04-11', 'Views/Img/image.jpeg', '2737920.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Booking`
--

CREATE TABLE `Booking` (
  `Booking_ID` int(11) NOT NULL,
  `Booking_CreateTime` timestamp NULL DEFAULT current_timestamp(),
  `Booking_Content` varchar(255) NOT NULL,
  `Booking_TotalDay` decimal(10,2) NOT NULL,
  `Booking_Status` varchar(255) NOT NULL,
  `Booking_StartDate` date NOT NULL,
  `Booking_EndDate` date NOT NULL,
  `Booking_Expense` decimal(10,2) NOT NULL,
  `Booking_Note` varchar(255) DEFAULT NULL,
  `Cus_ID` int(11) NOT NULL,
  `Influ_ID` int(11) NOT NULL,
  `Topic_ID` int(11) NOT NULL,
  `Feed_ID` int(11) DEFAULT NULL,
  `Inv_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Booking`
--

INSERT INTO `Booking` (`Booking_ID`, `Booking_CreateTime`, `Booking_Content`, `Booking_TotalDay`, `Booking_Status`, `Booking_StartDate`, `Booking_EndDate`, `Booking_Expense`, `Booking_Note`, `Cus_ID`, `Influ_ID`, `Topic_ID`, `Feed_ID`, `Inv_ID`) VALUES
(100, '2024-11-09 22:50:53', 'Product Review', '1.00', 'Completed', '2024-11-10', '2024-11-11', '1500000.00', '', 61, 101, 11, NULL, 100),
(101, '2024-11-09 22:51:24', 'Instructions and tips', '1.00', 'In Progress', '2024-11-15', '2024-11-15', '1800000.00', '', 61, 103, 13, NULL, NULL),
(102, '2024-11-09 22:51:49', 'Product launch', '1.00', 'Rejected', '2024-11-21', '2024-11-23', '1500000.00', '', 61, 101, 14, NULL, NULL),
(103, '2024-11-10 00:12:25', 'Product launch', '2.00', 'Completed', '2024-11-14', '2024-11-15', '3218000.00', 'Oke', 60, 109, 11, NULL, 101),
(105, '2024-11-10 00:07:26', 'Product Review', '2.00', 'Completed', '2024-11-11', '2024-11-12', '3218000.00', '', 60, 109, 11, NULL, 102),
(106, '2024-11-10 00:12:14', 'Product launch', '3.00', 'Pending', '2024-11-27', '2024-11-29', '12000000.00', NULL, 60, 106, 11, NULL, NULL),
(108, '2024-11-10 00:11:53', 'Consulting & suggesting', '3.00', 'Pending', '2024-11-14', '2024-11-16', '4500000.00', '', 60, 101, 15, NULL, NULL),
(110, '2024-11-09 23:36:04', 'Livestream', '1.00', 'Pending', '2024-11-20', '2024-11-20', '2100000.00', NULL, 60, 107, 14, NULL, NULL),
(111, '2024-11-10 00:13:02', 'Analysis and comparison', '2.00', 'Pending', '2024-11-14', '2024-11-15', '6000000.00', NULL, 60, 105, 13, NULL, NULL),
(112, '2024-11-13 21:16:28', 'Analysis and comparison', '1.00', 'Pending', '2024-11-16', '2024-11-16', '1800000.00', 'Oke', 60, 103, 13, NULL, NULL),
(113, '2024-11-14 00:50:50', 'Instructions for use', '2.00', 'Pending', '2024-11-15', '2024-11-16', '3600000.00', NULL, 61, 102, 12, NULL, NULL),
(114, '2024-11-14 06:44:02', 'Livestream', '4.00', 'In Progress', '2024-11-17', '2024-11-20', '6436000.00', '', 60, 109, 14, NULL, 103),
(115, '2024-11-14 06:44:56', 'Workshops', '5.00', 'In Progress', '2024-11-24', '2024-11-28', '8045000.00', '', 60, 109, 11, NULL, 104),
(116, '2024-11-14 09:31:11', 'Instructions for use', '1.00', 'Rejected', '2024-11-21', '2024-11-21', '4000000.00', NULL, 60, 106, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Comment`
--

CREATE TABLE `Comment` (
  `Com_ID` int(11) NOT NULL,
  `Com_Detail` varchar(1000) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `Ad_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Comment`
--

INSERT INTO `Comment` (`Com_ID`, `Com_Detail`, `Post_ID`, `Ad_ID`) VALUES
(150, 'Oke fine', 103, 1),
(151, 'Good content', 104, 1),
(152, 'Wow, impressive', 105, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Content`
--

CREATE TABLE `Content` (
  `Content_ID` int(11) NOT NULL,
  `Content_Name` varchar(255) NOT NULL,
  `Content_Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Content`
--

INSERT INTO `Content` (`Content_ID`, `Content_Name`, `Content_Description`) VALUES
(20, 'Product Review', 'A product review is an assessment or feedback from users or experts about the features, quality, and performance of a product, helping potential consumers make informed decisions. These reviews provide insight into the pros and cons of a product, often highlighting user experience, reliability, and value for money, which in turn influence purchasing decisions.'),
(21, 'Share experience', 'Sharing experience is the act of imparting knowledge, lessons, or advice that one has accumulated through work, study, or practical experience. This helps others learn, avoid mistakes, or gain new perspectives, thereby developing skills and achieving better results in work or life.'),
(22, 'Instructions and tips', 'Instructions and tips are guidelines and helpful suggestions to make tasks easier, more efficient, or safer. They provide step-by-step directions and practical advice to ensure successful outcomes and help users avoid common mistakes.'),
(23, 'Analysis and comparison', 'Analysis and comparison involve examining the details and characteristics of subjects to understand them more deeply and highlight their differences or similarities. This process helps in making informed decisions, identifying strengths and weaknesses, and gaining clearer insights by evaluating various aspects side-by-side.'),
(24, 'Livestream', 'Livestream is a real-time broadcast of video content over the internet, allowing viewers to watch and interact as events happen live. It\'s popular for sharing experiences, hosting events, and engaging with audiences instantly through comments, reactions, and live chats.'),
(25, 'Review of new trends', 'A review of new trends involves analyzing the latest developments and shifts in a particular field—such as fashion, technology, or social media—to understand emerging patterns and potential impacts. This review provides insights into what\'s gaining popularity, helps forecast future directions, and assists individuals or businesses in staying relevant and competitive.'),
(26, 'Consulting & suggesting', 'Consulting and suggesting involve providing expert advice and recommendations to guide decision-making or problem-solving. Consulting offers in-depth analysis and tailored strategies, while suggesting includes offering practical ideas or options, both aimed at helping individuals or organizations make informed, effective choices.'),
(27, 'Instructions for use', 'Instructions for use provide step-by-step guidance on how to properly operate or handle a product, tool, or service. These instructions aim to ensure safe, effective usage and often include safety precautions, setup procedures, and troubleshooting tips to enhance the user experience and prevent misuse.'),
(28, 'Introduction and analysis', 'ntroduction and analysis serve to first present a topic, offering context and background, and then examine it in detail to uncover insights or deeper understanding. The introduction sets the stage by outlining key points, while the analysis breaks down components, explores implications, and provides a thorough evaluation to support conclusions or inform decisions.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Customer`
--

CREATE TABLE `Customer` (
  `Cus_ID` int(11) NOT NULL,
  `Cus_Username` varchar(255) NOT NULL,
  `Cus_Password` varchar(255) NOT NULL,
  `Cus_Email` varchar(255) NOT NULL,
  `Cus_Fullname` varchar(255) NOT NULL,
  `Cus_PhoneNumber` varchar(255) NOT NULL,
  `Cus_DOB` date NOT NULL,
  `Cus_Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Customer`
--

INSERT INTO `Customer` (`Cus_ID`, `Cus_Username`, `Cus_Password`, `Cus_Email`, `Cus_Fullname`, `Cus_PhoneNumber`, `Cus_DOB`, `Cus_Image`) VALUES
(60, 'Quynhchuc', 'quynhchuc', 'chuc@gmail.com', 'Quynh Chuc', '0917062002', '2002-06-17', 'Views/Img/img3.jpg'),
(61, 'quocbao', 'quocbao11', 'quocbao@gmail.com', 'Quốc Bảo', '0917617655', '2002-04-11', 'Views/Img/img5.jpeg'),
(62, 'quan113', 'quan113', 'quann@gmail.com', 'Minh Quân', '0123456789', '2001-11-11', 'Views/Img/cus2.png'),
(63, 'viethuy11', 'viethuy', 'viethuy@gmail.com', 'Việt Huy', '0876537273', '2001-11-02', 'Views/Img/cus1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Cus_Content`
--

CREATE TABLE `Cus_Content` (
  `Cus_ID` int(11) NOT NULL,
  `Content_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Cus_Content`
--

INSERT INTO `Cus_Content` (`Cus_ID`, `Content_ID`) VALUES
(60, 21),
(60, 24),
(60, 25),
(60, 28),
(61, 23),
(61, 24),
(61, 25),
(62, 20),
(62, 24),
(62, 28),
(63, 20),
(63, 24),
(63, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Cus_Event`
--

CREATE TABLE `Cus_Event` (
  `Cus_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Cus_Event`
--

INSERT INTO `Cus_Event` (`Cus_ID`, `Event_ID`) VALUES
(60, 21),
(60, 23),
(60, 25),
(61, 26),
(61, 27),
(61, 28),
(62, 20),
(62, 21),
(62, 22),
(63, 23),
(63, 24),
(63, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Cus_Topic`
--

CREATE TABLE `Cus_Topic` (
  `Cus_ID` int(11) NOT NULL,
  `Topic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Cus_Topic`
--

INSERT INTO `Cus_Topic` (`Cus_ID`, `Topic_ID`) VALUES
(60, 10),
(60, 11),
(60, 14),
(61, 13),
(61, 14),
(61, 15),
(62, 10),
(62, 11),
(62, 12),
(63, 10),
(63, 14),
(63, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Event`
--

CREATE TABLE `Event` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `Event_Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Event`
--

INSERT INTO `Event` (`Event_ID`, `Event_Name`, `Event_Description`) VALUES
(20, 'Product launch', 'A product launch is the process of introducing a new product to the market, typically accompanied by a marketing campaign to generate awareness and excitement. It involves strategic planning, including product positioning, target audience identification, promotional efforts, and distribution strategies, aimed at ensuring the product\'s successful entry and adoption by customers.'),
(21, 'Special Seminars', 'Special seminars are focused events or sessions designed to provide in-depth knowledge, training, or discussion on a specific topic. These seminars often feature experts or industry leaders as speakers and aim to educate or inform participants on specialized subjects, offering unique insights, practical skills, or networking opportunities.'),
(22, 'Workshops', 'Workshops are interactive training sessions where participants engage in hands-on activities to learn new skills, solve problems, or explore specific topics. These sessions typically involve group discussions, practical exercises, and direct guidance from instructors or experts, allowing attendees to apply what they\'ve learned in real-time.'),
(23, 'Product Exhibitions', 'Product exhibitions are events where companies showcase their products to potential customers, partners, and industry professionals. These exhibitions provide an opportunity for businesses to demonstrate the features, benefits, and innovations of their products, engage with a target audience, and generate interest or sales through direct interaction and visual displays.'),
(24, 'Industry Festivals', 'Industry festivals are large-scale events that celebrate and highlight the trends, innovations, and culture of a specific industry. These festivals often feature a mix of exhibitions, presentations, performances, and networking opportunities, bringing together professionals, enthusiasts, and businesses to share knowledge, collaborate, and showcase the latest developments within the industry'),
(25, 'Category Awards', 'Category awards are recognition given to individuals, organizations, or products that excel within a specific category or field. These awards are typically part of a broader event or competition and aim to highlight outstanding achievements, innovation, or performance in particular areas, such as technology, marketing, or customer service.'),
(26, 'Sector Meetups', 'Sector meetups are informal gatherings or events where professionals, experts, and enthusiasts from a specific industry or sector come together to network, share knowledge, and discuss trends or challenges. These meetups provide an opportunity for individuals to collaborate, exchange ideas, and stay updated on developments within their field.'),
(27, 'Partner Networking', 'Partner networking refers to the process of building and strengthening relationships with potential or existing business partners to foster collaboration, share resources, and explore mutual opportunities. This type of networking typically involves connecting with other companies, influencers, or stakeholders within a specific industry to create strategic alliances that can lead to increased growth, innovation, and success for all parties involved.'),
(28, 'Trade Fairs', 'Trade fairs are large events where businesses from a particular industry or sector gather to showcase their products, services, and innovations to potential buyers, suppliers, and partners. These events offer a platform for networking, exploring new market trends, conducting business deals, and gaining visibility within a specific industry.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Facebook`
--

CREATE TABLE `Facebook` (
  `FB_ID` int(11) NOT NULL,
  `FB_Link` varchar(1000) NOT NULL,
  `Influ_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Facebook`
--

INSERT INTO `Facebook` (`FB_ID`, `FB_Link`, `Influ_ID`) VALUES
(1, 'https://www.facebook.com/@dinovu', 100),
(2, 'https://www.facebook.com/honghanh.hoang.961556', 101),
(3, 'https://www.facebook.com/mctranglinh1903', 102),
(4, 'https://www.facebook.com/giangnd13', 103),
(5, 'https://www.facebook.com/mhynhii166', 104),
(6, 'https://www.facebook.com/truongquocbao', 105),
(7, 'https://www.facebook.com/chaubui.official', 106),
(8, 'https://www.facebook.com/vohalinh.beee', 107),
(9, 'https://www.facebook.com/profile.php?id=100010650557461', 108),
(10, 'https://www.facebook.com/hoang.ngoc.annepegjykyfairy09', 109),
(11, 'https://www.facebook.com/profile.php?id=100072785960177', 110),
(12, 'https://www.facebook.com/chucquynh170602', 111),
(13, 'https://www.facebook.com/@dinovu', 100),
(14, 'https://www.facebook.com/honghanh.hoang.961556', 101),
(15, 'https://www.facebook.com/mctranglinh1903', 102),
(16, 'https://www.facebook.com/mhynhii166', 104),
(17, 'https://www.facebook.com/truongquocbao', 105),
(18, 'https://www.facebook.com/chaubui.official', 106),
(19, 'https://www.facebook.com/vohalinh.beee', 107),
(20, 'https://www.facebook.com/profile.php?id=100010650557461', 108),
(21, 'https://www.facebook.com/hoang.ngoc.annepegjykyfairy09', 109),
(22, 'https://www.facebook.com/profile.php?id=100072785960177', 110),
(23, 'https://www.facebook.com/chucquynh170602', 111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Feedbacks`
--

CREATE TABLE `Feedbacks` (
  `Feed_ID` int(11) NOT NULL,
  `Feed_CreateTime` timestamp NULL DEFAULT current_timestamp(),
  `Feed_Content` varchar(255) NOT NULL,
  `Booking_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Followers`
--

CREATE TABLE `Followers` (
  `Fol_ID` int(11) NOT NULL,
  `Fol_Quantity` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Followers`
--

INSERT INTO `Followers` (`Fol_ID`, `Fol_Quantity`) VALUES
(7, 'Less 200.000 followers'),
(8, 'From 200.000 - 500.000 followers'),
(9, 'From 500.000 - 1.000.000 followers'),
(10, 'From 1.000.000 - 5.000.000 followers'),
(11, 'Over 5.000.000 followers');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Gender`
--

CREATE TABLE `Gender` (
  `Gender_ID` int(11) NOT NULL,
  `Gender_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Gender`
--

INSERT INTO `Gender` (`Gender_ID`, `Gender_Name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Influencer`
--

CREATE TABLE `Influencer` (
  `Influ_ID` int(11) NOT NULL,
  `Influ_Username` varchar(255) NOT NULL,
  `Influ_Password` varchar(255) NOT NULL,
  `Influ_Email` varchar(255) NOT NULL,
  `Influ_Fullname` varchar(255) NOT NULL,
  `Influ_DOB` date NOT NULL,
  `Influ_PhoneNumber` varchar(255) NOT NULL,
  `Influ_Address` varchar(255) NOT NULL,
  `Influ_Nickname` varchar(255) NOT NULL,
  `Influ_Hastag` varchar(255) NOT NULL,
  `Influ_Price` decimal(10,2) NOT NULL,
  `Influ_ImageAuth` varchar(255) DEFAULT NULL,
  `Influ_Image` varchar(255) DEFAULT NULL,
  `Influ_OtherImage` text DEFAULT NULL,
  `Influ_Achivement` varchar(1000) NOT NULL,
  `Influ_Biography` varchar(1000) NOT NULL,
  `Influ_Status` varchar(255) NOT NULL,
  `Influ_Income` decimal(10,2) DEFAULT 0.00,
  `InfluType_ID` int(11) NOT NULL,
  `WPlace_ID` int(11) NOT NULL,
  `Fol_ID` int(11) NOT NULL,
  `Gender_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Influencer`
--

INSERT INTO `Influencer` (`Influ_ID`, `Influ_Username`, `Influ_Password`, `Influ_Email`, `Influ_Fullname`, `Influ_DOB`, `Influ_PhoneNumber`, `Influ_Address`, `Influ_Nickname`, `Influ_Hastag`, `Influ_Price`, `Influ_ImageAuth`, `Influ_Image`, `Influ_OtherImage`, `Influ_Achivement`, `Influ_Biography`, `Influ_Status`, `Influ_Income`, `InfluType_ID`, `WPlace_ID`, `Fol_ID`, `Gender_ID`) VALUES
(100, 'dinovu', 'dinovu', 'dinovu@gmail.com', 'Đặng Anh Vũ', '1992-05-13', '0917617655', 'Ha Noi', 'Dinology', '#food', '2500000.00', NULL, 'Views/Influ_Image/kol1.jpg', 'Views/Influ_Image/kol1x1.jpg,Views/Influ_Image/kol11.jpg,Views/Influ_Image/kol111.jpg,Views/Influ_Image/kol1111.jpg,Views/Influ_Image/kol111111.jpg', 'His channel, which shares food recipes and lifestyle content, has garnered a significant following. Dino Vũ\'s unique approach and dedication have inspired many young people to pursue their own passions. He continues to expand his content, venturing into areas like travel, technology, and sports​', 'Dino Vũ is a prominent food blogger and content creator known for his simple and easy-to-follow cooking tutorials. Despite having no cooking experience, he learned the craft through online resources, eventually creating accessible recipes. His passion for food and a growing interest in video production led him to launch his successful YouTube channel Ngòn Ngọt by Dino. Over time, he became a key figure in Vietnam\'s digital content creation scene, especially in the food blogging niche. He is also part of the \"super quartet\" of YouTubers alongside Giang Ơi, Anh Bạn Thân, and Cô Em Trendy', 'Active', '0.00', 6, 20, 9, 1),
(101, 'honghanh123', 'honghanh', 'hoanghonghanh54@gmail.com', 'Hoang Hong Hanh', '1996-04-05', '0917617655', 'Ha Noi', 'phobe_luz', '#mc', '1500000.00', NULL, 'Views/Influ_Image/mc1.jpg', 'Views/Influ_Image/mc1x1.jpg,Views/Influ_Image/mc11.jpg,Views/Influ_Image/mc111.jpg,Views/Influ_Image/mc1111.jpg,Views/Influ_Image/mc111111.jpg,Views/Influ_Image/mc1111111.jpg', 'Hong Hanh has made her mark in many television programs, notably as the MC in the program Hot Together with the World Cup, where she made a strong impression thanks to her solid football knowledge and charm. She always focuses on careful preparation, constantly improving her skills and knowledge to meet the demands of the audience.', 'MC Hong Hanh is a prominent MC in Vietnam, known for her confident and attractive style. She graduated from Ho Chi Minh City University of Foreign Languages ​​and Information Technology, majoring in English Translation and Interpretation. With her fluent communication skills and impressive appearance, Hong Hanh has been successful in many major programs, especially international sporting events such as the World Cup.', 'Active', '1207500.00', 5, 20, 9, 2),
(102, 'tranglinh123', 'tranglinh', 'tranglinh1928@gmail.com', 'Nguyễn Trang Linh', '1998-03-19', '0123456789', 'Vinh Phuc', 'tranglinh', '#tranglinh', '1800000.00', NULL, 'Views/Influ_Image/mc2x2.jpg', 'Views/Influ_Image/mc2.jpg,Views/Influ_Image/mc22.jpg,Views/Influ_Image/mc222.jpg,Views/Influ_Image/mc2222.jpg,Views/Influ_Image/mc22222.jpg', 'Her breakthrough came when she enrolled in a training course, rapidly refining her skills and transforming into a skilled MC within just six months. Not only did she excel as an MC for events at her university, but she also became the head of the \"IMC Club - MC Club,\" mentoring fellow students who shared her passion for hosting and presentation\r\n\r\nTrang Linh is an inspiring figure, known for her dedication, talent, and leadership, having created a space for aspiring MCs at her university to develop their skills and pursue their dreams, just as she did.', 'MC Trang Linh is a young and talented MC with a passion for the arts that started from an early age. She hails from Vĩnh Phúc and pursued her studies at the University of Thăng Long, where she began her journey into the world of MCing. Despite facing initial obstacles such as her regional accent and a lack of local training opportunities, Linh remained determined to follow her passion.', 'Active', '0.00', 5, 20, 8, 2),
(103, 'giangnd16', 'giang123', 'giang@gmail.com', 'Nguyen Duc Giang', '1993-03-16', '0876537273', 'Ha Noi', 'giangnd13', '#technology', '1800000.00', NULL, 'Views/Influ_Image/u949.png', 'Views/Influ_Image/u942.png,Views/Influ_Image/u945.png,Views/Influ_Image/u946.png,Views/Influ_Image/u938.png', 'Giang has collaborated with famous brands such as Nike and L\'Oreal, bringing strong communication effects. He has more than 1 million followers on Instagram and 500,000 followers on TikTok. In addition, Giang is also the founder of the fashion brand \"Giang Style\", which is loved by young people.', 'Nguyen Duc Giang is a prominent KOL in the fashion and beauty industry. He started his career on social media platforms with an impressive personal style. With his creativity and ability to grasp trends, Giang has become a familiar face for many major brands.\r\n', 'Active', '0.00', 6, 22, 9, 1),
(104, 'mhynhii166', 'nhi123', 'machhynhi1606@gmail.com', 'Mạch Thị Hỷ Nhi', '2000-09-22', '0904026263', 'Ha Noi', 'mhynhii166', '#mhynhi', '1700000.00', NULL, 'Views/Influ_Image/mc3.jpg', 'Views/Influ_Image/mc33.jpg,Views/Influ_Image/mc333.jpg,Views/Influ_Image/mc33333.jpg,Views/Influ_Image/mc3333.jpg,Views/Influ_Image/mc3333333.jpg', 'She has successfully hosted many famous shows such as \"Gala Laughter\", \"Dem Hoi Ngo\", and \"Nguoi Ke Chuyen Tinh\". Hy Nhi is also a favorite MC in live TV events and major award ceremonies. In addition, she has won many prestigious awards in the MC field, affirming her solid position in the entertainment industry.', 'Mach Thi Hy Nhi is a prominent MC in the entertainment industry, loved for her charm and excellent communication skills. She started her career from small TV shows and quickly made an impression with her natural, energetic hosting style. With her tireless efforts, Hy Nhi is now one of the leading MCs at major events.', 'Active', '0.00', 5, 22, 10, 2),
(105, 'quocbao', 'quocbao', 'mattybrap09@gmail.com', 'Truong Quoc Bao', '2002-04-11', '0917617655', 'Nghe An', 'Beo Beo', '#beo', '3000000.00', NULL, 'Views/Influ_Image/image.jpeg', 'Views/Influ_Image/img6.jpeg,Views/Influ_Image/img7.jpeg,Views/Influ_Image/img8.jpeg,Views/Influ_Image/img5.jpeg,Views/Influ_Image/img9.jpeg,Views/Influ_Image/u1067.JPG', 'Quoc Bao has collaborated with many major brands in the sports industry such as Nike and Adidas, helping to enhance the brand image. He has more than 800,000 followers on Instagram and 600,000 followers on YouTube, where he shares videos about sports, nutrition and life. Quoc Bao is also the founder of Bao Fit, a brand specializing in providing products to support training and nutrition.', 'Truong Quoc Bao is a famous KOL in the field of sports and lifestyle, known for sharing about health and healthy living. He started his career through articles and videos on social media platforms, where he shared his experiences and passion for sports. With a combination of professional knowledge and the ability to inspire, Quoc Bao quickly attracted the attention of the community and major brands.', 'Active', '0.00', 6, 22, 10, 1),
(106, 'chaubui123', 'chaubui', 'chaubui@gmail.com', 'Bùi Thái Bảo Châu', '1992-11-13', '0876537273', 'Ha Noi', 'Châu Bùi', '#chaubui', '4000000.00', NULL, 'Views/Influ_Image/kol22222.jpg', 'Views/Influ_Image/kol2.jpg,Views/Influ_Image/kol2x2.jpg,Views/Influ_Image/kol22.jpg,Views/Influ_Image/kol222.jpg,Views/Influ_Image/kol2222.webp,Views/Influ_Image/kol222222.webp', 'Chau Bui has collaborated with major brands such as Zara, H&M, and Sephora, helping them reach out to young consumers. She has more than 2 million followers on Instagram and 1 million followers on TikTok. In addition, Chau Bui also founded her own fashion brand Chou by Chau Bui, loved by fashionistas.', 'Chau Bui is a prominent KOC in the fashion and beauty industry, loved for her trendy style and sophisticated aesthetic sense. She started her career as a fashionista on social media platforms, quickly attracting the attention of many young people. Chau Bui is not only an influencer but also an icon of modern lifestyle trends.', 'Active', '0.00', 6, 22, 11, 2),
(107, 'vohalinh123', 'vohalinh', 'vhlinh.1211@gmail.com', 'Vo Ha Linh', '1996-11-12', '0917062002', 'Hanoi', 'Linh Be', '#beauty', '2100000.00', NULL, 'Views/Influ_Image/koc11.jpg', 'Views/Influ_Image/koc1.jpg,Views/Influ_Image/koc111.jpg,Views/Influ_Image/koc111111.jpg,Views/Influ_Image/koc1x1.jpg,Views/Influ_Image/koc1111.jpg', 'Ha Linh has collaborated with many big brands such as L\'Oreal, Maybelline, and The Face Shop, helping to increase the presence of products in the market strongly. She has over 1 million followers on YouTube and over 500,000 followers on Instagram. She is also the founder of the Vo Ha Linh Beauty channel, which provides beauty and self-care tutorial videos to the community.', 'Vo Ha Linh is a prominent KOC in the beauty and lifestyle community, known for her videos sharing about makeup, beauty care, and personal life. She started her career from sharing her experiences on YouTube and quickly made an impression with her sincerity and naturalness. With her close communication skills and solid expertise, Ha Linh has become a role model for young people who love beauty.', 'Active', '0.00', 7, 20, 10, 2),
(108, 'truongphat', 'truongphat', 'killerhine@gmail.com', 'Nguyễn Hữu Trường Phát', '2002-07-22', '0911090007', 'Ha Noi', 'Bon Bon', '#bon', '2500000.00', NULL, 'Views/Influ_Image/koc2.jpg', 'Views/Influ_Image/koc22.jpg,Views/Influ_Image/koc222.jpg,Views/Influ_Image/koc2222.jpg,Views/Influ_Image/koc22222.jpg,Views/Influ_Image/koc2222222.jpg,Views/Influ_Image/koc2x2.jpg', 'Truong Phat has cooperated with major technology brands such as Samsung, Xiaomi, and Sony, helping to promote and grow the technology product market. He has more than 800,000 followers on YouTube and more than 400,000 followers on Facebook. Truong Phat is also the founder of the Tech Phat channel, where he shares review videos, user guides and tips on outstanding technology products.', 'Nguyen Huu Truong Phat is a prominent KOC in the field of technology and life, known for his videos sharing about technology products, tips and modern lifestyle. He started his career with articles and product review videos on social networking platforms, quickly attracting the attention of the technology-loving community. Truong Phat has become a major influencer in the Vietnamese tech community with his extensive knowledge and easy-to-understand approach.', 'Active', '0.00', 7, 20, 9, 1),
(109, 'ngoc1609', 'ngoc1609', 'ngoc@gmail.com', 'Hoàng Thị Ngọc', '2001-09-16', '0388875225', 'Phú Thọ', 'Rabbit Baby', '#anne', '1609000.00', NULL, 'Views/Influ_Image/koc3.jpg', 'Views/Influ_Image/koc333.jpg,Views/Influ_Image/koc33.jpg,Views/Influ_Image/koc3333.jpg,Views/Influ_Image/koc33333.jpg,Views/Influ_Image/koc33x3.JPG,Views/Influ_Image/koc3x3.JPG', 'Ngoc has hosted many prominent television programs such as \"National Music Program\" and \"Hot Entertainment Event\". She is also the main MC of major award ceremonies and international events, demonstrating her talent and confidence. Along with that, Ngoc has received many prestigious awards in the television industry, leaving an impression in the hearts of audiences who love her charm and professionalism.', 'Hoang Thi Ngoc is a prominent MC in the entertainment industry, especially in television programs and major events. She is known for her professional and charming hosting style and ability to connect with the audience. With her constant efforts, Ngoc has affirmed her solid position in the hearts of fans.', 'Active', '5180980.00', 5, 20, 10, 2),
(110, 'huongdao', 'huongdao', 'huong@gmail.com', 'Dao Mai Huong', '2001-11-10', '0936092933', 'Ha Noi', 'Bé Đào', '#bedao', '2500000.00', NULL, 'Views/Influ_Image/koc4.jpg', 'Views/Influ_Image/koc4x4.jpg,Views/Influ_Image/koc44.jpg,Views/Influ_Image/koc444.jpg,Views/Influ_Image/koc44444.jpg,Views/Influ_Image/koc444444.jpg', 'Mai Huong has collaborated with many famous brands in the cosmetics industry such as Innisfree, L\'Oreal, and Laneige, contributing to the development and promotion of beauty products. She has more than 700,000 followers on Instagram and more than 500,000 subscribers on YouTube. In addition, Mai Huong is also the founder of Huong Beauty, a platform for sharing about beauty and lifestyle, loved by many people.', 'Dao Mai Huong is a prominent KOC in the beauty and fashion community, loved for her natural personal style and strong influence on social media platforms. She started her career through beauty tutorials and sharing self-care tips on YouTube, thereby attracting the attention of a large number of fans. Mai Huong always stands out with useful advice and a close approach, easily connecting with followers.', 'Active', '0.00', 7, 20, 10, 2),
(111, 'quynhchuc1706', 'chuc1706', 'chuc@gmail.com', 'Nguyen Thi Quynh Chuc', '2002-06-17', '0976039034', 'Thuong Tin', 'Luciaaa', '#ducky', '1706000.00', NULL, 'Views/Influ_Image/koc555.jpg', 'Views/Influ_Image/koc5.jpg,Views/Influ_Image/koc5x5.jpg,Views/Influ_Image/kocprofile.jpg,Views/Influ_Image/koc55.jpg,Views/Influ_Image/koc55555.jpg', 'Quynh Chuc has collaborated with many big brands such as The Face Shop, Shiseido, and Vichy, helping to increase awareness and promote beauty care products. She has more than 600,000 followers on Instagram and 400,000 followers on Facebook, where she shares articles and videos about beauty, nutrition, and lifestyle. In addition, Quynh Chuc also founded Chuc Beauty, a channel specializing in providing knowledge about beauty and self-care, which is loved by many people.', 'Nguyen Thi Quynh Chuc is a prominent KOC in the beauty and health care industry, known for her useful sharing about products and healthy living habits. She started her career with beauty and health care tutorial videos on social media platforms, quickly attracting the attention of a large number of followers. With a gentle and approachable style, Quynh Chuc has built a community that loves and trusts her advice.\r\n', 'Active', '0.00', 7, 20, 10, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Influencer_Type`
--

CREATE TABLE `Influencer_Type` (
  `InfluType_ID` int(11) NOT NULL,
  `InfluType_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Influencer_Type`
--

INSERT INTO `Influencer_Type` (`InfluType_ID`, `InfluType_Name`) VALUES
(5, 'MC'),
(6, 'KOL'),
(7, 'KOC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Influ_Topic`
--

CREATE TABLE `Influ_Topic` (
  `Influ_ID` int(11) NOT NULL,
  `Topic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Influ_Topic`
--

INSERT INTO `Influ_Topic` (`Influ_ID`, `Topic_ID`) VALUES
(100, 10),
(100, 12),
(100, 15),
(101, 11),
(101, 13),
(101, 14),
(101, 15),
(102, 10),
(102, 11),
(102, 12),
(103, 11),
(103, 13),
(103, 15),
(104, 10),
(104, 12),
(104, 14),
(105, 10),
(105, 11),
(105, 13),
(106, 11),
(106, 14),
(106, 15),
(107, 11),
(107, 14),
(108, 11),
(108, 12),
(108, 13),
(109, 10),
(109, 11),
(109, 14),
(110, 10),
(110, 11),
(110, 12),
(110, 14),
(111, 10),
(111, 12),
(111, 14),
(111, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Instagram`
--

CREATE TABLE `Instagram` (
  `Ins_ID` int(11) NOT NULL,
  `Ins_Link` varchar(1000) NOT NULL,
  `Influ_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Instagram`
--

INSERT INTO `Instagram` (`Ins_ID`, `Ins_Link`, `Influ_ID`) VALUES
(1, 'https://www.instagram.com/dinovux', 100),
(2, 'https://www.instagram.com/_phoebe_luz', 101),
(3, 'https://www.instagram.com/tranglinh2811', 102),
(4, 'https://www.instagram.com/giangaoma', 103),
(5, 'https://www.instagram.com/mhy_nhi', 104),
(6, 'https://www.instagram.com/beobeo', 105),
(7, 'https://www.instagram.com/chaubui_/', 106),
(8, 'https://www.instagram.com/truongphat227/', 108),
(9, 'https://www.instagram.com/_htngoc.yujy_/', 109),
(10, 'https://www.instagram.com/be_dao2001/', 110),
(11, 'https://www.instagram.com/its_lluciaaa/', 111),
(12, 'https://www.instagram.com/dinovux', 100),
(13, 'https://www.instagram.com/_phoebe_luz', 101),
(14, 'https://www.instagram.com/tranglinh2811', 102),
(15, 'https://www.instagram.com/mhy_nhi', 104),
(16, 'https://www.instagram.com/beobeo', 105),
(17, 'https://www.instagram.com/chaubui_/', 106),
(18, '', 107),
(19, 'https://www.instagram.com/truongphat227/', 108),
(20, 'https://www.instagram.com/_htngoc.yujy_/', 109),
(21, 'https://www.instagram.com/be_dao2001/', 110),
(22, 'https://www.instagram.com/its_lluciaaa/', 111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Invoice`
--

CREATE TABLE `Invoice` (
  `Inv_ID` int(11) NOT NULL,
  `Inv_TotalAmount` decimal(10,2) NOT NULL,
  `Inv_VATamount` decimal(10,2) NOT NULL,
  `Inv_Status` varchar(255) NOT NULL,
  `Booking_ID` int(11) NOT NULL,
  `MT_ID` int(11) DEFAULT NULL,
  `VNPay_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Invoice`
--

INSERT INTO `Invoice` (`Inv_ID`, `Inv_TotalAmount`, `Inv_VATamount`, `Inv_Status`, `Booking_ID`, `MT_ID`, `VNPay_ID`) VALUES
(100, '1500000.00', '1725000.00', 'Paid', 100, NULL, 50),
(101, '3218000.00', '3700700.00', 'Paid', 103, NULL, 52),
(102, '3218000.00', '3700700.00', 'Paid', 105, NULL, 51),
(103, '6436000.00', '7401400.00', 'Unpaid', 114, NULL, NULL),
(104, '8045000.00', '9251750.00', 'Unpaid', 115, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Mail`
--

CREATE TABLE `Mail` (
  `Mail_ID` int(11) NOT NULL,
  `Mail_Title` varchar(255) NOT NULL,
  `Mail_Content` varchar(1000) NOT NULL,
  `Cus_ID` int(11) NOT NULL,
  `Influ_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Momo_Transaction`
--

CREATE TABLE `Momo_Transaction` (
  `MT_ID` int(11) NOT NULL,
  `MT_PartnerCode` varchar(255) NOT NULL,
  `MT_OrderID` varchar(255) NOT NULL,
  `MT_RequestID` varchar(255) NOT NULL,
  `MT_Ammount` varchar(255) NOT NULL,
  `MT_OrderInfo` varchar(255) NOT NULL,
  `MT_OrderType` varchar(255) NOT NULL,
  `MT_TransID` varchar(255) NOT NULL,
  `MT_Signature` varchar(255) NOT NULL,
  `MT_PayDate` varchar(255) DEFAULT NULL,
  `Inv_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Post`
--

CREATE TABLE `Post` (
  `Post_ID` int(11) NOT NULL,
  `Post_CreateTime` timestamp NULL DEFAULT current_timestamp(),
  `Post_Title` varchar(255) NOT NULL,
  `Post_Content` varchar(1000) NOT NULL,
  `Post_Hastag` varchar(255) NOT NULL,
  `Post_Status` varchar(255) NOT NULL,
  `Post_Image` text DEFAULT NULL,
  `Post_Video` varchar(255) DEFAULT NULL,
  `Influ_ID` int(11) NOT NULL,
  `Com_ID` int(11) DEFAULT NULL,
  `Vio_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Post`
--

INSERT INTO `Post` (`Post_ID`, `Post_CreateTime`, `Post_Title`, `Post_Content`, `Post_Hastag`, `Post_Status`, `Post_Image`, `Post_Video`, `Influ_ID`, `Com_ID`, `Vio_ID`) VALUES
(100, '2024-11-13 21:31:06', 'Discover the joy of culinary travel', 'Hello everyone! I\'m Dino Vu, and one of my biggest passions is culinary travel. Every place I visit has its own unique flavors, from street food to fine dining. I believe that through each dish, we can understand more about the culture and people of that place. The feeling of trying a dish for the first time or discovering a unique recipe always makes me excited and gives me more interesting stories to tell everyone. I hope you will join me on my next culinary journeys!', '#DinoVu #KOC #Foodie', 'Active', 'Views/Influ_Image/food.jpg,Views/Influ_Image/food1.jpg,Views/Influ_Image/food2.jpg', NULL, 100, NULL, NULL),
(102, '2024-11-13 21:32:07', 'Memorable Experience in Sapa', 'Hello everyone! I just had a wonderful trip to Sapa, and I want to share with you about this memorable experience. Sapa really overwhelmed me with its majestic mountains, lush green valleys and especially its picturesque terraced fields. Here, I was able to immerse myself in the life of the local people, enjoy specialties such as thang co, sticky rice and feel the rusticity and gentleness of the people of the Northwest. If you are looking for a place to relax and recharge, Sapa is definitely a destination not to be missed!', '#VietnameseKOL #Travel', 'Active', 'Views/Influ_Image/travel1.jpg,Views/Influ_Image/travel2.jpg', NULL, 100, NULL, NULL),
(103, '2024-11-14 06:33:27', 'My View on Dating', 'Hello everyone! I\'m Truong Quoc Bao, and today I want to share a little bit about my personal views on dating. For me, dating is not only about romantic moments, but also about the process of getting to know and understand each other. I believe that sincerity and respect are always the most important foundations for any relationship. In addition, taking the time to listen, share and experience new things together will help the relationship become deeper. I hope you also find your own meaning in your love story!', '#TruongQuocBao #HenHo #TinhYeu', 'Active', 'Views/Influ_Image/love2.jpg,Views/Influ_Image/love.jpg', 'Views/Influ_Video/436561318_7694815903913125_2227720811541531921_n.mp4', 105, 150, NULL),
(104, '2024-11-14 06:36:17', 'Passion for mini aquariums', 'Hello everyone! I\'m Truong Quoc Bao, and one of my special hobbies is taking care of mini aquariums. For me, aquariums are not only a decoration but also a relaxing space, helping to reduce stress after working hours. I really like the feeling of watching small fish swimming and green aquatic plants, creating a vibrant miniature ecosystem. Taking care of aquariums also helps me practice patience and meticulousness. Hopefully through my sharing, you will find joy in the world of mini aquariums!', '#VietnameseKOL #Hobby #AquaLife', 'Active', 'Views/Influ_Image/fish.webp,Views/Influ_Image/fish1.jpeg', 'Views/Influ_Video/435416394_25147579671556333_8549465919080432288_n.mp4', 105, 151, NULL),
(105, '2024-11-14 06:39:56', 'A memorable day in the photo shoot', 'Hello everyone! I\'m Bao Ngoc, and today I want to share with everyone about an interesting photo shoot. From the time of preparing the costume, makeup to standing in front of the lens, I felt excited and full of energy. In particular, working with a professional and creative team helped me express myself more confidently. Each photo is a recorded moment, carrying its own emotions and stories. This is truly a memorable experience, helping me have more beautiful memories!', '#MCBaoNgoc #PhotoShoot', 'Active', 'Views/Influ_Image/koc33.jpg,Views/Influ_Image/koc333.jpg', 'Views/Influ_Video/A15ACA40-9A74-4432-95C9-9269619C8F6A.MOV', 109, 152, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Tiktok`
--

CREATE TABLE `Tiktok` (
  `TT_ID` int(11) NOT NULL,
  `TT_Link` varchar(1000) NOT NULL,
  `Influ_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Tiktok`
--

INSERT INTO `Tiktok` (`TT_ID`, `TT_Link`, `Influ_ID`) VALUES
(1, 'https://www.tiktok.com/giang113', 103),
(2, 'https://www.tiktok.com/@chaubui', 106),
(3, 'https://www.tiktok.com/@halinhofficial', 107),
(4, 'https://www.tiktok.com/@bonbear22', 108),
(5, 'https://www.tiktok.com/@hngocjk_09', 109),
(6, 'https://www.tiktok.com/@bedao_07', 110),
(7, 'https://www.tiktok.com/@quynhchuc.1762', 111),
(8, '', 100),
(9, '', 101),
(10, '', 102),
(11, '', 104),
(12, '', 105),
(13, 'https://www.tiktok.com/@chaubui', 106),
(14, 'https://www.tiktok.com/@halinhofficial', 107),
(15, 'https://www.tiktok.com/@bonbear22', 108),
(16, 'https://www.tiktok.com/@hngocjk_09', 109),
(17, 'https://www.tiktok.com/@bedao_07', 110),
(18, 'https://www.tiktok.com/@quynhchuc.1762', 111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Topic`
--

CREATE TABLE `Topic` (
  `Topic_ID` int(11) NOT NULL,
  `Topic_Name` varchar(255) NOT NULL,
  `Topic_Image` varchar(255) NOT NULL,
  `Topic_Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Topic`
--

INSERT INTO `Topic` (`Topic_ID`, `Topic_Name`, `Topic_Image`, `Topic_Description`) VALUES
(10, 'Cusine', 'Views/Img/cuisine.jpeg', 'Cuisine refers to a style or method of cooking, particularly associated with a specific region, country, or culture. It encompasses the ingredients, techniques, and traditions used in preparing food, influencing the flavors, presentation, and dining experiences unique to different culinary cultures. Examples include French, Italian, Chinese, or Mexican cuisine.'),
(11, 'Fashion', 'Views/Img/fashion.jpg', 'Fashion good'),
(12, 'Travel', 'Views/Img/u45.svg', 'Travellll'),
(13, 'Technology', 'Views/Img/u42.svg', 'Technologoy is ok'),
(14, 'Beauty', 'Views/Img/beauty.jpeg', 'beautyyyy'),
(15, 'Music', 'Views/Img/music.jpeg', 'Hellloooo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Topic_Content`
--

CREATE TABLE `Topic_Content` (
  `Topic_ID` int(11) NOT NULL,
  `Content_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Topic_Content`
--

INSERT INTO `Topic_Content` (`Topic_ID`, `Content_ID`) VALUES
(10, 20),
(10, 24),
(11, 20),
(11, 22),
(12, 25),
(12, 27),
(13, 22),
(13, 23),
(13, 24),
(14, 24),
(14, 25),
(15, 26),
(15, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Topic_Event`
--

CREATE TABLE `Topic_Event` (
  `Topic_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Topic_Event`
--

INSERT INTO `Topic_Event` (`Topic_ID`, `Event_ID`) VALUES
(10, 20),
(10, 24),
(11, 20),
(11, 22),
(11, 28),
(12, 24),
(12, 26),
(13, 20),
(13, 22),
(13, 25),
(14, 20),
(14, 28),
(15, 26),
(15, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Violation`
--

CREATE TABLE `Violation` (
  `Vio_ID` int(11) NOT NULL,
  `Vio_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Violation`
--

INSERT INTO `Violation` (`Vio_ID`, `Vio_Name`) VALUES
(7, 'Ethical'),
(8, 'Legal'),
(9, 'Social');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Violation_word`
--

CREATE TABLE `Violation_word` (
  `VW_ID` int(11) NOT NULL,
  `Vio_ID` int(11) NOT NULL,
  `VW_Word` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Violation_word`
--

INSERT INTO `Violation_word` (`VW_ID`, `Vio_ID`, `VW_Word`) VALUES
(7, 7, 'Dishonesty'),
(8, 7, 'Exploitation'),
(9, 7, 'Plagiarism'),
(10, 7, 'Bribery'),
(11, 7, 'Manipulation'),
(12, 7, 'Misinformation'),
(13, 7, 'Corruption'),
(14, 7, 'Deception'),
(15, 7, 'Fraud'),
(16, 7, 'Cheating'),
(17, 7, 'Lying'),
(18, 7, 'Blackmail'),
(19, 7, 'Coercion'),
(20, 8, 'Bullying'),
(21, 8, 'Terrorism'),
(22, 8, 'Discrimination'),
(23, 8, 'Harassment'),
(24, 8, 'Extremism'),
(25, 8, 'Violence'),
(26, 8, 'Intimidation'),
(27, 8, 'Racism'),
(28, 8, 'Sexism'),
(29, 8, 'Homophobia'),
(30, 8, 'Transphobia'),
(31, 8, 'Xenophobia'),
(32, 8, 'Slurs'),
(33, 8, 'Porn'),
(34, 8, 'Sex'),
(35, 8, 'Sexual'),
(36, 8, 'Abortion'),
(37, 8, 'Molestation'),
(38, 8, 'Incest'),
(39, 8, 'Fuck'),
(40, 8, 'Fucking'),
(41, 8, 'Bitch'),
(42, 8, 'Asshole'),
(43, 8, 'Bastard'),
(44, 8, 'Pussy'),
(45, 8, 'Cock'),
(46, 8, 'Rape'),
(47, 8, 'Pornhub'),
(48, 8, 'Masturbation'),
(49, 8, 'Orgasm'),
(50, 8, 'Fetish'),
(51, 9, 'Piracy'),
(52, 9, 'Fraud'),
(53, 9, 'Defamation'),
(54, 9, 'Infringement'),
(55, 9, 'Drugs'),
(56, 9, 'Abuse'),
(57, 9, 'Exploitation'),
(58, 9, 'Counterfeit'),
(59, 9, 'Theft'),
(60, 9, 'Fraudulent'),
(61, 9, 'Bribery'),
(62, 9, 'Smuggling'),
(63, 9, 'Hacking'),
(64, 9, 'Extortion');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `VNPay_Transaction`
--

CREATE TABLE `VNPay_Transaction` (
  `VNPay_ID` int(11) NOT NULL,
  `VNP_Amount` varchar(255) NOT NULL,
  `VNP_BankCode` varchar(255) NOT NULL,
  `VNP_BankTranNo` varchar(255) NOT NULL,
  `VNP_CardType` varchar(255) NOT NULL,
  `VNP_OrderInfo` varchar(255) NOT NULL,
  `VNP_PayDate` varchar(255) DEFAULT NULL,
  `VNP_Respond_code` varchar(255) NOT NULL,
  `VNP_TMNCode` varchar(255) NOT NULL,
  `VNP_TransactionNo` varchar(255) NOT NULL,
  `VNP_TransactionStatus` varchar(255) NOT NULL,
  `VNP_TxnRef` varchar(255) NOT NULL,
  `VNP_SecureHash` varchar(255) NOT NULL,
  `Inv_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `VNPay_Transaction`
--

INSERT INTO `VNPay_Transaction` (`VNPay_ID`, `VNP_Amount`, `VNP_BankCode`, `VNP_BankTranNo`, `VNP_CardType`, `VNP_OrderInfo`, `VNP_PayDate`, `VNP_Respond_code`, `VNP_TMNCode`, `VNP_TransactionNo`, `VNP_TransactionStatus`, `VNP_TxnRef`, `VNP_SecureHash`, `Inv_ID`) VALUES
(50, '172500000', 'NCB', 'VNP14672736', 'ATM', 'Thanh+toan+Booking', '20241114172223', '00', '660JIX0L', '14672736', '00', '1525', '170d003c19d394fb6a077cc759108487acbb4ca95cd99f3bb6ae7f6ea5f6411507e6c6838c1e52b1265b637566aff49b8d4a7ef706b5b01e588d6164c9948bf2', 100),
(51, '370070000', 'NCB', 'VNP14673644', 'ATM', 'Thanh+toan+Booking', '20241115041327', '00', '660JIX0L', '14673644', '00', '6079', 'b05087d128228a9636f5c0facb2c44e3c1d6394ce2b363d17a37fe394f525eed110c825d111702d9586bd9940abd38658cb7b564c453cb230869418ed7251cb0', 102),
(52, '370070000', 'NCB', 'VNP14673651', 'ATM', 'Thanh+toan+Booking', '20241115042915', '00', '660JIX0L', '14673651', '00', '4999', '5860dfb999811994bf818bfd85e6b9f2c2b4d21ac0144bc32a5ba101b803442e87a9b2eb68c29fa6c5632b207a30d479bfd61af3713252553808425e25c7b7c1', 101);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Workplace`
--

CREATE TABLE `Workplace` (
  `WPlace_ID` int(11) NOT NULL,
  `WPlace_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Workplace`
--

INSERT INTO `Workplace` (`WPlace_ID`, `WPlace_Name`) VALUES
(20, 'Ha Noi'),
(21, 'Da Nang'),
(22, 'TP HCM');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Ad_ID`);

--
-- Chỉ mục cho bảng `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `booking_ibfk_1` (`Cus_ID`),
  ADD KEY `booking_ibfk_2` (`Influ_ID`),
  ADD KEY `booking_ibfk_3` (`Topic_ID`),
  ADD KEY `booking_ibfk_4` (`Feed_ID`),
  ADD KEY `booking_ibfk_5` (`Inv_ID`);

--
-- Chỉ mục cho bảng `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Com_ID`),
  ADD KEY `comment_ibfk_1` (`Post_ID`),
  ADD KEY `comment_ibfk_2` (`Ad_ID`);

--
-- Chỉ mục cho bảng `Content`
--
ALTER TABLE `Content`
  ADD PRIMARY KEY (`Content_ID`);

--
-- Chỉ mục cho bảng `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Cus_ID`);

--
-- Chỉ mục cho bảng `Cus_Content`
--
ALTER TABLE `Cus_Content`
  ADD PRIMARY KEY (`Cus_ID`,`Content_ID`),
  ADD KEY `CusContent_ibfk_1` (`Content_ID`),
  ADD KEY `CusContent_ibfk_2` (`Cus_ID`);

--
-- Chỉ mục cho bảng `Cus_Event`
--
ALTER TABLE `Cus_Event`
  ADD PRIMARY KEY (`Cus_ID`,`Event_ID`),
  ADD KEY `CusEvent_ibfk_1` (`Event_ID`),
  ADD KEY `CusEvent_ibfk_2` (`Cus_ID`);

--
-- Chỉ mục cho bảng `Cus_Topic`
--
ALTER TABLE `Cus_Topic`
  ADD PRIMARY KEY (`Cus_ID`,`Topic_ID`),
  ADD KEY `CusTopic_ibfk_1` (`Topic_ID`),
  ADD KEY `CusTopic_ibfk_2` (`Cus_ID`);

--
-- Chỉ mục cho bảng `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Chỉ mục cho bảng `Facebook`
--
ALTER TABLE `Facebook`
  ADD PRIMARY KEY (`FB_ID`),
  ADD KEY `fb_ibfk_1` (`Influ_ID`);

--
-- Chỉ mục cho bảng `Feedbacks`
--
ALTER TABLE `Feedbacks`
  ADD PRIMARY KEY (`Feed_ID`),
  ADD KEY `feedbacks_ibfk_1` (`Booking_ID`);

--
-- Chỉ mục cho bảng `Followers`
--
ALTER TABLE `Followers`
  ADD PRIMARY KEY (`Fol_ID`);

--
-- Chỉ mục cho bảng `Gender`
--
ALTER TABLE `Gender`
  ADD PRIMARY KEY (`Gender_ID`);

--
-- Chỉ mục cho bảng `Influencer`
--
ALTER TABLE `Influencer`
  ADD PRIMARY KEY (`Influ_ID`),
  ADD KEY `influ_ibfk_1` (`InfluType_ID`),
  ADD KEY `influ_ibfk_2` (`WPlace_ID`),
  ADD KEY `influ_ibfk_3` (`Fol_ID`),
  ADD KEY `influ_ibfk_4` (`Gender_ID`);

--
-- Chỉ mục cho bảng `Influencer_Type`
--
ALTER TABLE `Influencer_Type`
  ADD PRIMARY KEY (`InfluType_ID`);

--
-- Chỉ mục cho bảng `Influ_Topic`
--
ALTER TABLE `Influ_Topic`
  ADD PRIMARY KEY (`Influ_ID`,`Topic_ID`),
  ADD KEY `InfluTopic_ibfk_1` (`Topic_ID`),
  ADD KEY `InfluTopic_ibfk_2` (`Influ_ID`);

--
-- Chỉ mục cho bảng `Instagram`
--
ALTER TABLE `Instagram`
  ADD PRIMARY KEY (`Ins_ID`),
  ADD KEY `ins_ibfk_1` (`Influ_ID`);

--
-- Chỉ mục cho bảng `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`Inv_ID`),
  ADD KEY `invoice_ibfk_1` (`Booking_ID`),
  ADD KEY `fk_vnpay_transaction` (`VNPay_ID`),
  ADD KEY `fk_momo_transaction` (`MT_ID`);

--
-- Chỉ mục cho bảng `Mail`
--
ALTER TABLE `Mail`
  ADD PRIMARY KEY (`Mail_ID`),
  ADD KEY `mail_ibfk_1` (`Cus_ID`),
  ADD KEY `mail_ibfk_2` (`Influ_ID`);

--
-- Chỉ mục cho bảng `Momo_Transaction`
--
ALTER TABLE `Momo_Transaction`
  ADD PRIMARY KEY (`MT_ID`),
  ADD KEY `fk_invoice` (`Inv_ID`);

--
-- Chỉ mục cho bảng `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `post_ibfk_1` (`Influ_ID`),
  ADD KEY `post_ibfk_2` (`Com_ID`),
  ADD KEY `post_ibfk_3` (`Vio_ID`);

--
-- Chỉ mục cho bảng `Tiktok`
--
ALTER TABLE `Tiktok`
  ADD PRIMARY KEY (`TT_ID`),
  ADD KEY `tt_ibfk_1` (`Influ_ID`);

--
-- Chỉ mục cho bảng `Topic`
--
ALTER TABLE `Topic`
  ADD PRIMARY KEY (`Topic_ID`);

--
-- Chỉ mục cho bảng `Topic_Content`
--
ALTER TABLE `Topic_Content`
  ADD PRIMARY KEY (`Topic_ID`,`Content_ID`),
  ADD KEY `TopicContent_ibfk_1` (`Topic_ID`),
  ADD KEY `TopicContent_ibfk_2` (`Content_ID`);

--
-- Chỉ mục cho bảng `Topic_Event`
--
ALTER TABLE `Topic_Event`
  ADD PRIMARY KEY (`Topic_ID`,`Event_ID`),
  ADD KEY `TopicEvent_ibfk_1` (`Topic_ID`),
  ADD KEY `TopicEvent_ibfk_2` (`Event_ID`);

--
-- Chỉ mục cho bảng `Violation`
--
ALTER TABLE `Violation`
  ADD PRIMARY KEY (`Vio_ID`);

--
-- Chỉ mục cho bảng `Violation_word`
--
ALTER TABLE `Violation_word`
  ADD PRIMARY KEY (`VW_ID`),
  ADD KEY `vw_ibfk_1` (`Vio_ID`);

--
-- Chỉ mục cho bảng `VNPay_Transaction`
--
ALTER TABLE `VNPay_Transaction`
  ADD PRIMARY KEY (`VNPay_ID`),
  ADD KEY `fk_invoice_ibfk` (`Inv_ID`);

--
-- Chỉ mục cho bảng `Workplace`
--
ALTER TABLE `Workplace`
  ADD PRIMARY KEY (`WPlace_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Admin`
--
ALTER TABLE `Admin`
  MODIFY `Ad_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `Booking`
--
ALTER TABLE `Booking`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `Comment`
--
ALTER TABLE `Comment`
  MODIFY `Com_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `Content`
--
ALTER TABLE `Content`
  MODIFY `Content_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `Customer`
--
ALTER TABLE `Customer`
  MODIFY `Cus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `Event`
--
ALTER TABLE `Event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `Facebook`
--
ALTER TABLE `Facebook`
  MODIFY `FB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `Feedbacks`
--
ALTER TABLE `Feedbacks`
  MODIFY `Feed_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `Followers`
--
ALTER TABLE `Followers`
  MODIFY `Fol_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `Gender`
--
ALTER TABLE `Gender`
  MODIFY `Gender_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Influencer`
--
ALTER TABLE `Influencer`
  MODIFY `Influ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `Influencer_Type`
--
ALTER TABLE `Influencer_Type`
  MODIFY `InfluType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `Instagram`
--
ALTER TABLE `Instagram`
  MODIFY `Ins_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `Invoice`
--
ALTER TABLE `Invoice`
  MODIFY `Inv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `Mail`
--
ALTER TABLE `Mail`
  MODIFY `Mail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `Momo_Transaction`
--
ALTER TABLE `Momo_Transaction`
  MODIFY `MT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `Post`
--
ALTER TABLE `Post`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `Tiktok`
--
ALTER TABLE `Tiktok`
  MODIFY `TT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `Topic`
--
ALTER TABLE `Topic`
  MODIFY `Topic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `Violation`
--
ALTER TABLE `Violation`
  MODIFY `Vio_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `Violation_word`
--
ALTER TABLE `Violation_word`
  MODIFY `VW_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `VNPay_Transaction`
--
ALTER TABLE `VNPay_Transaction`
  MODIFY `VNPay_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `Workplace`
--
ALTER TABLE `Workplace`
  MODIFY `WPlace_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Cus_ID`) REFERENCES `Customer` (`Cus_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`Topic_ID`) REFERENCES `Topic` (`Topic_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`Feed_ID`) REFERENCES `Feedbacks` (`Feed_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`Inv_ID`) REFERENCES `Invoice` (`Inv_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `Post` (`Post_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Ad_ID`) REFERENCES `Admin` (`Ad_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Cus_Content`
--
ALTER TABLE `Cus_Content`
  ADD CONSTRAINT `CusContent_ibfk_1` FOREIGN KEY (`Content_ID`) REFERENCES `Content` (`Content_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `CusContent_ibfk_2` FOREIGN KEY (`Cus_ID`) REFERENCES `Customer` (`Cus_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Cus_Event`
--
ALTER TABLE `Cus_Event`
  ADD CONSTRAINT `CusEvent_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `Event` (`Event_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `CusEvent_ibfk_2` FOREIGN KEY (`Cus_ID`) REFERENCES `Customer` (`Cus_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Cus_Topic`
--
ALTER TABLE `Cus_Topic`
  ADD CONSTRAINT `CusTopic_ibfk_1` FOREIGN KEY (`Topic_ID`) REFERENCES `Topic` (`Topic_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `CusTopic_ibfk_2` FOREIGN KEY (`Cus_ID`) REFERENCES `Customer` (`Cus_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Facebook`
--
ALTER TABLE `Facebook`
  ADD CONSTRAINT `fb_ibfk_1` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Feedbacks`
--
ALTER TABLE `Feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`Booking_ID`) REFERENCES `Booking` (`Booking_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Influencer`
--
ALTER TABLE `Influencer`
  ADD CONSTRAINT `influ_ibfk_1` FOREIGN KEY (`InfluType_ID`) REFERENCES `Influencer_Type` (`InfluType_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `influ_ibfk_2` FOREIGN KEY (`WPlace_ID`) REFERENCES `Workplace` (`WPlace_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `influ_ibfk_3` FOREIGN KEY (`Fol_ID`) REFERENCES `Followers` (`Fol_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `influ_ibfk_4` FOREIGN KEY (`Gender_ID`) REFERENCES `Gender` (`Gender_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Influ_Topic`
--
ALTER TABLE `Influ_Topic`
  ADD CONSTRAINT `InfluTopic_ibfk_1` FOREIGN KEY (`Topic_ID`) REFERENCES `Topic` (`Topic_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `InfluTopic_ibfk_2` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Instagram`
--
ALTER TABLE `Instagram`
  ADD CONSTRAINT `ins_ibfk_1` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Invoice`
--
ALTER TABLE `Invoice`
  ADD CONSTRAINT `fk_momo_transaction` FOREIGN KEY (`MT_ID`) REFERENCES `Momo_Transaction` (`MT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vnpay_transaction` FOREIGN KEY (`VNPay_ID`) REFERENCES `VNPay_Transaction` (`VNPay_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Booking_ID`) REFERENCES `Booking` (`Booking_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Mail`
--
ALTER TABLE `Mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`Cus_ID`) REFERENCES `Customer` (`Cus_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Momo_Transaction`
--
ALTER TABLE `Momo_Transaction`
  ADD CONSTRAINT `fk_invoice` FOREIGN KEY (`Inv_ID`) REFERENCES `Invoice` (`Inv_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`Com_ID`) REFERENCES `Comment` (`Com_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`Vio_ID`) REFERENCES `Violation` (`Vio_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Tiktok`
--
ALTER TABLE `Tiktok`
  ADD CONSTRAINT `tt_ibfk_1` FOREIGN KEY (`Influ_ID`) REFERENCES `Influencer` (`Influ_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Topic_Content`
--
ALTER TABLE `Topic_Content`
  ADD CONSTRAINT `TopicContent_ibfk_1` FOREIGN KEY (`Topic_ID`) REFERENCES `Topic` (`Topic_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `TopicContent_ibfk_2` FOREIGN KEY (`Content_ID`) REFERENCES `Content` (`Content_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Topic_Event`
--
ALTER TABLE `Topic_Event`
  ADD CONSTRAINT `TopicEvent_ibfk_1` FOREIGN KEY (`Topic_ID`) REFERENCES `Topic` (`Topic_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `TopicEvent_ibfk_2` FOREIGN KEY (`Event_ID`) REFERENCES `Event` (`Event_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `Violation_word`
--
ALTER TABLE `Violation_word`
  ADD CONSTRAINT `vw_ibfk_1` FOREIGN KEY (`Vio_ID`) REFERENCES `Violation` (`Vio_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `VNPay_Transaction`
--
ALTER TABLE `VNPay_Transaction`
  ADD CONSTRAINT `fk_invoice_ibfk` FOREIGN KEY (`Inv_ID`) REFERENCES `Invoice` (`Inv_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
