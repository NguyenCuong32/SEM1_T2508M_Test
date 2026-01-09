# PHP Development with Laravel Framework

Create project:
```bash
composer create-project laravel/laravel v_store
```

## 1.1. Use migrate to create a database for Mysql.

Create database:
```bash
CREATE DATABASE v_store;
```

Create `ItemSale` model with migration.
```bash
php artisan make:model ItemSale -m
```

In the migration, define the table schema by specifying its columns, data types, and constraints. For more information, see `database\migrations\2026_01_09_011631_create_item_sale_table.php`

Then migration:
```bash
php artisan migrate
```

## 1.2. Validate: item_code and item_name are required, do not contain special characters.

Create controller:
```bash
php artisan make:controller ItemSaleController
```

Applied the `required` rule to ensure `item_code` and `item_name` must be provided in `app\Http\Controllers\ItemSaleController.php`, both in the `store` and `update` methods.

To prevent special characters, use regular expression validation rule: `regex:/^[a-zA-Z0-9 ]+$/`, which only allow letters, numbers, and spaces.

## 1.3. The Add New function allows adding Items to the database from the Website interface.

