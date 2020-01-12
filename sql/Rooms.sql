use Website;

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