<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'doctor_code' => 'D001',
            'name' => 'Dr. Ahmad Fauzi',
            'specialization' => 'Dokter Umum',
            'phone' => '081234567801',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D002',
            'name' => 'Dr. Siti Aminah',
            'specialization' => 'Dokter Umum',
            'phone' => '081234567802',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D003',
            'name' => 'Dr. Budi Santoso',
            'specialization' => 'Penyakit Dalam',
            'phone' => '081234567803',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D004',
            'name' => 'Dr. Rina Wulandari',
            'specialization' => 'Anak',
            'phone' => '081234567804',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D005',
            'name' => 'Dr. Andi Pratama',
            'specialization' => 'Bedah',
            'phone' => '081234567805',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D006',
            'name' => 'Dr. Dewi Lestari',
            'specialization' => 'Kandungan',
            'phone' => '081234567806',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D007',
            'name' => 'Dr. Eko Saputra',
            'specialization' => 'Mata',
            'phone' => '081234567807',
            'is_active' => false,
        ]);

        Doctor::create([
            'doctor_code' => 'D008',
            'name' => 'Dr. Maya Sari',
            'specialization' => 'Kulit',
            'phone' => '081234567808',
            'is_active' => true,
        ]);
    }
}