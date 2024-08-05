<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Add;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function main(){
        $elements = Product::paginate(50);
        foreach($elements as $key => $value){
            $elements[$key]['upacovka'] = Image::where('product_id', '=', $value['id'])->where('type', '=', 'upacovka')->first()['value'] ?? '';
        }
        return view('main', compact('elements'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file')->storePublicly();

        ini_set('memory_limit', '-1');
        Excel::import(new ProductImport, Storage::path($file));
        $elements = Product::all();
        return view('main', compact('elements'));
    }

    public function import(){
        return view('import');
    }

    public function show($e_id){
        $element = (new Product)->findOrFail($e_id);
        $images = (new Image)->where('product_id', '=', $e_id)->get();
        $adds = (new Add)->where('product_id', '=', $e_id)->get();
        return view('product', compact('element', 'images', 'adds'));
    }
}
