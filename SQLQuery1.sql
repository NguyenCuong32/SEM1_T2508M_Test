USE Company;
GO




-----------------------------1NF---------------------
--CREATE TABLE Payroll_1NF (
 --   EmployeeCode VARCHAR(10),
 --   EmployeeName NVARCHAR(100),
 --   DepartmentCode VARCHAR(10),
  --  DepartmentName VARCHAR(50),
  --  BasicSalary DECIMAL(10,2),

 --   WorkingDays INT,
  --  DaysOffWithPay INT,
  --  DaysOffWithoutPay INT,
  --  GrossSalary DECIMAL(10,2),
 --   NetSalary DECIMAL(10,2),
 --   Note NVARCHAR(255)
--);
-------------------------------2NF---------------------------------------
--CREATE TABLE Employee_2NF (
---EmployeeCode VARCHAR(10) PRIMARY KEY,
--    EmployeeName NVARCHAR(100),
--    DepartmentCode VARCHAR(10),
--    DepartmentName VARCHAR(50),
--    BasicSalary DECIMAL(10,2)
--);
--CREATE TABLE Payroll_2NF (
--    EmployeeCode VARCHAR(10) PRIMARY KEY,
--    WorkingDays INT,
 --   DaysOffWithPay INT,
 --   DaysOffWithoutPay INT,
 --   GrossSalary DECIMAL(10,2),
 --   NetSalary DECIMAL(10,2),
--    Note NVARCHAR(255)
--);

-----------------------------------3NF--------------------------

DROP TABLE IF EXISTS Payroll;
DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS Department;


CREATE TABLE Department (
    DepartmentCode VARCHAR(10) PRIMARY KEY,
    DepartmentName VARCHAR(50)
);

CREATE TABLE Employee (
    EmployeeCode VARCHAR(10) PRIMARY KEY,
    EmployeeName NVARCHAR(100),
    DepartmentCode VARCHAR(10),
    BasicSalary DECIMAL(10,2),
    FOREIGN KEY (DepartmentCode) REFERENCES Department(DepartmentCode)
);

CREATE TABLE Payroll (
    PayrollID INT IDENTITY(1,1) PRIMARY KEY,
    EmployeeCode VARCHAR(10),
    WorkingDays INT,
    DaysOffWithPay INT,
    DaysOffWithoutPay INT,
    GrossSalary DECIMAL(10,2),
    NetSalary DECIMAL(10,2),
    Note NVARCHAR(255),
    FOREIGN KEY (EmployeeCode) REFERENCES Employee(EmployeeCode)
);

INSERT INTO Department (DepartmentCode, DepartmentName) VALUES
('IT','information technology'),
('HR','human resources'),
('SALE','sales department');   

INSERT INTO Employee (EmployeeCode, EmployeeName, DepartmentCode, BasicSalary) VALUES
('A1', N'Nguyễn Văn A', 'IT', 1000),
('A2', N'Lê Thị Bình', 'IT', 1200),
('B1', N'Nguyễn Lan', 'HR', 600),
('D1', N'Mai Tuấn Anh', 'HR', 500),
('C1', N'Hà Thị Lan', 'HR', 500),
('C2', N'Lê Tú Chinh', 'SALE', 1200),
('D2', N'Trần Văn Toàn', 'HR', 500),
('A3', N'Trần Văn Nam', 'IT', 1200),
('B2', N'Huỳnh Anh', 'SALE', 1200);

INSERT INTO Payroll (EmployeeCode, WorkingDays, DaysOffWithPay, DaysOffWithoutPay, GrossSalary, NetSalary, Note)
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
SELECT * FROM Employee;
SELECT * FROM Payroll;
GO



CREATE OR ALTER PROCEDURE sp_TotalSalaryByDepartment
AS
BEGIN
    SELECT 
        d.DepartmentCode,
        d.DepartmentName,
        SUM(p.NetSalary) AS TotalNetSalary
    FROM Department d
    INNER JOIN Employee e 
            ON d.DepartmentCode = e.DepartmentCode
    INNER JOIN Payroll p 
            ON e.EmployeeCode = p.EmployeeCode
    GROUP BY 
        d.DepartmentCode,
        d.DepartmentName
    ORDER BY SUM(p.NetSalary) ASC;

END;
GO

EXEC sp_TotalSalaryByDepartment;
