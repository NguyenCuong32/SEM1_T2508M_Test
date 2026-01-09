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
        // Default items (Page 1) - Reverted to Exam Requirements (13 items)
        $data = [
            ['item_code' => 'Coca', 'item_name' => 'Coca cola', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => null],
            ['item_code' => 'Bim', 'item_name' => 'Bim Bim', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Lavie', 'item_name' => 'Lavie', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Pen', 'item_name' => 'Pencil', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => null],
            ['item_code' => 'SevenU', 'item_name' => 'Seven up', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => null],
            ['item_code' => 'Note', 'item_name' => 'NoteBook', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => null],
            ['item_code' => 'Note1', 'item_name' => 'NoteBook 1', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note2', 'item_name' => 'NoteBook 2', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note3', 'item_name' => 'NoteBook 3', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note4', 'item_name' => 'NoteBook 4', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note5', 'item_name' => 'NoteBook 5', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note6', 'item_name' => 'NoteBook 6', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
            ['item_code' => 'Note7', 'item_name' => 'NoteBook 7', 'quantity' => 100, 'expried_date' => '2024-01-01', 'note' => 'Discount'],
        ];

        DB::table('item_sale')->insert($data);

        // Page 2 Items - Office Supplies (Strictly English)
        $stationeryItems = [
            ['code' => 'PEN01', 'name' => 'Ballpoint Pen', 'qty' => 100, 'note' => 'Blue Ink'],
            ['code' => 'PAP01', 'name' => 'A4 Paper Ream', 'qty' => 50, 'note' => '80gsm'],
            ['code' => 'STP01', 'name' => 'Office Stapler', 'qty' => 30, 'note' => 'Metal'],
            ['code' => 'HLT01', 'name' => 'Highlighter Set', 'qty' => 40, 'note' => '5 Colors'],
            ['code' => 'STK01', 'name' => 'Sticky Notes', 'qty' => 200, 'note' => 'Yellow'],
            ['code' => 'FLD01', 'name' => 'File Folder', 'qty' => 120, 'note' => 'Plastic'],
            ['code' => 'MRK01', 'name' => 'Whiteboard Marker', 'qty' => 60, 'note' => 'Black'],
        ];

        $extraData = [];
        foreach ($stationeryItems as $item) {
            $extraData[] = [
                'item_code' => $item['code'],
                'item_name' => $item['name'],
                'quantity' => $item['qty'],
                'expried_date' => '2026-12-31',
                'note' => $item['note'],
            ];
        }
        DB::table('item_sale')->insert($extraData);
    }
}
