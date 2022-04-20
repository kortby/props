<?php

namespace Database\Seeders;

use App\Models\Prospect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prospect::truncate();

        $csvFile = fopen(base_path("database/data/prospect.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 100, ",")) !== FALSE) {
            if (!$firstline) {
                Prospect::create([
                    "company_name" => $data['0'],
                    "address" => $data['1'],
                    "city" => $data['2'],
                    "state" => $data['3'],
                    "zip" => $data['4'],
                    "county" => $data['5'],
                    "phone" => $data['6'],
                    "contact_firstname" => $data['7'],
                    "contact_lastname" => $data['8'],
                    "title" => $data['9'],
                    "direct_phone" => $data['10'],
                    "email" => $data['11'],
                    "website" => $data['12'],
                    "employee_count" => $data['13'],
                    "annual_sales" => $data['14'],
                    "sic_code" => $data['15'],
                    "industry" => $data['16'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
