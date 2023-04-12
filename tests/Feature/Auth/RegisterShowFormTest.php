<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Tests\TestCase;

class RegisterShowFormTest extends TestCase
{
    use InteractsWithViews;

    /**
     * @test
     */
    public function guestUserCanAccessToRegisterForm(): void
    {
        $response = $this->get(route('register'));

        $response->assertOk()
            ->assertViewIs('auth.register')
            ->assertSee(route('register'))
            ->assertView()
            ->has('input[name=name]')
            ->has('input[name=email]')
            ->has('input[name=password]')
            ->has('button[type=submit]');
    }
}
