<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // users.index
  public function index(User $user)
  {
    $user = User::where('id', Auth::user()->id)->first();

    return view('admin.pages.users.index', compact('user'));
  }

  // users.update
  public function update(UserRequest $request, User $user)
  {
    $user->name = $request['name'];
    $user->email = $request['email'];

    if (!is_null($request['password'])) {
      $user->password = bcrypt($request['password']);
    }

    $user->save();

    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('settings.users.index');
  }
}