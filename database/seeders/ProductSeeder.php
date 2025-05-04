<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Measurement;
use App\Models\Product;
use App\Models\ProductMeasurements;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tambah Measurement
        $pack = Measurement::firstOrCreate(['name' => 'Pack']);
        $kg = Measurement::firstOrCreate(['name' => 'Kg']);

        // 2. Tambah Produk
        $product = Product::create([
            'code' => 'SP001',
            'name' => 'Semen Putih',
            'description' => 'Semen putih kualitas premium',
            'measurement_id' => $pack->id, // Default-nya adalah Pack
            'is_stockable' => true,
        ]);

        // 3. Tambah ProductMeasurements
        $pmPack = ProductMeasurements::create([
            'product_id' => $product->id,
            'measurement_id' => $pack->id,
            'conversion' => 1, // default, 1 pack = 1 pack
        ]);

        $pmKg = ProductMeasurements::create([
            'product_id' => $product->id,
            'measurement_id' => $kg->id,
            'conversion' => 5, // 1 pack = 5 kg
        ]);

        // 4. Tambah Price
        Price::create([
            'product_measurement_id' => $pmPack->id,
            'price' => 60000,
        ]);

        Price::create([
            'product_measurement_id' => $pmKg->id,
            'price' => 12500,
        ]);
    }

    // // Fungsi untuk menambahkan harga pada product_measurement
    // private function createPrice($productMeasurement, $price)
    // {
    //     Price::create([
    //         'product_measurement_id' => $productMeasurement->id,
    //         'price' => $price,
    //     ]);
    // }
}
