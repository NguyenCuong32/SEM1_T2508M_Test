IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'company_payroll')
BEGIN
    CREATE DATABASE company_payroll;
END;
GO

USE company_payroll;
GO

CREATE TABLE departments (
    dept_code VARCHAR(10) PRIMARY KEY,
    dept_name VARCHAR(100)
);
GO

CREATE TABLE employees (
    employee_code VARCHAR(10) PRIMARY KEY,
    employee_name NVARCHAR(200) NOT NULL,
    dept_code VARCHAR(10),
    FOREIGN KEY (dept_code) REFERENCES departments(dept_code)
);
GO

CREATE TABLE payroll_records (
    id INT IDENTITY(1,1) PRIMARY KEY,
    employee_code VARCHAR(10),
    month_year VARCHAR(10),
    working_days INT,
    days_off_with_pay INT,
    days_off_without_pay INT,
    basic_salary_per_day DECIMAL(12,2),
    gross_salary DECIMAL(12,2),
    net_salary DECIMAL(12,2),
    note NVARCHAR(255),
    FOREIGN KEY (employee_code) REFERENCES employees(employee_code)
);
GO


