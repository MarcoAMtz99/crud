<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_users_list()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        // $user = User::factory()->create();

        // $response = $this->post('/login', [
        // 'email' => $user->email,
        // 'password' => 'password',
        // ]);

        // $this->assertAuthenticated();

        // $response->assertJsonStructure([
        //     ['name', 'email']
        // ]);

        // $response->assertJsonFragment([
        //     ['name'=> "Admin"]
        // ]);
        // $response->assertJsonCount(1);


    }
}
