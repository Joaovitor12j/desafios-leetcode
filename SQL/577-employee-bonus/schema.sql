CREATE TABLE Employee (
    empId INTEGER PRIMARY KEY,
    name TEXT,
    supervisor INTEGER,
    salary INTEGER
);

CREATE TABLE Bonus (
    empId INTEGER PRIMARY KEY,
    bonus INTEGER
);
