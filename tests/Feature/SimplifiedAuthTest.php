<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\Response;
use Tests\TestCase;

class SimplifiedAuthTest extends TestCase
{

    public function testUserRegistration()
    {
        User::truncate();
        $user = [
            "name" => "testUser",
            "email" => "testUserReg@laravel.com",
            "password" => "sadhan123456",
            "password_confirmation" => "sadhan123456"
        ];
        $response = $this->json('POST', 'http://localhost:8000/api/register', $user);
        $response->assertStatus($response->getStatusCode());
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    }

    public function testLogin()
    {
        User::truncate();
        $user = factory(User::class)->create([
            'email' => 'login.user@laravel.com',
            'password' => bcrypt('sadhan123456'),
        ]);

        $payload = ['email' => 'login.user@laravel.com', 'password' => 'sadhan123456'];

        $response = $this->json('POST', 'api/login', $payload)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testUserAccessResourceProperly()
    {
        User::truncate();
        $user = factory(User::class)->create(['email' => 'user@laravel.com']);
        $token = $user->generateCustomToken();
        $headers = ['Authorization' => "Bearer $token"];

        $this->json('get', '/api/user', [], $headers)->assertStatus(200);
        $this->json('get', '/api/getResources', [], $headers)->assertStatus(200);
        $this->json('post', '/api/logout', [], $headers)->assertStatus(200);

    }

    public function testUserWithNullToken()
    {
        User::truncate();
        // Simulating login
        $user = factory(User::class)->create(['email' => 'user@test.com']);
        $token = $user->generateCustomToken();
        $headers = ['Authorization' => "Bearer $token"];

        // Simulating logout
        $user->api_token = null;
        $user->save();

        $this->json('get', '/api/getResources', [], $headers)->assertStatus(401);
    }

}
