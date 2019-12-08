use Website;

create Table Location(
    id_location int NOT NULL AUTO_INCREMENT,
    address_location varchar(255),
    phone_location varchar(20),
    description_location varchar(255),
    PRIMARY KEY(id_location)
);