use Website;

create Table Location_Photo(
    id_location int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id_location, name),
    FOREIGN KEY(id_location) REFERENCES Location(id_location) ON DELETE CASCADE,
    FOREIGN KEY(name) REFERENCES Photos(name) ON DELETE CASCADE
);