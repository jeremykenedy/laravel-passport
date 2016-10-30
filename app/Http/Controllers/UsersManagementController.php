<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\User;
use App\Role;
use Redirect;

class UsersManagementController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrator');
    }

    /**
     * Standard validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:255'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = \DB::table('role_user')->get();

        return view('admin.show-users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users'
        );

        $validator = $this->validator($request->all(), $rules);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $user               = new User;
            $user->name         = $request->input('name');
            $user->email        = $request->input('email');
            $userAccessLevel    = $request->input('user_level');
            $user->password     = bcrypt($request->input('password'));
            $user->save();

            // Add User Role
            $user->assignRole($userAccessLevel);

            return redirect('users')->with('success', 'Successfully created user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the user
        $user = User::find($id);

        // Show the user
        return view('admin.show-user')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the user
        $user = User::find($id);

        // Show the edit form and pass the user
        return view('admin.edit-user')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'              => 'required',
            'email'             => 'required|email'
        );

        $validator = $this->validator($request->all(), $rules);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $user               = User::find($id);
            $user->name         = $request->input('name');
            $user->email        = $request->input('email');
            $user->save();
            return redirect('users/'.$user->id)->with('success', 'Successfully updated user');
            //return Redirect::back()->with('success', 'Successfully updated user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete user
        $user = User::find($id);
        $user->delete();

        // Redirect
        return redirect('users')->with('success', 'Successfully deleted the user!');
    }
}
