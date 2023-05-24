<?php

namespace Tests\Feature\Admin\Products;

use App\Constants\Permissions;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_user_is_redirect_to_login_form(): void
    {
        $response = $this->get(route('admin.products.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function unauthorized_user_can_not_see_the_product_list(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.products.index'));

        $response->assertForbidden();
    }

    /** @test */
    public function user_can_see_the_product_list(): void
    {
        $permission = Permission::create(['name' => Permissions::PRODUCTS_INDEX->value]);

        $user = User::factory()->create();
        $user->givePermissionTo($permission);

        $response = $this->actingAs($user)->get(route('admin.products.index'));

        $response->assertOk()
            ->assertViewIs('products.index');
    }
}
