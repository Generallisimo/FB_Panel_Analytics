<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Buyer\BuyerResource;
use App\Models\User;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index(){
        $buyers = BuyerResource::collection(User::with('roles')->byRole('buyer')->get())->resolve();
        return inertia('Admin/Buyers/Index', compact('buyers'));
    }

    // public function edit(){
    //     return inertia('Admin/Buyers/Edit');
    // }

    // public function update(){
    //     return redirect()->route('admin.buyers.index');
    // }
}
