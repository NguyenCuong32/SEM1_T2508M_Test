CREATE PROCEDURE sp_TotalSalaryByDepartment
AS
BEGIN
    SELECT 
        E.dept_code,
        SUM(S.net_salary) AS total_salary
    FROM Employee E
    JOIN Salary S
        ON E.employee_code = S.employee_code
    GROUP BY E.dept_code
    ORDER BY E.dept_code ASC;
END;
GO
