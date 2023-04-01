-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 02:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frutika`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `displayname` varchar(100) NOT NULL,
  `photo` text NOT NULL DEFAULT 'default-user.png',
  `gender` int(11) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `displayname`, `photo`, `gender`, `email`, `password`, `role`, `status`, `token`) VALUES
(2, 'nam123', 'Nguyễn Duy Nam', 'be3da5ec7a81d2bc2b96c7e0242e8cf4.jpg', 2, 'nam@gmail.com', '1', 1, 1, 'user_640714e6423304.03505420'),
(3, 'lanlinh', 'Nguyễn Lan Linh', 'default-user.png', 0, 'lanlinh@gmail.com', '0', 0, 1, 'user_6386a8601a9000.45651476'),
(4, 'huyvan', 'Văn Khắc Huy', 'download.jpg', 1, 'huyvk@gmail.com', '0', 1, 0, 'user_636270d81ad5f0.53080306'),
(6, 'botchan', 'Nguyen Thi Bot', 'download-1.jpg', 0, 'bot@gmail.com', '0', 0, 0, ''),
(9, 'fghgfh', 'gfhgf', 'default-user.png', 0, 'fdg@gmail.com', '0', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Chanh'),
(6, 'Chuối'),
(2, 'Dâu tây'),
(1, 'Dưa '),
(4, 'Thanh long');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` text NOT NULL DEFAULT 'customer-default.png',
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `phone_number` char(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `photo`, `email`, `password`, `token`, `phone_number`, `address`) VALUES
(1, 'Nguyễn Hạ Chị', 'f13b284608abc1ced0bc7a24853f9390.jpg', 'namdev.epu.edu.vn@gmail.com', '123', 'user_63ac060d0faef8.05984361', '2345678901', 'Hưng Yên'),
(2, 'Lê Thị Ban Mai', 'customer-default.png', 'maimoi@gmail.com', '1234', 'user_639e40bd8b2a41.58408975', '324535439574983', 'Hồ Chí Minh'),
(5, 'Nguyễn Du Ca', 'customer-default.png', 'ducachin@gmail.com', '123', 'user_631064455aeb04.78344312', '0123456789', 'Hà Đông, Hà Nội'),
(6, 'namolis', 'customer-default.png', 'namolis241@gmail.com', 'banBan@123.', NULL, '123', 'Yên Lãng'),
(12, 'Nguyễn Linh Lan', 'customer-default.png', 'linhlan@gmail.com', '34546546', NULL, '34324', 'Sóc Trăng'),
(13, 'Nguyễn Bớt Chan', 'customer-default.png', 'botchan@gmail.com', '325436', NULL, '03593465743', 'Hà Nội'),
(14, 'Nguyễn fuu chan', 'customer-default.png', 'fuu@gmail.com', '445764', NULL, '654657', 'Hà Nam'),
(15, 'Nguyễn lam em', 'customer-default.png', 'lamem@gmail.com', '445764e', NULL, '6546545656', 'Cầu giấy'),
(16, 'Nguyễn lam anh', 'customer-default.png', 'lamanh@gmail.com', '445764e', NULL, '34235465', 'Cầu giấy'),
(17, 'Phạm Hoa Hồng', 'customer-default.png', 'rose@gmail.com', '436546', NULL, '25436546', 'Phú Thọ'),
(19, 'Nguyễn Ngọc', 'customer-default.png', 'ngoc@gmail.com', '5466567676', NULL, '0123456789', 'Yên Lãng'),
(21, 'Lan', 'customer-default.png', 'lan@gmail.com', '54345646', NULL, '25667576576', 'Thái Bình'),
(22, 'Hoàng Quỳnh', 'customer-default.png', 'quynh@gmail.com', '12345', 'user_637af767a3ad63.06622763', '1234567890', 'Hà Giang'),
(23, 'nguyễn thùy tiên', 'customer-default.png', 'tien@gmail.com', '123', 'user_637af83055f588.26501816', '0123456789', 'Nam Định');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`customer_id`, `token`, `create_at`) VALUES
(1, '639ddbc66269a', '2022-12-17 15:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(50) NOT NULL,
  `phone_receiver` char(20) NOT NULL,
  `address_receiver` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `totalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `create_at`, `totalPrice`) VALUES
(11, 1, 'Nguyễn Hạ Chị', '2345678901', 'Hưng Yên', 1, '2022-11-29 13:35:02', 436000),
(12, 1, 'Nguyễn Hạ Chị', '2345678901', 'Hưng Yên', 2, '2022-12-16 05:04:01', 1224000),
(13, 1, 'Nguyễn Hạ Chị', '2345678901', 'Công Ty sunny Hà Đông', 0, '2022-11-28 14:10:22', 786000),
(14, 2, 'Lê Thị Ban Mai', '324535439574983', 'Hồ Chí Minh', 0, '2022-11-30 00:28:57', 144000),
(15, 1, 'Nguyễn Hạ Chị', '2345678901', 'Hưng Yên', 0, '2022-11-30 03:32:09', 58000),
(16, 1, 'Nguyễn Hạ Chị', '2345678901', 'Thái Bình', 0, '2022-12-14 04:28:13', 232000),
(17, 1, 'Nguyễn Hạ Chị', '2345678901', 'Hưng Yên', 0, '2022-12-17 04:10:05', 436000),
(18, 2, 'Lê Thị Ban Mai', '324535439574983', 'Hồ Chí Minh', 0, '2022-12-18 00:04:10', 144000),
(19, 1, 'Nguyễn Hạ Chị', '2345678901', 'Hưng Yên', 0, '2022-12-28 09:06:39', 86000),
(20, 1, 'Nguyễn Hạ Chị', '2345678901', 'Hưng Yên', 0, '2023-03-07 10:37:10', 232000);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(11, 1, 1),
(11, 2, 1),
(11, 3, 1),
(12, 1, 3),
(12, 3, 1),
(12, 4, 1),
(13, 1, 1),
(13, 2, 1),
(13, 3, 2),
(14, 1, 2),
(14, 2, 1),
(15, 1, 1),
(16, 1, 4),
(17, 1, 1),
(17, 2, 1),
(17, 3, 1),
(18, 1, 2),
(18, 2, 1),
(19, 1, 1),
(19, 2, 1),
(20, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `content` text NOT NULL DEFAULT 'chưa có nội dung',
  `photo` text NOT NULL DEFAULT 'default-news.jpg',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` varchar(200) NOT NULL DEFAULT 'chưa có'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `url`, `content`, `photo`, `create_at`, `tags`) VALUES
(1, 'Tác Dụng Của Dâu Tây Trong Làm Đẹp', 'tac-dung-cua-dau-tay-trong-lam-dep', 'Dâu tây là một trong những loại quả thơm ngon và cực kỳ bổ dưỡng. Nó đã mê hoặc rất nhiều chị em bởi hương thơm quyến rũ và vị ngọt đặc trưng, gây ấn tượng khó quên với những ai từng sử dụng. Bên cạnh đó, tác dụng của dâu tây trong làm đẹp cũng rất thần kỳ.\r\n\r\nVới loại trái cây này, bạn có thể có tất cả những công thức chăm sóc sắc đẹp toàn diện từ dưỡng da đến giảm cân hiệu quả. Đặc biệt, khi phối hợp khéo léo với các nguyên liệu khác, công dụng của dâu tây làm đẹp sẽ khiến bạn phải bất ngờ không kém gì những phương pháp trị liệu đắt đỏ ở các trung tâm thẩm mỹ cao cấp.\r\n\r\nCông dụng chống lão hóa\r\n– Với thành phần vitamin A, vitamin E, C, B…và khoáng chất dồi dào, cùng với các hợp chất chống oxi hóa, tác dụng của dâu tây trong làm đẹp thật tuyệt vời để ngăn chặn các dấu hiệu lão hóa.\r\n\r\n– Bên cạnh việc ăn trực tiếp, bạn có thể làm mặt nạ chuối dâu với công dụng gấp đôi, giúp bạn có làn da mịn màng, khỏe mạnh.\r\n\r\ndau-tay-lam-dep-da-dep-dang\r\n\r\n– Cách làm: Lấy 2 trái dâu và 1 quả chuối chín xay nhuyễn cùng 2 thìa mật ong nguyên chất. Đắp mặt nạ này lên da và mát-xa khoảng 20 phút rồi rửa sạch lại bằng nước ấm. Bạn sẽ bất ngờ với kết quả sau 7 ngày kiên trì  áp dụng phương pháp này hàng ngày.\r\n\r\nCông dụng trị mụn\r\n– Tác dụng của dâu tây đối với da giúp tiêu diệt các nhân mụn sâu dưới da hiệu quả bởi có thành phần axit saxylic cho làn da láng mịn khỏe mạnh. Đặc biệt, bạn có thể kết hợp với sữa chua để làm mặt nạ sữa chua dâu để tăng nhanh hiệu quả.\r\n\r\n– Cách làm: Trộn ½ hộp sữa chua không đường với 2 trái dâu nghiền nhuyễn, thêm 3 giọt cốt chanh, 1 thìa mật ong. Đắp mặt nạ này lên vùng da bị mụn, để khô trong 20 phút để da hấp thụ dưỡng chất. Các chất dinh dưỡng có trong sữa chua, chanh, mật ong giúp sát khuẩn, giảm vết thâm, các chất dinh dưỡng trong hỗn hợp giúp phục hồi các tổn thương do mụn.  Tác dụng của dâu tây giúp bạn có một làn da hồng hào láng mịn.\r\n\r\n Giúp da kháng dầu hiệu quả\r\n– Da nhiều dầu là nguyên nhân gây ra mụn trứng cá, mụn đầu đen…Nếu bạn thuộc nhóm người có loại da này thì cần có một chế độ chăm sóc da khoa học, loại bỏ dầu trên da, phòng tránh mụn.  Trong đó các mặt nạ từ thiên nhiên là một phương pháp rẻ tiền mà hiệu quả. Tác dụng của dâu tây trong làm đẹp sẽ giúp bạn thanh lọc độc tố, loại bỏ bã nhờn, giúp làn da láng mịn.\r\n\r\nSweet fresh stawberry on the wooden table, selective focus\r\n\r\nCách làm:\r\n\r\n– Trộn đều 2 quả dâu nghiền nhuyễn với nửa hộp sữa chua không đường, bôi hỗn hợp lên mặt, để khô trong 15 phút rồi rửa sạch bằng nước ấm. Mặt nạ sẽ giúp làn da khô ráo hơn, trị mụn và vết thâm hiệu quả.\r\n\r\n– Mặt nạ dâu, bột mì, mật ong: nghiễn nhuyễn 2 trái dâu cùng với 1 thìa mật ong nguyên chất và 1 thìa bột mỳ. Bôi hỗn hợp lên mặt trong 20 phút và rửa sạch lại bằng nước ấm. Trong khi nguồn vitamin C khiến tác dụng của dâu tây giúp làn da căng bóng mịn màng thì mật ong có công dụng sát khuẩn chống lên mụn, bột mỳ hút dầu cho làn da khô ráo.\r\n\r\n Tác dụng làm đẹp tóc\r\n– Trong loại trái cây này có nhiều vitamin C là chất kích thích sản xuất collagen giúp mái tóc sáng bóng và khỏe mạnh, không bị khô, chẻ ngọn. Để tác dụng của dâu tây trong làm đẹp mái tóc có hiệu quả cao, bạn cần thực hiện như sau:\r\n\r\n– Xay 5 trái dây tây cho nhuyễn rồi trộn với 1 thìa café dầu dừa, 1 thìa café mật ong. Gội đầu bằng dầu gội và xả sạch với nước, lau qua cho bớt nước. Thoa hỗn hợp đã xay lên tóc rồi mát-xa nhẹ nhàng 15 phút, sau đó dùng khăn ủ 15 phút cho các chất dinh dưỡng thấm sâu vào nuôi dưỡng mái tóc chắc khỏe. Gội đầu nước nước lạnh sau khi ủ xong.\r\n\r\n– Ích lợi của dâu tây và mật ong, dầu dừa giúp tẩy sạch da chết, trị gầu và giúp mái tóc chắc khỏe, suôn mượt.\r\n\r\nGiúp giảm cân\r\n– Lợi ích của trái dâu tây trong việc giảm trọng lượng cơ thể đã được các nhà khoa học Mỹ chứng minh với 100 phụ nữ sử dụng thực đơn giảm cân với trái cây nhập khẩu này trong 3 tháng. Kết quả cho thấy những người thường xuyên sử dụng loại trái cây này có trọng lượng giảm tới 25%. Do thành phần của loại quả này có nhiều chất xơ, vitamin và các acid amin, có công dụng bất ngờ giúp cơ thể giảm cân hiệu quả.\r\n\r\nGiúp làm trắng răng\r\n– Do trong loại quả này có chứa axit ellagic, axit malic và citric là những hợp chất giúp tẩy sạch những mảng bám trên răng, làm trắng răng hiệu quả, tác dụng của dâu tây cho bạn một hàm răng trắng sáng để tự tin với nụ cười rạng rỡ.\r\n\r\n– Như vậy là bạn đã biết những tác dụng của dâu tây trong làm đẹp thật tuyệt vời phải không? Hiện nay bạn có thể dễ dàng mua loại quả này tại các cửa hàng hoa quả nhập khẩu Hà Nội hoặc siêu thị. Tuy nhiên bạn cần thận trọng phân biệt trái cây Trung Quốc với các sản phẩm nhập khẩu để đảm bảo an toàn vệ sinh thực phẩm.\r\n\r\nChúc bạn có những trải nghiệm làm đẹp thú vị cùng loại trái cây này!', 'bai-viet-1.jpg', '2022-10-14 15:03:15', 'dâu tây'),
(2, '6 loại trái cây làm trắng da và giảm cân càng ăn càng đẹp', '6-loai-trai-cay-lam-trang-da-va-giam-can-cang-an-cang-dep', 'Trong tự nhiên có rất nhiều loại quả tốt cho sức khỏe. Những loại trái cây làm trắng da và giảm cân sẽ hỗ trợ bạn chăm sóc vóc dáng và làn da tốt nhất.\r\n\r\nTrái cây làm trắng da và giảm cân bao gồm các loại cực quen thuộc với mọi nhà. Chúng không hề khó tìm và công dụng cho sức khỏe thì tốt khỏi phải nói. Chưa kể nếu tiêu thụ nhiều còn khiến bạn càng ngày càng đẹp ra. Nhất dáng nhì da vẫn là tiêu chí đánh giá cái đẹp của đa số chị em phụ nữ. Vóc dáng thon gọn như ý cùng làn da trắng hồng mịn màng sẽ không còn là mơ ước của nhiều chị em nữa. Các loại trái cây làm trắng da và giảm cân sẽ giúp bạn!\r\n\r\nBạn luôn thiếu tự tin vì vóc dáng ngấn mỡ?\r\nBạn luôn ngại tiếp xúc vì làn da sần sùi không đều màu?\r\nBạn muốn tìm kiếm phương pháp chăm sóc cả dáng lẫn da?\r\nCó những loại trái cây có thể giúp bạn tiêu diệt triệt để cả hai vấn đề trên luôn đấy. Tập thói quen sử dụng chúng và đưa vào thực đơn hàng ngày nhé. Chúng còn có thể biến hóa thành các loại mặt nạ giúp bạn chăm sóc da cả trong lẫn ngoài. Thật tiện lợi phải không nào.\r\n\r\n<b>1. Quả Táo</b>\r\nTáo là loại quả có thể cung cấp collagen tự nhiên cho cơ thể, giúp ngăn ngừa lão hóa da. Hơn nữa các vết nám trên da cũng được loại bỏ, cho làn da trắng sáng đều màu. Giảm cân Giàu chất xơ, lượng calo thấp nên chúng rất có ích trong việc giảm cân. Nếu bạn đang thực hiện giảm cân và cảm thấy đói thường xuyên, hãy tiêu thụ táo ngay nhé!\r\n\r\ntao-lam-dep-da-dep-dang\r\n\r\n<b>2. Trái Cây Họ Cam , Chanh</b>\r\nĐây là dòng trái cây giàu Vitamin, Thianin và Folate giúp bạn trị mụn hiệu quả, loại bỏ đi những vết thâm nám. Cho bạn làn da trắng sáng đều màu và khỏe mạnh từ sâu bên trong. Giảm cân Đây là những nguyên liệu tuyệt vời làm nên nước detox giảm cân cực kì hiệu quả. Nước detox từ chúng chứa D-Limonene giúp loại bỏ độc tố, thúc đẩy tiêu hóa và hỗ trợ giảm cân.\r\n\r\nCà Chua\r\nGiàu Vitamin A, C và các beta- carotene giúp làm đẹp da. Tiêu thụ cà chua sẽ nhanh chóng sở hữu làn da trắng sáng và căng mịn đẹp rạng rỡ. Giảm cân Cà chua chứa lượng calo thấp, lượng đường citric và các acid có trong chúng giúp hấp thụ chất béo dư thừa và hỗ trợ giảm cân hiệu quả.ca-chua-giup-lam-dep-da-dep-dang\r\n\r\n<b>3. Dưa Chuột</b>\r\nDưa chuột giàu vitamin và có tính dưỡng ẩm cho da. Sử dụng mặt nạ và tiêu thụ dưa chuột cũng giúp làn da giảm thâm nám, làm dịu da cháy nắng. Da sẽ trở nên trắng sáng đều màu. Giảm cân Lượng vitamin C trong cơ thể giúp thúc đẩy tiêu hóa, hỗ trợ giảm cân. Trong dưa chuột cũng chưa ít calo và đường.. Quả mọng nước nên bạn có thể tiêu thụ khi đói nhưng vẫn đảm bảo quá trình giảm cân.\r\n\r\n<b>4. Đu Đủ</b>\r\nDưa chuột giàu vitamin và có tính dưỡng ẩm cho da. Sử dụng mặt nạ và tiêu thụ dưa chuột cũng giúp làn da giảm thâm nám, làm dịu da cháy nắng. Da sẽ trở nên trắng sáng đều màu. Giảm cân Lượng vitamin C trong cơ thể giúp thúc đẩy tiêu hóa, hỗ trợ giảm cân. Trong dưa chuột cũng chưa ít calo và đường.. Quả mọng nước nên bạn có thể tiêu thụ khi đói nhưng vẫn đảm bảo quá trình giảm cân.\r\n\r\n<b>5. Dâu Tây</b>\r\nDâu tây là một nguồn dồi dào cung cấp các Vitamin như Vitamin A, Vitamin C cho làn da trắng sáng tự nhiên. Chúng còn cung cấp nhiều khoáng chất cho làn da trở nên căng mịn. Giảm cân Tiêu thụ dâu tây giúp thúc đẩy sản xuất hóc-môn Adiponectin và Leptin. Những loại hormone tuyệt vời này giúp đốt cháy chất béo và tăng cường trao đổi chất cho cơ thể, hỗ trợ giảm cân.', 'bai-viet-2.jpg', '2022-10-14 15:13:10', 'trái cây, dâu tây'),
(3, '6 Lợi Ích Tuyệt Vời Của Việc Ăn Trái Cây Tươi Hàng Ngày', '6-loi-ich-tuyet-voi-cua-viec-an-trai-cay-tuoi-hang-ngay', 'Trái cây có rất nhiều chất dinh dưỡng, chất xơ và các vitamin nên nó sẽ giúp bạn khỏe mạnh cả về thể chất lẫn tinh thần, giảm nguy cơ mắc bệnh tật.\r\n\r\nBổ sung trái cây vào chế độ ăn uống hàng ngày sẽ đem lại những lợi ích sức khỏe tuyệt vời. Có nhiều lý do để bạn ăn trái cây mỗi ngày, nhưng hãy nhớ rằng tiêu thụ trái cây tươi sẽ tốt hơn nhiều so với các loại trái cây bảo quản hay đóng hộp.\r\n\r\nTrái cây là chất xơ phong phú và nó có lượng calo thấp nên nó cũng đặc biệt có lợi cho những người muốn giảm cân mà vẫn tràn đầy năng lượng.\r\n\r\nDưới đây là 5 lợi ích của việc ăn trái cây tươi hàng ngày:\r\n\r\nTránh ung thư\r\n\r\nTheo Tổ chức Y tế Thế giới, chế độ ăn uống bao gồm 5 phần trái cây mỗi ngày có thể giúp giảm sự phát triển của bệnh ung thư đi.\r\n\r\nNhiều nghiên cứu nhận thấy rằng hầu hết các bệnh ung thư phát triển là do thiếu hụt các chất dinh dưỡng nhất định. Các loại quả mọng và cà chua là những loại trái cây giàu chất chống oxy hóa nên sẽ có khả năng chiến đấu chống lại bệnh ung thư hiệu quả.\r\n\r\nld3\r\n\r\nNgăn chặn các bệnh mãn tính\r\n\r\nMột trong những lý do để bạn ăn trái cây hàng ngày là ngăn ngừa các bệnh tim mãn tính. Trái cây chứa ít calo và là một nguồn tuyệt vời của vitamin, khoáng chất.\r\n\r\nTrái cây đồng thời chứa chống oxy hóa và axit folic nên giúp làm giảm huyết áp, tránh bệnh tim mạch. Táo, cam và chuối là những siêu trái cây cho bạn một trái tim khỏe mạnh.\r\n\r\nTăng cường trí não\r\n\r\nTrong một nghiên cứu, các nhà khoa học thấy rằng ăn quả việt quất có thể tăng cường trí nhớ của bạn. Các bệnh liên quan đến suy giảm trí nhớ thường liên quan đến tuổi tác, nhưng điều may mắn là bệnh có thể được ngăn ngừa bằng cách tiêu thụ các loại trái cây trong chế độ ăn uống hàng ngày.\r\n\r\nQuả việt quất có chất dinh dưỡng giúp phát triển các tế bào não mới để ngăn chặn suy giảm trí nhớ. Đây là một trong những lý do tại sao bạn nên ăn loại quả này mỗi ngày.\r\n\r\nGiảm cân\r\n\r\nThay thế đồ ăn chứa dầu mỡ bằng các loại trái cây là một quyết định vô cùng thông minh. Ăn trai cây vào bữa ăn nhẹ giữa các bữa ăn chính sẽ giúp bạn no hơn, lại tránh được nguy cơ ăn nhiều, do vậy cũng làm giảm nguy cơ tăng cân.\r\n\r\nLàm đẹp da\r\n\r\nBạn muốn có một làn da sáng, vậy thì đừng hỏi tại sao bạn nên ăn trái cây mỗi ngày. Hầu hết các loại trái cây, đặc biệt là bơ, có một số lượng lớn các vitamin E có khả năng làm chậm tốc độ lão hóa và giúp da sáng đẹp.\r\n\r\nTăng cường miễn dịch\r\n\r\nMột số loại trái cây có một sự kết hợp tuyệt vời của vitamin C, vitamin A và các loại carotenoid (một dạng chất chống oxy hóa)… nhờ đó nó dễ dàng góp phần tăng sức mạnh hệ miễn dịch của bạn. Trái cây như xoài là sự lựa chọn tốt nhất cho bạn.\r\n\r\nTrái cây có thể được gọi là siêu thực phẩm cho bạn khỏe mạnh, xinh đẹp, trẻ trung, hạnh phúc và yêu đời. Vậy thì còn chờ gì nữa mà không chọn các loại trái cây bạn thích để bổ sung trong chế độ ăn uống hàng ngày của bạn.', 'bai-viet-3.jpg', '2022-10-08 14:10:07', 'chưa có'),
(4, 'ĂN TRÁI CÂY SAI CÁCH KHIẾN \"CHUYỆN TỐT HÓA XẤU\"', 'an-trai-cay-sai-cach-khien-chuyen-tot-hoa-xau', 'KHÔNG PHẢI CỨ ĂN NHIỀU TRÁI CÂY LÀ SẼ ĐẸP DA, MÀ BẠN PHẢI BIẾT SỬ DỤNG TRÁI CÂY ĐÚNG CÁCH NỮA!\r\nTrái cây/hoa quả là thực phẩm không thể thiếu trong các chế độ ăn kiêng và dưỡng da. Chúng ta đều biết rằng ăn nhiều trái cây, rau xanh sẽ cung cấp một lượng lớn vitamin C giúp da trắng sách, sạch mụn,. Tuy nhiên, khi ăn trái cây, chúng ta thường gặp các lỗi cơ bản sau khiến loại thưc phẩm này mất hết chất bổ dưỡng:\r\n\r\nĂn như một món tráng miệng sau bữa chính\r\n\r\nSử dụng trái cây để tráng miệng sau bữa cơm là điều rất bình thường phải không? Thực tế thì theo nhiều nghiên cứu, ăn trái cây vào lúc đói mới tốt nhất. Nguyên do là bởi trái cây thường tiêu hóa nhanh hơn thức ăn. Thay vì đi thẳng vào đường ruột, trái cây sẽ bị cơm, mì, bánh mì… \"chặn đứng\". Trong khoảng thời gian trì trệ đó, thức ăn cùng trái cây đều lên men và chuyển hóa thành axit, khiến bạn có cảm giác đau hoặc xót bụng.\r\n\r\nNoài ra, nhiều nghiên cứu chỉ ra rằng trong hoa quả có chứa nhiều carbonhydrate cùng lượng tinh bột cao, là những chất làm chậm quá trình tiêu hóa. Việc ăn ngay sau bữa cơm sẽ khiến trái cây bị tích tụ gây tăng thêm gánh nặng cho dạ dày, đường ruột và tuyến tụy dẫn đến chướng khí, táo bón… Hơn thế nữa, nếu ăn cơm no rồi ăn thêm trái cây ngọt thì lượng đường tổng cộng trong bữa ăn sẽ rất cao, gây tăng đường huyết, không có lợi cho sức khỏe, nhất là với những người bị tiểu đường. Chúng ta nên ăn trái cây một giờ trước hoặc sau bữa ăn để cơ thể có thời gian hấp thu các loại vitamin và khoáng chất.  \r\n\r\nĂn trái cây sai cách khiến chuyện tốt hóa xấu - Ảnh 1.\r\n \r\n\r\nLời khuyên cho bạn là nên sử dụng trái cây trước bữa ăn. Bạn không cần quá lo lắng về các loại trái cây chua như cam, bưởi… bởi thực tế những loại trái cây này khi đi vào cơ thể đều chuyển hóa thành kiềm. Bạn chỉ cần nhớ không bỏ đói cơ thể sau khi ăn trái cây là được!\r\n\r\nĐể quá lâu sau khi gọt vỏ\r\n\r\nHoa quả đã gọt vỏ, bổ thành từng miếng nhỏ hay nước quả ép để càng lâu sẽ càng mất đi nhiều vitamin và chất dinh dưỡng. Vì vậy trái cây sau khi chế biến cần được ăn ngay để đảm bảo sự thơm ngon cũng như dưỡng chất. Nếu buộc phải bổ hoa quả từ rất lâu trước khi dùng, chúng nên ngâm quả vào dung dịch nước muối nhạt (1%) để giữ lượng vitamin C có trong quả.\r\n\r\nChỉ dùng nước ép\r\n\r\nNhiều người có thói quen ép nước hoa quả để uống với suy nghĩ tận dụng phần tinh túy nhất của trái cây. Thực chất thì nước ép đã mất đi một lượng chất xơ dồi dào – yếu tố chính giúp đường tiêu hóa của bạn khỏe mạnh. Do đó, thay vì chỉ dùng nước ép, bạn hãy ưu tên việc ăn trái cây tươi nhé.\r\n\r\nNếu uống nước ép, hãy uống từng ngụm nhỏ và từ từ để nước bọt hòa với nước ép, giúp quá trình hấp thu dưỡng chất thuận lợi và hiệu quả hơn.\r\n\r\nĂn trái cây sai cách khiến chuyện tốt hóa xấu - Ảnh 2.\r\n \r\n\r\nChế biến trái cây\r\n\r\nTrái cây khi bị nấu chín, đun nóng hoặc sấy khô đều mất gần hết chất bổ và chỉ còn lại hương vị. Các loại chè, xôi… sử dụng trái cây đều không có nhiều dưỡng chất. Bạn cũng không nên hâm nóng hay nấu trái cây thành món ăn nếu không muốn thực phẩm kì diệu này chỉ còn là… bã. Nếu muốn kết hợp trái cây với bữa ăn, bản chỉ nên trộn trái cây và rau củ tươi thành một bát salad thơm ngon, lưu ý là sử dụng ít các loại sốt và dầu dấm thôi nhé!', 'bai-viet-4.jpg', '2022-10-08 14:18:59', 'chưa có'),
(5, '7 loại trái cây giúp tăng cường trí nhớ hoàn hảo', '7-loai-trai-cay-giup-tang-cuong-tri-nho-hoan-hao', '1. Đu đủ\r\n\r\nKhông chỉ là một thực phẩm dinh dưỡng giàu vitamin, đu đủ còn là một thực phẩm đóng góp vào việc cải thiện tình trạng hoạt động của nhiều chức năng trong cơ thể, nhất là trong lĩnh vực tim mạch và ung thư.\r\n\r\nĂn đu đủ thường xuyên có tác dụng bổ máu, giúp hồi phục gan ở người bị sốt rét, tăng sức đề kháng cho cơ thể.\r\n\r\n \r\n\r\n2. Dưa hấu\r\n\r\nGiúp cải thiện trí nhớ tốt nhất, cung cấp vitamin C cho cơ thể, dùng giải khát chống nhiệt, chống ôxy hoá có tác dụng chống lại các bệnh tim mạch và ung thư tuyến tiền liệt... giúp kiểm soát huyết áp của cơ thể...\r\n\r\n \r\n\r\n3. Táo\r\n\r\nCác nhà khoa học Mỹ cho biết, ăn táo hoặc uống nước táo ép thường xuyên sẽ ngăn ngừa được sự phá huỷ các tế bào não, tăng cường khả năng ghi nhớ, bảo vệ các tế bào não tránh khỏi sự phá huỷ...\r\n\r\n \r\n\r\n4. Dứa\r\n\r\nNên ăn sống hoặc ép lấy nước uống. Dứa giúp thư giãn thần kinh và bảo vệ các mạch không bị nghẽn. Người huyết áp cao có thể dùng dứa dưới dạng nước ép vì Bromelin trong dứa có tác dụng làm giảm độ nhớt của máu, làm tan huyết khối và làm giảm tắc mạch cục bộ.\r\n\r\n5. Chuối\r\n\r\nChuối chứa nhiều sinh tố như A, B1, B2, B6, B12, C, D, E và các khoáng tố. Chuối rất thích hợp cho người bệnh tim mạch, cao huyết áp... Ngay khi mỏi mệt, gặp lúc đường huyết hạ thấp, chỉ cần trái chuối là xong.\r\n\r\nChuối vừa gây hiệu quả an thần nhẹ nhàng dựa trên cơ chế thư giãn, vừa thúc đẩy chức năng tư duy theo chiều hướng lạc quan yêu đời. Các thầy thuốc khuyên người dân mỗi ngày ăn hai quả chuối giúp cải thiện đáng kể thể chất của từng người.\r\n\r\n \r\n\r\n6. Lê\r\n\r\nĐược đánh giá là có tác dụng tốt cho não như chuối và táo. Lê còn dùng để chữa một số bệnh như ho, chữa bỏng, giải độc rượu, chữa nôn nấc, khó nuốt. Ăn lê tốt cho những ai đang điều trị bệnh tăng cholesterol huyết...\r\n\r\n \r\n\r\n7. Nho\r\n\r\nChất đường nho có khả năng cung cấp nguồn năng lượng hoạt động cho não bộ một cách nhanh chóng. Nho còn cung cấp carbohydrate, chất sắt, vitamin B, canxi và magiê. Đây là những chất dinh dưỡng quan trọng giúp não duy trì sinh lực.\r\n\r\n \r\n\r\nBạn nên biết:\r\n\r\n- Không nên ăn đu đủ quá nhiều có thể dẫn đến vàng da.\r\n\r\n- Ăn kiêng bằng dưa hấu giúp giảm cân và đào thải được các chất độc ra khỏi cơ thể.\r\n\r\n- Các nhà khoa học khuyên mọi người hàng ngày nên uống 2-3 chén nước táo ép hoặc ăn 2-4 quả táo sẽ có được kết quả như mong muốn.\r\n\r\n- Khi ăn dứa nên chấm muối sẽ làm giảm sự kích thích với niêm mạc miệng và lưỡi, đồng thời dứa cũng thơm, ngọt hơn.\r\n\r\n- Chuối sẽ mất hết tác dụng nếu trữ trong tủ lạnh hay ngăn đá.\r\n\r\n- Lê ăn nhiều sẽ hại tỳ vị, do đó không nên dùng cho người bị tỳ vị hư hoặc bị viêm ruột.\r\n\r\n- Nước ép nho đỏ có tác dụng xấu với người đang dùng thuốc trị tăng huyết áp thuộc nhóm đối kháng canxi.', 'bai-viet-5.jpg', '2022-10-08 14:18:59', 'chưa có');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text NOT NULL DEFAULT 'default-product.png',
  `category_id` int(11) NOT NULL,
  `short_description` varchar(200) NOT NULL DEFAULT '''\\''chưa có mô tả\\''''',
  `long_description` text NOT NULL DEFAULT 'chưa có mô tả dài',
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `category_id`, `short_description`, `long_description`, `price`) VALUES
(1, 'Dưa hấu không hạt ', 'dua-hau-2.jpg', 1, 'dưa hấu không hạt thơm ngon', '<p></p><p></p><p>chưa có mô tả dài</p><p></p><p></p>', 58000),
(2, 'Dưa hấu ruột đỏ', 'dua-hau-1.jpg', 1, 'chưa có mô tả', 'chưa có mô tả dài', 28000),
(3, 'Dâu tây Nhật', 'dau-tay-1.jpg', 2, 'chưa có mô tả', 'chưa có mô tả dài', 350000),
(4, 'Dâu anh đào Nhật', 'dau-tay-2.jpg', 2, 'chưa có mô tả', 'chưa có mô tả dài', 700000),
(5, 'Chanh dây', 'default-product.png', 3, '\'\\\'chưa có mô tả\\\'\'', 'chưa có mô tả dài', 30000),
(9, 'Chuối Mỹ', 'chuoi-gia-giong-nam-my-1kg-202012021040379843.jpg', 6, '\'\\\'chưa có mô tả\\\'\'', '<p></p><p></p><p>chưa có mô tả dài</p><p></p><p></p>', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `products_rating`
--

CREATE TABLE `products_rating` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_rating`
--

INSERT INTO `products_rating` (`product_id`, `customer_id`, `rating`, `comment`, `create_at`) VALUES
(1, 1, 4.5, 'dưa hấu này ngọt lắm', '2022-11-28 08:54:12'),
(1, 2, 5, 'ngọt lắm, ship nhanh', '2022-11-28 09:46:19'),
(2, 1, 3, 'rất ngọt', '2022-11-29 04:11:45'),
(3, 1, 4.5, 'dâu rất to và ngọt', '2022-11-29 04:24:02'),
(4, 1, 4.5, 'lần đầu tiên được ăn dâu này, rất ngon', '2022-11-29 04:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_types`
--

CREATE TABLE `role_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_types`
--

INSERT INTO `role_types` (`id`, `name`) VALUES
(0, 'nhân viên'),
(1, 'quản lý');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `classification-id` (`category_id`);

--
-- Indexes for table `products_rating`
--
ALTER TABLE `products_rating`
  ADD PRIMARY KEY (`product_id`,`customer_id`),
  ADD KEY `id_customer` (`customer_id`);

--
-- Indexes for table `role_types`
--
ALTER TABLE `role_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role_types` (`id`);

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `products_rating`
--
ALTER TABLE `products_rating`
  ADD CONSTRAINT `products_rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_rating_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
