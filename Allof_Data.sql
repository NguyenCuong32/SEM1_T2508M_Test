-- 6. Chèn dữ liệu mẫu (Department)
INSERT INTO dbo.Department (DepartmentCode, DepartmentName) VALUES
(N'IT', N'Information Technology'),
(N'HR', N'Human Resources'),
(N'SALE', N'Sales');
GO

-- 7. Chèn dữ liệu mẫu (Employee)
INSERT INTO dbo.Employee (EmployeeCode, EmployeeName, DepartmentCode, BasicDailySalary) VALUES
(N'A1', N'Nguyễn Văn A', N'IT', 1000.00),
(N'A2', N'Lê Thị Bình', N'IT', 1200.00),
(N'B1', N'Nguyễn Lan', N'HR', 600.00),
(N'D1', N'Mai Tuấn Anh', N'HR', 500.00),
(N'C1', N'Hà Thị Lan', N'HR', 500.00),
(N'C2', N'Lê Tú Chinh', N'SALE', 1200.00),
(N'D2', N'Trần Văn Toàn', N'HR', 500.00),
(N'A3', N'Trần Văn Nam', N'IT', 1200.00),
(N'B2', N'Huỳnh Anh', N'SALE', 1200.00);
GO


INSERT INTO dbo.PayrollRecord (EmployeeCode, PeriodMonth, PeriodYear, WorkingDays, DaysOffWithPay, DaysOffWithoutPay, GrossSalary, NetSalary, [Note]) VALUES
(N'A1', 10, 2025, 22, 0, 0, 22000.00, 20000.00, NULL),
(N'A2', 10, 2025, 21, 1, 0, 26400.00, 23000.00, NULL),
(N'B1', 10, 2025, 20, 1, 1, 13200.00, 12000.00, NULL),
(N'D1', 10, 2025, 20, 1, 1, 11000.00, 10000.00, NULL),
(N'C1', 10, 2025, 22, 0, 0, 11000.00, 10000.00, NULL),
(N'C2', 10, 2025, 22, 0, 0, 26400.00, 23000.00, NULL),
(N'D2', 10, 2025, 22, 0, 0, 11000.00, 10000.00, NULL),
(N'A3', 10, 2025, 22, 0, 0, 26400.00, 23000.00, NULL),
(N'B2', 10, 2025, 21, 1, 0, 26400.00, 23000.00, NULL);
GO



CREATE PROCEDURE dbo.sp_TotalSalaryByDept
    @Month INT,
    @Year INT
AS
BEGIN
    SET NOCOUNT ON;

    SELECT
        d.DepartmentCode,
        d.DepartmentName,
        ISNULL(SUM(pr.NetSalary), 0) AS TotalNetSalary
    FROM dbo.Department d
    LEFT JOIN dbo.Employee e ON e.DepartmentCode = d.DepartmentCode
    LEFT JOIN dbo.PayrollRecord pr
        ON pr.EmployeeCode = e.EmployeeCode
        AND pr.PeriodMonth = @Month
        AND pr.PeriodYear = @Year
    GROUP BY d.DepartmentCode, d.DepartmentName
    ORDER BY d.DepartmentCode ASC;
END;
GO


EXEC dbo.sp_TotalSalaryByDept @Month = 10, @Year = 2025;
GO