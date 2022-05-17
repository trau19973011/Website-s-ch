-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 05, 2022 lúc 05:06 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietmuahang`
--

CREATE TABLE `chitietmuahang` (
  `id_muahang` int(11) NOT NULL,
  `id_sach` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietmuahang`
--

INSERT INTO `chitietmuahang` (`id_muahang`, `id_sach`, `soluong`, `thanhtien`) VALUES
(21, 23, 3, 150000),
(21, 24, 1, 90000),
(21, 30, 5, 100000),
(21, 34, 5, 350000),
(22, 41, 5, 175000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sach` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id_giohang`, `id_user`, `id_sach`, `soluong`) VALUES
(15, 10, 30, 2),
(16, 10, 7, 3),
(19, 9, 38, 1),
(22, 8, 27, 5),
(23, 5, 24, 1),
(24, 5, 23, 3),
(25, 5, 30, 5),
(26, 5, 34, 5),
(28, 4, 41, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muahang`
--

CREATE TABLE `muahang` (
  `id_muahang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ngaymua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muahang`
--

INSERT INTO `muahang` (`id_muahang`, `id_user`, `ngaymua`) VALUES
(21, 5, '2022-02-12 22:55:35'),
(22, 4, '2022-02-24 07:02:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id_sach` int(11) NOT NULL,
  `tensach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tacgia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nxb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_theloai` int(11) NOT NULL,
  `hinhanh` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `ghichu` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id_sach`, `tensach`, `tacgia`, `nxb`, `id_theloai`, `hinhanh`, `soluong`, `dongia`, `ghichu`) VALUES
(7, 'Dragonball', 'Toriyama Akira', 'NXB Hồng Đức', 2, 'book_11.jpg', 16, 30000, 'Một cậu bé có đuôi khỉ được tìm thấy bởi một ông lão sống một mình trong rừng, ông đặt tên là Son Goku và xem đứa bé như là cháu của mình'),
(11, '10 vạn câu hỏi vì sao Vật Lý', 'Đức Anh', 'NXB Dân Trí', 5, 'book_6.jpg', 15, 30000, 'Thông qua những câu hỏi về các sự vật, hiện tượng trong tự nhiên, tập sách 10 vạn câu hỏi vì sao sẽ giải đáp một cách chính xác, khoa học và dễ hiểu cho bạn đọc về vật lý. '),
(21, 'Chuyến đi của thanh xuân', 'Nguyễn Ngọc Thạch', 'NXB Thế Giới', 1, 'book_1.jpg', 6, 50000, 'CHUYẾN ĐI CỦA THANH XUÂN – Hay là ta một lần bỏ trốn lên Đà Lạt?\r\n\r\nỞ lưng chừng thanh xuân đôt nhiên ta tự hỏi có nhận ra đâu là những gì ta thực sự muốn làm, đâu là những tình cảm đáng cho ta trân trọng...'),
(22, 'Nghĩ đơn giản, Sống đơn thuần', 'Tolly Burkan', 'Nghĩ đơn giản, Sống đơn thuần', 1, 'book_2.jpg', 15, 40000, 'Từ xưa đến nay, chúng ta vẫn được định hướng để tin rằng chẳng có điều gì đáng giá mà không cần đấu tranh. Bản thân tôi cũng đã dành hàng thập kỷ để nghiên cứu về nhận định phổ biến này...'),
(23, 'Tôi thấy hoa vàng trên cỏ xanh', 'Nguyễn Nhật Ánh', 'NXB Trẻ', 1, 'book_3.jpg', 11, 50000, 'Những câu chuyện nhỏ xảy ra ở một ngôi làng nhỏ: chuyện người, chuyện cóc, chuyện ma, chuyện công chúa và hoàng tử , rồi chuyện đói ăn, cháy nhà, lụt lội,... '),
(24, 'Mãi mãi là bao xa', 'Diệp Lạc Vô Tâm', 'Mãi mãi là bao xa', 1, 'book_12.jpg', 14, 90000, 'Bạch Lăng Lăng, nữ sinh khoa Điện khí, trẻ trung, xinh đẹp và rất tự hào khi quen được một người bạn lý tưởng qua mạng, chàng du học sinh của một trường nổi tiếng của Mỹ, người mang biệt danh “nhà khoa học”: Mãi Mãi Là Bao Xa. '),
(25, 'One Piece', 'Oda', 'NXB Kim Đồng', 2, 'book_8.png', 17, 30000, 'One Piece (Vua hải tặc) bộ thuộc thể loại truyện tranh Hành động kể về một cậu bé tên Monkey D. Luffy, dong buồm ra khơi trên chuyến hành trình tìm kho báu huyền thoại One Piece và trở thành Vua hải tặc.'),
(26, 'Shin cậu bé bút chì', 'Yoshito Usui', 'NXB Kim Đồng', 2, 'book_10.jpg', 13, 25000, 'Nội dung truyện cũng đơn giản: tất cả xoay quanh nhân vật chính là cậu bé Shin 5 tuổi với những mối quan hệ thân, sơ - bố, mẹ, hàng xóm, thầy cô, bạn bè, người quen và... cả những người không quen. '),
(27, 'Doraemon', 'Fujiko F Fujio', 'NXB Kim Đồng', 2, 'book_9.jpg', 14, 30000, 'Chuyện nổi tiếng về chú mèo máy thông minh Doraemon và các bạn.'),
(29, 'Dế mèn phiêu lưu ký', 'Tô Hoài', 'NXB Kim Đồng', 3, 'book_7.jpg', 4, 50000, 'Dế mèn phiêu lưu ký là truyện dài của nhà văn Tô Hoài kể về cuộc phiêu lưu của chú Dế Mèn cùng các bạn bè.'),
(30, 'Chú bé nhút nhát', 'Jeff Kinney', 'NXB Văn học', 3, 'book_13.jpg', 11, 20000, 'Trẻ con, mơ mộng, bướng bỉnh, Greg đã đi vào văn học với tư cách là một trong những nguyên mẫu trẻ thơ đáng yêu nhất, ấn tượng nhất và chiếm được cảm tình của hàng triệu độc giả trên toàn thế giới'),
(31, 'Những câu chuyện về lòng trung thực', 'Bích Nga', 'Những câu chuyện về lòng trung thực', 3, 'book_14.jpg', 15, 50000, 'Việc các em được đọc ngay từ khi còn bé những câu chuyện đề cao những giá trị tốt đẹp là rất quan trọng. '),
(32, 'Chú chó gác Sao', 'Takashi Murakami', 'NXB Văn học', 3, 'book_15.jpg', 5, 40000, '“Chú chó gác sao” là hình ảnh ví von, chỉ việc theo đuổi một ước mơ mãi chưa chạm tới.\r\n\r\nƯớc mơ luôn hiện diện không giới hạn ở mỗi người và bởi thế, ai trên đời cũng có thể là chú chó gác sao.'),
(33, 'Về nhà ăn cơm', 'Đức Nguyễn', 'Về nhà ăn cơm', 4, 'book_16.jpg', 15, 25000, 'Với 45 công thức thuần chay đơn giản, dễ nấu trong “Về ăn cơm”- cái tên thân thương gợi lên bữa cơm gia đình đầm ấm sẽ thổi một làn gió mới vào căn bếp nhỏ trong mỗi gia đình'),
(34, 'Bí mật chocolate', 'Khoa Phan', 'Bí mật chocolate', 4, 'book_18.jpg', 10, 70000, 'Nếu bạn đang tò mò tìm hiểu về những viên chocolate tươi đầy màu sắc này thì “ Bí mật Chocolate” chắc chắn là một cuốn sách bạn nên có được.'),
(35, 'Để con vào bếp', 'Nathalie Nguyen', 'Để con vào bếp', 4, 'book_17.jpg', 15, 35000, 'Cuốn sách “Để con vào bếp” là 34 công thức nấu nướng cực thú vị, dễ dàng và đầy màu sắc để bé có thể tự làm ở nhà.'),
(36, 'Bakingfun - Mùi của bếp', 'Vũ Ánh Nguyệt', ' NXB Thế Giới', 4, 'book_19.jpg', 12, 20000, 'Tiếp nối thành công đáng kinh ngạc từ cuốn sách “Bakingfun – Hành trình bếp bánh”, tác giả Vũ Ánh Nguyệt thêm một lần nữa khẳng định tên tuổi...'),
(37, 'Lược sử vạn vật', 'Khương Duy', 'NXB Khoa Học Xã Hội', 5, 'book_4.jpg', 15, 60000, 'Lược sử vạn vật là cuốn sách phổ biến khoa học trình bày một cách ngắn gọn lịch sử nghiên cứu khoa học tự nhiên, những thành tựu khoa học trong các lĩnh vực khoa học tự nhiên chính: vật lý, hóa học, sinh học, địa chất, thiên văn...'),
(38, 'Vạn vật vận hành', 'David Macaulay', 'Vạn vật vận hành', 5, 'book_5.jpg', 15, 80000, 'Vạn vật vận hành như thế nào? mô tả phần lớn các phát minh của thế giới hiện đại, giúp ta có cái nhìn sâu hơn về cơ chế hoạt động của các vật dụng tưởng chừng rất tầm thường'),
(40, 'Vũ trụ trong vỏ hạt dẻ', 'Stephen Hawking', 'Vũ trụ trong vỏ hạt dẻ', 5, 'book_20.jpg', 15, 35000, 'Lòng khát khao khám phá luôn là động lực cho trí sáng tạo của con người trong mọi lĩnh vực không chỉ trong khoa học. Điều đó được kiểm chứng trong quyển \"Vũ trụ trong vỏ hạt dẻ\".'),
(41, 'Toán 8', 'Bộ GD&ĐT', 'Toán 8', 6, 'toán.jpg', 10, 35000, 'Theo quy chuẩn của Bộ Giáo Dục và Đào Tạo Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id_theloai` int(11) NOT NULL,
  `ten_theloai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id_theloai`, `ten_theloai`) VALUES
(1, 'Sách văn học'),
(2, 'Truyện tranh'),
(3, 'Sách thiếu nhi'),
(4, 'Sách nấu ăn'),
(5, 'Sách khoa học'),
(6, 'Sách giáo khoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `diachi`, `sodt`, `level`) VALUES
(1, 'admin', 'admin', 'Hà Nội', '0336048808', 1),
(4, 'jennie', '123', 'Korea', '123321', 2),
(5, 'jisoo', '123', 'Korea', '22321', 2),
(8, 'lisa', '123', 'Hà Nội', '0386580505', 2),
(9, 'rose', '123', 'Hà Nội', '123456789', 2),
(10, 'tom', '123', 'Hà Nội', '123', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  ADD PRIMARY KEY (`id_muahang`,`id_sach`),
  ADD KEY `FK_ctmuahang_id_sach` (`id_sach`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `FK_giohang_id_user` (`id_user`),
  ADD KEY `FK_giohang_id_sach` (`id_sach`);

--
-- Chỉ mục cho bảng `muahang`
--
ALTER TABLE `muahang`
  ADD PRIMARY KEY (`id_muahang`),
  ADD KEY `FK_muahang_id_user` (`id_user`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id_sach`),
  ADD KEY `FK_sach_id_theloai` (`id_theloai`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `muahang`
--
ALTER TABLE `muahang`
  MODIFY `id_muahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id_theloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  ADD CONSTRAINT `FK_ctmuahang_id_muahang` FOREIGN KEY (`id_muahang`) REFERENCES `muahang` (`id_muahang`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ctmuahang_id_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_giohang_id_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`),
  ADD CONSTRAINT `FK_giohang_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `muahang`
--
ALTER TABLE `muahang`
  ADD CONSTRAINT `FK_muahang_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `FK_sach_id_theloai` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id_theloai`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
