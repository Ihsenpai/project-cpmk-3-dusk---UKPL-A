<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Buat beberapa produk untuk testing
        $produks = [
            [
                'nama' => 'Laptop Gaming ASUS ROG',
                'harga' => 15000000,
            ],
            [
                'nama' => 'Mouse Wireless Logitech',
                'harga' => 850000,
            ],
            [
                'nama' => 'Keyboard Mechanical RGB',
                'harga' => 1200000,
            ],
            [
                'nama' => 'Monitor 24 Inch 144Hz',
                'harga' => 3500000,
            ],
            [
                'nama' => 'Headset Gaming HyperX',
                'harga' => 750000,
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}