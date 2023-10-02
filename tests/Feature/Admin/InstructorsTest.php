<?php

namespace Tests\Feature\Admin;

use App\Models\Instructors;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_has_permissions_to_open_admin_instructors(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get('/admin/instructors');

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_instructors_info(): void
    {
        $instructor = Instructors::factory()->create();
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get("/admin/instructors/show/{$instructor->id}");

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_instructors_crate(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get("/admin/instructors/create");

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_instructors_edit(): void
    {
        $instructor = Instructors::factory()->create();
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get("/admin/instructors/edit/{$instructor->id}");

        $response->assertStatus(200);
    }

    public function test_admin_can_create_instructors(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $data = [
            'first_name' => 'Created first name instructor',
            'surname' => 'Created surname instructor',
            'date_of_birth' => '2000-01-01',
            'hire_date' => '2020-01-01',
            'salary' => 3000,
        ];

        $response = $this->actingAs($admin)->post("/admin/instructors", $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas("instructors", ['first_name' => 'Created first name instructor',]);
    }

    public function test_admin_can_update_instructors(): void
    {
        $instructor = Instructors::factory()->create(['first_name' => 'Field of instructor Name']);
        $admin = User::factory()->create(['role' => 'admin']);

        $data = [
            'first_name' => 'Updated first name instructor',
            'surname' => 'Updated surname instructor',
            'date_of_birth' => '2000-01-01',
            'hire_date' => '2020-01-01',
            'salary' => 3000,
        ];

        $response = $this->actingAs($admin)->patch("/admin/instructors/{$instructor->id}", $data);
        $response->assertStatus(302);

        $instructor->refresh();

        $this->assertEquals('Updated first name instructor', $instructor->first_name);
        $this->assertDatabaseHas("instructors", ['first_name' => 'Updated first name instructor']);
        $this->assertDatabaseMissing("instructors", ['first_name' => 'Field of instructor Name']);
    }

    public function test_admin_can_delete_instructors(): void
    {
        $instructor = Instructors::factory()->create();
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->delete("/admin/instructors/{$instructor->id}");
        $response->assertStatus(302);

        $this->assertDatabaseMissing("instructors", ['id' => $instructor->id]);
    }
}
