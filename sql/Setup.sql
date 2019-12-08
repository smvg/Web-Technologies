DROP DATABASE IF EXISTS Website;

CREATE DATABASE Website;

use Website;

create Table Administrators(
    email varchar(255) PRIMARY KEY,
    first_name varchar(255),
    last_name varchar(255),
    password varchar(64) NOT NULL
);

/* SALT: yMQ1zIByHN; SHA-256 */

/* Passwords: onetwothree */
insert into Administrators values('email@gmail.com', 'User', 'One', 'c943a189d630657aba381ff817dbc30fd9be8517031f29f46114fb8d2e9b2cd3');
insert into Administrators values('email@hotmail.com', 'User', 'Two', 'c943a189d630657aba381ff817dbc30fd9be8517031f29f46114fb8d2e9b2cd3');
insert into Administrators values('email@zoho.com', 'User', 'Three', 'c943a189d630657aba381ff817dbc30fd9be8517031f29f46114fb8d2e9b2cd3');
insert into Administrators values('email@yahoo.com', 'User', 'Four', 'c943a189d630657aba381ff817dbc30fd9be8517031f29f46114fb8d2e9b2cd3');

create Table Photos(
    name varchar(50) NOT NULL,
    description varchar(50),
    PRIMARY KEY(name)
);

insert into Photos values('photo-1.png', 'A cool photo');
insert into Photos values('photo-2.png', 'Another photo');
insert into Photos values('photo-3.png', 'This is not a cool photo');

create Table Location(
    id_location int NOT NULL AUTO_INCREMENT,
    address_location varchar(255),
    phone_location varchar(20),
    description_location varchar(255),
    PRIMARY KEY(id_location)
);

insert into Location (address_location, phone_location, description_location) values('This is an address', '6487348754', 'This is a wonderful place!');

create Table Location_Photo(
    id_location int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_location, name),
    FOREIGN KEY(id_location) REFERENCES Location(id_location) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);

insert into Location_Photo values(1, 'photo-1.png');

create Table Rooms(
    id_room int NOT NULL AUTO_INCREMENT,
    id_location int NOT NULL,
    description varchar(100),
    capacity int,
    FOREIGN KEY(id_location) REFERENCES Location(id_location) ON DELETE CASCADE,
    PRIMARY KEY(id_room)
);

insert into Rooms (id_location, description, capacity) values(1, 'A cozy room', 4);
insert into Rooms (id_location, description, capacity) values(1, 'Another cozy room', 2);
insert into Rooms (id_location, description, capacity) values(1, 'This is cozy but doesnt have wifi', 3);

create Table Room_Photo(
    id_room int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_room, name),
    FOREIGN KEY(id_room) REFERENCES Rooms(id_room) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);

insert into Room_Photo values(1, 'photo-1.png');
insert into Room_Photo values(1, 'photo-2.png');