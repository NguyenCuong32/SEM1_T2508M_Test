-- Tạo Stored Procedure
CREATE PROCEDURE GetTotalSalariesByDepartment
AS
BEGIN
    -- Sử dụng SET NOCOUNT ON để tránh hiển thị thông báo "x rows affected" làm nhiễu kết quả
    SET NOCOUNT ON;

    SELECT 
        d.department_code,                  -- Mã phòng ban
        d.department_name,                  -- Tên phòng ban (lấy từ bảng Departments)
        SUM(p.gross_salary) AS total_gross, -- Tổng lương Gross
        SUM(p.net_salary) AS total_net      -- Tổng lương Net
    FROM 
        departments d
    JOIN 
        employees e ON d.department_code = e.department_code
    JOIN 
        monthly_payrolls p ON e.employee_code = p.employee_code
    GROUP BY 
        d.department_code, d.department_name
    ORDER BY 
        d.department_code ASC; -- Sắp xếp mã phòng ban tăng dần
END;
GO

-- Lệnh để chạy thử Procedure:
EXEC GetTotalSalariesByDepartment;