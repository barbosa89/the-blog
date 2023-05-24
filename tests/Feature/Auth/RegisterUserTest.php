<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function guestUserCanRegister(): void
    {
        $user = User::factory()->make();

        $response = $this->post(route('register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionDoesntHaveErrors()
            ->assertRedirect(RouteServiceProvider::HOME);

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    /**
     * @test
     *
     * @dataProvider wrongDataProvider
     */
    public function itValidatesWrongDataOnRegister(array $wrongData): void
    {
        $user = User::factory()->make();

        $data = array_merge([
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ], $wrongData);

        $response = $this->post(route('register'), $data);

        $response->assertSessionHasErrors(array_keys($wrongData));

        $this->assertDatabaseCount('users', 0);
    }

    public static function wrongDataProvider(): array
    {
        return [
            'null name' => [
                ['name' => null],
            ],
            'long name' => [
                ['name' => str_repeat('very long name', 20)],
            ],
            'null email' => [
                ['email' => null],
            ],
            'invalid email' => [
                ['email' => 'invalid'],
            ],
            'long email' => [
                ['email' => str_repeat('very_long_name', 20).'@mail.com'],
            ],
        ];
    }
}
