<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_sale')->truncate(); // Clean table before seeding

        $items = [
            // Original Exam Items (Updated with Realistic Data)
            // Beverages
            ['item_code' => 'Coca', 'item_name' => 'Coca cola', 'quantity' => 100, 'unit' => 'Can', 'product_date' => '2023-01-01', 'expried_date' => '2024-01-01', 'note' => null],
            ['item_code' => 'Bim', 'item_name' => 'Bim Bim', 'quantity' => 100, 'unit' => 'Pack', 'product_date' => '2023-08-01', 'expried_date' => '2024-02-01', 'note' => 'Discount'],
            ['item_code' => 'Lavie', 'item_name' => 'Lavie', 'quantity' => 100, 'unit' => 'Bottle', 'product_date' => '2023-01-01', 'expried_date' => '2025-01-01', 'note' => 'Discount'],
            ['item_code' => 'Pen', 'item_name' => 'Pencil', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => null],
            ['item_code' => 'SevenU', 'item_name' => 'Seven up', 'quantity' => 100, 'unit' => 'Can', 'product_date' => '2023-06-01', 'expried_date' => '2024-06-01', 'note' => null],
            ['item_code' => 'Note', 'item_name' => 'NoteBook', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => null],
            ['item_code' => 'Note1', 'item_name' => 'NoteBook 1', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note2', 'item_name' => 'NoteBook 2', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note3', 'item_name' => 'NoteBook 3', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note4', 'item_name' => 'NoteBook 4', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note5', 'item_name' => 'NoteBook 5', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note6', 'item_name' => 'NoteBook 6', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note7', 'item_name' => 'NoteBook 7', 'quantity' => 100, 'unit' => 'Piece', 'product_date' => '2023-01-01', 'expried_date' => '2026-01-01', 'note' => 'Discount'],
        ];

        DB::table('item_sale')->insert($items);

        // Add 20 Random Items using Factory
        \App\Models\ItemSale::factory()->count(20)->create();
    }
}
