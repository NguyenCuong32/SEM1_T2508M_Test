# 🚀 ABC Company Payroll - Database Solution (DMS Exam)

Đây là giải pháp triển khai database cho bài tập DMS (Intelligent Data Management with SQL Server) dựa trên bảng lương tháng 10 của công ty ABC.

## 🛠️ Cấu trúc Giải Pháp

Toàn bộ giải pháp nằm trong file `abc_payroll_solution.sql` và được xây dựng dựa trên nguyên tắc **Chuẩn hóa dữ liệu (3NF)** và **T-SQL** cho SQL Server.

### 1. Mô hình Quan hệ (3NF)

Database được thiết kế với 3 bảng, sử dụng quy tắc đặt tên **snake_case** và thiết lập các ràng buộc **Khóa Chính (PK)** và **Khóa Ngoại (FK)** chặt chẽ:

| Tên Bảng | Vai trò | Khóa Chính | Khóa Ngoại |
| :--- | :--- | :--- | :--- |
| `department` | Danh mục phòng ban | `department_code` | |
| `employee` | Thông tin nhân viên cố định | `employee_code` | FK: `department_code` (tham chiếu đến `department`) |
| `payroll_detail` | Chi tiết lương tháng 10 | `employee_code` | FK: `employee_code` (tham chiếu đến `employee`) |

### 2. Các Bước Thực thi trong Script

File SQL thực hiện tuần tự các bước sau:

* **Tạo Database:** Tạo database có tên `ABC_Company_Payroll`.
* **Tạo Bảng:** Khởi tạo 3 bảng như mô tả ở trên.
* **Chèn Dữ liệu:** Chèn toàn bộ dữ liệu gốc từ đề bài vào các bảng.
* **Tạo Stored Procedure (SP):** Tạo SP có tên `sp_calculate_department_salary` để thực hiện yêu cầu tính toán.

### 3. Stored Procedure (Yêu cầu 3)

Thủ tục lưu trữ `sp_calculate_department_salary` được viết để:
* Tính **Tổng Lương Gộp** (`SUM(gross_salary)`).
* Gom nhóm theo **Mã Phòng Ban** (`GROUP BY department_code`).
* Sắp xếp kết quả theo **Mã Phòng Ban Tăng Dần** (`ORDER BY department_code ASC`).

### 4. Kiểm tra Kết quả

Cuối file script bao gồm các lệnh `EXEC` và `SELECT` để kiểm tra:
* `EXEC sp_calculate_department_salary;` (Kiểm tra kết quả tổng lương).
* Các lệnh `SELECT *` và `JOIN` để xác nhận dữ liệu đã chèn đúng và các quan hệ hoạt động chính xác.

## 🚀 Hướng dẫn Chạy Code

Để triển khai giải pháp:

1.  Mở file `abc_payroll_solution.sql` trong **SQL Server Management Studio (SSMS)**.
2.  Chạy (Execute) toàn bộ script.

---
*Đỗ Khắc Gia Khoa - FTH00042 - T2508M - Aptech*