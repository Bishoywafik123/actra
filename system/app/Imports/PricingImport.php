<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Modules\Pricing\Entities\Pricing;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PricingImport implements ToCollection , WithHeadingRow,WithBatchInserts,ShouldQueue,WithChunkReading
{
    
    
    public function collection(Collection $rows)
    {
    


        foreach($rows as $row){

        $pricing=Pricing::create([
            'brand'=>$row['brand'],
            'year'=>$row['year'],
            'model'=>$row['model'],
            'min_milage'=>$row['min_milage'],
            'max_milage'=>$row['max_milage'],
            
            'condition'=>$row['condition'],

            'min_sell_in_days'=>$row['min_sell_in_days'],
            'max_sell_in_days'=>$row['max_sell_in_days'],

            'min_sell_in_weeks'=>$row['min_sell_in_weeks'],
            'max_sell_in_weeks'=>$row['max_sell_in_weeks'],
        ]);

        }


    }


    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

}
