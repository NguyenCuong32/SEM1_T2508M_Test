-- ====================================================
-- VERIFICATION QUERIES
-- ABC Company Payroll Database
-- ====================================================

USE ABC_Company_Payroll;
GO

-- Display all tables
PRINT '====================================================';
PRINT 'TABLE 1: DEPARTMENT';
PRINT '====================================================';
SELECT * FROM Department ORDER BY Department_code;
GO

PRINT '';
PRINT '====================================================';
PRINT 'TABLE 2: EMPLOYEE';
PRINT '====================================================';
SELECT * FROM Employee ORDER BY Department_code, Employee_code;
GO

PRINT '';
PRINT '====================================================';
PRINT 'TABLE 3: PAYROLL (October 2024)';
PRINT '====================================================';
SELECT 
    Payroll_ID,
    Employee_code,
    Working_days,
    Days_off_with_pay,
    Days_off_without_pay,
    Basic_salary,
    Gross_salary,
    Net_salary,
    Payroll_month,
    Payroll_year
FROM Payroll 
WHERE Payroll_month = 10 AND Payroll_year = 2024
ORDER BY Employee_code;
GO

PRINT '';
PRINT '====================================================';
PRINT 'REQUIREMENT 3: STORED PROCEDURE RESULT';
PRINT 'Total Salaries by Department (Ascending Order)';
PRINT '====================================================';
EXEC sp_CalculateTotalSalariesByDepartment @Payroll_month = 10, @Payroll_year = 2024;
GO

PRINT '';
PRINT '====================================================';
PRINT 'DETAILED VIEW: Employees with Department and Salary';
PRINT '====================================================';
SELECT 
    e.Employee_code AS [Mã NV],
    e.Employee_name AS [Tên NV],
    d.Department_code AS [Mã PB],
    d.Department_name AS [Phòng ban],
    p.Working_days AS [Ngày công],
    p.Days_off_with_pay AS [Nghỉ có lương],
    p.Days_off_without_pay AS [Nghỉ không lương],
    FORMAT(p.Basic_salary, 'N3') AS [Lương cơ bản],
    FORMAT(p.Gross_salary, 'N3') AS [Lương tổng],
    FORMAT(p.Net_salary, 'N3') AS [Lương thực lãnh]
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

PRINT '';
PRINT '====================================================';
PRINT 'SUMMARY BY DEPARTMENT';
PRINT '====================================================';
SELECT 
    d.Department_code AS [Mã phòng ban],
    d.Department_name AS [Tên phòng ban],
    COUNT(e.Employee_code) AS [Số nhân viên],
    FORMAT(SUM(p.Gross_salary), 'N3') AS [Tổng lương tổng],
    FORMAT(SUM(p.Net_salary), 'N3') AS [Tổng lương thực lãnh],
    FORMAT(AVG(p.Gross_salary), 'N3') AS [TB lương tổng],
    FORMAT(AVG(p.Net_salary), 'N3') AS [TB lương thực lãnh]
FROM 
    Department d
LEFT JOIN 
    Employee e ON d.Department_code = e.Department_code
LEFT JOIN 
    Payroll p ON e.Employee_code = p.Employee_code 
              AND p.Payroll_month = 10 
              AND p.Payroll_year = 2024
GROUP BY 
    d.Department_code, d.Department_name
ORDER BY 
    d.Department_code ASC;
GO

PRINT '';
PRINT '====================================================';
PRINT 'VERIFICATION COMPLETED!';
PRINT '====================================================';
