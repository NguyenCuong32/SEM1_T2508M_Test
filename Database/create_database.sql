-- SQL Script to create database, tables and insert data

-- Create database
CREATE DATABASE SEM1_T2508M_Test;
GO

USE SEM1_T2508M_Test;
GO

-- Create tables
CREATE TABLE Department (
    DeptID VARCHAR(10) PRIMARY KEY,
    DeptName VARCHAR(50) NOT NULL,
    DeptLocation VARCHAR(50) NOT NULL
);

CREATE TABLE Employee (
    EmpID INT PRIMARY KEY,
    EmpName VARCHAR(50) NOT NULL,
    DeptID VARCHAR(10) NOT NULL,
    Salary DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (DeptID) REFERENCES Department(DeptID)
);

CREATE TABLE Project (
    ProjectID VARCHAR(10) PRIMARY KEY,
    ProjectName VARCHAR(100) NOT NULL
);

CREATE TABLE WorksOn (
    EmpID INT NOT NULL,
    ProjectID VARCHAR(10) NOT NULL,
    PRIMARY KEY (EmpID, ProjectID),
    FOREIGN KEY (EmpID) REFERENCES Employee(EmpID),
    FOREIGN KEY (ProjectID) REFERENCES Project(ProjectID)
);

-- Insert data
INSERT INTO Department (DeptID, DeptName, DeptLocation) VALUES
('D1', 'HR', 'NY'),
('D2', 'IT', 'CA');

INSERT INTO Employee (EmpID, EmpName, DeptID, Salary) VALUES
(1, 'John', 'D1', 50000.00),
(2, 'Jane', 'D1', 55000.00),
(3, 'Bob', 'D2', 60000.00),
(4, 'Alice', 'D2', 65000.00);

INSERT INTO Project (ProjectID, ProjectName) VALUES
('P1', 'ProjectA'),
('P2', 'ProjectB'),
('P3', 'ProjectC');

INSERT INTO WorksOn (EmpID, ProjectID) VALUES
(1, 'P1'),
(2, 'P2'),
(3, 'P1'),
(4, 'P3');