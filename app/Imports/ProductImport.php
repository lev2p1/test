<?php

namespace App\Imports;

use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Product;
use App\Models\Add;

use function PHPUnit\Framework\isNull;

class ProductImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $value){
            
            if(isset($value) && !empty($value['uuid']) && !empty($value['naimenovanie']) && !empty($value['vnesnii_kod']) && !empty($value['cena_cena_prodazi']) && !empty($value['minimalnaia_cena'])){
                $prod = new Product;
                $prod->id = $value['uuid'];
                $prod->name = $value['naimenovanie'];
                $prod->external_code = $value['vnesnii_kod'];
                $prod->description = $value['opisanie'];
                $prod->price = (float)$value['cena_cena_prodazi'];
                $prod->discount = ((int) $value['cena_cena_prodazi'] - (int) $value['minimalnaia_cena']) / (int) $value['cena_cena_prodazi'] * 100;
                $prod->save();
                
            foreach($value as $k => $v){
                $add = new Add;
                $add->value = json_encode(array($k => $v), JSON_UNESCAPED_UNICODE);
                $add->product_id = $value['uuid'];
                $add->save();
            }
            }
            
        }
    }
}
