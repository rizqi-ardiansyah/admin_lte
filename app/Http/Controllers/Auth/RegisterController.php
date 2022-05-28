<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller {
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required|string|max:255'],
            'email' => ['required|string|email|min:35|max:255|unique:users'],
            'username' => ['required|string|min:10|max:100|unique:users'],
            'phone' => ['required|string|max:20|min:12'],
            'id_role' => ['required|integer|exists:role,id'],
            'password' => ['required|string|min:8|max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(UserRequest $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'id_role' => $data['id_role'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(UserRequest $request){
        $request->validated();
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->id_role = $request->id_role;
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Success', 'Success Create Data');
        return redirect()->route('login.auth');
    }
}
