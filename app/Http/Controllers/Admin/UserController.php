<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
//use Illuminate\View\View;


class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        // event(new Registered($user));

        // Auth::login($user);
        $user->assignRole($request->role);

        return to_route('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        // dd($roles);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->password) {
            $validated = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        } else {
            $validated = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
            ]);
        }
        $password = Hash::make($validated['password']);
        $user->update($validated);
        $user->update(["password" => $password]);
        $user->syncRoles($request->role);

        return to_route('admin.users.index');
    }
}
