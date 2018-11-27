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

create table videodata
(
	Id int auto_increment
		primary key,
	Name text not null,
	Height double not null,
	Width double not null,
	Signature text not null,
	PublicId text not null,
	Url text not null,
	SecureUrl text not null,
	Format text not null,
	ResourceType text not null,
	Duration double not null
)
;
INSERT INTO hackdb.videodata (Id, Name, Height, Width, Signature, PublicId, Url, SecureUrl, Format, ResourceType, Duration) VALUES (1, 'Coca cola Production', 200, 200, '58dc881a4b04622a14727f4b3cbe2a25e1ab843b', 'videos/cocacolavi', 'http://res.cloudinary.com/wendolin/video/upload/v1543272736/videos/cocacolavi.mp4', 'https://res.cloudinary.com/wendolin/video/upload/v1543272736/videos/cocacolavi.mp4', 'mp4', 'video', 10.011);

create table imagedata
(
	Id int auto_increment
		primary key,
	Name text not null,
	Height double not null,
	Width double not null,
	Signature text not null,
	PublicId text not null,
	Url text not null,
	SecureUrl text not null,
	Format text not null,
	ResourceType text not null
)
;

INSERT INTO hackdb.imagedata (Id, Name, Height, Width, Signature, PublicId, Url, SecureUrl, Format, ResourceType) VALUES (1, 'web/cy.jp', 200, 200, 'dcc6747ddef787d3f8af8c3d402f4d15204b31ef', 'web/cy.jp', 'http://res.cloudinary.com/wendolin/image/upload/v1542901311/web/cy.jp.jpg', 'https://res.cloudinary.com/wendolin/image/upload/v1542901311/web/cy.jp.jpg', 'jpg', 'image');
INSERT INTO hackdb.imagedata (Id, Name, Height, Width, Signature, PublicId, Url, SecureUrl, Format, ResourceType) VALUES (2, 'web/cy.jp', 200, 200, 'dcc6747ddef787d3f8af8c3d402f4d15204b31ef', 'web/cy.jp', 'http://res.cloudinary.com/wendolin/image/upload/v1542901311/web/cy.jp.jpg', 'https://res.cloudinary.com/wendolin/image/upload/v1542901311/web/cy.jp.jpg', 'jpg', 'image');

create table products(
	Id int auto_increment,
	Name text not null,
	Price double not null,
	ImgUrl double not null,
	Content text not null,
	Implication text not null,
	Reviews text not null,
	PublicId text not null,
	primary key (id)
);