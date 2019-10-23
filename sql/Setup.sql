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

create Table Rooms(
    id_room int NOT NULL AUTO_INCREMENT,
    description varchar(100),
    capacity int,
    PRIMARY KEY(id_room)
);

insert into Rooms (description, capacity) values('A cozy room', 4);
insert into Rooms (description, capacity) values('Another cozy room', 2);
insert into Rooms (description, capacity) values('This is cozy but doesnt have wifi', 3);

create Table Photos(
    name varchar(50) NOT NULL,
    description varchar(50),
    PRIMARY KEY(name)
);

insert into Photos values('photo-1.png', 'A cool photo');
insert into Photos values('photo-2.png', 'Another photo');
insert into Photos values('photo-3.png', 'This is not a cool photo');


create Table Room_Photo(
    id_room int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_room, name),
    FOREIGN KEY(id_room) REFERENCES Rooms(id_room) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);

insert into Room_Photo values(1, 'photo-1.png');
insert into Room_Photo values(1, 'photo-2.png');