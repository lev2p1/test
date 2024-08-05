<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductImport;

class TestController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'path' => 'string',
            'name' => 'string',
            'id' => 'string',
            'type' => 'string'
        ]);
        return ProductImport::download_image($data['path'], $data['name'], $data['id'], $data['type']);
    }
}
