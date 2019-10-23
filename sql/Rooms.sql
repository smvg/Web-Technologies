use Website;

create Table Rooms(
    id_room int NOT NULL AUTO_INCREMENT,
    description varchar(100),
    capacity int,
    PRIMARY KEY(id_room)
);