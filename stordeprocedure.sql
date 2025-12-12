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

CREATE PROCEDURE Get_All_Employees_Detail
AS
BEGIN
    SELECT
        E.EmployeeCode,
        E.EmployeeName,
        D.DepartmentName,
        E.BasicSalary
    FROM
        Employees E
    JOIN
        Departments D ON E.DepartmentCode = D.DepartmentCode;
END;
GO

CREATE PROCEDURE Calculate_GrossSalary_By_Dept
    @DeptCode VARCHAR(10)
AS
BEGIN
    SELECT
        D.DepartmentName,
        SUM(P.GrossSalary) AS TotalGrossSalary
    FROM
        Employees E
    JOIN
        Departments D ON E.DepartmentCode = D.DepartmentCode
    JOIN
        Payroll P ON E.EmployeeCode = P.EmployeeCode
    WHERE
        E.DepartmentCode = @DeptCode
    GROUP BY
        D.DepartmentName;
END;
GO