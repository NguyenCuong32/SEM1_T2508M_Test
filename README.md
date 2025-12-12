# 🚀 ABC Company Payroll - Database Solution (DMS Exam)

Đây là giải pháp triển khai database cho bài tập DMS (Intelligent Data Management with SQL Server) dựa trên bảng lương tháng 10 của công ty ABC.

---

## PHẦN 1: ✅ Đáp Ứng Các Yêu Cầu Của Đề Bài

Phần này mô tả cách file `abc_payroll_solution.sql` giải quyết 3 yêu cầu cốt lõi của đề bài.

### 1. Chuẩn hóa Dữ liệu (Yêu cầu 3NF)

* **Mô hình Quan hệ:** Dữ liệu gốc đã được chuẩn hóa thành 3 bảng để đảm bảo tiêu chuẩn **3NF**.
* **Cấu trúc Lương:** Các cột lương được định nghĩa là **`DECIMAL(X, 0)`** để lưu trữ các giá trị số nguyên lớn một cách chính xác.

| Tên Bảng | Vai trò | Kiểu dữ liệu cột Lương | Khóa Chính | Khóa Ngoại |
| :--- | :--- | :--- | :--- | :--- |
| `department` | Danh mục phòng ban | N/A | `department_code` | N/A |
| `employee` | Thông tin nhân viên | `DECIMAL(10, 0)` | `employee_code` | FK: `department_code` |
| `payroll_detail` | Chi tiết lương tháng 10 | `DECIMAL(12, 0)` | `employee_code` | FK: `employee_code` |

### 2. Script Triển khai Database

Script thực hiện tạo Database (`ABC_Company_Payroll`), tạo 3 bảng chuẩn hóa, và chèn đầy đủ dữ liệu gốc.

### 3. Stored Procedure (`sp_calculate_department_salary`)

Thủ tục lưu trữ này được tạo để:
* Tính **Tổng Lương Cơ Bản, Lương Gộp, và Lương Thực Nhận** theo từng phòng ban.
* Gom nhóm theo **`department_code`**.
* Sắp xếp kết quả theo **Mã Phòng Ban Tăng Dần**.

---

## PHẦN 2: ✨ Các Tính Năng Bổ Sung & Tác Dụng

Phần này mô tả các tính năng vượt trội được tích hợp vào script.

| Tính năng bổ sung | Tác dụng |
| :--- | :--- |
| 🧑‍💻 **Bảng `department` riêng biệt** | Đảm bảo **tính toàn vẹn tham chiếu** (Referential Integrity) và quản lý phòng ban hiệu quả hơn. |
| 🔄 **Khả năng chạy lại Script (Re-runnable)** | Sử dụng các lệnh **`IF EXISTS... DROP`** để script có thể chạy lại nhiều lần mà không gây lỗi xung đột đối tượng (ví dụ: `DROP TABLE employee` trước khi `CREATE`). |
| 📊 **Định dạng Quốc tế Ổn định** | Áp dụng giải pháp **`FORMAT` và `REPLACE`** để ép buộc hiển thị **dấu phẩy (`,`)** ngăn cách hàng nghìn theo chuẩn quốc tế, loại bỏ sự phụ thuộc vào cài đặt locale của máy chủ. |
| 📈 **Mở rộng tính năng SP** | Mở rộng SP để trả về tổng hợp tất cả **3 cột lương** (Basic, Gross, Net) thay vì chỉ một cột như yêu cầu tối thiểu, cung cấp báo cáo toàn diện. |

---

## 🚀 Hướng dẫn Chạy Code

1.  Mở file `abc_payroll_solution.sql` trong **SQL Server Management Studio (SSMS)**.
2.  Chạy (Execute) toàn bộ script để triển khai Database và xem kết quả.

---
*Prepared by: **Đỗ Khắc Gia Khoa** - Student ID: **FTH00042** - Class: **T2508M** - Center: **Aptech***