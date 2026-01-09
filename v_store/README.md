# V_Store - Item Sale Management System

V_Store is a Laravel-based web application designed to manage sales items efficiently. It provides a robust CRUD interface, bilingual support (English/Vietnamese), and a user-friendly UI with search functionality and pagination.

---

## 🚀 Features

### 1. Item Management (CRUD)
- **Create**: Add new items with fields for Code, Name, Quantity, Expiration Date, and Notes.
    - *Validation*: Item Code (max 6 chars, alphanumeric), Item Name (no special chars), Quantity (numeric), Expired Date (required).
- **Read**: View a paginated list of items (13 items per page).
- **Update**: Edit existing item details.
- **Delete**: Remove items with confirmation.

### 2. Search Functionality 🔍
- **Quick Search**: Filter items by name using the search bar in the header.
- **Smart Results**: Displays matching items instantly while maintaining pagination.

### 3. Bilingual Support 🌍
- **Language Switching**: Toggle between **English** and **Vietnamese**.
- **Localization**: All UI labels, validation messages, and placeholders are localized.

### 4. UI/UX Enhancements 🎨
- **Modern Design**: Built with **Tailwind CSS**.
- **Interactive Elements**:
    - Hover effects on rows and buttons.
    - SVG Icons for actions (Search, Add, Edit, Delete, Cancel, Save).
    - Responsive grid layout for forms.
- **Pagination**: Customized pagination links (13 items/page) to handle large datasets.

---

## 🛠 Tech Stack
- **Framework**: Laravel 11.x
- **Language**: PHP 8.2+
- **Database**: MySQL
- **Frontend**: Blade Templates, Tailwind CSS
- **Tools**: Composer, Artisan

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/YourUsername/v_store.git
cd v_store
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
Copy the example environment file and configure your database settings:
```bash
cp .env.example .env
```
Update `.env` with your MySQL credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=v_store
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Migrate & Seed Database
Create the tables and seed default data (Page 1: Exam Data, Page 2: Office Supplies):
```bash
php artisan migrate:refresh --seed
```

### 6. Run the Application
Start the local development server:
```bash
php artisan serve
```
Access the app at: [http://localhost:8000/items](http://localhost:8000/items)

---

## 🧪 Testing

### Manual Verification
1.  **Home Page**: Visit `/items` to see the list (Page 1 has default Coca, Bim data).
2.  **Pagination**: Click "2" to see Page 2 (Office Supplies).
3.  **Search**: Enter "Note" in the search bar to see notebook items.
4.  **Add Item**: Click "Add New Item", fill the form, and Save.
5.  **Edit/Delete**: Use the action buttons on the right side of the table.

---

## 👤 Author
**Le Tri Phuong** - *V_Store Project*
