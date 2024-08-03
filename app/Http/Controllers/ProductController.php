<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $elements = Product::all();
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
}
