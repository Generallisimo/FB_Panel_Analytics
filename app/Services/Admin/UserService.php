<?php

namespace App\Services\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserService
{
    public static function store(array $data){
        $sellerRoleId = Role::where('role', 'seller')->value('id');
        $buyerRoleId = Role::where('role', 'buyer')->value('id');
        
        $password = (int) $data['role_id'] === (int) $sellerRoleId
                    ? Str::password(12)
                    : $data['password'];

        try{
            DB::beginTransaction();

            $user = User::create([
                'name'=>$data['name'],
                'password'=>$password
            ]);
            $user->roles()->sync([$data['role_id']]);

            if((int) $data['role_id'] === $buyerRoleId){
                if($data['team_id']){
                    $user->teams()->sync([$data['team_id']]);
                }
                    
                if($data['support_id']){
                    $user->buyerSupports()->sync([$data['support_id']]);
                }
            }
            
            DB::commit(); 
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public static function destroy(User $user){
        // try{
        //     DB::beginTransaction();
        //     $user->delete();
        //     DB::commit(); 
        // }catch(\Exception $exception){
        //     DB::rollBack();
        // }

        // return response()->json([
        //     'message'=>'deleted'
        // ]);
    }
}
