drop database photo_auctions;

create database photo_auctions;

use photo_auctions;

create table member (
 mid int(10) not null AUTO_INCREMENT,
 email varchar(40) not null,
 fname varchar(20) not null,
 lname varchar(20) not null,
 street varchar(50) not null,
 city varchar(30) not null,
 state varchar(20) not null,
 zip int(5) not null,
 phone varchar(12),
 password varchar(20),
 primary key (mid)
);

ALTER TABLE member AUTO_INCREMENT = 100;

create table category (
 cname varchar(50),
 primary key(cname)
);

create table item (
 ino int(5) not null AUTO_INCREMENT,
 title varchar(128) not null,
 category varchar(50) not null,
 description varchar(2000),
 openDateTime date,
 sellerId int(10) not null,
 startingBid int not null,
 bidIncrement int not null,
 closeDateTime Date,
 winnerId int(10),
 primary key(ino),
 foreign key(category) REFERENCES category(cname),
 foreign key(sellerId) REFERENCES member(mid),
 foreign key(winnerId) REFERENCES member(mid)
);

ALTER TABLE item AUTO_INCREMENT = 1000;

create table bid (
 ino int(5),
 buyerId int(10),
 bidPrice int,
 timeOfBid date,
 primary key(ino,buyerId,timeOfBid),
 foreign key(ino) REFERENCES item(ino),
 foreign key(buyerId) REFERENCES member(mid)
);

create table rating (
 ino int(5),
 buyerRating int(1) check (buyerRating between 1 and 5),
 buyerComment varchar(100),
 sellerRating int(1) check (sellerRating between 1 and 5),
 sellerComment varchar(100),
 primary key(ino),
 foreign key(ino) REFERENCES item(ino)
);

create table images(
ino int(5),
image varchar(100),
primary key(ino),
foreign key(ino) REFERENCES item(ino)
);

insert into member values
 ('100','visualofupal@gmail.com','Upal','Patel','101 Los Angeles Ave','Los Angeles','CA',90001,
 '213-310-1111','vou123');

insert into category values ('Urban:City');
insert into category values ('Urban:Bokeh');
insert into category values ('Landscape:Sunsets');
insert into category values ('Portrait:Portraits');
insert into item values
 (1000,'LA Sunset','Landscape:Sunsets','Excellent 
 Best Seller: Upal Patel',
 STR_TO_DATE("April 21 2018", "%M %d %Y"),
 100,20.00,2.00,
 STR_TO_DATE("April 28 2020", "%M %d %Y"),
 null);