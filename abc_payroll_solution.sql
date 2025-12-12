-- DMS Exam Practice: ABC Company Payroll

-- PHẦN 1: TẠO DATABASE
IF NOT EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name = N'ABC_Company_Payroll')
BEGIN
    CREATE DATABASE ABC_Company_Payroll;
END
GO

USE ABC_Company_Payroll;
GO

-- PHẦN 2: TẠO CÁC BẢNG (YÊU CẦU 1 - CHUẨN 3NF VỚI BỔ SUNG)

-- Bảng 1: department (Bảng mới - Quản lý danh mục phòng ban)
CREATE TABLE department (
    department_code CHAR(4) PRIMARY KEY,
    department_name NVARCHAR(50) -- Tên phòng ban đầy đủ (Ví dụ bổ sung)
);
GO

-- Bảng 2: employee (Thông tin nhân viên cố định)
CREATE TABLE employee (
    employee_code CHAR(2) PRIMARY KEY,
    employee_name NVARCHAR(50) NOT NULL,
    department_code CHAR(4) NOT NULL,
    basic_salary DECIMAL(10, 3) NOT NULL, -- Lương cơ bản
    
    -- Thiết lập Khóa ngoại tham chiếu đến bảng department
    FOREIGN KEY (department_code) REFERENCES department(department_code)
);
GO

-- Bảng 3: payroll_detail (Chi tiết lương tháng 10)
CREATE TABLE payroll_detail (
    employee_code CHAR(2) PRIMARY KEY,
    working_days INT NOT NULL, 
    paid_days_off INT NOT NULL, 
    unpaid_days_off INT NOT NULL, 
    gross_salary DECIMAL(12, 3), 
    net_salary DECIMAL(12, 3), 
    note NVARCHAR(100), 
    
    -- Thiết lập Khóa ngoại tham chiếu đến bảng employee
    FOREIGN KEY (employee_code) REFERENCES employee(employee_code)
);
GO

-- PHẦN 3: CHÈN DỮ LIỆU (INSERT THEO YÊU CẦU 2)

-- Chèn dữ liệu vào bảng department (Bổ sung)
INSERT INTO department (department_code, department_name) VALUES
('IT', N'Information Technology'),
('HR', N'Human Resources'),
('SALE', N'Sales');
GO

-- Chèn dữ liệu vào bảng employee
INSERT INTO employee (employee_code, employee_name, department_code, basic_salary) VALUES
('A1', N'Nguyễn Văn A', 'IT', 1.000),
('A2', N'Lê Thi Bình', 'IT', 1.200),
('B1', N'Nguyễn Lan', 'HR', 600),
('D1', N'Mai Tuân Anh', 'HR', 500),
('C1', N'Hà Thị Lan', 'HR', 500),
('C2', N'Lê Tú Chinh', 'SALE', 1.200),
('D2', N'Trần Văn Toàn', 'HR', 500),
('A3', N'Trần Văn Nam', 'IT', 1.200),
('B2', N'Huỳnh Anh', 'SALE', 1.200);
GO

-- Chèn dữ liệu vào bảng payroll_detail (tháng 10)
INSERT INTO payroll_detail (employee_code, working_days, paid_days_off, unpaid_days_off, gross_salary, net_salary, note) VALUES
('A1', 22, 0, 0, 22.000, 20.000, NULL),
('A2', 21, 1, 0, 26.400, 23.000, NULL),
('B1', 20, 1, 1, 13.200, 12.000, NULL),
('D1', 20, 1, 1, 11.000, 10.000, NULL),
('C1', 22, 0, 0, 11.000, 10.000, NULL),
('C2', 22, 0, 0, 26.400, 23.000, NULL),
('D2', 22, 0, 0, 11.000, 10.000, NULL),
('A3', 22, 0, 0, 26.400, 23.000, NULL),
('B2', 21, 1, 0, 26.400, 23.000, NULL);
GO

-- PHẦN 4: STORED PROCEDURE (YÊU CẦU 3)

-- Viết stored procedure tính tổng lương (Gross salary) theo từng phòng ban
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
        SUM(pd.gross_salary) AS total_gross_salary
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

-- PHẦN 5: THỰC THI VÀ KIỂM TRA

-- Thực thi Stored Procedure để kiểm tra yêu cầu 3
EXEC sp_calculate_department_salary;
GO

-- 1. Xem toàn bộ dữ liệu trong bảng employee
SELECT * FROM employee;
GO

-- 2. Xem toàn bộ dữ liệu trong bảng payroll_detail
SELECT * FROM payroll_detail;
GO

-- 3. Lệnh JOIN để xem tổng hợp dữ liệu lương của tất cả nhân viên
SELECT 
    e.employee_code,
    e.employee_name,
    d.department_name, -- Lấy tên phòng ban từ bảng mới
    e.basic_salary,
    pd.gross_salary,
    pd.net_salary
FROM 
    employee e
JOIN 
    payroll_detail pd ON e.employee_code = pd.employee_code
JOIN
    department d ON e.department_code = d.department_code;
GO