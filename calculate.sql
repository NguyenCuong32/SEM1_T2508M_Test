CREATE PROCEDURE total_salaries_by_dept
AS
BEGIN
    SELECT 
        d.dept_code,
        d.dept_name,
        SUM(p.gross_salary) AS total_gross_salary,
        SUM(p.net_salary) AS total_net_salary,
        COUNT(e.employee_code) AS employee_count
    FROM departments d
    INNER JOIN employees e
        ON e.dept_code = d.dept_code
    INNER JOIN payroll_records p
        ON p.employee_code = e.employee_code
    GROUP BY d.dept_code, d.dept_name
    ORDER BY d.dept_code ASC;
END;
GO

 SELECT 
        d.dept_code,
        d.dept_name,
        SUM(p.gross_salary) AS total_gross_salary,
        SUM(p.net_salary) AS total_net_salary,
        COUNT(e.employee_code) AS employee_count
    FROM departments d
    INNER JOIN employees e
        ON e.dept_code = d.dept_code
    INNER JOIN payroll_records p
        ON p.employee_code = e.employee_code
    GROUP BY d.dept_code, d.dept_name
    ORDER BY d.dept_code ASC;
