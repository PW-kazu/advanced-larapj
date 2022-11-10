<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloTest extends TestCase
{
   use ReferenceDatabase;
   

    public function testHello()
    {
        User::factory()->create([
            'name'=>'aaa',
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);

        $this->assertDatabaseHas('users',[
        'name'=>'aaa',
        'email'=>'bbb@ccc.com',
        'password'=>'test12345'
    ]);

    }
}
