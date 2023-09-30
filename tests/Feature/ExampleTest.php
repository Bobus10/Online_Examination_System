<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_data_base_using_memory_to_testing(): void
    {
        $databaseName = DB::connection()->getDatabaseName();

        $this->assertEquals(':memory:', $databaseName, 'Test is not using in-memory database.');
    }
}
