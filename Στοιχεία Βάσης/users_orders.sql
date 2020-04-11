create database users_orders;
use users_orders;

create table products1 (
item_code varchar(20) not null,
item_name varchar(150) not null,
description text,
category varchar(50),
quantity SMALLINT not null,
price DECIMAL(7,2),
imagename varchar(50),
color varchar(50),
primary key (item_code));


create table cart1 (
cart_sess char(50) not null,
cart_itemcode varchar(20) not null,
cart_quantity SMALLINT not null,
cart_item_name varchar(100),
cart_price DECIMAL(7,2),
item_code varchar(20) not null);



create table orders1 (
order_no varchar(50) not null,
order_date date,
email_address varchar(50),
customer_name varchar(50),
shipping_address_line1 varchar(255),
shipping_address_line2 varchar(255),
shipping_city varchar(50),
shipping_state varchar(50),
shipping_country varchar(50),
shipping_zipcode varchar(10),
primary key (order_no));


create table orders_details1 (
order_no varchar(50) not null,
item_code varchar(20) not null,
item_name varchar(100) not null,
quantity SMALLINT not null,
price DECIMAL(7,2),
email_address varchar(50) not null
);


create table payment_details1 (
order_no varchar(50) not null,
order_date date,
amount_paid DECIMAL(7,2),
email_address varchar(50),
customer_name varchar(50),
payment_type varchar(20),
name_on_card varchar(30),
card_number varchar(20),
expiration_date varchar(10),
expiration_date1 varchar(10)
);
