<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('area')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('users.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'area_id' => $request->area_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $areas = Area::all();
        return view('users.edit', compact('user', 'areas'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $user->id . '|max:255',
            'password' => 'nullable|string|min:5|confirmed',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->area_id = $request->area_id;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
