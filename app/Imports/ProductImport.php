<?php

namespace App\Imports;

use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Product;
use App\Models\Add;
use App\Models\Image;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isNull;

class ProductImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    protected static array $main_keys = array('uuid', 'naimenovanie', 'vnesnii_kod', 'cena_cena_prodazi', 'minimalnaia_cena', 'dop_pole_ssylka_na_upakovku', 'dop_pole_ssylki_na_foto');
    
    public static function download_image($path, $name, $id, $type) : Response{
        $img = new Image;
        $path = ltrim($path);
        try{
            $file = fopen($path, 'r');
            Storage::disk('public')->put($name, $file);
        }
        catch(Exception $exception){
            dump($exception);
            $file = '';
        }
            
            $img->value = $name;
            $img->type = $type;
            $img->product_id = $id;
            $img->save();
        return new Response(201);
    }


    public function collection(Collection $collection)
    {
        ini_set('max_execution_time', 1800);
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
                if(!in_array($k, self::$main_keys)){
                    $add = new Add;
                    $add->value = json_encode(array($k => $v), JSON_UNESCAPED_UNICODE);
                    $add->product_id = $value['uuid'];
                    $add->save();
                }
            }

            $res = self::download_image($value['dop_pole_ssylka_na_upakovku'], Str::random() . '.png', $value['uuid'], 'upacovka');

            foreach(explode(',', $value['dop_pole_ssylki_na_foto']) as $photo){
                $res = self::download_image($photo, Str::random() . '.png', $value['uuid'], 'photo');
            }
            }
            
        }
        return new Response(201); 
    }
}
