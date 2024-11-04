<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class VietnamDataSeeder extends Seeder

{
  

    public function run()
    {
        Country::where('code', 'VN')->delete();

        $response = Http::get('https://provinces.open-api.vn/api/?depth=2');
        $data = $response->json();

        $provinces = [];
        $districts = [];

        foreach ($data as $province) {
            // Add to provinces array
            $provinces[] = $province['name'];
            
            // Create districts array for this province
            $provinceDistricts = [];
            foreach ($province['districts'] as $district) {
                $provinceDistricts[] = $district['name'];
            }
            $districts[$province['name']] = $provinceDistricts;
        }

        Country::create([
            'code' => 'VN',
            'name' => 'Vietnam',
            'provinces' => $provinces,
            'districts' => $districts
        ]);
    }
}