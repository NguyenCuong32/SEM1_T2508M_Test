USE MDSS_NguyenBinhMinh;
GO

CREATE SCHEMA Employee;
GO

CREATE SCHEMA Department;
GO

-- CÂU 1
CREATE TABLE Department.room (
Department_code NVARCHAR(255) PRIMARY KEY,
Department_name NVARCHAR(255) NOT NULL
);
GO

INSERT INTO Department.room (
Department_code,
Department_name
) VALUES 
('it', 'IT'),
('hr', 'HR'),
('sale', 'SALE')
GO

CREATE TABLE Employee.users (
Employee_code NVARCHAR(255) PRIMARY KEY,
Employee_name NVARCHAR(255) NOT NULL,
Department_code NVARCHAR(255) NOT NULL,
Number_of_working_day INT DEFAULT(0),
Number_of_days_off_with_pay INT DEFAULT(0),
Number_of_days_off_without_pay INT DEFAULT(0),
Basic_salary DECIMAL(11, 0) DEFAULT(0) NOT NULL,
Gross_salary DECIMAL(11, 0) DEFAULT(0) NOT NULL,
Net_salary DECIMAL(11, 0) DEFAULT(0) NOT NULL,
Note TEXT NULL,
FOREIGN KEY (Department_code) REFERENCES Department.room (Department_code) ON DELETE CASCADE ON UPDATE CASCADE
);
GO

INSERT INTO Employee.users (
Employee_code,
Employee_name,
Department_code,
Number_of_working_day,
Number_of_days_off_with_pay,
Number_of_days_off_without_pay,
Basic_salary,
Gross_salary,
Net_salary
) VALUES 
('A1', 'Nguyen Van A', 'it', '22', '0', '0', '1000', '22000', '20000'),
('A2', 'Le Thi Binh', 'it', '21', '1', '0', '1200', '26400', '23000'),
('B1', 'Nguyen Lan', 'hr', '20', '1', '1', '600', '13200', '12000'),
('D1', 'Mai Tuan Anh', 'hr', '20', '1', '1', '500', '11000', '10000'),
('C1', 'Ha Thi Lan', 'hr', '22', '0', '0', '500', '11000', '10000'),
('C2', 'Le Tu Chinh', 'sale', '22', '0', '0', '1200', '26400', '23000'),
('D2', 'Tran Van Toan', 'hr', '22', '0', '0', '500', '11000', '10000'),
('A3', 'Tran Van Nam', 'it', '22', '0', '0', '1200', '26400', '23000'),
('B2', 'Huynh Anh', 'sale', '21', '1', '0', '1200', '26400', '23000');
GO

-- CÂU 2:
SELECT 
Employee_code as 'Employee code',
Employee_name as 'Employee name',
Department_name as 'Department code',
Number_of_working_day as 'Number of working day',
Number_of_days_off_with_pay as 'Number of days off with pay',
Number_of_days_off_without_pay as 'Number of days off without pay',
Basic_salary as 'Basic salary',
Gross_salary as 'Gross salary',
Net_salary as 'Net salary',
Note as 'Note'
FROM Employee.users as users
INNER JOIN Department.room as room ON room.Department_code = users.Department_code
GO