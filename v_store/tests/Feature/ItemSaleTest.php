<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ItemSale;

class ItemSaleTest extends TestCase
{
    use RefreshDatabase; 

    public function test_index_page_loads()
    {
        $response = $this->get('/items');
        $response->assertStatus(200);
        $response->assertSee('V_Store');
    }

    public function test_create_item_validation()
    {
        $response = $this->post('/items', [
            'item_code' => 'INVALID!', // Special chars
            'item_name' => 'Invalid@Name', // Special chars
            'quantity' => 'abc', 
            'expried_date' => 'not-a-date',
        ]);

        $response->assertSessionHasErrors(['item_code', 'item_name', 'quantity', 'expried_date']);
    }

    public function test_create_item_success()
    {
        $data = [
            'item_code' => 'TEST01',
            'item_name' => 'Test Item',
            'quantity' => 100,
            'expried_date' => '2026-12-31',
            'note' => 'Test Note',
        ];

        // Clean up previous run if exists
        ItemSale::where('item_code', 'TEST01')->delete();

        $response = $this->post('/items', $data);

        $response->assertRedirect('/items');
        $this->assertDatabaseHas('item_sale', ['item_code' => 'TEST01']);
        
        // Cleanup
        ItemSale::where('item_code', 'TEST01')->delete();
    }

    public function test_language_switch()
    {
        $response = $this->get('/lang/vi');
        $response->assertSessionHas('locale', 'vi');
        
        // This won't test the UI change directly without rendering view with session, 
        // but verifying session is enough for backend logic.
    }
}
