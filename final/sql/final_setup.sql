CREATE TABLE final_customer
( customerid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname CHAR(50) NOT NULL,
  lastname CHAR(50) NOT NULL,
  address CHAR(100) NOT NULL,
  city CHAR(30) NOT NULL,
  zipcode CHAR(5) NOT NULL,
  stateid CHAR(3) NOT NULL
);

CREATE TABLE final_employee
( employeeid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname CHAR(50) NOT NULL,
  lastname CHAR(50) NOT NULL,
  address CHAR(100) NOT NULL,
  city CHAR(30) NOT NULL,
  zipcode CHAR(5) NOT NULL,
  state CHAR(3) NOT NULL
);

CREATE TABLE final_order
( orderid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customerid INT(50) NOT NULL,
  employeeid INT(50) NOT NULL,
  startdate DATE NOT NULL,
  description VARCHAR(500) NOT NULL,
  setupprice FLOAT(6,2) NOT NULL,
  totalprice FLOAT(6,2) NOT NULL
);





CREATE TABLE final_order
( orderid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customerid INT(50) NOT NULL,
  employeeid INT(50) NOT NULL
);







CREATE TABLE final_order_items
( orderid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customerid INT(50) NOT NULL,
  animalid INT(50) NOT NULL,
  employeeid INT(50) NOT NULL,
  date DATE NOT NULL
  price FLOAT(4,2)


CREATE TABLE final_animal
( animalid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name CHAR(50) NOT NULL,
  cost CHAR(50) NOT NULL
);

CREATE TABLE final_state
( stateid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  state_abbreviation CHAR(2) NOT NULL,
  state_name CHAR(50) NOT NULL
);

INSERT INTO final_state (state_abbreviation, state_name)
VALUES
	('IN', 'Indiana'),
	('KY', 'Kentucky'),
	('OH', 'Ohio');

