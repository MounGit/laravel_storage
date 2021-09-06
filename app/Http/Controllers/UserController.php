<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.users.users', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.usersCreate');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "firstname" => "required",
            "age" => "required",
            "email" => "required",
            "password" => "required",
            "birth_date" => "required",
            "pp_url" => "required",
        ]);
        $user = new User;
        $user->name = $request->nom;
        $user->firstname = $request->firstname;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->birth_date = $request->birth_date;
        $user->pp_url = $request->file('pp_url')->hashName();
        $request->file('pp_url')->storePublicly('img', 'public');
        $user->save();
        return redirect()->route('users.index')->with('message', 'The success message!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.users.usersShow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.users.usersEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "required",
            "firstname" => "required",
            "age" => "required",
            "email" => "required",
            "password" => "required",
            "birth_date" => "required",
            "pp_url" => "required",
        ]);
        Storage::disk('public')->delete(('img/' . $user->pp_url));
        $user->name = $request->nom;
        $user->firstname = $request->firstname;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->birth_date = $request->birth_date;
        $user->pp_url = $request->file('pp_url')->hashName();
        $user->save();
        return redirect()->route('users.index')->with('message', 'The success message!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk('public')->delete(('img/' . $user->pp_url));
        $user->delete();
        return redirect()->route('users.index');
    }
}
