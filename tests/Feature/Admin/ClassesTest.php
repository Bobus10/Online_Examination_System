<?php

namespace Tests\Feature\Admin;

use App\Models\Classes;
use App\Models\User;
use App\Models\Yearbook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_admin_has_permission_to_open_class_list_in_selected_yearbook(): void
    {
        $admin = User::factory()->createOne(['role' => 'admin']);
        $yearbook = Yearbook::factory()->createOne();

        $response = $this->actingAs($admin)->get("/admin/degree_courses/yearbook/class/{$yearbook->id}");

        $response->assertStatus(200);
    }

    public function test_admin_has_permission_to_open_edit_class(): void
    {
        $admin = User::factory()->createOne(['role' => 'admin']);
        $yearbook = Yearbook::factory()->createOne();

        $response = $this->actingAs($admin)->get("/admin/degree_courses/yearbook/class/edit/{$yearbook->id}");

        $response->assertStatus(200);
    }
}
