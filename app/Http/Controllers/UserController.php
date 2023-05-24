<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(15, ['id', 'name', 'email']);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user): View
    {
        $permissions = Permission::get(['id', 'name'])
            ->groupBy(function (Permission $permission) {
                return explode('.', $permission->name)[0];
            });

        return view('admin.users.edit', compact('user', 'permissions'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->permissions()->sync($request->collect('permissions')->toArray());

        return back();
    }
}
