<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    private function login()
    {
        $user = User::query()->whereEmail('admin@admin.com')->first();
        $this->actingAs($user);
    }

    public function test_admin_can_create_tasks(): void
    {
        $this->login();
        $response = $this->post('/admin/tasks', [
            'title' => 'Test title',
            'description' => 'Test description',
            'assigned_to_id' => User::query()->user()->first()->id,
            'assigned_by_id' => User::query()->admin()->first()->id,
        ]);

        $response->assertStatus(302);
    }

    public function test_admin_can_access_tasks(): void
    {
        $this->login();
        $response = $this->get('/admin/tasks');

        $response->assertStatus(200);
    }

    public function test_admin_can_access_statistics(): void
    {
        $this->login();
        $response = $this->get('/admin/statistics');

        $response->assertStatus(200);
    }
}
