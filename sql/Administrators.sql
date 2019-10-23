use Website;

create Table Administrators(
    email varchar(255) PRIMARY KEY,
    first_name varchar(255),
    last_name varchar(255),
    password varchar(64) NOT NULL
);