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
        //! In instructor.create add field to chose a user || create new || set null
    // public function test_admin_can_create_instructors(): void
    // {
    //     $admin = User::factory()->create(['role' => 'admin']);
    //     $user = User::factory()->createOne();

    //     $data = [
    //         'user_id' => 1,
    //         'first_name' => 'Created first name instructor',
    //         'surname' => 'Created surname instructor',
    //         'date_of_birth' => '2000-01-01',
    //         'hire_date' => '2020-01-01',
    //         'salary' => 3000,
    //     ];

    //     $response = $this->actingAs($admin)->post("/admin/instructors", $data);
    //     $response->assertStatus(302);

    //     $this->assertDatabaseHas("instructors", ['first_name' => 'Created first name instructor',]);
    // }

    public function test_admin_can_update_instructors(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->createOne(['id' => 30]);

        $dataBeforeUpdate = [
            'user_id' => $user->id,
            'first_name' => 'First name instructor',
            'surname' => 'Surname instructor',
            'date_of_birth' => '2000-01-01',
            'hire_date' => '2020-01-03',
            'salary' => 5000,
        ];

        $instructor = Instructors::factory()->create($dataBeforeUpdate);

        $data = [
            'user_id' => $user->id,
            'first_name' => 'Updated first name instructor',
            'surname' => 'Updated surname instructor',
            'date_of_birth' => '2000-01-01',
            'hire_date' => '2020-01-01', //updated hire date
            'salary' => 3000, //updated salary
        ];

        $response = $this->actingAs($admin)->patch("/admin/instructors/{$instructor->id}", $data);
        $response->assertStatus(302);

        $instructor->refresh();

        $this->assertEquals('Updated first name instructor', $instructor->first_name);
        $this->assertDatabaseHas("instructors", ['hire_date' => '2020-01-01']);
        $this->assertDatabaseMissing("instructors", ['hire_date' => '2020-01-03']);
        $this->assertDatabaseHas("instructors", ['salary' => 3000]);
        $this->assertDatabaseMissing("instructors", ['salary' => 5000]);
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
