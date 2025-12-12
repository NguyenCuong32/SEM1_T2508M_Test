CREATE DATABASE BangLuong;
GO
USE BangLuong;
GO
CREATE TABLE Department (
    Department_code VARCHAR(10) PRIMARY KEY
);

CREATE TABLE Employee(
    Employee_code VARCHAR(10) PRIMARY KEY,
    Employee_name NVARCHAR(50),
    Department_code VARCHAR(10),
    FOREIGN KEY ( Department_code) REFERENCES Department( Department_code)
);

CREATE TABLE Payroll (
    Employee_code VARCHAR(10) PRIMARY KEY,
    Number_of_working_day INT,
    Number_of_days_off_with_pay INT,
    Number_of_days_off_without_pay INT,
    Basic_salary DECIMAL(10, 3), 
    Gross_salary DECIMAL(10, 3), 
    Net_Salary DECIMAL(10, 3),   
    Note NVARCHAR(100),
    FOREIGN KEY ( Employee_code) REFERENCES Employee( Employee_code)
);

INSERT INTO Department (Department_code) VALUES
('IT'),
('HR'),
('SALE');
SELECT * From Department

INSERT INTO Employee (Employee_code, Employee_name, Department_code) VALUES
('A1', N'Nguyễn Văn A', 'IT'),
('A2', N'Lê Thị Bình', 'IT'),
('B1', N'Nguyễn Lan', 'HR'),
('D1', N'Mai Tuấn Anh', 'HR'),
('C1', N'Hà Thị Lan', 'HR'),
('C2', N'Lê Tú Chinh', 'SALE'),
('D2', N'Trần Văn Toàn', 'HR'),
('A3', N'Trần Văn Nam', 'IT'),
('B2', N'Huỳnh Anh', 'SALE');
SELECT * From Employee

INSERT INTO Payroll (Employee_code, Number_of_working_day, Number_of_days_off_with_pay, Number_of_days_off_without_pay, Basic_salary, Gross_salary, Net_Salary, Note) VALUES
('A1', 22, 0, 0, 1000.000, 22000.000, 20000.000, NULL),
('A2', 21, 1, 0, 1200.000, 26400.000, 23000.000, NULL),
('B1', 20, 1, 1, 600.000, 13200.000, 12000.000, NULL),
('D1', 20, 1, 1, 500.000, 11000.000, 10000.000, NULL),
('C1', 22, 0, 0, 500.000, 11000.000, 10000.000, NULL),
('C2', 22, 0, 0, 1200.000, 26400.000, 23000.000, NULL),
('D2', 22, 0, 0, 500.000, 11000.000, 10000.000, NULL), 
('A3', 22, 0, 0, 1200.000, 26400.000, 23000.000, NULL),
('B2', 21, 1, 0, 1200.000, 26400.000, 23000.000, NULL);
SELECT * From Payroll
GO


--Tạo Stored Procedure
CREATE PROCEDURE Calculate_Department_Total_Salary
AS
BEGIN
SELECT 
E.Department_code  AS Department_code,
SUM(P.Net_Salary) AS Total_Net_Salary
FROM 
Employee E
JOIN Payroll P On E.Employee_code = P.Employee_code
GROUP BY E.Department_code
ORDER BY E.Department_code ASC;
END;
GO
 
EXEC Calculate_Department_Total_Salary;