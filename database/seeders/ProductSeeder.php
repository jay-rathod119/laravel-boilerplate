<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the products table with provided catalog entries.
     */
    public function run(): void
    {
        Product::query()->delete();

        $products = [
            ['name' => 'LRG-Gold', 'description' => 'L-ARGININE, ZINC, FOLIC ACID'],
            ['name' => 'Serenglow D3', 'description' => 'CHOLECALCIFEROL 60,000 IU MOUTHMELTING'],
            ['name' => 'Chocored', 'description' => 'FERRIC SACCHARATE'],
            ['name' => 'IMMUNO DEFENCE GUMMIES', 'description' => 'VITAMIN E, ZINC, VITAMIN C, ELDERBERRY EXTRACT, BLUEBERRY EXTRACT'],
            ['name' => 'Folitron M', 'description' => 'L-METHYL FOLATE, PYRIDOXAL-5-PHOSPHATE, METHYLCOBALAMIN'],
            ['name' => 'Serenhope', 'description' => 'PROGESTERONE 200mg SR'],
            ['name' => 'Dydroseren', 'description' => 'DYDROGESTERONE 10mG'],
            ['name' => 'Calciseren', 'description' => 'NA'],
            ['name' => 'Chocored+', 'description' => 'NA'],
            ['name' => 'KIDS IRON GUMMIES', 'description' => 'FERRIC PYROPHOSPHATE'],
            ['name' => 'SHARP EYE VISION GUMMIES', 'description' => 'VITAMIN A PALMITATE, ZEAXANTHIN 10%, ASTAXANTHIN 2%, LUTEIN 20%, VITAMI E, VITAMIN C, OMEGA 3:DHA'],
            ['name' => 'BONE SUPPORT GUMMIES', 'description' => 'TRICALCIUM PHOSPHATE, VITAMIN D'],
            ['name' => 'MULTIVITAMIN GUMMIES', 'description' => 'VITAMIN B3, B2, B12, B6 & etc..'],
            ['name' => 'IRON+ GUMMIES', 'description' => 'FERRIC PYROPHOSPHATE, FOLATE, VITAMIN C, VITAMIN B12'],
            ['name' => 'BIOTIN GUMMIES', 'description' => 'BIOTIN, FOLATE, VITAMIN B12, IODINE, VITAMIN A, VITAMIN B6, ZINC, INOSITOL, VITAMIN E, VITAMIN C'],
            ['name' => 'UTI GUMMIES', 'description' => 'NA'],
            ['name' => 'DHA GUMMIES', 'description' => 'NA'],
            ['name' => 'Protein Powder for kids and women', 'description' => '--'],
            ['name' => 'Lactoseren-GG', 'description' => 'Lactobacillus Rhamnosus GG 6 Billion CFU (ATCC 53103)'],
        ];

        foreach ($products as $index => $product) {
            Product::query()->create([
                'name' => $product['name'],
                'description' => $product['description'],
                'sku' => sprintf('SRN-%03d', $index + 1),
            ]);
        }
    }
}
