CREATE TABLE Department (
    DepartmentCode VARCHAR(20) PRIMARY KEY,
    DepartmentName NVARCHAR(100) NULL
);

CREATE TABLE Employee (
    EmployeeCode VARCHAR(10) PRIMARY KEY,
    EmployeeName NVARCHAR(100) NOT NULL,
    DepartmentCode VARCHAR(20) NOT NULL,
    BasicSalary DECIMAL(18,3) NOT NULL,
    FOREIGN KEY (DepartmentCode) REFERENCES Department(DepartmentCode)
);

CREATE TABLE Attendance (
    AttendanceID INT IDENTITY PRIMARY KEY,
    EmployeeCode VARCHAR(10) NOT NULL,
    WorkingDays INT NOT NULL,
    DaysOffWithPay INT NOT NULL,
    DaysOffWithoutPay INT NOT NULL,
    Note NVARCHAR(255) NULL,
    FOREIGN KEY (EmployeeCode) REFERENCES Employee(EmployeeCode)
);

CREATE TABLE SalaryCalculation (
    SalaryCalcID INT IDENTITY PRIMARY KEY,
    EmployeeCode VARCHAR(10) NOT NULL,
    AttendanceID INT NOT NULL,
    GrossSalary DECIMAL(18,3) NOT NULL,
    NetSalary DECIMAL(18,3) NOT NULL,
    FOREIGN KEY (EmployeeCode) REFERENCES Employee(EmployeeCode),
    FOREIGN KEY (AttendanceID) REFERENCES Attendance(AttendanceID)
);
