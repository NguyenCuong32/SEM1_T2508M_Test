SELECT
    e.EmployeeCode,
    e.EmployeeName,
    e.DepartmentCode,
    d.DepartmentName,
    a.WorkingDays,
    a.DaysOffWithPay,
    a.DaysOffWithoutPay,
    e.BasicSalary,
    -- calculate the total salaries of employees
    e.BasicSalary * a.WorkingDays AS GrossSalary,
    e.BasicSalary * a.WorkingDays - (a.DaysOffWithoutPay * e.BasicSalary) AS NetSalary,
    a.Note
FROM Employee e
INNER JOIN Attendance a
    ON e.EmployeeCode = a.EmployeeCode
LEFT JOIN Department d
    ON e.DepartmentCode = d.DepartmentCode
ORDER BY e.EmployeeCode;
