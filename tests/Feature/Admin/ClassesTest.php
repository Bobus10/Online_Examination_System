<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Yearbook;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassesTest extends TestCase
{
    use RefreshDatabase;

    protected $yearbook, $class, $studentsInClass, $studentsWithoutClass;
    public function setUp(): void
    {
        parent::setUp();

        $admin = User::factory()->create(['role' => 'admin']);
        $yearbook = Yearbook::factory()->createOne();
        $class = Classes::factory()->createOne(['yearbook_id' => $yearbook->id]);

        $studentsInClass = Student::factory(3)->create(['classes_id' => $class->id]);
        $studentsWithoutClass = Student::factory(2)->create(['classes_id' => null]);

        $this->actingAs($admin);

        $this->yearbook = $yearbook;
        $this->class = $class;
        $this->studentsInClass = $studentsInClass; // id 1, 2, 3
        $this->studentsWithoutClass = $studentsWithoutClass;// id 4, 5
    }

    public function test_admin_has_permission_to_open_class_list_in_selected_yearbook(): void
    {
        $response = $this->get("/admin/degree_courses/yearbooks/classes/{$this->yearbook->id}");

        $response->assertStatus(200);
    }

    public function test_admin_has_permission_to_open_edit_class(): void
    {
        $response = $this->get("/admin/degree_courses/yearbooks/classes/edit/{$this->class->id}");

        $response->assertStatus(200);
    }

    public function test_admin_can_update_class(): void
    {
        $idStudentsInClass = $this->studentsInClass->pluck('user_id')->toArray();
        $idStudentsWithoutClass = $this->studentsWithoutClass->pluck('user_id')->toArray();

        $data = array_merge($idStudentsInClass, $idStudentsWithoutClass);

        $response = $this->get("/admin/degree_courses/yearbooks/classes/edit/{$this->class->id}", $data);

        $response->assertStatus(200);
    }

    public function test_if_admin_excludes_student_from_class(): void
    {}
}
