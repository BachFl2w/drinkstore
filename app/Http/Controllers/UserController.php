<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->load('role');

        // return response()->json($user);

        return view('admin.user_list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id != 1) {
            return back()->with('fail', __('You dont have permission'));
        }

        $roles = Role::all();

        return view('admin.user_create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        if ($request->role_id == 1 || $request->role_id == 2) {
            $active   = 0;
        } else {
            $active   = 1;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;

            while (file_exists(config('image_path.avatar') . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }

            $file->move(config('image_path.avatar'), $newName);

            $image = $newName;
        } else {
            $image = null;
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'address'  => $request->address,
            'phone'    => $request->phone,
            'role_id'  => $request->role,
            'active'   => $active,
            'image'    => $image,
        ]);

        return back()->with('success', __('Create user successfully !'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('fail', __('Can not find this account !'));
        }

        $currentUser = Auth::user();

        if ($currentUser->role_id == 1) {
            if ($user->role_id == 1 && $currentUser->email != $user->email) {
                return back()->with('fail', __('You can not edit this account !'));
            }

            return view('admin.user_edit', compact('user'));
        } else {
            if ($currentUser->email != $user->email) {
                return back()->with('fail', __('You can not edit this account !'));
            }

            return view('admin.user_edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $currentUser = Auth::user();

        if ($currentUser->role_id == 1) {
            if ($user->role_id == 1 && $currentUser->email != $user->email) {
                return back()->with('fail', __('You can not edit this account !'));
            }
        } else {
            if ($currentUser->email != $user->email) {
                return back()->with('fail', __('You can not edit this account !'));
            }
        }

        $user->name    = $request->name;
        $user->address = $request->address;
        $user->phone   = $request->phone;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;

            // kiem tra de tranh trung lap ten file
            while (file_exists(config('image_path.avatar') . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }

            if (file_exists(config('image_path.avatar') . $user->image) && $user->image) {
                unlink('images/avatar/' . $user->image);
            }

            $file->move(config('image_path.avatar'), $newName);

            $user->image = $newName;
        }

        $user->save();

        return back()->with('success', __('Update user successfully !'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $currentUser = Auth::user();

        if ($currentUser->role_id == 1 && $user->role_id != 1) {
            $user->delete();

            return back()->with('success', __('Delete user successfully !'));
        }

        return back()->with('fail', __('Dont have permission !'));
    }

    public function loginAdmin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('admin/user/index');
        }

        return back()->with('fail', __('Email or password is true !'));
    }

    public function logoutAdmin()
    {
        Auth::logout();

        return redirect(route('login'));
    }

    public function getDataJson()
    {
        $user = User::all();

        return $user;
    }
}
