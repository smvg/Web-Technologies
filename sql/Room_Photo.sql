use Website;

create Table Room_Photo(
    id_room int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_room, name),
    FOREIGN KEY(id_room) REFERENCES Rooms(id_room) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);