INSERT INTO departments (dept_code, dept_name) VALUES
('IT','IT'),
('HR','HR'),
('SALE','SALE');
GO
INSERT INTO employees (employee_code, employee_name, dept_code) VALUES
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

INSERT INTO payroll_records
(employee_code, month_year, working_days, days_off_with_pay, days_off_without_pay,
 basic_salary_per_day, gross_salary, net_salary, note)
VALUES
('A1','2025-10',22,0,0,1000,22000,20000,N''),
('A2','2025-10',21,1,0,1200,26400,23000,N''),
('B1','2025-10',20,1,1,600,13200,12000,N''),
('D1','2025-10',20,1,1,500,11000,10000,N''),
('C1','2025-10',22,0,0,500,11000,10000,N''),
('C2','2025-10',22,0,0,1200,26400,23000,N''),
('D2','2025-10',22,0,0,500,11000,10000,N''),
('A3','2025-10',22,0,0,1200,26400,23000,N''),
('B2','2025-10',21,1,0,1200,26400,23000,N'');
GO

SELECT * FROM departments;
SELECT * FROM employees;
SELECT * FROM payroll_records;