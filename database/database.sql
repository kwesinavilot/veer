DROP DATABASE veer;
CREATE DATABASE veer
    CHARACTER SET utf8
    COLLATE utf8_general_ci;
USE veer;

CREATE TABLE redirects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    request_from varchar(200) NOT NULL,
    ip_address varchar(15) NOT NULL,
    device varchar(100) NOT NULL,
    platform varchar(100) NOT NULL,
    software varchar(100) NOT NULL,
    event_date TIMESTAMP
);