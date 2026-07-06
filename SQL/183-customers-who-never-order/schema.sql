CREATE TABLE Customers (
    id INTEGER PRIMARY KEY,
    name TEXT
);

CREATE TABLE Orders (
    id INTEGER PRIMARY KEY,
    customerId INTEGER
);
