# ABC Company Payroll Database

## 📋 Mô tả

Hệ thống quản lý lương của công ty ABC sử dụng SQL Server. Dự án này bao gồm database được chuẩn hóa (1NF, 2NF, 3NF) và stored procedure để tính toán lương theo phòng ban.

## 🗂️ Cấu trúc Database

### Bảng 1: Department (Phòng ban)
- `Department_code` (PK)
- `Department_name`

### Bảng 2: Employee (Nhân viên)
- `Employee_code` (PK)
- `Employee_name`
- `Department_code` (FK)

### Bảng 3: Payroll (Bảng lương)
- `Payroll_ID` (PK - Identity)
- `Employee_code` (FK)
- `Working_days`
- `Days_off_with_pay`
- `Days_off_without_pay`
- `Basic_salary`
- `Gross_salary`
- `Net_salary`
- `Payroll_month`
- `Payroll_year`
- `Note`

## 🚀 Cách sử dụng

### 1. Tạo Database và Tables

```powershell
sqlcmd -S localhost -E -i "ABC_Company_Payroll_Database.sql"
```

### 2. Chạy Stored Procedure

```sql
USE ABC_Company_Payroll;
GO

EXEC sp_CalculateTotalSalariesByDepartment 
    @Payroll_month = 10, 
    @Payroll_year = 2024;
```

### 3. Xem dữ liệu

```sql
-- Xem tất cả phòng ban
SELECT * FROM Department;

-- Xem tất cả nhân viên
SELECT * FROM Employee;

-- Xem bảng lương tháng 10/2024
SELECT * FROM Payroll WHERE Payroll_month = 10 AND Payroll_year = 2024;
```

## 📊 Dữ liệu mẫu

Database chứa dữ liệu bảng lương tháng 10/2024 với:
- **3 phòng ban**: HR, IT, SALE
- **9 nhân viên**
- **Tổng lương**: 173.800 (Gross) / 154.000 (Net)

## 📁 Các file trong dự án

- `ABC_Company_Payroll_Database.sql` - Script chính tạo database và stored procedure
- `Verification_Queries.sql` - Queries kiểm tra và xác thực dữ liệu
- `Verification_Results.txt` - Kết quả thực thi chi tiết
- `KET_QUA_BAI_TAP.md` - Tài liệu tóm tắt kết quả

## ⚙️ Yêu cầu hệ thống

- SQL Server 2016 trở lên
- SQL Server Command Line Tools (sqlcmd)

## 📝 Tác giả

Bài tập thực hành DMS (Intelligent Data Management with SQL Server)

## 📅 Ngày tạo

Tháng 12/2024
