--CREATE DATABASE PCHMI;
USE PCHMI;

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT into users (`username`, `password`) values ('user', 'user');