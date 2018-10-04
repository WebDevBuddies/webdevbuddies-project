<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function index(Request $request)
    {
        $this->authorize('index', User::class);

        $users = (new User)->latest();

        if ($request->get('query')) {
            $users->where('name', 'like', '%' . $request->get('query') . '%')
                ->orWhere('email', 'like', '%' . $request->get('query') . '%');
        }

        return ['users' => $users->paginate()];
    }

    public function show(User $user)
    {
        $this->authorize($user);
        return ['user' => $user];
    }

    public function update(Request $request, User $user)
    {
        $this->authorize($user);
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique'
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'min:6|confirmed',
        ]);
        $user->fill($request->only('name', 'username', 'email'));
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        // Update user role only for admin
        if ($request->get('role') && $request->get('role') !== $user->role) {
            if (! auth()->user()->isAdmin()) abort(401, 'Unathorized to edit user role.');
            if (auth()->id() === $user->id) abort(401, 'You can not revoke your own admin role.');
            $user->role = $request->get('role');
        }
        $user->save();
        return ['user' => $user];
    }

    public function destroy(User $user)
    {
        $this->authorize($user);
        $user->delete();
        return ['message' => 'Success'];
    }
}
