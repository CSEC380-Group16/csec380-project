-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2016 at 07:35 PM
-- Server version: 5.5.52
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE users (
  user_id   INT UNSIGNED AUTO_INCREMENT,
  username VARCHAR(15),
  password  VARCHAR(64),

  CONSTRAINT users_user_id_pk PRIMARY KEY(user_id)
);


CREATE TABLE videos (
  video_id    INT UNSIGNED AUTO_INCREMENT,
  video_name  VARCHAR(50),
  user_id     INT UNSIGNED,

  CONSTRAINT videos_video_id_pk PRIMARY KEY(video_id),
  CONSTRAINT videos_user_id_fk FOREIGN KEY(user_id) REFERENCES users(user_id)
);


CREATE TABLE sessions (
  session_id  VARCHAR(32),
  user_id     INT UNSIGNED,

  CONSTRAINT sessions_session_id_pk PRIMARY KEY(session_id),
  CONSTRAINT sessions_user_id_fk FOREIGN KEY(user_id) REFERENCES users(user_id)
);

-- Populate with test users
INSERT INTO users(username, password) VALUES('test','password');