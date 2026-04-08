<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Resources\Admin\Roles\RolesResource;
use App\Http\Resources\Admin\Support\SupportResource;
use App\Http\Resources\Admin\Team\TeamResource;
use App\Http\Resources\Admin\Users\UsersResource;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = UsersResource::collection(User::all())->resolve();
        return inertia('Admin/Users/Index', compact('users'));
    }

    public function create(){
        $roles = RolesResource::collection(Role::all())->resolve();
        $teams = TeamResource::collection(Team::all())->resolve();
        $supports = SupportResource::collection(User::with('roles')->byRole('support')->get())->resolve();
        return inertia('Admin/Users/Create', compact('roles', 'teams', 'supports'));
    }

    public function store(StoreRequest $request){
        UserService::store($request->validated());
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user){
        // $data = UserService::destroy($user);
        $user->delete();
        return response()->json([
            'message'=>'deleted'
        ]);
    }


    // Index Pages without controller
    public function sellers(){
        $sellers = UsersResource::collection(User::with('roles')->byRole('seller')->get())->resolve();
        return inertia('Admin/Sellers/Index', compact('sellers'));
        }
        
    public function supports(){
        $supports = UsersResource::collection(User::with('roles')->byRole('support')->get())->resolve();
        return inertia('Admin/Supports/Index', compact('supports'));
    }
}
