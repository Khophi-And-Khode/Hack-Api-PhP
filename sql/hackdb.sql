create DATABASE hackdb;

use hackdb;

create table users(
	user_id int not null auto_increment,
	username varchar(300) not null,
	email varchar(300) not null,
	password varchar(300) not null,
	mobile varchar(300) not null,
	address_1 varchar(300) not null,
	address_2 varchar(300),
	primary key (user_id)
);

create table products(
	id int not null auto_increment,
	product_title text not null,
	product_desc text not null,
	product_price double not null,
	product_image text not null,
	product_keywords text not null,
	primary key (id)
);