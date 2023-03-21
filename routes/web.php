<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [ LoginController::class, 'create'])->name('login');
Route::post('login', [ LoginController::class, 'store']);
Route::post('logout', [ LoginController::class, 'destroy'])->middleware('auth');


Route::middleware('auth') -> group( function () {

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function () {

    return Inertia::render('Users/Index', [
        'users' => User::query()
        ->when(Request::input('search'), function ($query, $search){ 

            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(7)
        ->withQueryString()
        ->through(fn($user)=> [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]),

        'filters' => Request::only(['search']),
        'can' => [

            'createUser' => Auth::user()->can('create', User::class),

        ]
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::POST('/users', function () {
    $attributes = Request::validate([

        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);

    $attributes['email_verified_at'] = now();
    $attributes['remember_token'] = Str::random(10);

    User::create( $attributes );

    //redirect
    return redirect('/users');
});


});