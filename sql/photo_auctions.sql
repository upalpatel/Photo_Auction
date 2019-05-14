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
 password varchar(100),
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
 ('100','visualsofupal@gmail.com','Upal','Patel','101 Los Angeles Ave','Los Angeles','CA',90001,
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

 insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Bradbury Building Bokeh Art','Urban:Bokeh',
'depth of field with the railing', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('LAX Traffic Lights Bokeh','Urban:Bokeh',
'composed perfectly with the airplane and the camera', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Ascot Hills Park Fence Bokeh 1','Urban:Bokeh',
'city overlook bokeh with the fence', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Ascot Hills Park Fence Bokeh 2','Urban:Bokeh',
'fence bokeh', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Ascot Hills Park Fence Bokeh 3','Urban:Bokeh',
'city overlook bokeh with the graffiti pole', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('DTLA City Rooftop Bokeh','Urban:Bokeh',
'rooftop bokeh created with a signal light', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Backyard Flower Bokeh 1','Urban:Bokeh',
'home made bokeh with jasmine flowers', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Backyard Flower Bokeh 2','Urban:Bokeh',
'home made bokeh with roses', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('DTLA City Bokeh','Urban:Bokeh',
'city bokeh with the mustang reflection', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('DTLA Park Road Drive Cityscape','Urban:City',
'long exposure traffic with city overlook', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Dodger Stadium Cityscape','Urban:City',
'views of the city from the Dodger Stadium', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('DTLA Night Cityscape','Urban:City',
'in the heart of DTLA', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Venice City Motion Expo','Urban:City',
'first ever motion expo from Venice', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('DTLA Rooftop Cityscape','Urban:City',
'views from 72nd floor of US Bank Tower', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('DTLA Helipad Cityscape','Urban:City',
'claim your territory', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Sunset Blvd LA Motion Expo','Urban:City',
'symbolic LA sign and motion expo', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Leaf Portrait 1','Portrait:Portraits',
'where the seasons do not matter', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Leaf Portrait 2','Portrait:Portraits',
'where the seasons do not matter', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Slauson Station 1','Portrait:Portraits',
'nights watch', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Slauson Station 2','Portrait:Portraits',
'let it go', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Slauson Station 3','Portrait:Portraits',
'street mobs', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('LAX Sunset','Landscape:Sunsets',
'airplane landing view point', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Venice Sunset','Landscape:Sunsets',
'skateboard, beach, & Cali sunset', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Dodger Stadium Overlook Sunset','Landscape:Sunsets',
'paradise sunset', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Elysian Park Sunset 1','Landscape:Sunsets',
'elysian = heaven', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Elysian Park Sunset 2','Landscape:Sunsets',
'California love', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Elysian Park Sunset 3','Landscape:Sunsets',
'the last time i felt alive...', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into item(title, category, description, openDateTime, sellerId, startingBid, bidIncrement, closeDateTime, winnerId) values 
('Ela Park Sunset','Landscape:Sunsets',
'catch sunsets not feelings', 
STR_TO_DATE("May 10 2019", "%M %d %Y"), 
100,25.00,2.00, 
STR_TO_DATE("June 10 2019", "%M %d %Y"), null);

insert into images(ino, image) values(1000, "src/images/Sunset.jpg");
insert into images(ino, image) values(1001, "src/images/Bokeh_1.jpg");
insert into images(ino, image) values(1002, "src/images/Bokeh_2.jpg");
insert into images(ino, image) values(1003, "src/images/Bokeh_3.jpg");
insert into images(ino, image) values(1004, "src/images/Bokeh_4.jpg");
insert into images(ino, image) values(1005, "src/images/Bokeh_5.jpg");
insert into images(ino, image) values(1006, "src/images/Bokeh_6.jpg");
insert into images(ino, image) values(1007, "src/images/Bokeh_7.jpg");
insert into images(ino, image) values(1008, "src/images/Bokeh_8.jpg");
insert into images(ino, image) values(1009, "src/images/Bokeh_9.jpg");
insert into images(ino, image) values(1010, "src/images/LA_1.jpg");
insert into images(ino, image) values(1011, "src/images/LA_2.jpg");
insert into images(ino, image) values(1012, "src/images/LA_3.jpg");
insert into images(ino, image) values(1013, "src/images/LA_4.jpg");
insert into images(ino, image) values(1014, "src/images/LA_5.jpg");
insert into images(ino, image) values(1015, "src/images/LA_6.jpg");
insert into images(ino, image) values(1016, "src/images/LA_7.jpg");
insert into images(ino, image) values(1017, "src/images/Portrait_1.jpg");
insert into images(ino, image) values(1018, "src/images/Portrait_2.jpg");
insert into images(ino, image) values(1019, "src/images/Portrait_3.jpg");
insert into images(ino, image) values(1020, "src/images/Portrait_4.jpg");
insert into images(ino, image) values(1021, "src/images/Portrait_5.jpg");
insert into images(ino, image) values(1022, "src/images/Sunset_1.jpg");
insert into images(ino, image) values(1023, "src/images/Sunset_2.jpg");
insert into images(ino, image) values(1024, "src/images/Sunset_3.jpg");
insert into images(ino, image) values(1025, "src/images/Sunset_4.jpg");
insert into images(ino, image) values(1026, "src/images/Sunset_5.jpg");
insert into images(ino, image) values(1027, "src/images/Sunset_6.jpg");
insert into images(ino, image) values(1028, "src/images/Sunset_7.jpg");