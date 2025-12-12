-- DMS Exam Practice: ABC Company Payroll

-- PHẦN 1: TẠO DATABASE
IF NOT EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name = N'ABC_Company_Payroll')
BEGIN
    CREATE DATABASE ABC_Company_Payroll;
END
GO

USE ABC_Company_Payroll;
GO

-- PHẦN 2: TẠO CÁC BẢNG (CHUẨN 3NF - SỬ DỤNG DECIMAL(X, 0) CHO CỘT LƯƠNG)

-- Xóa các bảng theo thứ tự ngược lại của Khóa ngoại để đảm bảo chạy lại thành công
IF OBJECT_ID('payroll_detail', 'U') IS NOT NULL 
    DROP TABLE payroll_detail;
IF OBJECT_ID('employee', 'U') IS NOT NULL 
    DROP TABLE employee;
IF OBJECT_ID('department', 'U') IS NOT NULL 
    DROP TABLE department;
GO

-- Bảng 1: department
CREATE TABLE department (
    department_code CHAR(4) PRIMARY KEY,
    department_name NVARCHAR(50) 
);
GO

-- Bảng 2: employee (Thông tin nhân viên cố định)
CREATE TABLE employee (
    employee_code CHAR(2) PRIMARY KEY,
    employee_name NVARCHAR(50) NOT NULL,
    department_code CHAR(4) NOT NULL,
    basic_salary DECIMAL(10, 0) NOT NULL, -- DECIMAL(10, 0)
    
    FOREIGN KEY (department_code) REFERENCES department(department_code)
);
GO

-- Bảng 3: payroll_detail (Chi tiết lương tháng 10)
CREATE TABLE payroll_detail (
    employee_code CHAR(2) PRIMARY KEY,
    working_days INT NOT NULL, 
    paid_days_off INT NOT NULL, 
    unpaid_days_off INT NOT NULL, 
    gross_salary DECIMAL(12, 0),   -- DECIMAL(12, 0)
    net_salary DECIMAL(12, 0),     -- DECIMAL(12, 0)
    note NVARCHAR(100), 
    
    FOREIGN KEY (employee_code) REFERENCES employee(employee_code)
);
GO

-- PHẦN 3: CHÈN DỮ LIỆU (INSERT THEO YÊU CẦU 2 - GIÁ TRỊ SỐ NGUYÊN)

-- Chèn dữ liệu vào bảng department
INSERT INTO department (department_code, department_name) VALUES
('IT', N'Information Technology'),
('HR', N'Human Resources'),
('SALE', N'Sales');
GO

-- Chèn dữ liệu vào bảng employee
INSERT INTO employee (employee_code, employee_name, department_code, basic_salary) VALUES
('A1', N'Nguyễn Văn A', 'IT', 1000),
('A2', N'Lê Thi Bình', 'IT', 1200),
('B1', N'Nguyễn Lan', 'HR', 600), 
('D1', N'Mai Tuân Anh', 'HR', 500), 
('C1', N'Hà Thị Lan', 'HR', 500), 
('C2', N'Lê Tú Chinh', 'SALE', 1200),
('D2', N'Trần Văn Toàn', 'HR', 500), 
('A3', N'Trần Văn Nam', 'IT', 1200),
('B2', N'Huỳnh Anh', 'SALE', 1200);
GO

-- Chèn dữ liệu vào bảng payroll_detail (tháng 10)
INSERT INTO payroll_detail (employee_code, working_days, paid_days_off, unpaid_days_off, gross_salary, net_salary, note) VALUES
('A1', 22, 0, 0, 22000, 20000, NULL),
('A2', 21, 1, 0, 26400, 23000, NULL),
('B1', 20, 1, 1, 13200, 12000, NULL),
('D1', 20, 1, 1, 11000, 10000, NULL),
('C1', 22, 0, 0, 11000, 10000, NULL),
('C2', 22, 0, 0, 26400, 23000, NULL),
('D2', 22, 0, 0, 11000, 10000, NULL),
('A3', 22, 0, 0, 26400, 23000, NULL),
('B2', 21, 1, 0, 26400, 23000, NULL);
GO

-- PHẦN 4: STORED PROCEDURE (YÊU CẦU 3 - ÉP BUỘC DẤU PHẨY NGĂN CÁCH)

IF EXISTS (SELECT * FROM sys.objects WHERE type = 'P' AND name = 'sp_calculate_department_salary')
BEGIN
    DROP PROCEDURE sp_calculate_department_salary;
END
GO

CREATE PROCEDURE sp_calculate_department_salary
AS
BEGIN
    SET NOCOUNT ON; 

    SELECT
        e.department_code, 
        -- Sử dụng FORMAT('en-US') để tạo dấu phẩy, sau đó dùng REPLACE để loại bỏ '.00'
        REPLACE(FORMAT(SUM(e.basic_salary), 'N0', 'en-US'), '.00', '') AS total_basic_salary,  
        REPLACE(FORMAT(SUM(pd.gross_salary), 'N0', 'en-US'), '.00', '') AS total_gross_salary, 
        REPLACE(FORMAT(SUM(pd.net_salary), 'N0', 'en-US'), '.00', '') AS total_net_salary      
    FROM
        employee e
    JOIN 
        payroll_detail pd ON e.employee_code = pd.employee_code
    GROUP BY
        e.department_code
    ORDER BY
        e.department_code ASC; 
END
GO

-- PHẦN 5: THỰC THI (Đã điều chỉnh định dạng bằng FORMAT và REPLACE)

-- 1. Thực thi Stored Procedure đã cập nhật
EXEC sp_calculate_department_salary;
GO

-- 2. Xem toàn bộ dữ liệu trong bảng employee
SELECT * FROM employee;
GO

-- 3. Xem toàn bộ dữ liệu trong bảng payroll_detail
SELECT * FROM payroll_detail;
GO

-- 4. Lệnh JOIN để xem tổng hợp dữ liệu lương của tất cả nhân viên (Đã định dạng quốc tế)
SELECT 
    e.employee_code,
    e.employee_name,
    d.department_name, 
    REPLACE(FORMAT(e.basic_salary, 'N0', 'en-US'), '.00', '') AS basic_salary_formatted,
    REPLACE(FORMAT(pd.gross_salary, 'N0', 'en-US'), '.00', '') AS gross_salary_formatted,
    REPLACE(FORMAT(pd.net_salary, 'N0', 'en-US'), '.00', '') AS net_salary_formatted
FROM 
    employee e
JOIN 
    payroll_detail pd ON e.employee_code = pd.employee_code
JOIN
    department d ON e.department_code = d.department_code;
GO