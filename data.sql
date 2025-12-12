
CREATE DATABASE HRM_Payroll;
GO

USE HRM_Payroll;
GO


CREATE TABLE Departments (
    DepartmentCode VARCHAR(10) PRIMARY KEY,
    DepartmentName NVARCHAR(100)
);


CREATE TABLE Employees (
    EmployeeCode VARCHAR(10) PRIMARY KEY,
    EmployeeName NVARCHAR(100),
    DepartmentCode VARCHAR(10),
    BasicSalary DECIMAL(10,2),
    FOREIGN KEY (DepartmentCode) REFERENCES Departments(DepartmentCode)
);


CREATE TABLE Payroll (
    EmployeeCode VARCHAR(10),
    WorkingDays INT,
    PaidLeaveDays INT,
    UnpaidLeaveDays INT,
    GrossSalary DECIMAL(10,2),
    NetSalary DECIMAL(10,2),
    Note NVARCHAR(255),
    PRIMARY KEY (EmployeeCode),
    FOREIGN KEY (EmployeeCode) REFERENCES Employees(EmployeeCode)
    );
INSERT INTO Departments VALUES
('IT', N'Information Technology'),
('HR', N'Human Resources'),
('SALE', N'Sales');

INSERT INTO Employees VALUES
('A1', N'Nguyễn Văn A', 'IT', 1000),
('A2', N'Lê Thị Bình', 'IT', 1200),
('B1', N'Nguyễn Lan', 'HR', 600),
('D1', N'Mai Tuấn Anh', 'HR', 500),
('C1', N'Hà Thị Lan', 'HR', 500),
('C2', N'Lê Tú Chinh', 'SALE', 1200),
('D2', N'Trần Văn Toàn', 'HR', 500),
('A3', N'Trần Văn Nam', 'IT', 1200),
('B2', N'Huỳnh Anh', 'SALE', 1200);


INSERT INTO Payroll VALUES
('A1', 22, 0, 0, 22000, 20000, NULL),
('A2', 21, 1, 0, 26400, 23000, NULL),
('B1', 20, 1, 1, 13200, 12000, NULL),
('D1', 20, 1, 1, 11000, 10000, NULL),
('C1', 22, 0, 0, 11000, 10000, NULL),
('C2', 22, 0, 0, 26400, 23000, NULL),
('D2', 22, 0, 0, 11000, 10000, NULL),
('A3', 22, 0, 0, 26400, 23000, NULL),
('B2', 21, 1, 0, 26400, 23000, NULL);


SELECT * FROM Departments;
GO


SELECT * FROM Employees;
GO


SELECT * FROM Payroll;
GO
EXEC Get_All_Employees_Detail;
EXEC Calculate_GrossSalary_By_Dept @DeptCode = 'IT';