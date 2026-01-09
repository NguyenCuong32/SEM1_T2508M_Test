<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemSale>
 */
class ItemSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            // Beverages - Shelf life ~6-12 months
            'Green Tea' => ['unit' => 'Bottle', 'shelf_life' => 365],
            'Milk Coffee' => ['unit' => 'Can', 'shelf_life' => 270],
            'Energy Drink' => ['unit' => 'Can', 'shelf_life' => 540],
            'Water 500ml' => ['unit' => 'Bottle', 'shelf_life' => 730],
            'Orange Juice' => ['unit' => 'Box', 'shelf_life' => 180],
            'Apple Juice' => ['unit' => 'Box', 'shelf_life' => 180],
            'Soda Lemon' => ['unit' => 'Can', 'shelf_life' => 365],
            'Ice Tea' => ['unit' => 'Bottle', 'shelf_life' => 365],
            // Snacks - Shelf life ~6-9 months
            'Potato Chips' => ['unit' => 'Pack', 'shelf_life' => 180],
            'Corn Snacks' => ['unit' => 'Pack', 'shelf_life' => 180],
            'Chocolate Bar' => ['unit' => 'Bar', 'shelf_life' => 365],
            'Cookies' => ['unit' => 'Pack', 'shelf_life' => 270],
            'Rice Crackers' => ['unit' => 'Pack', 'shelf_life' => 270],
            'Gummy Bears' => ['unit' => 'Pack', 'shelf_life' => 540],
            'Dried Mango' => ['unit' => 'Pack', 'shelf_life' => 365],
            'Spicy Peanuts' => ['unit' => 'Pack', 'shelf_life' => 270],
            // Stationery - Shelf life ~3-5 years (Long)
            'Ballpoint Pen' => ['unit' => 'Piece', 'shelf_life' => 1825],
            'Pencil HB' => ['unit' => 'Piece', 'shelf_life' => 1825],
            'Notebook A5' => ['unit' => 'Piece', 'shelf_life' => 1825],
            'Correction Tape' => ['unit' => 'Piece', 'shelf_life' => 1095],
            'Stapler Mini' => ['unit' => 'Piece', 'shelf_life' => 1825],
            'Glue Stick' => ['unit' => 'Piece', 'shelf_life' => 730],
            'Highlighter' => ['unit' => 'Piece', 'shelf_life' => 1095],
            'Eraser' => ['unit' => 'Piece', 'shelf_life' => 1825],
            // Essentials
            'Tissue' => ['unit' => 'Pack', 'shelf_life' => 1095],
            'Wet Wipes' => ['unit' => 'Pack', 'shelf_life' => 730],
            'Face Mask' => ['unit' => 'Box', 'shelf_life' => 1095],
            'Hand Sanitizer' => ['unit' => 'Bottle', 'shelf_life' => 730]
        ];

        $name = $this->faker->unique()->randomElement(array_keys($products));
        $details = $products[$name];
        
        // Product date within last 6 months to ensure randomness but realism
        $productDate = $this->faker->dateTimeBetween('-6 months', 'now');
        // Expired date = product date + shelf life
        $expiredDate = (clone $productDate)->modify('+' . $details['shelf_life'] . ' days');

        // Generate flexible code based on name
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            $code = ucfirst(substr($words[0], 0, 3)) . ucfirst(substr($words[1], 0, 3));
        } else {
            $code = ucfirst(substr($name, 0, 6));
        }
        $code = preg_replace('/[^a-zA-Z0-9]/', '', $code);
        
        if (strlen($code) < 4) { 
             $code .= $this->faker->numberBetween(1, 9);
        }

        return [
            'item_code' => substr($code, 0, 6),
            'item_name' => $name,
            'quantity' => $this->faker->numberBetween(10, 500),
            'unit' => $details['unit'],
            'product_date' => $productDate->format('Y-m-d'),
            'expried_date' => $expiredDate->format('Y-m-d'),
            'note' => $this->faker->optional(0.7)->randomElement([
                'Genuine imported goods, 12 months warranty.',
                'Buy 1 Get 1 Free for New Year promotion.',
                'Best-selling product of the last month.',
                '20% Discount for VIP members.',
                'Fragile item, please handle with care.',
                '100% natural ingredients, no preservatives.',
                'Directly imported from Japan.',
                'Limited edition, only 50 items left.',
                'Suitable for both children and adults.',
                'Food safety quality certified.',
                'Includes a 50k voucher for next purchase.',
                'Economy combo for the whole family.',
                'Most loved product of 2025.',
                'Long shelf life, safe for stocking.',
                'Regional specialty, traditional flavor.',
                'New packaging design, more convenient.',
                'Customer appreciation program.',
                'Special offer when paying by card.',
                'New arrival, limited quantity.',
                'Perfect for luxury gifting.'
            ]), 
        ];
    }
}
