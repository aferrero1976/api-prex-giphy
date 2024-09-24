<?php

namespace Tests\Feature;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

use Tests\TestCase;

class ApiRoutesTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '1234',
            'password_confirmation' => '1234',
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure(['user']);
    }

    public function test_user_can_login()
    {
        $user = User::create([
            'name' => 'Test User 1',
            'email' => 'test1@example.com',
            'password' => '1234',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token']);
    }

    public function test_user_can_favorite_gif()
    {
        $user = User::create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'password' => '1234',
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        $response = $this->postJson('/api/gifs/favorite', [
            'gif_id' => 'some_gif_id',
        ], ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(201)
                 ->assertJson(['message' => 'Gif added to favorites']);
    }

    public function test_user_can_search_gifs()
    {
        $user = User::create([
            'name' => 'Test User 3',
            'email' => 'test3@example.com',
            'password' => '1234',
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        $response = $this->getJson('/api/gifs/search?query=wallet&limit=1&offset=0', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['data']);
    }

    public function test_user_can_show_gif()
    {
        $user = User::create([
            'name' => 'Test User 4',
            'email' => 'test4@example.com',
            'password' => '1234',
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        $response = $this->getJson('/api/gifs/ZXzkjudQf9RCcPot8W', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['data']);
    }
}
