USE FinalExam;
Go
DROP TABLE IF EXISTS Income

DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS Department;



----1NF--
--CREATE TABLE Employee_1NF (
--Employee_Code INT,
--Employee_Name NVARCHAR (100),
--WorkingDay INT,
--DayOffPay INT,
--DayOffUnpay INT,
--BasicSalary DECIMAL (10,3),
--GrossSalary DECIMAL (10,3),
--NetSalary DECIMAL (10,3)

--2NF
--CREATE TABLE Employee (
--Employee_code VARCHAR(5) PRIMARY KEY,
--Employee_name NVARCHAR (50),
--DeptCode NVARCHAR(20),
--BasicSalary DECIMAL (10,3),
--);
--CREATE TABLE Income (
--Employee_code VARCHAR(5),
-- WorkingDay INT,
--DayOffpay INT,
--DayoffUnpay INT,
--GrossSalary DECIMAL (10,3),
--NetSalary DECIMAL (10,3),
--FOREIGN KEY (Employee_code) REFERENCES Employee(Employee_code)
--);

--3NF

CREATE TABLE Department (
    DeptCode VARCHAR(10) PRIMARY KEY,
    DeptName NVARCHAR(100)
);


CREATE TABLE Employee (
    EmployeeCode VARCHAR(5) PRIMARY KEY,
    EmployeeName NVARCHAR(100),
    DeptCode VARCHAR(10),
    BasicSalary DECIMAL(10,2),
    FOREIGN KEY (DeptCode) REFERENCES Department(DeptCode)
);


CREATE TABLE Income (
    IncomeID INT IDENTITY(1,1) PRIMARY KEY,
    EmployeeCode VARCHAR(5),
    WorkingDays INT,
    DaysOffWithPay INT,
    DaysOffWithoutPay INT,
    GrossSalary DECIMAL(10,2),
    NetSalary DECIMAL(10,2),
    Note NVARCHAR(250),
    FOREIGN KEY (EmployeeCode) REFERENCES Employee(EmployeeCode)
);

INSERT INTO Department (DeptCode, DeptName) VALUES
('IT',   N'Information Technology'),
('HR',   N'Human Resources'),
('SALE', N'Sales Department');

INSERT INTO Employee (EmployeeCode, EmployeeName, DeptCode, BasicSalary) VALUES
('A1', N'Nguy?n V?n A',  'IT',   1000),
('A2', N'Lê Th? Bình',   'IT',   1200),
('B1', N'Nguy?n Lan',    'HR',   600),
('D1', N'Mai Tu?n Anh',  'HR',   500),
('C1', N'Hà Th? Lan',    'HR',   500),
('C2', N'Lê Tú Chinh',   'SALE', 1200),
('D2', N'Tr?n V?n Toàn', 'HR',   500),
('A3', N'Tr?n V?n Nam',  'IT',   1200),
('B2', N'Hu?nh Anh',     'SALE', 1200);

INSERT INTO Income (EmployeeCode, WorkingDays, DaysOffWithPay, DaysOffWithoutPay, GrossSalary, NetSalary, Note)
VALUES
('A1', 22, 0, 0, 22000, 20000, NULL),
('A2', 21, 1, 0, 26400, 23000, NULL),
('B1', 20, 1, 1, 13200, 12000, NULL),
('D1', 20, 1, 1, 11000, 10000, NULL),
('C1', 22, 0, 0, 11000, 10000, NULL),
('C2', 22, 0, 0, 26400, 23000, NULL),
('D2', 22, 0, 0, 11000, 10000, NULL),
('A3', 22, 0, 0, 26400, 23000, NULL),
('B2', 21, 1, 0, 26400, 23000, NULL);

SELECT * FROM Department;   
SELECT  *  FROM Employee ;
SELECT * FROM Income;
GO

CREATE OR ALTER PROCEDURE sp_TotalSalaryByDepartment
AS
BEGIN
    SELECT 
        d.DeptCode,
        d.DeptName,
        SUM(i.NetSalary) AS TotalSalary
    FROM Department d
    JOIN Employee e ON d.DeptCode = e.DeptCode
    JOIN Income i ON e.EmployeeCode = i.EmployeeCode
    GROUP BY d.DeptCode, d.DeptName
    ORDER BY SUM(i.NetSalary) ASC;
END;
GO

EXEC sp_TotalSalaryByDepartment;

