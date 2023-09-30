<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index(): View
    {
        return view('users.index', [
            'users' => User::query()->orderByName()->get(),
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $password = Str::random();

        $user = new User($request->validated());
        $user->password = Hash::make($password);
        $user->save();

        $user->assignRole($request->role_id);

        return redirect()->route('users.index')
            ->with('success', __('User saved.'))
            ->with('user', $user)
            ->with('password', $password);
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        $user->syncRoles($request->role_id);

        return redirect()->route('users.index', $user)->with('success', __('User updated.'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', __('User deleted.'));
    }
}
