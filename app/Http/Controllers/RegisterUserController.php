<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register_user(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('home')->with('status', 'User created successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('home.update', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_user(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => (!empty($request->password)) ? bcrypt($request->password) : $user->password
        ]);

        return redirect('home')->with('status', 'User updated successfully');
    }

    public function change_status($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->status == User::USER_BLOCKED) {
            $status = User::USER_ACTIVE;
            $message = 'User activated';
        } else {
            $status = User::USER_BLOCKED;
            $message = 'User blocked';
        }

        $user->update([
            'status' => $status
        ]);

        return redirect('home')->with('status', $message);
    }
}
