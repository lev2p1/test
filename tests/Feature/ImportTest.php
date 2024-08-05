<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImportTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/test/images/store', [
            '_token' => csrf_token(),
            'path' => 'http://catalog.collant.ru/pics/SNL-504038_p.jpg',
            'name' => 'testImage.png',
            'id' => 'a217f669-aa1a-11ee-0a80-00380034176d',
            'type' => 'test'
        ]);

        $response->assertStatus(201);
    }
}
