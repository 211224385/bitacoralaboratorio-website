<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $data=request()->validate([
        'name' => 'required',
        'paternal_surname' => 'required',
        'maternal_surname' => 'required',
        'email' => ['required', 'email', 'unique:users'],
        'password' => 'required',
        'code' => ['required', 'unique:users'],
        'role_id' => 'required',

    ]);

      $data['password']=bcrypt(request('password'));
      User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)

    {
        $data=request()->validate([
        'name' => 'required',
        'paternal_surname' => 'required',
        'maternal_surname' => 'required',
        'email' => [
            'required',
             Rule::unique('users')->ignore($user->id),
                    ],
        'password' =>'',
        'code' => ['required', Rule::unique('users')->ignore($user->id),],
        'role_id' => 'required',

    ]);

    if (request ('password')==null) {
         unset ($data ['password']);
    }

    else 
     {
        $data['password']=bcrypt(request('password'));
     } 

        $user->update ($data);
         return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(user $user)
    {
        if ($user->role_id==User::ADMIN && User::where('role_id', User::ADMIN)->count() ==1) {
         return redirect()->back();
        }
        $user->delete();

        return redirect()->route('users.index');
    }
}
