-- 1. Tạo Database
CREATE DATABASE EmployeeManagement;
GO

USE EmployeeManagement;
GO

-- 2. Tạo bảng Departments (Phòng ban)
CREATE TABLE departments (
    department_code VARCHAR(10) PRIMARY KEY, -- Mã phòng ban là khóa chính
    department_name NVARCHAR(100)            -- Tên phòng ban
);
GO

-- 3. Tạo bảng Employees (Nhân viên)
CREATE TABLE employees (
    employee_code VARCHAR(10) PRIMARY KEY,   -- Mã nhân viên là khóa chính
    full_name NVARCHAR(100) NOT NULL,        -- Tên nhân viên (có dấu tiếng Việt)
    department_code VARCHAR(10),             -- Khóa ngoại liên kết phòng ban
    basic_salary DECIMAL(18, 2),             -- Lương cơ bản
    FOREIGN KEY (department_code) REFERENCES departments(department_code)
);
GO

-- 4. Tạo bảng Monthly_Payrolls (Bảng lương)
CREATE TABLE monthly_payrolls (
    payroll_id INT IDENTITY(1,1) PRIMARY KEY, -- ID tự tăng
    employee_code VARCHAR(10),                -- Khóa ngoại liên kết nhân viên
    working_days FLOAT,                       -- Số ngày công (có thể lẻ)
    paid_leave_days INT,                      -- Ngày nghỉ có lương
    unpaid_leave_days INT,                    -- Ngày nghỉ không lương
    gross_salary DECIMAL(18, 2),              -- Lương gộp
    net_salary DECIMAL(18, 2),                -- Lương thực nhận
    note NVARCHAR(255),                       -- Ghi chú
    FOREIGN KEY (employee_code) REFERENCES employees(employee_code)
);
GO

-- 5. Insert dữ liệu (Thực hiện theo thứ tự: Departments -> Employees -> Payrolls)

-- Thêm dữ liệu Phòng ban trước
INSERT INTO departments (department_code, department_name) VALUES
('IT', N'Công nghệ thông tin'),
('HR', N'Nhân sự'),
('SALE', N'Kinh doanh');

-- Thêm dữ liệu Nhân viên
-- Lưu ý: Basic salary trong hình là 1.000, 1.200 (đơn vị nghìn), tôi sẽ nhập đúng số liệu hình ảnh.
INSERT INTO employees (employee_code, full_name, department_code, basic_salary) VALUES
('A1', N'Nguyễn Văn A', 'IT', 1000),
('A2', N'Lê Thị Bình', 'IT', 1200),
('B1', N'Nguyễn Lan', 'HR', 600),
('D1', N'Mai Tuấn Anh', 'HR', 500),
('C1', N'Hà Thị Lan', 'HR', 500),
('C2', N'Lê Tú Chinh', 'SALE', 1200),
('D2', N'Trần Văn Toàn', 'HR', 500),
('A3', N'Trần Văn Nam', 'IT', 1200),
('B2', N'Huỳnh Anh', 'SALE', 1200);

-- Thêm dữ liệu Bảng lương (Dữ liệu từ hình ảnh)
INSERT INTO monthly_payrolls (employee_code, working_days, paid_leave_days, unpaid_leave_days, gross_salary, net_salary, note) VALUES
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

