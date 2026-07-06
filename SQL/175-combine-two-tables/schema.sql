CREATE TABLE Person (
    personId INTEGER PRIMARY KEY,
    firstName TEXT,
    lastName TEXT
);

CREATE TABLE Address (
    addressId INTEGER PRIMARY KEY,
    personId INTEGER,
    city TEXT,
    state TEXT
);
