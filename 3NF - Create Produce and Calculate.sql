CREATE PROCEDURE sp_TotalSalaryByDepartment
AS
BEGIN
    SET NOCOUNT ON;

    SELECT
        e.DepartmentCode,
        d.DepartmentName,
        SUM(e.BasicSalary * a.WorkingDays) AS TotalSalary
    FROM Employee e
    INNER JOIN Attendance a
        ON e.EmployeeCode = a.EmployeeCode
    LEFT JOIN Department d
        ON e.DepartmentCode = d.DepartmentCode
    GROUP BY e.DepartmentCode, d.DepartmentName
    ORDER BY e.DepartmentCode ASC;
END;
GO

EXEC sp_TotalSalaryByDepartment;
