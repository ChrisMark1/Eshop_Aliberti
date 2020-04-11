
create database customers;
use customers;


create table comm_form (
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  phone int(15) NOT NULL,
  message text NOT NULL
);

create table  user_identities (
  email_address varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  complete_name varchar(50) NOT NULL,
  address_line1 varchar(255) NOT NULL,
  address_line2 varchar(255) NOT NULL,
  city varchar(50) NOT NULL,
  state varchar(50) NOT NULL,
  zipcode varchar(10) NOT NULL,
  country varchar(50) NOT NULL,
  cellphone_no varchar(15) NOT NULL,
  primary key (email_address));

