<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        $polis = [
            [
                'code' => 'P001',
                'name' => 'Poli Umum',
                'description' => 'Pelayanan kesehatan umum',
                'is_active' => true,
            ],
            [
                'code' => 'P002',
                'name' => 'Poli Anak',
                'description' => 'Pelayanan kesehatan anak',
                'is_active' => true,
            ],
            [
                'code' => 'P003',
                'name' => 'Poli Penyakit Dalam',
                'description' => 'Pelayanan penyakit dalam',
                'is_active' => true,
            ],
            [
                'code' => 'P004',
                'name' => 'Poli Bedah',
                'description' => 'Pelayanan bedah',
                'is_active' => true,
            ],
            [
                'code' => 'P005',
                'name' => 'Poli Mata',
                'description' => 'Pelayanan kesehatan mata',
                'is_active' => true,
            ],
            [
                'code' => 'P006',
                'name' => 'Poli Kandungan',
                'description' => 'Pelayanan kesehatan ibu dan kandungan',
                'is_active' => true,
            ],
            [
                'code' => 'P007',
                'name' => 'Poli Kulit',
                'description' => 'Pelayanan kesehatan kulit',
                'is_active' => true,
            ],
        ];

        foreach ($polis as $poli) {
            Poli::firstOrCreate(
                ['code' => $poli['code']],
                $poli
            );
        }
    }
}
