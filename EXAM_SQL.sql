
CREATE DATABASE ABC_Company_Payroll;
GO
USE ABC_Company_Payroll;
GO


CREATE TABLE Departments (
    DepartmentCode VARCHAR(10) PRIMARY KEY,
    DepartmentName NVARCHAR(50) 
);


CREATE TABLE Employees (
    EmployeeCode VARCHAR(10) PRIMARY KEY,
    EmployeeName NVARCHAR(100),
    DepartmentCode VARCHAR(10),
    BasicSalary DECIMAL(18, 2),
    FOREIGN KEY (DepartmentCode) REFERENCES Departments(DepartmentCode)
);

CREATE TABLE Payroll (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    EmployeeCode VARCHAR(10),
    PayrollMonth INT,
    WorkingDays INT,
    OffDaysWithPay INT,
    OffDaysWithoutPay INT,
    GrossSalary DECIMAL(18, 2),
    NetSalary DECIMAL(18, 2),
    Note NVARCHAR(255),
    FOREIGN KEY (EmployeeCode) REFERENCES Employees(EmployeeCode)
);
GO


INSERT INTO Departments (DepartmentCode, DepartmentName) VALUES 
('IT', N'Công nghệ thông tin'),
('HR', N'Nhân sự'),
('SALE', N'Kinh doanh');


INSERT INTO Employees (EmployeeCode, EmployeeName, DepartmentCode, BasicSalary) VALUES
('A1', N'Nguyễn Văn A', 'IT', 1000),
('A2', N'Lê Thị Bình', 'IT', 1200),
('B1', N'Nguyễn Lan', 'HR', 600),
('D1', N'Mai Tuấn Anh', 'HR', 500),
('C1', N'Hà Thị Lan', 'HR', 500),
('C2', N'Lê Tú Chinh', 'SALE', 1200),
('D2', N'Trần Văn Toàn', 'HR', 500),
('A3', N'Trần Văn Nam', 'IT', 1200),
('B2', N'Huỳnh Anh', 'SALE', 1200);

INSERT INTO Payroll (EmployeeCode, PayrollMonth, WorkingDays, OffDaysWithPay, OffDaysWithoutPay, GrossSalary, NetSalary, Note) VALUES
('A1', 10, 22, 0, 0, 22000, 20000, NULL),
('A2', 10, 21, 1, 0, 26400, 23000, NULL),
('B1', 10, 20, 1, 1, 13200, 12000, NULL),
('D1', 10, 20, 1, 1, 11000, 10000, NULL),
('C1', 10, 22, 0, 0, 11000, 10000, NULL),
('C2', 10, 22, 0, 0, 26400, 23000, NULL),
('D2', 10, 22, 0, 0, 11000, 10000, NULL),
('A3', 10, 22, 0, 0, 26400, 23000, NULL),
('B2', 10, 21, 1, 0, 26400, 23000, NULL);
GO

EXEC CalculateTotalSalaryByDepartment
EXEC GetFullPayrollReport;
