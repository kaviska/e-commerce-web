CREATE TABLE IF NOT EXISTS employees (
    s_id INT ,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    City VARCHAR(255),
    commission DECIMAL(4, 2),
    CONSTRAINT primery_key PRIMARY KEY (s_id)
);

INSERT INTO employees (s_id, FirstName, LastName, City, commission)
VALUES
    (5001, 'Thilak', 'Perera', 'Kandy', 0.15),
    (5002, 'Jagath', 'Goonapala', 'Colombo', 0.13),
    (5005, 'Sarath', 'Perera', 'Kandy', 0.11),
    (5006, 'Sandun', 'Peris', 'Jaffna', 0.14),
    (5003, 'Pasan', 'Moragaha', 'Galle', 0.12),
    (5007, 'Nadun', 'Weerasiri', 'Colombo', 0.13);

//all information is stored in the employees table
SELECT * FROM employees;


SELECT FirstName FROM employees WHERE FirstName like '%sa%';


CREATE TABLE IF NOT EXISTS Orders (
    ord_no INT,
    purch_amt DECIMAL(8, 2),
    ord_date DATE,
    customer_id INT,
    salesman_id INT,
    CONSTRAINT primary_key PRIMARY KEY (ord_no)
    CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES Customer(c_id),
    CONSTRAINT fk_salesman_id FOREIGN KEY (salesman_id) REFERENCES employees(s_id),
);

INSERT INTO Orders (ord_no, purch_amt, ord_date, customer_id, salesman_id)
VALUES
    (70001, 150.5, '2015-10-05', 3005, 5002),
    (70009, 270.65, '2015-09-10', 3001, 5005),
    (70002, 65.26, '2015-10-05', 3002, 5001),
    (70004, 110.5, '2015-08-17', 3009, 5003),
    (70007, 948.5, '2015-09-10', 3005, 5002),
    (70005, 2400.6, '2015-07-27', 3007, 5001),
    (70008, 5760, '2015-09-10', 3002, 5001),
    (70010, 1983.43, '2015-10-10', 3004, 5006),
    (70003, 2480.4, '2015-10-10', 3009, 5003),
    (70012, 250.45, '2015-06-27', 3008, 5002),
    (70011, 75.29, '2015-08-17', 3003, 5007),
    (70013, 3045.6, '2015-04-25', 3002, 5001);

CREATE TABLE IF NOT EXISTS Customer (
    c_id INT,
    cust_name VARCHAR(255),
    city VARCHAR(255),
    grade INT,
    CONSTRAINT primary_key PRIMARY KEY (c_id)
);

INSERT INTO Customer (c_id, cust_name, city, grade)
VALUES
    (3002, 'Wijitha Silva', 'Kandy', 100),
    (3005, 'Ramani Dias', 'Galle', 200),
    (3001, 'Walter Dip', 'Kandy', 100),
    (3004, 'John Palitha', 'Gampola', 300),
    (3007, 'WCP Senerath', 'Colombo', 200),
    (3009, 'Damani Zoysa', 'Colombo', 100),
    (3008, 'Radha John', 'Gampha', 300),
    (3003, 'Udaya Bandara', 'Colombo', 200);


SELECT avg(purch_amt) FROM Orders ;


SELECT ord_no FROM Orders WHERE (purch_amt,customer_id) IN (SELECT max(purch_amt), customer_id FROM Orders GROUP BY customer_id);

SELECT max(purch_amt), customer_id, 
FROM Orders 
GROUP BY customer_id;

SELECT count(*) FROM Orders WHERE ord_date='2015-10-05';

SELECT Orders.ord_no
FROM Orders JOIN Customer on Orders.customer_id = Customer.c_id
JOIN employees on Orders.salesman_id = employees.s_id
WHERE Customer.city !=employees.city;