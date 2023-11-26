<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->withTrashed()->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $user = User::withTrashed()->find($user);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $user,
            'password' => 'nullable|min:6|max:255',
            'role' => 'required|in:user,admin',
        ]);
        $user = User::withTrashed()->find($user);
        $user->update($request->except('password'));
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($user)
    {
        $user = User::withTrashed()->find($user);        
        $user->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully');
    }
}
