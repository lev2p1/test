<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_download_image(): void
    {
        $result = ProductImport::download_image(
            'http://catalog.collant.ru/pics/SNL-504038_p.jpg',
            'testImage.png',
            'a217f669-aa1a-11ee-0a80-00380034176d',
            'test'
        );

        $this->assertEquals(201, $result->getStatusCode());
    }

    public function test_function_import(){
        //Excel::fake();
        // Excel::assertImported('vjHi6wA2YYj6nH57v27DWyPYAcpH5kRK0S0XQAFv.xlsx', 'public'); 
    }
}
