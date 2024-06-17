<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::factory()
            ->count(2)
            ->sequence(
                [
                    'title' => 'Рубль',
                    'code' => 'RUB',
                    'sign' => '₽'
                ],
                [
                    'title' => 'Доллар',
                    'code' => 'USD',
                    'sign' => '$'
                ])
            ->create();
    }
}
