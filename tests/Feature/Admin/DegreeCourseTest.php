<?php

namespace Tests\Feature\Admin;

use App\Models\DegreeCourse;
use Tests\TestCase;
use App\Models\User;
use App\Models\Yearbook;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DegreeCourseTest extends TestCase
{
    use RefreshDatabase;

    // User has been login on admin account
     public function setUp(): void
     {
         parent::setUp();

         $admin = User::factory()->create(['role' => 'admin']);

         $this->actingAs($admin);
     }

    public function test_admin_has_permissions_to_open_admin_dashboard(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_instructor_has_no_permissions_to_open_admin_dashboard(): void
    {
        $instructor = User::factory()->create(['role' => 'instructor']);

        $response = $this->actingAs($instructor)->get('/admin');

        $response->assertStatus(302);
    }

    public function test_student_has_no_permissions_to_open_admin_dashboard(): void
    {
        $student = User::factory()->create(['role' => 'student']);

        $response = $this->actingAs($student)->get('/admin');

        $response->assertStatus(302);
    }

    public function test_admin_has_permissions_to_open_admin_degree_courses(): void
    {

        $response = $this->get('/admin/degree_courses');

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_degree_courses_info(): void
    {
        $degreeCourse = DegreeCourse::factory()->create();
        $yearbook = Yearbook::factory()->create(['degree_course_id'=> $degreeCourse->id]);

        $response = $this->get("/admin/degree_courses/yearbooks/{$yearbook->id}");

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_admin_degree_courses_crate(): void
    {
        $response = $this->get("/admin/degree_courses/create");

        $response->assertStatus(200);
    }

    public function test_admin_can_create_degree_courses(): void
    {
        $data = [
            'name' => 'Created Field of Study Name',
        ];

        $response = $this->post("/admin/degree_courses", $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas("degree_courses", ['name' => 'Created Field of Study Name',]);
    }

    public function test_admin_has_permissions_to_open_admin_degree_courses_edit(): void
    {
        $degreeCourse = DegreeCourse::factory()->create();

        $response = $this->get("/admin/degree_courses/edit/{$degreeCourse->id}");

        $response->assertStatus(200);
    }

    public function test_admin_can_update_degree_courses(): void
    {
        $degreeCourse = DegreeCourse::factory()->create(['name' => 'Field of Study Name']);

        $data = [
            'name' => 'Updated Field of Study Name'
        ];

        $response = $this->patch("/admin/degree_courses/{$degreeCourse->id}", $data);
        $response->assertStatus(302);

        $degreeCourse->refresh();

        $this->assertEquals('Updated Field of Study Name', $degreeCourse->name);
        $this->assertDatabaseHas("degree_courses", ['name' => 'Updated Field of Study Name']);
        $this->assertDatabaseMissing("degree_courses", ['name' => 'Field of Study Name']);
    }

    public function test_admin_can_delete_degree_courses(): void
    {
        $degreeCourse = DegreeCourse::factory()->create();

        $response = $this->delete("/admin/degree_courses/{$degreeCourse->id}");
        $response->assertStatus(302);

        $this->assertDatabaseMissing("degree_courses", ['id' => $degreeCourse->id]);
    }
}
