use Website;

create Table Photos(
    name varchar(50) NOT NULL,
    description varchar(50),
    md5_hash varchar(32),
    PRIMARY KEY(name)
);