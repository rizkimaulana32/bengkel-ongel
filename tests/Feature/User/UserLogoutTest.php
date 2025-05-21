<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserLogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_logout_successfully()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
            'usertype' => 'user',
        ]);

        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest(); // memastikan user telah logout
        $response->assertRedirect('/'); // diarahkan ke halaman utama
    }
}
