<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Poli;

class AssignPoliToDoctorsSeeder extends Seeder
{
    public function run(): void
    {
        $mapping = [
            'D001' => 'P001',
            'D002' => 'P001',
            'D003' => 'P003',
            'D004' => 'P002',
            'D005' => 'P004',
            'D006' => 'P006',
            'D007' => 'P005',
            'D008' => 'P007',
            'D009' => 'P001',
        ];

        foreach ($mapping as $doctorCode => $poliCode) {
            $doctor = Doctor::where('doctor_code', $doctorCode)->first();
            $poli = Poli::where('code', $poliCode)->first();

            if ($doctor && $poli) {
                $doctor->poli_id = $poli->id;
                $doctor->save();
            }
        }
    }
}
