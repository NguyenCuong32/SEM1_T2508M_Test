-- Stored Procedure to calculate total salaries of employees in each department
-- Arranged by department code in ascending order

USE SEM1_T2508M_Test;
GO

CREATE PROCEDURE GetTotalSalariesByDepartment
AS
BEGIN
    SELECT 
        d.DeptID,
        d.DeptName,
        SUM(e.Salary) AS TotalSalary
    FROM 
        Department d
    INNER JOIN 
        Employee e ON d.DeptID = e.DeptID
    GROUP BY 
        d.DeptID, d.DeptName
    ORDER BY 
        d.DeptID ASC;
END;
GO

-- To execute the procedure:
-- EXEC GetTotalSalariesByDepartment;