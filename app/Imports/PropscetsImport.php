<?php

namespace App\Imports;

use App\Models\Prospect;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class PropscetsImport implements ToModel, WithChunkReading, WithBatchInserts, WithProgressBar
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Prospect([
            'company_name'=>$row[0],
            'address'=>$row[1],
            'city'=>$row[2],
            'state'=>$row[3],
            'county'=>$row[4],
            'zip'=>$row[5],
            'phone'=>$row[6],
            'contact_firstname'=>$row[7],
            'contact_lastname'=>$row[8],
            'title'=>$row[9],
            'direct_phone'=>$row[10],
            'email'=>$row[11],
            'website'=>$row[12],
            'employee_count'=>$row[13],
            'annual_sale'=>$row[14],
            'sic_code'=>$row[15],
            'industry'=>$row[16]

        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
