<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teams\StoreRequest;
use App\Http\Resources\Admin\Buyer\BuyerResource;
use App\Http\Resources\Admin\Team\TeamResource;
use App\Models\Team;
use App\Models\User;
use App\Services\Admin\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams = TeamResource::collection(Team::all())->resolve();
        return inertia('Admin/Teams/Index', compact('teams'));
    }

    public function create(){
        $buyers = BuyerResource::collection(User::with('roles')->byRole('buyer')->get())->resolve();
        return inertia('Admin/Teams/Create', compact('buyers'));
    }

    public function store(StoreRequest $request){
        TeamService::store($request->validated());
        return redirect()->route('admin.teams.index');
    }

    public function destroy(Team $team){
        $team->delete();
        return response()->json([
            'message'=>'deleted'
        ]);
    }

}
