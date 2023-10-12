<?php

namespace Tests\Feature\Admin;

use App\Models\DegreeCourse;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DegreeCourseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_admin_has_permissions_to_open_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_instructor_has_no_permissions_to_open_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'instructor']);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(302);
    }

    public function test_student_has_no_permissions_to_open_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'student']);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(302);
    }

    public function test_admin_has_permissions_to_open_admin_field_of_studies(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get('/admin/field_of_studies');

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_field_of_studies_info(): void
    {
        $degreeCourse = DegreeCourse::factory()->create();
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get("/admin/field_of_studies/show/{$degreeCourse->id}");

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_field_of_studies_crate(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get("/admin/field_of_studies/create");

        $response->assertStatus(200);
    }

    public function test_admin_can_create_field_of_studies(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $data = [
            'name' => 'Created Field of Study Name',
        ];

        $response = $this->actingAs($admin)->post("/admin/field_of_studies", $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas("field_of_studies", ['name' => 'Created Field of Study Name',]);
    }

    public function test_admin_has_permissions_to_open_admin_field_of_studies_edit(): void
    {
        $degreeCourse = DegreeCourse::factory()->create();
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get("/admin/field_of_studies/edit/{$degreeCourse->id}");

        $response->assertStatus(200);
    }

    public function test_admin_can_update_field_of_studies(): void
    {
        $degreeCourse = DegreeCourse::factory()->create(['name' => 'Field of Study Name']);
        $admin = User::factory()->create(['role' => 'admin']);

        $data = [
            'name' => 'Updated Field of Study Name'
        ];

        $response = $this->actingAs($admin)->patch("/admin/field_of_studies/{$degreeCourse->id}", $data);
        $response->assertStatus(302);

        $degreeCourse->refresh();

        $this->assertEquals('Updated Field of Study Name', $degreeCourse->name);
        $this->assertDatabaseHas("field_of_studies", ['name' => 'Updated Field of Study Name']);
        $this->assertDatabaseMissing("field_of_studies", ['name' => 'Field of Study Name']);
    }

    public function test_admin_can_delete_field_of_studies(): void
    {
        $degreeCourse = DegreeCourse::factory()->create();
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->delete("/admin/field_of_studies/{$degreeCourse->id}");
        $response->assertStatus(302);

        $this->assertDatabaseMissing("field_of_studies", ['id' => $degreeCourse->id]);
    }
}
