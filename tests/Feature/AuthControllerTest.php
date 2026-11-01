<?php

namespace Tests\Feature;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_login_form_posts_to_the_current_host(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertSee('action="/login"', false);
    }

    public function test_authenticated_student_logs_out_and_is_redirected_to_login(): void
    {
        $student = User::factory()->create();

        $response = $this->actingAs($student)->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_instructor_login_renders_assigned_subject_dashboard(): void
    {
        $instructor = User::factory()->create([
            'email' => 'instructor@example.test',
            'password' => Hash::make('password'),
        ]);
        $instructor->forceFill([
            'role' => 'instructor',
            'is_active' => true,
        ])->save();

        Subject::query()->create([
            'name' => 'Life and Works of Rizal',
            'slug' => 'life-and-works-of-rizal',
            'code' => 'GE RIZAL',
            'instructor_id' => $instructor->id,
        ]);

        $response = $this->followingRedirects()->post(route('login.store'), [
            'role' => 'instructor',
            'email' => 'instructor@example.test',
            'password' => 'password',
        ]);

        $response->assertOk();
        $response->assertSee('INSTRUCTOR WORKSPACE');
        $response->assertSee('Life and Works of Rizal');
    }
}
