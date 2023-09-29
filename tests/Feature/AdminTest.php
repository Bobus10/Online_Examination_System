<?php

namespace Tests\Feature;

use App\Enums\UserRoleEnums;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => (UserRoleEnums::ADMIN)->value]);

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(200);
    }
}
