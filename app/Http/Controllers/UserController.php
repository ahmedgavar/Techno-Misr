<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //

    /**
     * render and paginate the users page.
     *
     * @return string
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get(); //use pagination here
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('dashboard.users.create', compact('roles'));
    }

    // admin create user
    public function store(AdminRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // the best place on model
        $user->role_id = $request->role_id;
        $user->photo = $request->picture;
        $user->phone = $request->phone;

        // save the new user data
        if ($user->save()) {
            return redirect()->route('users.index')->with(['success' => 'تم الحفظ بنجاح']);
        } else {
            return redirect()->route('users.index')->with(['success' => 'حدث خطا ما']);
        }

    }
    // user register

    public function register(UserRequest $request)
    {
        // $first_row = User::latest()->first();
        // return $first_row;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // the best place on model
        $user->role_id = 1;
        $user->photo = $request->picture;
        $user->phone = $request->phone;
        $user->save();
        // save the new user data
        if ($user->save()) {
            return redirect()->route('users.index')->with(['success' => 'تم الحفظ بنجاح']);
        } else {
            return redirect()->route('users.index')->with(['success' => 'حدث خطا ما']);
        }

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email_phone', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect::to('/')
                ->withSuccess('Signed in');
        }

        return redirect("/")->withSuccess('Login details are not valid');
    }

}
