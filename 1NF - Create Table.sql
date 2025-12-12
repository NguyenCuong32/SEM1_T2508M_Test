CREATE TABLE SalaryRaw (
    EmployeeCode VARCHAR(10) PRIMARY KEY,
    EmployeeName NVARCHAR(100) NOT NULL,
    DepartmentCode VARCHAR(20) NOT NULL,
    WorkingDays INT NOT NULL,
    DaysOffWithPay INT NOT NULL,
    DaysOffWithoutPay INT NOT NULL,
    BasicSalary DECIMAL(18,3) NOT NULL,
    GrossSalary DECIMAL(18,3) NOT NULL,
    NetSalary DECIMAL(18,3) NOT NULL,
    Note NVARCHAR(255)
);
