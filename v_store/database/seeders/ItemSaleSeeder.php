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
        $data = [
            ['Coca', 'Coca cola', 100, '2024-01-01', null],
            ['Bim', 'Bim Bim', 100, '2024-01-01', 'Discount'],
            ['Lavie', 'Lavie', 100, '2024-01-01', 'Discount'],
            ['Pen', 'Pencil', 100, '2024-01-01', null],
            ['7Up', 'Seven up', 100, '2024-01-01', null],
            ['Note', 'NoteBook', 100, '2024-01-01', null],
            ['Note1', 'NoteBook 1', 100, '2024-01-01', 'Discount'],
            ['Note2', 'NoteBook 2', 100, '2024-01-01', 'Discount'],
            ['Note3', 'NoteBook 3', 100, '2024-01-01', 'Discount'],
            ['Note4', 'NoteBook 4', 100, '2024-01-01', 'Discount'],
            ['Note5', 'NoteBook 5', 100, '2024-01-01', 'Discount'],
            ['Note6', 'NoteBook 6', 100, '2024-01-01', 'Discount'],
            ['Note7', 'NoteBook 7', 100, '2024-01-01', 'Discount'],
        ];

        foreach ($data as $item) {
            DB::table('item_sale')->insert([
                'item_code' => $item[0],
                'item_name' => $item[1],
                'quantity' => $item[2],
                'expried_date' => $item[3],
                'note' => $item[4],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
