use Website;

create Table Location(
    id_location int NOT NULL AUTO_INCREMENT,
    address_location varchar(255),
    phone_location varchar(20),
    email_location varchar(255),
    facebook_link varchar(100),
    booking_link varchar(100),
    PRIMARY KEY(id_location)
);