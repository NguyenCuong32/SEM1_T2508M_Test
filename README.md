# V_Store Items Premium

**Student Name:** Đỗ Khắc Gia Khoa
**Class:** T2508M
**Student ID:** FTH00042
**Subject:** PHP Development with Laravel Framework

---

## 📝 Answers to Exam Questions (Trả lời câu hỏi đề thi)

### Question 1.1: Create Database via Migration (2 marks)

- **Trạng thái:** ✅ Hoàn thành
- **Tập tin:** `database/migrations/2026_01_09_021347_create_item_sales_table.php`
- **Thực hiện:** Đã tạo bảng `item_sale` với các cột yêu cầu: `id`, `item_code`, `item_name`, `quantity`, `expried_date`, `note`.

### Question 1.2: Validation Logic (3 marks)

- **Trạng thái:** ✅ Hoàn thành
- **Tập tin:** `app/Http/Controllers/ItemSaleController.php` (phương thức `store` & `update`)
- **Logic:**
  - `item_code`: Required, Alpha-numeric, Max 6 chars.
  - `item_name`: Required, Regex (No special characters), Max 50 chars.
  - **Thông báo lỗi:** Chuẩn tiếng Anh.

### Question 1.3: "Add New" Function (3 marks)

- **Trạng thái:** ✅ Hoàn thành
- **Route:** `/item_sale/create`
- **View:** `resources/views/item_sale/create.blade.php`
- **Tính năng:** Form thêm mới chuẩn UI/UX với các cảnh báo validation.

### Question 1.4: Display List of Items (3 marks)

- **Trạng thái:** ✅ Hoàn thành
- **Route:** `/item_sale`
- **View:** `resources/views/item_sale/index.blade.php`
- **Tính năng:** Hiển thị danh sách sản phẩm. Ngày tháng định dạng `d/m/Y`.

### Question 1.5: "Edit" Function (3 marks)

- **Trạng thái:** ✅ Hoàn thành
- **Route:** `/item_sale/{id}/edit`
- **View:** `resources/views/item_sale/edit.blade.php`
- **Tính năng:** Form chỉnh sửa thông tin sản phẩm.

### 🌟 Bonus: Good UI/UX (1 mark)

- **Trạng thái:** ✅ Hoàn thành
- **Thực hiện:**
  - Sử dụng **Bootstrap 5** (Cards, Shadows, Badges).
  - Tích hợp **FontAwesome Icons**.
  - **Sample Data Seeder:** Có dữ liệu mẫu phong phú.
  - **Theme:** Jade Gradient (Xanh Ngọc).

---

## 🚀 Extended Features (Tính năng Mở rộng)

1.  **Strict English Content**: Giao diện và thông báo lỗi 100% Tiếng Anh.
2.  **Advanced Sorting**: Sắp xếp 2 chiều (Desc/Asc) cho tất cả cột.
3.  **UI Enhancements**:
    - **Header Styling**: Nền Xanh Ngọc Đậm (Solid Darker Jade `#00897b`) + Chữ trắng.
    - **Required Fields**: Dấu sao đỏ (`*`).
    - **Input Guidance**: Hướng dẫn giới hạn ký tự cho Note.
    - **Footer**: Bản quyền "© Dokhacgiakhoa 2026".
4.  **Data Quality**:
    - **Integer Quantity**: Chỉ nhận số nguyên.
    - **Rich Seeding**: 20+ item mẫu thực tế.

---

## 🛠️ How to Run (Hướng dẫn chạy)

1.  **Truy cập thư mục:**

    ```bash
    cd v_store
    ```

2.  **Setup Database:**

    ```bash
    php artisan migrate:refresh --seed
    ```

3.  **Run Server:**

    ```bash
    php artisan serve --host=localhost
    ```

4.  **Access URL:** [http://localhost:8000](http://localhost:8000)
