# V_Store - Item Management System

Practical Exam Project for **PHP Development with Laravel Framework** (PHPL - SET02).

Student Name: Nguyen Tran Xuan Cuong - 
Student ID: FTH00062 - 
Date: 09/01/2026

## Project Description
V_Store is a web application designed to manage sales items. It provides a complete solution to view, add, update, and delete items with strict validation rules and a polished user interface.

**Exam Requirements Met:**
* **Database:** MySQL with table `item_sale`.
* **Validation:** Prevents special characters in Item Code and Name using Regex.
* **CRUD Operations:** List, Add, Edit (Required) + Delete (Extra).
* **UI/UX:** Modern interface using **Bootstrap 5** with custom styling, icons, and responsive design.

---

## Tech Stack
* **Framework:** Laravel 12.x
* **Language:** PHP 8.2+
* **Database:** MySQL
* **Frontend:** Blade Templates + Bootstrap 5 (CDN) + FontAwesome

---

## 🛠 Installation & Setup

Follow these steps to run the project locally:

### 1. Clone or Download
Extract the project files to your local machine.

### 2. Install Dependencies
Open your terminal in the project directory and run:
```bash
 - composer install
 - cp .env.example .env
 - .env:
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=v_store
     DB_USERNAME=root
     DB_PASSWORD=
 - php artisan key:generate
 - php artisan migrate
 - php artisan serve
```
