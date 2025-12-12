INSERT INTO Department (DepartmentCode, DepartmentName)
VALUES 
('IT', N'Information Technology'),
('HR', N'Human Resources'),
('SALE', N'Sales');

INSERT INTO Employee (EmployeeCode, EmployeeName, DepartmentCode, BasicSalary)
VALUES
('A1', N'Nguyễn Văn A', 'IT', 1000),
('A2', N'Lê Thị Bình', 'IT', 1200),
('B1', N'Nguyễn Lan', 'HR', 600),
('D1', N'Mai Tuấn Anh', 'HR', 500),
('C1', N'Hà Thị Lan', 'HR', 500),
('C2', N'Lê Tú Chinh', 'SALE', 1200),
('D2', N'Trần Văn Toàn', 'HR', 500),
('A3', N'Trân Văn Nam', 'IT', 1200),
('B2', N'Huỳnh Anh', 'SALE', 1200);

INSERT INTO Attendance (EmployeeCode, WorkingDays, DaysOffWithPay, DaysOffWithoutPay, Note)
VALUES
('A1', 22, 0, 0, NULL),
('A2', 21, 1, 0, NULL),
('B1', 20, 1, 1, NULL),
('D1', 20, 1, 1, NULL),
('C1', 22, 0, 0, NULL),
('C2', 22, 0, 0, NULL),
('D2', 22, 0, 0, NULL),
('A3', 22, 0, 0, NULL),
('B2', 21, 1, 0, NULL);
