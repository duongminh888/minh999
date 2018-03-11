-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2018 lúc 12:05 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `meup`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admintrator', NULL, NULL),
(2, 'Ban giám đốc', NULL, NULL),
(3, 'Chuyên gia', NULL, NULL),
(4, 'Giám đốc phòng giao dịch', NULL, NULL),
(5, 'Kế toán', NULL, NULL),
(6, 'Chuyên viên tín dụng', NULL, NULL),
(7, 'Shop', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `iduser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idpost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(10) UNSIGNED NOT NULL,
  `idhoso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoso`
--

CREATE TABLE `hoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `idmember` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotienvay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laimoingay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sotienphaitra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pgd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaivay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthaihopdong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `songay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaivay`
--

CREATE TABLE `loaivay` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laisuat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaivay`
--

INSERT INTO `loaivay` (`id`, `name`, `laisuat`, `created_at`, `updated_at`) VALUES
(1, 'Vay trả góp', '2', NULL, NULL),
(2, 'Vay đầu năm', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pgd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(103, '2014_10_12_000000_create_users_table', 1),
(104, '2018_02_09_033940_member', 1),
(105, '2018_02_09_043630_thongtinkhachhang', 1),
(106, '2018_02_09_044007_hoso', 1),
(107, '2018_02_22_083926_trangthaihoso', 2),
(108, '2018_02_22_092535_create_loaihinhvays_table', 3),
(109, '2018_02_22_093446_create_loaivays_table', 4),
(110, '2018_02_24_024456_create_chucvus_table', 5),
(112, '2018_02_27_074351_create_comments_table', 6),
(113, '2018_02_28_070607_create_fileuploads_table', 7),
(114, '2018_03_01_094323_phonggiaodich', 8),
(115, '2018_03_03_034800_create_nhanvien_pgds_table', 9),
(117, '2018_03_05_074557_shophoso', 10),
(118, '2018_03_06_093115_create_nhanvien_donvays_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien_donvay`
--

CREATE TABLE `nhanvien_donvay` (
  `id` int(10) UNSIGNED NOT NULL,
  `idnhanvien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idhoso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phonggiaodich`
--

CREATE TABLE `phonggiaodich` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giamdoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shophoso`
--

CREATE TABLE `shophoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `idmember` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaingan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laimoingay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sotienphaitra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaivay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthaihopdong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotienvay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `songay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinkhachhang`
--

CREATE TABLE `thongtinkhachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `idmember` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaycap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noicap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaidienthoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tennguoithan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quanhenguoithan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdtnguoithan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luongtb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hopdong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mathenh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nghenghiep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhomnganhnghe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdtnoilam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaithanhtoan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tennganhang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaihoso`
--

CREATE TABLE `trangthaihoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaihoso`
--

INSERT INTO `trangthaihoso` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chờ duyệt', NULL, NULL),
(2, 'Đã giải ngân', NULL, NULL),
(3, 'Đề xuất phê duyệt', NULL, NULL),
(4, 'Phê duyệt', NULL, NULL),
(5, 'Không đủ điều kiện', NULL, NULL),
(6, 'Vượt cấp nhân viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phong`, `hoten`, `sdt`, `diachi`, `mota`, `gioitinh`, `avatar`, `email`, `rule`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'Dương minh', '0958532326', 'Hà nội, đông anh', 'day la mo ta', '1', '1520047551_28-avatarw710h473jpg.jpg', 'admin@gmail.com', '1', '$2y$10$XEGBygNWkq9pKWJuArWlA.JCg95hViuVHLuj9/.I2kdxXbr62AYZO', 'Tv0IHLc0vau3eHfrY9ehS4DPZVZltwBIaFDKgYaDuud1zoAIDzHU7wUGyE7o', NULL, '2018-03-05 23:34:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaivay`
--
ALTER TABLE `loaivay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien_donvay`
--
ALTER TABLE `nhanvien_donvay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phonggiaodich`
--
ALTER TABLE `phonggiaodich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shophoso`
--
ALTER TABLE `shophoso`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtinkhachhang`
--
ALTER TABLE `thongtinkhachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trangthaihoso`
--
ALTER TABLE `trangthaihoso`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hoso`
--
ALTER TABLE `hoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaivay`
--
ALTER TABLE `loaivay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `nhanvien_donvay`
--
ALTER TABLE `nhanvien_donvay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phonggiaodich`
--
ALTER TABLE `phonggiaodich`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shophoso`
--
ALTER TABLE `shophoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongtinkhachhang`
--
ALTER TABLE `thongtinkhachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trangthaihoso`
--
ALTER TABLE `trangthaihoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
