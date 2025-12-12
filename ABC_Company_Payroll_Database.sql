-- ====================================================
-- DMS (Intelligent Data Management with SQL Server)
-- ABC Company Payroll Database - October
-- Duration: 60 minutes, Mark: 15 points
-- ====================================================

-- ====================================================
-- REQUIREMENT 1: Database Normalization (1NF, 2NF, 3NF)
-- ====================================================

/*
NORMALIZATION ANALYSIS:

Original Table (Unnormalized):
- Employee_code, Employee_name, Department_code, Number_of_working_days,
  Number_of_days_off_with_pay, Number_of_days_off_without_pay,
  Basic_salary, Gross_salary, Net_Salary, Note

1NF (First Normal Form):
- Remove repeating groups
- Ensure atomic values
- Define primary key
=> Already in 1NF as all values are atomic

2NF (Second Normal Form):
- Must be in 1NF
- Remove partial dependencies
- Identified dependencies:
  * Employee_code -> Employee_name, Department_code
  * Department_code -> Department_name (implied)
  
=> Split into:
   - Department (Department_code, Department_name)
   - Employee (Employee_code, Employee_name, Department_code)
   - Payroll (Employee_code, Working_days, Days_off_with_pay, 
              Days_off_without_pay, Basic_salary, Gross_salary, 
              Net_salary, Payroll_month, Payroll_year)

3NF (Third Normal Form):
- Must be in 2NF
- Remove transitive dependencies
- Gross_salary can be calculated from Basic_salary and working days
- Net_salary can be calculated from Gross_salary

=> Final normalized structure:
   - Department (Department_code PK, Department_name)
   - Employee (Employee_code PK, Employee_name, Department_code FK)
   - Payroll (Payroll_ID PK, Employee_code FK, Working_days, 
              Days_off_with_pay, Days_off_without_pay, Basic_salary,
              Gross_salary, Net_salary, Payroll_month, Payroll_year)
*/

-- ====================================================
-- REQUIREMENT 2: Create Database, Tables and Insert Data
-- ====================================================

-- Create Database
IF EXISTS (SELECT name FROM sys.databases WHERE name = 'ABC_Company_Payroll')
BEGIN
    ALTER DATABASE ABC_Company_Payroll SET SINGLE_USER WITH ROLLBACK IMMEDIATE;
    DROP DATABASE ABC_Company_Payroll;
END
GO

CREATE DATABASE ABC_Company_Payroll;
GO

USE ABC_Company_Payroll;
GO

-- Create Department Table (3NF)
CREATE TABLE Department (
    Department_code VARCHAR(10) PRIMARY KEY,
    Department_name NVARCHAR(50) NOT NULL
);
GO

-- Create Employee Table (3NF)
CREATE TABLE Employee (
    Employee_code VARCHAR(10) PRIMARY KEY,
    Employee_name NVARCHAR(100) NOT NULL,
    Department_code VARCHAR(10) NOT NULL,
    CONSTRAINT FK_Employee_Department 
        FOREIGN KEY (Department_code) 
        REFERENCES Department(Department_code)
);
GO

-- Create Payroll Table (3NF)
CREATE TABLE Payroll (
    Payroll_ID INT IDENTITY(1,1) PRIMARY KEY,
    Employee_code VARCHAR(10) NOT NULL,
    Working_days INT NOT NULL,
    Days_off_with_pay INT DEFAULT 0,
    Days_off_without_pay INT DEFAULT 0,
    Basic_salary DECIMAL(18,3) NOT NULL,
    Gross_salary DECIMAL(18,3) NOT NULL,
    Net_salary DECIMAL(18,3) NOT NULL,
    Payroll_month INT NOT NULL,
    Payroll_year INT NOT NULL,
    Note NVARCHAR(200),
    CONSTRAINT FK_Payroll_Employee 
        FOREIGN KEY (Employee_code) 
        REFERENCES Employee(Employee_code),
    CONSTRAINT CHK_Working_days 
        CHECK (Working_days >= 0 AND Working_days <= 31),
    CONSTRAINT CHK_Month 
        CHECK (Payroll_month >= 1 AND Payroll_month <= 12)
);
GO

-- Insert Department Data
INSERT INTO Department (Department_code, Department_name) VALUES
('IT', N'Information Technology'),
('HR', N'Human Resources'),
('SALE', N'Sales Department');
GO

-- Insert Employee Data (from the October payroll table)
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
GO

-- Insert Payroll Data for October
INSERT INTO Payroll (Employee_code, Working_days, Days_off_with_pay, Days_off_without_pay, 
                     Basic_salary, Gross_salary, Net_salary, Payroll_month, Payroll_year) VALUES
('A1', 22, 0, 0, 1.000, 22.000, 20.000, 10, 2024),
('A2', 21, 1, 0, 1.200, 26.400, 23.000, 10, 2024),
('B1', 20, 1, 1, 0.600, 13.200, 12.000, 10, 2024),
('D1', 20, 1, 1, 0.500, 11.000, 10.000, 10, 2024),
('C1', 22, 0, 0, 0.500, 11.000, 10.000, 10, 2024),
('C2', 22, 0, 0, 1.200, 26.400, 23.000, 10, 2024),
('D2', 22, 0, 0, 0.500, 11.000, 10.000, 10, 2024),
('A3', 22, 0, 0, 1.200, 26.400, 23.000, 10, 2024),
('B2', 21, 1, 0, 1.200, 26.400, 23.000, 10, 2024);
GO

-- Verify inserted data
SELECT 'Department Table' AS TableName;
SELECT * FROM Department;

SELECT 'Employee Table' AS TableName;
SELECT * FROM Employee;

SELECT 'Payroll Table' AS TableName;
SELECT * FROM Payroll;
GO

-- ====================================================
-- REQUIREMENT 3: Stored Procedure to Calculate Total Salaries
-- Calculate the total salaries of employees in each department
-- and arrange them by department code in ascending order
-- ====================================================

CREATE PROCEDURE sp_CalculateTotalSalariesByDepartment
    @Payroll_month INT = NULL,
    @Payroll_year INT = NULL
AS
BEGIN
    SET NOCOUNT ON;
    
    -- If month and year are not provided, use current October 2024
    IF @Payroll_month IS NULL
        SET @Payroll_month = 10;
    
    IF @Payroll_year IS NULL
        SET @Payroll_year = 2024;
    
    SELECT 
        d.Department_code,
        d.Department_name,
        COUNT(DISTINCT e.Employee_code) AS Total_Employees,
        SUM(p.Gross_salary) AS Total_Gross_Salary,
        SUM(p.Net_salary) AS Total_Net_Salary,
        AVG(p.Gross_salary) AS Average_Gross_Salary,
        AVG(p.Net_salary) AS Average_Net_Salary,
        MAX(p.Gross_salary) AS Max_Gross_Salary,
        MIN(p.Gross_salary) AS Min_Gross_Salary
    FROM 
        Department d
    LEFT JOIN 
        Employee e ON d.Department_code = e.Department_code
    LEFT JOIN 
        Payroll p ON e.Employee_code = p.Employee_code 
                  AND p.Payroll_month = @Payroll_month 
                  AND p.Payroll_year = @Payroll_year
    GROUP BY 
        d.Department_code, d.Department_name
    ORDER BY 
        d.Department_code ASC;
END
GO

-- Execute the stored procedure
PRINT '====================================================';
PRINT 'EXECUTING STORED PROCEDURE: Total Salaries by Department';
PRINT '====================================================';
GO

EXEC sp_CalculateTotalSalariesByDepartment @Payroll_month = 10, @Payroll_year = 2024;
GO

-- Additional useful queries for verification
SELECT '====================================================';
SELECT 'ADDITIONAL VERIFICATION QUERIES';
SELECT '====================================================';
GO

-- Query 1: Employee details with department and salary information
SELECT 
    e.Employee_code,
    e.Employee_name,
    d.Department_name,
    p.Working_days,
    p.Days_off_with_pay,
    p.Days_off_without_pay,
    p.Basic_salary,
    p.Gross_salary,
    p.Net_salary
FROM 
    Employee e
INNER JOIN 
    Department d ON e.Department_code = d.Department_code
INNER JOIN 
    Payroll p ON e.Employee_code = p.Employee_code
WHERE 
    p.Payroll_month = 10 AND p.Payroll_year = 2024
ORDER BY 
    d.Department_code, e.Employee_code;
GO

-- Query 2: Department summary with employee count
SELECT 
    d.Department_code,
    d.Department_name,
    COUNT(e.Employee_code) AS Employee_Count
FROM 
    Department d
LEFT JOIN 
    Employee e ON d.Department_code = e.Department_code
GROUP BY 
    d.Department_code, d.Department_name
ORDER BY 
    d.Department_code;
GO

PRINT '====================================================';
PRINT 'DATABASE SETUP COMPLETED SUCCESSFULLY!';
PRINT '====================================================';
GO
