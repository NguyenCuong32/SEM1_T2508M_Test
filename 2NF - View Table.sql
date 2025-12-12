SELECT
    e.EmployeeCode,
    e.EmployeeName,
    e.DepartmentCode,
    s.WorkingDays,
    s.DaysOffWithPay,
    s.DaysOffWithoutPay,
    e.BasicSalary,
    s.GrossSalary,
    s.NetSalary,
    s.Note
FROM Employee e
INNER JOIN Salary s
    ON e.EmployeeCode = s.EmployeeCode
ORDER BY e.EmployeeCode;
