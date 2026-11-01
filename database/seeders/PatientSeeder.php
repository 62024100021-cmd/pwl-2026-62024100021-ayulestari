<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['Sebastian', 'L'],
            ['Ahmad Fauzi', 'L'],
            ['Budi Santoso', 'L'],
            ['Siti Aminah', 'P'],
            ['Ahmad Dahlan', 'L'],
            ['Rina Wulandari', 'P'],
            ['Dedi Kurniawan', 'L'],
            ['Lina Permata', 'P'],
            ['Eko Prasetyo', 'L'],
            ['Maya Sari', 'P'],
            ['Agus Salim', 'L'],
            ['Dewi Lestari', 'P'],
            ['Fajar Nugroho', 'L'],
            ['Nur Hidayah', 'P'],
            ['Hendra Wijaya', 'L'],
            ['Putri Ayu', 'P'],
            ['Ahmad Rizki', 'L'],
            ['Sari Indah', 'P'],
            ['Joko Susilo', 'L'],
            ['Wati Rahayu', 'P'],
            ['Bayu Setiawan', 'L'],
            ['Ani Marlina', 'P'],
            ['Rudi Hartono', 'L'],
            ['Yuni Astuti', 'P'],
            ['Taufik Rahman', 'L'],
        ];

        $kota = ['Kudus', 'Semarang', 'Jepara', 'Demak', 'Pati'];

        $rows = [];

        foreach ($data as $i => [$nama, $gender]) {
            $nomor = $i + 1;

            $rows[] = [
                'medical_record_number' => 'RM' . str_pad($nomor, 3, '0', STR_PAD_LEFT),
                'name' => $nama,
                'gender' => $gender,
                'birth_date' => now()->setDate(1980, 1, 1)->addDays($i * 400)->toDateString(),
                'address' => $kota[$i % 5],
                'phone' => '0812345' . str_pad($nomor, 4, '0', STR_PAD_LEFT),
                'created_at' => now()->subDays(25 - $i),
                'updated_at' => now(),
            ];
        }

        DB::table('patients')->upsert(
            $rows,
            ['medical_record_number'],
            ['name', 'gender', 'birth_date', 'address', 'phone', 'updated_at']
        );
    }
}