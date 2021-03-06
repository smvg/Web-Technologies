DROP DATABASE IF EXISTS Website;

CREATE DATABASE Website;

use Website;

create Table Administrators(
    email varchar(255) PRIMARY KEY,
    first_name varchar(255),
    last_name varchar(255),
    password varchar(64) NOT NULL
);

/* SALT: VjHnacnSDfHPQ7Y; SHA-256 */

/* Passwords: password */
insert into Administrators values('email@gmail.com', 'User', 'One', '1af08fe7693e407dafc124f1821b7c7de433c62ef7b3141d60383a352e14c2a6');
insert into Administrators values('email@hotmail.com', 'User', 'Two', '1af08fe7693e407dafc124f1821b7c7de433c62ef7b3141d60383a352e14c2a6');
insert into Administrators values('email@zoho.com', 'User', 'Three', '1af08fe7693e407dafc124f1821b7c7de433c62ef7b3141d60383a352e14c2a6');
insert into Administrators values('email@yahoo.com', 'User', 'Four', '1af08fe7693e407dafc124f1821b7c7de433c62ef7b3141d60383a352e14c2a6');

create Table Photos(
    name varchar(50) NOT NULL,
    description varchar(50),
    md5_hash varchar(32),
    PRIMARY KEY(name)
);

insert into Photos values('room1.1.jpeg', 'Photo of Room 1', '49fec71cc5c37bb8412baee4db648ded');
insert into Photos values('room2.1.jpeg', 'Photo of Room 2', 'eb51e36eca2c626b0e7833719aa13779');
insert into Photos values('room2.2.jpeg', 'Photo of Room 2', '8d873df26b2b38e4b831d87918522d30');
insert into Photos values('room2.3.jpeg', 'Photo of Room 2', '124c71355a8e552e4785a21383b30ade');
insert into Photos values('room3.1.jpg', 'Photo of Room 3', '45421338f2eca2ff29c383f8edab3703');
insert into Photos values('outside1.jpg', 'Photo of outside', '12e57f753c308db030ad1bdc806054ad');

create Table Location(
    id_location int NOT NULL AUTO_INCREMENT,
    address_location varchar(255),
    phone_location varchar(20),
    email_location varchar(255),
    facebook_link varchar(100),
    booking_link varchar(100),
    PRIMARY KEY(id_location)
);

insert into Location (address_location, phone_location, email_location, facebook_link, booking_link) values('This is an address', '648-73-48-75', 'email@email.com', 'www.facebook.com', 'wwww.booking.com');

create Table Location_Photo(
    id_location int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_location, name),
    FOREIGN KEY(id_location) REFERENCES Location(id_location) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);

insert into Location_Photo values(1, 'outside1.jpg');

create Table Rooms(
    id_room int NOT NULL AUTO_INCREMENT,
    id_location int NOT NULL,
    description_pl varchar(100),
    description_en varchar(100),
    capacity int,
    price int,
    FOREIGN KEY(id_location) REFERENCES Location(id_location) ON DELETE CASCADE,
    PRIMARY KEY(id_room)
);

insert into Rooms (id_location, description_pl, description_en, capacity, price) values(1,'Polish description', 'A cozy room', 4, 90);
insert into Rooms (id_location, description_pl, description_en, capacity, price) values(1,'Polish description', 'Another cozy room', 2, 100);
insert into Rooms (id_location, description_pl, description_en, capacity, price) values(1,'Polish description', 'This is cozy but doesnt have wifi', 3, 110);

create Table Room_Photo(
    id_room int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_room, name),
    FOREIGN KEY(id_room) REFERENCES Rooms(id_room) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);

insert into Room_Photo values(1, 'room1.1.jpeg');
insert into Room_Photo values(2, 'room2.1.jpeg');
insert into Room_Photo values(2, 'room2.2.jpeg');
insert into Room_Photo values(2, 'room2.3.jpeg');
insert into Room_Photo values(3, 'room3.1.jpg');