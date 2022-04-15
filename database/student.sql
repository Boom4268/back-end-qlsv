-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th4 15, 2022 lúc 10:26 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `student`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id_diem` int(11) NOT NULL,
  `id_sinh_vien` int(11) NOT NULL,
  `id_mon_hoc` int(11) NOT NULL,
  `diem_chuyen_can` float DEFAULT NULL,
  `diem_giua_ky` float DEFAULT NULL,
  `diem_cuoi_ky` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`id_diem`, `id_sinh_vien`, `id_mon_hoc`, `diem_chuyen_can`, `diem_giua_ky`, `diem_cuoi_ky`) VALUES
(18, 1, 1, 10, 10, 10),
(19, 1, 2, 5, 7, 6),
(20, 1, 3, 5, 8, 10),
(21, 2, 1, 10, 4, 5.5),
(22, 2, 2, 6, 7.5, 8),
(23, 2, 3, 5, 7, 9),
(24, 3, 1, 1, 6, 10),
(25, 3, 2, 10, 7.5, 6),
(26, 3, 3, 6, 6, 7),
(27, 4, 1, 10, 6, 9),
(28, 4, 2, 5, 7, 6.5),
(29, 4, 3, 8.5, 5, 7),
(30, 5, 1, 10, 8, 9),
(31, 5, 2, 5, 9, 6.5),
(32, 5, 3, 8.5, 5, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id_gv` int(11) NOT NULL,
  `ten_giang_vien` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`id_gv`, `ten_giang_vien`, `email`, `sdt`) VALUES
(1, 'giangvien01', 'giangvien01@gmail.com', '012345656'),
(2, 'giangvien02', 'giangvien02@gmail.com', '012345657'),
(3, 'giangvien03', 'giangvien03@gmail.com', '012345658'),
(4, 'giangvien04', 'giangvien04@gmail.com', '012345659');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `ten_khoa` varchar(45) NOT NULL,
  `ten_ki_hieu` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `ten_khoa`, `ten_ki_hieu`) VALUES
(1, 'Công nghệ thông tin', 'CNTT'),
(2, 'Điện tử', 'DT'),
(3, 'Kế toán', 'KT'),
(4, 'Quản trị kinh doanh', 'QTKD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_lop` int(11) NOT NULL,
  `ten_lop` varchar(255) NOT NULL,
  `id_giang_vien` int(11) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_lop`, `ten_lop`, `id_giang_vien`, `id_khoa`) VALUES
(1, 'CN01', 1, 1),
(2, 'CN02', 2, 1),
(3, 'DT01', 3, 2),
(4, 'KT01', 4, 3),
(5, 'QTKD01', 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id_mon` int(11) NOT NULL,
  `ten_mon` varchar(255) NOT NULL,
  `id_giang_vien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id_mon`, `ten_mon`, `id_giang_vien`) VALUES
(1, 'Tin học cơ sở', 1),
(2, 'Lập trình Java', 2),
(3, 'Lập trình web', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `id_sv` int(11) NOT NULL,
  `ma_sv` varchar(45) NOT NULL,
  `ten` varchar(45) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(45) NOT NULL,
  `id_lop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`id_sv`, `ma_sv`, `ten`, `ngay_sinh`, `dia_chi`, `id_lop`) VALUES
(1, 'SV01', 'Phan Minh Đức', '2000-04-29', 'Hà Nội', 2),
(2, 'SV02', 'Phan Minh Anh', '2000-03-29', 'Hà Nội', 1),
(3, 'SV03', 'Đỗ Lan Anh', '2000-03-12', 'Hải Phòng', 1),
(4, 'SV04', 'Trần Ngọc Ánh', '2000-04-21', 'Hà Nội', 2),
(5, 'SV08', 'Phan Thu Hiền', '2000-12-16', 'Nghệ An', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(45) NOT NULL,
  `mat_khau` varchar(45) NOT NULL,
  `quyen` varchar(45) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `ten_dang_nhap`, `mat_khau`, `quyen`, `id_user`) VALUES
(1, 'admin1', 'ad1', 'admin', 0),
(2, 'admin2', 'ad2', 'admin', 0),
(3, 'SV01', 'sv1', 'user', 1),
(4, 'SV02', 'sv2', 'user', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id_diem`),
  ADD KEY `id_mon_hoc` (`id_mon_hoc`),
  ADD KEY `diem_ibfk_2` (`id_sinh_vien`);

--
-- Chỉ mục cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id_gv`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`),
  ADD KEY `FRlop-giangvien` (`id_giang_vien`),
  ADD KEY `FRlop-khoa` (`id_khoa`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id_mon`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`id_sv`),
  ADD KEY `FRdiachi-sinhvien` (`dia_chi`),
  ADD KEY `FRsinhvien-lop` (`id_lop`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id_diem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id_gv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id_mon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  MODIFY `id_sv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`id_mon_hoc`) REFERENCES `mon_hoc` (`id_mon`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`id_sinh_vien`) REFERENCES `sinh_vien` (`id_sv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `FRlop-giangvien` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id_gv`),
  ADD CONSTRAINT `FRlop-khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`);

--
-- Các ràng buộc cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `FRsinhvien-lop` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_lop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
