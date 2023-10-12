<?php

namespace Tests\Feature\Admin;

use App\Models\DegreeCourse;
use App\Models\User;
use App\Models\Yearbook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class YearbookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_admin_has_permissions_to_open_yearbook_list(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $yearbook = Yearbook::factory()->createOne();

        $response = $this->actingAs($admin)->get("/admin/degree_courses/yearbook/{$yearbook->id}");

        $response->assertStatus(200);
    }

    public function test_admin_has_permissions_to_open_yearbook_edit(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $yearbook = Yearbook::factory()->createOne(['id' => 2]);

        $response = $this->actingAs($admin)->get("/admin/degree_courses/yearbook/edit/{$yearbook->id}");

        $response->assertStatus(200);
    }

    public function test_admin_can_update_yearbook(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $degreeCurse = DegreeCourse::factory()->createOne([
            'id' => 1,
            'name' => 'degreeCurseTest',
        ]);

        $dataBeforeUpdate = [
            'degree_course_id' => $degreeCurse->id,
            'academic_year' => 2020,
        ];

        $yearbook = Yearbook::factory()->create($dataBeforeUpdate);

        $dataToUpdate = [
            'degree_course_id' => $degreeCurse->id,
            'academic_year' => 2019, //updated yearbook
        ];

        $response = $this->actingAs($admin)->patch("/admin/degree_courses/yearbook/{$yearbook->id}", $dataToUpdate);
        $response->assertStatus(302);

        $yearbook->refresh();

        $this->assertDatabaseHas("yearbooks", ['academic_year' => 2019]);
        $this->assertDatabaseMissing("yearbooks", ['academic_year' => 2020]);
    }

    public function test_admin_has_permission_to_open_yearbook_create(): void
    {
        $admin = User::factory()->createOne(['role' => 'admin']);
        $degreeCurse = DegreeCourse::factory()->createOne([
            'id' => 1,
            'name' => 'degreeCurseTest',
        ]);

        $response = $this->actingAs($admin)->get("/admin/degree_courses/yearbook/create/{$degreeCurse->id}");
        $response->assertStatus(200);
    }

    public function test_admin_can_create_yearbook(): void
    {
        $admin = User::factory()->createOne(['role' => 'admin']);
        $degreeCurse = DegreeCourse::factory()->createOne([
            'id' => 1,
            'name' => 'degreeCurseTest',
        ]);

        $dataToCreate = [
            'degree_course_id' => $degreeCurse->id,
            'academic_year' => 2019,
        ];

        $response = $this->actingAs($admin)->post("/admin/degree_courses/yearbook/{$degreeCurse->id}", $dataToCreate);
        $response->assertStatus(302);

        $degreeCurse->refresh();

        $this->assertDatabaseHas('yearbooks', ['academic_year' => 2019]);
    }
}
