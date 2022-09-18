<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{
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

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
        ]);

        $password = Str::random();

        $user = new User($validated);
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('users.index')
            ->with('success', __('User saved.'))
            ->with('user', $user)
            ->with('password', $password);
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('users.show', $user)->with('success', __('User updated.'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', __('User deleted.'));
    }
}
