-- ================================================
-- Template generated from Template Explorer using:
-- Create Procedure (New Menu).SQL
--
-- Use the Specify Values for Template Parameters 
-- command (Ctrl-Shift-M) to fill in the parameter 
-- values below.
--
-- This block of comments will not be included in
-- the definition of the procedure.
-- ================================================
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE CalculateTotalSalaryByDepartment
AS
BEGIN
    SELECT 
        d.DepartmentCode,
        SUM(p.NetSalary) AS TotalNetSalary,
        SUM(p.GrossSalary) AS TotalGrossSalary 
    FROM 
        Departments d
    JOIN 
        Employees e ON d.DepartmentCode = e.DepartmentCode
    JOIN 
        Payroll p ON e.EmployeeCode = p.EmployeeCode
    WHERE 
        p.PayrollMonth = 10 
    GROUP BY 
        d.DepartmentCode 
    ORDER BY 
        d.DepartmentCode ASC; 
END;
GO

CREATE PROCEDURE GetFullPayrollReport
    @Month INT = 10
AS
BEGIN
    SELECT 
        e.EmployeeCode AS [Employee code],
        e.EmployeeName AS [Employee name],
        e.DepartmentCode AS [Department code],
        p.WorkingDays AS [Number of working day],
        p.OffDaysWithPay AS [Number of days off with pay],
        p.OffDaysWithoutPay AS [Number of days off without pay],
        FORMAT(e.BasicSalary, '#,##0') AS [Basic salary], -- Format số cho đẹp giống ảnh (tuỳ chọn)
        FORMAT(p.GrossSalary, '#,##0') AS [Gross salary],
        FORMAT(p.NetSalary, '#,##0') AS [Net Salary],
        p.Note AS [Note]
    FROM 
        Employees e
    INNER JOIN 
        Payroll p ON e.EmployeeCode = p.EmployeeCode
    INNER JOIN 
        Departments d ON e.DepartmentCode = d.DepartmentCode
    WHERE 
        p.PayrollMonth = @Month;
END;
GO

GO
