<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //edit user

    public function edit($id)
{

    $user = User::findOrFail($id);
    //dd($user->name);
    return Inertia::render('Users/Edit', [
        'user' => $user,
    ]);
}

public function update(Request $request, User $user)
{
    $formFields = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
    ]);


    //dd($user->name, $formFields);
    $user->update($formFields);

    return redirect()->route('users.index');
}

}