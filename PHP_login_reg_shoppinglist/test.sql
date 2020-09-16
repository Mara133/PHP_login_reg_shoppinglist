
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `date_1` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `books` (`id`, `book_name`, `qty`, `date_1`) VALUES
(1, 'Harry Potter', 40, NULL),
(3, 'Lord Of The Ring', 100, NULL),
(5, 'Narnia', 25, NULL),
(6, 'Raven', 25, '2017-01-22 13:07:11.110259');



CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `uemail` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`) VALUES
(1, 'mara', '88bsfhj4smwddiiii44', 'mara', 'mara@gmail.com');


ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);


ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

