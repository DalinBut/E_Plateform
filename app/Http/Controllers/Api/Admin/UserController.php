<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
        // public function __construct()
        // {
        //     $this->middleware(['role:admin']);
        // }

        public function index()
        {
            $this->authorize('viewAny', User::class);
            $user = DB::table('users')->select('name', 'email')->get();
            return $this->okWithData($user);
        }

       
        public function create()
        {
            //
        }

        
        public function store(Request $request)
        {
            $this->authorize('create', User::class);
             $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return $this->created($user);
        }

        
        public function show(User $user)
        {
            $this->authorize('view', $user);
            $user->find($user);
            // $user = DB::table('users')->select('name', 'email')->get();
            return $this->okWithData($user);
        }

        
        public function edit($id)
        {
            //
        }

        
        public function update(Request $request, User $user)
        {
            $this->authorize('update', $user);
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('apiToken')->plainTextToken;
            return $this->updated($user);
        }

        public function destroy(User $user)
        {
            $this->authorize('delete', $user);
            $user->delete();
            return $this->deleted();
        }
}
