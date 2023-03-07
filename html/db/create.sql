-- Active: 1677761092259@@127.0.0.1@3306@innoraft

CREATE Table
  user(
    user_id varchar(10) primary key,
    email_id varchar(30) not null,
    password varchar(15) not null
  );