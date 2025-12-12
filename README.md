# SEM1_T2508M_Test

Đây là project cho bài test môn T2508M, bao gồm normalization database và SQL scripts.

## Yêu cầu
1. (6 điểm) Dựa trên bảng lương, sử dụng mô hình ER để xây dựng các bảng dữ liệu theo chuẩn hóa 1NF, 2NF, 3NF.
2. (6 điểm) Viết script tạo database, bảng và chèn dữ liệu.
3. (3 điểm) Viết stored procedure tính tổng lương nhân viên theo từng phòng ban, sắp xếp theo mã phòng ban tăng dần.

## Cấu trúc project
- `Database/normalization.md`: Giải thích quá trình chuẩn hóa database
- `Database/create_database.sql`: Script SQL tạo database, bảng và chèn dữ liệu
- `Database/stored_procedure.sql`: Stored procedure tính tổng lương theo phòng ban

## Cách chạy
- Chạy script `create_database.sql` trong SQL Server để tạo database và dữ liệu.
- Chạy `stored_procedure.sql` để tạo procedure, sau đó thực thi `EXEC GetTotalSalariesByDepartment;` để xem kết quả.