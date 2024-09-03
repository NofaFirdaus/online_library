<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controller\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3|string',
            'username' => 'required|unique:users|max:255|min:6|string',
            'email' => 'required|email:dns|unique:users|max:255',
            'password' => 'required|max:255|min:10',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        if(User::create($validated)){
            // $request->session()->flash('successRegister','Registrasi Berhasil!!');
              return redirect('/')->with('successRegister','Registrasi Berhasil!!');
            }
            return redirect('/register')->with('registerError','Registrasi Gagal!!');

     }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'min:3', 'string'],
            'username' => ['required', 'max:255', 'min:6', 'string', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'email:dns', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);
        if($user->update($validated)){
            // $request->session()->flash('successRegister','Registrasi Berhasil!!');
              return redirect('/pengaturan')->with('successUpdateProfile','Update profile berhasil!!');
            }else{
            return redirect('/EditProfil')->with('failedUpdateProfile','Update profile Gagal!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
