<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminLogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_logout_successfully()
    {
        $admin = User::factory()->create([
            'password' => Hash::make('password'),
            'usertype' => 'admin',
        ]);

        $this->actingAs($admin);

        $response = $this->post('/logout');

        $this->assertGuest(); // memastikan admin telah logout
        $response->assertRedirect('/'); // diarahkan ke halaman utama
    }
}
