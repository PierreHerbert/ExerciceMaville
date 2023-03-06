<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index',compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);

        User::create($validated);



        return redirect()->route('users.index')
        ->withSuccess(__(" l'Utlisateur à été créé correctement"));
    }

    public function show(User $user) 
    {
        return view('users.show', [
            'user' => $user
        ]);
    }


    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }



    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
        ]);
        
        $user->update($validated);

        return redirect()->route('users.index')
            ->withSuccess(__('Utilisateur updated successfully.'));
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('Utilisateur supprimée.'));
    }
}
