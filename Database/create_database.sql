-- SQL Script to create database, tables and insert data

-- Create database
CREATE DATABASE SEM1_T2508M_Test;
GO

USE SEM1_T2508M_Test;
GO

-- Create tables
CREATE TABLE Department (
    DeptID VARCHAR(10) PRIMARY KEY,
    DeptName NVARCHAR(50) NOT NULL
);

CREATE TABLE Employee (
    EmpID VARCHAR(10) PRIMARY KEY,
    EmpName NVARCHAR(50) NOT NULL,
    DeptID VARCHAR(10) NOT NULL,
    Age INT NOT NULL,
    Gender BIT NOT NULL,
    Status BIT NOT NULL,
    FOREIGN KEY (DeptID) REFERENCES Department(DeptID)
);

CREATE TABLE Salary (
    EmpID VARCHAR(10) PRIMARY KEY,
    Basic DECIMAL(10,2) NOT NULL,
    Total DECIMAL(10,2) NOT NULL,
    Net DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (EmpID) REFERENCES Employee(EmpID)
);

-- Insert data
INSERT INTO Department VALUES
('IT', 'Information Technology'),
('HR', 'Human Resources'),
('SALE', 'Sales Department');

INSERT INTO Employee VALUES
('A1', N'Nguyễn Văn A', 'IT', 22, 0, 0),
('A2', N'Lê Thị Bình', 'IT', 21, 1, 0),
('B1', N'Nguyễn Lan', 'HR', 20, 1, 1),
('D1', N'Mai Tuấn Anh', 'HR', 20, 1, 1),
('C1', N'Hà Thị Lan', 'HR', 22, 0, 0),
('C2', N'Lê Tú Chinh', 'SALE', 22, 0, 0),
('D2', N'Trần Văn Toàn', 'HR', 22, 0, 0),
('A3', N'Trần Văn Nam', 'IT', 22, 0, 0),
('B2', N'Huỳnh Anh', 'SALE', 21, 1, 0);

INSERT INTO Salary VALUES
('A1', 1000, 22000, 20000),
('A2', 1200, 26400, 23000),
('B1', 600, 13200, 12000),
('D1', 500, 11000, 10000),
('C1', 500, 11000, 10000),
('C2', 1200, 26400, 23000),
('D2', 500, 11000, 10000),
('A3', 1200, 26400, 23000),
('B2', 1200, 26400, 23000);