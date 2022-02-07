CREATE DATABASE veer
    CHARACTER SET utf8
    COLLATE utf8_general_ci;
USE veer;

CREATE TABLE redirects
(
    id   INT PRIMARY KEY AUTO_INCREMENT,
    request_from    VARCHAR NOT NULL,
    ip_address    VARCHAR(15) NOT NULL,
    device     VARCHAR(100) NOT NULL,
    platform        VARCHAR(100) NOT NULL,
    software      VARCHAR(100) NOT NULL,
    event_date TIMESTAMP
);