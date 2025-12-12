CREATE DATABASE PayrollDB;
GO

USE PayrollDB;
GO

CREATE TABLE Department (
    dept_code VARCHAR(10) PRIMARY KEY,
    dept_name VARCHAR(50)
);

CREATE TABLE Employee (
    employee_code VARCHAR(10) PRIMARY KEY,
    employee_name NVARCHAR(50),
    dept_code VARCHAR(10),
    working_day INT,
    day_off_pay INT,
    day_off_not_pay INT,
    FOREIGN KEY (dept_code) REFERENCES Department(dept_code)
);

CREATE TABLE Salary (
    employee_code VARCHAR(10) PRIMARY KEY,
    basic_salary INT,
    gross_salary INT,
    net_salary INT,
    FOREIGN KEY (employee_code) REFERENCES Employee(employee_code)
);