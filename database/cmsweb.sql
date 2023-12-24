-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2023 lúc 05:10 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cmsweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `groupcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`, `groupcategory_id`) VALUES
(1, 'Thời sự', '', 1),
(2, 'Thế giới', '', 1),
(3, 'Kinh doanh', '', 1),
(4, 'Khoa học', '', 1),
(5, 'Giải trí', '', 1),
(6, 'Thể thao', '', 2),
(7, 'Giáo dục', '', 2),
(8, 'Pháp luật', '', 2),
(9, 'Đời sống', '', 2),
(10, 'Sức khỏe', '', 2),
(11, 'Du lịch', '', 3),
(12, 'Số hóa', '', 3),
(13, 'Xe', '', 3),
(14, 'Ý kiến', '', 3),
(15, 'Tâm sự', '', 3),
(16, 'Cười', '', 4),
(17, 'Tin mới nhất', '', 4),
(18, 'Tin nổi bật', '', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(1, 1, 4, 'Great article!', '2022-01-01 12:30:00'),
(2, 1, 5, 'Great article!', '2022-01-01 12:30:00'),
(3, 1, 6, 'Great article!', '2022-01-01 12:30:00'),
(4, 1, 7, 'Great article!', '2022-01-01 12:30:00'),
(5, 1, 8, 'Great article!', '2022-01-01 12:30:00'),
(6, 1, 9, 'Great article!', '2022-01-01 12:30:00'),
(7, 1, 10, 'Great article!', '2022-01-01 12:30:00'),
(8, 1, 11, 'Great article!', '2022-01-01 12:30:00'),
(9, 1, 12, 'Great article!', '2022-01-01 12:30:00'),
(10, 1, 13, 'Great article!', '2022-01-01 12:30:00'),
(11, 1, 14, 'Great article!', '2022-01-01 12:30:00'),
(12, 1, 15, 'Great article!', '2022-01-01 12:30:00'),
(13, 1, 3, 'Great article!', '2022-01-01 12:30:00'),
(14, 1, 2, 'Great article!', '2022-01-01 12:30:00'),
(15, 1, 1, 'Great article!', '2022-01-01 12:30:00'),
(16, 1, 1, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2023-11-19 22:19:05'),
(17, 1, 1, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2023-11-19 22:19:10'),
(18, 1, 1, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq1', '2023-11-19 22:19:31'),
(19, 1, 1, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq1222', '2023-11-19 22:22:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `dnsweb` varchar(600) NOT NULL,
  `tittle` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`dnsweb`, `tittle`, `description`, `content`) VALUES
('baochinhphu.vn', '//h1[@class=\"detail-title\"]', '//h2[@class=\"detail-sapo\"]', '//div[@class=\"detail-content\"]//p'),
('baotintuc.vn', '//h1[@class=\"detail-title\"]', '//h2[@class=\"sapo\"]', '//div[@class=\"detail-content\"]//p'),
('dantri.com.vn', '//h1[@class=\"title-page detail\"]', '//h2[@class=\"singular-sapo\"]', '//div[@class=\"singular-content\"]//p'),
('qdnd.vn', '//h1[@class=\"post-title\"]', '//div[@class=\"post-summary\"]', '//div[@class=\"post-content\"]//p'),
('thanhnien.vn', '//h1[@class=\"detail-title\"]', '//h2[@class=\"detail-sapo\"]', '//div[@class=\"detail-content afcbc-body\"]/p'),
('tienphong.vn', '//h1[@class=\"article__title cms-title\"]', '//div[@class=\"article__sapo cms-desc\"]', '//div[@class=\"article__body cms-body\"]/p'),
('tuoitre.vn', '//h1[@class=\"detail-title article-title\"]', '//div[@class=\"detail-sapo\"]', '//div[@class=\"detail-content afcbc-body\"]/p'),
('vnexpress.net', '//h1[@class=\"title-detail\"]', '//p[@class=\"description\"]', '//p[@class=\"Normal\"]'),
('vov.vn', '//div[@class=\"row article-title\"]//span', '//div[@class=\"row article-summary\"]//div', '//div[@class=\"text-long\"]//p'),
('xaydungchinhsach.chinhphu.vn', '//h1[@class=\"detail-title\"]', '//h2[@class=\"detail-sapo\"]', '//div[@class=\"detail-content afcbc-body\"]//p');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`user_id`, `post_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(16, 1),
(16, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `following`
--

CREATE TABLE `following` (
  `user_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupcategories`
--

CREATE TABLE `groupcategories` (
  `groupcategory_id` int(11) NOT NULL,
  `groupcategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groupcategories`
--

INSERT INTO `groupcategories` (`groupcategory_id`, `groupcategory_name`) VALUES
(1, 'Thời sự'),
(2, 'Góc nhìn'),
(3, 'Thế giới'),
(4, 'Video'),
(5, 'Podcast');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time_view` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`user_id`, `post_id`, `time_view`) VALUES
(1, 1, '2023-11-26 14:56:43'),
(1, 1, '2023-11-26 14:57:13'),
(1, 1, '2023-11-26 14:59:43'),
(1, 1, '2023-11-26 15:10:14'),
(1, 1, '2023-11-26 15:19:08'),
(1, 1, '2023-11-26 15:19:23'),
(1, 1, '2023-11-26 15:19:52'),
(1, 1, '2023-11-26 15:20:35'),
(1, 1, '2023-11-26 15:21:57'),
(1, 1, '2023-11-26 15:22:04'),
(1, 1, '2023-11-26 15:22:12'),
(1, 1, '2023-11-26 18:40:59'),
(1, 1, '2023-11-26 18:41:00'),
(1, 1, '2023-11-26 18:42:08'),
(1, 1, '2023-11-26 18:42:51'),
(1, 2, '2023-11-26 18:43:15'),
(1, 1, '2023-11-26 18:46:21'),
(1, 1, '2023-11-26 19:09:02'),
(1, 1, '2023-11-26 19:10:27'),
(1, 1, '2023-11-26 19:23:57'),
(1, 1, '2023-11-26 19:24:00'),
(1, 1, '2023-11-26 19:32:40'),
(1, 1, '2023-11-26 19:38:18'),
(1, 1, '2023-11-26 19:43:30'),
(1, 1, '2023-11-26 19:43:52'),
(1, 1, '2023-11-26 19:44:10'),
(1, 1, '2023-11-26 20:37:40'),
(1, 1, '2023-11-26 20:38:14'),
(1, 1, '2023-11-26 20:41:30'),
(1, 1, '2023-11-26 20:41:53'),
(1, 1, '2023-11-26 20:42:10'),
(1, 1, '2023-11-26 20:42:55'),
(1, 1, '2023-11-26 21:26:44'),
(1, 1, '2023-11-26 21:49:18'),
(1, 1, '2023-11-26 22:15:34'),
(1, 1, '2023-11-26 22:30:10'),
(1, 3, '2023-11-26 22:30:15'),
(1, 1, '2023-11-26 22:30:21'),
(1, 4, '2023-11-26 22:31:15'),
(16, 1, '2023-11-27 08:39:11'),
(16, 1, '2023-11-27 09:06:19'),
(1, 1, '2023-11-27 10:06:35'),
(1, 1, '2023-12-21 13:04:12'),
(1, 1, '2023-12-21 13:04:14'),
(16, 17, '2023-12-21 14:39:50'),
(16, 1, '2023-12-21 14:40:03'),
(1, 4, '2023-12-21 14:50:46'),
(1, 4, '2023-12-21 14:52:26'),
(1, 4, '2023-12-21 14:53:13'),
(1, 4, '2023-12-21 14:54:08'),
(1, 4, '2023-12-21 14:54:55'),
(1, 4, '2023-12-21 14:55:34'),
(1, 2, '2023-12-21 14:58:25'),
(1, 1, '2023-12-21 15:06:39'),
(1, 18, '2023-12-21 15:06:43'),
(1, 1, '2023-12-21 15:59:28'),
(1, 4, '2023-12-21 16:19:28'),
(1, 1, '2023-12-21 16:19:42'),
(1, 1, '2023-12-21 16:20:12'),
(1, 1, '2023-12-21 16:23:21'),
(1, 1, '2023-12-21 16:40:59'),
(1, 5, '2023-12-21 16:41:10'),
(1, 1, '2023-12-21 16:41:24'),
(2, 1, '2023-12-21 19:53:45'),
(2, 1, '2023-12-21 20:25:03'),
(2, 22, '2023-12-21 20:25:12'),
(2, 1, '2023-12-21 20:26:05'),
(2, 22, '2023-12-21 20:26:07'),
(1, 1, '2023-12-21 20:31:56'),
(1, 0, '2023-12-21 20:35:31'),
(1, 1, '2023-12-24 21:48:31'),
(1, 1, '2023-12-24 21:51:37'),
(16, 1, '2023-12-24 22:13:35'),
(16, 18, '2023-12-24 22:13:43'),
(16, 1, '2023-12-24 22:13:52'),
(1, 1, '2023-12-24 22:40:06'),
(1, 1, '2023-12-24 22:47:26'),
(1, 1, '2023-12-24 22:48:27'),
(1, 1, '2023-12-24 22:48:30'),
(1, 1, '2023-12-24 22:48:58'),
(1, 1, '2023-12-24 22:49:32'),
(1, 1, '2023-12-24 22:49:33'),
(1, 1, '2023-12-24 22:49:41'),
(1, 1, '2023-12-24 22:49:42'),
(1, 1, '2023-12-24 22:50:02'),
(1, 1, '2023-12-24 22:50:04'),
(1, 1, '2023-12-24 22:50:16'),
(1, 1, '2023-12-24 22:50:19'),
(1, 1, '2023-12-24 22:51:25'),
(1, 1, '2023-12-24 22:51:27'),
(1, 1, '2023-12-24 22:52:01'),
(1, 1, '2023-12-24 22:53:01'),
(1, 1, '2023-12-24 22:53:03'),
(1, 1, '2023-12-24 22:53:15'),
(1, 1, '2023-12-24 22:53:27'),
(1, 1, '2023-12-24 22:54:44'),
(1, 1, '2023-12-24 22:54:58'),
(1, 1, '2023-12-24 22:56:24'),
(1, 1, '2023-12-24 22:56:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `user_id`, `category_id`, `created_at`, `image`) VALUES
(1, 'Lâm Đồng cân nhắc xây công trình lớn khu vực Dinh tỉnh trưởng ở Đà Lạt', '<p>Ch&iacute;nh quyền L&acirc;m Đồng c&acirc;n nhắc đề xuất dự &aacute;n quy m&ocirc; lớn ở khu vực Dinh tỉnh trưởng 113 năm tuổi, thay v&agrave;o đ&oacute; n&ecirc;n xen c&ocirc;ng tr&igrave;nh vừa phải khi lập quy hoạch.</p>\r\n<article>\r\n<p>Nội dung n&ecirc;u trong th&ocirc;ng b&aacute;o kết luận của Chủ tịch UBND tỉnh L&acirc;m Đồng Trần Văn Hiệp sau buổi l&agrave;m việc mới đ&acirc;y với sở ng&agrave;nh, chuy&ecirc;n gia về điều chỉnh cục bộ quy hoạch chi tiết đ&ocirc; thị 1/500 khu trung t&acirc;m H&ograve;a B&igrave;nh, TP Đ&agrave; Lạt, nơi c&oacute; Dinh tỉnh trưởnĐộng th&aacute;i của người đứng đầu ch&iacute;nh quyền L&acirc;m Đồng đưa ra sau hơn 4 năm đồ &aacute;n quy hoạch khu trung t&acirc;m Đ&agrave; Lạt được c&ocirc;ng bố, trong đ&oacute; t&ograve;a Dinh tỉnh trưởng sẽ bị&nbsp;<a href=\"https://vnexpress.net/rap-hat-hoa-binh-va-dinh-tinh-truong-da-lat-se-bi-dap-bo-di-doi-3895565.html\" rel=\"dofollow\" data-itm-added=\"1\" data-itm-source=\"#vn_source=Detail-ThoiSu-4678688&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-DiDoi&amp;vn_term=Desktop&amp;vn_thumb=0\">di dời&nbsp;</a>để x&acirc;y khu thương mại, dịch vụ cao cấp. Quy hoạch sau đ&oacute; gặp nhiều &yacute; kiến tr&aacute;i chiều n&ecirc;n th&aacute;ng 8/2020, tỉnh đ&atilde;&nbsp;<a href=\"https://vnexpress.net/da-lat-lay-y-kien-ve-quy-hoach-dinh-tinh-truong-4146702.html\" rel=\"dofollow\" data-itm-added=\"1\" data-itm-source=\"#vn_source=Detail-ThoiSu-4678688&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-LayYKien&amp;vn_term=Desktop&amp;vn_thumb=0\">lấy &yacute; kiến&nbsp;</a>người d&acirc;n v&agrave; chuy&ecirc;n gia về phương &aacute;n kiến tr&uacute;c tối ưu cho khu vực Dinh tỉnh trưởng.</p>\r\n<figure data-size=\"true\">\r\n<figcaption></figcaption>\r\n</figure>\r\n<p>Tại kết luận n&oacute;i tr&ecirc;n, l&atilde;nh đạo UBND tỉnh chưa th&ocirc;ng qua đồ &aacute;n lần n&agrave;y v&agrave; y&ecirc;u cầu r&agrave; so&aacute;t, nghi&ecirc;n cứu, phản biện th&ecirc;m. Ch&iacute;nh quyền tỉnh n&ecirc;u quan điểm phương &aacute;n điều chỉnh quy hoạch khu vực n&agrave;y cần đề xuất cụ thể giải ph&aacute;p căn cơ giải quyết c&aacute;c vướng mắc, vấn đề x&atilde; hội ph&aacute;t sinh trong thời gian qua.</p>\r\n<p>Đối với Dinh tỉnh trưởng, UBND tỉnh L&acirc;m Đồng giao Sở X&acirc;y dựng (cơ quan đầu mối) trong qu&aacute; tr&igrave;nh điều chỉnh quy hoạch cần c&acirc;n nhắc đề xuất khối c&ocirc;ng tr&igrave;nh lớn, thay v&agrave;o đ&oacute; n&ecirc;n xen cấy c&aacute;c c&ocirc;ng tr&igrave;nh quy m&ocirc; vừa phải đảm bảo h&agrave;i h&ograve;a kh&ocirc;ng chỉ cục bộ m&agrave; cả tổng thể khu trung t&acirc;m H&ograve;a B&igrave;nh; gắn với ph&aacute;t huy văn h&oacute;a, kinh tế của khu vực...</p>\r\n<p>Trả lời&nbsp;<em>VnExpress</em>, &ocirc;ng Ng&ocirc; Văn Ninh, người ph&aacute;t ng&ocirc;n UBND tỉnh L&acirc;m Đồng, cho biết c&aacute;c cơ chức năng được y&ecirc;u cầu r&agrave; so&aacute;t lại quy hoạch, chứ chưa quyết định dừng di dời Dinh tỉnh trưởng.</p>\r\n<figure data-size=\"true\">\r\n<div>&nbsp;</div>\r\n<figcaption>\r\n<p>Dinh tỉnh trưởng nằm tr&ecirc;n ngọn đồi cao ở trung t&acirc;m TP Đ&agrave; Lạt. Ảnh:&nbsp;<em>Kh&aacute;nh Hương</em></p>\r\n</figcaption>\r\n</figure>\r\n<p>Dinh tỉnh trưởng nằm tr&ecirc;n đồi th&ocirc;ng rộng 4,43 ha, do người Ph&aacute;p x&acirc;y dựng trước năm 1910, c&aacute;ch trung t&acirc;m TP Đ&agrave; Lạt hơn 2 km. Đ&acirc;y từng l&agrave; nơi sinh sống v&agrave; l&agrave;m việc của thị trưởng Đ&agrave; Lạt ki&ecirc;m tỉnh trưởng Tuy&ecirc;n Đức (t&ecirc;n trước đ&acirc;y của tỉnh L&acirc;m Đồng). Hiện, t&ograve;a nh&agrave; thuộc quản l&yacute; của Trung t&acirc;m văn h&oacute;a L&acirc;m Đồng.</p>\r\n<p>Theo phương &aacute;n được chọn, khu vực dinh được x&acirc;y kh&aacute;ch sạn 10 tầng, t&ograve;a nh&agrave; dinh giữ nguy&ecirc;n v&agrave; n&acirc;ng cấp th&agrave;nh Bảo t&agrave;ng Đ&agrave; Lạt ở vị tr&iacute; mới (n&acirc;ng cao 28 m), mở cửa cho du kh&aacute;ch tham quan... Khi được UBND tỉnh L&acirc;m Đồng lấy &yacute; kiến v&agrave;o năm 2021, Hội kiến tr&uacute;c sư Việt Nam&nbsp;<a href=\"https://vnexpress.net/da-lat-cho-y-kien-chuyen-gia-de-quyet-so-phan-dinh-tinh-truong-4380066.html\" rel=\"dofollow\" data-itm-added=\"1\" data-itm-source=\"#vn_source=Detail-ThoiSu-4678688&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-ChuaDongThuan&amp;vn_term=Desktop&amp;vn_thumb=0\">chưa đồng thuận</a>&nbsp;việc n&acirc;ng Dinh tỉnh trưởng.</p>\r\n<p>Hồi th&aacute;ng 9 năm nay, UBND tỉnh L&acirc;m Đồng đưa t&ograve;a nh&agrave; cổ n&oacute;i tr&ecirc;n từ nh&oacute;m một&nbsp;<a href=\"https://vnexpress.net/lam-dong-dua-dinh-tinh-truong-o-da-lat-khoi-nhom-bao-ton-nghiem-ngat-4651017.html\" rel=\"dofollow\" data-itm-added=\"1\" data-itm-source=\"#vn_source=Detail-ThoiSu-4678688&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-XuongNhomHai&amp;vn_term=Desktop&amp;vn_thumb=0\">xuống nh&oacute;m hai</a>. C&aacute;c biệt thự nh&oacute;m một khi cải tạo phải giữ nguy&ecirc;n h&igrave;nh d&aacute;ng kiến tr&uacute;c b&ecirc;n ngo&agrave;i lẫn cấu tr&uacute;c b&ecirc;n trong, mật độ x&acirc;y dựng, số tầng v&agrave; chiều cao. Biệt thự thuộc nh&oacute;m hai chỉ cần giữ nguy&ecirc;n h&igrave;nh d&aacute;ng kiến tr&uacute;c b&ecirc;n ngo&agrave;i.</p>\r\n</article>', 1, 1, '2022-01-02 11:30:00', 'assets\\img\\trending\\trending_bottom1.jpg'),
(2, 'Post thu 2', 'content thế giới', 3, 1, '2022-01-03 14:45:00', 'assets\\img\\trending\\trending_bottom1.jpg'),
(3, 'Post thu 3', 'nd', 3, 1, '2022-01-04 18:20:00', 'assets\\img\\trending\\trending_bottom2.jpg'),
(4, 'Post thu 4', 'nd', 3, 1, '2022-01-05 09:10:00', 'assets\\img\\trending\\right1.jpg'),
(5, 'Post thu 5', 'nd', 3, 1, '2022-01-06 13:50:00', 'assets\\img\\trending\\right2.jpg'),
(6, 'Post thu 6', 'nd 2', 3, 1, '2022-01-07 16:30:00', 'assets\\img\\trending\\right4.jpg'),
(7, 'Post thu 7', 'nd', 3, 1, '2022-01-08 20:15:00', 'assets\\img\\trending\\right3.jpg'),
(8, 'Post thu 8', 'nd', 3, 1, '2022-01-09 08:40:00', 'assets\\img\\trending\\right5.jpg'),
(9, 'Post thu 9', 'nd', 3, 11, '2022-01-10 10:50:00', 'assets\\img\\trending\\trending_bottom1.jpg'),
(10, 'Post cat id 1', 'cattttt', 3, 18, '2022-01-11 14:25:00', 'assets\\img\\trending\\trending_bottom1.jpg'),
(11, 'Post thu 11', 'nd', 3, 11, '2022-01-02 10:00:00', 'assets\\img\\trending\\trending_bottom2.jpg'),
(12, 'Post thu 12', 'nd', 3, 12, '2022-01-03 10:00:00', 'assets\\img\\trending\\trending_bottom3.jpg'),
(13, 'Post thu 13', 'nd', 3, 13, '2022-01-04 10:00:00', 'assets\\img\\trending\\trending_bottom2.jpg'),
(14, 'Post thu 14', 'nd', 3, 14, '2022-01-05 10:00:00', 'assets\\img\\trending\\trending_bottom3.jpg'),
(15, 'Post thu 15', 'nd', 3, 12, '2022-01-06 10:00:00', 'assets\\img\\news\\weekly2News1.jpg'),
(16, '31-10 thêm', 'hôm nay là 31-10', 2, 1, '2023-10-31 22:21:04', 'null'),
(17, 'Hello', 'xin chào', 1, 1, '2023-11-11 16:15:10', 'luutru/1.png'),
(18, 'Loạt sự kiện khuấy đảo cộng đồng AI tạo sinh', '<p class=\"description\">Sam Altman bị sa thải, ảnh deepfake Donald Trump bị bắt, Hollywood biểu t&igrave;nh chống AI... nằm trong số những c&acirc;u chuyện g&acirc;y tranh c&atilde;i li&ecirc;n quan tới AI tạo sinh.</p>\n<article class=\"fck_detail \">\n<p class=\"Normal\">Ra mắt cuối 2022,&nbsp;<a href=\"https://vnexpress.net/chu-de/chatgpt-5974\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-SoHoa_CongNghe_Ai-4690621&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Chatgpt&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">ChatGPT</a>&nbsp;bắt đầu tạo n&ecirc;n cơn sốt từ đầu năm nay khi c&aacute;n mốc 100 triệu người d&ugrave;ng chỉ sau hai th&aacute;ng. AI n&agrave;y v&agrave; c&aacute;c m&ocirc; h&igrave;nh chatbot tương tự của Google, Microsoft... trở th&agrave;nh c&ocirc;ng cụ hữu &iacute;ch cho người d&ugrave;ng cả trong c&ocirc;ng việc v&agrave; giải tr&iacute;. Tuy nhi&ecirc;n, xu hướng mới cũng l&agrave;m nảy sinh những cuộc tranh c&atilde;i li&ecirc;n quan đến mối nguy từ&nbsp;<a href=\"https://vnexpress.net/chu-de/ai-tao-sinh-6895\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-SoHoa_CongNghe_Ai-4690621&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-AiTaoSinh&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">AI tạo sinh</a>&nbsp;v&agrave; ph&aacute;t triển tr&iacute; tuệ nh&acirc;n tạo c&oacute; tr&aacute;ch nhiệm.</p>\n<p class=\"Normal\"><strong>Hơn 1.000 chuy&ecirc;n gia k&yacute; thư k&ecirc;u gọi kiểm so&aacute;t AI</strong></p>\n<p class=\"Normal\">Tốc độ ph&aacute;t triển ch&oacute;ng mặt của AI đ&atilde; khiến nhiều l&atilde;nh đạo c&ocirc;ng nghệ h&agrave;ng đầu lo ngại. V&agrave;o th&aacute;ng 3, tỷ ph&uacute;&nbsp;<a href=\"https://vnexpress.net/chu-de/elon-musk-1849\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-SoHoa_CongNghe_Ai-4690621&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-ElonMusk&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Elon Musk</a>, Steve Wozniak - nh&agrave; đồng s&aacute;ng lập Apple,&nbsp;<a href=\"https://vnexpress.net/ong-chu-gay-tranh-cai-phia-sau-startup-ai-ty-usd-4616573.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-SoHoa_CongNghe_Ai-4690621&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-EmadMostaque&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Emad Mostaque</a>&nbsp;- CEO Stability AI, gi&aacute;o sư&nbsp;<a href=\"https://vnexpress.net/so-hoa/ong-truong-gia-binh-doi-thoai-voi-bo-gia-ai-4344168.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-SoHoa_CongNghe_Ai-4690621&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-YoshuaBengio&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Yoshua Bengio</a>&nbsp;- một trong những đặt nền m&oacute;ng cho AI, v&agrave; hơn 1.000 nh&agrave; nghi&ecirc;n cứu, l&atilde;nh đạo, chuy&ecirc;n gia kh&aacute;c đ&atilde; k&yacute; v&agrave;o bức thư k&ecirc;u gọi ngừng đ&agrave;o tạo si&ecirc;u AI.</p>\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\n<div class=\"action_thumb flexbox\">&nbsp;</div>\n<div class=\"fig-picture\"><picture><source srcset=\"https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=uvyQWyqwCIDgmfrQJ65KNg 1x, https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=VPkf45zNFPkmvd4p_inS4g 1.5x, https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=L2nqMKE2xnDnMd2vn8FXuQ 2x\" data-srcset=\"https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=uvyQWyqwCIDgmfrQJ65KNg 1x, https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=VPkf45zNFPkmvd4p_inS4g 1.5x, https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=L2nqMKE2xnDnMd2vn8FXuQ 2x\"><img class=\"lazy lazied\" src=\"https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=uvyQWyqwCIDgmfrQJ65KNg\" alt=\"Elon Musk. Ảnh: Reuters\" loading=\"lazy\" data-src=\"https://i1-sohoa.vnecdn.net/2023/12/19/Screenshot-2023-12-19-at-14-32-7260-3546-1702971517.png?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=uvyQWyqwCIDgmfrQJ65KNg\" data-ll-status=\"loaded\"></picture></div>\n<figcaption>\n<p class=\"Image\">Elon Musk. Ảnh:&nbsp;<em>Reuters</em></p>\n</figcaption>\n</figure>\n</article>', 1, 1, '2023-12-21 15:06:24', 'luutru/Untitled.png'),
(19, 'Hello', '<p>sadasdasdas</p>', 1, 1, '2023-12-21 15:34:39', ''),
(20, 'Những tỷ phú kiếm nhiều tiền nhất năm 2023', '<p class=\"description\">Elon Musk c&oacute; m&agrave;n lội ngược d&ograve;ng ấn tượng khi kiếm hơn 100 tỷ USD năm nay, sau năm 2022 mất tiền nhiều nhất thế giới.</p>\r\n<article class=\"fck_detail \">\r\n<p class=\"Normal\">Với giới si&ecirc;u gi&agrave;u, 2023 l&agrave; năm kiếm bộn. Khi thị trường chứng kho&aacute;n to&agrave;n cầu tăng tốc, hơn nửa số tỷ ph&uacute; to&agrave;n cầu năm nay c&oacute; t&agrave;i sản tăng so với đầu năm.</p>\r\n<p class=\"Normal\">Thống k&ecirc; của&nbsp;<em>Forbes</em>&nbsp;cho thấy tổng t&agrave;i sản của 10 tỷ ph&uacute; kiếm bộn nhất năm nay tăng 490 tỷ USD, t&iacute;nh đến ng&agrave;y 15/12. Trong đ&oacute;, 7 người l&agrave; đại diện của ng&agrave;nh c&ocirc;ng nghệ.&nbsp;<a href=\"https://vnexpress.net/chu-de/elon-musk-1849\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_QuocTe-4691238&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-ElonMusk&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Elon Musk</a>&nbsp;bắt đầu năm nay với vị tr&iacute; gi&agrave;u thứ hai thế giới, do&nbsp;<a href=\"https://vnexpress.net/elon-musk-lap-ky-luc-guinness-vi-mat-tien-4558252.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_QuocTe-4691238&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-MatNhieuTienNhatNam2022&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">mất nhiều tiền nhất năm 2022</a>. Nhưng năm nay, &ocirc;ng quay trở lại vị tr&iacute; đầu ti&ecirc;n với t&agrave;i sản tăng 108 tỷ USD - cũng l&agrave; nhiều nhất thế giới.</p>\r\n<p class=\"Normal\"><strong>1. Elon Musk</strong></p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\r\n<div class=\"fig-picture\"><picture><source srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=GFl4z39ntnTaF6nR2Br_4g 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=P3FHkuLq_Y-Bm_JieUntag 2x\" data-srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=GFl4z39ntnTaF6nR2Br_4g 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=P3FHkuLq_Y-Bm_JieUntag 2x\"><img class=\"lazy lazied\" src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ\" alt=\"Elon Musk trong một sự kiện ở Italy h&ocirc;m 16/12. Ảnh: Reuters\" loading=\"lazy\" data-src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ\" data-ll-status=\"loaded\"></picture></div>\r\n<figcaption>\r\n<p class=\"Image\">Elon Musk trong một sự kiện ở Italy h&ocirc;m 16/12. Ảnh:<em>&nbsp;Reuters</em></p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"Normal\">Nguồn t&agrave;i sản: Tesla, SpaceX</p>\r\n<p class=\"Normal\">T&agrave;i sản: 254,9 tỷ USD</p>\r\n<p class=\"Normal\">Tăng: 108,4 tỷ USD</p>\r\n<p class=\"Normal\">Năm nay, Musk chủ yếu d&agrave;nh thời gian cho X (trước đ&acirc;y l&agrave; Twitter). Tuy nhi&ecirc;n, t&agrave;i sản của &ocirc;ng vẫn tăng mạnh nhất thế giới, nhờ Tesla v&agrave; SpaceX. Cổ phiếu h&atilde;ng xe điện Tesla đ&atilde; tăng hơn 100% từ đầu năm. C&ocirc;ng ty h&agrave;ng kh&ocirc;ng vũ trụ SpaceX cũng được định gi&aacute; tới 150 tỷ USD hồi th&aacute;ng 7, nhờ h&agrave;ng chục vụ ph&oacute;ng t&ecirc;n lửa th&agrave;nh c&ocirc;ng trong năm nay.</p>\r\n<p class=\"Normal\"><strong>2. Mark Zuckerberg</strong></p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\r\n<div class=\"fig-picture\"><picture><source srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eP156s7eIrR42paxK5_94Q 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=QB9GFlqXIiFcTgZ7Zxh0Dg 2x\" data-srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eP156s7eIrR42paxK5_94Q 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=QB9GFlqXIiFcTgZ7Zxh0Dg 2x\"><img class=\"lazy lazied\" src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q\" alt=\"Mark Zuckerberg trong một sự kiện tại trụ sở Meta ở California hồi th&aacute;ng 9. Ảnh: Reuters\" loading=\"lazy\" data-src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q\" data-ll-status=\"loaded\"></picture></div>\r\n<figcaption>\r\n<p class=\"Image\">Mark Zuckerberg trong một sự kiện tại trụ sở Meta ở California hồi th&aacute;ng 9. Ảnh:&nbsp;<em>Reuters</em></p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"Normal\">Nguồn t&agrave;i sản: Facebook</p>\r\n<p class=\"Normal\">T&agrave;i sản: 118,6 tỷ USD</p>\r\n<p class=\"Normal\">Tăng: 74,8 tỷ USD</p>\r\n<p class=\"Normal\">Năm 2022 rất kh&oacute; khăn với Zuckerberg, với gi&aacute; cổ phiếu giảm, lợi nhuận giảm v&agrave; c&aacute;c đợt sa thải quy m&ocirc; lớn. Tuy nhi&ecirc;n, năm nay, anh c&oacute; th&ecirc;m gần 75 tỷ USD t&agrave;i sản, nhờ Meta&nbsp;<a href=\"https://vnexpress.net/doanh-thu-cong-ty-me-facebook-lap-ky-luc-nho-mang-quang-cao-4669278.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_QuocTe-4691238&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-AnNenLamRa&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">ăn n&ecirc;n l&agrave;m ra</a>. Cổ phiếu c&ocirc;ng ty mẹ Facebook đ&atilde; tăng 178% từ đầu năm, tr&ecirc;n đ&agrave; ghi nhận năm tốt nhất đến nay.</p>\r\n</article>', 1, 1, '2023-12-21 16:26:23', ''),
(21, 'Những tỷ phú kiếm nhiều tiền nhất năm 2023', '<p class=\"description\">Elon Musk c&oacute; m&agrave;n lội ngược d&ograve;ng ấn tượng khi kiếm hơn 100 tỷ USD năm nay, sau năm 2022 mất tiền nhiều nhất thế giới.</p>\r\n<article class=\"fck_detail \">\r\n<p class=\"Normal\">Với giới si&ecirc;u gi&agrave;u, 2023 l&agrave; năm kiếm bộn. Khi thị trường chứng kho&aacute;n to&agrave;n cầu tăng tốc, hơn nửa số tỷ ph&uacute; to&agrave;n cầu năm nay c&oacute; t&agrave;i sản tăng so với đầu năm.</p>\r\n<p class=\"Normal\">Thống k&ecirc; của&nbsp;<em>Forbes</em>&nbsp;cho thấy tổng t&agrave;i sản của 10 tỷ ph&uacute; kiếm bộn nhất năm nay tăng 490 tỷ USD, t&iacute;nh đến ng&agrave;y 15/12. Trong đ&oacute;, 7 người l&agrave; đại diện của ng&agrave;nh c&ocirc;ng nghệ.&nbsp;<a href=\"https://vnexpress.net/chu-de/elon-musk-1849\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_QuocTe-4691238&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-ElonMusk&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Elon Musk</a>&nbsp;bắt đầu năm nay với vị tr&iacute; gi&agrave;u thứ hai thế giới, do&nbsp;<a href=\"https://vnexpress.net/elon-musk-lap-ky-luc-guinness-vi-mat-tien-4558252.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_QuocTe-4691238&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-MatNhieuTienNhatNam2022&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">mất nhiều tiền nhất năm 2022</a>. Nhưng năm nay, &ocirc;ng quay trở lại vị tr&iacute; đầu ti&ecirc;n với t&agrave;i sản tăng 108 tỷ USD - cũng l&agrave; nhiều nhất thế giới.</p>\r\n<p class=\"Normal\"><strong>1. Elon Musk</strong></p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\r\n<div class=\"fig-picture\"><picture><source srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=GFl4z39ntnTaF6nR2Br_4g 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=P3FHkuLq_Y-Bm_JieUntag 2x\" data-srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=GFl4z39ntnTaF6nR2Br_4g 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=P3FHkuLq_Y-Bm_JieUntag 2x\"><img class=\"lazy lazied\" src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ\" alt=\"Elon Musk trong một sự kiện ở Italy h&ocirc;m 16/12. Ảnh: Reuters\" loading=\"lazy\" data-src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-16t131655z-930554754-m-1945-6036-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=WGc0FYFucSIckTmmYOPozQ\" data-ll-status=\"loaded\"></picture></div>\r\n<figcaption>\r\n<p class=\"Image\">Elon Musk trong một sự kiện ở Italy h&ocirc;m 16/12. Ảnh:<em>&nbsp;Reuters</em></p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"Normal\">Nguồn t&agrave;i sản: Tesla, SpaceX</p>\r\n<p class=\"Normal\">T&agrave;i sản: 254,9 tỷ USD</p>\r\n<p class=\"Normal\">Tăng: 108,4 tỷ USD</p>\r\n<p class=\"Normal\">Năm nay, Musk chủ yếu d&agrave;nh thời gian cho X (trước đ&acirc;y l&agrave; Twitter). Tuy nhi&ecirc;n, t&agrave;i sản của &ocirc;ng vẫn tăng mạnh nhất thế giới, nhờ Tesla v&agrave; SpaceX. Cổ phiếu h&atilde;ng xe điện Tesla đ&atilde; tăng hơn 100% từ đầu năm. C&ocirc;ng ty h&agrave;ng kh&ocirc;ng vũ trụ SpaceX cũng được định gi&aacute; tới 150 tỷ USD hồi th&aacute;ng 7, nhờ h&agrave;ng chục vụ ph&oacute;ng t&ecirc;n lửa th&agrave;nh c&ocirc;ng trong năm nay.</p>\r\n<p class=\"Normal\"><strong>2. Mark Zuckerberg</strong></p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\r\n<div class=\"fig-picture\"><picture><source srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eP156s7eIrR42paxK5_94Q 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=QB9GFlqXIiFcTgZ7Zxh0Dg 2x\" data-srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q 1x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eP156s7eIrR42paxK5_94Q 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=QB9GFlqXIiFcTgZ7Zxh0Dg 2x\"><img class=\"lazy lazied\" src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q\" alt=\"Mark Zuckerberg trong một sự kiện tại trụ sở Meta ở California hồi th&aacute;ng 9. Ảnh: Reuters\" loading=\"lazy\" data-src=\"https://i1-kinhdoanh.vnecdn.net/2023/12/21/2023-12-06t165904z-2102915125-8867-2288-1703133536.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=DeMo4xBbBZNP-6TN5JAA_Q\" data-ll-status=\"loaded\"></picture></div>\r\n<figcaption>\r\n<p class=\"Image\">Mark Zuckerberg trong một sự kiện tại trụ sở Meta ở California hồi th&aacute;ng 9. Ảnh:&nbsp;<em>Reuters</em></p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"Normal\">Nguồn t&agrave;i sản: Facebook</p>\r\n<p class=\"Normal\">T&agrave;i sản: 118,6 tỷ USD</p>\r\n<p class=\"Normal\">Tăng: 74,8 tỷ USD</p>\r\n<p class=\"Normal\">Năm 2022 rất kh&oacute; khăn với Zuckerberg, với gi&aacute; cổ phiếu giảm, lợi nhuận giảm v&agrave; c&aacute;c đợt sa thải quy m&ocirc; lớn. Tuy nhi&ecirc;n, năm nay, anh c&oacute; th&ecirc;m gần 75 tỷ USD t&agrave;i sản, nhờ Meta&nbsp;<a href=\"https://vnexpress.net/doanh-thu-cong-ty-me-facebook-lap-ky-luc-nho-mang-quang-cao-4669278.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_QuocTe-4691238&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-AnNenLamRa&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">ăn n&ecirc;n l&agrave;m ra</a>. Cổ phiếu c&ocirc;ng ty mẹ Facebook đ&atilde; tăng 178% từ đầu năm, tr&ecirc;n đ&agrave; ghi nhận năm tốt nhất đến nay.</p>\r\n</article>', 1, 1, '2023-12-21 16:28:51', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `score` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`user_id`, `post_id`, `score`) VALUES
(1, 0, 3),
(1, 1, 4),
(1, 17, 3),
(1, 16, 4),
(16, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Editor'),
(3, 'Author'),
(4, 'Contributor'),
(5, 'Reader');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role_id`) VALUES
(1, 'admin1', 'admin@123', 'admin@cmsweb.com', 1),
(2, 'editor1', 'editor@123', 'editor@cmsweb.com', 2),
(3, 'author1', 'author@123', 'author@cmsweb.com', 3),
(4, 'contributor1', ' contributor@123', 'contributor@cmsweb.com', 4),
(5, 'reader1', 'reader@123', 'reader@cmsweb.com', 5),
(6, 'admin2', 'admin@123', 'admin@cmsweb.com', 1),
(7, 'editor2', 'editor@123', 'editor@cmsweb.com', 2),
(8, 'author2', 'author@123', 'author@cmsweb.com', 3),
(9, 'contributor2', ' contributor@123', 'contributor@cmsweb.com', 4),
(10, 'reader2', 'reader@123', 'reader@cmsweb.com', 5),
(11, 'admin3', 'admin@1234', 'admin@cmsweb.com', 2),
(12, 'editor3', 'editor@123', 'editor@cmsweb.com', 2),
(13, 'author3', 'author@123', 'author@cmsweb.com', 3),
(14, 'contributor3', ' contributor@123', 'contributor@cmsweb.com', 4),
(15, 'reader3', 'reader@123', 'reader@cmsweb.com', 5),
(16, 'quang', 'quang', '123@gmail.com', 5),
(17, 'admin13', 'admin@123', 'admin@cmsweb.com', 1),
(18, 'quang3', 'quang', 'quang3@gmail.com', 5),
(19, 'nhatquang', '123456', '123@gmail.com', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `groupcategory_id` (`groupcategory_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`dnsweb`);

--
-- Chỉ mục cho bảng `groupcategories`
--
ALTER TABLE `groupcategories`
  ADD PRIMARY KEY (`groupcategory_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`groupcategory_id`) REFERENCES `groupcategories` (`groupcategory_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
